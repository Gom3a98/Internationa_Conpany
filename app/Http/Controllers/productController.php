<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ;
use App\Category ;
use App\ProductImage ;
use App\Http\Controllers\imageController ;
use Session;
use Validator;
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
        $validator = Validator::make($request->all(), [
            'product_price1' => 'required|numeric|min:0',
            'product_price2'=>  'required|numeric|min:0',
            'product_name'   =>'required',
            'category_id' => 'required|numeric',
            'product_description'=>  'required',
            'product_status'   =>'required|numeric|max:1|min:0',
            'product_count' => 'required|numeric|min:0',
        ]);
        if ($validator->passes()) {
        
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
        Session::flash('success', 'Product has been Created successfully!');
        }
        Session::flash('errors', $validator->errors());
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_price1' => 'required|numeric|min:0',
            'product_price2'=>  'required|numeric|min:0',
             'product_name'   =>'required',
            'category_id' => 'required|numeric',
            'product_description'=>  'required',
            'product_status'   =>'required|numeric|max:1|min:0',
            'product_count' => 'required|numeric|min:0',
        ]);
        
        if ($validator->passes()) {
            $princeRange =$request->product_price1."-".$request->product_price1 ;
            $updatedProduct = array("name" => $request->product_name,
            "category_id" =>$request->category_id,
            "description" => $request->product_description,
            "status" => $request->product_status,
            "count" => $request->product_count,
            "price" => $princeRange,
            "location"=>$request->product_location);
            error_log(print_r($updatedProduct,true));
            $this->product->where('id',$id)->update($updatedProduct);
            Session::flash('success', 'Product has been updated successfully!');
            }
            Session::flash('errors', $validator->errors());
            return response()->json(['success'=>'done']);
    }
    public function destroy($id)
    {
        $ids = explode(",", $id);
        if(sizeof($ids)!=0&&is_numeric($ids[0]))
            {
                Session::flash('success', 'Category has been deleted successfully!');
                $this->product->whereIN('id', $ids)->delete();
            }
            return response()->json(['success'=>'done']);
    }
    public function makeFakeData()
    {
        factory(Product::class,20)->create();
    }
}
