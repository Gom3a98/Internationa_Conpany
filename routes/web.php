<?php
use App\Category ;
/*
create User:
php artisan tinker

App\User::create(['name'=>'amr','email'=>'amr@test.com','password'=>Hash::make('123456'),'phone_number'=>'01000000022'])
*/

use Illuminate\Http\Request;
use Illuminate\Http\File;


Route::prefix('admin')->group(function () {
Route::middleware('auth')->group(function () {
Route::get('/', function () {
  return view('admin.layouts.admin');
});
Route::resource('category', 'categoryController');
Route::resource('product', 'productController');
Route::resource('image', 'imageController');
Route::get('/create', "billController@create");
Route::get('/edit/{id}', "billController@edit");
Route::get('/bills', "billController@index");
Route::post('/storeBill' , 'billController@store');
Route::post('/updateBill' , 'billController@update');
Route::get('/getBill/{id}' , 'billController@show');
	Route::resource('offers','OfferController');
	Route::get('requests','RequestController@index')->name('requests.index');
	Route::delete('requests/{request}' , 'RequestController@destroy')->name('requests.destroy');
});
});
Route::get('/home','userController@index');
Route::get('/home/{id}','userController@showCategorys');
Route::get('/preview/{id}','userController@showProducts');
Route::post('/orderProduct/{id}','userController@makeOrder');
Route::get('/contact','userController@contact');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');