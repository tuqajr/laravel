<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about_us');
});

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

/* coupon */
use App\Http\Controllers\CouponController;

Route::resource('coupons', CouponController::class);
