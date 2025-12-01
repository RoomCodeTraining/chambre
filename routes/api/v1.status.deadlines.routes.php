<?php

use App\Http\Controllers\API\StatusDeadlineController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('status-deadlines.')->group(function () {
    Route::get('/', [StatusDeadlineController::class, 'index'])->name('status-deadlines.index');
    Route::post('/', [StatusDeadlineController::class, 'store'])->name('status-deadlines.store');
    Route::get('/{status_deadline}', [StatusDeadlineController::class, 'show'])->name('status-deadlines.show');
    Route::put('/{status_deadline}', [StatusDeadlineController::class, 'update'])->name('status-deadlines.update');
    Route::delete('/{status_deadline}', [StatusDeadlineController::class, 'destroy'])->name('status-deadlines.destroy');
    Route::post('/{status_deadline}/enable', [StatusDeadlineController::class, 'enable'])->name('status-deadlines.enable');
    Route::post('/{status_deadline}/disable', [StatusDeadlineController::class, 'disable'])->name('status-deadlines.disable');
}); 