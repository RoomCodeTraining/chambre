<?php

use App\Http\Controllers\API\BankController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('banks.')->group(function () {
    Route::get('/', [BankController::class, 'index'])->name('banks.index');
    Route::post('/', [BankController::class, 'store'])->name('banks.store');
    Route::get('/{bank}', [BankController::class, 'show'])->name('banks.show');
    Route::put('/{bank}', [BankController::class, 'update'])->name('banks.update');
    Route::delete('/{bank}', [BankController::class, 'destroy'])->name('banks.destroy');
}); 