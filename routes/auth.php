<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// routing untuk guest
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create']) //register
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']); //register post data

    Route::get('login', [AuthenticatedSessionController::class, 'create']) //get login 
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']); //store login

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create']) //create view forget password
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});
//untuk auth
Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class) //verify email
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class) //verify email
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']); //simpan password

    Route::put('password', [PasswordController::class, 'update'])->name('password.update'); //update password

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']) //logout
        ->name('logout');
});
