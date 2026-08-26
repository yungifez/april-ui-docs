<div class="flex min-h-[430px] items-center justify-center bg-muted/20 p-6">
    <april:card class="relative w-full max-w-sm border-primary shadow-md">
        <april:badge class="absolute right-5 top-5">Popular</april:badge>
        <slot:title>Premium</slot:title>
        <slot:description>For growing teams that need more power.</slot:description>
        <slot:content>
            <p class="text-3xl font-bold">$29<span class="text-sm font-normal text-muted-foreground"> / month</span></p>
            <div class="mt-6 space-y-3">
                @foreach (['Unlimited projects', 'Advanced analytics', 'Priority support', '50 GB storage'] as $feature)
                    <p class="flex items-center gap-2 text-sm"><x-lucide-check class="h-4 w-4 text-primary" />{{$feature}}</p>
                @endforeach
            </div>
            <april:button type="button" class="mt-7 w-full">Get started</april:button>
        </slot:content>
    </april:card>
</div>
