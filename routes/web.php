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
    return view('home');
});


Route::middleware(['auth'])->group(function() {
	Route::resource('products', 'ProductController');
	Route::get('product/index', 'ProductController@index');
	Route::get('product/create', 'ProductController@create');
	Route::post('product', 'ProductController@store')->middleware('format.us.price');
	Route::get('product/edit/{id}', 'ProductController@edit');
	Route::put('product/{id}', 'ProductController@update')->middleware('format.us.price');
	Route::get('product/{id}', 'ProductController@destroy');

	Route::resource('orders', 'OrderController');
	Route::get('order/index', 'OrderController@index');
	Route::get('order/create', 'OrderController@create');
	Route::post('order/store', 'OrderController@store');
	Route::get('order/show/{id}', 'OrderController@show');
	Route::get('order/product/{id}', 'OrderController@getProduct');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');