<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ManagerAuthController;
use App\Http\Controllers\UserAuthController;

// Admin Controller
use App\Http\Controllers\Admin\KamarController as AdminKamarController;
use App\Http\Controllers\Admin\ReservasiController as AdminReservasiController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\LaporanController;


Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/about_us', fn () => view('about_us.index'))->name('about_us.index');
Route::get('/villas', fn () => view('villas.index'))->name('villas.index');
Route::get('/beachclub', fn () => view('Beach-club.index'))->name('beachclub.index');
Route::get('/wellness', fn () => view('wellness.index'))->name('wellness.index');




Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');

Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');



Route::get('/login', [ManagerAuthController::class, 'showAdminLogin'])->name('login');
Route::post('/login', [ManagerAuthController::class, 'adminLogin'])->name('login.proses');



Route::get('/user/login', [UserAuthController::class, 'showLogin'])
    ->name('user.login');

Route::post('/user/login', [UserAuthController::class, 'login'])
    ->name('user.login.proses');




Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [BookingController::class, 'index'])
            ->name('dashboard');

        // Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan.index');

        // Manajemen Kamar
        Route::resource('manajemen', AdminKamarController::class);

        // Reservasi
        Route::get('/reservasi', [AdminReservasiController::class, 'index'])
            ->name('reservasi.index');

        Route::get('/reservasi/{id}', [AdminReservasiController::class, 'detail'])
            ->name('reservasi.detail');

        Route::put('/reservasi/{id}', [AdminReservasiController::class, 'update'])
            ->name('reservasi.update');

        Route::delete('/reservasi/{id}', [AdminReservasiController::class, 'destroy'])
            ->name('reservasi.destroy');

        Route::put('/reservasi/checkin/{id}', [AdminReservasiController::class, 'checkIn'])
            ->name('reservasi.checkin');

        Route::put('/reservasi/checkout/{id}', [AdminReservasiController::class, 'checkOut'])
            ->name('reservasi.checkout');

        Route::get('/reservasi/cetak/{id}', [AdminReservasiController::class, 'cetak'])
            ->name('reservasi.cetak');

        // Pengguna
        Route::resource('pengguna', PenggunaController::class);

        Route::put('/pengguna/reset/{id}', [PenggunaController::class, 'resetPassword'])
            ->name('pengguna.reset');
    });




Route::post('/booking/store', [BookingController::class, 'store'])
    ->name('booking.store');

Route::get('/booking/pembayaran/{id}', [BookingController::class, 'pembayaran'])
    ->name('booking.pembayaran');

Route::post('/booking/konfirmasi/{id}', [BookingController::class, 'konfirmasi'])
    ->name('booking.konfirmasi');

Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])
    ->name('booking.edit');

Route::put('/booking/{id}', [BookingController::class, 'update'])
    ->name('booking.update');

Route::delete('/booking/{id}', [BookingController::class, 'destroy'])
    ->name('booking.destroy');
    // Register User
Route::get('/user/register', [UserAuthController::class, 'showRegister'])
    ->name('user.register');

Route::post('/user/register', [UserAuthController::class, 'register'])
    ->name('user.register.proses');
    // Lupa Password
Route::get('/user/lupa-password', [UserAuthController::class, 'showForgotPassword'])
    ->name('user.forgot');

Route::post('/user/lupa-password', [UserAuthController::class, 'forgotPassword'])
    ->name('user.forgot.proses');