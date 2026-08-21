<div class="overflow-hidden rounded-xl border bg-background shadow-sm">
    <april:sidebar-layout>
        <april:sidebar collapsible="none" class="border-r">
            <slot:header>
                <div class="flex items-center gap-2 px-2 py-1">
                    <div class="flex h-7 w-7 items-center justify-center rounded-md bg-primary text-primary-foreground">
                        <x-lucide-layers-3 class="h-4 w-4" />
                    </div>
                    <span class="font-semibold">April UI</span>
                </div>
            </slot:header>
            <slot:content>
                <april:sidebar-group>
                    <april:sidebar-group-label>Workspace</april:sidebar-group-label>
                    <april:sidebar-group-content>
                        <april:sidebar-menu>
                            <april:sidebar-menu-item>
                                <april:sidebar-menu-button-link href="#" :active="true">
                                    <x-lucide-layout-dashboard />
                                    <span>Overview</span>
                                </april:sidebar-menu-button-link>
                            </april:sidebar-menu-item>
                            <april:sidebar-menu-item>
                                <april:sidebar-menu-button-link href="#">
                                    <x-lucide-inbox />
                                    <span>Inbox</span>
                                    <april:sidebar-menu-badge>12</april:sidebar-menu-badge>
                                </april:sidebar-menu-button-link>
                            </april:sidebar-menu-item>
                            <april:sidebar-menu-item>
                                <april:sidebar-menu-button-link href="#">
                                    <x-lucide-calendar />
                                    <span>Calendar</span>
                                </april:sidebar-menu-button-link>
                            </april:sidebar-menu-item>
                        </april:sidebar-menu>
                    </april:sidebar-group-content>
                </april:sidebar-group>
                <april:sidebar-group>
                    <april:sidebar-group-label>Manage</april:sidebar-group-label>
                    <april:sidebar-group-content>
                        <april:sidebar-menu>
                            <april:sidebar-menu-item>
                                <april:sidebar-menu-button-link href="#">
                                    <x-lucide-users />
                                    <span>Team</span>
                                </april:sidebar-menu-button-link>
                            </april:sidebar-menu-item>
                            <april:sidebar-menu-item>
                                <april:sidebar-menu-button-link href="#">
                                    <x-lucide-settings />
                                    <span>Settings</span>
                                </april:sidebar-menu-button-link>
                            </april:sidebar-menu-item>
                        </april:sidebar-menu>
                    </april:sidebar-group-content>
                </april:sidebar-group>
            </slot:content>
            <slot:footer>
                <div class="flex items-center gap-2 px-2 py-1">
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-full border bg-muted text-xs font-medium">
                        PD</div>
                    <div class="min-w-0 text-sm">
                        <p class="truncate font-medium">Pedro Duarte</p>
                        <p class="truncate text-xs text-muted-foreground">pedro@example.com</p>
                    </div>
                </div>
            </slot:footer>
        </april:sidebar>

        <april:sidebar-inset>
            <header class="flex h-14 items-center justify-between border-b px-4 lg:px-6">
                <div class="flex items-center gap-2">
                    <april:sidebar-trigger />
                    <span class="text-sm text-muted-foreground">Overview</span>
                </div>
                <april:button size="sm">
                    <x-lucide-plus class="mr-2 h-4 w-4" />
                    New project
                </april:button>
            </header>

            <main class="space-y-6 p-4 lg:p-6">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight">Good morning, Pedro</h2>
                    <p class="text-sm text-muted-foreground">Here is a summary of your workspace.</p>
                </div>

                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                    <april:card>
                        <slot:title class="text-sm font-medium">Total revenue</slot:title>
                        <slot:content>
                            <div class="text-2xl font-bold">$45,231.89</div>
                            <p class="text-xs text-muted-foreground">+20.1% from last month</p>
                        </slot:content>
                    </april:card>
                    <april:card>
                        <slot:title class="text-sm font-medium">Subscriptions</slot:title>
                        <slot:content>
                            <div class="text-2xl font-bold">+2,350</div>
                            <p class="text-xs text-muted-foreground">+180.1% from last month</p>
                        </slot:content>
                    </april:card>
                    <april:card>
                        <slot:title class="text-sm font-medium">Sales</slot:title>
                        <slot:content>
                            <div class="text-2xl font-bold">+12,234</div>
                            <p class="text-xs text-muted-foreground">+19% from last month</p>
                        </slot:content>
                    </april:card>
                    <april:card>
                        <slot:title class="text-sm font-medium">Active now</slot:title>
                        <slot:content>
                            <div class="text-2xl font-bold">+573</div>
                            <p class="text-xs text-muted-foreground">+201 since last hour</p>
                        </slot:content>
                    </april:card>
                </div>

                <div class="grid gap-4 lg:grid-cols-7">
                    <april:card class="lg:col-span-4">
                        <slot:title>Recent activity</slot:title>
                        <slot:description>Your team shipped 12 updates this week.</slot:description>
                        <slot:content>
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full border bg-muted text-xs font-medium">
                                        AM</div>
                                    <div class="flex-1 text-sm">
                                        <p class="font-medium">Alex Morgan</p>
                                        <p class="text-muted-foreground">Updated the billing flow</p>
                                    </div>
                                    <span class="text-xs text-muted-foreground">2m ago</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full border bg-muted text-xs font-medium">
                                        JP</div>
                                    <div class="flex-1 text-sm">
                                        <p class="font-medium">Jamie Park</p>
                                        <p class="text-muted-foreground">Published a new component</p>
                                    </div>
                                    <span class="text-xs text-muted-foreground">1h ago</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full border bg-muted text-xs font-medium">
                                        SR</div>
                                    <div class="flex-1 text-sm">
                                        <p class="font-medium">Sam Rivera</p>
                                        <p class="text-muted-foreground">Invited a new teammate</p>
                                    </div>
                                    <span class="text-xs text-muted-foreground">3h ago</span>
                                </div>
                            </div>
                        </slot:content>
                    </april:card>
                    <april:card class="lg:col-span-3">
                        <slot:title>Recent sales</slot:title>
                        <slot:description>You made 265 sales this month.</slot:description>
                        <slot:content>
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full border bg-muted text-xs font-medium">
                                        OM</div>
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-sm font-medium">Olivia Martin</p>
                                        <p class="truncate text-xs text-muted-foreground">olivia@example.com</p>
                                    </div><span class="text-sm font-medium">+$1,999.00</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full border bg-muted text-xs font-medium">
                                        JL</div>
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-sm font-medium">Jackson Lee</p>
                                        <p class="truncate text-xs text-muted-foreground">jackson@example.com</p>
                                    </div><span class="text-sm font-medium">+$39.00</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full border bg-muted text-xs font-medium">
                                        IW</div>
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-sm font-medium">Isabella Wong</p>
                                        <p class="truncate text-xs text-muted-foreground">isabella@example.com</p>
                                    </div><span class="text-sm font-medium">+$299.00</span>
                                </div>
                            </div>
                        </slot:content>
                    </april:card>
                </div>
            </main>
        </april:sidebar-inset>
    </april:sidebar-layout>
</div>
