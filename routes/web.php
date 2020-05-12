<?php

Route::get('/', function () {
    return view('welcome');
});
use Illuminate\Http\Request;
use Illuminate\Http\File;

// Route::prefix('admin')->group(function () {
	Route::middleware('auth')->group(function () {
    
        Route::resource('category', 'categoryController');
	Route::resource('product', 'productController');
	Route::resource('image', 'imageController');
	Route::get('/create', "billController@create");
	Route::get('/bills', "billController@index");
	Route::post('/storeBill' , 'billController@store');
	Route::post('/updateBill' , 'billController@update');
	Route::get('/getBill/{id}' , 'billController@show');

	Route::delete('/deleteBill/{id}' , 'billController@destroy');
	Route::resource('offers','OfferController');
	Route::get('requests','RequestController@index')->name('requests.index');
	Route::delete('requests/{request}' , 'RequestController@destroy')->name('requests.destroy');
});
   

 // });




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
