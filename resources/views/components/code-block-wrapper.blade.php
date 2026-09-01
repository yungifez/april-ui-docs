@props(['theme' => 'github-light', 'darkTheme' => 'github-dark', 'language'=>'', 'title'])
<div {{$attributes->class(['my-4 relative'])}} x-data>
    <div class="absolute flex justify-between w-full top-0 p-3.5 pb-0 dark:hidden">
        @isset($title)
        <small class=" text-muted-foreground title">{{$title}}</small>
        @endisset
        <x-copy-button ::value="$refs.lightContent.innerText" class="ml-auto self-end w-fit"></x-copy-button>
    </div>
    <div class="dark:hidden">
        <x-markdown :theme="$theme" class="code-block h-full grow w-full" x-ref="lightContent">
```{!!$language!!} theme:{!!$theme!!}
{!!$slot!!}
```
        </x-markdown>
    </div>
    <div class="absolute inset-x-0 top-0 hidden justify-between p-3.5 pb-0 dark:flex">
        @isset($title)
        <small class=" text-muted-foreground title">{{$title}}</small>
        @endisset
        <x-copy-button ::value="$refs.darkContent.innerText" class="ml-auto self-end w-fit"></x-copy-button>
    </div>
    <div class="hidden dark:block">
        <x-markdown :theme="$darkTheme" class="code-block h-full grow w-full" x-ref="darkContent">
```{!!$language!!} theme:{!!$darkTheme!!}
{!!$slot!!}
```
        </x-markdown>
    </div>
</div>
