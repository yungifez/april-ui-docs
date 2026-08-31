@php
    $showcaseExamples = [
        [
            'title' => 'Product dashboard',
            'description' => 'Navigation, metrics, activity, and recent sales in one responsive workspace.',
            'image' => asset('images/examples/dashboard.png'),
        ],
        [
            'title' => 'Team directory',
            'description' => 'A searchable data table with avatars, status states, and room for your own actions.',
            'image' => asset('images/examples/team-directory.png'),
        ],
        [
            'title' => 'Conversation workspace',
            'description' => 'Bubbles, avatars, badges, and a reply composer for focused product workflows.',
            'image' => asset('images/examples/conversation.png'),
        ],
    ];

    $installCode = <<<'BLADE'
composer require yungifez/april-ui

// resources/views/layouts/app.blade.php
@aprilStyles
@aprilScripts

<april:button>Save changes</april:button>
BLADE;

    $workflowCode = <<<'SHELL'
php artisan april:list
php artisan april:publish button
php artisan april:update --diff
SHELL;
@endphp

<x-layout
    title="Laravel UI components for Blade and Livewire"
    description="April UI is a Laravel Blade component library with Tailwind CSS, Alpine JS, and Livewire support."
>
    <div class="overflow-hidden">
        <section class="relative border-b">
            <div class="marketing-grid absolute inset-0 -z-10 opacity-70"></div>
            <div class="mx-auto max-w-screen-xl px-4 pb-16 pt-20 md:px-10 md:pb-24 md:pt-28">
                <div class="mx-auto max-w-4xl text-center">
                    <april:badge variant="secondary" class="mb-6 gap-2 px-3 py-1">
                        <span class="size-1.5 rounded-full bg-emerald-500"></span>
                        Laravel Blade + Livewire
                    </april:badge>
                    <h1 class="text-balance text-5xl font-bold tracking-[-0.04em] md:text-7xl lg:text-8xl">
                        Build interfaces that feel like your app.
                    </h1>
                    <p class="mx-auto mt-6 max-w-2xl text-balance text-lg leading-8 text-muted-foreground md:text-xl">
                        April UI is a Laravel-first component library for building calm, capable product interfaces with
                        familiar Blade syntax.
                    </p>
                    <div class="mt-8 flex flex-wrap justify-center gap-3">
                        <april:button-link href="{{url('docs/0.x')}}" size="lg" class="font-semibold">
                            Get started
                            <x-lucide-arrow-right class="ml-2 h-4 w-4" />
                        </april:button-link>
                        <april:button-link href="{{url('docs/0.x/components/button')}}" variant="outline" size="lg" class="font-semibold">
                            Browse components
                        </april:button-link>
                    </div>
                    <p class="mt-4 text-sm text-muted-foreground">
                        Open source · MIT licensed · Made for Laravel
                    </p>
                </div>

                <div class="mx-auto mt-14 grid max-w-5xl gap-4 md:grid-cols-[1.15fr_0.85fr] md:items-stretch">
                    <div class="rounded-xl border bg-card/90 p-5 text-left shadow-sm backdrop-blur md:p-6">
                        <div class="mb-5 flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm font-semibold">A small API for a lot of UI</p>
                                <p class="mt-1 text-sm text-muted-foreground">Install it, use it, then own the parts that matter.</p>
                            </div>
                            <x-lucide-terminal class="hidden size-5 text-muted-foreground sm:block" />
                        </div>
                        <pre class="overflow-x-auto rounded-lg bg-zinc-950 p-4 text-left text-sm leading-7 text-zinc-100"><code>{{ $installCode }}</code></pre>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-xl border bg-card/90 p-5 shadow-sm backdrop-blur">
                            <p class="text-3xl font-bold tracking-tight">100+</p>
                            <p class="mt-1 text-sm font-medium">component pieces</p>
                            <p class="mt-3 text-sm leading-6 text-muted-foreground">Primitives, parts, and composed surfaces.</p>
                        </div>
                        <div class="rounded-xl border bg-card/90 p-5 shadow-sm backdrop-blur">
                            <p class="text-3xl font-bold tracking-tight">0</p>
                            <p class="mt-1 text-sm font-medium">generators required</p>
                            <p class="mt-3 text-sm leading-6 text-muted-foreground">Keep using the Laravel workflow you know.</p>
                        </div>
                        <div class="col-span-2 rounded-xl border bg-primary p-5 text-primary-foreground shadow-sm md:p-6">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-sm font-semibold">The interface is yours</p>
                                    <p class="mt-2 max-w-sm text-sm leading-6 text-primary-foreground/75">
                                        Package views stay in <code class="rounded bg-primary-foreground/10 px-1.5 py-0.5">vendor/</code> until you choose to publish an override.
                                    </p>
                                </div>
                                <x-lucide-arrow-up-right class="size-5 shrink-0" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative mx-auto mt-14 max-w-6xl rounded-2xl border bg-muted/60 p-2 shadow-2xl shadow-primary/10 md:mt-20">
                    <div class="flex items-center gap-1.5 border-b px-3 pb-3 pt-1">
                        <span class="size-2.5 rounded-full bg-red-400/80"></span>
                        <span class="size-2.5 rounded-full bg-amber-400/80"></span>
                        <span class="size-2.5 rounded-full bg-emerald-400/80"></span>
                        <div class="mx-auto hidden rounded-md bg-background/70 px-20 py-1 text-[10px] text-muted-foreground sm:block">aprilui.dev/examples</div>
                    </div>
                    <img src="{{ asset('images/examples/dashboard.png') }}" alt="April UI dashboard example" class="block w-full rounded-lg border bg-background object-cover object-top" />
                </div>
            </div>
        </section>

        <section class="border-b bg-muted/20">
            <div class="mx-auto grid max-w-screen-xl gap-8 px-4 py-14 md:grid-cols-3 md:px-10 md:py-20">
                <div>
                    <x-lucide-panels-top-left class="size-6 text-primary" />
                    <h2 class="mt-5 text-lg font-semibold tracking-tight">Composable by default</h2>
                    <p class="mt-2 text-sm leading-6 text-muted-foreground">
                        Use small Blade components on their own or combine them into the exact surface your product needs.
                    </p>
                </div>
                <div>
                    <x-lucide-zap class="size-6 text-primary" />
                    <h2 class="mt-5 text-lg font-semibold tracking-tight">Interactive where it counts</h2>
                    <p class="mt-2 text-sm leading-6 text-muted-foreground">
                        Alpine-powered dialogs, menus, calendars, charts, editors, and tables that work with your existing state.
                    </p>
                </div>
                <div>
                    <x-lucide-sliders-horizontal class="size-6 text-primary" />
                    <h2 class="mt-5 text-lg font-semibold tracking-tight">Easy to make your own</h2>
                    <p class="mt-2 text-sm leading-6 text-muted-foreground">
                        Start with semantic tokens and sensible defaults. Tune the theme, then publish only the markup you need to change.
                    </p>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-screen-xl px-4 py-16 md:px-10 md:py-24">
            <div class="max-w-2xl">
                <p class="text-sm font-medium text-primary">A toolkit for product work</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">The pieces you reach for every day.</h2>
                <p class="mt-4 text-lg leading-8 text-muted-foreground">
                    April UI covers the common interface work, from a button on a form to the application shell around the whole product.
                </p>
            </div>
            <div class="mt-10 grid gap-4 md:grid-cols-3">
                <april:card class="h-full">
                    <slot:content>
                        <div class="flex size-10 items-center justify-center rounded-lg bg-primary/10 text-primary"><x-lucide-mouse-pointer-click class="size-5" /></div>
                        <h3 class="mt-5 text-lg font-semibold tracking-tight">Primitives</h3>
                        <p class="mt-2 text-sm leading-6 text-muted-foreground">Button, badge, card, avatar, alert, skeleton, breadcrumb, and more.</p>
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach (['Button', 'Card', 'Badge', 'Avatar', 'Alert'] as $componentName)
                                <april:badge variant="outline" class="text-xs">{{$componentName}}</april:badge>
                            @endforeach
                        </div>
                    </slot:content>
                </april:card>
                <april:card class="h-full">
                    <slot:content>
                        <div class="flex size-10 items-center justify-center rounded-lg bg-primary/10 text-primary"><x-lucide-panels-top-left class="size-5" /></div>
                        <h3 class="mt-5 text-lg font-semibold tracking-tight">Forms and overlays</h3>
                        <p class="mt-2 text-sm leading-6 text-muted-foreground">Inputs, selects, comboboxes, date pickers, dialogs, sheets, popovers, and command menus.</p>
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach (['Input', 'Select', 'Dialog', 'Popover', 'Command'] as $componentName)
                                <april:badge variant="outline" class="text-xs">{{$componentName}}</april:badge>
                            @endforeach
                        </div>
                    </slot:content>
                </april:card>
                <april:card class="h-full">
                    <slot:content>
                        <div class="flex size-10 items-center justify-center rounded-lg bg-primary/10 text-primary"><x-lucide-layout-dashboard class="size-5" /></div>
                        <h3 class="mt-5 text-lg font-semibold tracking-tight">Product surfaces</h3>
                        <p class="mt-2 text-sm leading-6 text-muted-foreground">Sidebars, data tables, charts, calendars, editors, carousels, and complete blocks.</p>
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach (['Sidebar', 'Data Table', 'Chart', 'Calendar', 'Blocks'] as $componentName)
                                <april:badge variant="outline" class="text-xs">{{$componentName}}</april:badge>
                            @endforeach
                        </div>
                    </slot:content>
                </april:card>
            </div>
            <div class="mt-8">
                <april:button-link href="{{url('docs/0.x/components/accordion')}}" variant="outline">
                    See all components
                    <x-lucide-arrow-right class="ml-2 size-4" />
                </april:button-link>
            </div>
        </section>

        <section class="border-y bg-muted/20">
            <div class="mx-auto max-w-screen-xl px-4 py-16 md:px-10 md:py-24">
                <div class="flex flex-col justify-between gap-5 md:flex-row md:items-end">
                    <div class="max-w-2xl">
                        <p class="text-sm font-medium text-primary">See it in context</p>
                        <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">From a component to a product surface.</h2>
                        <p class="mt-4 text-lg leading-8 text-muted-foreground">These examples are built from the same pieces you can use in your application. Copy the structure, then make it yours.</p>
                    </div>
                    <april:button-link href="/examples" variant="outline">
                        View all examples
                        <x-lucide-arrow-up-right class="ml-2 size-4" />
                    </april:button-link>
                </div>
                <div class="mt-10 grid gap-5 lg:grid-cols-3">
                    @foreach ($showcaseExamples as $example)
                        <a href="/examples" class="group overflow-hidden rounded-xl border bg-background no-underline shadow-sm transition hover:-translate-y-1 hover:border-primary hover:shadow-lg">
                            <div class="aspect-[16/10] overflow-hidden border-b bg-muted">
                                <img src="{{$example['image']}}" alt="{{$example['title']}} example" loading="lazy" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-[1.03]" />
                            </div>
                            <div class="p-5">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="font-semibold tracking-tight">{{$example['title']}}</h3>
                                    <x-lucide-arrow-up-right class="size-4 text-muted-foreground transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-primary" />
                                </div>
                                <p class="mt-2 text-sm leading-6 text-muted-foreground">{{$example['description']}}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="mx-auto grid max-w-screen-xl gap-10 px-4 py-16 md:grid-cols-2 md:items-center md:px-10 md:py-24">
            <div>
                <p class="text-sm font-medium text-primary">The Laravel workflow stays intact</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">Start with the package. Own the exceptions.</h2>
                <p class="mt-4 text-lg leading-8 text-muted-foreground">
                    Components live in the Composer package by default. When a product needs a different detail, publish that component to your application and keep moving.
                </p>
                <div class="mt-7 space-y-4">
                    <div class="flex gap-3"><x-lucide-check class="mt-0.5 size-5 shrink-0 text-primary" /><div><p class="font-medium">Use familiar Blade tags</p><p class="mt-1 text-sm leading-6 text-muted-foreground">No new rendering layer or generator to learn.</p></div></div>
                    <div class="flex gap-3"><x-lucide-check class="mt-0.5 size-5 shrink-0 text-primary" /><div><p class="font-medium">Connect Alpine or Livewire state</p><p class="mt-1 text-sm leading-6 text-muted-foreground">Components expose the hooks your application already uses.</p></div></div>
                    <div class="flex gap-3"><x-lucide-check class="mt-0.5 size-5 shrink-0 text-primary" /><div><p class="font-medium">Style from tokens or data attributes</p><p class="mt-1 text-sm leading-6 text-muted-foreground">Make product-level changes without fighting the defaults.</p></div></div>
                </div>
                <div class="mt-8 flex flex-wrap gap-3">
                    <april:button-link href="{{route('customize')}}" variant="outline">Customize the theme</april:button-link>
                    <april:button-link href="{{url('docs/0.x/installation')}}" variant="ghost">Read the installation guide <x-lucide-arrow-right class="ml-2 size-4" /></april:button-link>
                </div>
            </div>
            <div class="rounded-xl border bg-zinc-950 p-2 shadow-xl">
                <div class="flex items-center justify-between rounded-t-lg border-b border-white/10 px-4 py-3 text-xs text-zinc-400">
                    <span>package-first workflow</span>
                    <x-lucide-copy class="size-4" />
                </div>
                <pre class="overflow-x-auto p-5 text-sm leading-8 text-zinc-100"><code>{{ $workflowCode }}</code></pre>
                <div class="border-t border-white/10 px-5 py-4 text-sm leading-6 text-zinc-400">Published files go to <span class="text-zinc-200">resources/views/vendor/april/components</span>.</div>
            </div>
        </section>

        <section class="border-t bg-primary text-primary-foreground">
            <div class="mx-auto flex max-w-screen-xl flex-col items-start justify-between gap-8 px-4 py-14 md:flex-row md:items-center md:px-10 md:py-20">
                <div class="max-w-2xl">
                    <p class="text-sm font-medium text-primary-foreground/70">Ready when you are</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">Build the next screen in Blade.</h2>
                    <p class="mt-3 text-primary-foreground/75">Read the docs, pick a component, and keep your application code in charge.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <april:button-link href="{{url('docs/0.x')}}" variant="secondary" size="lg">Read the docs <x-lucide-arrow-right class="ml-2 size-4" /></april:button-link>
                    <april:button-link href="https://github.com/yungifez/april-ui" target="_blank" variant="outline" size="lg" class="border-primary-foreground/30 bg-transparent text-primary-foreground hover:bg-primary-foreground/10 hover:text-primary-foreground"><x-lucide-github class="mr-2 size-4" />GitHub</april:button-link>
                </div>
            </div>
        </section>
    </div>
</x-layout>
