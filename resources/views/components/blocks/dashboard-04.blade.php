@php
    $velocity = [
        ['sprint' => 'Sprint 1', 'planned' => 24, 'completed' => 20],
        ['sprint' => 'Sprint 2', 'planned' => 28, 'completed' => 26],
        ['sprint' => 'Sprint 3', 'planned' => 30, 'completed' => 25],
        ['sprint' => 'Sprint 4', 'planned' => 32, 'completed' => 31],
    ];

    $velocityConfig = [
        'planned' => ['label' => 'Planned points', 'color' => 'var(--chart-2)'],
        'completed' => ['label' => 'Completed points', 'color' => 'var(--chart-1)'],
    ];

    $columns = [
        ['To do', [['Prepare brief', 'SC', 'High'], ['Collect references', 'JD', 'Medium'], ['Confirm launch date', 'NR', 'Low']]],
        ['In progress', [['Build landing page', 'AB', 'High'], ['Review copy', 'SC', 'Medium'], ['Set up analytics', 'JD', 'Low']]],
        ['Done', [['Set up repository', 'JD', 'Done'], ['Choose type scale', 'AB', 'Done'], ['Create wireframes', 'SC', 'Done']]],
    ];
@endphp

<div class="bg-muted/20 p-4 md:p-8">
    <div class="mx-auto max-w-6xl space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-4"><div><p class="text-sm text-muted-foreground">Workspace / Projects / Website</p><h2 class="text-2xl font-semibold tracking-tight">Launch website</h2><p class="mt-1 text-sm text-muted-foreground">Sprint 4 · 12 days remaining · 68% complete</p></div><div class="flex gap-2"><april:button type="button" variant="outline" size="sm">Share</april:button><april:button type="button" size="sm"><x-lucide-plus class="mr-2 h-4 w-4" />Add task</april:button></div></div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">@foreach ([['Sprint progress', '68%', '18 of 26 tasks'], ['Open tasks', '14', '3 due today'], ['Team members', '8', '2 active now'], ['Days remaining', '12', 'On track']] as [$label, $value, $change])<april:card><slot:title class="text-sm font-medium">{{$label}}</slot:title><slot:content><p class="text-2xl font-bold">{{$value}}</p><p class="mt-1 text-xs text-muted-foreground">{{$change}}</p></slot:content></april:card>@endforeach</div>

        <april:chart label="Sprint velocity" :data="$velocity" :config="$velocityConfig" xKey="sprint" type="line" height="250">
            <slot:header><h3 class="font-semibold">Sprint velocity</h3><p class="text-sm text-muted-foreground">Compare planned and completed story points.</p></slot:header>
        </april:chart>

        <div class="grid gap-4 md:grid-cols-3">
            @foreach ($columns as [$column, $tasks])
                <april:card><slot:title class="flex items-center justify-between text-base">{{$column}}<april:badge variant="outline">{{count($tasks)}}</april:badge></slot:title><slot:content class="space-y-3">@foreach ($tasks as [$task, $initials, $priority])<div class="rounded-md border bg-background p-3"><div class="flex items-start justify-between gap-2"><p class="text-sm font-medium">{{$task}}</p><april:button type="button" variant="ghost" size="icon"><x-lucide-ellipsis class="h-4 w-4" /></april:button></div><div class="mt-3 flex items-center justify-between"><div class="flex items-center gap-2"><april:avatar><slot:fallback>{{$initials}}</slot:fallback></april:avatar><span class="text-xs text-muted-foreground">{{$initials}}</span></div><april:badge variant="{{$priority === 'High' ? 'destructive' : ($priority === 'Done' ? 'secondary' : 'outline')}}">{{$priority}}</april:badge></div></div>@endforeach</slot:content><slot:footer><april:button type="button" variant="ghost" size="sm" class="w-full"><x-lucide-plus class="mr-2 h-4 w-4" />Add task</april:button></slot:footer></april:card>
            @endforeach
        </div>
    </div>
</div>
