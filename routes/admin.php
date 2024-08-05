<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AizUploadController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\BoatTypeController;
use App\Http\Controllers\Admin\BodyTypeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BusinessSettingsController;
use App\Http\Controllers\Admin\BuySellController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CopyRightController;
use App\Http\Controllers\Admin\FashionTypeController;
use App\Http\Controllers\Admin\GemstoneController;
use App\Http\Controllers\Admin\HeavyEquipmentController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\OccasionController;
use App\Http\Controllers\Admin\PartsTypeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SafetyTipController;
use App\Http\Controllers\Admin\SizeVariantController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\TermAndConditionController;
use App\Http\Controllers\Admin\TutorialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->prefix('admin')->group(function () {

    // Login Routes...
    Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('loginpost', [AdminLoginController::class, 'login'])->name('admin.loginpost');

    // Logout Routes...
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});


Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/cache-cache', [AdminController::class, 'clearCache'])->name('cache.clear');

    // Manage user roles
    Route::resource('roles', RoleController::class);

    // Manage Staffs
    Route::resource('staffs', StaffController::class);
    Route::get('/staffs/destroy/{user}', [StaffController::class, 'destroy'])->name('staffs.destroy');

     // Manage Staffs
    Route::resource('profile', ProfileController::class);

    // uploaded files
    Route::any('/uploaded-files/file-info', [AizUploadController::class, 'file_info'])->name('uploaded-files.info');
    Route::resource('/uploaded-files', AizUploadController::class);
    Route::get('/uploaded-files/destroy/{id}', [AizUploadController::class, 'destroy'])->name('uploaded-files.destroy');
    Route::post('aiz-uploader', [AizUploadController::class, 'show_uploader']);
    Route::post('/aiz-uploader/upload', [AizUploadController::class, 'upload']);
    Route::get('/aiz-uploader/get_uploaded_files', [AizUploadController::class, 'get_uploaded_files']);
    Route::post('/aiz-uploader/get_file_by_ids', [AizUploadController::class, 'get_preview_files']);
    Route::get('/aiz-uploader/download/{id}', [AizUploadController::class, 'attachment_download'])->name('download_attachment');

    // Manage States
    Route::resource('states', StateController::class);
    Route::post('/states/status', [StateController::class, 'updateStatus'])->name('states.status');
    Route::get('/states/edit/{id}', [StateController::class, 'edit'])->name('states.edit');

    // Manage Cities
    Route::resource('cities', CityController::class);
    Route::get('/cities/edit/{id}', [CityController::class, 'edit'])->name('cities.edit');
    Route::get('/cities/destroy/{id}', [CityController::class, 'destroy'])->name('cities.destroy');
    Route::post('/cities/status', [CityController::class, 'updateStatus'])->name('cities.status');

    // Manage general settings
    Route::get('/general-setting', [BusinessSettingsController::class, 'general_setting'])->name('general_setting.index');
    Route::post('/business-settings/update', [BusinessSettingsController::class, 'update'])->name('business_settings.update');

    // Manage categories
    Route::resource('categories', CategoryController::class);
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('/categories/status', [CategoryController::class, 'updateStatus'])->name('categories.status');

    //Ad post
    Route::get('/post/list', [PostController::class, 'index'])->name('post.list');
    Route::get('/post/is-popular', [PostController::class, 'updateIsPopular'])->name('post.is-popular');
    Route::get('/post/update-status', [PostController::class, 'updateUpdateStatus'])->name('post.update-status');
    Route::post('/post/reject-status', [PostController::class, 'rejectStatusUpdate'])->name('post.reject-status');
    Route::get('/post/preview/{post_id}', [PostController::class, 'view'])->name('post.preview');

    //Mange User
    Route::get('/user/list', [UserController::class, 'index'])->name('user.list');

    //Contact us
    Route::prefix('contact')->controller(ContactController::class)->group(function () {
        Route::get('/list', 'index')->name('contact.list');
        Route::get('/destroy/{contact}', 'destroy')->name('contact.destroy');
    });

    //about us
    Route::prefix('about')->controller(AboutController::class)->group(function () {
        Route::get('/', 'index')->name('about.index');
        Route::get('/edit/{about}', 'edit')->name('about.edit');
        Route::post('/update','update')->name('about.update');
    });

    //tutorial
    Route::prefix('tutorial')->controller(TutorialController::class)->group(function () {
        Route::get('/','index')->name('tutorial.index');
        Route::get('/create','create')->name('tutorial.create');
        Route::post('/store','store')->name('tutorial.store');
        Route::get('/edit/{tutorial}','edit')->name('tutorial.edit');
        Route::post('/update','update')->name('tutorial.update');
        Route::get('/destroy/{tutorial}', 'destroy')->name('tutorial.destroy');
    });

    //safety tips
    Route::prefix('safety-tip')->controller(SafetyTipController::class)->group(function () {
        Route::get('/','index')->name('safety_tip.index');
        Route::get('/create', 'create')->name('safety_tip.create');
        Route::post('/store','store')->name('safety_tip.store');
        Route::get('/edit/{safetyTip}', 'edit')->name('safety_tip.edit');
        Route::post('/update','update')->name('safety_tip.update');
        Route::get('/destroy/{safetyTip}','destroy')->name('safety_tip.destroy');
    });

    //help
    Route::prefix('help')->controller(HelpController::class)->group(function () {
        Route::get('/', 'index')->name('help.index');
        Route::get('/create', 'create')->name('help.create');
        Route::post('/store','store')->name('help.store');
        Route::get('/edit/{help}','edit')->name('help.edit');
        Route::post('/update','update')->name('help.update');
        Route::get('/destroy/{help}', 'destroy')->name('help.destroy');
        Route::post('/status','updateStatus')->name('help.status');
    });

    //brand
    Route::prefix('brand')->controller(BrandController::class)->group(function () {
        Route::get('/','index')->name('brand.index');
        Route::get('/create','create')->name('brand.create');
        Route::post('/store','store')->name('brand.store');
        Route::get('/edit/{brand}','edit')->name('brand.edit');
        Route::post('/update','update')->name('brand.update');
        Route::get('/destroy/{brand}','destroy')->name('brand.destroy');
        Route::post('/status','updateStatus')->name('brand.status');
    });

    //terms and conditions
    Route::prefix('term-and-condition')->controller(TermAndConditionController::class)->group(function () {
        Route::get('/','index')->name('condition.index');
        Route::post('/update','update')->name('condition.update');
    });

    //privacy policy
    Route::prefix('privacy-policy')->controller(PrivacyPolicyController::class)->group(function () {
        Route::get('/','index')->name('policy.index');
        Route::post('/update','update')->name('policy.update');
    });

    //privacy policy
    Route::prefix('copy-right-policy')->controller(CopyRightController::class)->group(function () {
        Route::get('/','index')->name('copy-right.index');
        Route::post('/update','update')->name('copy-right.update');
    });

    //Buy and sell
    Route::prefix('buy-sell')->controller(BuySellController::class)->group(function () {
        Route::get('/','index')->name('buy.index');
        Route::get('/create','create')->name('buy.create');
        Route::post('/store','store')->name('buy.store');
        Route::get('/edit/{buySell}','edit')->name('buy.edit');
        Route::post('/update','update')->name('buy.update');
        Route::get('/destroy/{buySell}', 'destroy')->name('buy.destroy');
        Route::post('/status','updateStatus')->name('buy.status');
    });

    //Color
    Route::prefix('color')->controller(ColorController::class)->group(function () {
        Route::get('/','index')->name('color.index');
        Route::get('/create','create')->name('color.create');
        Route::post('/store','store')->name('color.store');
        Route::get('/edit/{color}','edit')->name('color.edit');
        Route::post('/update','update')->name('color.update');
        Route::get('/destroy/{color}','destroy')->name('color.destroy');
        Route::post('/status','updateStatus')->name('color.status');
    });

    //Body type
    Route::prefix('body-type')->controller(BodyTypeController::class)->group(function () {
        Route::get('/', 'index')->name('body.index');
        Route::get('/create','create')->name('body.create');
        Route::post('/store','store')->name('body.store');
        Route::get('/edit/{bodyType}','edit')->name('body.edit');
        Route::post('/update','update')->name('body.update');
        Route::get('/destroy/{bodyType}','destroy')->name('body.destroy');
        Route::post('/status','updateStatus')->name('body.status');
    });

    //parts type
    Route::prefix('parts-type')->controller(PartsTypeController::class)->group(function () {
        Route::get('/', 'index')->name('parts.index');
        Route::get('/create','create')->name('parts.create');
        Route::post('/store', 'store')->name('parts.store');
        Route::get('/edit/{autoPartType}', 'edit')->name('parts.edit');
        Route::post('/update', 'update')->name('parts.update');
        Route::get('/destroy/{autoPartType}','destroy')->name('parts.destroy');
        Route::post('/status', 'updateStatus')->name('parts.status');
    });

    //heavy equipment type
    Route::prefix('heavy-equipment')->controller(HeavyEquipmentController::class)->group(function () {
        Route::get('/','index')->name('equipment.index');
        Route::get('/create','create')->name('equipment.create');
        Route::post('/store','store')->name('equipment.store');
        Route::get('/edit/{heavyEquipmentType}', 'edit')->name('equipment.edit');
        Route::post('/update','update')->name('equipment.update');
        Route::get('/destroy/{heavyEquipmentType}','destroy')->name('equipment.destroy');
        Route::post('/status','updateStatus')->name('equipment.status');
    });

    //boat type
    Route::prefix('boat-type')->controller(BoatTypeController::class)->group(function () {
        Route::get('/', 'index')->name('boat.index');
        Route::get('/create', 'create')->name('boat.create');
        Route::post('/store', 'store')->name('boat.store');
        Route::get('/edit/{boatType}', 'edit')->name('boat.edit');
        Route::post('/update','update')->name('boat.update');
        Route::get('/destroy/{boatType}', 'destroy')->name('boat.destroy');
        Route::post('/status','updateStatus')->name('boat.status');
    });

    //report
    Route::get('report', [ReportController::class, 'index'])->name('report.index');

    //fashion type controller
    Route::prefix('fashion-type')->controller(FashionTypeController::class)->group(function () {
        Route::get('/', 'index')->name('fashion-type.index');
        Route::get('/create', 'create')->name('fashion-type.create');
        Route::post('/store', 'store')->name('fashion-type.store');
        Route::get('/edit/{fashionType}', 'edit')->name('fashion-type.edit');
        Route::post('/update','update')->name('fashion-type.update');
        Route::get('/destroy/{fashionType}', 'destroy')->name('fashion-type.destroy');
        Route::post('/status','updateStatus')->name('fashion-type.status');
    });

    //variants
    Route::prefix('variant')->controller(SizeVariantController::class)->group(function () {
        Route::get('/', 'index')->name('variant.index');
        Route::post('/store', 'store')->name('variant.store');
        Route::get('/view/{variant}', 'view')->name('variant.view');
        Route::get('/edit/{variant}', 'edit')->name('variant.edit');
        Route::post('/update','update')->name('variant.update');

        Route::post('/value-store', 'valueStore')->name('value.store');
        Route::get('/value-edit/{variantValue}', 'valueEdit')->name('value.edit');
        Route::post('/value-update', 'valueUpdate')->name('value.update');

        Route::post('/status','updateStatus')->name('variant.status');
    });

    //Fashion material
    Route::prefix('material')->controller(MaterialController::class)->group(function () {
        Route::get('/', 'index')->name('material.index');
        Route::get('/create', 'create')->name('material.create');
        Route::post('/store', 'store')->name('material.store');
        Route::get('/edit/{material}', 'edit')->name('material.edit');
        Route::post('/update','update')->name('material.update');
        Route::get('/destroy/{material}', 'destroy')->name('material.destroy');
        Route::post('/status','updateStatus')->name('material.status');
    });

    //Occasion
    Route::prefix('occasion')->controller(OccasionController::class)->group(function () {
        Route::get('/', 'index')->name('occasion.index');
        Route::get('/create', 'create')->name('occasion.create');
        Route::post('/store', 'store')->name('occasion.store');
        Route::get('/edit/{occasion}', 'edit')->name('occasion.edit');
        Route::post('/update','update')->name('occasion.update');
        Route::get('/destroy/{occasion}', 'destroy')->name('occasion.destroy');
        Route::post('/status','updateStatus')->name('occasion.status');
    });

    //gemstone
    Route::prefix('gemstone')->controller(GemstoneController::class)->group(function () {
        Route::get('/', 'index')->name('stone.index');
        Route::get('/create', 'create')->name('stone.create');
        Route::post('/store', 'store')->name('stone.store');
        Route::get('/edit/{gemstone}', 'edit')->name('stone.edit');
        Route::post('/update','update')->name('stone.update');
        Route::get('/destroy/{gemstone}', 'destroy')->name('stone.destroy');
        Route::post('/status','updateStatus')->name('stone.status');
    });

});
