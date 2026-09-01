<?php

namespace Tests\Feature;

use App\Docs\SearchIndex;
use Tests\TestCase;

class DocsVersionTest extends TestCase
{
    public function test_search_records_include_their_documentation_version(): void
    {
        $entries = app(SearchIndex::class)->build();

        $this->assertNotEmpty($entries);
        $this->assertSame('1.x', $entries[0]['version']);
        $this->assertStringStartsWith('/docs/1.x', $entries[0]['url']);
    }

    public function test_search_entries_can_be_limited_to_the_active_version(): void
    {
        $entries = app(SearchIndex::class)->entries('1.x');

        $this->assertNotEmpty($entries);
        $this->assertTrue(collect($entries)->every(
            fn (array $entry): bool => $entry['version'] === '1.x'
        ));
        $this->assertSame([], app(SearchIndex::class)->entries('2.x'));
    }

    public function test_docs_navigation_uses_the_configured_version(): void
    {
        $html = $this->get('/docs/1.x/components/button')
            ->assertOk()
            ->getContent();

        $this->assertStringContainsString('href="/docs/1.x"', $html);
        $this->assertStringContainsString('href="/docs/1.x/components/accordion"', $html);
        $this->assertStringContainsString('Alpine.navigate', $html);
    }

    public function test_docs_navigation_resolves_the_version_from_the_current_request(): void
    {
        config()->set('aui.versions', array_merge(config('aui.versions'), [
            '2.x' => [
                'label' => '2.x',
                'links' => [
                    ['type' => 'header', 'text' => 'Components'],
                    ['href' => 'components/button', 'text' => 'Button'],
                ],
            ],
        ]));

        $html = $this->get('/docs/1.x/components/button')
            ->assertOk()
            ->getContent();

        $this->assertStringContainsString('Documentation version', $html);
        $this->assertStringContainsString('2.x', $html);
        $this->assertStringContainsString('/docs/1.x/components/button', $html);
        $this->assertStringNotContainsString('/docs/2.x/components/button', $html);
    }
}
