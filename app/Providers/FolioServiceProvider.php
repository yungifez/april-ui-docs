<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;
use Snelling\FolioMarkdown\Facades\FolioMarkdown;

class FolioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Folio::path(resource_path('views/pages'))->middleware([
            '*' => [
                //
            ],
        ]);

        // The docs pages and the previews live in the april-ui package, so they
        // are versioned with the components they describe.
        Folio::path(april_docs_path('pages'))->uri('/docs')->middleware([
            '*' => [
                //
            ],
        ]);

        // Lets a page keep using <x-dynamic-component component="previews.button-demo" />
        Blade::anonymousComponentPath(april_docs_path());

        // Register Folio Markdown at the bottom of the boot method
        FolioMarkdown::register();
    }
}
