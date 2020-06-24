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
    }
    public function validator($request)
    {
        return Validator::make($request->all(), [
            'product_price1' => 'required|numeric|min:0',
            'product_price2'=>  'required|numeric|min:0',
            'product_name'   =>'required',
            'category_id' => 'required|numeric',
            'product_description'=>  'required',
            // 'product_status'   =>'required|numeric|max:1|min:0',
            'product_count' => 'required|numeric|min:0',
        ]);
    }
    public function index()//all product view
    {
        $allCategory = $this->category->get();
        if(sizeof($allCategory)==0)
            return response()->json("please add category first");
        $products =$this->product->select('products.*','categories.id as category_id','categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id')->latest()->paginate(50);
        $productsSize = $this->product->count();

        return view('admin/category/productCRUD',compact('products','productsSize','allCategory'));
    }
    public function getProductData($id)// get data for specific product to put it in update modal
    {
        $product =$this->product->select('products.*','categories.id as category_id','categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id')->where('products.id',$id)->first();
        return response()->json($product);
    }
    public function show($id)//get product for specific category
    {
        $products =$this->product->select('products.*','categories.id as category_id','categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.id',$id)->latest()->paginate(50);
        $productsSize = $this->product->where('category_id',$id)->count();
        $selectedCategory= $this->category->where('id',$id)->first();
        $allCategory = $this->category->get();
        return view('admin/category/productCRUD',compact('products','productsSize','allCategory'));
    }
    public function intializeProduct($request)
    {
        
        return array("name" => $request->product_name,
        "category_id" =>$request->category_id,
        "description" => $request->product_description,
        "status" => $request->product_status,
        "count" => $request->product_count,
        "from_price"=>$request->product_price1,
        "price" => $request->product_price2,
        "location"=>$request->product_location);
    }
    public function store(Request $request)//create new product
    {
        $validator = $this->validator($request);
        if ($validator->passes()) {
            
            $newProduct = $this->intializeProduct($request);
            $productID= $this->product->insertGetId($newProduct);
            $request->product_id = $productID;
            $this->ImageController->store($request);
            Session::flash('success', 'Product has been Created successfully!');
        }
        Session::flash('errors', $validator->errors());
        return redirect()->back();
    }
    public function update(Request $request, $id)//update product
    {
        $validator = $this->validator($request);
        if ($validator->passes()) {
            $updatedProduct = $this->intializeProduct($request);
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


    //gomaa 
    public function price_report($ids){
        $products = Product::findMany(explode("," , $ids));
        $images_urls = array();
        foreach ($products as $p) {
            $imgs = $p->images->first();
            array_push($images_urls , $imgs->url);


        }
        // return view('admin/Bills/priceReport',compact('products','images_urls'));
        return view('admin/Bills/printedPDF',compact('products','images_urls'));
    }
}

