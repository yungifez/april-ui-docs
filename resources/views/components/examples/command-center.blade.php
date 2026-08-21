<div class="bg-muted/20 p-4 md:p-8">
    <div class="mx-auto grid max-w-3xl gap-4 md:grid-cols-[1.35fr_1fr]">
        <april:command class="rounded-lg border shadow-sm">
            <slot:input placeholder="Search commands..." />
            <slot:empty>No commands found.</slot:empty>
            <slot:list>
                <april:command-group heading="Suggestions">
                    <april:command-item><x-lucide-plus class="mr-2 h-4 w-4" />Create
                        project<april:command-shortcut>⌘N</april:command-shortcut></april:command-item>
                    <april:command-item><x-lucide-search class="mr-2 h-4 w-4" />Search
                        workspace<april:command-shortcut>⌘K</april:command-shortcut></april:command-item>
                    <april:command-item><x-lucide-upload class="mr-2 h-4 w-4" />Import data</april:command-item>
                </april:command-group>
                <april:command-separator />
                <april:command-group heading="Navigation">
                    <april:command-item><x-lucide-layout-dashboard class="mr-2 h-4 w-4" />Overview</april:command-item>
                    <april:command-item><x-lucide-settings class="mr-2 h-4 w-4" />Settings</april:command-item>
                </april:command-group>
            </slot:list>
        </april:command>
        <div class="space-y-4">
            <april:card>
                <slot:title>Quick actions</slot:title>
                <slot:description>Keep frequent tasks close at hand.</slot:description>
                <slot:content class="grid gap-2">
                    <april:button variant="outline" class="justify-start" type="button"><x-lucide-plus
                            class="mr-2 h-4 w-4" />New project</april:button>
                    <april:button variant="outline" class="justify-start" type="button"><x-lucide-user-plus
                            class="mr-2 h-4 w-4" />Invite teammate</april:button>
                </slot:content>
            </april:card>
            <april:alert>
                <slot:icon><x-lucide-lightbulb class="h-4 w-4" /></slot:icon>
                <slot:title>Keyboard friendly</slot:title>
                <slot:description>Use ⌘K to open this command center from anywhere.</slot:description>
            </april:alert>
        </div>
    </div>
</div>
