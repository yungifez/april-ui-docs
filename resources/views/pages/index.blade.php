<x-layout>
    <section class="border-b">
        <div class="mx-auto flex max-w-screen-xl flex-col items-center px-4 py-20 text-center md:px-10 md:py-28">
            <april:badge variant="secondary" class="mb-6">Laravel-first UI components</april:badge>
            <h1 class="max-w-4xl text-balance text-4xl font-bold tracking-tight md:text-6xl lg:text-7xl">
                Beautiful components for artisans.
            </h1>
            <p class="mt-6 max-w-2xl text-balance text-lg text-muted-foreground md:text-xl">
                A fresh new look for Blade, inspired by shadcn/ui. Build calm, capable interfaces with
                composable April UI components.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <april:button-link href="{{url('docs/0.x')}}" class="font-semibold">
                    Get started
                    <x-lucide-arrow-right class="ml-2 h-4 w-4" />
                </april:button-link>
                <april:button-link href="{{route('customize')}}" variant="outline" class="font-semibold">
                    Customize your theme
                </april:button-link>
                <april:button-link href="https://github.com/yungifez/april-ui" target="_blank" variant="ghost"
                    class="font-semibold">
                    <x-lucide-github class="mr-2 h-4 w-4" />
                    GitHub
                </april:button-link>
            </div>
        </div>
    </section>

    <section class="border-b">
        <div class="mx-auto grid max-w-screen-xl gap-4 px-4 py-14 md:grid-cols-3 md:px-10 md:py-20">
            <april:card>
                <slot:content>
                    <x-lucide-panels-top-left class="mb-5 h-7 w-7 text-primary" />
                    <h2 class="mt-0 border-0 p-0 text-lg font-semibold tracking-tight">Composable by default</h2>
                    <p class="mt-2 text-sm leading-6 text-muted-foreground">
                        Combine small Blade components to create complete product surfaces without a new design system
                        for every project.
                    </p>
                </slot:content>
            </april:card>
            <april:card>
                <slot:content>
                    <x-lucide-code-2 class="mb-5 h-7 w-7 text-primary" />
                    <h2 class="mt-0 border-0 p-0 text-lg font-semibold tracking-tight">Made for Laravel</h2>
                    <p class="mt-2 text-sm leading-6 text-muted-foreground">
                        Use familiar Blade syntax, Livewire interactions, semantic tokens, and Tailwind utilities in
                        one consistent toolkit.
                    </p>
                </slot:content>
            </april:card>
            <april:card>
                <slot:content>
                    <x-lucide-palette class="mb-5 h-7 w-7 text-primary" />
                    <h2 class="mt-0 border-0 p-0 text-lg font-semibold tracking-tight">Yours to customize</h2>
                    <p class="mt-2 text-sm leading-6 text-muted-foreground">
                        Start with sensible defaults, then tune colors, radius, density, fonts, and light or dark
                        mode to fit your product.
                    </p>
                </slot:content>
            </april:card>
        </div>
    </section>

    <section class="mx-auto max-w-screen-xl px-4 py-14 md:px-10 md:py-20">
        <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div class="max-w-2xl">
                <p class="text-sm font-medium text-primary">Start with a surface</p>
                <h2 class="mt-2 text-3xl font-bold tracking-tight">From primitives to polished screens.</h2>
                <p class="mt-3 text-muted-foreground">
                    Browse real application examples built mostly from the same components you use in your app.
                </p>
            </div>
            <april:button-link href="/examples" variant="outline" size="sm">
                View examples
                <x-lucide-arrow-up-right class="ml-2 h-4 w-4" />
            </april:button-link>
        </div>
        <div class="grid gap-4 rounded-xl border bg-muted/20 p-4 md:grid-cols-3">
            <div class="space-y-3 rounded-lg border bg-background p-4">
                <div class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-emerald-500"></span><span
                        class="text-xs text-muted-foreground">Workspace</span></div>
                <div class="h-2 w-3/4 rounded bg-muted"></div>
                <div class="h-2 w-1/2 rounded bg-muted"></div>
                <div class="mt-6 grid grid-cols-2 gap-2">
                    <div class="h-16 rounded-md border bg-card"></div>
                    <div class="h-16 rounded-md border bg-card"></div>
                </div>
            </div>
            <div class="space-y-3 rounded-lg border bg-background p-4">
                <div class="flex items-center justify-between"><span class="text-sm font-medium">Recent activity</span><april:badge
                        variant="outline">12 updates</april:badge></div>
                <div class="space-y-3 pt-3">
                    <div class="flex gap-3"><div class="h-8 w-8 rounded-full bg-muted"></div><div class="flex-1 space-y-2"><div
                                class="h-2 w-2/3 rounded bg-muted"></div><div class="h-2 w-1/3 rounded bg-muted"></div></div></div>
                    <div class="flex gap-3"><div class="h-8 w-8 rounded-full bg-muted"></div><div class="flex-1 space-y-2"><div
                                class="h-2 w-1/2 rounded bg-muted"></div><div class="h-2 w-1/4 rounded bg-muted"></div></div></div>
                </div>
            </div>
            <div class="space-y-3 rounded-lg border bg-background p-4">
                <span class="text-sm font-medium">Build with confidence</span>
                <div class="space-y-2 pt-2">
                    <div class="flex items-center gap-2 text-sm"><x-lucide-check class="h-4 w-4 text-primary" />Accessible
                        interactions</div>
                    <div class="flex items-center gap-2 text-sm"><x-lucide-check class="h-4 w-4 text-primary" />Semantic
                        theme tokens</div>
                    <div class="flex items-center gap-2 text-sm"><x-lucide-check class="h-4 w-4 text-primary" />Blade-friendly
                        APIs</div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-t bg-muted/20">
        <div class="mx-auto grid max-w-screen-xl gap-8 px-4 py-14 md:grid-cols-[1fr_auto] md:items-center md:px-10 md:py-20">
            <div class="max-w-2xl">
                <p class="text-sm font-medium text-primary">New: Blocks</p>
                <h2 class="mt-2 text-3xl font-bold tracking-tight">Start with a complete product surface.</h2>
                <p class="mt-3 text-muted-foreground">
                    Browse dashboards, authentication flows, settings pages, and workspace patterns. Each block includes
                    a live preview and copyable Blade code.
                </p>
            </div>
            <april:button-link href="{{route('blocks')}}" size="lg">
                Browse blocks
                <x-lucide-arrow-right class="ml-2 h-4 w-4" />
            </april:button-link>
        </div>
    </section>
</x-layout>
