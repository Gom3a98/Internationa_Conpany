<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category ;
use App\Offer ;
use App\Product ;
use App\ProductImage ;
use App\Request as UserRequest ;
class userNewViewController extends Controller
{
    var $category,$offer,$product,$productImage,$request;
    public function __construct()
    {
        $this->requests= new UserRequest;
        $this->category= new Category;
        $this->offer= new Offer;
        $this->product= new Product;
        $this->productImage= new ProductImage;
    }
    public function getOffers()
    {

        return $this->offer->latest()->get();
        // return $this->product->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')
        // ->join('offers', 'products.id', '=', 'offers.product_id')->get()->unique('id');
    }
    public function getCategories()
    {
        return $this->category->paginate(15);
    }
    public function index()//home
    {
        $categories = $this->getCategories();
        $offers=$this->getOffers();
        // $offers=$this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        //for all categories
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $products = $this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(50);
        return view('userNewView/home',compact('categories','offers','products','categoriesProduct'));
    }
    public function showCategorys($id)
    {
        $categories = $this->getCategories();
        $offers=$this->getOffers();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->where('id',$id)->get();
        
        $products = $this->product->select('products.*','product_images.url')->where('category_id',$id)->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(50);
        return view('userNewView/home',compact('categories','offers','products','categoriesProduct'));
    }
    public function showProducts($id)
    {
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('*')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();
        $categories =  $this->getCategories();
        $product = $this->product->find($id);
        $images = $this->productImage->where('product_id',$id)->get();
        $products = $this->product->select('products.*','product_images.url')->where('category_id',$product->category_id)->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(4);
        return view('userNewView/product',compact('categories','images','product','products','offers','categoriesProduct'));
    }

    public function about()
    {
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('*')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();
        return view('userNewView/about',compact('categories','offers','categoriesProduct'));
    }
    public function contact()
    {
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('*')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();
        return view('userNewView/contact',compact('categories','offers','categoriesProduct'));
    }
    public function terms()
    {
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('*')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();
        return view('userNewView/terms',compact('categories','offers','categoriesProduct'));
    }

    public function privacy()
    {
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('*')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();
        return view('userNewView/privacy',compact('categories','offers','categoriesProduct'));
    }

    public function help()
    {
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('*')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();
        return view('userNewView/help',compact('categories','offers','categoriesProduct'));
    }
    public function faqs()
    {
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('*')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();
        return view('userNewView/faqs',compact('categories','offers','categoriesProduct'));
    }

    public function makeOrder($id,Request $request)
    {
        $request->validate([
            'user_phone' => 'required',
            'user_name' => 'required',
            'user_address' => 'required',
        ]);
        $this->requests->product_id=$id;
        $this->requests->name=$request->user_name;
        $this->requests->address=$request->user_address;
        $this->requests->phone_number=$request->user_phone;
        $this->requests->save();

        return redirect()->back();
    }

    public function allProduct()
    {
        $products = $this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();
        return view('userNewView/AllProduct',compact('categories','offers','categoriesProduct','products'));
    }


    //offers

    public function offerDetails($id)
    {
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('*')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();
        //$offersDetails= $this->offer->where('id',$id)->latest()->get();
        $offersDetails=Offer::with(array('products'=>function($query){
            $query->select('products.*','offer_product.productPrice','offer_product.productCount','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1');
        }))->whereNotIn('img',array(''))->where('offers.id',$id)->get();
        //dd($offersDetails);
        return view('userNewView/offersDetails',compact('categories','offers','categoriesProduct','offersDetails'));
    }

    public function search(Request $request)
    {
        $key= $request->get('key');
        // $products = $this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->where('products.name', 'regexp',$key)->get();
        $products = $this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();


        return view('userNewView/AllProduct',compact('categories','offers','categoriesProduct','products'));
    }
}


