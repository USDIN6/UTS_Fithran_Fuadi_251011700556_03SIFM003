<?php

use App\Http\Controllers\BikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BikeController::class, 'index'])->name('bikes.index');
Route::get('/bikes/{bike}', [BikeController::class, 'show'])->name('bikes.show');
