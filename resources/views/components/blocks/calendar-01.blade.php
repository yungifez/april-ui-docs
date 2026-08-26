<div class="flex min-h-[560px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-md"><slot:title>Schedule a review</slot:title><slot:description>Choose a date for your project review.</slot:description><slot:content><april:calendar class="rounded-md border" mode="single" :selected="now()" /><div class="mt-5 flex justify-end gap-2"><april:button type="button" variant="outline">Cancel</april:button><april:button type="button">Continue</april:button></div></slot:content></april:card>
</div>
