<x-layout :title="$title ?? null" :description="$description ?? null">
    <april:sidebar-layout class="items-start px-3">
        <april:sidebar collapsible="none"
            x-persist="desktop-menu"
            class="hidden h-[calc(100vh-16px)] w-full bg-background shrink-0 lg:sticky lg:top-0 lg:flex lg:w-fit lg:min-w-[270px] max-h-[calc(100vh-16px)]">
            <slot:content class="beautify-scrollbar" wire:scroll>
                <x-menu />
            </slot:content>
        </april:sidebar>

        <april:sidebar-inset class="relative bg-transparent min-w-0 max-w-full docs-layout lg:mx-auto px-2 lg:max-w-3xl py-6 lg:gap-4 lg:py-8">
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
        </april:sidebar-inset>
    </april:sidebar-layout>
</x-layout>
