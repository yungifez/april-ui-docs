<div class="flex min-h-[360px] items-center justify-center bg-muted/20 p-6">
    <april:popover>
        <slot:trigger><april:button type="button" variant="outline">Share</april:button></slot:trigger>
        <slot:content class="w-80">
            <div class="space-y-4">
                <div><h2 class="font-medium">Share this page</h2><p class="mt-1 text-sm text-muted-foreground">Anyone with this link can view it.</p></div>
                <div class="flex gap-2"><april:input value="april.dev/p/4x8m" readonly class="min-w-0 flex-1" /><april:button type="button" size="sm">Copy</april:button></div>
            </div>
        </slot:content>
    </april:popover>
</div>
