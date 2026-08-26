<div class="flex min-h-[420px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-lg">
        <slot:title>Share project brief</slot:title>
        <slot:description>Anyone with the link can view this document.</slot:description>
        <slot:content class="space-y-5">
            <div class="flex gap-2"><april:input value="april.dev/brief-9f2k" readonly class="min-w-0 flex-1" /><april:button type="button" variant="outline">Copy</april:button></div>
            <div class="space-y-4">
                <p class="text-sm font-medium">People with access</p>
                @foreach ([['SC', 'Sofia Carter', 'sofia@example.com', 'Owner'], ['JD', 'Jackson Doe', 'jackson@example.com', 'Can edit'], ['AM', 'Amelia Bell', 'amelia@example.com', 'Can view']] as [$initials, $name, $email, $role])
                    <div class="flex items-center gap-3"><april:avatar><slot:fallback>{{$initials}}</slot:fallback></april:avatar><div class="min-w-0 flex-1"><p class="truncate text-sm font-medium">{{$name}}</p><p class="truncate text-xs text-muted-foreground">{{$email}}</p></div><april:badge variant="outline">{{$role}}</april:badge></div>
                @endforeach
            </div>
            <april:button type="button" class="w-full">Invite people</april:button>
        </slot:content>
    </april:card>
</div>
