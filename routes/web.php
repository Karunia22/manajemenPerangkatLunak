<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\TampilanController;
use App\Http\Controllers\Pengelola\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/koleksi', [TampilanController::class, 'koleksi'])->name('koleksi');
    Route::get('/detailKoleksi', [TampilanController::class, 'detailKoleksi'])->name('detailKoleksi');
    Route::get('/index', [DashboardController::class, 'index'])->name('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
