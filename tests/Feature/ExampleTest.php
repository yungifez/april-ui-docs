<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_examples_page_renders_the_dashboard_showcase(): void
    {
        $response = $this->get('/examples');

        $response
            ->assertOk()
            ->assertSee('Build complete surfaces from small components.')
            ->assertSee('Total revenue')
            ->assertSee('Welcome back')
            ->assertSee('Command center')
            ->assertSee('Activity feed')
            ->assertSee('Growth overview')
            ->assertSee('Team members')
            ->assertSee('Monday, August 24')
            ->assertSee('Alex Morgan');
    }

    public function test_the_blocks_page_renders_the_block_catalog(): void
    {
        $response = $this->get('/blocks');

        $response
            ->assertOk()
            ->assertSee('Building blocks for Laravel.')
            ->assertSee('Small compositions for real product work.')
            ->assertSee('Product showcase')
            ->assertSee('Share document')
            ->assertSee('Full-page layouts')
            ->assertSee('Sign Up');
    }

    public function test_the_signup_blocks_page_renders_distinct_variants(): void
    {
        $this->get('/blocks/signup')
            ->assertOk()
            ->assertSee('Sign Up blocks.')
            ->assertSee('Sign up 01')
            ->assertSee('Sign up 02')
            ->assertSee('Sign up 03')
            ->assertSee('Create an account')
            ->assertSee('Join your team');
    }

    public function test_all_block_category_pages_render(): void
    {
        foreach (array_keys(config('blocks.categories')) as $category) {
            $this->get('/blocks/'.$category)
                ->assertOk()
                ->assertSee(config('blocks.categories.'.$category.'.label').' blocks.');
        }
    }

    public function test_dashboard_blocks_render_real_chart_regions(): void
    {
        $html = $this->get('/blocks/dashboard')
            ->assertOk()
            ->getContent();

        $this->assertGreaterThanOrEqual(5, substr_count($html, 'data-slot="chart"'));
        $this->assertStringContainsString('Revenue and expenses', $html);
        $this->assertStringContainsString('Sprint velocity', $html);
    }

    public function test_docs_search_includes_markdown_content(): void
    {
        $html = $this->get('/docs/0.x/components/chart')
            ->assertOk()
            ->getContent();

        $this->assertStringContainsString('data-search=', $html);
        $this->assertStringContainsString('Responsive Alpine charts', $html);
        $this->assertStringContainsString('xKey', $html);
    }

    public function test_the_customize_page_renders_the_theme_builder(): void
    {
        $response = $this->get('/customize');

        $response
            ->assertOk()
            ->assertSee('Build your own April UI.')
            ->assertSee('Live preview')
            ->assertSee('Theme variables')
            ->assertSee('Copy CSS');
    }

    public function test_the_layout_exposes_the_theme_switcher(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('determineColorMode', false)
            ->assertSee('localStorage.setItem', false)
            ->assertSee('sessionStorage', false)
            ->assertSee('april-ui-customization', false)
            ->assertSee('livewire:navigated', false)
            ->assertSee('torchlight.dev', false)
            ->assertSee('System');
    }

    public function test_april_ui_registers_before_livewire_starts_alpine(): void
    {
        $html = $this->get('/')->assertOk()->getContent();

        $this->assertNotFalse($april = strpos($html, '/april-ui/april'));
        $this->assertNotFalse($livewire = strpos($html, 'livewire.min.js'));
        $this->assertLessThan($livewire, $april);
    }

    public function test_docs_menu_persistence_is_scoped_to_the_desktop_sidebar(): void
    {
        $html = $this->get('/docs/0.x/components/calendar')
            ->assertOk()
            ->getContent();

        $this->assertMatchesRegularExpression(
            '/data-slot="sidebar"\s+x-persist="desktop-menu"/',
            $html,
        );
        $this->assertStringNotContainsString('x-persist="menu"', $html);
        $this->assertStringNotContainsString('x-persist="desktop-menu-mobile"', $html);
    }

    public function test_alert_previews_render_the_alert_content_not_a_markdown_code_block(): void
    {
        $this->get('/docs/0.x/components/alert')
            ->assertOk()
            ->assertSee('<h5 data-slot="alert-title"', false);
    }

    public function test_calendar_preview_renders_each_day_as_one_alpine_root(): void
    {
        $html = $this->get('/docs/0.x/components/calendar')
            ->assertOk()
            ->getContent();

        $this->assertStringContainsString('<div class="contents">', $html);
        $this->assertStringNotContainsString('x-if="cell.outside', $html);
        $this->assertStringContainsString('Use the following command to publish this view:', $html);
        $this->assertStringContainsString('april-view-calendar', $html);
    }
}
