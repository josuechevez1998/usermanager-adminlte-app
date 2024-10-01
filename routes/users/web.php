<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSessionProfileController;

Route::middleware('auth')
    ->group(function () {
        Route::get('users/profile', [UserSessionProfileController::class, 'index'])
            ->name('users.profile');

        Route::put('users/profile/{user}/update', [UserSessionProfileController::class, 'update'])
            ->name('users.profile-update');

        Route::get('admin/settings', [UserSessionProfileController::class, 'changePassword'])
            ->name('users-profile.change-password');

        Route::put('user/profile/{user}/change-password', [UserSessionProfileController::class, 'updatePassword'])
            ->name('users-profile.update-password');
    });
