<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Site')->group(function() {
    // Homepage Route
    Route::get('/', 'HomepageController@index')->name('home');

    // Tour Detail Route
    Route::match(['get','post'], 'tours','HomepageController@tourList')->name('tour.list');
    Route::match(['get','post'], 'tours/{slug}','HomepageController@tourDetail')->name('tour.detail');

    // Contact-us page
    Route::get('contact-us', 'HomepageController@contactUs')->name('contactus');

    // Create booking
    Route::post('/submit-booking', 'BookingController@submitBooking')->name('tour.booking.submit');
    Route::match(['get', 'post'],'/booking/thank-you', 'BookingController@bookingThankyou')->name('tour.booking.thankyou');
});

Route::prefix('vendor')->namespace('App\Http\Controllers\Site')->middleware('auth')->group(function () {

    Route::get('/dashboard', 'ProfileController@dashboard')->name('dashboard');

    // Vendor Booking List
    Route::match(['get', 'post'], 'booking/list', 'BookingController@vendorBookings')->name('vendor.bookings.list');
    Route::match(['get', 'post'], 'booking/{reference}/list', 'BookingController@viewVendorBookings')->name('vendor.bookings.view');

    // Wallet Routes
    Route::match(['get','post'], 'wallet','WalletController@index')->name('vendor.wallet.index');
    Route::match(['get','post'], 'wallet/{id}/tranx/view','WalletController@detail')->name('vendor.wallet.tranx.view');

    // Payout to admin
    Route::match(['get','post'], 'payout','PayoutController@index')->name('vendor.payout.index');


    // Route::get('/profile', 'ProfileController@edit')->name('vendor.profile.edit');
    // Route::patch('/profile', 'ProfileController@update')->name('vendor.profile.update');
    // Route::delete('/profile', 'ProfileController@destroy')->name('vendor.profile.destroy');

    // Profile Setting
    Route::match(['get', 'post'], 'profile/edit', 'ProfileController@edit')->name('vendor.settings.profile.edit');

    // Shop Setting
    Route::match(['get', 'post'], 'shop/edit', 'ShopController@edit')->name('vendor.settings.shop.edit');

});

Route::namespace('App\Http\Controllers\Site')->group(function () {
    
});

// require __DIR__.'/auth.php';

// require __DIR__.'/admin-auth.php';
