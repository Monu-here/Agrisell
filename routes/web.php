<?php

use App\Http\Controllers\Admin\adminloginController;
use App\Http\Controllers\Admin\catogeryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\galleryController;
use App\Http\Controllers\Admin\logofootercontroller;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Fornt\userdashboardController;
use App\Http\Controllers\Front\cartController as FrontCartController;
use App\Http\Controllers\Front\checkoutController;
use App\Http\Controllers\Front\googleController;
// use App\Http\Controllers\googleController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\loginController;
use App\Http\Controllers\Front\orderController;
use App\Http\Controllers\Front\productController as FrontProductController;
use App\Http\Controllers\Front\RateController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ThankyouController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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


Route::name('front.')->group(function () {
    Route::middleware('tohome')->group(function () {
        Route::prefix('user')->name('user')->group(function () {
            Route::get('dashboard', [orderController::class, 'dashboard'])->name('dashboard');
            Route::get('dashboard/order/', [orderController::class, 'dashboardorder'])->name('dashboardorder');
        });
        Route::prefix('checkout')->name('checkout.')->group(function () {
            Route::match(['GET', 'POST'], '', [checkoutController::class, 'checkout'])->name('checkout');
            Route::get('/thankyou', [checkoutController::class, 'thankyou'])->name('thankyou');
        });
    });

    Route::get('', [HomeController::class, 'index'])->name('index');
    Route::get('/catogery', [HomeController::class, 'catogery'])->name('catogery');
    Route::get('/product/{id}', [FrontProductController::class, 'index'])->name('product');
    Route::get('/share/{id}', [FrontProductController::class, 'share'])->name('share');
    Route::prefix('order')->name('order.')->group(function () {
        Route::match(['POST'], '', [orderController::class, 'order'])->name('order');
        Route::match(['get'], 'thankyou', [orderController::class, 'orderThankYou'])->name('thankyou');
    });
    Route::prefix('rate')->name('rate.')->group(function () {
        Route::match(['GET', 'POST'], 'rate-product', [RateController::class, 'rateproduct'])->name('rateproduct');
        // Route::get('/product-rates/{id}', [RateController::class, 'index'])->name('index');
    });
    Route::prefix('review')->name('review.')->group(function () {
        Route::match(['GET', 'POST'], 'review', [ReviewController::class, 'review'])->name('review');
    });
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('', [FrontCartController::class, 'index'])->name('index');
    });
    Route::get('auth/google', [googleController::class, 'googlelogin'])->name('googlelogin');
    Route::get('auth/google/callback', [googleController::class, 'callback'])->name('callback');
    Route::get('/phone', [googleController::class, 'showPhoneNumberForm'])->name('front.front.phone');
    Route::post('/phone', [googleController::class, 'phone'])->name('front.front.phone.post');
});

Route::get('/ulogout', [googleController::class, 'userLogout'])->name('ulogout')->middleware('auth');
Route::prefix('adminLogin')->name('adminLogin.')->middleware('guest')->group(function () {
    Route::match(['GET', 'POST'], '', [adminloginController::class, 'login'])->name('login');
});
Route::get('/logout', [adminloginController::class, 'logout'])->name('logout')->middleware('auth');
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::middleware(['CheckAdmin'])->group(function () {

        Route::get('', [DashboardController::class, 'index'])->name('index');
        Route::middleware('mainacc')->group(function () {

            Route::prefix('logofooter')->name('logofooter.')->group(function () {
                Route::get('', [logofootercontroller::class, 'index'])->name('index');
                Route::match(['GET', 'POST'], 'add', [logofootercontroller::class, 'add'])->name('add');
                Route::get('del/{logofooter}', [logofootercontroller::class, 'del'])->name('del');
            });
            Route::prefix('setting')->name('setting.')->group(function () {
                Route::get('', [AdminSettingController::class, 'index'])->name('index');
                Route::match(['GET', 'POST'], 'add', [AdminSettingController::class, 'add'])->name('add');
                Route::get('del/{setting}', [AdminSettingController::class, 'del'])->name('del');
            });
            Route::prefix('slider')->name('slider.')->group(function () {
                Route::get('', [SliderController::class, 'index'])->name('index');
                Route::match(['GET', 'POST'], 'add', [SliderController::class, 'add'])->name('add');
                Route::match(['GET', 'POST'], 'edit/{slider}', [SliderController::class, 'edit'])->name('edit');
                Route::get('del/{slider}', [SliderController::class, 'del'])->name('del');
            });
            Route::prefix('category')->name('category.')->group(function () {
                Route::get('', [catogeryController::class, 'index'])->name('index');
                Route::match(['GET', 'POST'], 'add', [catogeryController::class, 'add'])->name('add');
                Route::match(['GET', 'POST'], 'edit/{category}', [catogeryController::class, 'edit'])->name('edit');
                Route::get('del/{category}', [catogeryController::class, 'del'])->name('del');
            });
            Route::prefix('product')->name('product.')->group(function () {
                Route::get('', [ProductController::class, 'index'])->name('index');
                Route::match(['GET', 'POST'], 'add', [ProductController::class, 'add'])->name('add');
                Route::match(['GET', 'POST'], 'edit/{product}', [ProductController::class, 'edit'])->name('edit');
                Route::get('del/{product}', [ProductController::class, 'del'])->name('del');
                Route::get('gallery/{product}',  [galleryController::class, 'index'])->name('gallery');
            });
            Route::prefix('gallery')->name('gallery.')->group(function () {
                Route::match(['GET', 'POST'], 'add', [galleryController::class, 'add'])->name('add');
                Route::match(['GET', 'POST'], 'video', [galleryController::class, 'video'])->name('video');
                Route::get('del/{gallery}', [galleryController::class, 'del'])->name('del');
            });
            Route::prefix('rate')->name('rate.')->group(function () {
                Route::get('', [RateController::class, 'index'])->name('index');
                Route::get('rate/show/{product_id}', [RateController::class, 'rate'])->name('rate');
                Route::get('del/{rate}', [RateController::class, 'del'])->name('del');

            });
        });
        Route::prefix('order')->name('order.')->group(function () {
            Route::get('/index/{status}', [orderController::class, 'index'])->name('index');
            Route::get('orderlist/{id}', [orderController::class, 'orderlist'])->name('orderlist');
            Route::get('set-status/{order_id}/{status}', [orderController::class, 'setStatus'])->name('set.status');
            Route::get('/orders/{status}', [checkoutController::class, 'index'])->name('orders.index');
            Route::post('addr', [orderController::class, 'setAddress'])->name('set.address');
            Route::match(['get', 'post'], '/add', [orderController::class, 'add'])->name('add');
        });
        Route::prefix('checkout')->name('checkout.')->group(function () {
            Route::get('index/{status}', [checkoutController::class, 'index'])->name('checkout');
        });
    });
});
