<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    CartController,
    FrontendController,
    ProductController
};


// Route::group(['namespace'=>'App\Http\Controllers\Frontend'], function(){
//     Route::get('/','FrontendController@index')->name('index');
// });

Route::group(['as'=>'frontend.'], function(){

    Route::get('/',[FrontendController::class, 'index'])->name('index');
    Route::get('/product/details/{slug}', [ProductController::class, 'productDetails'])->name('product.details');

    // cart route
    Route::get('cart/show', [CartController::class, 'cartShow'])->name('cart.show');
    Route::post('cart/add',[CartController::class, 'cartAdd'])->name('cart.add');
    Route::post('cart/remove',[CartController::class, 'cartRemove'])->name('cart.remove');
    Route::post('cart/clear',[CartController::class, 'cartClear'])->name('cart.clear');

    // auth route
    Route::get('login', [AuthController::class,'loginForm'])->name('login');
    Route::post('login', [AuthController::class,'login']);

    Route::get('register', [AuthController::class,'registerForm'])->name('register');
    Route::post('register', [AuthController::class,'register']);
    Route::get('logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');



    Route::group(['middleware'=>'auth'],function(){

        Route::get('checkout',[CartController::class, 'checkout'])->name('checkout');
    });
   
});

Route::group(['middleware'=>'auth','prefix'=>'dashboard','as'=>'home.'],function(){
    Route::get('/users',[HomeController::class, 'userList'])->name('user');

});

