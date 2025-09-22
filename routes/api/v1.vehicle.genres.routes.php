<?php

use App\Http\Controllers\API\VehicleGenreController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('vehicle-genres.')->group(function () {
    Route::get('/', [VehicleGenreController::class, 'index'])->name('index');
    Route::post('/', [VehicleGenreController::class, 'store'])->name('store');
    Route::get('/{vehicle_genre}', [VehicleGenreController::class, 'show'])->name('show');
    Route::put('/{vehicle_genre}', [VehicleGenreController::class, 'update'])->name('update');
    Route::delete('/{vehicle_genre}', [VehicleGenreController::class, 'destroy'])->name('destroy');
}); 