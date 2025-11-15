<?php

use App\Http\Controllers\API\PaintTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('paint-types.')->group(function () {
    Route::get('/', [PaintTypeController::class, 'index'])->name('paint-types.index');
    Route::post('/', [PaintTypeController::class, 'store'])->name('paint-types.store');
    Route::get('/{paintType}', [PaintTypeController::class, 'show'])->name('paint-types.show');
    Route::put('/{paintType}', [PaintTypeController::class, 'update'])->name('paint-types.update');
    Route::delete('/{paintType}', [PaintTypeController::class, 'destroy'])->name('paint-types.destroy');
    Route::put('/{paintType}/enable', [PaintTypeController::class, 'enable'])->name('paint-types.enable');
    Route::put('/{paintType}/disable', [PaintTypeController::class, 'disable'])->name('paint-types.disable');
}); 