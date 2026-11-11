<?php

namespace Tests\Feature;

use App\Extensions\CommonMark\BladeParsingExtension;
use DOMDocument;
use DOMXPath;
use Spatie\LaravelMarkdown\MarkdownRenderer;
use Tests\TestCase;

class DocsRenderingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Test the source rendering without an external highlighting request.
        config()->set('markdown.extensions', [BladeParsingExtension::class]);
    }

    public function test_introduction_preserves_code_indentation_and_callout_links(): void
    {
        $html = $this->get('/docs/1.x')->assertOk()->getContent();
        $codes = $this->codeSamples($html);

        $expected = <<<'BLADE'
<april:card>
    <slot:title>Revenue</slot:title>
    <slot:content>
        <p class="text-2xl font-bold">$45,231.89</p>
        <p class="text-sm text-muted-foreground">+20.1% from last month</p>
    </slot:content>
</april:card>
BLADE;

        $this->assertSame([$expected, $expected], $codes);
        $this->assertSame(1, $this->xpath($html)->query('//strong[text()="Choose your starting point"]')->length);
        $this->assertSame(1, $this->xpath($html)->query('//p/a[@href="/docs/1.x/starter-kits"]')->length);
    }

    public function test_installation_keeps_editor_directives_literal_and_commands_aligned(): void
    {
        $html = $this->get('/docs/1.x/installation')->assertOk()->getContent();
        $codes = $this->codeSamples($html);

        $this->assertContains("@aprilScripts\n@aprilEditorScripts", $codes);
        $this->assertContains('php artisan april:list', $codes);
        $this->assertContains('php artisan april:publish button', $codes);
        $this->assertContains("cd my-app\ncomposer dev", $codes);
        $this->assertSame(0, $this->xpath($html)->query('//script[contains(@src,"editor")]')->length);
    }

    public function test_starter_kit_commands_have_no_extra_markup_or_indentation(): void
    {
        $html = $this->get('/docs/1.x/starter-kits')->assertOk()->getContent();
        $codes = $this->codeSamples($html);

        $this->assertContains("php artisan april:list\nphp artisan april:publish button", $codes);
        $this->assertContains("composer test\nnpm run build", $codes);
    }

    public function test_theming_examples_have_no_paragraph_tags_or_fence_metadata(): void
    {
        $html = $this->get('/docs/1.x/theming')->assertOk()->getContent();
        $codes = $this->codeSamples($html);

        $this->assertSame('<div class="bg-background text-foreground"></div>', $codes[0]);
        $this->assertContains('<div class="bg-warning text-warning-foreground"></div>', $codes);
        $this->assertStringContainsString('Default background color of &lt;body/&gt;...etc', $html);
    }

    public function test_inline_code_stays_inside_its_paragraph(): void
    {
        $html = app(MarkdownRenderer::class)->toHtml('Add `@aprilScripts` to the `<head>` of your layout.');

        $this->assertSame("<p>Add <code>@aprilScripts</code> to the <code>&lt;head&gt;</code> of your layout.</p>\n", $html);
    }

    public function test_only_a_standalone_editor_directive_requests_assets(): void
    {
        $rendered = app(MarkdownRenderer::class)->convertToHtml("@aprilEditorScripts\n\nUse the editor.");

        $this->assertTrue($rendered->getDocument()->data->get('editorScripts'));
        $this->assertSame("<p>Use the editor.</p>\n", $rendered->getContent());
    }

    public function test_fenced_and_indented_examples_do_not_execute_blade_or_request_editor_assets(): void
    {
        $markdown = <<<'MD'
```blade
<x-code-block-wrapper language="blade">
@aprilEditorScripts
{{ $example }}
</x-code-block-wrapper>
```

    @aprilEditorScripts
MD;

        $rendered = app(MarkdownRenderer::class)->convertToHtml($markdown);

        $this->assertFalse($rendered->getDocument()->data->get('editorScripts', false));
        $this->assertStringContainsString('&lt;x-code-block-wrapper', $rendered->getContent());
        $this->assertStringContainsString('{{ $example }}', $rendered->getContent());
        $this->assertSame(2, substr_count($rendered->getContent(), '@aprilEditorScripts'));
    }

    public function test_code_component_preserves_blank_lines_and_literal_blade_source(): void
    {
        $markdown = <<<'MD'
<x-code-block-wrapper
    title="Example of <body/> markup"
    language="blade">
    @verbatim
    <april:card>

        {{ $example }}
        @aprilEditorScripts
    </april:card>
    @endverbatim
</x-code-block-wrapper>

## Next step
MD;

        $rendered = app(MarkdownRenderer::class)->convertToHtml($markdown);

        $this->assertFalse($rendered->getDocument()->data->get('editorScripts', false));
        $this->assertSame([
            "<april:card>\n\n    {{ \$example }}\n    @aprilEditorScripts\n</april:card>",
            "<april:card>\n\n    {{ \$example }}\n    @aprilEditorScripts\n</april:card>",
        ], $this->codeSamples($rendered->getContent()));
        $this->assertStringContainsString('Next step</h2>', $rendered->getContent());
    }

    public function test_editor_page_still_loads_its_optional_bundle(): void
    {
        $html = $this->get('/docs/1.x/components/editor')->assertOk()->getContent();

        $this->assertSame(1, $this->xpath($html)->query('//head/script[contains(@src,"editor")]')->length);
    }

    private function codeSamples(string $html): array
    {
        $samples = [];

        foreach ($this->xpath($html)->query('//div[contains(concat(" ",normalize-space(@class)," ")," code-block ")]/pre/code') as $code) {
            $samples[] = rtrim($code->textContent, "\n");
        }

        $this->assertNotEmpty($samples);

        return $samples;
    }

    private function xpath(string $html): DOMXPath
    {
        $document = new DOMDocument;
        @$document->loadHTML($html);

        return new DOMXPath($document);
    }
}
