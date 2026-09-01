<x-layout title="Customize" description="Build a theme that feels like your product.">
    <div x-data="{
        theme: 'green',
        radius: 'md',
        density: 'comfortable',
        font: 'sans',
        dark: false,
        palettes: window.aprilCustomizationPalettes,
        init() {
            const saved = window.getAprilCustomization()

            if (saved) {
                Object.assign(this, saved)
                window.applyAprilCustomization()
            }
        },
        persist() {
            sessionStorage.setItem('april-ui-customization', JSON.stringify({
                theme: this.theme,
                radius: this.radius,
                density: this.density,
                font: this.font,
                dark: this.dark
            }))
            window.applyAprilCustomization()
        },
        get palette() { return this.palettes[this.theme] },
        get tokens() { return this.palette[this.dark ? 'dark' : 'light'] },
        get previewStyle() {
            const variables = Object.entries(this.tokens).flatMap(([property, value]) => [
                '--' + property + ': ' + value + ';',
                '--color-' + property + ': hsl(var(--' + property + '));'
            ])

            variables.push(
                '--color-sidebar: hsl(var(--sidebar-background));',
                '--radius: ' + this.radiusValue + ';',
                '--custom-primary: ' + this.tokens.primary + ';',
                '--custom-primary-foreground: ' + this.tokens['primary-foreground'] + ';',
                '--custom-radius: ' + this.radiusValue + ';'
            )

            return variables.join('')
        },
        get radiusValue() {
            return { sm: '0.375rem', md: '0.5rem', lg: '0.75rem', xl: '1rem' }[this.radius];
        },
        get cssVariables() {
            const lines = [this.dark ? '.dark {' : ':root {']

            Object.entries(this.tokens).forEach(([property, value]) => {
                lines.push('  --' + property + ': ' + value + ';')
            })

            lines.push('  --radius: ' + this.radiusValue + ';')
            lines.push('  /* ' + this.density + ' density · ' + this.font + ' font */')
            lines.push('}')

            return lines.join(String.fromCharCode(10));
        }
    }" class="border-b">
        <section class="border-b">
            <div class="mx-auto max-w-screen-xl px-4 py-14 md:px-10 md:py-20">
                <april:badge variant="secondary">Customize</april:badge>
                <h1 class="mt-4 max-w-3xl text-4xl font-bold tracking-tight md:text-6xl">Build your own April UI.</h1>
                <p class="mt-5 max-w-2xl text-lg text-muted-foreground">
                    Tune the pieces that matter to your product. Preview the result, then take the variables with you.
                </p>
            </div>
        </section>

        <div class="mx-auto grid max-w-screen-xl gap-10 px-4 py-10 md:px-10 lg:grid-cols-[280px_1fr]">
            <aside class="space-y-8">
                <div class="space-y-3">
                    <div><h2 class="text-sm font-semibold">Color palette</h2><p class="text-xs text-muted-foreground">Choose background, surface, and accent colors.</p></div>
                    <div class="grid grid-cols-2 gap-2">
                        <template x-for="(palette, name) in palettes" :key="name">
                            <april:button type="button" variant="outline" size="sm" class="justify-start"
                                x-bind:class="theme === name ? 'border-primary bg-accent' : ''" @click="theme = name; persist()">
                                <span class="mr-2 h-3 w-3 rounded-full" :style="'background-color: hsl(' + palette.light.primary + ')'"></span>
                                <span x-text="palette.name"></span>
                            </april:button>
                        </template>
                    </div>
                </div>

                <div class="space-y-3">
                    <div><h2 class="text-sm font-semibold">Radius</h2><p class="text-xs text-muted-foreground">Set the shape of controls.</p></div>
                    <div class="grid grid-cols-4 gap-2">
                        <template x-for="option in ['sm', 'md', 'lg', 'xl']" :key="option">
                            <april:button type="button" variant="outline" size="sm"
                                x-bind:class="radius === option ? 'border-primary bg-accent' : ''" @click="radius = option; persist()" x-text="option"></april:button>
                        </template>
                    </div>
                </div>

                <div class="space-y-3">
                    <div><h2 class="text-sm font-semibold">Density</h2><p class="text-xs text-muted-foreground">Choose the pace of your layouts.</p></div>
                    <div class="grid grid-cols-2 gap-2">
                        <template x-for="option in ['comfortable', 'compact']" :key="option">
                            <april:button type="button" variant="outline" size="sm"
                                x-bind:class="density === option ? 'border-primary bg-accent' : ''" @click="density = option; persist()" x-text="option"></april:button>
                        </template>
                    </div>
                </div>

                <div class="space-y-3">
                    <div><h2 class="text-sm font-semibold">Font</h2><p class="text-xs text-muted-foreground">Select the type scale foundation.</p></div>
                    <april:select x-on:value-change="font = $event.detail.value; persist()">
                        <option value="sans">Geist / system sans</option>
                        <option value="serif">Serif</option>
                        <option value="mono">Mono</option>
                    </april:select>
                </div>

                <div class="flex items-center justify-between gap-4 border-t pt-6">
                    <div><h2 class="text-sm font-semibold">Preview mode</h2><p class="text-xs text-muted-foreground">See the theme in dark mode.</p></div>
                    <april:button type="button" variant="outline" size="sm" @click="dark = !dark; persist()">
                        <x-lucide-moon class="mr-2 h-4 w-4" />
                        <span x-text="dark ? 'Dark' : 'Light'"></span>
                    </april:button>
                </div>
            </aside>

            <main class="min-w-0 space-y-6">
                <div class="flex items-end justify-between gap-4">
                    <div><p class="text-sm font-medium">Live preview</p><p class="text-sm text-muted-foreground">See how the tokens work together.</p></div>
                    <april:badge variant="outline"><span x-text="palette.name"></span></april:badge>
                </div>
                <div x-cloak class="overflow-hidden rounded-xl border bg-background text-foreground shadow-sm" :class="dark ? 'dark' : ''" :style="previewStyle">
                    <div class="border-b px-5 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2"><div class="flex h-7 w-7 items-center justify-center rounded-md"
                                    style="background-color: hsl(var(--custom-primary)); color: hsl(var(--custom-primary-foreground));"><x-lucide-layers-3
                                        class="h-4 w-4" /></div><span class="font-semibold">April workspace</span></div>
                            <april:button variant="ghost" size="icon" type="button"><x-lucide-more-horizontal class="h-4 w-4" /></april:button>
                        </div>
                    </div>
                    <div class="grid gap-6 p-5 md:grid-cols-[1fr_230px]">
                        <div class="space-y-5">
                            <div><p class="text-sm text-muted-foreground">Overview</p><h2 class="mt-1 text-2xl font-semibold tracking-tight">Good morning, Pedro</h2></div>
                            <div class="grid gap-3 sm:grid-cols-3">
                                <april:card><slot:content><p class="text-xs text-muted-foreground">Revenue</p><p class="mt-1 text-xl font-semibold">$45,231</p></slot:content></april:card>
                                <april:card><slot:content><p class="text-xs text-muted-foreground">Orders</p><p class="mt-1 text-xl font-semibold">2,350</p></slot:content></april:card>
                                <april:card><slot:content><p class="text-xs text-muted-foreground">Growth</p><p class="mt-1 text-xl font-semibold">+20.1%</p></slot:content></april:card>
                            </div>
                            <april:card><slot:title>Recent activity</slot:title><slot:content class="space-y-3">
                                <div class="flex items-center gap-3"><div class="h-8 w-8 rounded-full bg-muted"></div><div class="flex-1"><p class="text-sm font-medium">Billing flow updated</p><p class="text-xs text-muted-foreground">2 minutes ago</p></div><april:badge variant="secondary">Done</april:badge></div>
                                <div class="flex items-center gap-3"><div class="h-8 w-8 rounded-full bg-muted"></div><div class="flex-1"><p class="text-sm font-medium">New teammate invited</p><p class="text-xs text-muted-foreground">3 hours ago</p></div><april:badge variant="outline">Team</april:badge></div>
                            </slot:content></april:card>
                        </div>
                        <april:card><slot:title>Quick actions</slot:title><slot:content class="space-y-2">
                            <april:button class="w-full" type="button" style="background-color: hsl(var(--custom-primary)); color: hsl(var(--custom-primary-foreground));">Create project</april:button>
                            <april:button variant="outline" class="w-full" type="button">Invite teammate</april:button>
                            <april:button variant="ghost" class="w-full" type="button">View activity</april:button>
                        </slot:content></april:card>
                    </div>
                </div>

                <april:card>
                    <slot:title>Theme variables</slot:title>
                    <slot:description>Use these semantic tokens in your application stylesheet.</slot:description>
                    <slot:content>
                        <div class="relative overflow-hidden rounded-lg bg-muted font-mono text-xs leading-6">
                            <div class="absolute right-3 top-3 z-10">
                                <x-copy-button ::value="$refs.cssVariables.innerText" aria-label="Copy CSS" />
                            </div>
                            <pre x-ref="cssVariables" class="overflow-x-auto p-4 pr-14"><code x-text="cssVariables"></code></pre>
                        </div>
                    </slot:content>
                </april:card>
            </main>
        </div>
        <section class="mx-auto max-w-screen-xl border-t px-4 py-14 md:px-10">
            <div class="">
                <april:badge variant="secondary">Package-first workflow</april:badge>
                <h2 class="mt-4 text-3xl font-bold tracking-tight">Start with the package. Publish only what you need.</h2>
                <p class="mt-4 text-muted-foreground">
                    April UI keeps its components in the Composer package and uses Laravel's normal vendor override
                    path when you need application-owned markup.
                </p>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <april:card>
                        <slot:title>Inspect the library</slot:title>
                        <slot:content>
                            <x-code-block-wrapper language="shell">php artisan april:list</x-code-block-wrapper>
                        </slot:content>
                    </april:card>
                    <april:card>
                        <slot:title>Publish one component</slot:title>
                        <slot:content>
                            <x-code-block-wrapper language="shell">php artisan april:publish button</x-code-block-wrapper>
                        </slot:content>
                    </april:card>
                </div>
                <p class="mt-5 text-sm text-muted-foreground">
                    Published files live in <code>resources/views/vendor/april/components</code> and override the matching
                    package view through Laravel's standard view lookup rules. Run <code>php artisan april:update --diff</code>
                    to review changes after an upgrade.
                </p>
                <p class="mt-4 text-sm text-muted-foreground">
                    For editor tooling, start <code>php artisan april:mcp</code>. It exposes component search, source
                    resources, and the same vendor-path publishing operation over standard input and output.
                </p>
            </div>
        </section>
    </div>
</x-layout>
