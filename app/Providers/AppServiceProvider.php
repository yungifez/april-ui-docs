<?php

namespace App\Providers;

use App\Docs\SearchIndex;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer(['components.header', 'components.menu'], function ($view): void {
            $view->with($this->docsNavigation());
        });
    }

    /**
     * Build navigation for the version in the current request.
     *
     * @return array{links: array<int, array<string, mixed>>, searchIndex: array<int, array<string, mixed>>, docsVersions: array<int, array{key: string, label: string}>, currentDocsVersion: string|null}
     */
    protected function docsNavigation(): array
    {
        $cacheKey = 'april-ui.docs-navigation';

        if (request()->attributes->has($cacheKey)) {
            return request()->attributes->get($cacheKey);
        }

        $versions = config('aui.versions', []);
        $latestVersion = config('aui.latest-version') ?: array_key_first($versions);
        $requestedVersion = request()->segment(2);
        $currentVersion = isset($versions[$requestedVersion])
            ? $requestedVersion
            : $latestVersion;
        $prefix = $currentVersion === null ? '/docs' : '/docs/'.$currentVersion;
        $versionConfig = is_string($currentVersion) ? ($versions[$currentVersion] ?? []) : [];
        $links = collect($versionConfig['links'] ?? [])
            ->map(function (array $link) use ($prefix): array {
                if (! isset($link['href']) || ($link['scope'] ?? 'docs') === 'global') {
                    unset($link['scope']);

                    return $link;
                }

                $link['href'] = rtrim($prefix.'/'.ltrim($link['href'], '/'), '/');
                if ($link['href'] === $prefix) {
                    $link['href'] .= '/';
                }
                unset($link['scope']);

                return $link;
            })
            ->all();
        $navigation = [
            'links' => $links,
            'searchIndex' => $currentVersion === null
                ? []
                : app(SearchIndex::class)->entries($currentVersion),
            'docsVersions' => collect($versions)->map(fn (array $version, string $key) => [
                'key' => $key,
                'label' => $version['label'] ?? $key,
            ])->values()->all(),
            'currentDocsVersion' => $currentVersion,
        ];

        request()->attributes->set($cacheKey, $navigation);

        return $navigation;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
