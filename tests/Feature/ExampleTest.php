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

    public function test_alert_previews_render_the_alert_content_not_a_markdown_code_block(): void
    {
        $this->get('/docs/0.x/components/alert')
            ->assertOk()
            ->assertSee('<h5 data-slot="alert-title"', false);
    }
}
