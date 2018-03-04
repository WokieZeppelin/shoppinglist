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

Route::get('/', ['uses' => 'ProductController@index', 'as' => 'home']);


Route::get('cart', ['uses' => 'ProductController@showcart', 'as' => 'products.showcart']);
Route::post('products', ['uses' => 'ProductController@add', 'as' => 'products.add']);
Route::delete('products/{id}', ['uses' => 'ProductController@destroy', 'as' => 'products.destroy']);

