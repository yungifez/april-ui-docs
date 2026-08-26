<div class="flex min-h-[440px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-xl overflow-hidden">
        <div class="h-40 bg-gradient-to-br from-primary/80 via-primary/30 to-muted"></div>
        <slot:content class="space-y-4">
            <div class="flex items-center gap-2"><april:badge variant="secondary">Design systems</april:badge><span class="text-xs text-muted-foreground">Jun 2, 2026</span></div>
            <h2 class="text-2xl font-semibold tracking-tight">How we scaled a shared component library</h2>
            <p class="leading-7 text-muted-foreground">A practical guide to consistent product interfaces across a growing team.</p>
            <div class="flex items-center gap-3 border-t pt-4"><april:avatar><slot:fallback>SC</slot:fallback></april:avatar><div><p class="text-sm font-medium">Sofia Carter</p><p class="text-xs text-muted-foreground">Product designer · 6 min read</p></div></div>
        </slot:content>
    </april:card>
</div>
