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
use App\Http\Controllers\Admin\KamarController as AdminKamarController;

// Rute CRUD khusus Admin (tanpa mengganggu rute lama)
Route::prefix('admin')->as('admin.')->group(function() {
    Route::resource('kamar', KamarController::class);
});
// Route untuk Dashboard dan CRUD Admin
Route::get('/admin/dashboard', [BookingController::class, 'index'])->name('admin.dashboard');
Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

// Route untuk Alur Reservasi Tamu
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/{id}/pembayaran', [BookingController::class, 'pembayaran'])->name('booking.pembayaran');
Route::post('/booking/{id}/konfirmasi', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');