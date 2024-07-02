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
Route::get('/home/{location}', [HomeController::class, 'setLocation'])->name('home.location');

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
Route::prefix('post')->group(function () {
    Route::get('/search', [SearchController::class, 'index'])->name('post.search');
    Route::get('/get-category-wise-search', [SearchController::class, 'getCategoryWiseSearch'])->name('get-category-wise-search');
    Route::get('/detail-category/{cat_id}', [SearchController::class, 'index'])->name('post.detail-category');
    Route::post('/data-filter', [SearchController::class, 'postDataFilter'])->name('post.data.filter');
});
//view post
Route::get('/public-view/{type}/{id}', [PostController::class, 'view'])->name('public.view');

Route::middleware('user')->group(callback: function () {
    Route::get('user/logout', [SocialiteAuthController::class, 'logout'])->name('front.logout');
    Route::get('user/my-account', [MyAccountController::class, 'index'])->name('my-account.index');
    Route::get('user/edit-profile', [MyAccountController::class, 'editProfile'])->name('edit.profile');
    Route::post('user/update-profile', [MyAccountController::class, 'updateProfile'])->name('update.profile');
    Route::get('user/change-password', [MyAccountController::class, 'changePassword'])->name('user.change.password');
    Route::post('user/update-password', [MyAccountController::class, 'updatePassword'])->name('update.password');

    //user post
    Route::prefix('post')->group(function () {
        Route::get('/add', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'AppStore'])->name('post.store');
        Route::post('/store-update', [PostController::class, 'AppStore'])->name('post.update');
        Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::get('/view/{type}/{id}', [PostController::class, 'view'])->name('post.view');
        Route::get('/sold/{id}', [PostController::class, 'sold'])->name('post.sold');
    });

    Route::get('load-category-detail-form', [PostController::class, 'loadCategoryDetailForm'])->name('load-category-detail-form');

    //get sub category by category id
    Route::get('get-subCategories-by-category', [CategoryController::class, 'getSubCategoriesByCategory'])->name('get-subCategories-by-category');
});


Route::get('cache-clear', function (){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'cleared';
});


