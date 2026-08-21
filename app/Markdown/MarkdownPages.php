<?php

namespace App\Markdown;

use Illuminate\Support\Facades\Route;

/**
 * Page based routing for markdown files.
 *
 * Folio only matches `.blade.php` files. This adds markdown files on top of
 * the same mount paths, so a `.blade.md` file in a Folio directory becomes a
 * page. It replaces the snellingio/folio-markdown package.
 */
class MarkdownPages
{
    /**
     * The file extensions that become markdown pages.
     *
     * @var string[]
     */
    protected static array $extensions = ['.blade.md', '.md'];

    /**
     * Register the route that serves markdown pages.
     *
     * The route is a fallback, so the routes in `routes/web.php` always win.
     * Register it before the Folio mount paths, because Laravel matches
     * fallback routes in the order that you register them. Folio then handles
     * the request when no markdown file matches.
     */
    public static function register(): void
    {
        // Use a placeholder of our own. Laravel keys routes by their URI, so
        // `Route::fallback()` would replace the Folio fallback route.
        $placeholder = 'markdownFallbackPlaceholder';

        Route::addRoute('GET', "{{$placeholder}}", RequestHandler::class)
            ->where($placeholder, '.*')
            ->fallback()
            ->name('markdown-pages');
    }

    /**
     * Set the file extensions that become markdown pages.
     *
     * @param  string[]  $extensions
     */
    public static function extensions(array $extensions): void
    {
        static::$extensions = $extensions;
    }

    /**
     * Get the file extensions that become markdown pages.
     *
     * @return string[]
     */
    public static function supportedExtensions(): array
    {
        return static::$extensions;
    }

    /**
     * Determine if the given path is a markdown page.
     */
    public static function handles(string $path): bool
    {
        foreach (static::$extensions as $extension) {
            if (str_ends_with($path, $extension)) {
                return true;
            }
        }

        return false;
    }
}
