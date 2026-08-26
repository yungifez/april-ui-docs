<div class="flex min-h-[360px] items-center justify-center bg-muted/20 p-6">
    <april:dialog dismissable>
        <slot:trigger><april:button type="button" variant="outline">Give feedback</april:button></slot:trigger>
        <slot:content class="sm:max-w-[425px]">
            <april:dialog-header><slot:title>Share your feedback</slot:title><slot:description>Tell us what would make this experience better.</slot:description></april:dialog-header>
            <div class="py-4"><april:textarea id="feedback-message" class="min-h-28 w-full" placeholder="Write your feedback..." /></div>
            <april:dialog-footer><april:button type="button">Send feedback</april:button></april:dialog-footer>
        </slot:content>
    </april:dialog>
</div>
