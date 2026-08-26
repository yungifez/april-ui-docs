@php
    $delivery = [
        ['week' => 'W1', 'planned' => 18, 'completed' => 12],
        ['week' => 'W2', 'planned' => 22, 'completed' => 17],
        ['week' => 'W3', 'planned' => 20, 'completed' => 19],
        ['week' => 'W4', 'planned' => 26, 'completed' => 21],
        ['week' => 'W5', 'planned' => 24, 'completed' => 23],
    ];

    $deliveryConfig = [
        'planned' => ['label' => 'Planned', 'color' => 'var(--chart-2)'],
        'completed' => ['label' => 'Completed', 'color' => 'var(--chart-1)'],
    ];
@endphp

<div class="bg-muted/20 p-4 md:p-8">
    <div class="mx-auto max-w-6xl space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-4"><div><p class="text-sm text-muted-foreground">Monday, June 8, 2026</p><h2 class="text-2xl font-semibold tracking-tight">Project overview</h2><p class="mt-1 text-sm text-muted-foreground">A clear view of delivery, risks, and next actions.</p></div><div class="flex gap-2"><april:button type="button" variant="outline" size="sm">Export</april:button><april:button type="button" size="sm"><x-lucide-plus class="mr-2 h-4 w-4" />New project</april:button></div></div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">@foreach ([['Active projects', '12', '+2 this month'], ['Tasks completed', '84%', '+8.4% from May'], ['At risk', '3', 'Needs attention'], ['Team capacity', '76%', '18 hours remaining']] as [$label, $value, $change])<april:card><slot:title class="text-sm font-medium">{{$label}}</slot:title><slot:content><p class="text-2xl font-bold">{{$value}}</p><p class="mt-1 text-xs text-muted-foreground">{{$change}}</p></slot:content></april:card>@endforeach</div>

        <div class="grid gap-4 lg:grid-cols-5">
            <april:chart class="lg:col-span-3" label="Planned and completed work" :data="$delivery" :config="$deliveryConfig" xKey="week" type="bar" height="250">
                <slot:header><h3 class="font-semibold">Delivery trend</h3><p class="text-sm text-muted-foreground">Planned and completed tasks by sprint week.</p></slot:header>
            </april:chart>
            <april:card class="lg:col-span-2"><slot:title>Due this week</slot:title><slot:description>Three tasks need a decision before Friday.</slot:description><slot:content class="space-y-4">@foreach (['Review launch copy', 'Approve mobile flow', 'Plan user research'] as $task)<div class="flex items-start gap-3"><april:checkbox /><span class="text-sm leading-5">{{$task}}</span></div>@endforeach</slot:content><slot:footer><april:button type="button" variant="outline" size="sm" class="w-full">View task list</april:button></slot:footer></april:card>
        </div>

        <april:card><slot:title>Projects</slot:title><slot:description>Track current health, ownership, and the latest change.</slot:description><slot:content><div class="overflow-x-auto"><table class="w-full min-w-[620px] text-left text-sm"><thead><tr class="border-b text-muted-foreground"><th class="pb-3 font-medium">Project</th><th class="pb-3 font-medium">Owner</th><th class="pb-3 font-medium">Progress</th><th class="pb-3 font-medium">Status</th><th class="pb-3 text-right font-medium">Updated</th></tr></thead><tbody>@foreach ([['Website refresh', 'Sofia Carter', '82%', 'On track', '2 hours ago'], ['Mobile app', 'Jackson Doe', '64%', 'Needs review', 'Yesterday'], ['Design system', 'Amelia Bell', '47%', 'On track', 'Monday'], ['Help center', 'Noah Rivera', '29%', 'At risk', 'Friday']] as [$project, $owner, $progress, $status, $updated])<tr class="border-b last:border-0"><td class="py-4 font-medium">{{$project}}</td><td class="py-4 text-muted-foreground">{{$owner}}</td><td class="py-4"><div class="flex items-center gap-3"><div class="h-2 w-24 rounded-full bg-muted"><div class="h-full rounded-full bg-primary" style="width: {{$progress}}"></div></div><span class="text-xs text-muted-foreground">{{$progress}}</span></div></td><td class="py-4"><april:badge variant="{{$status === 'On track' ? 'secondary' : ($status === 'At risk' ? 'destructive' : 'outline')}}">{{$status}}</april:badge></td><td class="py-4 text-right text-muted-foreground">{{$updated}}</td></tr>@endforeach</tbody></table></div></slot:content></april:card>
    </div>
</div>
