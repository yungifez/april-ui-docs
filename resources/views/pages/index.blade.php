@php
    $showcaseExamples = [
        [
            'title' => 'Product dashboard',
            'description' => 'Navigation, metrics, activity, and recent sales in one responsive workspace.',
            'imageDark' => asset('images/examples/dashboard.png'),
            'imageLight' => asset('images/examples/dashboard-light.png'),
            'class' => 'lg:col-span-2',
        ],
        [
            'title' => 'Team directory',
            'description' => 'A searchable data table with avatars, status states, and room for your own actions.',
            'imageDark' => asset('images/examples/team-directory.png'),
            'imageLight' => asset('images/examples/team-directory-light.png'),
            'class' => '',
        ],
        [
            'title' => 'Conversation workspace',
            'description' => 'Bubbles, avatars, badges, and a reply composer for focused product workflows.',
            'imageDark' => asset('images/examples/conversation.png'),
            'imageLight' => asset('images/examples/conversation-light.png'),
            'class' => '',
        ],
    ];

    $installCode = <<<'BLADE'
composer require yungifez/april-ui

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
            <div class="marketing-grid absolute inset-0 -z-10 opacity-50"></div>
            <div class="mx-auto grid max-w-screen-xl gap-14 px-4 pb-16 pt-16 md:px-10 md:pb-24 md:pt-24 lg:grid-cols-[0.85fr_1.15fr] lg:items-center lg:gap-20">
                <div>
                    <div data-april-reveal class="april-reveal flex items-center gap-3 text-sm font-medium text-muted-foreground" style="--april-delay: 80ms">
                        <span class="flex size-7 items-center justify-center rounded-md bg-primary text-xs text-primary-foreground">A</span>
                        <span>April UI</span>
                        <span class="text-border">/</span>
                        <span>Laravel Blade components</span>
                    </div>
                    <h1 data-april-reveal class="april-reveal mt-7 max-w-xl text-balance text-5xl font-bold tracking-[-0.04em] md:text-7xl" style="--april-delay: 150ms">
                        Laravel UI, in the Blade way.
                    </h1>
                    <p data-april-reveal class="april-reveal mt-6 max-w-xl text-lg leading-8 text-muted-foreground md:text-xl" style="--april-delay: 230ms">
                        A component library for building product interfaces with the Laravel workflow you already know.
                        Inspired by <a href="https://ui.shadcn.com/" target="_blank" rel="noreferrer" class="font-medium text-foreground underline decoration-primary underline-offset-4">shadcn/ui</a>, built for Blade and Livewire.
                    </p>
                    <div data-april-reveal class="april-reveal mt-8 flex flex-wrap gap-3" style="--april-delay: 310ms">
                        <april:button-link href="{{url('docs/0.x')}}" size="lg" class="font-semibold">
                            Read the docs
                            <x-lucide-arrow-right class="ml-2 size-4" />
                        </april:button-link>
                        <april:button-link href="{{url('docs/0.x/components/button')}}" variant="outline" size="lg" class="font-semibold">
                            Browse components
                        </april:button-link>
                    </div>
                    <div data-april-reveal class="april-reveal mt-10 flex flex-wrap gap-x-6 gap-y-2 border-t pt-5 text-sm text-muted-foreground" style="--april-delay: 390ms">
                        <span><strong class="font-semibold text-foreground">100+</strong> component pieces</span>
                        <span><strong class="font-semibold text-foreground">MIT</strong> licensed</span>
                        <span><strong class="font-semibold text-foreground">Composer</strong> first</span>
                    </div>
                </div>

                <div data-april-reveal class="april-reveal relative lg:pl-4" style="--april-delay: 220ms">
                    <div class="absolute -inset-5 rounded-[2rem] bg-primary/5 blur-2xl"></div>
                    <div class="april-hero-frame relative rounded-2xl border bg-muted/60 p-2 shadow-2xl shadow-primary/10">
                        <div class="flex items-center justify-between border-b px-3 pb-3 pt-1 text-xs text-muted-foreground">
                            <span>an application surface</span>
                            <span class="font-mono">Blade + Livewire</span>
                        </div>
                        <div class="dark:hidden"><img src="{{ asset('images/examples/dashboard-light.png') }}" alt="April UI product dashboard example" class="block w-full rounded-lg border bg-background object-cover object-top" /></div>
                        <div class="hidden dark:block"><img src="{{ asset('images/examples/dashboard.png') }}" alt="April UI product dashboard example" class="block w-full rounded-lg border bg-background object-cover object-top" /></div>
                    </div>
                    <div class="absolute -bottom-7 -left-4 hidden w-56 border bg-card p-4 shadow-lg sm:block lg:-left-8">
                        <p class="font-mono text-xs text-muted-foreground">resources/views</p>
                        <p class="mt-2 text-sm font-medium">Your markup stays close.</p>
                        <p class="mt-1 text-xs leading-5 text-muted-foreground">No generated abstraction between you and Blade.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-b bg-muted/20">
            <div class="mx-auto grid max-w-screen-xl gap-12 px-4 py-16 md:px-10 md:py-24 lg:grid-cols-[0.55fr_1fr] lg:gap-24">
                <div data-april-reveal class="april-reveal" style="--april-delay: 60ms">
                    <p class="text-sm font-medium text-primary">Why April</p>
                    <h2 class="mt-3 max-w-md text-3xl font-bold tracking-tight md:text-4xl">A UI kit that respects the framework.</h2>
                    <p class="mt-4 max-w-md leading-7 text-muted-foreground">April gives you a good starting point without asking you to replace Laravel’s conventions with a new system.</p>
                </div>
                <div class="divide-y border-y">
                    <div data-april-reveal class="april-reveal grid gap-3 py-6 sm:grid-cols-[3rem_1fr] sm:gap-6" style="--april-delay: 100ms">
                        <span class="font-mono text-sm text-primary">01</span>
                        <div><h3 class="font-semibold tracking-tight">Use normal Blade components</h3><p class="mt-2 max-w-xl text-sm leading-6 text-muted-foreground">Write <code class="rounded bg-muted px-1.5 py-0.5">&lt;april:button&gt;</code> and keep your templates readable, local, and easy to change.</p></div>
                    </div>
                    <div data-april-reveal class="april-reveal grid gap-3 py-6 sm:grid-cols-[3rem_1fr] sm:gap-6" style="--april-delay: 170ms">
                        <span class="font-mono text-sm text-primary">02</span>
                        <div><h3 class="font-semibold tracking-tight">Let your state stay yours</h3><p class="mt-2 max-w-xl text-sm leading-6 text-muted-foreground">Use Alpine for browser interactions, Livewire for server state, or both. April does not assume an application architecture for you.</p></div>
                    </div>
                    <div data-april-reveal class="april-reveal grid gap-3 py-6 sm:grid-cols-[3rem_1fr] sm:gap-6" style="--april-delay: 240ms">
                        <span class="font-mono text-sm text-primary">03</span>
                        <div><h3 class="font-semibold tracking-tight">Publish only the exception</h3><p class="mt-2 max-w-xl text-sm leading-6 text-muted-foreground">Package views remain in <code class="rounded bg-muted px-1.5 py-0.5">vendor/</code> until your product needs an application-owned override.</p></div>
                    </div>
                    <div data-april-reveal class="april-reveal grid gap-3 py-6 sm:grid-cols-[3rem_1fr] sm:gap-6" style="--april-delay: 310ms">
                        <span class="font-mono text-sm text-primary">04</span>
                        <div><h3 class="font-semibold tracking-tight">Style the parts, not the fight</h3><p class="mt-2 max-w-xl text-sm leading-6 text-muted-foreground">Semantic tokens and <code class="rounded bg-muted px-1.5 py-0.5">data-slot</code> attributes give you targeted control without rewriting every component.</p></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-screen-xl px-4 py-16 md:px-10 md:py-24">
            <div data-april-reveal class="april-reveal flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div class="max-w-2xl">
                    <p class="text-sm font-medium text-primary">What is in the box</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">The pieces behind a real application.</h2>
                    <p class="mt-4 text-lg leading-8 text-muted-foreground">Start with the small things. Reach for the larger surfaces when your route needs them.</p>
                </div>
                <april:button-link href="{{url('docs/0.x/components/accordion')}}" variant="outline" class="april-lift">See all components <x-lucide-arrow-right class="ml-2 size-4" /></april:button-link>
            </div>
            <div class="mt-12 grid gap-x-12 gap-y-10 border-y py-8 md:grid-cols-2 lg:grid-cols-3">
                <div data-april-reveal class="april-reveal april-lift" style="--april-delay: 80ms"><p class="font-mono text-xs uppercase tracking-[0.18em] text-muted-foreground">Primitives</p><p class="mt-3 text-lg font-semibold">Button, card, badge, avatar</p><p class="mt-2 text-sm leading-6 text-muted-foreground">The basic language of a product interface.</p></div>
                <div data-april-reveal class="april-reveal april-lift" style="--april-delay: 140ms"><p class="font-mono text-xs uppercase tracking-[0.18em] text-muted-foreground">Forms</p><p class="mt-3 text-lg font-semibold">Input, select, editor, date picker</p><p class="mt-2 text-sm leading-6 text-muted-foreground">Controls that fit inside native Laravel forms.</p></div>
                <div data-april-reveal class="april-reveal april-lift" style="--april-delay: 200ms"><p class="font-mono text-xs uppercase tracking-[0.18em] text-muted-foreground">Overlays</p><p class="mt-3 text-lg font-semibold">Dialog, sheet, popover, command</p><p class="mt-2 text-sm leading-6 text-muted-foreground">Useful interactions with Alpine-friendly state.</p></div>
                <div data-april-reveal class="april-reveal april-lift" style="--april-delay: 260ms"><p class="font-mono text-xs uppercase tracking-[0.18em] text-muted-foreground">Data</p><p class="mt-3 text-lg font-semibold">Data table, chart, calendar</p><p class="mt-2 text-sm leading-6 text-muted-foreground">Sortable, searchable, responsive product data.</p></div>
                <div data-april-reveal class="april-reveal april-lift" style="--april-delay: 320ms"><p class="font-mono text-xs uppercase tracking-[0.18em] text-muted-foreground">Navigation</p><p class="mt-3 text-lg font-semibold">Sidebar, breadcrumb, tabs</p><p class="mt-2 text-sm leading-6 text-muted-foreground">Keep context visible as the app grows.</p></div>
                <div data-april-reveal class="april-reveal april-lift" style="--april-delay: 380ms"><p class="font-mono text-xs uppercase tracking-[0.18em] text-muted-foreground">Blocks</p><p class="mt-3 text-lg font-semibold">Dashboards, auth, pricing</p><p class="mt-2 text-sm leading-6 text-muted-foreground">Complete starting points for common routes.</p></div>
            </div>
        </section>

        <section class="border-y bg-muted/20">
            <div class="mx-auto max-w-screen-xl px-4 py-16 md:px-10 md:py-24">
                <div data-april-reveal class="april-reveal max-w-2xl">
                    <p class="text-sm font-medium text-primary">Built into the work</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">Not just a component gallery.</h2>
                    <p class="mt-4 text-lg leading-8 text-muted-foreground">These are application surfaces made from April’s smaller parts. Use them as references, starting points, or copyable Blade structure.</p>
                </div>
                <div class="mt-12 grid gap-6 lg:grid-cols-[1.35fr_0.65fr]">
                    @foreach ($showcaseExamples as $example)
                        <a data-april-reveal href="/examples" class="april-reveal april-lift group {{$example['class']}} overflow-hidden border bg-background no-underline hover:border-primary hover:shadow-lg" style="--april-delay: {{ $loop->index * 80 + 80 }}ms">
                            <div class="aspect-[16/9] overflow-hidden border-b bg-muted">
                                <div class="dark:hidden"><img src="{{$example['imageLight']}}" alt="{{$example['title']}} example" loading="lazy" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-[1.02]" /></div>
                                <div class="hidden dark:block"><img src="{{$example['imageDark']}}" alt="{{$example['title']}} example" loading="lazy" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-[1.02]" /></div>
                            </div>
                            <div class="flex items-start justify-between gap-4 p-5">
                                <div><h3 class="font-semibold tracking-tight">{{$example['title']}}</h3><p class="mt-2 text-sm leading-6 text-muted-foreground">{{$example['description']}}</p></div>
                                <x-lucide-arrow-up-right class="mt-0.5 size-4 shrink-0 text-muted-foreground transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-primary" />
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="mx-auto grid max-w-screen-xl gap-12 px-4 py-16 md:grid-cols-[0.85fr_1.15fr] md:items-center md:px-10 md:py-24">
            <div data-april-reveal class="april-reveal" style="--april-delay: 60ms">
                <p class="text-sm font-medium text-primary">A package-first workflow</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">Close to Laravel. Open to your decisions.</h2>
                <p class="mt-4 text-lg leading-8 text-muted-foreground">Install with Composer, render with Blade, connect your data, and publish a view only when you need to own the markup.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <april:button-link href="{{route('customize')}}" variant="outline">Customize the theme</april:button-link>
                    <april:button-link href="{{url('docs/0.x/installation')}}" variant="ghost">Installation guide <x-lucide-arrow-right class="ml-2 size-4" /></april:button-link>
                </div>
            </div>
            <div data-april-reveal class="april-reveal border border-border bg-card p-2 shadow-xl shadow-primary/5" style="--april-delay: 160ms">
                <div class="flex items-center justify-between border-b border-border px-4 py-3 text-xs text-muted-foreground"><span>artisan commands</span><span class="font-mono">april-ui</span></div>
                <pre class="overflow-x-auto p-5 text-sm leading-8 text-card-foreground"><code>{{ $workflowCode }}</code></pre>
                <div class="border-t border-border px-5 py-4 text-sm leading-6 text-muted-foreground">Published files go to <span class="text-card-foreground">resources/views/vendor/april/components</span>.</div>
            </div>
        </section>

        <section class="border-t bg-primary text-primary-foreground">
            <div class="mx-auto flex max-w-screen-xl flex-col items-start justify-between gap-8 px-4 py-14 md:flex-row md:items-center md:px-10 md:py-20">
                <div data-april-reveal class="april-reveal max-w-2xl" style="--april-delay: 80ms"><p class="text-sm font-medium text-primary-foreground/70">For the next route</p><h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">Keep your application code in charge.</h2><p class="mt-3 text-primary-foreground/75">Read the docs, pick a component, and build the screen the way your Laravel app wants it built.</p></div>
                <div class="flex flex-wrap gap-3">
                    <april:button-link href="{{url('docs/0.x')}}" variant="secondary" size="lg" class="april-lift">Read the docs <x-lucide-arrow-right class="ml-2 size-4" /></april:button-link>
                    <april:button-link href="https://github.com/yungifez/april-ui" target="_blank" variant="outline" size="lg" class="april-lift border-primary-foreground/30 bg-transparent text-primary-foreground hover:bg-primary-foreground/10 hover:text-primary-foreground"><x-lucide-github class="mr-2 size-4" />GitHub</april:button-link>
                </div>
            </div>
        </section>
    </div>
</x-layout>
