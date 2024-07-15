<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    // Permission Route
    Route::resource('permissions', App\Http\Controllers\Admin\PermissionController::class);

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

    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'destroy'])->name('admin.logout');
});
