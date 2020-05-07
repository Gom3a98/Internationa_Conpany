<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage ;
use App\Http\Controllers\productController ;
class imageController extends Controller
{
    var $productImage;

    public function __construct()
    {
        
        $this->productImage= new ProductImage;
       //dd(auth()->user);
    }

    public function index()
    {
       $product = new productController;
       dd($this->Createimage($request));
    }
    public function Createimage($request)
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
            $path = '/Data/'.$request->category_name.'/'.$request->product_name.'/'.$fileNameToStore;
            //Move Uploaded Fileً
            $request->file('product_images')->move('Data/'.$request->category_name.'/'.$request->product_name,$fileNameToStore);
        } else {
            $path = 'noimage.jpg';
        }
        return $path;
    }
    public function create(Request $request)
    {
        dd("hii");
    }
    public function update(Request $request, $id)
    {
        if($request->category_name!=null)
            $this->category->where('id',$id)->update(['name'=>$request->category_name]);
        else
            throw "error";
    }
    
    public function destroy($id)
    {
        $ids = explode(",", $id);
        if(sizeof($ids)!=0)
            $this->productImage->whereIn('id', $ids)->delete();
    }

    public function store(Request $request)
    {
        $this->productImage->product_id=$request->product_id;
        $this->productImage->url=$this->Createimage($request);
        $this->productImage->save();
    }
    
    public function show($id)
    {
        $productData = explode("-",$id);//0 for category_id 1 for product id
        $category_name=$productData[0];
        $product_name=$productData[1];
        $product_id=$productData[2];
        //dd($productData);
        $images = $this->productImage->where('product_id',$product_id)->paginate(10);
        $imagesSize = sizeof($this->productImage->where('product_id',$product_id)->get());
        return view('category/images',compact('category_name','product_name','product_id','images','imagesSize'));
    }

}
