<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\AuthencationController;
use App\Http\Controllers\client\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\client\CheckoutController;
use App\Http\Controllers\client\OrderController;

// Client

Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
    Route::get('home', [ClientController::class, 'home'])->name('home');
    Route::get('register', [ClientController::class, 'register'])->name('register');
    Route::get('lienhe', [ClientController::class, 'lienhe'])->name('lienhe');

    // Sản phẩm:
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('list', [ClientController::class, 'product'])->name('list');
        Route::get('detail/{id}', [ClientController::class, 'detail'])->name('detail');
    });

    // Giỏ hàng:
    Route::middleware('auth')->group(function () {
        Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
            Route::get('list', [CartController::class, 'list'])->name('list');
            Route::post('add', [CartController::class, 'add'])->name('add');
            Route::post('update', [CartController::class, 'update'])->name('update');
            Route::post('remove', [CartController::class, 'remove'])->name('remove');
        });
    });

    // Thanh toán mua hàng:
    Route::middleware('auth')->group(function () {
        Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function () {
            Route::get('info', [CheckoutController::class, 'showShippingForm'])->name('info');
            Route::post('info', [CheckoutController::class, 'saveShippingInfo'])->name('info');
            // Xem lại đơn hàng và chọn phương thức thanh toán
            Route::get('review', [CheckoutController::class, 'review'])->name('review');
            Route::post('place', [CheckoutController::class, 'placeOrder'])->name('place');
        });
    });

    // Đơn hàng:
    Route::middleware('auth')->group(function () {
        Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
            Route::get('list', [OrderController::class, 'list'])->name('list');
            Route::get('detail/{id}', [OrderController::class, 'detail'])->name('detail');
        });
    });
});
//---------------------------------------------------------------------------------------------------------------------------
// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkAdmin'], function () {

    Route::get('home', [AdminController::class, 'home'])->name('home');

    // Product
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('listProduct', [ProductController::class, 'listProduct'])->name('listProduct');
        Route::get('addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('addProduct', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
        Route::delete('deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('detailProduct/{id}', [ProductController::class, 'detailProduct'])->name('detailProduct');
        Route::get('updateProduct/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::patch('updateProduct/{id}', [ProductController::class, 'updatePatchProduct'])->name('updatePatchProduct');
    });

    // Category
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('list', [CategoryController::class, 'list'])->name('list');
        Route::get('add', [CategoryController::class, 'add'])->name('add');
        Route::post('add', [CategoryController::class, 'addPost'])->name('addPost');
        Route::delete('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::patch('update/{id}', [CategoryController::class, 'updatePatch'])->name('updatePatch');
    });

    // Order
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('order', [AdminController::class, 'order'])->name('order');
    });
});



// Login:
Route::get('login', [AuthencationController::class, 'login'])->name('login');
Route::post('login', [AuthencationController::class, 'postLogin'])->name('postLogin');
// Logout
Route::get('logout', [AuthencationController::class, 'logout'])->name('logout');
// Register:
Route::get('register', [AuthencationController::class, 'register'])->name('register');
Route::post('register', [AuthencationController::class, 'postRegister'])->name('postRegister');
