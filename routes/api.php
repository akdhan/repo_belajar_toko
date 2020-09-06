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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customers', 'CustomersController@show');
Route::post('/customers', 'CustomersController@store');
Route::put('/customers/{id}', 'CustomersController@update');

Route::get('/product', 'ProductController@show');
Route::post('/product', 'ProductController@store');
Route::put('/product/{id}', 'ProductController@update');

Route::get('/order', 'OrderController@show');
Route::get('/order{id}', 'OrderController@detail');
Route::post('/order', 'OrderController@store');
Route::put('/order{id}', 'OrderController@update');

Route::get('/parkir', 'ParkirController@show');
Route::get('/parkir{id}', 'ParkirController@detail');
Route::post('/parkir', 'ParkirController@store');
Route::put('/parkir{id}', 'ParkirController@update');

