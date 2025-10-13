<?php

use App\Http\Controllers\API\VehicleRelationshipController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('vehicle-relationships.')->group(function () {
    Route::get('/', [VehicleRelationshipController::class, 'index'])->name('index');
    Route::post('/', [VehicleRelationshipController::class, 'store'])->name('store');
    Route::get('/{vehicleRelationship}', [VehicleRelationshipController::class, 'show'])->name('show');
    Route::put('/{vehicleRelationship}', [VehicleRelationshipController::class, 'update'])->name('update');
    Route::delete('/{vehicleRelationship}', [VehicleRelationshipController::class, 'destroy'])->name('destroy');
}); 