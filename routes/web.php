<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaKuesionerController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class,'HalamanLogin'])->name('login.index');
Route::get('/loginproses', [AuthController::class,'Login'])->name('login.proses');
Route::get('/buat-akun', [AuthController::class,'Create'])->name('buat-akun.index');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
Route::get('/about', [DashboardController::class,'about'])->name('dashboard.about');

Route::get('/kelolakuesioner', [KelolaKuesionerController::class,'index'])->name('kelola-kuesioner.index');
Route::get('/addkuesioner', [KelolaKuesionerController::class,'create'])->name('add-kuesioner.create');

Route::get('/kuesioner', [KuesionerController::class,'index'])->name('kuesioner.index');
Route::get('/jawab-kuesioner', [KuesionerController::class,'create'])->name('kuesioner.create');

Route::get('/profile', [ProfileController::class,'index'])->name('profile.index');