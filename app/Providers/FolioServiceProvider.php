<?php

namespace App\Providers;

use App\Markdown\FrontMatterInterceptor;
use App\Markdown\MarkdownPages;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;
use Laravel\Folio\InlineMetadataInterceptor;

class FolioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Markdown pages keep their metadata in the YAML front matter.
        $this->app->extend(
            InlineMetadataInterceptor::class,
            fn () => new FrontMatterInterceptor
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the markdown pages before the Folio mount paths. Laravel
        // matches fallback routes in the order that you register them, so the
        // markdown router gets the first look and Folio takes the rest.
        MarkdownPages::register();

        Folio::path(resource_path('views/pages'))->middleware([
            '*' => [
                //
            ],
        ]);

        // The docs pages and the previews live in the april-ui package, so they
        // are versioned with the components they describe. Skip the mount when
        // the content is missing, because Folio rejects an unknown directory
        // and the application then fails to boot.
        if (is_dir(april_docs_path('pages'))) {
            Folio::path(april_docs_path('pages'))->uri('/docs')->middleware([
                '*' => [
                    //
                ],
            ]);

            // Lets a page keep using <x-dynamic-component component="previews.button-demo" />
            Blade::anonymousComponentPath(april_docs_path());
        } else {
            Log::warning('The april-ui docs content is missing, so the docs pages are not served.', [
                'path' => april_docs_path(),
                'hint' => 'Set APRIL_UI_DOCS_PATH to an april-ui checkout.',
            ]);
        }
    }
}
