<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ManagerAuthController;
use App\Http\Controllers\ManagerController;

use App\Http\Controllers\Admin\KamarController as AdminKamarController;
use App\Http\Controllers\Admin\ReservasiController as AdminReservasiController;
use App\Http\Controllers\Admin\PenggunaController;

/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/villas', fn() => view('villas.index'))->name('villas.index');
Route::get('/beachclub', fn() => view('Beach-club.index'))->name('beachclub.index');
Route::get('/wellness', fn() => view('wellness.index'))->name('wellness.index');
Route::get('/about_us', fn() => view('about_us.index'))->name('about_us.index');

/*
|--------------------------------------------------------------------------
| KAMAR & RESERVASI
|--------------------------------------------------------------------------
*/

Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');

Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

/*
|--------------------------------------------------------------------------
| LOGIN USER / MANAGER
|--------------------------------------------------------------------------
*/

Route::get('/login', [ManagerAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [ManagerAuthController::class, 'login'])->name('login.proses');

/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [ManagerAuthController::class, 'showAdminLogin'])
    ->name('admin.login');

Route::post('/admin/login', [ManagerAuthController::class, 'adminLogin'])
    ->name('admin.login.proses');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {

        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('manager.dashboard');

    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | MANAGER
    |--------------------------------------------------------------------------
    */

    Route::get('/manager/dashboard', [ManagerController::class, 'index'])
        ->name('manager.dashboard');

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', [BookingController::class, 'index'])
            ->name('dashboard');

        // Manajemen Kamar
        Route::resource('manajemen', AdminKamarController::class);

        // Reservasi
        Route::get('/reservasi', [AdminReservasiController::class, 'index'])->name('reservasi.index');
        Route::get('/reservasi/{id}', [AdminReservasiController::class, 'detail'])->name('reservasi.detail');
        Route::put('/reservasi/{id}', [AdminReservasiController::class, 'update'])->name('reservasi.update');
        Route::delete('/reservasi/{id}', [AdminReservasiController::class, 'destroy'])->name('reservasi.destroy');

        Route::put('/reservasi/checkin/{id}', [AdminReservasiController::class, 'checkIn'])->name('reservasi.checkin');
        Route::put('/reservasi/checkout/{id}', [AdminReservasiController::class, 'checkOut'])->name('reservasi.checkout');

        Route::get('/reservasi/cetak/{id}', [AdminReservasiController::class, 'cetak'])->name('reservasi.cetak');

        // Pengguna
        Route::resource('pengguna', PenggunaController::class);

        Route::put('/pengguna/reset/{id}', [PenggunaController::class, 'resetPassword'])
            ->name('pengguna.reset');

    });

});

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