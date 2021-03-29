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
        $categories = $this->category->latest()->get();
        $categoriesSize = $this->category->count();
        return view('admin/category/categoryCRUD',compact('categories','categoriesSize'));
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_name' => 'required',
                'type'=> 'required'
            ]);
            $this->category->name = $request->product_name;
            $this->category->type = $request->type;
            $this->category->imgURL ='';
            $this->category->save();
            $id=$this->category->id ;
            $urls = $this->ImageController->Createimage($request,$id,'categoryImage');
            $this->category->where('id',$id)->update(["imgURL"=>$urls[0]]);
            return  redirect()->route('category.index')
                ->with('success','Category Created successfully.');
        } catch (\Throwable $th) {
            return  redirect()->route('category.index')->with('errors','Error happend.');
        }
    
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
                'type'=> 'required'
            ]);
            if ($validator->passes()) {
                $imgURL=$request->imgURL;
                $urls = $this->ImageController->Createimage($request,$id,'categoryImage');
                if(count($urls)!=0)
                    $imgURL=$urls[0];
    
                $this->category->where('id',$id)->update(['name'=>$request->product_name,"imgURL"=>$imgURL]);
                Session::flash('success', 'Category has been updated successfully!');
                return  redirect()->route('category.index')
            ->with('success','Category Updated successfully.');
            }
            Session::flash('errors', $validator->errors());
            return  redirect()->route('category.index');
        } catch (\Throwable $th) {
            return  redirect()->route('category.index')->with('errors','Error happend.');
        }
        
    }
    public function destroy($id)
    {
        try {
            $ids = explode(",", $id);
            if(sizeof($ids)!=0&&is_numeric($ids[0]))
            {
                Session::flash('success', 'Category has been deleted successfully!');
                $this->category->whereIn('id', $ids)->delete();
                return response()->json(['success'=>'done']);
            }
            return response()->json("error happen in delete");
        } catch (\Throwable $th) {
            return  redirect()->route('category.index')->with('errors','Error happend.');
        }
        
            
    }

}