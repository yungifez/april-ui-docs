<?php

namespace App\Docs;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class SearchIndex
{
    /**
     * Return the generated index, or build it when the app has no artifact yet.
     *
     * @return array<int, array{version?: string, title: string, description: string, url: string, search: string}>
     */
    public function entries(?string $version = null): array
    {
        $path = public_path('docs-search.json');

        if (is_file($path)) {
            $entries = json_decode((string) file_get_contents($path), true);

            if (is_array($entries)) {
                return $this->filterVersion($entries, $version);
            }
        }

        return $this->filterVersion($this->build(), $version);
    }

    /**
     * Build the search records from the installed Markdown pages.
     *
     * @return array<int, array{version: string, title: string, description: string, url: string, search: string}>
     */
    public function build(): array
    {
        $pagesPath = april_docs_path('pages');

        if (! is_dir($pagesPath)) {
            return [];
        }

        return collect((new Filesystem)->allFiles($pagesPath))
            ->filter(fn ($file) => Str::endsWith($file->getFilename(), ['.blade.md', '.md']))
            ->map(fn ($file) => $this->record($file, $pagesPath))
            ->filter()
            ->sortBy('url')
            ->values()
            ->all();
    }

    /**
     * Keep search results inside the active documentation version.
     *
     * @param  array<int, array<string, mixed>>  $entries
     * @return array<int, array<string, mixed>>
     */
    protected function filterVersion(array $entries, ?string $version): array
    {
        if ($version === null) {
            return $entries;
        }

        return array_values(array_filter(array_map(function (mixed $entry): ?array {
            if (! is_array($entry)) {
                return null;
            }

            $entry['version'] ??= $this->versionFromUrl((string) ($entry['url'] ?? ''));

            return $entry;
        }, $entries), fn (?array $entry): bool => $entry !== null && $entry['version'] === $version));
    }

    protected function versionFromUrl(string $url): string
    {
        $segments = explode('/', trim($url, '/'));

        return $segments[0] === 'docs' ? ($segments[1] ?? '') : '';
    }

    /**
     * Write the current index to a public JSON artifact.
     */
    public function write(string $path): int
    {
        $entries = $this->build();

        file_put_contents(
            $path,
            json_encode($entries, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE).PHP_EOL,
        );

        return count($entries);
    }

    /**
     * Convert one Markdown page into a browser search record.
     *
     * @return array{version: string, title: string, description: string, url: string, search: string}|null
     */
    protected function record(object $file, string $pagesPath): ?array
    {
        $relative = str_replace(DIRECTORY_SEPARATOR, '/', $file->getRelativePathname());
        $relative = preg_replace('/\.blade\.md$|\.md$/', '', $relative);

        if (! is_string($relative)) {
            return null;
        }

        $segments = explode('/', $relative);
        $version = (string) ($segments[0] ?? '');

        if (end($segments) === 'index') {
            array_pop($segments);
        }

        $url = '/docs/'.trim(implode('/', $segments), '/');
        $matter = YamlFrontMatter::parseFile($file->getPathname());
        $metadata = $matter->matter();
        $fallbackTitle = Str::of((string) ($segments[count($segments) - 1] ?? 'Documentation'))->headline()->toString();
        $title = trim((string) ($metadata['title'] ?? $fallbackTitle));
        $description = trim((string) ($metadata['description'] ?? ''));
        $body = trim($matter->body());
        $search = Str::squish(implode(' ', array_filter([$title, $description, $body])));

        return [
            'version' => $version,
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'search' => $search,
        ];
    }
}
