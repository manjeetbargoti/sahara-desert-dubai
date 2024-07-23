<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {

    // Register Route
    Route::get('register', [App\Http\Controllers\Admin\Auth\RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [App\Http\Controllers\Admin\Auth\RegisteredUserController::class, 'store']);

    // Login Route
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'store']);
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('admin.dashboard');

    // Permission Routes
    Route::resource('permissions', App\Http\Controllers\Admin\PermissionController::class);
    Route::get('permissions/{id}/delete', [App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('admin.permission.delete');

    // Role Routes
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::get('roles/{id}/delete', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('admin.role.delete');
    Route::get('roles/{id}/add-permissions', [App\Http\Controllers\Admin\RoleController::class, 'addPermissionsToRole'])->name('admin.role.add.permissions');
    Route::put('roles/{id}/give-permissions', [App\Http\Controllers\Admin\RoleController::class, 'givePermissionsToRole'])->name('admin.role.give.permissions');

    // User Routes
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);

    // Admin Logout
    Route::match(['get', 'post'],'logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'destroy'])->name('admin.logout');
});
