#!/usr/bin/env node

import { access, mkdir, writeFile } from 'node:fs/promises'
import { constants } from 'node:fs'
import { join, resolve } from 'node:path'
import { spawn } from 'node:child_process'
import { tmpdir } from 'node:os'

const dashboardNames = ['dashboard-01', 'dashboard-02', 'dashboard-03', 'dashboard-04']
const projectRoot = resolve(import.meta.dirname, '..')

function option(name, fallback) {
    const index = process.argv.indexOf(`--${name}`)
    return index === -1 ? fallback : process.argv[index + 1] ?? fallback
}

const url = option('url', process.env.APRIL_SCREENSHOT_URL ?? 'http://localhost/blocks/dashboard')
const outputDirectory = resolve(projectRoot, option('output', process.env.APRIL_SCREENSHOT_OUTPUT ?? 'public/images/blocks'))
const cdpPort = Number(option('cdp-port', process.env.APRIL_SCREENSHOT_CDP_PORT ?? '9222'))
const viewportWidth = Number(option('width', process.env.APRIL_SCREENSHOT_WIDTH ?? '390'))
const viewportHeight = Number(option('height', process.env.APRIL_SCREENSHOT_HEIGHT ?? '1000'))
const deviceScaleFactor = Number(option('dpr', process.env.APRIL_SCREENSHOT_DPR ?? '2'))

const browserCandidates = [
    process.env.CHROMIUM_BIN,
    '/usr/lib64/chromium-browser/chromium-browser',
    '/usr/bin/chromium-browser',
    '/usr/bin/chromium',
    '/usr/bin/google-chrome',
].filter(Boolean)

const delay = (milliseconds) => new Promise((resolveDelay) => setTimeout(resolveDelay, milliseconds))

async function jsonRequest(path) {
    const response = await fetch(`http://127.0.0.1:${cdpPort}${path}`)

    if (!response.ok) {
        throw new Error(`Chrome DevTools returned ${response.status} for ${path}`)
    }

    return response.json()
}

async function findBrowser() {
    for (const candidate of browserCandidates) {
        try {
            await access(candidate, constants.X_OK)
            return candidate
        } catch {
            // Try the next known Chromium installation.
        }
    }

    throw new Error('Chromium was not found. Set CHROMIUM_BIN to its executable path.')
}

async function waitForPage() {
    for (let attempt = 0; attempt < 60; attempt += 1) {
        try {
            const pages = await jsonRequest('/json/list')
            const page = pages.find((candidate) => candidate.type === 'page')

            if (page) {
                return page
            }
        } catch {
            // Chrome may still be starting.
        }

        await delay(250)
    }

    throw new Error(`Timed out waiting for Chromium on port ${cdpPort}.`)
}

async function startBrowser() {
    try {
        return { process: null, page: await waitForPage() }
    } catch {
        const executable = await findBrowser()
        const browser = spawn(executable, [
            '--headless',
            '--no-sandbox',
            '--disable-gpu',
            `--remote-debugging-port=${cdpPort}`,
            '--remote-allow-origins=*',
            `--user-data-dir=${join(tmpdir(), `april-screenshots-${process.pid}`)}`,
            '--noerrdialogs',
            '--no-first-run',
            '--ozone-platform=headless',
            '--ozone-override-screen-size=800,600',
            url,
        ], { stdio: 'ignore' })

        return { process: browser, page: await waitForPage() }
    }
}

function connect(webSocketUrl) {
    const socket = new WebSocket(webSocketUrl)
    let nextId = 0

    const open = new Promise((resolveOpen, rejectOpen) => {
        socket.addEventListener('open', resolveOpen, { once: true })
        socket.addEventListener('error', rejectOpen, { once: true })
    })

    const call = async (method, params = {}) => {
        await open
        const id = ++nextId

        return new Promise((resolveCall, rejectCall) => {
            const timeout = setTimeout(() => {
                rejectCall(new Error(`Timed out waiting for Chrome DevTools method ${method}.`))
            }, 30000)

            const onMessage = (event) => {
                const message = JSON.parse(event.data)

                if (message.id !== id) {
                    return
                }

                clearTimeout(timeout)
                socket.removeEventListener('message', onMessage)

                if (message.error) {
                    rejectCall(new Error(message.error.message))
                } else {
                    resolveCall(message.result ?? {})
                }
            }

            socket.addEventListener('message', onMessage)
            socket.send(JSON.stringify({ id, method, params }))
        })
    }

    return { socket, call }
}

async function evaluate(call, expression) {
    const result = await call('Runtime.evaluate', { expression, returnByValue: true })
    return result.result?.value
}

async function capture() {
    await mkdir(outputDirectory, { recursive: true })
    const browser = await startBrowser()
    const { socket, call } = connect(browser.page.webSocketDebuggerUrl)

    try {
        await call('Page.enable')
        await call('Page.navigate', { url })
        await delay(1000)
        await call('Emulation.setDeviceMetricsOverride', {
            width: viewportWidth,
            height: viewportHeight,
            deviceScaleFactor,
            mobile: false,
        })

        const count = await evaluate(call, "document.querySelectorAll('.component-preview').length")

        if (count !== dashboardNames.length) {
            throw new Error(`Expected ${dashboardNames.length} dashboard previews, found ${count}.`)
        }

        for (const theme of ['light', 'dark']) {
            const themeValues = await evaluate(call, `(() => {
                localStorage.setItem('theme', '${theme}');
                sessionStorage.removeItem('april-ui-customization');
                const root = document.documentElement;
                root.removeAttribute('data-april-theme');
                root.classList.toggle('dark', '${theme}' === 'dark');
                root.style.colorScheme = '${theme}';
                return JSON.stringify({
                    primary: getComputedStyle(root).getPropertyValue('--primary').trim(),
                    primaryText: getComputedStyle(root).getPropertyValue('--primary-text').trim(),
                });
            })()`)

            console.log(`${theme}: ${themeValues}`)

            for (let index = 0; index < dashboardNames.length; index += 1) {
                const rectangle = await evaluate(call, `(() => {
                    const preview = document.querySelectorAll('.component-preview')[${index}];
                    const wrapper = preview?.querySelector(':scope > div:last-child');
                    const target = wrapper?.firstElementChild;

                    if (!target) return null;

                    wrapper.style.display = 'flex';
                    wrapper.style.visibility = 'visible';
                    wrapper.style.padding = '0';
                    target.style.display = 'block';
                    target.style.visibility = 'visible';
                    target.style.width = '${viewportWidth}px';
                    target.style.maxWidth = 'none';
                    target.style.flex = '0 0 ${viewportWidth}px';
                    target.scrollIntoView({ block: 'start', inline: 'start' });

                    const rect = target.getBoundingClientRect();
                    return JSON.stringify({
                        x: rect.x,
                        y: rect.y + window.scrollY,
                        width: rect.width,
                        height: rect.height,
                    });
                })()`)

                if (!rectangle) {
                    throw new Error(`Could not find ${dashboardNames[index]} preview.`)
                }

                const clip = JSON.parse(rectangle)
                const screenshot = await call('Page.captureScreenshot', {
                    format: 'png',
                    captureBeyondViewport: true,
                    clip: { ...clip, scale: 1 },
                })
                const suffix = theme === 'light' ? '-light' : ''
                const path = join(outputDirectory, `${dashboardNames[index]}${suffix}.png`)

                await writeFile(path, Buffer.from(screenshot.data, 'base64'))
                console.log(`  ${path}: ${clip.width}x${clip.height}`)
            }
        }
    } finally {
        socket.close()

        if (browser.process) {
            browser.process.kill('SIGTERM')
        }
    }
}

capture().catch((error) => {
    console.error(error.message)
    process.exitCode = 1
})
