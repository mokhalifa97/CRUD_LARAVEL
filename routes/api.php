<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//category CRUD API
Route::get('/alldata','API\categoryController@index'); 
Route::get('/showone/{id}','API\categoryController@show'); 
Route::post('/create','API\categoryController@create');
Route::post('/delete','API\categoryController@delete');
Route::post('/update','API\categoryController@update');

//product CRUD API
Route::get('/proData','API\productController@index');
Route::get('/proOne/{id}','API\productController@show');
Route::post('/proCreate','API\productController@create');
Route::post('/proDelete','API\productController@delete');
Route::post('/proUpdate','API\productController@update');