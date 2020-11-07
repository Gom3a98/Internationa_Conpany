<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/storeBill' , 'billController@store');
Route::post('/updateBill' , 'billController@update');
Route::get('/getBill/{id}' , 'billController@show');
Route::delete('/deleteBill/{id}' , 'billController@destroy');
Route::post('/storeOffer' , 'OfferController@store');
Route::post('/updateOffer/{id}' , 'OfferController@store');
Route::get('products/{id}','productController@getProductData');



Route::get('/test', function() {
    error_log(print_r(Storage::disk('google')->put('test.txt', 'Hello World'),true));
    error_log(print_r("------------------------------------------",true));
    
});