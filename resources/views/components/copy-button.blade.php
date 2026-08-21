<april:button x-data="{
        hasCopied: false,
        copyToClipBoard(value){
            navigator.clipboard.writeText(value)
            this.hasCopied = true
        }
    }" x-effect="hasCopied && setTimeout(() => {
    hasCopied = false
    }, 2000)" size="icon" variant="ghost" {{$attributes->class(['justify-center h-6 w-6 dark:text-zinc-50
    dark:hover:bg-zinc-700
    dark:hover:text-zinc-50'])}}
    @click="copyToClipBoard($el.getAttribute('value'))" value="{{$attributes->Get('value')}}">
    <span class="sr-only">Copy</span>
        <x-lucide-copy class="h-4 w-4" x-show="!hasCopied" />
        <x-lucide-check class="h-4 w-4" x-cloak x-show="hasCopied" />
</april:button>
