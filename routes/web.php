<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'StoreController@index')->name('products');

Auth::routes();

//
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/stock', 'HomeController@stock')->name('stock');


Route::get('/purchase', 'PurchaseController@show')->name('purchase');
Route::post('/purchase/attach', 'PurchaseController@attach')->name('purchase-attach'); //{{-- route('purchase-attach', [$stock->name, $quantity]) --}}
Route::get('/purchase/delete/{product}', 'PurchaseController@delete')->name('purchase-delete-item');
Route::get('/purchase/trash', 'PurchaseController@trash')->name('purchase-trash');
Route::get('/purchase/detail', 'PurchaseController@detail')->name('purchase-detail');
Route::get('/purchase/finalized', 'PurchaseController@finalized')->name('purchase-finalized');