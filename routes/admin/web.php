<?php

use App\Http\Controllers\AssignPermissionsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleHasPermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSessionProfileController;
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

        Route::get('permissions/{permission}/show', [PermissionController::class, 'show'])
            ->middleware('permission:permissions.show')
            ->name('permissions.show');

        Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])
            ->middleware('permission:permissions.edit')
            ->name('permissions.edit');

        Route::put('permissions/{permission}/update', [PermissionController::class, 'update'])
            ->middleware('permission:permissions.edit')
            ->name('permissions.update');

        Route::delete('permissions/{permission}/delete', [PermissionController::class, 'destroy'])
            ->middleware('permission:permissions.delete')
            ->name('permissions.destroy');
    });

Route::prefix('admin')
    ->middleware(['auth', 'role:System'])
    ->group(function () {
        Route::resource('users', UserController::class);

        Route::get('users/{user}/reset-password', [UserController::class, 'resetPassword'])
            ->name('users.resetPassword');
    });

Route::prefix('admin')
    ->middleware(['auth', 'role:System'])
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::get('/roles/{role}/assign-permission', [AssignPermissionsController::class, 'index'])
            ->name('roles.assignPermissions');

        Route::post('/roles/{role}/assign-permission', [AssignPermissionsController::class, 'assignPermission'])
            ->name('roles.assign-permission');

        Route::post('/roles/{role}/revoke-permission', [AssignPermissionsController::class, 'revokePermission'])
            ->name('roles.revoke-permission');

        Route::resource('role-has-permissions', RoleHasPermissionController::class);
    });
