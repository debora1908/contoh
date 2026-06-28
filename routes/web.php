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
// Route untuk halaman daftar foto-foto vila
Route::get('/villas', function () {
    return view('villas.index');
})->name('villas.index');
// Route untuk halaman galeri Beach Club
Route::get('/beach-club', function () {
    return view('beach-club.index');
})->name('beachclub.index');
Route::get('/wellness', function () {
    return view('wellness.index');
})->name('wellness.index');
// PINDAHKAN ATAU UBAH JADI SEPERTI INI UNTUK SEMENTARA:
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
use App\Http\Controllers\BookingController;

Route::get('/admin/dashboard', [BookingController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/dashboard/store', [BookingController::class, 'store'])->name('booking.store');


// Route untuk menampilkan halaman pembayaran berdasarkan ID data tamu
Route::get('/booking/pembayaran/{id}', [BookingController::class, 'pembayaran'])->name('booking.pembayaran');

// Route untuk memproses aksi tombol "Saya Sudah Transfer"
Route::post('/booking/konfirmasi/{id}', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');