<?php

use App\Http\Controllers\BikeController;
use App\Models\Bike;
use Illuminate\Support\Facades\Route;

// Landing page (beranda) -- butuh beberapa sepeda untuk seksi
// "Jenis Sepeda Populer" (kartu geser). Route::view tidak bisa
// kirim data, jadi pakai closure yang tetap return view yang sama.
Route::get('/', function () {
    return view('pages.beranda', [
        'popular' => Bike::orderBy('id')->limit(5)->get(),
    ]);
})->name('beranda');

// Daftar sepeda (armada)
Route::get('/bikes', [BikeController::class, 'daftar'])->name('bikes.daftar');

// Detail satu sepeda
Route::get('/bikes/{bike}', [BikeController::class, 'detail'])->name('bikes.detail');
