<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\Fixtures\UsersTable;
use Tests\TestCase;

class LivewireDataTableTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_builds_a_controlled_table_from_a_builder_and_columns(): void
    {
        User::factory()->create(['name' => 'Olivia Martin', 'email' => 'olivia@example.com']);
        User::factory()->create(['name' => 'Jackson Lee', 'email' => 'jackson@example.com']);
        User::factory()->create(['name' => 'Isabella Nguyen', 'email' => 'isabella@example.com']);

        Livewire::test(UsersTable::class)
            ->assertSee('Olivia Martin')
            ->assertSee('Jackson Lee')
            ->assertSee('dataTable(', false)
            ->call('updateTable', [
                'search' => 'Isabella',
                'sort' => ['key' => 'name', 'direction' => 'asc'],
                'page' => 1,
                'perPage' => 2,
            ])
            ->assertSee('Isabella Nguyen')
            ->assertDontSee('Olivia Martin');
    }
}
