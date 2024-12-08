<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
Route::view('test', 'test');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';
