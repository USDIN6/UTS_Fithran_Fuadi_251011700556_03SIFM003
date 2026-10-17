<?php

use App\Http\Controllers\BikeController;
use Illuminate\Support\Facades\Route;

// Landing page (beranda)
Route::view('/', 'beranda')->name('beranda');

// Daftar sepeda (armada)
Route::get('/bikes', [BikeController::class, 'index'])->name('bikes.index');

// Detail satu sepeda
Route::get('/bikes/{bike}', [BikeController::class, 'show'])->name('bikes.show');
