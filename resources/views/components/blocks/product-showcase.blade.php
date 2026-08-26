<div class="flex min-h-[420px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-sm overflow-hidden">
        <div class="flex h-44 items-center justify-center bg-gradient-to-br from-zinc-200 via-zinc-100 to-zinc-300 dark:from-zinc-800 dark:via-zinc-900 dark:to-zinc-700">
            <div class="h-28 w-40 rounded-lg border border-black/10 bg-white/70 shadow-xl rotate-[-8deg] dark:bg-zinc-700/70"></div>
        </div>
        <slot:content class="space-y-4">
            <div class="flex items-start justify-between gap-3">
                <div><april:badge variant="secondary">In stock</april:badge><h2 class="mt-2 text-lg font-semibold">Classic desk lamp</h2></div>
                <p class="text-lg font-semibold">$84</p>
            </div>
            <p class="text-sm leading-6 text-muted-foreground">A warm, focused light for desks, shelves, and late-night work.</p>
            <div class="flex items-center justify-between text-sm"><span class="text-amber-500">★★★★★</span><span class="text-muted-foreground">4.8 · 96 reviews</span></div>
            <april:button type="button" class="w-full">Add to cart</april:button>
        </slot:content>
    </april:card>
</div>
