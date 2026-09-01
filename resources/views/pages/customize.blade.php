<x-layout title="Customize" description="Build a theme that feels like your product.">
    <div x-data="{
        theme: 'green',
        radius: 'md',
        density: 'comfortable',
        font: 'sans',
        dark: document.documentElement.classList.contains('dark'),
        background: 'default',
        accent: 'default',
        palettes: window.aprilCustomizationPalettes,
        extraPalettes: {
            orange: {
                name: 'Citrus',
                light: { ...window.aprilCustomizationPalettes.rose.light, background: '30 100% 98%', foreground: '20 14% 4%', card: '0 0% 100%', 'card-foreground': '20 14% 4%', popover: '0 0% 100%', 'popover-foreground': '20 14% 4%', primary: '24 95% 53%', 'primary-foreground': '0 0% 100%', secondary: '30 80% 96%', 'secondary-foreground': '20 14% 4%', muted: '30 80% 96%', 'muted-foreground': '25 16% 47%', accent: '30 80% 92%', 'accent-foreground': '20 14% 4%', border: '30 20% 90%', input: '30 20% 90%', ring: '24 95% 53%', 'sidebar-background': '30 60% 96%', 'sidebar-foreground': '20 14% 4%', 'sidebar-primary': '24 95% 53%', 'sidebar-primary-foreground': '0 0% 100%', 'sidebar-accent': '30 80% 92%', 'sidebar-accent-foreground': '20 14% 4%', 'sidebar-border': '30 20% 90%', 'sidebar-ring': '24 95% 53%' },
                dark: { ...window.aprilCustomizationPalettes.rose.dark, background: '20 14% 4%', foreground: '20 20% 98%', card: '20 10% 8%', 'card-foreground': '20 20% 98%', popover: '20 10% 8%', 'popover-foreground': '20 20% 98%', primary: '24 95% 53%', 'primary-foreground': '20 14% 4%', secondary: '24 10% 15%', 'secondary-foreground': '20 20% 98%', muted: '24 10% 15%', 'muted-foreground': '24 5% 65%', accent: '24 20% 18%', 'accent-foreground': '20 20% 98%', border: '24 10% 20%', input: '24 10% 20%', ring: '24 95% 53%', 'sidebar-background': '20 15% 6%', 'sidebar-foreground': '20 20% 98%', 'sidebar-primary': '24 95% 53%', 'sidebar-primary-foreground': '20 14% 4%', 'sidebar-accent': '24 20% 18%', 'sidebar-accent-foreground': '20 20% 98%', 'sidebar-border': '24 10% 20%', 'sidebar-ring': '24 95% 53%' }
            },
            violet: {
                name: 'Violet',
                light: { ...window.aprilCustomizationPalettes.blue.light, background: '250 30% 98%', foreground: '250 25% 15%', card: '0 0% 100%', 'card-foreground': '250 25% 15%', popover: '0 0% 100%', 'popover-foreground': '250 25% 15%', primary: '262 83% 58%', 'primary-foreground': '210 20% 98%', secondary: '250 30% 94%', 'secondary-foreground': '250 25% 15%', muted: '250 30% 94%', 'muted-foreground': '250 10% 45%', accent: '262 80% 95%', 'accent-foreground': '262 50% 25%', border: '250 20% 88%', input: '250 20% 88%', ring: '262 83% 58%', 'sidebar-background': '250 35% 95%', 'sidebar-foreground': '250 25% 15%', 'sidebar-primary': '262 83% 58%', 'sidebar-primary-foreground': '210 20% 98%', 'sidebar-accent': '262 80% 95%', 'sidebar-accent-foreground': '262 50% 25%', 'sidebar-border': '250 20% 88%', 'sidebar-ring': '262 83% 58%' },
                dark: { ...window.aprilCustomizationPalettes.blue.dark, background: '250 25% 8%', foreground: '250 30% 96%', card: '250 22% 12%', 'card-foreground': '250 30% 96%', popover: '250 22% 12%', 'popover-foreground': '250 30% 96%', primary: '263 70% 50%', 'primary-foreground': '210 20% 98%', secondary: '250 20% 19%', 'secondary-foreground': '250 30% 96%', muted: '250 20% 19%', 'muted-foreground': '250 12% 70%', accent: '262 40% 18%', 'accent-foreground': '262 80% 90%', border: '250 20% 24%', input: '250 20% 24%', ring: '263 70% 50%', 'sidebar-background': '250 28% 6%', 'sidebar-foreground': '250 30% 96%', 'sidebar-primary': '263 70% 50%', 'sidebar-primary-foreground': '210 20% 98%', 'sidebar-accent': '262 40% 18%', 'sidebar-accent-foreground': '262 80% 90%', 'sidebar-border': '250 20% 24%', 'sidebar-ring': '263 70% 50%' }
            },
            teal: {
                name: 'Teal',
                light: { ...window.aprilCustomizationPalettes.green.light, background: '166 76% 97%', foreground: '180 25% 10%', card: '0 0% 100%', 'card-foreground': '180 25% 10%', popover: '0 0% 100%', 'popover-foreground': '180 25% 10%', primary: '173 80% 36%', 'primary-foreground': '0 0% 100%', secondary: '168 40% 94%', 'secondary-foreground': '180 25% 10%', muted: '168 40% 94%', 'muted-foreground': '170 15% 40%', accent: '170 60% 90%', 'accent-foreground': '180 25% 10%', border: '168 25% 86%', input: '168 25% 86%', ring: '173 80% 36%', 'sidebar-background': '168 40% 95%', 'sidebar-foreground': '180 25% 10%', 'sidebar-primary': '173 80% 36%', 'sidebar-primary-foreground': '0 0% 100%', 'sidebar-accent': '170 60% 90%', 'sidebar-accent-foreground': '180 25% 10%', 'sidebar-border': '168 25% 86%', 'sidebar-ring': '173 80% 36%' },
                dark: { ...window.aprilCustomizationPalettes.green.dark, background: '180 25% 7%', foreground: '166 76% 97%', card: '180 20% 10%', 'card-foreground': '166 76% 97%', popover: '180 20% 10%', 'popover-foreground': '166 76% 97%', primary: '173 70% 45%', 'primary-foreground': '180 25% 7%', secondary: '180 20% 16%', 'secondary-foreground': '166 76% 97%', muted: '180 20% 16%', 'muted-foreground': '170 15% 68%', accent: '170 30% 18%', 'accent-foreground': '166 76% 97%', border: '180 18% 22%', input: '180 18% 22%', ring: '173 70% 45%', 'sidebar-background': '180 30% 5%', 'sidebar-foreground': '166 76% 97%', 'sidebar-primary': '173 70% 45%', 'sidebar-primary-foreground': '180 25% 7%', 'sidebar-accent': '170 30% 18%', 'sidebar-accent-foreground': '166 76% 97%', 'sidebar-border': '180 18% 22%', 'sidebar-ring': '173 70% 45%' }
            },
            amber: {
                name: 'Amber',
                light: { ...window.aprilCustomizationPalettes.green.light, background: '48 100% 97%', foreground: '26 83% 14%', card: '0 0% 100%', 'card-foreground': '26 83% 14%', popover: '0 0% 100%', 'popover-foreground': '26 83% 14%', primary: '38 92% 50%', 'primary-foreground': '26 83% 14%', secondary: '48 96% 89%', 'secondary-foreground': '26 83% 14%', muted: '48 96% 89%', 'muted-foreground': '32 20% 40%', accent: '45 95% 90%', 'accent-foreground': '32 50% 20%', border: '45 30% 85%', input: '45 30% 85%', ring: '38 92% 50%', 'sidebar-background': '48 80% 94%', 'sidebar-foreground': '26 83% 14%', 'sidebar-primary': '38 92% 50%', 'sidebar-primary-foreground': '26 83% 14%', 'sidebar-accent': '45 95% 90%', 'sidebar-accent-foreground': '32 50% 20%', 'sidebar-border': '45 30% 85%', 'sidebar-ring': '38 92% 50%' },
                dark: { ...window.aprilCustomizationPalettes.green.dark, background: '24 10% 5%', foreground: '48 100% 96%', card: '24 10% 9%', 'card-foreground': '48 100% 96%', popover: '24 10% 9%', 'popover-foreground': '48 100% 96%', primary: '38 92% 50%', 'primary-foreground': '26 83% 14%', secondary: '24 10% 16%', 'secondary-foreground': '48 100% 96%', muted: '24 10% 16%', 'muted-foreground': '40 10% 68%', accent: '35 25% 18%', 'accent-foreground': '45 90% 85%', border: '24 10% 22%', input: '24 10% 22%', ring: '38 92% 50%', 'sidebar-background': '24 15% 6%', 'sidebar-foreground': '48 100% 96%', 'sidebar-primary': '38 92% 50%', 'sidebar-primary-foreground': '26 83% 14%', 'sidebar-accent': '35 25% 18%', 'sidebar-accent-foreground': '45 90% 85%', 'sidebar-border': '24 10% 22%', 'sidebar-ring': '38 92% 50%' }
            }
        },
        backgroundOptions: {
            default: { name: 'Palette', swatch: 'hsl(var(--background))' },
            neutral: {
                name: 'Neutral', swatch: 'hsl(210 20% 90%)',
                light: { background: '210 20% 98%', foreground: '222 47% 11%', card: '0 0% 100%', 'card-foreground': '222 47% 11%', popover: '0 0% 100%', 'popover-foreground': '222 47% 11%', secondary: '210 40% 96%', 'secondary-foreground': '222 47% 11%', muted: '210 40% 96%', 'muted-foreground': '215 16% 47%', border: '214 32% 91%', input: '214 32% 91%', 'sidebar-background': '210 40% 96%', 'sidebar-foreground': '222 47% 11%', 'sidebar-accent': '210 40% 92%', 'sidebar-accent-foreground': '222 47% 11%', 'sidebar-border': '214 32% 91%' },
                dark: { background: '222 47% 7%', foreground: '210 40% 98%', card: '222 47% 11%', 'card-foreground': '210 40% 98%', popover: '222 47% 11%', 'popover-foreground': '210 40% 98%', secondary: '217 33% 18%', 'secondary-foreground': '210 40% 98%', muted: '217 33% 18%', 'muted-foreground': '215 20% 65%', border: '217 33% 18%', input: '217 33% 18%', 'sidebar-background': '222 47% 5%', 'sidebar-foreground': '210 40% 98%', 'sidebar-accent': '217 33% 18%', 'sidebar-accent-foreground': '210 40% 98%', 'sidebar-border': '217 33% 18%' }
            },
            sand: {
                name: 'Sand', swatch: 'hsl(38 55% 82%)',
                light: { background: '40 30% 96%', foreground: '28 30% 14%', card: '40 40% 99%', 'card-foreground': '28 30% 14%', popover: '40 40% 99%', 'popover-foreground': '28 30% 14%', secondary: '38 35% 89%', 'secondary-foreground': '28 30% 14%', muted: '38 35% 89%', 'muted-foreground': '28 12% 42%', border: '36 22% 82%', input: '36 22% 82%', 'sidebar-background': '38 30% 92%', 'sidebar-foreground': '28 30% 14%', 'sidebar-accent': '38 35% 87%', 'sidebar-accent-foreground': '28 30% 14%', 'sidebar-border': '36 22% 82%' },
                dark: { background: '28 22% 8%', foreground: '40 30% 94%', card: '28 20% 11%', 'card-foreground': '40 30% 94%', popover: '28 20% 11%', 'popover-foreground': '40 30% 94%', secondary: '28 18% 18%', 'secondary-foreground': '40 30% 94%', muted: '28 18% 18%', 'muted-foreground': '35 14% 68%', border: '28 18% 23%', input: '28 18% 23%', 'sidebar-background': '28 24% 6%', 'sidebar-foreground': '40 30% 94%', 'sidebar-accent': '28 18% 18%', 'sidebar-accent-foreground': '40 30% 94%', 'sidebar-border': '28 18% 23%' }
            },
            lavender: {
                name: 'Lavender', swatch: 'hsl(250 55% 86%)',
                light: { background: '250 30% 98%', foreground: '250 25% 15%', card: '0 0% 100%', 'card-foreground': '250 25% 15%', popover: '0 0% 100%', 'popover-foreground': '250 25% 15%', secondary: '250 30% 94%', 'secondary-foreground': '250 25% 15%', muted: '250 30% 94%', 'muted-foreground': '250 10% 45%', border: '250 20% 88%', input: '250 20% 88%', 'sidebar-background': '250 35% 95%', 'sidebar-foreground': '250 25% 15%', 'sidebar-accent': '250 30% 91%', 'sidebar-accent-foreground': '250 25% 15%', 'sidebar-border': '250 20% 88%' },
                dark: { background: '250 25% 8%', foreground: '250 30% 96%', card: '250 22% 12%', 'card-foreground': '250 30% 96%', popover: '250 22% 12%', 'popover-foreground': '250 30% 96%', secondary: '250 20% 19%', 'secondary-foreground': '250 30% 96%', muted: '250 20% 19%', 'muted-foreground': '250 12% 70%', border: '250 20% 24%', input: '250 20% 24%', 'sidebar-background': '250 28% 6%', 'sidebar-foreground': '250 30% 96%', 'sidebar-accent': '250 20% 19%', 'sidebar-accent-foreground': '250 30% 96%', 'sidebar-border': '250 20% 24%' }
            }
        },
        accentOptions: {
            default: { name: 'Palette', swatch: 'hsl(var(--primary))' },
            ocean: {
                name: 'Ocean', swatch: 'hsl(199 89% 48%)',
                light: { primary: '199 89% 48%', 'primary-foreground': '210 40% 98%', accent: '199 90% 94%', 'accent-foreground': '199 90% 20%', ring: '199 89% 48%', 'sidebar-primary': '199 89% 48%', 'sidebar-primary-foreground': '210 40% 98%', 'sidebar-ring': '199 89% 48%' },
                dark: { primary: '199 89% 48%', 'primary-foreground': '210 40% 98%', accent: '199 50% 18%', 'accent-foreground': '199 80% 90%', ring: '199 89% 48%', 'sidebar-primary': '199 89% 48%', 'sidebar-primary-foreground': '210 40% 98%', 'sidebar-ring': '199 89% 48%' }
            },
            violet: {
                name: 'Violet', swatch: 'hsl(262 83% 58%)',
                light: { primary: '262 83% 58%', 'primary-foreground': '210 20% 98%', accent: '262 80% 95%', 'accent-foreground': '262 50% 25%', ring: '262 83% 58%', 'sidebar-primary': '262 83% 58%', 'sidebar-primary-foreground': '210 20% 98%', 'sidebar-ring': '262 83% 58%' },
                dark: { primary: '263 70% 50%', 'primary-foreground': '210 20% 98%', accent: '262 40% 18%', 'accent-foreground': '262 80% 90%', ring: '263 70% 50%', 'sidebar-primary': '263 70% 50%', 'sidebar-primary-foreground': '210 20% 98%', 'sidebar-ring': '263 70% 50%' }
            },
            amber: {
                name: 'Amber', swatch: 'hsl(38 92% 50%)',
                light: { primary: '38 92% 50%', 'primary-foreground': '26 83% 14%', accent: '45 95% 90%', 'accent-foreground': '32 50% 20%', ring: '38 92% 50%', 'sidebar-primary': '38 92% 50%', 'sidebar-primary-foreground': '26 83% 14%', 'sidebar-ring': '38 92% 50%' },
                dark: { primary: '38 92% 50%', 'primary-foreground': '26 83% 14%', accent: '35 25% 18%', 'accent-foreground': '45 90% 85%', ring: '38 92% 50%', 'sidebar-primary': '38 92% 50%', 'sidebar-primary-foreground': '26 83% 14%', 'sidebar-ring': '38 92% 50%' }
            },
            rose: {
                name: 'Rose', swatch: 'hsl(347 77% 50%)',
                light: { primary: '347 77% 50%', 'primary-foreground': '356 100% 97%', accent: '356 100% 96%', 'accent-foreground': '347 60% 25%', ring: '347 77% 50%', 'sidebar-primary': '347 77% 50%', 'sidebar-primary-foreground': '356 100% 97%', 'sidebar-ring': '347 77% 50%' },
                dark: { primary: '347 77% 50%', 'primary-foreground': '356 100% 97%', accent: '347 35% 20%', 'accent-foreground': '356 80% 90%', ring: '347 77% 50%', 'sidebar-primary': '347 77% 50%', 'sidebar-primary-foreground': '356 100% 97%', 'sidebar-ring': '347 77% 50%' }
            }
        },
        init() {
            Object.assign(this.palettes, this.extraPalettes)
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
                dark: this.dark,
                background: this.background,
                accent: this.accent
            }))
            window.applyAprilCustomization()
        },
        clear() {
            sessionStorage.removeItem('april-ui-customization')
            this.theme = 'green'
            this.radius = 'md'
            this.density = 'comfortable'
            this.font = 'sans'
            this.background = 'default'
            this.accent = 'default'
            window.applyAprilCustomization()
            window.determineColorMode()
            this.dark = document.documentElement.classList.contains('dark')
        },
        get palette() { return this.palettes[this.theme] },
        get tokens() {
            const tokens = { ...this.palette[this.dark ? 'dark' : 'light'] }
            const background = this.backgroundOptions[this.background] || this.backgroundOptions.default
            const accent = this.accentOptions[this.accent] || this.accentOptions.default

            if (this.background !== 'default') Object.assign(tokens, background[this.dark ? 'dark' : 'light'])
            if (this.accent !== 'default') Object.assign(tokens, accent[this.dark ? 'dark' : 'light'])

            return tokens
        },
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
                                x-bind:class="theme === name ? 'border-primary bg-accent' : ''" @click="theme = name; background = 'default'; accent = 'default'; persist()">
                                <span class="mr-2 h-3 w-3 rounded-full" :style="'background-color: hsl(' + palette.light.primary + ')'"></span>
                                <span x-text="palette.name"></span>
                            </april:button>
                        </template>
                    </div>
                </div>

                <div class="space-y-3">
                    <div><h2 class="text-sm font-semibold">Background</h2><p class="text-xs text-muted-foreground">Change the surface colors independently.</p></div>
                    <div class="grid grid-cols-2 gap-2">
                        <template x-for="(option, name) in backgroundOptions" :key="'background-' + name">
                            <april:button type="button" variant="outline" size="sm" class="justify-start"
                                x-bind:class="background === name ? 'border-primary bg-accent' : ''" @click="background = name; persist()">
                                <span class="mr-2 h-3 w-3 rounded-full border" :style="'background-color: ' + option.swatch"></span>
                                <span x-text="option.name"></span>
                            </april:button>
                        </template>
                    </div>
                </div>

                <div class="space-y-3">
                    <div><h2 class="text-sm font-semibold">Accent</h2><p class="text-xs text-muted-foreground">Choose a separate action and highlight color.</p></div>
                    <div class="grid grid-cols-2 gap-2">
                        <template x-for="(option, name) in accentOptions" :key="'accent-' + name">
                            <april:button type="button" variant="outline" size="sm" class="justify-start"
                                x-bind:class="accent === name ? 'border-primary bg-accent' : ''" @click="accent = name; persist()">
                                <span class="mr-2 h-3 w-3 rounded-full" :style="'background-color: ' + option.swatch"></span>
                                <span x-text="option.name"></span>
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
                    <div class="flex items-center gap-2">
                        <april:button type="button" variant="outline" size="sm" @click="dark = !dark; persist()">
                            <x-lucide-moon class="mr-2 h-4 w-4" />
                            <span x-text="dark ? 'Dark' : 'Light'"></span>
                        </april:button>
                        <april:button type="button" variant="ghost" size="sm" aria-label="Clear saved customization" @click="clear()">
                            Clear
                        </april:button>
                    </div>
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
                        <slot:title class="text-base">Inspect the library</slot:title>
                        <slot:content>
                            <x-code-block-wrapper language="shell">php artisan april:list</x-code-block-wrapper>
                        </slot:content>
                    </april:card>
                    <april:card>
                        <slot:title class="text-base">Publish one component</slot:title>
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
