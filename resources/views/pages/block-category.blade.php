<x-layout :title="$category['label'].' blocks'" :description="$category['description']">
    <div class="border-b">
        <section class="border-b bg-muted/20">
            <div class="mx-auto max-w-screen-xl px-4 py-14 md:px-10 md:py-20">
                <a href="{{route('blocks')}}" class="inline-flex items-center text-sm text-muted-foreground no-underline hover:text-foreground">
                    <x-lucide-arrow-left class="mr-2 h-4 w-4" /> All blocks
                </a>
                <div class="mt-8 max-w-3xl">
                    <april:badge variant="secondary">{{$category['label']}}</april:badge>
                    <h1 class="mt-4 text-4xl font-bold tracking-tight md:text-6xl">{{$category['label']}} blocks.</h1>
                    <p class="mt-5 text-lg leading-8 text-muted-foreground">{{$category['description']}}</p>
                </div>
                <nav class="mt-10 flex flex-wrap gap-2" aria-label="Block categories">
                    @foreach (config('blocks.categories') as $slug => $item)
                        <a href="{{route('blocks.category', $slug)}}" @class([
                            'rounded-md border px-3 py-2 text-sm no-underline transition-colors hover:bg-accent',
                            'border-primary bg-accent font-medium' => $slug === $categorySlug,
                        ])>{{$item['label']}}</a>
                    @endforeach
                </nav>
            </div>
        </section>

        <section class="mx-auto max-w-screen-xl px-4 py-12 md:px-10 md:py-16">
            <div class="space-y-16">
                @foreach ($blocks as $block)
                    <article>
                        <div class="mb-5 flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
                            <div>
                                <p class="text-sm font-medium text-primary">{{$category['label']}}</p>
                                <h2 class="mt-1 text-2xl font-semibold tracking-tight">{{$block['title']}}</h2>
                                <p class="mt-2 max-w-2xl text-muted-foreground">{{$block['description']}}</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($block['tags'] as $tag)
                                    <april:badge variant="outline" class="text-xs">{{$tag}}</april:badge>
                                @endforeach
                            </div>
                        </div>
                        <x-component-preview :component="$block['component']" title="blade" />
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
