<?php

if (! function_exists('april_docs_path')) {
    /**
     * Path to the docs content of the april-ui package.
     *
     * The pages and the previews ship with the package so that they change in
     * the same commit as the components they describe.
     *
     * The first directory that exists wins:
     *
     *   1. APRIL_UI_DOCS_PATH, to point at a checkout of your choice.
     *   2. The installed package.
     *   3. A checkout next to this project. Sail mounts one at the same place.
     *
     * `php artisan serve` drops unknown environment variables, so the
     * container cannot receive APRIL_UI_DOCS_PATH. It finds the checkout with
     * the third candidate instead.
     */
    function april_docs_path(string $path = ''): string
    {
        static $base = null;

        if ($base === null) {
            $candidates = array_filter([
                env('APRIL_UI_DOCS_PATH'),
                base_path('vendor/yungifez/april-ui/docs'),
                base_path('../april-ui/docs'),
            ]);

            $base = rtrim(
                collect($candidates)->first(fn (string $candidate) => is_dir($candidate))
                    ?: base_path('vendor/yungifez/april-ui/docs'),
                '/'
            );
        }

        return $path === '' ? $base : $base.'/'.ltrim($path, '/');
    }
}
