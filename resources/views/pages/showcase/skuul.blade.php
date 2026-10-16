@php
    $shots = [
        [
            'slug' => 'dashboard',
            'title' => 'Administrator dashboard',
            'description' => 'Setup progress, school totals, attendance for today, and the next seven days.',
            'alt' => 'The Skuul administrator dashboard with a sidebar, school setup progress, school totals, and attendance for today',
            'class' => 'lg:col-span-2',
        ],
        [
            'slug' => 'gradebook',
            'title' => 'Gradebook',
            'description' => 'Teachers add assessments with a type, a weight, and a due date, then enter marks.',
            'alt' => 'The Skuul gradebook with a form to add an assessment, and an empty marks list',
            'class' => '',
        ],
        [
            'slug' => 'timetable',
            'title' => 'Timetable',
            'description' => 'A weekly schedule with day, week, and month views. Publish it when it is ready.',
            'alt' => 'The Skuul timetable showing a draft weekly schedule in a month calendar, with a Publish button',
            'class' => '',
        ],
        [
            'slug' => 'finance',
            'title' => 'Finance ledger',
            'description' => 'Owed, received, and spent at the top. A searchable table of invoices below.',
            'alt' => 'The Skuul finance page with totals for owed, overdue, received, and spent, above a table of invoices',
            'class' => '',
        ],
        [
            'slug' => 'family',
            'title' => 'Family portal',
            'description' => 'A parent picks a campus and goes straight to results, attendance, and payments.',
            'alt' => 'The Skuul family portal showing one campus and one enrolled child, with shortcuts to results, attendance, and invoices',
            'class' => '',
        ],
    ];

    $components = [
        ['button', 'Button', 'Every action, from Publish to Add invoice.'],
        ['card', 'Card', 'Dashboard panels and campus cards.'],
        ['data-table', 'Data Table', 'Invoices, students, and teachers, with search and sorting.'],
        ['dropdown-menu', 'Dropdown Menu', 'Row actions and the user menu.'],
        ['input-group', 'Input Group', 'Fields with units, icons, and buttons.'],
        ['badge', 'Badge', 'Status labels such as Draft and Editing open.'],
        ['alert', 'Alert', 'Notices and form errors.'],
        ['dialog', 'Dialog', 'Confirmations and quick forms.'],
        ['combobox', 'Combobox', 'Search-as-you-type pickers for students and classes.'],
        ['chart', 'Chart', 'Attendance and fee trends.'],
        ['steps', 'Steps', 'The school setup checklist.'],
        ['sidebar', 'Sidebar', 'The app shell, with grouped navigation.'],
        ['tooltip', 'Tooltip', 'Short hints on icon buttons.'],
    ];

    $features = [
        ['building-2', 'Multi-campus schools', 'Run many campuses from one place. Each campus keeps its own records.'],
        ['graduation-cap', 'Gradebook', 'Assessments, weights, marks, and results for every subject.'],
        ['calendar-days', 'Timetables', 'Build weekly schedules, publish them, and print them.'],
        ['wallet', 'Finance ledger', 'Invoices, payments, and balances for each school year.'],
        ['clipboard-check', 'Attendance', 'Take the register in seconds and see who is present.'],
        ['users', 'Family portal', 'Parents see results, attendance, and invoices for their children.'],
        ['share-2', 'Record sharing between campuses', 'Share a learner’s records with another campus when they move.'],
    ];
@endphp

<x-layout
    title="Skuul, built with April UI"
    description="Skuul is an open-source school management system. See how it uses April UI for its dashboards, tables, forms, and navigation."
>
    <div class="overflow-hidden">
        <section class="relative border-b">
            <div class="marketing-grid absolute inset-0 -z-10 opacity-50"></div>
            <div class="mx-auto max-w-screen-xl px-4 pb-16 pt-16 md:px-10 md:pb-24 md:pt-24">
                <div class="max-w-3xl">
                    <p data-april-reveal class="april-reveal text-sm font-medium text-primary" style="--april-delay: 60ms">Showcase · Skuul</p>
                    <h1 data-april-reveal class="april-reveal mt-5 text-balance text-4xl font-bold tracking-tight md:text-6xl" style="--april-delay: 130ms">A whole school, built with April.</h1>
                    <p data-april-reveal class="april-reveal mt-5 max-w-2xl text-lg leading-8 text-muted-foreground" style="--april-delay: 200ms">
                        Skuul is an open-source school management system. It is a real Laravel app with real data, and every screen comes from April components.
                    </p>
                    <div data-april-reveal class="april-reveal mt-8 flex flex-wrap gap-3" style="--april-delay: 270ms">
                        <april:button-link href="https://demo.skuul.org" target="_blank" rel="noreferrer" size="lg" class="april-lift font-semibold">Live demo <x-lucide-arrow-up-right class="ml-2 size-4" /></april:button-link>
                        <april:button-link href="https://github.com/yungifez/skuul" target="_blank" rel="noreferrer" variant="outline" size="lg" class="april-lift font-semibold"><x-lucide-github class="mr-2 size-4" />Source</april:button-link>
                        <april:button-link href="https://skuul.org" target="_blank" rel="noreferrer" variant="ghost" size="lg" class="april-lift">Skuul docs <x-lucide-arrow-up-right class="ml-2 size-4" /></april:button-link>
                    </div>
                </div>
                <div data-april-reveal class="april-reveal relative mt-14" style="--april-delay: 220ms">
                    <div class="absolute -inset-5 rounded-[2rem] bg-primary/5 blur-2xl"></div>
                    <div class="april-hero-frame relative rounded-2xl border bg-muted/60 p-2 shadow-2xl shadow-primary/10">
                        <div class="flex items-center justify-between border-b px-3 pb-3 pt-1 text-xs text-muted-foreground">
                            <span>Skuul, administrator dashboard</span>
                            <span class="font-mono">Blade + Livewire</span>
                        </div>
                        <div class="dark:hidden"><img src="{{ asset('images/skuul/dashboard-light.webp') }}" alt="{{ $shots[0]['alt'] }} in light mode" width="1600" height="1000" class="block w-full rounded-lg border bg-background object-cover object-top" /></div>
                        <div class="hidden dark:block"><img src="{{ asset('images/skuul/dashboard-dark.webp') }}" alt="{{ $shots[0]['alt'] }} in dark mode" width="1600" height="1000" class="block w-full rounded-lg border bg-background object-cover object-top" /></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-b bg-muted/20">
            <div class="mx-auto max-w-screen-xl px-4 py-16 md:px-10 md:py-24">
                <div data-april-reveal class="april-reveal max-w-2xl" style="--april-delay: 60ms">
                    <p class="text-sm font-medium text-primary">What Skuul does</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">Everything a school runs on.</h2>
                    <p class="mt-4 text-lg leading-8 text-muted-foreground">One app for the office, the classroom, and the family.</p>
                </div>
                <div class="mt-12 grid gap-x-12 gap-y-10 border-y py-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($features as [$icon, $title, $description])
                        <div data-april-reveal class="april-reveal april-lift" style="--april-delay: {{ $loop->index * 60 + 60 }}ms">
                            <x-dynamic-component :component="'lucide-'.$icon" class="size-5 text-primary" />
                            <p class="mt-3 text-lg font-semibold">{{ $title }}</p>
                            <p class="mt-2 text-sm leading-6 text-muted-foreground">{{ $description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-screen-xl px-4 py-16 md:px-10 md:py-24">
            <div data-april-reveal class="april-reveal max-w-2xl" style="--april-delay: 60ms">
                <p class="text-sm font-medium text-primary">Screens</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">See it at work.</h2>
                <p class="mt-4 text-lg leading-8 text-muted-foreground">Real screens from the demo school. Switch the theme and the screenshots follow.</p>
            </div>
            <div class="mt-12 grid gap-6 lg:grid-cols-2">
                @foreach ($shots as $shot)
                    <figure data-april-reveal class="april-reveal {{ $shot['class'] }} overflow-hidden border bg-background" style="--april-delay: {{ $loop->index * 80 + 80 }}ms">
                        <div class="aspect-[16/10] overflow-hidden border-b bg-muted">
                            <div class="dark:hidden"><img src="{{ asset('images/skuul/'.$shot['slug'].'-light.webp') }}" alt="{{ $shot['alt'] }}, in light mode" width="1600" height="1000" loading="lazy" class="h-full w-full object-cover object-top" /></div>
                            <div class="hidden dark:block"><img src="{{ asset('images/skuul/'.$shot['slug'].'-dark.webp') }}" alt="{{ $shot['alt'] }}, in dark mode" width="1600" height="1000" loading="lazy" class="h-full w-full object-cover object-top" /></div>
                        </div>
                        <figcaption class="p-5">
                            <h3 class="font-semibold tracking-tight">{{ $shot['title'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-muted-foreground">{{ $shot['description'] }}</p>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </section>

        <section class="border-y bg-muted/20">
            <div class="mx-auto max-w-screen-xl px-4 py-16 md:px-10 md:py-24">
                <div data-april-reveal class="april-reveal max-w-2xl" style="--april-delay: 60ms">
                    <p class="text-sm font-medium text-primary">Under the hood</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">The April components Skuul uses.</h2>
                    <p class="mt-4 text-lg leading-8 text-muted-foreground">No custom UI kit. Skuul builds its screens from these parts. Each one links to its docs.</p>
                </div>
                <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($components as [$slug, $name, $description])
                        <a data-april-reveal href="{{ url('docs/'.config('aui.latest-version').'/components/'.$slug) }}" class="april-reveal april-lift flex items-start justify-between gap-4 border bg-background p-5 no-underline" style="--april-delay: {{ $loop->index * 40 + 60 }}ms">
                            <div>
                                <p class="font-semibold tracking-tight">{{ $name }}</p>
                                <p class="mt-2 text-sm leading-6 text-muted-foreground">{{ $description }}</p>
                            </div>
                            <x-lucide-arrow-up-right class="mt-0.5 size-4 shrink-0 text-muted-foreground" />
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-primary text-primary-foreground">
            <div class="mx-auto flex max-w-screen-xl flex-col items-start justify-between gap-8 px-4 py-14 md:flex-row md:items-center md:px-10 md:py-20">
                <div data-april-reveal class="april-reveal max-w-2xl" style="--april-delay: 80ms">
                    <p class="text-sm font-medium text-primary-foreground/70">Try it yourself</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight md:text-4xl">Open the demo. Read the code.</h2>
                    <p class="mt-3 text-primary-foreground/75">Click through the live demo, then read the source to see how each screen is built.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <april:button-link href="https://demo.skuul.org" target="_blank" rel="noreferrer" variant="secondary" size="lg" class="april-lift">Live demo <x-lucide-arrow-up-right class="ml-2 size-4" /></april:button-link>
                    <april:button-link href="https://github.com/yungifez/skuul" target="_blank" rel="noreferrer" variant="outline" size="lg" class="april-lift border-primary-foreground/30 bg-transparent text-primary-foreground hover:bg-primary-foreground/10 hover:text-primary-foreground"><x-lucide-github class="mr-2 size-4" />Source</april:button-link>
                </div>
            </div>
        </section>
    </div>
</x-layout>
