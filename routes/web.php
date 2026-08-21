<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index')->name('home');

Route::get('/docs', function () {
    return redirect('docs/'.config('aui.latest-version'));
})->name('docs');

Route::view('/customize', 'pages.customize')->name('customize');
