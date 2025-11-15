<?php

use App\Http\Controllers\API\OtherCostTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('other-costs.')->group(function () {
    Route::get('/', [OtherCostTypeController::class, 'index'])->name('other-cost-types.index');
    Route::post('/', [OtherCostTypeController::class, 'store'])->name('other-cost-types.store');
    Route::get('/{otherCostType}', [OtherCostTypeController::class, 'show'])->name('other-cost-types.show');
    Route::put('/{otherCostType}', [OtherCostTypeController::class, 'update'])->name('other-cost-types.update');
    Route::delete('/{otherCostType}', [OtherCostTypeController::class, 'destroy'])->name('other-cost-types.destroy');
    Route::put('/{otherCostType}/enable', [OtherCostTypeController::class, 'enable'])->name('other-cost-types.enable');
    Route::put('/{otherCostType}/disable', [OtherCostTypeController::class, 'disable'])->name('other-cost-types.disable');
}); 