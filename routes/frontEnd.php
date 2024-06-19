<?php

use App\Http\Controllers\frontEnd\Auth\SocialiteAuthController;
use App\Http\Controllers\frontEnd\Auth\AuthController;
use App\Http\Controllers\frontEnd\HomeController;
use App\Http\Controllers\frontEnd\MyAccountController;
use App\Http\Controllers\frontEnd\StateCityController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(SocialiteAuthController::class)->group(function (){
    Route::get('auth/{provider}', 'redirectTo');
    Route::get('auth/{provider}/callback', 'handleCallback');
    Route::post('email/login', 'loginWithEmail');
    Route::post('email/login', 'loginWithEmail');
});

Route::controller(AuthController::class)->group(function (){
    Route::post('user/login', 'loginWithEmail')->name('user.login');
    Route::post('user/registration', 'registration')->name('user.registration');
});

Route::get('get-city-by-state-id', [StateCityController::class, 'getCityByStateId'])->name('get-city-by-state-id');

Route::middleware('user')->group(callback: function () {
    Route::get('logout', [SocialiteAuthController::class, 'logout'])->name('front.logout');

    Route::get('my-account', [MyAccountController::class, 'index'])->name('my-account.index');
});


