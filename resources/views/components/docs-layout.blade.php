<x-layout :title="$title ?? null">
    <div
        class="md:container mx-auto px-3 md:px-10 items-start md:grid md:grid-cols-[220px_minmax(0,1fr)] md:gap-6 lg:grid-cols-[240px_minmax(0,1fr)] lg:gap-10">
        <aside class="fixed top-14 hidden w-full shrink-0 md:sticky md:block overflow-hidden beautify-scrollbar">
            <x-menu />
        </aside>
        <main class="relative py-6 lg:gap-10 lg:py-8 xl:grid">
            <div class="space-y-2">
                @isset($title)
                <h1 class="scroll-m-20 text-4xl font-bold tracking-tight">
                    {{$title}}
                </h1>
                @endisset
                @isset($description)
                <p class="text-lg text-muted-foreground">
                    {{$description}}
                </p>
                @endisset
            </div>
            {!!$slot!!}
        </main>
    </div>
</x-layout>
