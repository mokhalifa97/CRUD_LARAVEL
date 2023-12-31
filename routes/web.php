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
            Route::get('/employee','EmployeeController@index')->name('employee')->middleware('checkAdmin');

            //category crud operation
            Route::get('/categories/show/{id}','CategoryController@show')->name('category.show');
            Route::get('/categories/delete/{id}','CategoryController@delete')->name('category.delete');
            Route::get('/categories/create','CategoryController@create')->name('categories.create');
            Route::post('/categories/save','CategoryController@save')->name('categories.save');
            Route::get('/categories/edit/{id}','CategoryController@edit')->name('categories.edit');
            Route::post('/categories/update','CategoryController@update')->name('categories.update');

            //product crud operation
            Route::get('/products/show{id}',"ProductController@show")->name("products.show");
            Route::get('/products/delete{id}',"ProductController@delete")->name("products.delete");
            Route::get('/products/create','ProductController@create')->name('products.create');
            Route::post('products/save','ProductController@save')->name('products.save');
            Route::get('/products/edit/{id}','ProductController@edit')->name('products.edit');
            Route::post('products/update','ProductController@update')->name('products.update');
            
            //employee crud operation
            Route::get('/employee/show/{id}','EmployeeController@show')->name('employee.show');
            Route::get('/employee/delete/{id}','EmployeeController@delete')->name('employee.delete');
            Route::get('/employee/create','EmployeeController@create')->name('employee.create');
            Route::post('/employee/save','EmployeeController@save')->name('employee.save');
            Route::get('/employee/edit/{id}','EmployeeController@edit')->name('employee.edit');
            Route::post('/employee/update','EmployeeController@update')->name('employee.update');

        });    
        

    });




