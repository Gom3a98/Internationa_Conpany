<?php
use App\Category ;
use App\Request as UserRequest;
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
		$this->Request= new UserRequest;
		$requests =$this->Request->select('requests.*','products.name as userName')
		->join('products', 'requests.product_id', '=', 'products.id')->latest()->paginate(50);
		
		return view('admin.layouts.admin',compact('requests'));
	});

	Route::resource('tracking', 'EmployeeTrackingController');



	Route::get('/employee', "EmployeeTrackingController@employee");
	Route::get('/employeeAccount', "EmployeeTrackingController@employeeAccount");
	Route::get('/newMonth4Employee', "EmployeeTrackingController@newMonth4Employee");
	Route::get('/newMonth4All', "EmployeeTrackingController@newMonth4All");
	Route::get('/userMoney', "EmployeeTrackingController@userMoney");



	Route::resource('category', 'categoryController');
	
	Route::resource('product', 'productController');

	Route::resource('image', 'imageController');
	Route::get('/create/{ids}', "billController@create");
	Route::get('/edit/{id}', "billController@edit");
	Route::get('/bills', "billController@index");
	Route::post('/storeBill' , 'billController@store');
	Route::post('/updateBill' , 'billController@update');
	Route::get('/getBill/{id}' , 'billController@show');
	Route::delete('/deleteBill/{id}' , 'billController@destroy');


	Route::get('/priceReport/{ids}' , 'productController@price_report');
	Route::get('/priceReportNoImage/{ids}' , 'productController@price_report_no_image');

	Route::post('/storeOffer' , 'OfferController@store');
	Route::get('/offers','OfferController@index');
	Route::get('/offers/create/{ids}','OfferController@create');
	Route::post('offers/saveImage' , 'OfferController@saveImage');

	// Route::delete('/offers/delete','OfferController@destroy');
	// Route::get('/offers/create/{ids}','OfferController@create');
	Route::resource('offers','OfferController');
	Route::get('requests','RequestController@index')->name('requests.index');
	Route::delete('requests/{request}' , 'RequestController@destroy')->name('requests.destroy');
	});
});
Route::get('/home','userController@index');
Route::get('/home/{id}','userController@showCategorys');
Route::get('/preview/{id}','userController@showProducts');
Route::post('/orderProduct/{id}','userController@makeOrder');
Route::get('/about','userController@about');
Route::get('/contact','userController@contact');
Route::get('/news','userController@news');
Route::get('/offers','userController@offer');

//new view
Route::get('/','userNewViewController@index');
Route::get('/Home','userNewViewController@index');
Route::get('/Home/{id}','userNewViewController@showCategorys');
Route::get('/Preview/{id}','userNewViewController@showProducts');
Route::post('/OrderProduct/{id}','userNewViewController@makeOrder');
Route::get('/About','userNewViewController@about');
Route::get('/Contact','userNewViewController@contact');
Route::get('/Terms','userNewViewController@terms');
Route::get('/Privacy','userNewViewController@privacy');
Route::get('/Help','userNewViewController@help');
Route::get('/Faqs','userNewViewController@faqs');

Route::get('/News','userNewViewController@news');
Route::get('/Offers','userNewViewController@offer');
Route::get('/OffersDetails/{id}','userNewViewController@offerDetails');
Route::get('/AllProduct','userNewViewController@allProduct');

Route::get('/search','userNewViewController@search');

// end new view
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');