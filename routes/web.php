<?php

use App\Http\Controllers\GenshinImpactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/characters/filter/{element?}', function (?string $element = null) {
    if ($element === null || $element === '') {
        return redirect()->route('characters.index');
    }

    return redirect()->route('characters.index', [
        'element' => $element,
    ]);
})->name('characters.filter');

Route::get('/characters/featured', [GenshinImpactController::class, 'featured'])
    ->name('characters.featured');

Route::resource('characters', GenshinImpactController::class)
    ->whereNumber('character');