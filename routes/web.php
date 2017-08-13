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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', 'ProductController');
Route::get('product/index', 'ProductController@index');
Route::get('product/create', 'ProductController@create');
Route::post('product', 'ProductController@store')->middleware('format.us.price');
Route::get('product/edit/{id}', 'ProductController@edit');
Route::put('product/{id}', 'ProductController@update')->middleware('format.us.price');
Route::get('product/{id}', 'ProductController@destroy');

Route::resource('orders', 'OrdersController');
Route::get('order/show/{id}', 'OrderController@show');
