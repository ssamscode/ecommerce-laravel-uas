<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\FlashSaleController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\User\UserController;

Route::middleware('guest')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    // Register
    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/post-register', [AuthController::class, 'post_register'])
        ->name('post.register');

    // Login
    Route::post('/post-login', [AuthController::class, 'login']);
});


/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::group([], function () {

    Route::get('/user', [UserController::class, 'index'])
        ->name('user.dashboard');

    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])
        ->name('user.product.detail');

    Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase'])
        ->name('product.purchase');

    Route::get('/user/history/{userId}', [UserController::class, 'history'])
    ->name('user.history');

    Route::get('/user/history/detail/{id}', [UserController::class, 'detail_history'])
    ->name('user.detail.history');

    Route::get('/user-logout', [AuthController::class, 'user_logout'])
        ->name('user.logout');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

Route::get('/admin-logout', [AuthController::class, 'admin_logout'])
    ->name('admin.logout');


/*
|--------------------------------------------------------------------------
| PRODUCT
|--------------------------------------------------------------------------
*/

Route::prefix('product')->group(function () {

    Route::get('/', [ProductController::class, 'index'])
        ->name('admin.product');

    Route::get('/create', [ProductController::class, 'create'])
        ->name('product.create');

    Route::post('/store', [ProductController::class, 'store'])
        ->name('product.store');

    Route::get('/detail/{id}', [ProductController::class, 'detail'])
        ->name('product.detail');

    Route::get('/edit/{id}', [ProductController::class, 'edit'])
        ->name('product.edit');

    Route::post('/update/{id}', [ProductController::class, 'update'])
        ->name('product.update');

    Route::get('/delete/{id}', [ProductController::class, 'delete'])
        ->name('product.delete');

});


/*
|--------------------------------------------------------------------------
| DISTRIBUTOR
|--------------------------------------------------------------------------
*/


Route::prefix('distributor')->group(function () {

    Route::get('/', [DistributorController::class, 'index'])
        ->name('admin.distributor');

    Route::get('/create', [DistributorController::class, 'create'])
        ->name('distributor.create');

    Route::post('/store', [DistributorController::class, 'store'])
        ->name('distributor.store');

    Route::get('/detail/{id}', [DistributorController::class, 'detail'])
        ->name('distributor.detail');

    Route::get('/edit/{id}', [DistributorController::class, 'edit'])
        ->name('distributor.edit');

    Route::post('/update/{id}', [DistributorController::class, 'update'])
        ->name('distributor.update');

    Route::get('/delete/{id}', [DistributorController::class, 'delete'])
        ->name('distributor.delete');

});



/*
|--------------------------------------------------------------------------
| FLASH SALE
|--------------------------------------------------------------------------
*/

Route::prefix('flash-sale')->group(function () {

    Route::get('/', [FlashSaleController::class, 'index'])
        ->name('admin.flashsale');

    Route::get('/create', [FlashSaleController::class, 'create'])
        ->name('flashsale.create');

    Route::post('/store', [FlashSaleController::class, 'store'])
        ->name('flashsale.store');

});


/*
|--------------------------------------------------------------------------
| HISTORY
|--------------------------------------------------------------------------
*/

Route::prefix('history')->group(function () {

    Route::get('/', [HistoryController::class, 'index'])
        ->name('admin.history');

    Route::get('/detail/{id}', [HistoryController::class, 'detail'])
        ->name('history.detail');

});