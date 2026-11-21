<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\KategoriController;

// Halaman Pengunjung
Route::get('/', [VisitorController::class, 'index'])->name('home');

// Halaman & Proses Autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Dashboard Pengguna (Setelah Login)
Route::middleware(['auth'])->prefix('pengguna')->name('pengguna.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});


// Halaman Dashboard Admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('dashboard');

    // Mengelola Akun Pengguna
    Route::get('/pengguna', [AdminController::class, 'pengguna'])
        ->name('pengguna.index');

    // Mengubah Status Akun Pengguna
    Route::put('/pengguna/{id}/status', [AdminController::class, 'ubahStatusPengguna'])
        ->name('pengguna.status');

    Route::get('/pendaftaran', [AdminController::class, 'pendaftaran'])
    ->name('pendaftaran.index');

    Route::put('/pendaftaran/{id}/status', [AdminController::class, 'ubahStatusPendaftaran'])
    ->name('pendaftaran.status');

    Route::get('/kategori', [KategoriController::class, 'index'])
    ->name('kategori.index');

Route::post('/kategori', [KategoriController::class, 'store'])
    ->name('kategori.store');

Route::put('/kategori/{id}', [KategoriController::class, 'update'])
    ->name('kategori.update');

Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])
    ->name('kategori.destroy');
});
