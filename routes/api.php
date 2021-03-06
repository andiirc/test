<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/products', 'ProductController@index');

Route::get('/products/{name}', 'ProductController@search');

Route::post('/products','ProductController@store');

Route::get('/stocks', 'StockController@index');

Route::post('/stocks','StockController@store');

Route::get('/orders','OrderController@index');