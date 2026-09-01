<?php

namespace App\Markdown;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Laravel\Folio\Events;
use Laravel\Folio\Folio;
use Laravel\Folio\FolioManager;
use Laravel\Folio\MountPath;
use Laravel\Folio\Pipeline\MatchedView;
use Spatie\LaravelMarkdown\MarkdownRenderer;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/**
 * Serves the markdown page that matches the request.
 *
 * Folio handles the request when no markdown file matches, so `.blade.php`
 * pages keep working.
 */
class RequestHandler
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): mixed
    {
        $mountPaths = $this->mountPathsFor($request);

        foreach ($mountPaths as $mountPath) {
            $requestPath = '/'.ltrim($request->path(), '/');

            $uri = '/'.ltrim(substr($requestPath, strlen($mountPath->baseUri)), '/');

            $matchedView = (new Router($mountPath, MarkdownPages::supportedExtensions()))
                ->match($request, $uri);

            if ($matchedView) {
                break;
            }
        }

        // Let Folio answer the request when no markdown page matches. Folio
        // aborts with a 404 when it finds nothing either.
        if (! isset($matchedView) || ! $matchedView) {
            return app(FolioManager::class)->handle($request);
        }

        app(Dispatcher::class)->dispatch(new Events\ViewMatched($matchedView, $mountPath));

        $middleware = collect($this->middleware($mountPath, $matchedView));

        return (new Pipeline(app()))
            ->send($request)
            ->through($middleware->all())
            ->then(function (Request $request) use ($matchedView, $middleware) {
                $response = $this->toResponse($matchedView);

                $this->terminateUsing($middleware, $request, $response);

                return $response;
            });
    }

    /**
     * Get the Folio mount paths that can answer the request.
     *
     * @return array<int, MountPath>
     */
    protected function mountPathsFor(Request $request): array
    {
        return collect(Folio::mountPaths())->filter(
            fn (MountPath $mountPath) => str_starts_with(mb_strtolower('/'.$request->path()), $mountPath->baseUri)
        )->all();
    }

    /**
     * Get the middleware that should be applied to the matched view.
     */
    protected function middleware(MountPath $mountPath, MatchedView $matchedView): array
    {
        return Route::resolveMiddleware(
            $mountPath
                ->middleware
                ->match($matchedView)
                ->prepend('docs')
                ->merge($matchedView->inlineMiddleware())
                ->unique()
                ->values()
                ->all()
        );
    }

    /**
     * Run the terminable middleware when the application terminates.
     *
     * Folio already terminates itself, so the callback goes on its manager.
     */
    protected function terminateUsing($middleware, Request $request, Response $response): void
    {
        app(FolioManager::class)->terminateUsing(function () use ($middleware, $request, $response) {
            $app = app();

            $middleware
                ->filter(fn ($m) => is_string($m) && class_exists($m) && method_exists($m, 'terminate'))
                ->map(fn (string $m) => $app->make($m))
                ->each(fn (object $m) => $app->call([$m, 'terminate'], ['request' => $request, 'response' => $response]));
        });
    }

    /**
     * Render the matched markdown file.
     *
     * The front matter becomes view data. A `view` key wraps the rendered
     * markdown in that Blade view, which receives the HTML as its slot.
     */
    protected function toResponse(MatchedView $matchedView): Response
    {
        $parser = YamlFrontMatter::parseFile($matchedView->path);
        $data = $parser->matter() + $matchedView->data;
        $body = $parser->body();

        // Blade components must be rendered after CommonMark. Rendering them
        // here turns their indented HTML into Markdown code blocks. The
        // BladeParsingExtension renders them after the Markdown document is
        // complete, while preserving real code blocks as literal source.
        $slot = app(MarkdownRenderer::class)
            ->disableHighlighting()
            ->disableAnchors()
            ->toHtml($body);

        if (isset($data['view'])) {
            $data['slot'] = $slot;

            return new Response(
                View::make($data['view'], $data),
                200,
                ['Content-Type' => 'text/html'],
            );
        }

        return new Response($slot, 200, ['Content-Type' => 'text/html']);
    }
}
