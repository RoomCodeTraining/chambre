<?php

use App\Http\Controllers\API\RepairerController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('repairers.')->group(function () {
    Route::get('/', [RepairerController::class, 'index'])->name('index');
}); 