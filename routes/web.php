<?php
use App\Category ;
Route::get('/', function () {
    return view('welcome');
});
use Illuminate\Http\Request;
use Illuminate\Http\File;
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


Route::get('/home','userController@index');
Route::get('/home/{id}','userController@showCategorys');
Route::get('/preview/{id}','userController@showProducts');
Route::post('/orderProduct/{id}','userController@makeOrder');


?>

