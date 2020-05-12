<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category ;
use App\Offer ;
use App\Product ;
use App\ProductImage ;
//use App\Request ;
class userController extends Controller
{
    var $category,$offer,$product,$productImage,$request;
    public function __construct()
    {
        $this->category= new Category;
        $this->offer= new Offer;
        $this->product= new Product;
        $this->productImage= new ProductImage;
    }
    public function getOffers()
    {
        return $this->product->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')
        ->join('offers', 'products.id', '=', 'offers.product_id')->get()->unique('id');
    }
    public function index()
    {
        $categories = $this->category->paginate(10);
        $offers=$this->getOffers();
        $products = $this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(10);
        
        return view('user/home',compact('categories','offers','products'));
    }
    public function showCategorys($id)
    {
        $categories = $this->category->paginate(10);
        $offers=$this->getOffers();
        $products = $this->product->select('products.*','product_images.url')->where('category_id',$id)->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(10);
        return view('user/home',compact('categories','offers','products'));
    }
    public function showProducts($id)
    {
        //dd($id);
        $categories = $this->category->paginate(10);
        $product = $this->product->find($id);
        
        $images = $this->productImage->where('product_id',$id)->get();

        $products = $this->product->select('products.*','product_images.url')->where('category_id',$product->category_id)->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(10);
        return view('user/product',compact('categories','images','product','products'));
    }
    public function makeOrder($id,Request $request)
    {
        error_log(print_r($request->user_name,true));
        error_log(print_r($request->user_phone,true));
        $this->request->product_id=$id;
        $this->request->name=$request->user_name;
        $this->request->phone_number=$request->user_phone;
        $this->request->save();
    }
}


