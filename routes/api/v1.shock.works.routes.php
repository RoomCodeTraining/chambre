<?php

use App\Http\Controllers\API\ShockWorkController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('shock-works.')->group(function () {
    Route::get('/', [ShockWorkController::class, 'index'])->name('shock-works.index');
    Route::post('/', [ShockWorkController::class, 'store'])->name('shock-works.store');
    Route::post('/calculate', [ShockWorkController::class, 'calculate'])->name('shock-works.calculate');
    Route::get('/{shock_work}', [ShockWorkController::class, 'show'])->name('shock-works.show');
    Route::put('/{shock_work}', [ShockWorkController::class, 'update'])->name('shock-works.update');
    Route::delete('/{shock_work}', [ShockWorkController::class, 'destroy'])->name('shock-works.destroy');
    Route::post('/get-supply-price-by-vehicle-brand-and-vehicle-model', [ShockWorkController::class, 'get_supply_price_by_vehicle_brand_and_vehicle_model'])->name('shock-works.get_supply_price_by_vehicle_brand_and_vehicle_model');
}); 