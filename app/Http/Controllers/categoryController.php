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
        $categoriesSize = sizeof($this->category->get());
        return view('admin/category/categoryCRUD',compact('categories','categoriesSize'));
    }
    public function create(Request $request)
    {
        if($request->category_name!=null)
            {
                 $this->category->name = $request->category_name;
                if($this->category->save())
                    return  redirect()->back();
                else
                    dd("error happend");
            }
        else
            dd("error");
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
            $this->category->whereIn('id', $ids)->delete();
    }
    public function makeFakeData()
    {
        factory(Category::class,20)->create();
    }
}
