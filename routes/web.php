<?php

use App\Http\Middleware\CheckUserRole;
use App\Livewire\Dashboard;
use App\Livewire\Questionnaire;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/beranda');
Route::view('test', 'test');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('beranda', Dashboard\Index::class)->name('dashboard');
    Route::view('tentang-kami', 'about')->name('about');
    Route::view('profil', 'profile')->name('profile');

    Route::get('kuisioner', Questionnaire\Index::class)->name('questionnaire.index');
    Route::get('kuisioner/{id}/jawab', Questionnaire\Answer\Show::class)->name('questionnaire.answer.show');

    // ADMIN
    Route::middleware([CheckUserRole::class.':admin'])->group(function () {
        Route::prefix('kuisioner')->name('questionnaire.')->group(function () {
            Route::get('tambah', Questionnaire\Create::class)->name('create');
            Route::get('{id}/sunting', Questionnaire\Edit::class)->name('edit');
        });
    });
});

require __DIR__.'/auth.php';
