<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OtpController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TokenController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\WelcomeController;
use Spatie\WelcomeNotification\WelcomesNewUsers;
use App\Http\Controllers\API\PasswordResetController;
use App\Http\Controllers\API\BrowserSessionsController;
use App\Http\Controllers\API\EmailVerificationController;

// Route::controller(OtpController::class)->name('auth.')->group(function () {
//     Route::post('/otp-validate', 'match')->name('otp.validate');
//     Route::post('/otp-resend', 'resend')->name('otp.resend');
// });

// // Route::middleware(['auth:sanctum'])->controller(BrowserSessionsController::class)->name('auth.')->group(function () {
// //     Route::get('/browser-sessions', 'index')->name('browser-sessions');
// //     Route::get('/browser-sessions/last-activity', 'lastActivity')->name('browser-sessions.last-activity');
// //     Route::post('/logout-browser-sessions', 'logout')->name('browser-sessions.logout');
// // });

Route::controller(TokenController::class)->name('auth.')->group(function () {
    /** @uses TokenController::store */
    Route::post('tokens', 'store')->name('store');

    // /** @uses TokenController::destroy */
    // Route::middleware(['auth:sanctum', 'verified.api'])->delete('tokens', 'destroy')->name('destroy');

    // /** @uses TokenController::fetch */
    // Route::middleware(['auth:sanctum', 'verified.api'])->get('tokens', 'fetch')->name('fetch');

    // /** @uses TokenController::revoke */
    // Route::middleware(['auth:sanctum', 'verified.api'])->post('tokens/revoke', 'revoke')->name('revoke');
});

Route::controller(AuthController::class)
    ->name('auth.')
    ->group(function () {
        Route::post('register', 'register')->name('register');
        // Route::post('login', 'login')->name('login');
        // Route::post('password/reset', 'passwordReset')->name('password.reset');
        // Route::post('password/forgot', 'passwordForgot')->name('password.forgot');
        Route::post('set-password', 'firstLogin')->name('first.login');
        Route::post('otp-validate', 'otpValidate')->name('otp.validate');
        Route::post('otp-resend', 'otpResend')->name('otp.resend');
        Route::delete('logout', 'logout')->name('logout')->middleware('auth:sanctum');
        Route::get('user', 'getCurrentUserAuth')->name('current.user')->middleware('auth:sanctum');
    });