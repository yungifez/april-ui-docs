@php
    $traffic = [
        ['month' => 'Jan', 'visitors' => 1860, 'conversions' => 420],
        ['month' => 'Feb', 'visitors' => 2230, 'conversions' => 540],
        ['month' => 'Mar', 'visitors' => 1980, 'conversions' => 510],
        ['month' => 'Apr', 'visitors' => 2780, 'conversions' => 720],
        ['month' => 'May', 'visitors' => 3250, 'conversions' => 860],
        ['month' => 'Jun', 'visitors' => 3010, 'conversions' => 810],
    ];

    $trafficConfig = [
        'visitors' => ['label' => 'Visitors', 'color' => 'var(--chart-1)'],
        'conversions' => ['label' => 'Conversions', 'color' => 'var(--chart-2)'],
    ];
@endphp

<div class="bg-muted/20 p-4 md:p-8">
    <div class="mx-auto max-w-5xl space-y-5">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <p class="text-sm font-medium text-primary">Analytics</p>
                <h3 class="text-xl font-semibold tracking-tight">Growth overview</h3>
            </div>
            <div class="flex gap-2">
                <april:button variant="outline" size="sm" type="button"><x-lucide-download class="mr-2 h-4 w-4" />Export</april:button>
                <april:button size="sm" type="button">View report</april:button>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([['Revenue', '$45,231.89', '+20.1%', 'text-emerald-600'], ['Active users', '2,350', '+18.2%', 'text-emerald-600'], ['Conversion rate', '3.42%', '+0.6%', 'text-emerald-600'], ['Avg. session', '4m 32s', '-2.1%', 'text-destructive']] as [$label, $value, $change, $changeClass])
                <april:card>
                    <slot:title class="text-sm font-medium">{{$label}}</slot:title>
                    <slot:content>
                        <p class="text-2xl font-bold tracking-tight">{{$value}}</p>
                        <p class="mt-1 text-xs text-muted-foreground"><span class="{{$changeClass}}">{{$change}}</span> from last month</p>
                    </slot:content>
                </april:card>
            @endforeach
        </div>

        <div class="grid gap-4 lg:grid-cols-5">
            <april:chart label="Traffic and conversions" :data="$traffic" :config="$trafficConfig" xKey="month" type="area" class="lg:col-span-3">
                <slot:header>
                    <h4 class="font-semibold">Traffic and conversions</h4>
                    <p class="text-sm text-muted-foreground">A six-month view of acquisition performance.</p>
                </slot:header>
            </april:chart>
            <april:card class="lg:col-span-2">
                <slot:title>Top channels</slot:title>
                <slot:description>Where new visitors came from this month.</slot:description>
                <slot:content class="space-y-5">
                    @foreach ([['Direct', '42%', 'bg-primary'], ['Organic search', '31%', 'bg-chart-2'], ['Referral', '18%', 'bg-chart-3'], ['Social', '9%', 'bg-chart-4']] as [$channel, $share, $color])
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-sm"><span>{{$channel}}</span><span class="font-medium">{{$share}}</span></div>
                            <div class="h-2 overflow-hidden rounded-full bg-muted"><div class="h-full rounded-full {{$color}}" style="width: {{$share}}"></div></div>
                        </div>
                    @endforeach
                </slot:content>
            </april:card>
        </div>
    </div>
</div>
