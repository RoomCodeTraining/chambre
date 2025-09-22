<?php

use App\Http\Controllers\API\AppSettingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('app-settings.')->group(function () {
    Route::get('/', [AppSettingController::class, 'index'])->name('index');
    Route::post('/', [AppSettingController::class, 'store'])->name('store');
    Route::get('/{appSetting}', [AppSettingController::class, 'show'])->name('show');
    Route::put('/{appSetting}', [AppSettingController::class, 'update'])->name('update');
    Route::delete('/{appSetting}', [AppSettingController::class, 'destroy'])->name('destroy');
}); 