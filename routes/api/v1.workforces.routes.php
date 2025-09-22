<?php

use App\Http\Controllers\API\WorkforceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('workforces.')->group(function () {
    Route::get('/', [WorkforceController::class, 'index'])->name('workforces.index');
    Route::post('/', [WorkforceController::class, 'store'])->name('workforces.store');
    Route::post('/calculate', [WorkforceController::class, 'calculate'])->name('workforces.calculate');
    Route::get('/{workforce}', [WorkforceController::class, 'show'])->name('workforces.show');
    Route::put('/{workforce}', [WorkforceController::class, 'update'])->name('workforces.update');
    Route::delete('/{workforce}', [WorkforceController::class, 'destroy'])->name('workforces.destroy');
}); 