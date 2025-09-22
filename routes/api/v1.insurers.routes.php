<?php

use App\Http\Controllers\API\InsurerController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('insurers.')->group(function () {
    Route::get('/', [InsurerController::class, 'index'])->name('index');
}); 