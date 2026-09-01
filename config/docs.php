<?php

return [
    /*
     * Docs pages are public and can be shared between application instances.
     * Laravel Cloud can provide this store with its managed Redis service.
     */
    'cache_store' => env('DOCS_CACHE_STORE', env('CACHE_STORE', 'database')),

    'cache_ttl' => (int) env('DOCS_CACHE_TTL', 3600),

    /*
     * Bump this value when a deployment must invalidate all rendered pages
     * immediately. The normal TTL also prevents stale pages from living
     * forever.
     */
    'cache_version' => env('DOCS_CACHE_VERSION', '1'),
];
