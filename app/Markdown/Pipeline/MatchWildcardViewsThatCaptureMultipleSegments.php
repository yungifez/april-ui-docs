<?php

namespace App\Markdown\Pipeline;

use Closure;
use Laravel\Folio\Pipeline\MatchedView;
use Laravel\Folio\Pipeline\State;

class MatchWildcardViewsThatCaptureMultipleSegments
{
    use FindsWildcardViews;

    /**
     * Create a new pipeline handler instance.
     *
     * @param  string[]  $extensions
     */
    public function __construct(protected array $extensions) {}

    /**
     * Invoke the routing pipeline handler.
     */
    public function __invoke(State $state, Closure $next): mixed
    {
        if ($path = $this->findWildcardMultiSegmentView($state->currentDirectory())) {
            return new MatchedView($state->currentDirectory().'/'.$path, $state->withData(
                $this->withoutExtension($path)->match('/\[\.\.\.(.*)\]/')->value(),
                array_slice(
                    $state->segments,
                    $state->currentIndex,
                    $state->uriSegmentCount()
                )
            )->data);
        }

        return $next($state);
    }
}
