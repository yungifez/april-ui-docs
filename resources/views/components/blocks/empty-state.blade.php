<div class="flex min-h-[420px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-md text-center">
        <slot:content class="flex flex-col items-center">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-muted text-primary">
                <x-lucide-inbox class="h-6 w-6" />
            </div>
            <h2 class="mt-5 text-xl font-semibold tracking-tight">Your inbox is empty</h2>
            <p class="mt-2 max-w-xs text-sm leading-6 text-muted-foreground">New messages will appear here when your team sends them.</p>
            <april:button type="button" class="mt-6">Invite a teammate <x-lucide-user-plus class="ml-2 h-4 w-4" /></april:button>
        </slot:content>
    </april:card>
</div>
