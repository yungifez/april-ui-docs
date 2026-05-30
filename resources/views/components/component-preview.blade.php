```blade +parse
@if ($attributes->has('component'))
@php
$code = file_get_contents(base_path()."/resources/views/components/".str_replace('.', '/',
$attributes->get('component')).'.blade.php');
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
        <div class="w-full flex justify-center items-center min-h-[350px] p-10">
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
```
