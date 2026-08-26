@php
    $compositions = config('blocks.compositions');
    $categories = config('blocks.categories');
    $layoutCount = collect(config('blocks.layouts'))->flatten(1)->count();
    $categoryCount = count($categories);
@endphp

<x-layout title="Blocks" description="Reusable application compositions and full-page layouts built with April UI.">
    <div class="border-b">
        <section class="border-b bg-muted/20">
            <div class="mx-auto max-w-screen-xl px-4 py-16 md:px-10 md:py-24">
                <div class="max-w-3xl">
                    <april:badge variant="secondary">Blocks · {{$layoutCount + count($compositions)}} patterns</april:badge>
                    <h1 class="mt-5 text-4xl font-bold tracking-tight md:text-6xl">Building blocks for Laravel.</h1>
                    <p class="mt-5 max-w-2xl text-lg leading-8 text-muted-foreground">
                        Real interface compositions for product work. Copy the Blade source, connect your data, and keep
                        control of the markup.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <april:button-link href="#examples">Browse examples <x-lucide-arrow-down class="ml-2 h-4 w-4" /></april:button-link>
                        <april:button-link href="{{'/docs/' . config('aui.latest-version')}}" variant="outline">Read the docs</april:button-link>
                    </div>
                </div>
                <div class="mt-14 grid gap-4 sm:grid-cols-3">
                    @foreach ([[count($compositions), 'Compositions', 'Small surfaces for common product tasks.'], [$layoutCount, 'Full-page layouts', 'Complete starting points for application routes.'], [$categoryCount, 'Layout families', 'Marketing, auth, data, navigation, and planning.']] as [$value, $label, $description])
                        <div class="rounded-lg border bg-background p-5">
                            <p class="text-3xl font-bold tracking-tight">{{$value}}</p>
                            <p class="mt-1 font-medium">{{$label}}</p>
                            <p class="mt-2 text-sm leading-6 text-muted-foreground">{{$description}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="examples" class="mx-auto max-w-screen-xl scroll-mt-16 px-4 py-12 md:px-10 md:py-16">
            <div class="max-w-2xl">
                <p class="text-sm font-medium text-primary">Examples</p>
                <h2 class="mt-2 text-3xl font-bold tracking-tight">Small compositions for real product work.</h2>
                <p class="mt-3 text-muted-foreground">
                    Use these surfaces inside your own routes. Each preview has a code tab with the complete Blade
                    template.
                </p>
            </div>

            <div class="mt-10 grid gap-10 lg:grid-cols-2">
                @foreach ($compositions as $composition)
                    <article class="min-w-0">
                        <div class="mb-3">
                            <h3 class="text-xl font-semibold tracking-tight">{{$composition['title']}}</h3>
                            <p class="mt-1 text-sm leading-6 text-muted-foreground">{{$composition['description']}}</p>
                        </div>
                        <x-component-preview :component="$composition['component']" title="blade" />
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach ($composition['tags'] as $tag)
                                <april:badge variant="secondary" class="text-xs">{{$tag}}</april:badge>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="border-t bg-muted/20">
            <div class="mx-auto max-w-screen-xl px-4 py-12 md:px-10 md:py-16">
                <div class="max-w-2xl">
                    <p class="text-sm font-medium text-primary">Full-page layouts</p>
                    <h2 class="mt-2 text-3xl font-bold tracking-tight">Start from the page your product needs.</h2>
                    <p class="mt-3 text-muted-foreground">
                        Browse variants by family. The category pages show every layout as a separate preview and code
                        example.
                    </p>
                </div>

                <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($categories as $slug => $category)
                        @php($count = count(config('blocks.layouts.'.$slug, [])))
                        <a href="{{route('blocks.category', $slug)}}" class="group rounded-lg border bg-background p-5 no-underline transition-colors hover:border-primary hover:bg-accent">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-semibold tracking-tight">{{$category['label']}}</h3>
                                    <p class="mt-1 text-sm text-muted-foreground">{{$count}} {{Str::plural('variant', $count)}}</p>
                                </div>
                                <x-lucide-arrow-up-right class="h-5 w-5 text-muted-foreground transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5" />
                            </div>
                            <p class="mt-4 text-sm leading-6 text-muted-foreground">{{$category['description']}}</p>
                            <div class="mt-5 flex flex-wrap gap-2">
                                @foreach (config('blocks.layouts.'.$slug, []) as $layout)
                                    <april:badge variant="outline" class="text-xs">{{$layout['title']}}</april:badge>
                                @endforeach
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-screen-xl px-4 py-12 md:px-10 md:py-16">
            <div class="grid gap-8 rounded-xl border p-6 md:grid-cols-[1fr_auto] md:items-center md:p-8">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight">Designed to be owned.</h2>
                    <p class="mt-2 max-w-2xl text-muted-foreground">
                        Blocks are plain Blade templates. Replace the copy, connect Livewire, and change the theme
                        without a generator or runtime dependency.
                    </p>
                </div>
                <april:button-link href="https://github.com/yungifez/april-ui" target="_blank" variant="outline">
                    View on GitHub
                    <x-lucide-github class="ml-2 h-4 w-4" />
                </april:button-link>
            </div>
        </section>
    </div>
</x-layout>
