<?php

use App\Http\Controllers\API\UserActionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('user.actions.')->group(function () {
    Route::get('/', [UserActionController::class, 'index'])->name('index');
    Route::post('/', [UserActionController::class, 'store'])->name('store');
    Route::get('/{id}', [UserActionController::class, 'show'])->name('show');
    Route::put('/{id}', [UserActionController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserActionController::class, 'destroy'])->name('destroy');
}); 