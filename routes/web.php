<?php

use App\Http\Controllers\GenshinImpactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

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
    ->whereNumber('character')
    ->middlewareFor(
        ['create', 'store', 'edit', 'update', 'destroy'],
        'auth'
    );