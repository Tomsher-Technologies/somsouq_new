<?php

use App\Http\Controllers\frontEnd\Auth\SocialiteAuthController;
use App\Http\Controllers\frontEnd\Auth\AuthController;
use App\Http\Controllers\frontEnd\CategoryController;
use App\Http\Controllers\frontEnd\HomeController;
use App\Http\Controllers\frontEnd\MyAccountController;
use App\Http\Controllers\frontEnd\PostController;
use App\Http\Controllers\frontEnd\SearchController;
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

//category wise search
Route::post('search', [SearchController::class, 'index'])->name('post.search');
Route::get('get-category-wise-search', [SearchController::class, 'getCategoryWiseSearch'])->name('get-category-wise-search');
Route::get('detail-category/{cat_id}', [SearchController::class, 'index'])->name('post.detail-category');
Route::post('post-data-filter', [SearchController::class, 'postDataFilter'])->name('post.data.filter');

//view post
Route::get('/public-view/{type}/{id}', [PostController::class, 'view'])->name('public.view');

Route::middleware('user')->group(callback: function () {
    Route::get('logout', [SocialiteAuthController::class, 'logout'])->name('front.logout');
    Route::get('my-account', [MyAccountController::class, 'index'])->name('my-account.index');

    //user post
    Route::get('add-post', [PostController::class, 'create'])->name('post.create');
    Route::post('store-post', [PostController::class, 'AppStore'])->name('post.store');
    Route::post('store-update', [PostController::class, 'AppStore'])->name('post.update');
    Route::get('post-delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
    Route::get('post-edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::get('/post-view/{type}/{id}', [PostController::class, 'view'])->name('post.view');
    Route::get('post-sold/{id}', [PostController::class, 'sold'])->name('post.sold');

    Route::get('load-category-detail-form', [PostController::class, 'loadCategoryDetailForm'])->name('load-category-detail-form');

    //get sub category by category id
    Route::get('get-subCategories-by-category', [CategoryController::class, 'getSubCategoriesByCategory'])->name('get-subCategories-by-category');
});


Route::get('cache-clear', function (){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'cleared';
});


