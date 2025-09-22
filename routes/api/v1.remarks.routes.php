<?php

use App\Http\Controllers\API\RemarkController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('remarks.')->group(function () {
    Route::get('/', [RemarkController::class, 'index'])->name('remarks.index');
    Route::post('/', [RemarkController::class, 'store'])->name('remarks.store');
    Route::get('/{remark}', [RemarkController::class, 'show'])->name('remarks.show');
    Route::put('/{remark}', [RemarkController::class, 'update'])->name('remarks.update');
    Route::delete('/{remark}', [RemarkController::class, 'destroy'])->name('remarks.destroy');
}); 