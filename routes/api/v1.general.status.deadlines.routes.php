<?php

use App\Http\Controllers\API\GeneralStatusDeadlineController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('general-status-deadlines.')->group(function () {
    Route::get('/', [GeneralStatusDeadlineController::class, 'index'])->name('general-status-deadlines.index');
    Route::post('/', [GeneralStatusDeadlineController::class, 'store'])->name('general-status-deadlines.store');
    Route::get('/{general_status_deadline}', [GeneralStatusDeadlineController::class, 'show'])->name('general-status-deadlines.show');
    Route::put('/{general_status_deadline}', [GeneralStatusDeadlineController::class, 'update'])->name('general-status-deadlines.update');
    Route::delete('/{general_status_deadline}', [GeneralStatusDeadlineController::class, 'destroy'])->name('general-status-deadlines.destroy');
    Route::post('/{general_status_deadline}/enable', [GeneralStatusDeadlineController::class, 'enable'])->name('general-status-deadlines.enable');
    Route::post('/{general_status_deadline}/disable', [GeneralStatusDeadlineController::class, 'disable'])->name('general-status-deadlines.disable');
}); 