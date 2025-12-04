<?php

use App\Http\Controllers\API\FneSettingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('fne-settings.')->group(function () {
    Route::get('/', [FneSettingController::class, 'index'])->name('index');
    Route::post('/', [FneSettingController::class, 'store'])->name('store');
    Route::get('/{id}', [FneSettingController::class, 'show'])->name('show');
    Route::put('/{id}', [FneSettingController::class, 'update'])->name('update');
    Route::delete('/{id}', [FneSettingController::class, 'destroy'])->name('destroy');
    Route::put('/{id}/enable', [FneSettingController::class, 'enable'])->name('enable');
    Route::put('/{id}/disable', [FneSettingController::class, 'disable'])->name('disable');
}); 