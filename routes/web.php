<?php

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
    Route::get('cart/show', [CartController::class, 'cartShow'])->name('cart.show');
    Route::post('cart/add',[CartController::class, 'cartAdd'])->name('cart.add');
    Route::post('cart/remove',[CartController::class, 'cartRemove'])->name('cart.remove');
    Route::post('cart/clear',[CartController::class, 'cartClear'])->name('cart.clear');
});

