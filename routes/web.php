<?php

use App\Http\Controllers\Admin\AdminAkunController;
use App\Http\Controllers\Admin\AdminDasboardController;
use App\Http\Controllers\Pengelola\DashboardController;
use App\Http\Controllers\Pengelola\DetailKoleksiController;
use App\Http\Controllers\Pengelola\KategoriController;
use App\Http\Controllers\Pengelola\KoleksiController;
use App\Http\Controllers\Pengelola\VideoCategoryController;
use App\Http\Controllers\Pengelola\VideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\TampilanController;
use App\Http\Controllers\User\TampilanVideo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'pengunjung'])->group(function () {
    Route::get('/dashboard', [TampilanController::class, 'index'])->name('dashboard');
    Route::get('/koleksi', [TampilanController::class, 'koleksi'])->name('koleksi');
    Route::get('/detailKoleksi/{id}', [TampilanController::class, 'detailKoleksi'])->name('detailKoleksi');
    Route::get('/video-budaya', [TampilanVideo::class, 'index'])->name('visitorVideo');

// Halaman Detail Player Video ketika salah satu video 
Route::get('/video-budaya/{id}', [TampilanVideo::class, 'show'])->name('detailVideo');
});

Route::middleware(['auth', 'pengelola'])->group(function () {
    Route::get('/indexP', [KoleksiController::class, 'index'])->name('indexP');
    Route::get('/tambah', [KoleksiController::class, 'tambah'])->name('tambah');
    Route::get('/edit', [KoleksiController::class, 'edit'])->name('edit');
    Route::get('/edit', [KoleksiController::class, 'edit'])->name('edit');
    Route::get('/indexK', [KategoriController::class, 'tambahKategori'])->name('indexK');
    Route::get('/editK', [KategoriController::class, 'edit'])->name('editK');
    Route::get('/index', [DashboardController::class, 'index'])->name('index');
    Route::get('/tambahKategori', [DashboardController::class, 'tambahKategori'])->name('tambahKategori');
    Route::get('/pengelolah/koleksi/{id}', [DetailKoleksiController::class, 'detail'])
        ->name('detailKoleksiPengelola');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/pengelola/api/live-stats', [DashboardController::class, 'getLiveStats'])->name('pengelola.liveStats');
    Route::get('/video', [VideoController::class, 'index'])->name('video');
    Route::get('/video/tambah', [VideoController::class, 'tambah'])->name('videoTambah');
    Route::get('/video/lihat/{id}', [VideoController::class, 'show'])->name('videoLihat');
    Route::get('/video/edit/{id}', [VideoController::class, 'edit'])
        ->name('videoEdit');

    Route::post('/validasiKategori', [KategoriController::class, 'validasi'])->name('validasiKategori');
    Route::post('/validasiKoleksi', [KoleksiController::class, 'validasi'])->name('validasiKoleksi');
    Route::post('/video/validasi', [VideoController::class, 'validasi'])->name('validasiVideo');

    Route::patch('/pengelolah/koleksi/{id}', [DetailKoleksiController::class, 'update'])->name('koleksiUpdate');
    Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::patch('/video/update/{id}', [VideoController::class, 'update'])
        ->name('videoUpdate');

    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.hapus');
    Route::delete('/koleksi/{id}/hapus', [KoleksiController::class, 'destroy'])->name('koleksiHapus');
    Route::delete('/video/{id}/hapus', [VideoController::class, 'destroy'])->name('videoHapus');


    Route::get('/video-kategori', [VideoCategoryController::class, 'index'])
        ->name('videoKategori');


    Route::post('/video-kategori/simpan', [VideoCategoryController::class, 'simpan'])
        ->name('videoKategoriSimpan');

    Route::get('/video-kategori/edit/{id}', [VideoCategoryController::class, 'edit'])
        ->name('videoKategoriEdit');

    Route::patch('/video-kategori/update/{id}', [VideoCategoryController::class, 'update'])
        ->name('videoKategoriUpdate');

    Route::delete('/video-kategori/hapus/{id}', [VideoCategoryController::class, 'destroy'])
        ->name('videoKategoriHapus');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/indexA', [AdminDasboardController::class, 'index'])->name('indexA');
    Route::get('/akunA', [AdminAkunController::class, 'index'])->name('akunA');
    Route::get('/tambahA', [AdminAkunController::class, 'tambah'])->name('tambahA');
    Route::get('/editA/{id}', [AdminAkunController::class, 'edit'])->name('editA');
    Route::get('/admin/api/live-stats', [DashboardController::class, 'getLiveStats'])->name('admin.liveStats');
    Route::patch('/akun/{id}', [AdminAkunController::class, 'update'])
        ->name('akun.update');

    Route::post('/validasi', [AdminAkunController::class, 'validasi'])->name('validasiUser');
    Route::delete('/akun/{id}', [AdminAkunController::class, 'destroy'])
        ->name('hapusAkun');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
