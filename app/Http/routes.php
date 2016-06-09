<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');
Route::get('no-bids', 'HomeController@getNoBid');
Route::get('contact-us', 'HomeController@getContactUs');
Route::get('products', 'HomeController@getProducts');
Route::get('nobid-products', 'HomeController@getNoBidProducts');
Route::get('favorite-products', 'HomeController@getFavorite');
Route::get('customer-purchases', 'HomeController@getCustomerPurchase');
Route::get('hot-deals', 'HomeController@getHotDeal');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
