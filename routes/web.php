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
	Auth::routes();
	Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
	//Route::match(['get', 'post'], '/home', ['uses'=>'IndexController@execute', 'as'=>'home']);
	
	Route::get('/page/{alias}', ['uses'=>'PageController@execute', 'as'=>'page']);
	
	Route::get('/portfolio/{slug}', ['uses'=>'PortfolioController@show', 'as'=>'portfolio']);

Route::resource('cart', 'CartController');

Route::post('/complete', 'CheckoutController@complete');



