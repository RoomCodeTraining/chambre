<?php

use App\Http\Controllers\API\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->name('dashboard.')->group(function () {
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::get('/assignments', [DashboardController::class, 'assignments'])->name('assignments');
    Route::get('/insurers', [DashboardController::class, 'insurers'])->name('insurers');
    // Route::get('/brokers', [DashboardController::class, 'brokers'])->name('brokers');
    Route::get('/repairers', [DashboardController::class, 'repairers'])->name('repairers');
    Route::get('/vehicles', [DashboardController::class, 'vehicles'])->name('vehicles');
});
