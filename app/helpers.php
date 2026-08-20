<?php

if (! function_exists('april_docs_path')) {
    /**
     * Path to the docs content inside the april-ui package.
     *
     * The pages and the previews ship with the package so that they change in
     * the same commit as the components they describe.
     *
     * Set APRIL_UI_DOCS_PATH to point at a local checkout while you work on
     * both repositories at once.
     */
    function april_docs_path(string $path = ''): string
    {
        $base = rtrim(
            env('APRIL_UI_DOCS_PATH') ?: base_path('vendor/yungifez/april-ui/docs'),
            '/'
        );

        return $path === '' ? $base : $base.'/'.ltrim($path, '/');
    }
}
