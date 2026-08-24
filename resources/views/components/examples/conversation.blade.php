<div class="bg-muted/20 p-4 md:p-8">
    <april:card class="mx-auto max-w-3xl overflow-hidden">
        <slot:title class="flex items-center gap-3"><april:avatar size="sm"><slot:fallback>AM</slot:fallback></april:avatar><span>Alex Morgan</span><april:badge variant="secondary" class="ml-auto">Online</april:badge></slot:title>
        <slot:description>Product design · #onboarding</slot:description>
        <slot:content class="border-y bg-muted/20 py-5">
            <april:bubble-group>
                <april:bubble variant="secondary">The latest onboarding prototype is ready for review.</april:bubble>
                <april:bubble variant="secondary">I moved the account step before team setup so the path feels shorter.</april:bubble>
                <april:bubble align="end">That makes sense. The empty-state copy reads much better now too.<slot:reactions><april:bubble-reactions>👍 2</april:bubble-reactions></slot:reactions></april:bubble>
                <april:bubble variant="secondary">Great. I will share the final link before the design critique.</april:bubble>
            </april:bubble-group>
        </slot:content>
        <slot:footer class="block">
            <div class="flex items-end gap-2"><april:textarea class="min-h-20 flex-1" placeholder="Write a reply..."></april:textarea><april:button type="button" size="icon" aria-label="Send message"><x-lucide-send class="h-4 w-4" /></april:button></div>
        </slot:footer>
    </april:card>
</div>
