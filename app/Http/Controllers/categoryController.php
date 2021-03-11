<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category ;
use Session;
use Validator;
use App\Http\Controllers\imageController ;

class categoryController extends Controller
{
    var $category;
    var $ImageController;
    
    public function __construct()
    {
        $this->category= new Category;
        $this->ImageController= new imageController;
    }
    public function index()// all category view
    {
        $categories = $this->category->latest()->paginate(50);
        $categoriesSize = $this->category->count();
        return view('admin/category/categoryCRUD',compact('categories','categoriesSize'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
        ]);
        $this->category->name = $request->product_name;

        $urls = $this->ImageController->Createimage($request);
        $this->category->imgURL =$urls[0];
        $this->category->save();
        
        return  redirect()->route('category.index')
        ->with('success','Category Created successfully.');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
        ]);
        if ($validator->passes()) {
            $imgURL=$request->imgURL;
            $urls = $this->ImageController->Createimage($request);
            if(count($urls)!=0)
                $imgURL=$urls[0];

            $this->category->where('id',$id)->update(['name'=>$request->product_name,"imgURL"=>$imgURL]);
            Session::flash('success', 'Category has been updated successfully!');
            return  redirect()->route('category.index')
        ->with('success','Category Updated successfully.');
        }
        Session::flash('errors', $validator->errors());
        return  redirect()->route('category.index');
    }
    public function destroy($id)
    {
        $ids = explode(",", $id);
        if(sizeof($ids)!=0&&is_numeric($ids[0]))
        {
            Session::flash('success', 'Category has been deleted successfully!');
            $this->category->whereIn('id', $ids)->delete();
            return response()->json(['success'=>'done']);
        }
        return response()->json("error happen in delete");
            
    }

}