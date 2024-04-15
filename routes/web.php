<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->prefix('/profile')
    ->name('profile.')
    ->controller(ProfileController::class)
    ->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

require __DIR__ . '/auth.php';

Route::get('/admin/stores', [\App\Http\Controllers\Admin\StoreController::class, 'index'])
    ->name('stores.index');

Route::get('/admin/stores/store', [\App\Http\Controllers\Admin\StoreController::class, 'store'])
    ->name('stores.store');
