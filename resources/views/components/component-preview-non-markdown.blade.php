@props([
'image' => null,
'imageLight' => null,
'imageAlt' => 'Component preview',
])

@if ($attributes->has('component'))
@php
// Previews ship with the april-ui package. A preview that only makes sense for
// this site can still live in resources/views/components.
$relative = str_replace('.', '/', $attributes->get('component')).'.blade.php';

$path = collect([
april_docs_path($relative),
base_path('resources/views/components/'.$relative),
])->first(fn ($candidate) => file_exists($candidate));

$code = $path ? file_get_contents($path) : '';
@endphp
@endif
<april:tabs class="relative my-3 mr-auto w-full" defaultValue="preview">
    <slot:tabs-list class=" bg-transparent">
        <april:tabs-trigger value="preview" class="w-fit">
            Preview
        </april:tabs-trigger>
        <april:tabs-trigger value="code" class="w-fit">
            Code
        </april:tabs-trigger>
    </slot:tabs-list>
    <april:tabs-content value="preview" class="min-h-[350px] component-preview relative rounded-md border">
        <div class="absolute top-0 right-0 p-3.5 w-fit flex">
            <x-copy-button :value="$code" class="ml-auto"></x-copy-button>
        </div>
        @if ($image || $imageLight)
        <div class="flex min-h-[350px] w-full items-center justify-center p-4 md:hidden dark:hidden">
            <img src="{{ $imageLight ?? $image }}" alt="{{ $imageAlt }}" loading="lazy"
                class="max-h-[350px] w-full rounded-md object-contain object-top">
        </div>
        @if ($image)
        <div class="hidden min-h-[350px] w-full items-center justify-center p-4 dark:flex md:hidden">
            <img src="{{ $image }}" alt="{{ $imageAlt }}" loading="lazy"
                class="max-h-[350px] w-full rounded-md object-contain object-top">
        </div>
        @endif
        @endif
        <div @class([ 'w-full justify-center items-center min-h-[350px] p-10' , 'hidden md:flex'=> $image || $imageLight,
            'flex' => ! ($image || $imageLight),
            ])>
            @if ($attributes->has('component'))
            <x-dynamic-component :component="$attributes->get('component')" />
            @endif
        </div>
    </april:tabs-content>
    <april:tabs-content value="code">
        @if ($attributes->has('component'))
        <x-code-block-wrapper language="{{$attributes->get('title') ?? 'blade'}}"
            title="{{$attributes->get('title') ?? 'Component Code'}}" class="w-full h-[350px] max-h-[350px]"
            style="margin-top: 0; margin-bottom: 0;">
            {!!$code!!}
        </x-code-block-wrapper>
        @endif
    </april:tabs-content>
</april:tabs>
