<x-layout title="Examples" description="Composable application examples built with April UI.">
    <div class="mx-auto max-w-screen-xl px-3 py-10 md:px-10">
        <div class="max-w-2xl space-y-3">
            <april:badge variant="secondary">Examples</april:badge>
            <h1 class="text-4xl font-bold tracking-tight">Build complete surfaces from small components.</h1>
            <p class="text-lg text-muted-foreground">
                Explore application layouts composed from April UI primitives. Copy the structure, then make it yours.
            </p>
        </div>

        <div class="mt-10 space-y-12">
            <section class="space-y-4">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight">Dashboard</h2>
                    <p class="mt-2 text-muted-foreground">A responsive workspace with navigation, metrics, activity, and
                        recent sales.</p>
                </div>
                <x-component-preview component="examples.dashboard" image="{{ asset('images/examples/dashboard.png') }}" imageAlt="Dashboard example" />
            </section>

            <section class="space-y-4">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight">Sign-in form</h2>
                    <p class="mt-2 text-muted-foreground">A focused authentication surface with inputs, actions, and
                        supporting copy.</p>
                </div>
                <x-component-preview component="examples.login" image="{{ asset('images/examples/login.png') }}" imageAlt="Sign-in form example" />
            </section>

            <section class="space-y-4">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight">Settings</h2>
                    <p class="mt-2 text-muted-foreground">Organize account preferences with tabs, form controls, and
                        clear save actions.</p>
                </div>
                <x-component-preview component="examples.settings" image="{{ asset('images/examples/settings.png') }}" imageAlt="Settings example" />
            </section>

            <section class="space-y-4">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight">Command center</h2>
                    <p class="mt-2 text-muted-foreground">Pair command menus with quick actions for dense application
                        workflows.</p>
                </div>
                <x-component-preview component="examples.command-center" image="{{ asset('images/examples/command-center.png') }}" imageAlt="Command center example" />
            </section>

            <section class="space-y-4">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight">Activity feed</h2>
                    <p class="mt-2 text-muted-foreground">A compact feed using avatars, badges, alerts, and separators.
                    </p>
                </div>
                <x-component-preview component="examples.activity-feed" image="{{ asset('images/examples/activity-feed.png') }}" imageAlt="Activity feed example" />
            </section>
        </div>

        <div class="mt-16 rounded-xl border bg-muted/20 p-6">
            <p class="text-sm font-medium">Used across these examples</p>
            <div class="mt-4 flex flex-wrap gap-2">
                @foreach (['Sidebar', 'Card', 'Button', 'Input', 'Tabs', 'Command', 'Avatar', 'Badge', 'Alert'] as $componentName)
                <april:badge variant="outline">{{$componentName}}</april:badge>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
