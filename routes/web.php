<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index')->name('home');

Route::get('/docs', function () {
    return redirect('docs/'.config('aui.latest-version'));
})->name('docs');

Route::view('/customize', 'pages.customize')->name('customize');

Route::view('/blocks', 'pages.blocks')->name('blocks');

Route::get('/blocks/{category}', function (string $category) {
    $categories = config('blocks.categories');

    abort_unless(isset($categories[$category]), 404);

    return view('pages.block-category', [
        'categorySlug' => $category,
        'category' => $categories[$category],
        'blocks' => config('blocks.layouts.'.$category, []),
    ]);
})->name('blocks.category');
