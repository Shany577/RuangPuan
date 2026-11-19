<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

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

// Halaman Dashboard Admin (dilindungi middleware auth)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});