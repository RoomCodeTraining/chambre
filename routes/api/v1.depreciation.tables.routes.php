<?php

use App\Http\Controllers\API\DepreciationTableController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('depreciation-tables.')->group(function () {
    Route::get('/', [DepreciationTableController::class, 'index'])->name('index');
    Route::post('/', [DepreciationTableController::class, 'store'])->name('store');
    Route::get('/{depreciation_table}', [DepreciationTableController::class, 'show'])->name('show');
    Route::put('/{depreciation_table}', [DepreciationTableController::class, 'update'])->name('update');
    Route::delete('/{depreciation_table}', [DepreciationTableController::class, 'destroy'])->name('destroy');
    Route::post('/calculate-theoretical-market-value', [DepreciationTableController::class, 'calculate_theoretical_market_value'])->name('calculate-theoretical-market-value');
    // Route::post('/calculate-market-value', [DepreciationTableController::class, 'calculate_market_value'])->name('calculate-market-value');
}); 