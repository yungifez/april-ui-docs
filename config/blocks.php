<?php

return [
    'categories' => [
        'marketing' => [
            'label' => 'Marketing',
            'description' => 'Hero sections and trust-building surfaces for product pages.',
        ],
        'pricing' => [
            'label' => 'Pricing',
            'description' => 'Plan comparison layouts that make the next action clear.',
        ],
        'dashboard' => [
            'label' => 'Dashboard',
            'description' => 'Data-rich application shells with metrics and recent activity.',
        ],
        'sidebar' => [
            'label' => 'Sidebar',
            'description' => 'Navigation shells for products with multiple workspaces and sections.',
        ],
        'login' => [
            'label' => 'Login',
            'description' => 'Sign-in layouts with focused forms and alternate providers.',
        ],
        'signup' => [
            'label' => 'Sign Up',
            'description' => 'Onboarding layouts for new accounts and new workspaces.',
        ],
        'calendars' => [
            'label' => 'Calendars',
            'description' => 'Calendar surfaces for schedules, range selection, and planning.',
        ],
    ],

    'compositions' => [
        [
            'title' => 'Product showcase',
            'description' => 'A product card with availability, rating, price, and a purchase action.',
            'component' => 'blocks.product-showcase',
            'tags' => ['Card', 'Badge', 'Button'],
        ],
        [
            'title' => 'Share document',
            'description' => 'A sharing card with access rules, people, and permission labels.',
            'component' => 'blocks.share-document',
            'tags' => ['Card', 'Input', 'Avatar'],
        ],
        [
            'title' => 'Payment method',
            'description' => 'A compact payment form with grouped fields and a clear submit action.',
            'component' => 'blocks.payment-method',
            'tags' => ['Card', 'Input', 'Label'],
        ],
        [
            'title' => 'Notifications',
            'description' => 'Notification preferences with unread state and a mark-as-read action.',
            'component' => 'blocks.notifications',
            'tags' => ['Card', 'Switch', 'Separator'],
        ],
        [
            'title' => 'Blog post',
            'description' => 'A readable article card with category, author, and supporting media.',
            'component' => 'blocks.blog-post',
            'tags' => ['Card', 'Avatar', 'Badge'],
        ],
        [
            'title' => 'Pricing plan',
            'description' => 'A highlighted plan card with feature rows and a primary action.',
            'component' => 'blocks.pricing-plan',
            'tags' => ['Card', 'Badge', 'Button'],
        ],
        [
            'title' => 'User profile',
            'description' => 'A profile card with identity, counts, and a follow action.',
            'component' => 'blocks.user-profile',
            'tags' => ['Card', 'Avatar', 'Button'],
        ],
        [
            'title' => 'Testimonial',
            'description' => 'A quote card that gives a customer statement a clear visual hierarchy.',
            'component' => 'blocks.testimonial',
            'tags' => ['Card', 'Avatar'],
        ],
        [
            'title' => 'Sign in card',
            'description' => 'A reusable sign-in card for embedding inside a larger page layout.',
            'component' => 'blocks.sign-in-card',
            'tags' => ['Card', 'Input', 'Checkbox'],
        ],
        [
            'title' => 'Team members',
            'description' => 'A team list with roles, contact details, and an invite action.',
            'component' => 'blocks.team-members',
            'tags' => ['Card', 'Avatar', 'Badge'],
        ],
        [
            'title' => 'Feedback dialog',
            'description' => 'A modal feedback flow with a textarea and a submit action.',
            'component' => 'blocks.feedback-dialog',
            'tags' => ['Dialog', 'Textarea', 'Button'],
        ],
        [
            'title' => 'Share popover',
            'description' => 'A small share menu that stays close to the action that opens it.',
            'component' => 'blocks.share-popover',
            'tags' => ['Popover', 'Input', 'Button'],
        ],
        [
            'title' => 'Empty state',
            'description' => 'A focused message that explains an empty screen and gives users a next step.',
            'component' => 'blocks.empty-state',
            'tags' => ['Card', 'Button', 'Message'],
        ],
    ],

    'layouts' => [
        'marketing' => [
            [
                'title' => 'Centered hero',
                'description' => 'A centered introduction with two actions and product proof points.',
                'component' => 'blocks.landing-hero',
                'tags' => ['Badge', 'Button'],
            ],
        ],
        'pricing' => [
            [
                'title' => 'Three plans',
                'description' => 'A three-column plan comparison with a highlighted recommended plan.',
                'component' => 'blocks.pricing',
                'tags' => ['Card', 'Badge', 'Button'],
            ],
        ],
        'dashboard' => [
            [
                'title' => 'Overview dashboard',
                'description' => 'A full application shell with navigation, metrics, activity, and sales.',
                'component' => 'blocks.dashboard-01',
                'tags' => ['Sidebar', 'Card', 'Chart'],
            ],
            [
                'title' => 'Minimal dashboard',
                'description' => 'A compact dashboard for teams that need the data before the decoration.',
                'component' => 'blocks.dashboard-02',
                'tags' => ['Card', 'Table', 'Button'],
            ],
            [
                'title' => 'Analytics dashboard',
                'description' => 'A metrics-first dashboard with trend cards and a conversion summary.',
                'component' => 'blocks.dashboard-03',
                'tags' => ['Card', 'Chart', 'Badge'],
            ],
            [
                'title' => 'Project dashboard',
                'description' => 'A project board with work status, owners, and upcoming milestones.',
                'component' => 'blocks.dashboard-04',
                'tags' => ['Card', 'Badge', 'Avatar'],
            ],
        ],
        'sidebar' => [
            [
                'title' => 'Workspace sidebar',
                'description' => 'A persistent product shell with grouped navigation and a user footer.',
                'component' => 'blocks.sidebar-01',
                'tags' => ['Sidebar', 'Menu', 'Avatar'],
            ],
            [
                'title' => 'Floating sidebar',
                'description' => 'A floating navigation shell that leaves space around the main content.',
                'component' => 'blocks.sidebar-02',
                'tags' => ['Sidebar', 'Card', 'Button'],
            ],
            [
                'title' => 'Collapsible sidebar',
                'description' => 'A sidebar that can shrink to icons while keeping the page context visible.',
                'component' => 'blocks.sidebar-03',
                'tags' => ['Sidebar', 'Menu', 'Trigger'],
            ],
            [
                'title' => 'Inset sidebar',
                'description' => 'An inset navigation shell with a rounded application content area.',
                'component' => 'blocks.sidebar-04',
                'tags' => ['Sidebar', 'Card', 'Breadcrumb'],
            ],
        ],
        'login' => [
            [
                'title' => 'Login 01',
                'description' => 'A simple centered login form with an alternate provider action.',
                'component' => 'blocks.login-01',
                'tags' => ['Input', 'Label', 'Button'],
            ],
            [
                'title' => 'Login 02',
                'description' => 'A split login screen with a branded panel and focused form.',
                'component' => 'blocks.login-02',
                'tags' => ['Card', 'Input', 'Separator'],
            ],
            [
                'title' => 'Login 03',
                'description' => 'A muted login page with a compact card and a trust message.',
                'component' => 'blocks.login-03',
                'tags' => ['Card', 'Input', 'Badge'],
            ],
            [
                'title' => 'Login 04',
                'description' => 'A brand-forward login page with social providers and a compact form.',
                'component' => 'blocks.login-04',
                'tags' => ['Card', 'Input', 'Provider'],
            ],
            [
                'title' => 'Login 05',
                'description' => 'A passwordless login flow that starts with one work email field.',
                'component' => 'blocks.login-05',
                'tags' => ['Input', 'Button', 'Alert'],
            ],
        ],
        'signup' => [
            [
                'title' => 'Sign up 01',
                'description' => 'A simple account creation form for a focused onboarding step.',
                'component' => 'blocks.signup-01',
                'tags' => ['Input', 'Label', 'Button'],
            ],
            [
                'title' => 'Sign up 02',
                'description' => 'A two-column signup page with a product panel and account form.',
                'component' => 'blocks.signup-02',
                'tags' => ['Card', 'Input', 'Checkbox'],
            ],
            [
                'title' => 'Sign up 03',
                'description' => 'A workspace setup form that collects role and project context.',
                'component' => 'blocks.onboarding',
                'tags' => ['Form', 'Select', 'Textarea'],
            ],
            [
                'title' => 'Sign up 04',
                'description' => 'A muted account creation page with social signup and an email fallback.',
                'component' => 'blocks.signup-04',
                'tags' => ['Card', 'Input', 'Provider'],
            ],
            [
                'title' => 'Sign up 05',
                'description' => 'An invitation flow that lets a user join an existing workspace.',
                'component' => 'blocks.signup-05',
                'tags' => ['Card', 'Input', 'Select'],
            ],
        ],
        'calendars' => [
            [
                'title' => 'Calendar 01',
                'description' => 'A single-date calendar inside a scheduling card.',
                'component' => 'blocks.calendar-01',
                'tags' => ['Calendar', 'Card', 'Button'],
            ],
            [
                'title' => 'Calendar 02',
                'description' => 'A planning surface with a calendar and an agenda for the selected day.',
                'component' => 'blocks.calendar-02',
                'tags' => ['Calendar', 'Card', 'Badge'],
            ],
            [
                'title' => 'Calendar 03',
                'description' => 'A multi-month calendar for selecting a date range.',
                'component' => 'blocks.calendar-03',
                'tags' => ['Calendar', 'Card', 'Range'],
            ],
            [
                'title' => 'Calendar 04',
                'description' => 'A calendar with a side panel for available appointment times.',
                'component' => 'blocks.calendar-04',
                'tags' => ['Calendar', 'Card', 'Schedule'],
            ],
            [
                'title' => 'Calendar 05',
                'description' => 'A compact date picker paired with a task list for daily planning.',
                'component' => 'blocks.calendar-05',
                'tags' => ['Calendar', 'Card', 'Tasks'],
            ],
        ],
    ],
];
