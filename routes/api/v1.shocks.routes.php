<?php

use App\Http\Controllers\API\ShockController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('shocks.')->group(function () {
    Route::get('/', [ShockController::class, 'index'])->name('shocks.index');
    Route::post('/', [ShockController::class, 'store'])->name('shocks.store');
    Route::post('/store/point', [ShockController::class, 'storePoint'])->name('shocks.store-point');
    Route::get('/{shock}', [ShockController::class, 'show'])->name('shocks.show');
    Route::put('/{shock}', [ShockController::class, 'update'])->name('shocks.update');
    Route::delete('/{shock}', [ShockController::class, 'destroy'])->name('shocks.destroy');
    Route::put('/{shock}/order-shock-works', [ShockController::class, 'orderShockWorks'])->name('shocks.order-shock-works');
    Route::put('/{shock}/order-workforces', [ShockController::class, 'orderWorkforces'])->name('shocks.order-workforces');
}); 