<div class="bg-muted/20 p-4 md:p-8">
    <div class="mx-auto max-w-4xl"><april:card><slot:title>Choose your dates</slot:title><slot:description>Select a start and end date for your trip.</slot:description><slot:content><div class="overflow-x-auto"><april:calendar class="min-w-[620px] rounded-md border" mode="range" :selected="now()" :number-of-months="2" /></div><div class="mt-5 flex justify-end"><april:button type="button">Apply dates</april:button></div></slot:content></april:card></div>
</div>
