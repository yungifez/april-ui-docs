<?php

use App\Docs\SearchIndex;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('docs:search-index', function (SearchIndex $index) {
    $count = $index->write(public_path('docs-search.json'));

    $this->info("Generated {$count} documentation search records.");
})->purpose('Generate the Markdown documentation search index');
