<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as UserRequest;
use App\Product ;
class RequestController extends Controller
{
    var $product;
    var$Request;
    public function __construct()
    {
        $this->product= new Product;
        $this->Request= new UserRequest;
    }
    public function index()
    {
        // $requests = UserRequest::with('product')->latest()->paginate(5);
        // $requests = UserRequest::all();
        $requests =$this->Request->select('requests.*','products.name as userName')
        ->join('products', 'requests.product_id', '=', 'products.id')->latest()->paginate(50);
        
        return view('admin.requests.index',compact('requests'));
    }



    public function show($id)
    {
        //
    }

    public function destroy($id)
    {

        $userRequest = UserRequest::find($id);
        // dd($userRequest);
        $userRequest->delete();
        return redirect()->route('requests.index')
            ->with('success','Request deleted successfully.');
    }
}
