<?php

use App\Http\Controllers\API\VehicleController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('vehicles.')->group(function () {
    Route::get('/', [VehicleController::class, 'index'])->name('index');
    Route::post('/', [VehicleController::class, 'store'])->name('store');
    Route::get('/{vehicle}', [VehicleController::class, 'show'])->name('show');
    Route::put('/{vehicle}', [VehicleController::class, 'update'])->name('update');
    Route::delete('/{vehicle}', [VehicleController::class, 'destroy'])->name('destroy');
}); 