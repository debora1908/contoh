<?php

use App\Http\Controllers\KamarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;
Route::get('/', function () {
    return view('welcome');
    
});
Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

use App\Http\Controllers\AuthController;

// Menampilkan halaman login saat mengakses url: web.test/login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Memproses input form login saat tombol submit ditekan
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');

// Menangani aksi keluar dari sistem (Logout)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');