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
    <i class="far fa-copy" x-show="!hasCopied"></i>
    <i class="fa fa-check" x-cloak x-show="hasCopied"></i>
</april:button>
