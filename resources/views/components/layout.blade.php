<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @php
        $siteName = config('app.name') === 'Laravel' ? 'April UI' : config('app.name');
        isset($title) ? $title = $title.' | '.$siteName : $title = $siteName;
    @endphp
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="{{$description ?? ''}}">
    <meta name="theme-color" content="#303030">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$title}}">
    <meta property="og:description" content="{{$description ?? ''}}">
    <meta property="og:image" content="{{asset('images/examples/dashboard.png')}}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:site_name" content="{{$siteName}}">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{url()->current()}}">
    <meta name="twitter:title" content="{{$title}}">
    <meta name="twitter:image" content="{{asset('images/examples/dashboard.png')}}">
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
                primary: '28 38% 32%',
                primaryForeground: '35 35% 97%',
                lightBackground: '105 24% 95%',
                lightForeground: '145 30% 16%',
                lightCard: '95 30% 98%',
                lightMuted: '100 25% 90%',
                lightMutedForeground: '145 12% 41%',
                lightBorder: '100 16% 83%',
                lightAccent: '30 28% 91%',
                lightSidebarBackground: '100 26% 92%',
                darkBackground: '145 32% 7%',
                darkForeground: '45 35% 94%',
                darkCard: '145 26% 10%',
                darkMuted: '145 20% 16%',
                darkMutedForeground: '90 14% 68%',
                darkBorder: '145 18% 20%',
                darkAccent: '30 27% 18%',
                darkSidebarBackground: '145 34% 5%',
                darkPrimary: '28 37% 48%',
                darkPrimaryForeground: '45 35% 94%'
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
                    '--primary', '--primary-foreground', '--secondary', '--secondary-foreground', '--muted',
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
    <link rel="canonical" href="">
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
