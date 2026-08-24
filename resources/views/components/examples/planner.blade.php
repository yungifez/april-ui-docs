<div class="bg-muted/20 p-4 md:p-8">
    <div class="mx-auto grid max-w-5xl gap-4 lg:grid-cols-[auto_1fr]">
        <april:calendar selected="2026-08-24" />
        <april:card>
            <slot:title class="flex items-center justify-between">Monday, August 24 <april:button size="sm" type="button"><x-lucide-plus class="mr-2 h-4 w-4" />New task</april:button></slot:title>
            <slot:description>Three tasks are scheduled for today.</slot:description>
            <slot:content class="space-y-3">
                @foreach ([['09:30', 'Design critique', 'Review the onboarding prototype with the product team.', 'Design', 'bg-violet-500'], ['13:00', 'Customer interview', 'Listen in on the Acme discovery call.', 'Research', 'bg-sky-500'], ['16:30', 'Weekly planning', 'Prioritize the next release and assign owners.', 'Planning', 'bg-amber-500']] as [$time, $title, $description, $tag, $color])
                    <div class="flex gap-4 rounded-lg border p-3 transition-colors hover:bg-muted/50">
                        <span class="w-10 pt-0.5 text-xs font-medium text-muted-foreground">{{$time}}</span>
                        <span class="mt-1.5 size-2 shrink-0 rounded-full {{$color}}"></span>
                        <div class="min-w-0 flex-1"><p class="font-medium">{{$title}}</p><p class="mt-1 text-sm text-muted-foreground">{{$description}}</p><april:badge variant="secondary" class="mt-2">{{$tag}}</april:badge></div>
                        <april:button variant="ghost" size="sm" type="button" aria-label="Task options"><x-lucide-ellipsis class="h-4 w-4" /></april:button>
                    </div>
                @endforeach
            </slot:content>
        </april:card>
    </div>
</div>
