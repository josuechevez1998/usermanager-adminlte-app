<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['auth', 'role:System'])
    ->group(function () {
        Route::get('permissions', [PermissionController::class, 'index'])
            ->middleware('permission:permissions.index')
            ->name('permissions.index');

        Route::get('permissions/create', [PermissionController::class, 'create'])
            ->middleware('permission:permissions.create')
            ->name('permissions.create');

        Route::post('permissions', [PermissionController::class, 'store'])
            ->middleware('permission:permissions.create')
            ->name('permissions.store');

        Route::get('permissions/{permission}', [PermissionController::class, 'edit'])
            ->middleware('permission:permissions.edit')
            ->name('permissions.edit');

        Route::put('permissions/{permission}', [PermissionController::class, 'update'])
            ->middleware('permission:permissions.edit')
            ->name('permissions.update');

        Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])
            ->middleware('permission:permissions.delete')
            ->name('permissions.destroy');
    });
