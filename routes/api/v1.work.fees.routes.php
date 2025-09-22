<?php

use App\Http\Controllers\API\WorkFeeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('work-fees.')->group(function () {
    Route::get('/', [WorkFeeController::class, 'index'])->name('index');
    Route::post('/', [WorkFeeController::class, 'store'])->name('store');
    Route::get('/{workFee}', [WorkFeeController::class, 'show'])->name('show');
    Route::put('/{workFee}', [WorkFeeController::class, 'update'])->name('update');
    Route::delete('/{workFee}', [WorkFeeController::class, 'destroy'])->name('destroy');
}); 