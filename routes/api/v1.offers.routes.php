<?php

use App\Http\Controllers\API\OfferController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('offers.')->group(function () {
    Route::get('/', [OfferController::class, 'index'])->name('offers.index');
    Route::post('/', [OfferController::class, 'store'])->name('offers.store');
    Route::get('/{offer}', [OfferController::class, 'show'])->name('offers.show');
    Route::put('/{offer}', [OfferController::class, 'update'])->name('offers.update');
    Route::put('/{offer}/send', [OfferController::class, 'send'])->name('offers.send');
    Route::put('/{offer}/accept', [OfferController::class, 'accept'])->name('offers.accept');
    Route::delete('/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
});

