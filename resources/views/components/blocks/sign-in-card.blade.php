<div class="flex min-h-[500px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-sm">
        <slot:title>Login to your account</slot:title>
        <slot:description>Enter your email below to login to your account.</slot:description>
        <slot:content class="space-y-5">
            <div class="space-y-2"><april:label for="sign-in-email">Email</april:label><april:input id="sign-in-email" type="email" placeholder="m@example.com" class="w-full" /></div>
            <div class="space-y-2"><div class="flex justify-between"><april:label for="sign-in-password">Password</april:label><a href="#" class="text-xs text-primary underline-offset-4 hover:underline">Forgot password?</a></div><april:input id="sign-in-password" type="password" class="w-full" /></div>
            <div class="flex items-center gap-2"><april:checkbox id="sign-in-remember" /><april:label for="sign-in-remember" class="text-sm font-normal">Remember me</april:label></div>
            <april:button type="button" class="w-full">Login</april:button>
            <div class="flex items-center gap-3 text-xs text-muted-foreground"><april:separator class="flex-1" /><span>or</span><april:separator class="flex-1" /></div>
            <april:button type="button" variant="outline" class="w-full"><x-lucide-github class="mr-2 h-4 w-4" />Login with GitHub</april:button>
        </slot:content>
    </april:card>
</div>
