<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category ;
use App\Offer ;
use App\Product ;
class userController extends Controller
{
    var $category,$offer,$product;
    public function __construct()
    {
        $this->category= new Category;
        $this->offer= new Offer;
        $this->product= new Product;
       //dd(auth()->user);
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
        $products = $this->product->inRandomOrder()->paginate(10);
        return view('user/home',compact('categories','offers','products'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function showCategorys($id)
    {
        $categories = $this->category->paginate(10);
        $offers=$this->getOffers();
        $products = $this->product->where('category_id',$id)->paginate(10);
        return view('user/home',compact('categories','offers','products'));
    }
    public function showProducts($id)
    {
        $categories = $this->category->paginate(10);
        $product = $this->product->find($id);
        $products = $this->product->where('category_id',$product->category_id)->paginate(10);

        return view('user/product',compact('categories','product','products'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


