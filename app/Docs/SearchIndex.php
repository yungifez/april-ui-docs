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
     * @return array<int, array{title: string, description: string, url: string, search: string}>
     */
    public function entries(): array
    {
        $path = public_path('docs-search.json');

        if (is_file($path)) {
            $entries = json_decode((string) file_get_contents($path), true);

            if (is_array($entries)) {
                return $entries;
            }
        }

        return $this->build();
    }

    /**
     * Build the search records from the installed Markdown pages.
     *
     * @return array<int, array{title: string, description: string, url: string, search: string}>
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
     * @return array{title: string, description: string, url: string, search: string}|null
     */
    protected function record(object $file, string $pagesPath): ?array
    {
        $relative = str_replace(DIRECTORY_SEPARATOR, '/', $file->getRelativePathname());
        $relative = preg_replace('/\.blade\.md$|\.md$/', '', $relative);

        if (! is_string($relative)) {
            return null;
        }

        $segments = explode('/', $relative);

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
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'search' => $search,
        ];
    }
}
