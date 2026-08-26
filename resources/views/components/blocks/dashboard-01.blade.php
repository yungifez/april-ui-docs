<div class="overflow-hidden rounded-xl border bg-background">
    <april:sidebar-layout>
        <april:sidebar collapsible="none" class="border-r">
            <slot:header><div class="flex items-center gap-2 px-2 py-1"><div class="flex h-7 w-7 items-center justify-center rounded-md bg-primary text-primary-foreground"><x-lucide-layers-3 class="h-4 w-4" /></div><span class="font-semibold">Northstar</span></div></slot:header>
            <slot:content>
                @foreach ([['layout-dashboard', 'Overview'], ['inbox', 'Inbox'], ['calendar', 'Calendar'], ['users', 'Team'], ['settings', 'Settings']] as [$icon, $label])
                    <april:sidebar-menu-item><april:sidebar-menu-button-link href="#" :active="$label === 'Overview'"><x-dynamic-component component="lucide-{{$icon}}" /><span>{{$label}}</span></april:sidebar-menu-button-link></april:sidebar-menu-item>
                @endforeach
            </slot:content>
            <slot:footer><div class="flex items-center gap-2 px-2 py-1"><april:avatar><slot:fallback>SC</slot:fallback></april:avatar><div class="min-w-0 text-sm"><p class="truncate font-medium">Sofia Carter</p><p class="truncate text-xs text-muted-foreground">sofia@example.com</p></div></div></slot:footer>
        </april:sidebar>
        <april:sidebar-inset>
            <header class="flex h-14 items-center justify-between border-b px-4"><div class="flex items-center gap-2"><april:sidebar-trigger /><span class="text-sm text-muted-foreground">Overview</span></div><april:button type="button" size="sm"><x-lucide-plus class="mr-2 h-4 w-4" />New project</april:button></header>
            <main class="space-y-6 p-4 lg:p-6">
                <div><h2 class="text-2xl font-semibold tracking-tight">Good morning, Sofia</h2><p class="text-sm text-muted-foreground">Here is a summary of your workspace.</p></div>
                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach ([['Revenue', '$45,231.89', '+20.1%'], ['Subscriptions', '+2,350', '+180.1%'], ['Sales', '+12,234', '+19%'], ['Active now', '+573', '+201 this hour']] as [$label, $value, $change])
                        <april:card><slot:title class="text-sm font-medium">{{$label}}</slot:title><slot:content><p class="text-2xl font-bold">{{$value}}</p><p class="mt-1 text-xs text-emerald-600">{{$change}} from last month</p></slot:content></april:card>
                    @endforeach
                </div>
                <div class="grid gap-4 lg:grid-cols-5">
                    <april:card class="lg:col-span-3"><slot:title>Recent activity</slot:title><slot:description>Your team shipped 12 updates this week.</slot:description><slot:content class="space-y-4">@foreach ([['AM', 'Alex Morgan', 'Updated the billing flow', '2m ago'], ['JD', 'Jackson Doe', 'Published a new component', '1h ago'], ['AB', 'Amelia Bell', 'Invited a new teammate', '3h ago']] as [$initials, $name, $action, $time])<div class="flex items-center gap-3"><april:avatar><slot:fallback>{{$initials}}</slot:fallback></april:avatar><div class="min-w-0 flex-1 text-sm"><p class="font-medium">{{$name}}</p><p class="truncate text-muted-foreground">{{$action}}</p></div><span class="text-xs text-muted-foreground">{{$time}}</span></div>@endforeach</slot:content></april:card>
                    <april:card class="lg:col-span-2"><slot:title>Recent sales</slot:title><slot:description>You made 265 sales this month.</slot:description><slot:content class="space-y-4">@foreach ([['OM', 'Olivia Martin', '+$1,999.00'], ['JL', 'Jackson Lee', '+$39.00'], ['IW', 'Isabella Wong', '+$299.00']] as [$initials, $name, $amount])<div class="flex items-center gap-3"><april:avatar><slot:fallback>{{$initials}}</slot:fallback></april:avatar><span class="min-w-0 flex-1 truncate text-sm">{{$name}}</span><span class="text-sm font-medium">{{$amount}}</span></div>@endforeach</slot:content></april:card>
                </div>
            </main>
        </april:sidebar-inset>
    </april:sidebar-layout>
</div>
