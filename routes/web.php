<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Site')->group(function() {
    // Homepage Route
    Route::get('/', 'HomepageController@index')->name('home');

    // Tour Detail Route
    Route::match(['get','post'], 'tours/{slug}','HomepageController@tourDetail')->name('tour.detail');
});

Route::prefix('vendor')->namespace('App\Http\Controllers\Site')->middleware('auth')->group(function () {

    Route::get('/dashboard', 'ProfileController@dashboard')->name('dashboard');

    // Vendor Booking List
    Route::match(['get', 'post'], 'booking/list', 'BookingController@vendorBookings')->name('vendor.bookings.list');
    Route::match(['get', 'post'], 'booking/{reference}/list', 'BookingController@viewVendorBookings')->name('vendor.bookings.view');


    // Route::get('/profile', 'ProfileController@edit')->name('vendor.profile.edit');
    // Route::patch('/profile', 'ProfileController@update')->name('vendor.profile.update');
    // Route::delete('/profile', 'ProfileController@destroy')->name('vendor.profile.destroy');

    // Profile Setting
    Route::match(['get', 'post'], 'profile/edit', 'ProfileController@edit')->name('vendor.settings.profile.edit');

    // Shop Setting
    Route::match(['get', 'post'], 'shop/edit', 'ShopController@edit')->name('vendor.settings.shop.edit');

});

Route::namespace('App\Http\Controllers\Site')->group(function () {
    Route::post('/submit-booking', 'BookingController@submitBooking')->name('tour.booking.submit');
});

// require __DIR__.'/auth.php';

// require __DIR__.'/admin-auth.php';
