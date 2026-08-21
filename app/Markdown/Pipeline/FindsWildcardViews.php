<?php

namespace App\Markdown\Pipeline;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

trait FindsWildcardViews
{
    /**
     * Attempt to find a wildcard view at the given directory with the given beginning and ending strings.
     */
    protected function findViewWith(string $directory, string $startsWith, string $endsWith): ?string
    {
        $files = (new Filesystem)->files($directory);

        return collect($files)->first(function ($file) use ($startsWith, $endsWith) {
            $filename = $this->withoutExtension($file->getFilename());

            if ($filename === null) {
                return false;
            }

            return $filename->startsWith($startsWith) &&
                $filename->endsWith($endsWith);
        })?->getFilename();
    }

    /**
     * Attempt to find a wildcard multi-segment view at the given directory.
     */
    protected function findWildcardMultiSegmentView(string $directory): ?string
    {
        return $this->findViewWith($directory, '[...', ']');
    }

    /**
     * Attempt to find a wildcard view at the given directory.
     */
    protected function findWildcardView(string $directory): ?string
    {
        return $this->findViewWith($directory, '[', ']');
    }

    /**
     * Remove a supported extension from the given filename.
     *
     * Returns null when the file is not a markdown page.
     */
    protected function withoutExtension(string $filename): ?Stringable
    {
        foreach ($this->extensions as $extension) {
            if (str_ends_with($filename, $extension)) {
                return Str::of($filename)->before($extension);
            }
        }

        return null;
    }
}
