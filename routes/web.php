<?php

use App\Http\Controllers\KamarController;
use Illuminate\Support\Facades\Route;

Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');