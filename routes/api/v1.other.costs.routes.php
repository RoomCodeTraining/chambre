<?php

use App\Http\Controllers\API\OtherCostController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('other-costs.')->group(function () {
    Route::get('/', [OtherCostController::class, 'index'])->name('other-costs.index');
    Route::post('/', [OtherCostController::class, 'store'])->name('other-costs.store');
    Route::post('/calculate', [OtherCostController::class, 'calculate'])->name('other-costs.calculate');
    Route::get('/{otherCost}', [OtherCostController::class, 'show'])->name('other-costs.show');
    Route::put('/{otherCost}', [OtherCostController::class, 'update'])->name('other-costs.update');
    Route::delete('/{otherCost}', [OtherCostController::class, 'destroy'])->name('other-costs.destroy');
}); 