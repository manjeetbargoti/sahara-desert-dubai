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

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->middleware(['auth:admin',])->group(function () {
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

    // Toures Route
    Route::match(['get','post'], 'tours', 'TourController@index')->name('admin.tours.index');
    Route::match(['get','post'], 'tours/create', 'TourController@create')->name('admin.tours.create');
    Route::any('tours/{id}/edit', 'TourController@edit')->name('admin.tours.edit');
    Route::get('tours/{id}/delete', 'TourController@delete')->name('admin.tours.delete');

    // Tour Category Routes
    Route::match(['get','post'], '/tour/category', 'TourCategoryController@index')->name('admin.tours.category.index');
    Route::match(['get','post'], '/tour/category/create', 'TourCategoryController@create')->name('admin.tours.category.create');
    Route::match(['get','post'], '/tour/category/{id}/edit', 'TourCategoryController@edit')->name('admin.tours.category.edit');
    Route::get('/tour/category{id}/delete', 'TourCategoryController@delete')->name('admin.tours.category.delete');

    // Website Setting Routes
    Route::match(['get', 'post'], 'website-settings/images/update','WebsiteSettingController@imagesUpdate')->name('admin.website.setting.images.update');
    Route::match(['get', 'post'], 'website-settings/social/update','WebsiteSettingController@socialUpdate')->name('admin.website.setting.social.update');
    Route::match(['get', 'post'], 'website-settings/general','WebsiteSettingController@generalSettings')->name('admin.website.setting.general');
    Route::match(['get', 'post'], 'website-settings/general/update','WebsiteSettingController@updateGeneral')->name('admin.website.setting.general.update');

    // Booking Routes
    Route::match(['get','post'], 'bookings/list', 'BookingController@index')->name('admin.bookings.list');
    Route::match(['get', 'post'], 'bookings/create', 'BookingController@createBooking')->name('admin.bookings.create');
    Route::match(['get', 'post'], 'bookings/{reference}/edit', 'BookingController@editBooking')->name('admin.bookings.edit');
    Route::match(['get','post'], 'bookings/tour-by-id', 'BookingController@tourById')->name('admin.bookings.tourbyid');
    Route::match(['get','post'], 'bookings/{reference}/view', 'BookingController@view')->name('admin.bookings.view');
    Route::match(['get','post'], 'bookings/{id}/update', 'BookingController@update')->name('admin.bookings.update');
    Route::match(['get','post'], 'bookings/{id}/send-booking-email', 'BookingController@sendBookingEmail')->name('admin.bookings.email_sent');
    Route::match(['get','post'], 'bookings/{id}/export', 'BookingController@exportVendorBooking')->name('admin.vendor.bookings.export');
    Route::match(['get','post'], 'bookings/export', 'BookingController@exportBooking')->name('admin.bookings.export');

    // Vendor Routes
    Route::match(['get','post'], 'vendor/list', 'VendorController@vendorList')->name('admin.vendor.list');
    Route::match(['get','post'], 'vendor/{id}/bookings', 'VendorController@vendorBookings')->name('admin.vendor.bookings');
    Route::match(['get','post'], 'vendor/{id}/profile', 'VendorController@vendorProfile')->name('admin.vendor.profile');
    Route::match(['get','post'], 'vendor/{id}/edit', 'VendorController@vendorEdit')->name('admin.vendor.edit');
    Route::match(['get','post'], 'vendor/{id}/basic-update', 'VendorController@updateBasicInfo')->name('admin.vendor.basic.update');
    Route::match(['get','post'], 'vendor/{id}/business-update', 'VendorController@updateBusinessInfo')->name('admin.vendor.business.update');
    Route::match(['get','post'], 'vendor/{id}/bank-update', 'VendorController@updateBankInfo')->name('admin.vendor.bank.update');
    Route::match(['get','post'], 'vendor/{id}/wallet-update', 'VendorController@updateWalletBalances')->name('admin.vendor.wallet.update');
    // Route::match(['get','post'], 'vendor/{id}/export-bookings', 'VendorController@updateWalletBalances')->name('admin.vendor.wallet.update');

    // Reports
    Route::match(['get','post'], 'reports/booking', 'BookingController@reports')->name('admin.reports.booking');

    // Admin Logout
    Route::match(['get', 'post'],'logout', 'Auth\LoginController@destroy')->name('admin.logout');
});
