<?php

use App\Http\Controllers\API\BodyworkController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('bodyworks.')->group(function () {
    Route::get('/', [BodyworkController::class, 'index'])->name('index');
    Route::post('/', [BodyworkController::class, 'store'])->name('store');
    Route::get('/{bodywork}', [BodyworkController::class, 'show'])->name('show');
    Route::put('/{bodywork}', [BodyworkController::class, 'update'])->name('update');
    Route::delete('/{bodywork}', [BodyworkController::class, 'destroy'])->name('destroy');
}); 