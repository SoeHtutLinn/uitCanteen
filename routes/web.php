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

// Route::get('/home', 'HomeController@index')->name('home');




Route::get('shop/login', 'auth\LoginController@showShopLoginForm')->name('shop.login');
Route::post('shop/logout', 'auth\LoginController@logout')->name('shop.logout');

Route::get('shop/register', 'auth\RegisterController@showShopRegistrationForm')->name('shop.register');


Route::post('shop/login', 'auth\LoginController@shopLogin');

Route::post('shop/register', 'auth\RegisterController@createShop');


// Route::view('/home', 'home')->middleware('auth');
Route::get('/shop', 'shopController@shop');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user views

Route::get('/profile', 'HomeController@profile');
Route::get('/cart', 'HomeController@cart');
Route::get('/home', 'HomeController@index');

Route::get('/ownerMenu', 'shopController@menu');
Route::get('/menu/{url}', 'menuController@menu');
Route::post('/newMenu', 'shopController@newMenu');
Route::post('/flag', 'shopController@flag');
Route::get('/canteen', 'menuController@home');
