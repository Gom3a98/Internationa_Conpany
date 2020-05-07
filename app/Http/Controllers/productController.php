<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ;
use App\Category ;
use App\ProductImage ;
class productController extends Controller
{
    var $product;
    var $category;
    var $productImage;
    public function __construct()
    {
        $this->product= new Product;
        $this->category= new Category;
        $this->productImage= new ProductImage;
       //dd(auth()->user);
    }
    public function index()
    {
        #$this->makeFakeData();
        $products =$this->product->select('products.*','categories.id as category_id','categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id')->paginate(10);
        $productsSize = $this->product->count();
        $allCategory = $this->category->get();
        return view('category/productHome',compact('products','productsSize','allCategory'));
    }
    public function show($id)
    {
        $products =$this->product->select('products.*','categories.id as category_id','categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.id',$id)->paginate(10);
        $productsSize = $this->product->where('category_id',$id)->count();
        $allCategory = $this->category->get();
        return view('category/productHome',compact('products','productsSize','allCategory'));
        //return response()->json($productsSize);
    }
    public function store(Request $request)
    {
        // Handle File Upload
        if($request->hasFile('product_images')){
            // Get filename with the extension
            $filenameWithExt = $request->file('product_images')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('product_images')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Path to store
            $path = 'Data/'.$request->category_name.'/'.$fileNameToStore;
            //Move Uploaded Fileً
            $request->file('product_images')->move('Data/'.$request->category_name,$fileNameToStore);
        } else {
            $path = 'noimage.jpg';
        }
        $princeRange =$request->product_price1."-".$request->product_price1 ;
        $newProduct = array("name" => $request->product_name,
        "category_id" =>$request->category_id,
        "description" => $request->product_description,
        "status" => $request->product_status,
        "count" => $request->product_count,
        "price" => $princeRange,
        "location"=>$request->product_location);
        $this->product->insertGetId($newProduct);
        $this->productImage->product_id=$this->product->insertGetId($newProduct);
        $this->productImage->url=$path;
        $this->productImage->save();
            
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
        return  response()->json($updatedProduct);
    }
    public function destroy($id)
    {
        $ids = explode(",", $id);
        if(sizeof($ids)!=0)
            $this->product->whereIN('id', $ids)->delete();
    }
    public function makeFakeData()
    {
        factory(Product::class,20)->create();
    }
}
