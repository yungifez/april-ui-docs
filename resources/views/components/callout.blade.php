```blade +parse
<april:alert class="my-2">
    @isset($title)
    <slot:title {{$title->attributes}}>{{$title}}</slot:title>
    @endisset
    <slot:description {{$attributes}}>
        <x-markdown>
            {{$slot}}
        </x-markdown>
    </slot:description>
</april:alert>
```
