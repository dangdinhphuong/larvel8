<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ConfigsController;
use App\Http\Controllers\Admin\ContactInfosController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailSubscribersController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'middleware' => 'locale'
], function () {

    Route::get('change-locale', LanguageController::class)->name('change-locale');
    Route::get('clear-cache-config', [ConfigsController::class, 'clearCache'])->name('clear-cache-config');

    // Client
    Route::group([
        'middleware' => ['config']
    ], function () {
        Route::get('/', [ClientController::class, 'index'])->name('client.index');

        Route::get('lien-he', [ClientController::class, 'contactUs'])->name('client.contact-us');
        Route::post('lien-he', [ClientController::class, 'sendContact'])->name('client.send-contact');

        Route::get('doi-tac', [ClientController::class, 'partners'])->name('client.partners');

        Route::get('gioi-thieu', [ClientController::class, 'about'])->name('client.about');

        Route::get('danh-muc-san-pham/{slug}', [ClientController::class, 'productCategory'])->name('client.product-category');
        Route::get('san-pham/{slug}', [ClientController::class, 'product'])->name('client.product');
        Route::get('san-pham', [ClientController::class, 'products'])->name('client.products');

        Route::get('tin-tuc/{slug}', [ClientController::class, 'blog'])->name('client.blog');
        Route::get('tin-tuc', [ClientController::class, 'blogs'])->name('client.blogs');

        Route::get('tuyen-dung', [ClientController::class, 'recruit'])->name('client.recruit');

        Route::post('subscription', [ClientController::class, 'subscription'])->name('subscription');
    });

    // Auth
    Route::group([
    ], function () {
        Route::get('login', [LoginController::class, 'login'])->name('login');
        Route::post('login', [LoginController::class, 'handleLogin']);

        Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

        Route::get('forgot-password', [ForgotPasswordController::class, 'forgotPasswordForm'])->name('forgot_password');
        Route::post('forgot-password', [ForgotPasswordController::class, 'handleForgotPasswordRequest']);

        Route::get('reset-password', [ResetPasswordController::class, 'formResetPassword'])->name('reset_password');
        Route::post('reset-password', [ResetPasswordController::class, 'handleResetPasswordRequest']);

//        Route::get('login/google', 'LoginController@redirectToProvider')->name('login.google');
//        Route::get('login/google/callback', 'LoginController@handleProviderCallback');
    });


    // Admin
    Route::group([
        'prefix' => 'cp-admin',
        'middleware' => ['auth', 'permissions']
    ], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('category', CategoriesController::class);
        Route::get('fetch-category', [CategoriesController::class, 'fetchDataFancyTree'])->name('fetch-category');
        Route::resource('post', PostsController::class);
        Route::resource('contact-info', ContactInfosController::class);
        Route::resource('partner', PartnersController::class);

        Route::resource('slider', SlidersController::class);
        Route::resource('user', UsersController::class);
        Route::resource('permission', PermissionsController::class);
        Route::resource('role', RolesController::class);
        Route::resource('config', ConfigsController::class);
        Route::resource('email-subscriber', EmailSubscribersController::class);
        Route::resource('contact', ContactsController::class);
    });
});
