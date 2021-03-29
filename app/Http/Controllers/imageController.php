<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage ;
use Session;
use Validator;
class imageController extends Controller
{
    var $productImage;

    public function __construct()
    {
        $this->productImage= new ProductImage;
    }


    public function Createimage($request,$categoryID,$productID)
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
                $fileNameToStore= $filename.'.'.$extension;
                // Path to store
                $path = '/Data/'.$categoryID.'/'.$productID.'/'.$fileNameToStore;
                //Move Uploaded Fileً
                array_push($arrayName,$path);
                $image->move('Data/'.$categoryID.'/'.$productID,$fileNameToStore);
            }
        }
        
        return $arrayName;
    }
    
    public function destroy($id)
    {
        $ids = explode(",", $id);
        if(sizeof($ids)!=0&&is_numeric($ids[0]))
        {
            Session::flash('success', 'Category has been deleted successfully!');
            $this->productImage->whereIn('id', $ids)->delete();
        }
        return response()->json(['success'=>'done']);
    }

    public  function store(Request $request,$categoryID,$productID)
    {
        $urls = $this->Createimage($request,$categoryID,$productID);
        $product_id=$request->product_id;
        foreach ($urls as $url ) {
            $this->productImage = new ProductImage ; 
            $this->productImage->product_id=$product_id;
            $this->productImage->url=$url;
            $this->productImage->main=0;
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
        $images = $this->productImage->where('product_id',$product_id)->latest()->paginate(50);
        $imagesSize = $this->productImage->where('product_id',$product_id)->count();
        return view('admin/category/imagesCRUD',compact('category_name','product_name','product_id','images','imagesSize'));
    }

    public function update(Request $request,$id)
    {
        $this->productImage->where('product_id',$request->product_id)->update(['main'=>'0']);
        $this->productImage->where('id',$id)->update(['main'=>'1']);
        Session::flash('success', 'Image has been updated successfully as Main Photo!');
        return response()->json(['success'=>'done']);
    }

    public function updatePath(Request $request,$id)
    {

        $this->productImage->where('id',$id)->update(['url'=>$request->imgURL]);
        return redirect()->back();
    }
}
