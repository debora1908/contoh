<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\KamarController;

use App\Http\Controllers\Admin\KamarController as AdminKamarController;
use App\Http\Controllers\Admin\ReservasiController as AdminReservasiController;
use App\Http\Controllers\Admin\PenggunaController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/villas', function () {
    return view('villas.index');
})->name('villas.index');

Route::get('/beachclub', function () {
    return view('Beach-club.index');
})->name('beachclub.index');

Route::get('/wellness', function () {
    return view('wellness.index');
})->name('wellness.index');

/*
|--------------------------------------------------------------------------
| KAMAR
|--------------------------------------------------------------------------
*/

Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');

/*
|--------------------------------------------------------------------------
| RESERVASI TAMU
|--------------------------------------------------------------------------
*/

Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| BOOKING
|--------------------------------------------------------------------------
*/

Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/pembayaran/{id}', [BookingController::class, 'pembayaran'])->name('booking.pembayaran');
Route::post('/booking/konfirmasi/{id}', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');
Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    | Dashboard
    */
    Route::get('/dashboard', [BookingController::class, 'index'])->name('dashboard');

    /*
    | Manajemen Kamar
    */
    Route::get('/manajemen', [AdminKamarController::class, 'index'])->name('manajemen.index');
    Route::post('/manajemen', [AdminKamarController::class, 'store'])->name('manajemen.store');
    Route::put('/manajemen/{id}', [AdminKamarController::class, 'update'])->name('manajemen.update');
    Route::delete('/manajemen/{id}', [AdminKamarController::class, 'destroy'])->name('manajemen.destroy');

    /*
    | Reservasi Admin
    */
    Route::get('/reservasi', [AdminReservasiController::class, 'index'])->name('reservasi.index');
    Route::get('/reservasi/{id}', [AdminReservasiController::class, 'detail'])->name('reservasi.detail');
    Route::put('/reservasi/{id}', [AdminReservasiController::class, 'update'])->name('reservasi.update');
    Route::delete('/reservasi/{id}', [AdminReservasiController::class, 'destroy'])->name('reservasi.destroy');
    Route::put('/reservasi/checkin/{id}', [AdminReservasiController::class, 'checkIn'])->name('reservasi.checkin');
    Route::put('/reservasi/checkout/{id}', [AdminReservasiController::class, 'checkOut'])->name('reservasi.checkout');
    Route::get('/reservasi/cetak/{id}', [AdminReservasiController::class, 'cetak'])->name('reservasi.cetak');

    /*
    | Pengguna
    */
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    Route::put('/pengguna/reset/{id}', [PenggunaController::class, 'resetPassword'])->name('pengguna.reset');
    

});