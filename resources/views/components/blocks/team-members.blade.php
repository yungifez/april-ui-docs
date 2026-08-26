<div class="flex min-h-[430px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-xl">
        <slot:title>Team members</slot:title>
        <slot:description>Invite your team to collaborate.</slot:description>
        <slot:content class="space-y-4">
            @foreach ([['SC', 'Sofia Carter', 'sofia@example.com', 'Owner'], ['JD', 'Jackson Doe', 'jackson@example.com', 'Member'], ['AB', 'Amelia Bell', 'amelia@example.com', 'Member']] as [$initials, $name, $email, $role])
                <div class="flex items-center gap-3"><april:avatar><slot:fallback>{{$initials}}</slot:fallback></april:avatar><div class="min-w-0 flex-1"><p class="truncate text-sm font-medium">{{$name}}</p><p class="truncate text-xs text-muted-foreground">{{$email}}</p></div><april:badge variant="{{$role === 'Owner' ? 'secondary' : 'outline'}}">{{$role}}</april:badge></div>
            @endforeach
            <april:button type="button" variant="outline" class="w-full"><x-lucide-user-plus class="mr-2 h-4 w-4" />Invite member</april:button>
        </slot:content>
    </april:card>
</div>
