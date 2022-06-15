<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    FrontendController
};


Route::group(['namespace'=>'App\Http\Controllers\Frontend'], function(){
    Route::get('/','FrontendController@index')->name('index');
},,);

Route::group(['name'=>'frontend.'], function(){
    Route::get('/',[FrontendController::class, 'index'])->name('index');
});

