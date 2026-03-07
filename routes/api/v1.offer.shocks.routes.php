<?php

use App\Http\Controllers\API\OfferShockController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('offer-shocks.')->group(function () {
    Route::get('/', [OfferShockController::class, 'index'])->name('offer-shocks.index');
    Route::post('/', [OfferShockController::class, 'store'])->name('offer-shocks.store');
    Route::post('/store/point', [OfferShockController::class, 'storePoint'])->name('offer-shocks.store-point');
    Route::get('/{offerShock}', [OfferShockController::class, 'show'])->name('offer-shocks.show');
    Route::put('/{offerShock}', [OfferShockController::class, 'update'])->name('offer-shocks.update');
    Route::delete('/{offerShock}', [OfferShockController::class, 'destroy'])->name('offer-shocks.destroy');
    Route::put('/{offerShock}/order-offer-shock-works', [OfferShockController::class, 'orderShockWorks'])->name('offer-shocks.order-offer-shock-works');
    Route::put('/{offerShock}/order-offer-workforces', [OfferShockController::class, 'orderWorkforces'])->name('offer-shocks.order-offer-workforces');
});

