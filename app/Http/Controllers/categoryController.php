<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category ;
use Session;
use Validator;
class categoryController extends Controller
{
    var $category;
    
    public function __construct()
    {
        $this->category= new Category;
       //dd(auth()->user);
    }
    public function index()
    {
        //$this->makeFakeData();
        $categories = $this->category->paginate(10);
        $categoriesSize = $this->category->count();
        return view('admin/category/categoryCRUD',compact('categories','categoriesSize'));
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $this->category->name = $request->category_name;
        $this->category->save();
        return  redirect()->route('category.index')
        ->with('success','Category Created successfully.');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ]);

        
        if ($validator->passes()) {
            $this->category->where('id',$id)->update(['name'=>$request->category_name]);
            Session::flash('success', 'Category has been updated successfully!');
        }
        Session::flash('errors', $validator->errors());
        return response()->json(['success'=>'done']);
    }
    public function destroy($id)
    {
        $ids = explode(",", $id);
        if(sizeof($ids)!=0&&is_numeric($ids[0]))
            {
                Session::flash('success', 'Image has been deleted successfully!');
                $this->category->whereIn('id', $ids)->delete();
            }
            return response()->json(['success'=>'done']);
    }
    public function makeFakeData()
    {
        factory(Category::class,20)->create();
    }
}