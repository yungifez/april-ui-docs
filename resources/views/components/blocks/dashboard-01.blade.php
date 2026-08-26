@php
    $revenue = [
        ['month' => 'Jan', 'revenue' => 18600, 'expenses' => 9200],
        ['month' => 'Feb', 'revenue' => 22400, 'expenses' => 10400],
        ['month' => 'Mar', 'revenue' => 19800, 'expenses' => 9800],
        ['month' => 'Apr', 'revenue' => 28600, 'expenses' => 12100],
        ['month' => 'May', 'revenue' => 34200, 'expenses' => 14800],
        ['month' => 'Jun', 'revenue' => 45231, 'expenses' => 17300],
    ];

    $revenueConfig = [
        'revenue' => ['label' => 'Revenue', 'color' => 'var(--chart-1)'],
        'expenses' => ['label' => 'Expenses', 'color' => 'var(--chart-2)'],
    ];

    $sales = [
        ['initials' => 'OM', 'name' => 'Olivia Martin', 'email' => 'olivia@example.com', 'amount' => '+$1,999.00'],
        ['initials' => 'JL', 'name' => 'Jackson Lee', 'email' => 'jackson@example.com', 'amount' => '+$399.00'],
        ['initials' => 'IW', 'name' => 'Isabella Wong', 'email' => 'isabella@example.com', 'amount' => '+$299.00'],
        ['initials' => 'DP', 'name' => 'Dylan Patel', 'email' => 'dylan@example.com', 'amount' => '+$129.00'],
    ];
@endphp

<div class="overflow-hidden rounded-xl border bg-background">
    <april:sidebar-layout>
        <april:sidebar collapsible="none" class="border-r">
            <slot:header>
                <div class="flex items-center gap-2 px-2 py-1">
                    <div class="flex h-7 w-7 items-center justify-center rounded-md bg-primary text-primary-foreground"><x-lucide-layers-3 class="h-4 w-4" /></div>
                    <span class="font-semibold">Northstar</span>
                </div>
            </slot:header>
            <slot:content>
                @foreach ([['layout-dashboard', 'Overview'], ['inbox', 'Inbox'], ['calendar', 'Calendar'], ['users', 'Team'], ['settings', 'Settings']] as [$icon, $label])
                    <april:sidebar-menu-item><april:sidebar-menu-button-link href="#" :active="$label === 'Overview'"><x-dynamic-component component="lucide-{{$icon}}" /><span>{{$label}}</span></april:sidebar-menu-button-link></april:sidebar-menu-item>
                @endforeach
            </slot:content>
            <slot:footer>
                <div class="flex items-center gap-2 px-2 py-1">
                    <april:avatar><slot:fallback>SC</slot:fallback></april:avatar>
                    <div class="min-w-0 text-sm"><p class="truncate font-medium">Sofia Carter</p><p class="truncate text-xs text-muted-foreground">sofia@example.com</p></div>
                </div>
            </slot:footer>
        </april:sidebar>
        <april:sidebar-inset>
            <header class="flex h-14 items-center justify-between border-b px-4">
                <div class="flex items-center gap-2"><april:sidebar-trigger /><span class="text-sm text-muted-foreground">Overview</span></div>
                <div class="flex items-center gap-2"><april:button type="button" variant="outline" size="sm">Export</april:button><april:button type="button" size="sm"><x-lucide-plus class="mr-2 h-4 w-4" />New project</april:button></div>
            </header>
            <main class="space-y-6 p-4 lg:p-6">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div><p class="text-sm text-muted-foreground">Monday, June 8, 2026</p><h2 class="text-2xl font-semibold tracking-tight">Good morning, Sofia</h2><p class="mt-1 text-sm text-muted-foreground">Here is a summary of your workspace.</p></div>
                    <april:select class="w-36"><option>Last 6 months</option><option>Last 30 days</option><option>This year</option></april:select>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach ([['Revenue', '$45,231.89', '+20.1%', 'trending-up'], ['Subscriptions', '2,350', '+180.1%', 'users'], ['Sales', '12,234', '+19.0%', 'shopping-cart'], ['Active now', '573', '+201 this hour', 'activity']] as [$label, $value, $change, $icon])
                        <april:card><slot:title class="flex items-center justify-between text-sm font-medium">{{$label}}<x-dynamic-component component="lucide-{{$icon}}" class="h-4 w-4 text-muted-foreground" /></slot:title><slot:content><p class="text-2xl font-bold">{{$value}}</p><p class="mt-1 text-xs text-emerald-600">{{$change}} from last month</p></slot:content></april:card>
                    @endforeach
                </div>

                <div class="grid gap-4 lg:grid-cols-5">
                    <april:chart class="lg:col-span-3" label="Revenue and expenses" :data="$revenue" :config="$revenueConfig" xKey="month" type="area" height="260">
                        <slot:header><h3 class="font-semibold">Revenue and expenses</h3><p class="text-sm text-muted-foreground">Monthly performance across the last six months.</p></slot:header>
                    </april:chart>
                    <april:card class="lg:col-span-2"><slot:title>Workspace goals</slot:title><slot:description>Keep the team moving toward this quarter's targets.</slot:description><slot:content class="space-y-5">@foreach ([['Launch readiness', '82%', 'bg-primary'], ['New subscriptions', '68%', 'bg-chart-2'], ['Support response time', '91%', 'bg-chart-3']] as [$goal, $value, $color])<div><div class="flex justify-between text-sm"><span>{{$goal}}</span><span class="font-medium">{{$value}}</span></div><div class="mt-2 h-2 rounded-full bg-muted"><div class="h-full rounded-full {{$color}}" style="width: {{$value}}"></div></div></div>@endforeach</slot:content><slot:footer><april:button type="button" variant="outline" size="sm" class="w-full">View reports</april:button></slot:footer></april:card>
                </div>

                <div class="grid gap-4 lg:grid-cols-5">
                    <april:card class="lg:col-span-3"><slot:title>Recent activity</slot:title><slot:description>Your team shipped 12 updates this week.</slot:description><slot:content class="space-y-4">@foreach ([['AM', 'Alex Morgan', 'Updated the billing flow', '2m ago'], ['JD', 'Jackson Doe', 'Published a new component', '1h ago'], ['AB', 'Amelia Bell', 'Invited a new teammate', '3h ago'], ['NR', 'Noah Rivera', 'Closed the launch checklist', '5h ago']] as [$initials, $name, $action, $time])<div class="flex items-center gap-3"><april:avatar><slot:fallback>{{$initials}}</slot:fallback></april:avatar><div class="min-w-0 flex-1 text-sm"><p class="font-medium">{{$name}}</p><p class="truncate text-muted-foreground">{{$action}}</p></div><span class="text-xs text-muted-foreground">{{$time}}</span></div>@endforeach</slot:content></april:card>
                    <april:card class="lg:col-span-2"><slot:title>Recent sales</slot:title><slot:description>You made 265 sales this month.</slot:description><slot:content class="space-y-4">@foreach ($sales as $sale)<div class="flex items-center gap-3"><april:avatar><slot:fallback>{{$sale['initials']}}</slot:fallback></april:avatar><div class="min-w-0 flex-1"><p class="truncate text-sm font-medium">{{$sale['name']}}</p><p class="truncate text-xs text-muted-foreground">{{$sale['email']}}</p></div><span class="text-sm font-medium">{{$sale['amount']}}</span></div>@endforeach</slot:content></april:card>
                </div>
            </main>
        </april:sidebar-inset>
    </april:sidebar-layout>
</div>
