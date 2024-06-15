<?php

use App\Http\Controllers\frontEnd\Auth\SocialiteAuthController;
use App\Http\Controllers\frontEnd\MyAccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontEnd\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(SocialiteAuthController::class)->group(function (){
    Route::get('auth/{provider}', 'redirectTo');
    Route::get('auth/{provider}/callback', 'handleCallback');
    Route::post('email/login', 'loginWithEmail');
});

Route::middleware('user')->group(function () {
    Route::get('logout', [SocialiteAuthController::class, 'logout'])->name('front.logout');

    Route::get('my-account', [MyAccountController::class, 'index'])->name('my-account.index');
});


