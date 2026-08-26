<div class="flex min-h-[440px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-lg">
        <slot:title>Notifications</slot:title>
        <slot:description>You have 3 unread messages.</slot:description>
        <slot:content class="space-y-5">
            <div class="flex items-center justify-between gap-4"><div><p class="text-sm font-medium">Push notifications</p><p class="text-sm text-muted-foreground">Send alerts to this device.</p></div><april:switch checked /></div>
            <april:separator />
            <div class="space-y-4">
                @foreach ([['Your call has been confirmed.', '5 minutes ago'], ['You have a new message.', '1 hour ago'], ['Your weekly report is ready.', 'Yesterday']] as [$message, $time])
                    <div class="flex items-start gap-3"><div class="mt-1 h-2 w-2 rounded-full bg-primary"></div><div class="flex-1"><p class="text-sm font-medium">{{$message}}</p><p class="text-xs text-muted-foreground">{{$time}}</p></div></div>
                @endforeach
            </div>
            <april:button type="button" variant="outline" class="w-full">Mark all as read</april:button>
        </slot:content>
    </april:card>
</div>
