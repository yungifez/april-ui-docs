<div class="flex min-h-[520px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-md">
        <slot:title>Welcome back</slot:title>
        <slot:description>Enter your email to sign in to your account.</slot:description>
        <slot:content>
            <form class="space-y-5">
                <div class="space-y-2">
                    <april:label for="example-email">Email</april:label>
                    <april:input id="example-email" type="email" autocomplete="email" placeholder="you@example.com"
                        class="w-full" />
                </div>
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <april:label for="example-password">Password</april:label>
                        <april:button-link href="#" variant="link" size="none" class="text-xs">Forgot
                            password?</april:button-link>
                    </div>
                    <april:input id="example-password" type="password" autocomplete="current-password" class="w-full" />
                </div>
                <div class="flex items-center gap-2">
                    <april:checkbox id="example-remember" />
                    <april:label for="example-remember" class="text-sm font-normal">Remember me</april:label>
                </div>
                <april:button class="w-full" type="button">Sign in</april:button>
            </form>
            <div class="relative my-6">
                <april:separator />
                <span
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-card px-2 text-xs text-muted-foreground">
                    or continue with
                </span>
            </div>
            <april:button variant="outline" class="w-full" type="button">
                <x-lucide-github class="mr-2 h-4 w-4" /> GitHub
            </april:button>
        </slot:content>
        <slot:footer class="justify-center text-xs text-muted-foreground">
            By continuing, you agree to our Terms of Service and Privacy Policy.
        </slot:footer>
    </april:card>
</div>
