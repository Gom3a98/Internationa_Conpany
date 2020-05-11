<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category ;

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
        $this->category->name = $request->category_name;
        $this->category->save();
        return  redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $this->category->where('id',$id)->update(['name'=>$request->category_name]);
        return  redirect()->back();
    }
    public function destroy($id)
    {
        $ids = explode(",", $id);
        if(sizeof($ids)!=0)
            $this->category->whereIn('id', $ids)->delete();
        return  redirect()->back();
    }
    public function makeFakeData()
    {
        factory(Category::class,20)->create();
    }
}