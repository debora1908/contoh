
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\Admin\KamarController as AdminKamarController;
use App\Http\Controllers\Admin\ReservasiController as AdminReservasiController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/villas', function () {
    return view('villas');
})->name('villas.index');

Route::get('/beachclub', function () {
    return view('beachclub');
})->name('beachclub.index');

Route::get('/wellness', function () {
    return view('wellness');
})->name('wellness.index');


Route::get('/kamar', [KamarController::class, 'index'])
    ->name('kamar.index');

Route::post('/kamar', [KamarController::class, 'store'])
    ->name('kamar.store');

Route::get('/reservasi', [ReservasiController::class, 'index'])
    ->name('reservasi.index');

Route::post('/reservasi', [ReservasiController::class, 'store'])
    ->name('reservasi.store');


Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.proses');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');



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



Route::get('/admin/dashboard', [BookingController::class, 'index'])
    ->name('admin.dashboard');


Route::prefix('admin')->name('admin.')->group(function () {

   
    Route::get('/manajemen', [AdminKamarController::class, 'index'])
        ->name('manajemen.index');

    Route::post('/manajemen', [AdminKamarController::class, 'store'])
        ->name('manajemen.store');

    Route::put('/manajemen/{id}', [AdminKamarController::class, 'update'])
        ->name('manajemen.update');

    Route::delete('/manajemen/{id}', [AdminKamarController::class, 'destroy'])
        ->name('manajemen.destroy');


    Route::get('/reservasi', [BookingController::class, 'reservasi'])
        ->name('reservasi.index');

    Route::get('/reservasi/{id}', [BookingController::class, 'detail'])
        ->name('reservasi.detail');

    Route::put('/reservasi/{id}', [BookingController::class, 'updateReservasi'])
        ->name('reservasi.update');

    Route::delete('/reservasi/{id}', [BookingController::class, 'destroyReservasi'])
        ->name('reservasi.destroy');

    Route::put('/reservasi/checkin/{id}', [BookingController::class, 'checkIn'])
        ->name('reservasi.checkin');

    Route::put('/reservasi/checkout/{id}', [BookingController::class, 'checkOut'])
        ->name('reservasi.checkout');
Route::get('/reservasi/cetak/{id}', [AdminReservasiController::class, 'cetak'])
    ->name('reservasi.cetak');

});