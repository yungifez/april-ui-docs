@php
    $analytics = [
        ['day' => 'Jun 1', 'visitors' => 1820, 'signups' => 86, 'revenue' => 1280],
        ['day' => 'Jun 2', 'visitors' => 2140, 'signups' => 102, 'revenue' => 1640],
        ['day' => 'Jun 3', 'visitors' => 1980, 'signups' => 94, 'revenue' => 1510],
        ['day' => 'Jun 4', 'visitors' => 2530, 'signups' => 128, 'revenue' => 2090],
        ['day' => 'Jun 5', 'visitors' => 2870, 'signups' => 146, 'revenue' => 2420],
        ['day' => 'Jun 6', 'visitors' => 3260, 'signups' => 173, 'revenue' => 2960],
        ['day' => 'Jun 7', 'visitors' => 3480, 'signups' => 188, 'revenue' => 3180],
    ];

    $analyticsConfig = [
        'visitors' => ['label' => 'Visitors', 'color' => 'var(--chart-1)'],
        'signups' => ['label' => 'Sign ups', 'color' => 'var(--chart-2)'],
    ];

    $deviceData = [
        ['device' => 'Desktop', 'sessions' => 12480],
        ['device' => 'Mobile', 'sessions' => 9480],
        ['device' => 'Tablet', 'sessions' => 2932],
    ];

    $deviceConfig = ['sessions' => ['label' => 'Sessions', 'color' => 'var(--chart-3)']];
@endphp

<div class="bg-muted/20 p-4 md:p-8">
    <div class="mx-auto max-w-6xl space-y-6">
        <div class="flex flex-wrap items-end justify-between gap-4"><div><p class="text-sm text-muted-foreground">Growth workspace</p><h2 class="text-2xl font-semibold tracking-tight">Analytics</h2><p class="mt-1 text-sm text-muted-foreground">Understand how visitors become customers.</p></div><div class="flex gap-2"><april:select class="w-36"><option>Last 30 days</option><option>Last 90 days</option><option>This year</option></april:select><april:button type="button" variant="outline" size="sm">Download</april:button></div></div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">@foreach ([['Visitors', '24,892', '+12.4%'], ['Sign ups', '1,284', '+8.2%'], ['Conversion', '5.16%', '+0.8%'], ['Revenue', '$18,432', '+15.3%']] as [$label, $value, $change])<april:card><slot:title class="text-sm font-medium">{{$label}}</slot:title><slot:content><p class="text-2xl font-bold">{{$value}}</p><p class="mt-1 text-xs text-emerald-600">{{$change}} from last month</p></slot:content></april:card>@endforeach</div>

        <april:chart label="Visitors and sign ups" :data="$analytics" :config="$analyticsConfig" xKey="day" type="area" height="280">
            <slot:header><div class="flex flex-wrap items-start justify-between gap-3"><div><h3 class="font-semibold">Conversion trend</h3><p class="text-sm text-muted-foreground">Visitors and sign ups over the last seven days.</p></div><april:badge variant="secondary">+18.2% this week</april:badge></div></slot:header>
        </april:chart>

        <div class="grid gap-4 lg:grid-cols-5">
            <april:chart class="lg:col-span-2" label="Sessions by device" :data="$deviceData" :config="$deviceConfig" xKey="device" type="bar" height="230">
                <slot:header><h3 class="font-semibold">Sessions by device</h3><p class="text-sm text-muted-foreground">Where your audience is browsing.</p></slot:header>
            </april:chart>
            <april:card class="lg:col-span-3"><slot:title>Top sources</slot:title><slot:description>Channels that brought the most qualified traffic.</slot:description><slot:content class="space-y-5">@foreach ([['Direct', '10,443', '42%', 'bg-primary'], ['Organic search', '7,702', '31%', 'bg-chart-2'], ['Referral', '4,481', '18%', 'bg-chart-3'], ['Social', '2,266', '9%', 'bg-chart-4']] as [$source, $sessions, $share, $color])<div><div class="flex items-center justify-between text-sm"><span class="font-medium">{{$source}}</span><span class="text-muted-foreground">{{$sessions}} sessions · {{$share}}</span></div><div class="mt-2 h-2 rounded-full bg-muted"><div class="h-full rounded-full {{$color}}" style="width: {{$share}}"></div></div></div>@endforeach</slot:content><slot:footer><april:button type="button" variant="outline" size="sm" class="w-full">View acquisition report</april:button></slot:footer></april:card>
        </div>
    </div>
</div>
