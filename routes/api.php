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
Route::post('/storeBill' , 'billController@store');
Route::post('/updateBill' , 'billController@update');
Route::get('/getBill/{id}' , 'billController@show');
Route::delete('/deleteBill/{id}' , 'billController@destroy');
Route::post('/storeOffer' , 'OfferController@store');
Route::get('products/{id}','productController@getProductData');