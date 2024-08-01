<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' =>'admin', 'middleware'=>'guest:admin'], function () {

    // Register Route
    Route::get('register', 'Auth\RegisteredUserController@create')->name('admin.register');
    Route::post('register', 'Auth\RegisteredUserController@store');

    // Login Route
    Route::get('login', 'Auth\LoginController@create')->name('admin.login');
    Route::post('login', 'Auth\LoginController@store');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->middleware(['auth:admin','role-permission'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('admin.dashboard');

    // Permission Routes
    Route::any('permissions/{id}/update', 'PermissionController@update')->name('admin.permissions.update');

    // Role Routes
    Route::match(['get','post'], 'roles', 'RoleController@index')->name('admin.roles.index');
    Route::match(['get','post'], 'roles/create', 'RoleController@create')->name('admin.roles.create');
    Route::any('roles/{id}/edit', 'RoleController@edit')->name('admin.roles.edit');
    Route::get('roles/{id}/delete', 'RoleController@destroy')->name('admin.role.delete');
    // Route::get('roles/{id}/add-permissions', 'RoleController@addPermissionsToRole')->name('admin.role.add.permissions');
    // Route::put('roles/{id}/give-permissions', 'RoleController@givePermissionsToRole')->name('admin.role.give.permissions');

    // Staff Routes
    Route::match(['get','post'], 'staff', 'StaffController@index')->name('admin.staff.index');
    Route::match(['get','post'], 'staff/create', 'StaffController@createStaff')->name('admin.staff.create');
    Route::match(['get','post','put'], 'staff/{id}/edit', 'StaffController@editStaff')->name('admin.staff.edit');
    Route::get('staff/{id}/delete', 'StaffController@staffDelete')->name('admin.staff.delete');

    // Admin Logout
    Route::match(['get', 'post'],'logout', 'Auth\LoginController@destroy')->name('admin.logout');
});
