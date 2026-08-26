@php
    $blocks = [
        [
            'title' => 'Dashboard',
            'category' => 'Dashboards',
            'description' => 'A full workspace with navigation, metrics, activity, and recent sales.',
            'component' => 'examples.dashboard',
            'image' => asset('images/examples/dashboard.png'),
            'imageAlt' => 'Dashboard block preview',
            'featured' => true,
            'tags' => ['sidebar', 'card', 'data'],
        ],
        [
            'title' => 'Analytics overview',
            'category' => 'Dashboards',
            'description' => 'Show performance metrics with a responsive chart and channel breakdown.',
            'component' => 'examples.analytics',
            'image' => asset('images/examples/analytics.png'),
            'imageAlt' => 'Analytics block preview',
            'featured' => false,
            'tags' => ['chart', 'metrics', 'card'],
        ],
        [
            'title' => 'Sign-in',
            'category' => 'Authentication',
            'description' => 'A focused sign-in form with password recovery and an OAuth action.',
            'component' => 'examples.login',
            'image' => asset('images/examples/login.png'),
            'imageAlt' => 'Sign-in block preview',
            'featured' => false,
            'tags' => ['form', 'input', 'button'],
        ],
        [
            'title' => 'Workspace setup',
            'category' => 'Authentication',
            'description' => 'Collect the details that you need before a user enters a new workspace.',
            'component' => 'blocks.onboarding',
            'image' => null,
            'imageAlt' => 'Workspace setup block preview',
            'featured' => false,
            'tags' => ['form', 'select', 'textarea'],
        ],
        [
            'title' => 'Settings',
            'category' => 'Workspace',
            'description' => 'Organize account preferences with tabs, form controls, and save actions.',
            'component' => 'examples.settings',
            'image' => asset('images/examples/settings.png'),
            'imageAlt' => 'Settings block preview',
            'featured' => false,
            'tags' => ['tabs', 'form', 'switch'],
        ],
        [
            'title' => 'Team directory',
            'category' => 'Workspace',
            'description' => 'List team members with status, roles, actions, and an invite control.',
            'component' => 'examples.team-directory',
            'image' => asset('images/examples/team-directory.png'),
            'imageAlt' => 'Team directory block preview',
            'featured' => false,
            'tags' => ['table', 'avatar', 'menu'],
        ],
        [
            'title' => 'Command center',
            'category' => 'Workspace',
            'description' => 'Give common tasks a compact home with quick actions and keyboard-friendly controls.',
            'component' => 'examples.command-center',
            'image' => asset('images/examples/command-center.png'),
            'imageAlt' => 'Command center block preview',
            'featured' => false,
            'tags' => ['command', 'actions', 'search'],
        ],
        [
            'title' => 'Pricing',
            'category' => 'Marketing',
            'description' => 'Compare plans with clear feature lists and a primary plan state.',
            'component' => 'blocks.pricing',
            'image' => null,
            'imageAlt' => 'Pricing block preview',
            'featured' => false,
            'tags' => ['card', 'badge', 'button'],
        ],
        [
            'title' => 'Landing hero',
            'category' => 'Marketing',
            'description' => 'Introduce a product with a concise message, two actions, and proof points.',
            'component' => 'blocks.landing-hero',
            'image' => null,
            'imageAlt' => 'Landing hero block preview',
            'featured' => false,
            'tags' => ['badge', 'button', 'marketing'],
        ],
        [
            'title' => 'Empty state',
            'category' => 'Communication',
            'description' => 'Help users understand an empty screen and give them a useful next action.',
            'component' => 'blocks.empty-state',
            'image' => null,
            'imageAlt' => 'Empty state block preview',
            'featured' => false,
            'tags' => ['card', 'button', 'message'],
        ],
        [
            'title' => 'Activity feed',
            'category' => 'Communication',
            'description' => 'Show recent changes with avatars, labels, timestamps, and status states.',
            'component' => 'examples.activity-feed',
            'image' => asset('images/examples/activity-feed.png'),
            'imageAlt' => 'Activity feed block preview',
            'featured' => false,
            'tags' => ['avatar', 'badge', 'alert'],
        ],
        [
            'title' => 'Conversation workspace',
            'category' => 'Communication',
            'description' => 'Combine a message thread, participant context, and a reply composer.',
            'component' => 'examples.conversation',
            'image' => asset('images/examples/conversation.png'),
            'imageAlt' => 'Conversation workspace block preview',
            'featured' => false,
            'tags' => ['bubble', 'avatar', 'textarea'],
        ],
    ];

    $categories = ['All', 'Dashboards', 'Authentication', 'Workspace', 'Marketing', 'Communication'];
@endphp

<x-layout title="Blocks" description="Composed application blocks built with April UI.">
    <div x-data="{ category: 'All', query: '' }" class="border-b">
        <section class="border-b bg-muted/20">
            <div class="mx-auto max-w-screen-xl px-4 py-14 md:px-10 md:py-20">
                <div class="max-w-3xl">
                    <april:badge variant="secondary">Blocks</april:badge>
                    <h1 class="mt-4 text-4xl font-bold tracking-tight md:text-6xl">Product surfaces, ready to compose.</h1>
                    <p class="mt-5 max-w-2xl text-lg leading-8 text-muted-foreground">
                        Start with a complete interface pattern. Every block uses April UI components, semantic theme
                        tokens, and Blade templates that you can copy into your application.
                    </p>
                    <div class="mt-7 flex flex-wrap gap-3">
                        <april:button-link href="{{'/docs/' . config('aui.latest-version')}}" variant="outline">
                            Read the docs
                            <x-lucide-arrow-right class="ml-2 h-4 w-4" />
                        </april:button-link>
                        <april:button-link href="https://ui.shadcn.com/blocks" target="_blank" variant="ghost">
                            See the inspiration
                            <x-lucide-arrow-up-right class="ml-2 h-4 w-4" />
                        </april:button-link>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-screen-xl px-4 py-10 md:px-10 md:py-14">
            <div class="flex flex-col gap-4 border-b pb-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight">Browse blocks</h2>
                    <p class="mt-1 text-sm text-muted-foreground">Preview a block, then open its code tab to copy the Blade template.</p>
                </div>
                <div class="relative w-full lg:max-w-xs">
                    <x-lucide-search class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />
                    <april:input x-model="query" type="search" placeholder="Search blocks..." aria-label="Search blocks" class="w-full pl-9" />
                </div>
            </div>

            <div class="mt-5 flex flex-wrap gap-2" role="group" aria-label="Filter blocks by category">
                @foreach ($categories as $category)
                    <april:button type="button" size="sm" variant="outline"
                        @click="category = '{{$category}}'"
                        x-bind:class="category === '{{$category}}' ? 'border-primary bg-accent text-accent-foreground' : ''">
                        {{$category}}
                    </april:button>
                @endforeach
            </div>

            <div class="mt-8 grid gap-10 lg:grid-cols-2">
                @foreach ($blocks as $block)
                    @php
                        $searchText = strtolower($block['title'].' '.$block['category'].' '.$block['description'].' '.implode(' ', $block['tags']));
                    @endphp
                    <article data-block-card data-search="{{$searchText}}" x-show="(category === 'All' || category === '{{$block['category']}}') && (!query || $el.dataset.search.includes(query.toLowerCase()))"
                        @class(['min-w-0', 'lg:col-span-2' => $block['featured']])>
                        <div class="mb-3 flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wider text-primary">{{$block['category']}}</p>
                                <h3 class="mt-1 text-xl font-semibold tracking-tight">{{$block['title']}}</h3>
                                <p class="mt-1 max-w-2xl text-sm leading-6 text-muted-foreground">{{$block['description']}}</p>
                            </div>
                            <april:badge variant="outline" class="shrink-0">{{$block['category']}}</april:badge>
                        </div>
                        <x-component-preview
                            :component="$block['component']"
                            :image="$block['image']"
                            :image-alt="$block['imageAlt']"
                            :title="'blade'"
                        />
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach ($block['tags'] as $tag)
                                <april:badge variant="secondary" class="text-xs">{{$tag}}</april:badge>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12 rounded-lg border border-dashed p-6 text-center">
                <p class="font-medium">Need a smaller building block?</p>
                <p class="mt-1 text-sm text-muted-foreground">Use the component catalog for focused controls and interaction details.</p>
                <april:button-link href="{{'/docs/' . config('aui.latest-version').'/components/accordion'}}" variant="link" size="sm" class="mt-2">
                    Browse components
                    <x-lucide-arrow-right class="ml-2 h-4 w-4" />
                </april:button-link>
            </div>
        </section>
    </div>
</x-layout>
