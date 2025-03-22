<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PageController;


Route::get('/coupons', function () {
    return view('index'); 
})->name('welcome');


use App\Models\Coupon;

Route::get('/home', function () {
    $coupons = Coupon::all(); // Fetch all coupon records from the database
    return view('home', compact('coupons')); 
})->name('home');



Route::get('/about', function () {
    return view('about_us');
});

Route::get('/header', function () {
    return view('header');
});


/* coupon */
Route::get('/add-coupon', [CouponController::class, 'addCoupon']);
Route::post('/coupons/{id}/apply', [CouponController::class, 'applyCoupon'])->name('coupons.apply');
Route::get('/coupon/{id}', [CouponController::class, 'show']);

Route::get('/coupons', [App\Http\Controllers\CouponController::class, 'index'])->name('coupons.index');
Route::post('/coupons', [App\Http\Controllers\CouponController::class, 'store'])->name('coupons.store');



// routes/web.php
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');