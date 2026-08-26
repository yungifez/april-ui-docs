<div class="bg-muted/20 p-6 md:p-10">
    <april:card class="mx-auto w-full max-w-2xl">
        <slot:title>Set up your workspace</slot:title>
        <slot:description>Complete these details before you invite your team.</slot:description>
        <slot:content class="space-y-5">
            <div class="grid gap-4 md:grid-cols-2">
                <div class="space-y-2"><april:label for="onboarding-workspace">Workspace name</april:label><april:input id="onboarding-workspace" value="April Studio" /></div>
                <div class="space-y-2"><april:label for="onboarding-role">Your role</april:label><april:select id="onboarding-role"><option>Product designer</option><option>Developer</option><option>Founder</option></april:select></div>
            </div>
            <div class="space-y-2"><april:label for="onboarding-goal">What are you building?</april:label><april:textarea id="onboarding-goal" class="w-full" placeholder="Tell us about your project."></april:textarea></div>
            <div class="flex items-center gap-3 rounded-md border bg-muted/30 p-3 text-sm"><x-lucide-check class="h-4 w-4 text-primary" /><span>We will use this information to personalize your workspace.</span></div>
        </slot:content>
        <slot:footer class="justify-between gap-3"><april:button type="button" variant="ghost">Skip for now</april:button><april:button type="button">Continue <x-lucide-arrow-right class="ml-2 h-4 w-4" /></april:button></slot:footer>
    </april:card>
</div>
