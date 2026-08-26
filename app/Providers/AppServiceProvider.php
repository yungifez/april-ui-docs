<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $prefix = '/docs/0.x';
        $links = [
            ['type' => 'header' , 'text' => 'Getting Started'],
            ['href' => $prefix.'/' , 'text' => 'introduction'],
            ['href' => $prefix.'/installation', 'text' => 'installation'],
            ['href' => '/examples', 'text' => 'examples'],
            ['href' => '/customize', 'text' => 'customize'],
            ['href' => $prefix.'/theming', 'text' => 'theming'],
            ['href' => $prefix.'/data-attributes', 'text' => 'data attributes'],
            ['type' => 'header' , 'text' => 'Components'],
            ['href' => $prefix.'/components/accordion', 'text' => 'Accordion'],
            ['href' => $prefix.'/components/alert', 'text' => 'Alert'],
            ['href' => $prefix.'/components/alert-dialog', 'text' => 'Alert Dialog'],
            ['href' => $prefix.'/components/aspect-ratio', 'text' => 'Aspect Ratio'],
            ['href' => $prefix.'/components/attachment', 'text' => 'Attachment'],
            ['href' => $prefix.'/components/avatar', 'text' => 'Avatar'],
            ['href' => $prefix.'/components/badge', 'text' => 'Badge'],
            ['href' => $prefix.'/components/breadcrumb', 'text' => 'Breadcrumb'],
            ['href' => $prefix.'/components/bubble', 'text' => 'Bubble'],
            ['href' => $prefix.'/components/button', 'text' => 'Button'],
            ['href' => $prefix.'/components/button-group', 'text' => 'Button Group'],
            ['href' => $prefix.'/components/calendar', 'text' => 'Calendar'],
            ['href' => $prefix.'/components/card', 'text' => 'Card'],
            ['href' => $prefix.'/components/carousel', 'text' => 'Carousel'],
            ['href' => $prefix.'/components/chart', 'text' => 'Chart'],
            ['href' => $prefix.'/components/command', 'text' => 'Command'],
            ['href' => $prefix.'/components/collapsible', 'text' => 'Collapsible'],
            ['href' => $prefix.'/components/combobox', 'text' => 'Combobox'],
            ['href' => $prefix.'/components/context-menu', 'text' => 'Context Menu'],
            ['href' => $prefix.'/components/data-table', 'text' => 'Data Table'],
            ['href' => $prefix.'/components/date-picker', 'text' => 'Date Picker'],
            ['href' => $prefix.'/components/dialog', 'text' => 'Dialog'],
            ['href' => $prefix.'/components/dropdown-menu', 'text' => 'Dropdown Menu'],
            ['href' => $prefix.'/components/input', 'text' => 'Input'],
            ['href' => $prefix.'/components/label', 'text' => 'Label'],
            ['href' => $prefix.'/components/popover', 'text' => 'Popover'],
            ['href' => $prefix.'/components/select', 'text' => 'Select'],
            ['href' => $prefix.'/components/sheet', 'text' => 'Sheet'],
            ['href' => $prefix.'/components/sidebar', 'text' => 'Sidebar'],
            ['href' => $prefix.'/components/skeleton', 'text' => 'Skeleton'],
            ['href' => $prefix.'/components/switch', 'text' => 'Switch'],
            ['href' => $prefix.'/components/tabs', 'text' => 'Tabs'],
            ['href' => $prefix.'/components/textarea', 'text' => 'Textarea'],
            ['href' => $prefix.'/components/tooltip', 'text' => 'Tooltip'],
            ['type' => 'header', 'text' => 'Patterns'],
            ['href' => '/blocks', 'text' => 'Blocks'],
        ];

        View::share('links', $links);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
