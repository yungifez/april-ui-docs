<div class="bg-muted/20 p-4 md:p-8">
    <div class="mx-auto grid max-w-4xl gap-4 lg:grid-cols-[1fr_280px]">
        <april:card><slot:title>June 2026</slot:title><slot:description>Plan your team schedule.</slot:description><slot:content><april:calendar class="rounded-md border" mode="single" :selected="now()" /></slot:content></april:card>
        <april:card><slot:title>Monday, June 8</slot:title><slot:description>3 meetings scheduled</slot:description><slot:content class="space-y-4">@foreach ([['09:00', 'Design review', 'Sofia Carter'], ['11:30', 'Team standup', 'Product team'], ['15:00', 'Customer call', 'Amelia Bell']] as [$time, $event, $owner])<div class="border-l-2 border-primary pl-3"><p class="text-xs text-muted-foreground">{{$time}}</p><p class="text-sm font-medium">{{$event}}</p><p class="text-xs text-muted-foreground">{{$owner}}</p></div>@endforeach</slot:content></april:card>
    </div>
</div>
