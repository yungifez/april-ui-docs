<?php

namespace App\Markdown;

use App\Markdown\Pipeline\MatchDirectoryIndexViews;
use App\Markdown\Pipeline\MatchLiteralViews;
use App\Markdown\Pipeline\MatchRootIndex;
use App\Markdown\Pipeline\MatchWildcardViews;
use App\Markdown\Pipeline\MatchWildcardViewsThatCaptureMultipleSegments;
use App\Markdown\Pipeline\TransformModelBindings;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Laravel\Folio\MountPath;
use Laravel\Folio\Pipeline\ContinueIterating;
use Laravel\Folio\Pipeline\EnsureMatchesDomain;
use Laravel\Folio\Pipeline\EnsureNoDirectoryTraversal;
use Laravel\Folio\Pipeline\MatchedView;
use Laravel\Folio\Pipeline\MatchLiteralDirectories;
use Laravel\Folio\Pipeline\MatchWildcardDirectories;
use Laravel\Folio\Pipeline\SetMountPathOnMatchedView;
use Laravel\Folio\Pipeline\State;
use Laravel\Folio\Pipeline\StopIterating;

/**
 * Matches a URI to a markdown file below a Folio mount path.
 *
 * This is Folio's own router with the extensions made configurable.
 */
class Router
{
    /**
     * Create a new router instance.
     *
     * @param  string[]  $extensions
     */
    public function __construct(
        protected MountPath $mountPath,
        protected array $extensions
    ) {}

    /**
     * Match the given URI to a markdown view.
     */
    public function match(Request $request, string $uri): ?MatchedView
    {
        $uri = strlen($uri) > 1 ? trim($uri, '/') : $uri;

        $state = new State(
            uri: $uri,
            mountPath: $this->mountPath->path,
            segments: explode('/', $uri)
        );

        for ($i = 0; $i < $state->uriSegmentCount(); $i++) {
            $value = (new Pipeline)
                ->send($state->forIteration($i))
                ->through([
                    new EnsureMatchesDomain($request, $this->mountPath),
                    new EnsureNoDirectoryTraversal,
                    new TransformModelBindings($request, $this->extensions),
                    new SetMountPathOnMatchedView,
                    new MatchRootIndex($this->extensions),
                    new MatchDirectoryIndexViews($this->extensions),
                    new MatchWildcardViewsThatCaptureMultipleSegments($this->extensions),
                    new MatchLiteralDirectories,
                    new MatchWildcardDirectories,
                    new MatchLiteralViews($this->extensions),
                    new MatchWildcardViews($this->extensions),
                ])->then(fn () => new StopIterating);

            if ($value instanceof MatchedView) {
                return $value;
            }

            if ($value instanceof ContinueIterating) {
                $state = $value->state;

                continue;
            }

            if ($value instanceof StopIterating) {
                break;
            }
        }

        return null;
    }
}
