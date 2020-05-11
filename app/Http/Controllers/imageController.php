<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage ;
class imageController extends Controller
{
    var $productImage;

    public function __construct()
    {
        $this->productImage= new ProductImage;
       //dd(auth()->user);
    }


    private function Createimage($request)
    {
        $arrayName = array();
        // Handle File Upload   
        if($request->hasFile('product_images')){
            foreach ($request->file('product_images') as $image) {
                //dd($request->file('product_images'));
                // Get filename with the extension
                $filenameWithExt = $image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Path to store
                $path = '/Data/'.$request->category_name.'/'.$request->product_name.'/'.$fileNameToStore;
                //Move Uploaded Fileً
                array_push($arrayName,$path);
                $image->move('Data/'.$request->category_name.'/'.$request->product_name,$fileNameToStore);
            }
        }
        
        return $arrayName;
    }
    
    public function destroy($id)
    {
        $ids = explode(",", $id);
        if(sizeof($ids)!=0)
            $this->productImage->whereIn('id', $ids)->delete();
        return redirect()->back();
    }

    public  function store(Request $request)
    {
        $urls = $this->Createimage($request);
        $product_id=$request->product_id;
        foreach ($urls as $url ) {
            $this->productImage = new ProductImage ; 
            $this->productImage->product_id=$product_id;
            $this->productImage->url=$url;
            $this->productImage->save();
        }
        return redirect()->back();
    }
    
    public function show($id)
    {
        $productData = explode("-",$id);//0 for category_id 1 for product id
        $category_name=$productData[0];
        $product_name=$productData[1];
        $product_id=$productData[2];
        $images = $this->productImage->where('product_id',$product_id)->paginate(10);
        $imagesSize = $this->productImage->where('product_id',$product_id)->count();
        return view('admin/category/imagesCRUD',compact('category_name','product_name','product_id','images','imagesSize'));
    }

}
