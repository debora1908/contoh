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