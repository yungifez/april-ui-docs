<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <x-seo-head :title="$title ?? null" :description="$description ?? null" />
    <script>
        const createAprilPalette = (name, values) => {
            const light = {
                background: values.lightBackground,
                foreground: values.lightForeground,
                card: values.lightCard || '0 0% 100%',
                'card-foreground': values.lightForeground,
                popover: values.lightCard || '0 0% 100%',
                'popover-foreground': values.lightForeground,
                primary: values.primary,
                'primary-text': values.primaryText || values.primary,
                'primary-foreground': values.primaryForeground,
                secondary: values.lightMuted,
                'secondary-foreground': values.lightForeground,
                muted: values.lightMuted,
                'muted-foreground': values.lightMutedForeground,
                accent: values.lightAccent || values.lightMuted,
                'accent-foreground': values.lightForeground,
                destructive: '0 72.22% 50.59%',
                'destructive-foreground': '0 0% 98%',
                border: values.lightBorder,
                input: values.lightBorder,
                ring: values.primary,
                'sidebar-background': values.lightSidebarBackground || values.lightBackground,
                'sidebar-foreground': values.lightForeground,
                'sidebar-primary': values.primary,
                'sidebar-primary-foreground': values.primaryForeground,
                'sidebar-accent': values.lightMuted,
                'sidebar-accent-foreground': values.lightForeground,
                'sidebar-border': values.lightBorder,
                'sidebar-ring': values.primary
            }
            const dark = {
                background: values.darkBackground,
                foreground: values.darkForeground || '0 0% 98%',
                card: values.darkCard || values.darkBackground,
                'card-foreground': values.darkForeground || '0 0% 98%',
                popover: values.darkCard || values.darkBackground,
                'popover-foreground': values.darkForeground || '0 0% 98%',
                primary: values.darkPrimary || values.primary,
                'primary-text': values.darkPrimaryText || values.darkPrimary || values.primary,
                'primary-foreground': values.darkPrimaryForeground || values.primaryForeground,
                secondary: values.darkMuted,
                'secondary-foreground': values.darkForeground || '0 0% 98%',
                muted: values.darkMuted,
                'muted-foreground': values.darkMutedForeground,
                accent: values.darkAccent || values.darkMuted,
                'accent-foreground': values.darkForeground || '0 0% 98%',
                destructive: '0 62.8% 30.6%',
                'destructive-foreground': '0 85.7% 97.3%',
                border: values.darkBorder,
                input: values.darkBorder,
                ring: values.darkPrimary || values.primary,
                'sidebar-background': values.darkSidebarBackground || values.darkBackground,
                'sidebar-foreground': values.darkForeground || '0 0% 98%',
                'sidebar-primary': values.darkPrimary || values.primary,
                'sidebar-primary-foreground': values.darkPrimaryForeground || values.primaryForeground,
                'sidebar-accent': values.darkMuted,
                'sidebar-accent-foreground': values.darkForeground || '0 0% 98%',
                'sidebar-border': values.darkBorder,
                'sidebar-ring': values.darkPrimary || values.primary
            }

            return { name, light, dark }
        }

        window.aprilCustomizationPalettes = window.aprilCustomizationPalettes || {
            zinc: createAprilPalette('Zinc', {
                primary: '240 5.9% 10%',
                primaryForeground: '0 0% 98%',
                lightBackground: '0 0% 100%',
                lightForeground: '240 10% 3.9%',
                lightMuted: '240 4.8% 95.9%',
                lightMutedForeground: '240 3.8% 46.1%',
                lightBorder: '240 5.9% 90%',
                lightSidebarBackground: '0 0% 98%',
                darkBackground: '240 10% 3.9%',
                darkForeground: '0 0% 98%',
                darkMuted: '240 3.7% 15.9%',
                darkMutedForeground: '240 5% 64.9%',
                darkBorder: '240 3.7% 15.9%',
                darkSidebarBackground: '240 5.9% 10%',
                darkPrimary: '0 0% 98%',
                darkPrimaryForeground: '240 5.9% 10%'
            }),
            blue: createAprilPalette('Blue', {
                primary: '221.2 83.2% 53.3%',
                primaryForeground: '210 40% 98%',
                lightBackground: '210 40% 98%',
                lightForeground: '222.2 47.4% 11.2%',
                lightMuted: '210 40% 96.1%',
                lightMutedForeground: '215.4 16.3% 46.9%',
                lightBorder: '214.3 31.8% 91.4%',
                darkBackground: '222.2 84% 4.9%',
                darkForeground: '210 40% 98%',
                darkCard: '222.2 47.4% 11.2%',
                darkMuted: '217.2 32.6% 17.5%',
                darkMutedForeground: '215 20.2% 65.1%',
                darkBorder: '217.2 32.6% 17.5%',
                darkPrimary: '217.2 91.2% 59.8%',
                darkPrimaryForeground: '222.2 47.4% 11.2%'
            }),
            green: createAprilPalette('Forest', {
                primary: '28 38% 74%',
                primaryText: '28 38% 16%',
                primaryForeground: '35 25% 12%',
                lightBackground: '105 20% 93%',
                lightForeground: '145 18% 13%',
                lightCard: '95 14% 97%',
                lightMuted: '100 15% 87%',
                lightMutedForeground: '145 8% 36%',
                lightBorder: '100 10% 79%',
                lightAccent: '30 20% 86%',
                lightSidebarBackground: '100 16% 89%',
                darkBackground: '145 20% 6%',
                darkForeground: '45 28% 92%',
                darkCard: '145 15% 9%',
                darkMuted: '145 12% 14%',
                darkMutedForeground: '90 9% 64%',
                darkBorder: '145 10% 17%',
                darkAccent: '30 20% 15%',
                darkSidebarBackground: '145 22% 4%',
                darkPrimary: '28 50% 22%',
                darkPrimaryText: '28 50% 64%',
                darkPrimaryForeground: '45 28% 92%'
            }),
            rose: createAprilPalette('Rose', {
                primary: '346.8 77.2% 49.8%',
                primaryForeground: '355.7 100% 97.3%',
                lightBackground: '355.7 100% 99%',
                lightForeground: '346.8 77.2% 20%',
                lightMuted: '355.7 100% 96%',
                lightMutedForeground: '346.8 20% 46%',
                lightBorder: '355.7 30% 90%',
                darkBackground: '346.8 70% 5%',
                darkForeground: '355.7 100% 97.3%',
                darkCard: '346.8 50% 12%',
                darkMuted: '346.8 35% 18%',
                darkMutedForeground: '355.7 60% 70%',
                darkBorder: '346.8 35% 20%',
                darkPrimary: '346.8 77.2% 49.8%',
                darkPrimaryForeground: '355.7 100% 97.3%'
            }),
            orange: createAprilPalette('Citrus', {
                primary: '24 95% 53%',
                primaryForeground: '0 0% 100%',
                lightBackground: '30 100% 98%',
                lightForeground: '20 14% 4%',
                lightCard: '0 0% 100%',
                lightMuted: '30 80% 96%',
                lightMutedForeground: '25 16% 47%',
                lightBorder: '30 20% 90%',
                lightAccent: '30 80% 92%',
                lightSidebarBackground: '30 60% 96%',
                darkBackground: '20 14% 4%',
                darkForeground: '20 20% 98%',
                darkCard: '20 10% 8%',
                darkMuted: '24 10% 15%',
                darkMutedForeground: '24 5% 65%',
                darkBorder: '24 10% 20%',
                darkAccent: '24 20% 18%',
                darkSidebarBackground: '20 15% 6%',
                darkPrimary: '24 95% 53%',
                darkPrimaryForeground: '20 14% 4%'
            }),
            violet: createAprilPalette('Violet', {
                primary: '262.1 83.3% 57.8%',
                primaryForeground: '210 20% 98%',
                lightBackground: '0 0% 100%',
                lightForeground: '224 71% 4%',
                lightMuted: '220 14% 96%',
                lightMutedForeground: '220 9% 46%',
                lightBorder: '220 13% 91%',
                lightAccent: '250 80% 95%',
                lightSidebarBackground: '250 50% 98%',
                darkBackground: '224 71% 4%',
                darkForeground: '210 20% 98%',
                darkCard: '224 50% 8%',
                darkMuted: '215 28% 17.5%',
                darkMutedForeground: '215 20% 65%',
                darkBorder: '215 28% 17.5%',
                darkAccent: '262 40% 18%',
                darkSidebarBackground: '224 60% 6%',
                darkPrimary: '263 70% 50%',
                darkPrimaryForeground: '210 20% 98%'
            }),
            teal: createAprilPalette('Teal', {
                primary: '173 80% 36%',
                primaryForeground: '0 0% 100%',
                lightBackground: '166 76% 97%',
                lightForeground: '180 25% 10%',
                lightCard: '0 0% 100%',
                lightMuted: '168 40% 94%',
                lightMutedForeground: '170 15% 40%',
                lightBorder: '168 25% 86%',
                lightAccent: '170 60% 90%',
                lightSidebarBackground: '168 40% 95%',
                darkBackground: '180 25% 7%',
                darkForeground: '166 76% 97%',
                darkCard: '180 20% 10%',
                darkMuted: '180 20% 16%',
                darkMutedForeground: '170 15% 68%',
                darkBorder: '180 18% 22%',
                darkAccent: '170 30% 18%',
                darkSidebarBackground: '180 30% 5%',
                darkPrimary: '173 70% 45%',
                darkPrimaryForeground: '180 25% 7%'
            }),
            amber: createAprilPalette('Amber', {
                primary: '38 92% 50%',
                primaryForeground: '26 83% 14%',
                lightBackground: '48 100% 97%',
                lightForeground: '26 83% 14%',
                lightCard: '0 0% 100%',
                lightMuted: '48 96% 89%',
                lightMutedForeground: '32 20% 40%',
                lightBorder: '45 30% 85%',
                lightAccent: '45 95% 90%',
                lightSidebarBackground: '48 80% 94%',
                darkBackground: '24 10% 5%',
                darkForeground: '48 100% 96%',
                darkCard: '24 10% 9%',
                darkMuted: '24 10% 16%',
                darkMutedForeground: '40 10% 68%',
                darkBorder: '24 10% 22%',
                darkAccent: '35 25% 18%',
                darkSidebarBackground: '24 15% 6%',
                darkPrimary: '38 92% 50%',
                darkPrimaryForeground: '26 83% 14%'
            })
        }

        window.getAprilCustomization = function () {
            try {
                const value = sessionStorage.getItem('april-ui-customization')
                return value ? JSON.parse(value) : null
            } catch {
                return null
            }
        }

        window.applyAprilCustomization = function () {
            const root = document.documentElement
            const customization = window.getAprilCustomization()

            if (!customization) {
                root.removeAttribute('data-april-theme')
                root.removeAttribute('data-april-density')
                root.removeAttribute('data-april-font')
                ;['--background', '--foreground', '--card', '--card-foreground', '--popover', '--popover-foreground',
                    '--primary', '--primary-text', '--primary-foreground', '--secondary', '--secondary-foreground', '--muted',
                    '--muted-foreground', '--accent', '--accent-foreground', '--destructive', '--destructive-foreground',
                    '--border', '--input', '--ring', '--sidebar-background', '--sidebar-foreground', '--sidebar-primary',
                    '--sidebar-primary-foreground', '--sidebar-accent', '--sidebar-accent-foreground', '--sidebar-border',
                    '--sidebar-ring', '--radius']
                    .forEach((property) => root.style.removeProperty(property))
                return
            }

            const palette = window.aprilCustomizationPalettes[customization.theme] || window.aprilCustomizationPalettes.green
            const tokens = palette[customization.dark ? 'dark' : 'light']
            const radius = {
                sm: '0.375rem',
                md: '0.5rem',
                lg: '0.75rem',
                xl: '1rem'
            }[customization.radius] || '0.5rem'

            root.dataset.aprilTheme = customization.theme || 'green'
            root.dataset.aprilDensity = customization.density || 'comfortable'
            root.dataset.aprilFont = customization.font || 'sans'
            Object.entries(tokens).forEach(([property, value]) => root.style.setProperty('--' + property, value))
            root.style.setProperty('--radius', radius)

            if (typeof customization.dark === 'boolean') {
                root.classList.toggle('dark', customization.dark)
            }
        }

        window.determineColorMode = function () {
            const customization = window.getAprilCustomization()

            if (customization && typeof customization.dark === 'boolean') {
                document.documentElement.classList.toggle('dark', customization.dark)
                return
            }

            const theme = localStorage.getItem('theme') || 'system'
            const dark = theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)

            document.documentElement.classList.toggle('dark', dark)
        }

        window.setAprilTheme = function (theme) {
            sessionStorage.removeItem('april-ui-customization')
            localStorage.setItem('theme', theme)
            window.applyAprilCustomization()
            window.determineColorMode()
        }

        window.syncAprilDocsNavigation = function () {
            const currentPath = window.location.pathname.replace(/\/$/, '') || '/'

            document.querySelectorAll('[data-slot="sidebar-menu-button"]').forEach((link) => {
                const activeClasses = link.getAttribute('wire:current.exact')

                if (!activeClasses || !link.href) {
                    return
                }

                const linkPath = new URL(link.href, window.location.origin).pathname.replace(/\/$/, '') || '/'
                const active = linkPath === currentPath

                link.dataset.active = active ? 'true' : 'false'
                if (active) {
                    link.setAttribute('aria-current', 'page')
                } else {
                    link.removeAttribute('aria-current')
                }
                activeClasses.split(/\s+/).forEach((className) => {
                    link.classList.toggle(className, active)
                })
            })
        }

        window.applyAprilCustomization()
        window.determineColorMode();
        window.syncAprilDocsNavigation()

        if (!window.aprilCustomizationListenersBound) {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', window.determineColorMode)
            window.addEventListener('storage', window.determineColorMode)
            document.addEventListener('livewire:navigate', window.applyAprilCustomization)
            document.addEventListener('livewire:navigated', () => {
                window.applyAprilCustomization()
                window.determineColorMode()
                window.syncAprilDocsNavigation()
            })
            window.aprilCustomizationListenersBound = true
        }
    </script>
    <link rel="icon" type="image/png" href="/favicon.png" />
    <link rel="apple-touch-icon" type="image/png" sizes="76x76" href="/favicon.png?width=76" />
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
    @vite('resources/css/app.css')
    @stack('head-scripts')
    <livewire:styles />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="scroll-smooth">
    <x-header />
    <main class="max-w-screen min-h-screen">
        {!!$slot!!}
    </main>
    <x-footer />
</body>
@vite('resources/js/app.js')
@aprilScripts
<livewire:scripts />

</html>
