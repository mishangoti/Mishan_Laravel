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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// list user
Route::get('/apiuser', 'Api\ApiuserController@index');
// list single user
Route::get('/apiuser/{id}', 'Api\ApiuserController@show');
// create new user
Route::post('apiuser', 'Api\ApiuserController@store');
// update artical
Route::patch('/apiuser/{id}', 'Api\ApiuserController@update');
// delete artiacl
Route::delete('/apiuser/{id}', 'Api\ApiuserController@destroy');

// list product
Route::get('/apiproduct', 'Api\ApiproductController@index');
// list single product
Route::get('/apiproduct/{id}', 'Api\ApiproductController@show');
// create new product
Route::post('/apiproduct', 'Api\ApiproductController@store');
// add new products
Route::post('/apiproducts', 'Api\ApiproductController@storecategoryusingcsv');
// add product images
Route::post('/apiproductimages', 'Api\ApiproductController@addimages');
// update product
Route::patch('/apiproduct/{id}', 'Api\ApiproductController@update');
// delete product
Route::delete('/apiproduct/{id}', 'Api\ApiproductController@destroy');

// Route::post('/test', 'Api\Apicontroller@test');
