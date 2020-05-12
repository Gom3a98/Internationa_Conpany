<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ;
use App\Category ;
use App\ProductImage ;
use App\Http\Controllers\imageController ;
class productController extends Controller
{
    var $product;
    var $category;
    var $ImageController;
    public function __construct()
    {
        $this->product= new Product;
        $this->category= new Category;
        $this->ImageController= new imageController;
       //dd(auth()->user);
    }
    public function index()
    {
        //$this->makeFakeData();
        $products =$this->product->select('products.*','categories.id as category_id','categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id')->paginate(10);
        $productsSize = $this->product->count();
        $allCategory = $this->category->get();
        return view('admin/category/productCRUD',compact('products','productsSize','allCategory'));
    }
    public function getProductData($id)
    {
        $product =$this->product->select('products.*','categories.id as category_id','categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id')->where('products.id',$id)->first();
        return response()->json($product);
    }
    public function show($id)
    {
        $products =$this->product->select('products.*','categories.id as category_id','categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.id',$id)->paginate(10);
        $productsSize = $this->product->where('category_id',$id)->count();
        $selectedCategory= $this->category->where('id',$id)->first();
        $allCategory = $this->category->get();
        return view('admin/category/productCRUD',compact('products','productsSize','allCategory'));
    }
    public function store(Request $request)
    {
        $princeRange =$request->product_price1."-".$request->product_price1 ;
        $newProduct = array("name" => $request->product_name,
        "category_id" =>$request->category_id,
        "description" => $request->product_description,
        "status" => $request->product_status,
        "count" => $request->product_count,
        "price" => $princeRange,
        "location"=>$request->product_location);
        $productID= $this->product->insertGetId($newProduct);
        $request->product_id = $productID;
        $this->ImageController->store($request);
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $princeRange =$request->data['product_price1']."-".$request->data['product_price1'] ;   
        $updatedProduct = array("name" => $request->data['product_name'],
        "category_id" =>$request->data['category_id'],
        "description" => $request->data['product_description'],
        "status" => $request->data['product_status'],
        "count" => $request->data['product_count'],
        "price" => $princeRange,
        "location"=>$request->data['product_location']);
        $this->product->where('id',$id)->update($updatedProduct);
        return redirect()->back();
    }
    public function destroy($id)
    {
        $ids = explode(",", $id);
        if(sizeof($ids)!=0)
            $this->product->whereIN('id', $ids)->delete();
        return redirect()->back();
    }
    public function makeFakeData()
    {
        factory(Product::class,20)->create();
    }
}
