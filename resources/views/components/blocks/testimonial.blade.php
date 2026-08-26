<div class="flex min-h-[390px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-xl">
        <slot:content>
            <div class="text-4xl leading-none text-primary">“</div>
            <blockquote class="mt-4 text-xl font-medium leading-8 tracking-tight">April UI gave our team a calm foundation. We shipped a polished interface in days instead of weeks.</blockquote>
            <div class="mt-8 flex items-center gap-3 border-t pt-5"><april:avatar><slot:fallback>AB</slot:fallback></april:avatar><div><p class="text-sm font-medium">Amelia Bell</p><p class="text-xs text-muted-foreground">CTO, Acme Inc.</p></div></div>
        </slot:content>
    </april:card>
</div>
