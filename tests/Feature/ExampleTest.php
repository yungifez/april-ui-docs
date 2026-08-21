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
            ->assertSee('Activity feed');
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
            ->assertSee('System');
    }
}
