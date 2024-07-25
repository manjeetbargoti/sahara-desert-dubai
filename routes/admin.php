<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' =>'admin', 'middleware'=>'guest:admin'], function () {

    // Register Route
    Route::get('register', 'Auth\RegisteredUserController@create')->name('admin.register');
    Route::post('register', 'Auth\RegisteredUserController@store');

    // Login Route
    // Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'create'])->name('admin.login');
    Route::get('login', 'Auth\LoginController@create')->name('admin.login');
    Route::post('login', 'Auth\LoginController@store');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->middleware('auth:admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('admin.dashboard');

    // Permission Routes
    Route::any('permissions/{id}', 'PermissionController@update')->name('admin.permissions.update');

    // Role Routes
    Route::match(['get','post'], 'roles', 'RoleController@index')->name('admin.roles.index');
    Route::match(['get','post'], 'roles/create', 'RoleController@create')->name('admin.roles.create');
    Route::any('roles/{id}/edit', 'RoleController@edit')->name('admin.roles.edit');
    Route::get('roles/{id}/delete', 'RoleController@destroy')->name('admin.role.delete');
    Route::get('roles/{id}/add-permissions', 'RoleController@addPermissionsToRole')->name('admin.role.add.permissions');
    Route::put('roles/{id}/give-permissions', 'RoleController@givePermissionsToRole')->name('admin.role.give.permissions');

    // User Routes
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::get('users/{id}/delete', 'UserController@destroy')->name('admin.user.delete');

    // Admin Logout
    Route::match(['get', 'post'],'logout', 'Auth\LoginController@destroy')->name('admin.logout');
});
