<?php

use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/beranda');
Route::view('test', 'test');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware([CheckUserRole::class.':admin'])->group(function () {});

    Route::view('beranda', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::view('tentang-kami', 'about')->name('about');
});

require __DIR__.'/auth.php';
