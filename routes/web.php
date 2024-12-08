<?php

use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
Route::view('test', 'test');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware([CheckUserRole::class.':admin'])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

    Route::view('profile', 'profile')->name('profile');
    Route::view('kuesioner/umkm', 'test')->name('kuesioner.umkm.index');
});

require __DIR__.'/auth.php';
