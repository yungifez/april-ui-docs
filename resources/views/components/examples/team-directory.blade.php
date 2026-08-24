@php
    $people = [
        ['id' => 1, 'name' => 'Olivia Martin', 'email' => 'olivia@example.com', 'role' => 'Owner', 'status' => 'Active', 'initials' => 'OM'],
        ['id' => 2, 'name' => 'Jackson Lee', 'email' => 'jackson@example.com', 'role' => 'Engineering', 'status' => 'Active', 'initials' => 'JL'],
        ['id' => 3, 'name' => 'Isabella Nguyen', 'email' => 'isabella@example.com', 'role' => 'Design', 'status' => 'Invited', 'initials' => 'IN'],
        ['id' => 4, 'name' => 'William Kim', 'email' => 'william@example.com', 'role' => 'Support', 'status' => 'Active', 'initials' => 'WK'],
        ['id' => 5, 'name' => 'Sofia Davis', 'email' => 'sofia@example.com', 'role' => 'Marketing', 'status' => 'Away', 'initials' => 'SD'],
    ];

    $columns = [
        ['key' => 'name', 'label' => 'Member', 'sortable' => true],
        ['key' => 'role', 'label' => 'Role', 'sortable' => true],
        ['key' => 'status', 'label' => 'Status'],
    ];
@endphp

<div class="bg-muted/20 p-4 md:p-8">
    <april:card class="mx-auto max-w-5xl">
        <slot:title class="flex items-center justify-between gap-4">Team members <april:button size="sm" type="button"><x-lucide-user-plus class="mr-2 h-4 w-4" />Invite member</april:button></slot:title>
        <slot:description>Manage who can access your workspace and their role.</slot:description>
        <slot:content>
            <april:data-table :data="$people" :columns="$columns" searchable selectable paginated :per-page="3">
                <slot:cell-name>
                    <div class="flex min-w-48 items-center gap-3">
                        <april:avatar size="sm"><slot:fallback x-text="row.initials"></slot:fallback></april:avatar>
                        <div class="min-w-0"><p class="truncate font-medium" x-text="row.name"></p><p class="truncate text-xs text-muted-foreground" x-text="row.email"></p></div>
                    </div>
                </slot:cell-name>
                <slot:cell-status>
                    <span class="inline-flex items-center gap-1.5 text-sm"><span class="size-1.5 rounded-full" :class="row.status === 'Active' ? 'bg-emerald-500' : row.status === 'Invited' ? 'bg-amber-500' : 'bg-muted-foreground'"></span><span x-text="row.status"></span></span>
                </slot:cell-status>
                <slot:actions><april:button variant="ghost" size="sm" type="button" aria-label="More actions"><x-lucide-ellipsis class="h-4 w-4" /></april:button></slot:actions>
            </april:data-table>
        </slot:content>
    </april:card>
</div>
