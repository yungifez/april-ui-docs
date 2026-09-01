<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class CachePublicDocs
{
    /**
     * Cache the final HTML for public documentation pages.
     *
     * The middleware runs before route middleware, so a cache hit avoids
     * Markdown parsing, Blade rendering, Torchlight, and component merging.
     */
    public function handle(Request $request, Closure $next): SymfonyResponse
    {
        if (! $this->shouldCache($request)) {
            return $next($request);
        }

        $cache = $this->cache();
        $key = $this->cacheKey($request);
        $cached = $cache->get($key);

        if (is_array($cached) && isset($cached['content'], $cached['status'])) {
            return $this->responseFromCache($cached);
        }

        $response = $next($request);

        if (! $response instanceof Response || ! $response->isSuccessful()) {
            return $response;
        }

        $content = $response->getContent();

        if ($content === false) {
            return $response;
        }

        // Docs do not use a server-side session. Removing any queued cookie
        // also allows Laravel Cloud's edge cache to store the response.
        $response->headers->remove('Set-Cookie');
        $response->headers->set('Cache-Control', $this->cacheControl());

        $cache->put($key, [
            'content' => $content,
            'status' => $response->getStatusCode(),
            'headers' => [
                'Content-Type' => $response->headers->get('Content-Type', 'text/html; charset=UTF-8'),
            ],
        ], config('docs.cache_ttl', 3600));

        return $response;
    }

    protected function shouldCache(Request $request): bool
    {
        return $request->isMethodCacheable()
            && $request->is('docs/*')
            && ! $request->expectsJson();
    }

    protected function cache(): Repository
    {
        return Cache::store(config('docs.cache_store'));
    }

    protected function cacheKey(Request $request): string
    {
        return 'april-ui:docs-page:'.config('docs.cache_version', '1').':'.hash(
            'xxh3',
            $request->getRequestUri(),
        );
    }

    /**
     * @param  array{content: string, status: int, headers?: array<string, string>}  $cached
     */
    protected function responseFromCache(array $cached): Response
    {
        $response = new Response(
            $cached['content'],
            $cached['status'],
            $cached['headers'] ?? ['Content-Type' => 'text/html; charset=UTF-8'],
        );
        $response->headers->set('Cache-Control', $this->cacheControl());

        return $response;
    }

    protected function cacheControl(): string
    {
        return 'public, s-maxage='.config('docs.cache_ttl', 3600).', stale-while-revalidate=86400';
    }
}
