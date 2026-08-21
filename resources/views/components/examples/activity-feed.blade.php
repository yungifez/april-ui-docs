<div class="bg-muted/20 p-4 md:p-8">
    <div class="mx-auto max-w-2xl space-y-4">
        <april:alert>
            <slot:icon><x-lucide-check-circle-2 class="h-4 w-4" /></slot:icon>
            <slot:title>All caught up</slot:title>
            <slot:description>Your team has no unread activity.</slot:description>
        </april:alert>
        <april:card>
            <slot:title>Recent activity</slot:title>
            <slot:description>Updates from your workspace.</slot:description>
            <slot:content class="space-y-5">
                @foreach ([
                    ['initials' => 'AM', 'name' => 'Alex Morgan', 'action' => 'updated the billing flow', 'time' => '2m ago', 'badge' => 'Billing'],
                    ['initials' => 'JP', 'name' => 'Jamie Park', 'action' => 'published a new component', 'time' => '1h ago', 'badge' => 'Components'],
                    ['initials' => 'SR', 'name' => 'Sam Rivera', 'action' => 'invited a new teammate', 'time' => '3h ago', 'badge' => 'Team'],
                ] as $activity)
                <div class="flex items-start gap-3">
                    <april:avatar size="sm"><slot:fallback>{{$activity['initials']}}</slot:fallback></april:avatar>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm"><span class="font-medium">{{$activity['name']}}</span> {{$activity['action']}}</p>
                        <div class="mt-1 flex items-center gap-2"><april:badge variant="secondary">{{$activity['badge']}}</april:badge><span
                                class="text-xs text-muted-foreground">{{$activity['time']}}</span></div>
                    </div>
                </div>
                @if (!$loop->last)<april:separator />@endif
                @endforeach
            </slot:content>
        </april:card>
    </div>
</div>
