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
        return $this->category->get();
    }
    public function homePage()//category
    {
        $categories = $this->getCategories();
        return view('userNewView/home',compact('categories'));
    }

    public function categoriesPage($type)//category
    {
        $categories = $this->category->where('type',$type)->get();
        return view('userNewView/categories',compact('categories'));
    }
    public function showCategory($id)
    {
        $categories = $this->getCategories();
        $products = $this->product->select('products.*','product_images.url')->where('category_id',$id)->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(50);
        if(count($products)!=0)
        {
            $category = $this->category->find($products[0]->category_id);
            return view('userNewView/categoryProduct',compact('categories','products','category'));
        }
        return redirect('/');
       
    }
    public function showProduct($id)
    {
        $categories =  $this->getCategories();
        $product = $this->product->find($id);
        $category = $this->category->find($product->category_id);
        $images = $this->productImage->where('product_id',$id)->get();
        $products = $this->product->select('products.*','product_images.url')->where('category_id',$product->category_id)->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(4);
        return view('userNewView/product',compact('category','categories','images','product','products'));
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

    public function search(Request $request)
    {
        // $key= strval($request->get('key')) ;
        $products = $this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->where('products.name', 'like','%' . $request->get('key') . '%')->get();
        $categories = $this->getCategories();
        $categoriesProduct=Category::with(array('products'=>function($query){
            $query->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        }))->get();
        $offers=$this->getOffers();


        return view('userNewView/AllProduct',compact('categories','offers','categoriesProduct','products'));
    }
}