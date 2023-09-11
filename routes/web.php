<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect','localizationRedirect', 'localeViewPath' ]
    ], function(){ //...


        Route::group(["middleware"=>"checkAdmin"],function(){

            Route::get('/home','HomeController@index')->name('home')->middleware('checkAdmin');
            Route::get('/cat','CategoryController@index')->name('cate')->middleware('checkAdmin');
            Route::get('/product','ProductController@index')->name('pro')->middleware('checkAdmin');

            //category crud operation
            Route::get('/categories/show/{id}','CategoryController@show')->name('category.show');
            Route::get('/categories/delete/{id}','CategoryController@delete')->name('category.delete');
            Route::get('/categories/create','CategoryController@create')->name('categories.create');
            Route::post('/categories/save','CategoryController@save')->name('categories.save');

            //product crud operation
            Route::get('/products/show{id}',"ProductController@show")->name("products.show");
            Route::get('/products/delete{id}',"ProductController@delete")->name("products.delete");
            Route::get('/products/create','ProductController@create')->name('products.create');
            Route::post('products/save','ProductController@save')->name('products.save');

        });    
        

    });




