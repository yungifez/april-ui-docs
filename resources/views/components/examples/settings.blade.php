<div class="bg-muted/20 p-4 md:p-8">
    <april:tabs defaultValue="account" class="mx-auto w-full max-w-3xl">
        <slot:list class="grid w-full grid-cols-3">
            <april:tabs-trigger value="account">Account</april:tabs-trigger>
            <april:tabs-trigger value="notifications">Notifications</april:tabs-trigger>
            <april:tabs-trigger value="appearance">Appearance</april:tabs-trigger>
        </slot:list>

        <april:tabs-content value="account">
            <april:card class="mt-4">
                <slot:title>Account</slot:title>
                <slot:description>Update your account details and public profile.</slot:description>
                <slot:content class="space-y-4">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="space-y-2">
                            <april:label for="settings-name">Name</april:label>
                            <april:input id="settings-name" value="Pedro Duarte" />
                        </div>
                        <div class="space-y-2">
                            <april:label for="settings-username">Username</april:label>
                            <april:input id="settings-username" value="@peduarte" />
                        </div>
                    </div>
                    <div class="space-y-2">
                        <april:label for="settings-bio">Bio</april:label>
                        <april:textarea id="settings-bio" class="w-full" placeholder="Tell us a little about yourself.">
                            Product designer and Laravel artisan.</april:textarea>
                    </div>
                </slot:content>
                <slot:footer>
                    <april:button type="button">Save changes</april:button>
                </slot:footer>
            </april:card>
        </april:tabs-content>

        <april:tabs-content value="notifications">
            <april:card class="mt-4">
                <slot:title>Notifications</slot:title>
                <slot:description>Choose which updates you want to receive.</slot:description>
                <slot:content class="space-y-5">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <april:label for="email-updates" class="font-medium">Email updates</april:label>
                            <p class="text-sm text-muted-foreground">Receive product
                                and account updates.</p>
                        </div>
                        <april:switch id="email-updates" />
                    </div>
                    <april:separator />
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <april:label for="weekly-digest" class="font-medium">Weekly digest</april:label>
                            <p class="text-sm text-muted-foreground">Get a summary
                                of workspace activity.</p>
                        </div>
                        <april:switch id="weekly-digest" />
                    </div>
                </slot:content>
                <slot:footer>
                    <april:button type="button">Save preferences</april:button>
                </slot:footer>
            </april:card>
        </april:tabs-content>

        <april:tabs-content value="appearance">
            <april:card class="mt-4">
                <slot:title>Appearance</slot:title>
                <slot:description>Set the visual style for your workspace.</slot:description>
                <slot:content class="space-y-4">
                    <div class="space-y-2">
                        <april:label for="settings-theme">Theme</april:label>
                        <april:select id="settings-theme">
                            <option>System</option>
                            <option>Light</option>
                            <option>Dark</option>
                        </april:select>
                    </div>
                    <div class="space-y-2">
                        <april:label for="settings-density">Density</april:label>
                        <april:select id="settings-density">
                            <option>Comfortable</option>
                            <option>Compact</option>
                        </april:select>
                    </div>
                </slot:content>
                <slot:footer>
                    <april:button type="button">Update appearance</april:button>
                </slot:footer>
            </april:card>
        </april:tabs-content>
    </april:tabs>
</div>
