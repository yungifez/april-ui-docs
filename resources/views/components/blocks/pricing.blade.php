<section class="bg-muted/20 px-4 py-12 md:px-8">
    <div class="mx-auto max-w-5xl">
        <div class="mx-auto max-w-xl text-center">
            <p class="text-sm font-medium text-primary">Pricing</p>
            <h2 class="mt-2 text-3xl font-bold tracking-tight">Choose a plan that fits your team.</h2>
            <p class="mt-3 text-muted-foreground">Start small and move up when your product needs more room.</p>
        </div>
        <div class="mt-8 grid gap-4 md:grid-cols-3">
            @foreach ([['Starter', '$0', 'For personal projects', ['Unlimited drafts', 'Community support']], ['Team', '$24', 'For growing teams', ['Unlimited projects', 'Priority support']], ['Scale', '$79', 'For larger products', ['Advanced controls', 'Dedicated support']]] as [$name, $price, $summary, $features])
                <april:card @class(['relative', 'border-primary shadow-md' => $name === 'Team'])>
                    @if ($name === 'Team')
                        <april:badge class="absolute right-5 top-5">Popular</april:badge>
                    @endif
                    <slot:title>{{$name}}</slot:title>
                    <slot:description>{{$summary}}</slot:description>
                    <slot:content>
                        <p class="text-3xl font-bold">{{$price}}<span class="text-sm font-normal text-muted-foreground"> / month</span></p>
                        <div class="mt-5 space-y-3">
                            @foreach ($features as $feature)
                                <p class="flex items-center gap-2 text-sm"><x-lucide-check class="h-4 w-4 text-primary" />{{$feature}}</p>
                            @endforeach
                        </div>
                        <april:button type="button" variant="{{$name === 'Team' ? 'default' : 'outline'}}" class="mt-6 w-full">Choose {{$name}}</april:button>
                    </slot:content>
                </april:card>
            @endforeach
        </div>
    </div>
</section>
