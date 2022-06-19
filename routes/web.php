<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    FrontendController,
    ProductController
};


// Route::group(['namespace'=>'App\Http\Controllers\Frontend'], function(){
//     Route::get('/','FrontendController@index')->name('index');
// });

Route::group(['as'=>'frontend.'], function(){
    Route::get('/',[FrontendController::class, 'index'])->name('index');
    Route::get('/product/details/{slug}', [ProductController::class, 'productDetails'])->name('product.details');
});

