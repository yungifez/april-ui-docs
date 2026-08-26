<div class="flex min-h-[430px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-sm text-center">
        <slot:content class="flex flex-col items-center">
            <april:avatar class="h-20 w-20 text-xl"><slot:fallback>SC</slot:fallback></april:avatar>
            <h2 class="mt-4 text-xl font-semibold">Sofia Carter</h2>
            <p class="mt-1 text-sm text-muted-foreground">Product Designer</p>
            <div class="mt-6 grid w-full grid-cols-3 divide-x border-y py-4">
                <div><p class="font-semibold">128</p><p class="text-xs text-muted-foreground">Following</p></div>
                <div><p class="font-semibold">2.3k</p><p class="text-xs text-muted-foreground">Followers</p></div>
                <div><p class="font-semibold">48</p><p class="text-xs text-muted-foreground">Projects</p></div>
            </div>
            <april:button type="button" class="mt-6 w-full">Follow</april:button>
        </slot:content>
    </april:card>
</div>
