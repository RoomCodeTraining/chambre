<?php

use App\Http\Controllers\API\OfferShockWorkController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('offer-shock-works.')->group(function () {
    Route::get('/', [OfferShockWorkController::class, 'index'])->name('offer-shock-works.index');
    Route::post('/', [OfferShockWorkController::class, 'store'])->name('offer-shock-works.store');
    Route::get('/{offerShockWork}', [OfferShockWorkController::class, 'show'])->name('offer-shock-works.show');
    Route::put('/{offerShockWork}', [OfferShockWorkController::class, 'update'])->name('offer-shock-works.update');
    Route::delete('/{offerShockWork}', [OfferShockWorkController::class, 'destroy'])->name('offer-shock-works.destroy');
});

