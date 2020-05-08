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




Route::get('test', function () {
    $category= new Category;
    $categories = $category->paginate(10);
    return view('admin/category/test',compact('categories'));
});
?>

