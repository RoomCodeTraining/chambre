<?php

use App\Http\Controllers\API\OfferWorkforceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('offer-workforces.')->group(function () {
    Route::get('/', [OfferWorkforceController::class, 'index'])->name('offer-workforces.index');
    Route::post('/', [OfferWorkforceController::class, 'store'])->name('offer-workforces.store');
    Route::get('/{offerWorkforce}', [OfferWorkforceController::class, 'show'])->name('offer-workforces.show');
    Route::put('/{offerWorkforce}', [OfferWorkforceController::class, 'update'])->name('offer-workforces.update');
    Route::delete('/{offerWorkforce}', [OfferWorkforceController::class, 'destroy'])->name('offer-workforces.destroy');
});

