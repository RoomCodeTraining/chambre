<?php

use App\Http\Controllers\API\RechargeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('recharges.')->group(function () {
    Route::get('/', [RechargeController::class, 'index'])->name('index');
    Route::post('/', [RechargeController::class, 'store'])->name('store');
    Route::get('/{recharge}', [RechargeController::class, 'show'])->name('show');
    Route::post('/change-status', [RechargeController::class, 'changeStatus'])->name('changeStatus');
}); 