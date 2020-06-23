<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category ;
use App\Offer ;
use App\Product ;
use App\ProductImage ;
use App\Request as UserRequest ;
class userController extends Controller
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
        return $this->product->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')
        ->join('offers', 'products.id', '=', 'offers.product_id')->get()->unique('id');
    }
    public function getCategories()
    {
        return $this->category->paginate(15);
    }
    public function index()//home
    {
        $categories = $this->getCategories();
        // $offers=$this->getOffers();
        $offers=$this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        //for all categories
        $products = $this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(50);
        return view('user/home',compact('categories','offers','products'));
    }
    public function showCategorys($id)
    {
        $categories = $this->getCategories();
        // $offers=$this->getOffers();
        $offers=$this->product->select('products.*','product_images.url')->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->get();
        //for specific category
        $products = $this->product->select('products.*','product_images.url')->where('category_id',$id)->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(50);
        return view('user/home',compact('categories','offers','products'));
    }
    public function showProducts($id)
    {
        $categories =  $this->getCategories();
        $product = $this->product->find($id);
        $images = $this->productImage->where('product_id',$id)->get();
        $products = $this->product->select('products.*','product_images.url')->where('category_id',$product->category_id)->join('product_images','product_images.product_id','=','products.id')->where('product_images.main','1')->paginate(4);
        return view('user/product',compact('categories','images','product','products'));
    }
    public function makeOrder($id,Request $request)
    {
        $this->requests->product_id=$id;
        $this->requests->name=$request->user_name;
        $this->requests->address=$request->user_address;
        $this->requests->phone_number=$request->user_phone;
        $this->requests->save();
    }
    public function about()
    {
        return view('user/about');
    }
    public function contact()
    {
        return view('user/contact');
    }
    public function news()
    {
        return view('user/news');
    }

    //offers

    public function offer()
    {
        $offers=Offer::with(array('products'=>function($query){
            $query->select('products.*','offer_product.productPrice','offer_product.productCount');
        }))->get();

        return view('user/offers',compact('offers'));
    }
}


