<?php

use App\Http\Controllers\API\ClaimNatureController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('claim-natures.')->group(function () {
    Route::get('/', [ClaimNatureController::class, 'index'])->name('claim-natures.index');
    Route::post('/', [ClaimNatureController::class, 'store'])->name('claim-natures.store');
    Route::get('/{claim_nature}', [ClaimNatureController::class, 'show'])->name('claim-natures.show');
    Route::put('/{claim_nature}', [ClaimNatureController::class, 'update'])->name('claim-natures.update');
    Route::delete('/{claim_nature}', [ClaimNatureController::class, 'destroy'])->name('claim-natures.destroy');
}); 