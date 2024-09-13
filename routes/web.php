<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::namespace('App\Http\Controllers\Site')->group(function() {
    // Homepage Route
    Route::get('/', 'HomepageController@index')->name('home');

    // Tour Detail Route
    Route::match(['get','post'], 'tours/{slug}','HomepageController@tourDetail')->name('tour.detail');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::namespace('App\Http\Controllers\Site')->middleware('auth')->group(function () {
    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');
});

Route::namespace('App\Http\Controllers\Site')->group(function () {
    Route::post('/submit-booking', 'BookingController@submitBooking')->name('tour.booking.submit');
});

// require __DIR__.'/auth.php';

// require __DIR__.'/admin-auth.php';
