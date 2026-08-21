<?php

namespace App\Markdown;

use Laravel\Folio\InlineMetadataInterceptor;
use Laravel\Folio\Metadata;
use Laravel\Folio\Pipeline\MatchedView;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/**
 * Reads page metadata from the YAML front matter of a markdown file.
 *
 * Folio reads its metadata from `@php` blocks, which it can only do by
 * executing the file. Markdown files are not executable, so this reads the
 * front matter instead and hands every other file back to Folio.
 */
class FrontMatterInterceptor extends InlineMetadataInterceptor
{
    /**
     * The cached path to metadata mappings.
     */
    protected array $markdownCache = [];

    /**
     * Intercept the metadata for the given matched view.
     */
    public function intercept(MatchedView $matchedView): Metadata
    {
        if (! MarkdownPages::handles($matchedView->path)) {
            return parent::intercept($matchedView);
        }

        if (array_key_exists($matchedView->path, $this->markdownCache)) {
            return $this->markdownCache[$matchedView->path];
        }

        $matter = YamlFrontMatter::parseFile($matchedView->path)->matter();

        $metadata = tap(Metadata::instance(), fn () => Metadata::flush());

        $metadata->name = $matter['name'] ?? null;
        $metadata->withTrashed = (bool) ($matter['withTrashed'] ?? false);
        $metadata->middleware = collect(
            isset($matter['middleware']) ? explode(',', $matter['middleware']) : []
        )->map(fn (string $middleware) => trim($middleware));

        return $this->markdownCache[$matchedView->path] = $metadata;
    }
}
