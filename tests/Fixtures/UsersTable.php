<?php

namespace Tests\Fixtures;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Yungifez\AprilUI\Livewire\Columns\Column;
use Yungifez\AprilUI\Livewire\DataTableComponent;

class UsersTable extends DataTableComponent
{
    protected array $perPageOptions = [2, 10];

    protected bool $selectable = true;

    protected function builder(): Builder
    {
        return User::query();
    }

    protected function columns(): array
    {
        return [
            Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
        ];
    }

    protected function defaultSort(): ?array
    {
        return ['field' => 'name', 'direction' => 'asc'];
    }
}
