<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\KamarController; 
use App\Http\Controllers\Admin\KamarController as AdminKamarController; 

/* SISI PUBLIK */
Route::get('/', function () { return view('welcome'); });
Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

/* SISI BOOKING & AUTH */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/pembayaran/{id}', [BookingController::class, 'pembayaran'])->name('booking.pembayaran');
Route::post('/booking/konfirmasi/{id}', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');

/* SISI DASHBOARD & MANAGEMENT ADMIN */
Route::get('/admin/dashboard', [BookingController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/manajemen', [AdminKamarController::class, 'index'])->name('manajemen.index');
    Route::post('/manajemen', [AdminKamarController::class, 'store'])->name('manajemen.store');
    Route::put('/manajemen/{id}', [AdminKamarController::class, 'update'])->name('manajemen.update');
    Route::delete('/manajemen/{id}', [AdminKamarController::class, 'destroy'])->name('manajemen.destroy');
});

Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');