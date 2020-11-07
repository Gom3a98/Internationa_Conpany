<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Offer;
use App\OfferProduct;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    //index view for all offers
    public function index()
    {
        $offers=Offer::with(array('products'=>function($query){
            $query->select('products.*','offer_product.productPrice','offer_product.productCount');
        }))->paginate(50);
        return view('admin.offers.index',compact('offers'));
        
    }


    //create images path
    private function Createimage($request)
    {
        $arrayName = array();
        // Handle File Upload   
        if($request->hasFile('offerPhoto')){
            $image=$request->file('offerPhoto');
            $filenameWithExt = $image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'.'.$extension;
                // Path to store
                $path = '/Offer/'.$fileNameToStore;
                $image->move('Offer/',$fileNameToStore);
                return $path;
        } 
        return '';
    }
    //to save images url in db
    public function saveImage(Request $request)
    {
        $offer = new Offer;
        $url = $this->Createimage($request);
        $offer_id=$request->offer_id;
        $offer->where('id',$offer_id)->update(['img'=>$url]);
        return redirect()->back();
    }
    public function validator($request)
    {
        return Validator::make($request->all(), [
            'offerPrice' => 'required|numeric|min:0',
            'duration'=>  'required|numeric|min:0',
            'title'   =>'required',
            'desc'   =>'required',
        ]);
    }
    //get ids of selected product and intialize view of create
    public function create($ids)
    {
        $selected_products = explode("," , $ids);
        $selected_products = Product::findMany($selected_products);
        $products = Product::all();
        return view("admin.offers.create", compact('products' , 'selected_products'));
        
    }
    //save  new offers after create it
    public function store(Request $request)
    {
        $offer = new Offer;
        $offer->title = $request->title;
        $offer->desc = $request->desc;
        $offer->offerPrice =$request->offerPrice;
        $offer->duration = $request->duration;
        $offer->img ='';
        $offer->save();
        $sales_array =$request->sales;
        $sales = array();
        foreach($sales_array as $sale){
            $query ='insert into offer_product ("productCount", "productPrice", "product_id", "offer_id")
             values ('.$sale["product_count"]. ',' .$sale["price"]. ','. $sale["product_id"]. ','.
              $offer->id .')';
              try { 
              DB::insert($query);
              DB::commit();
              }
              catch (\Exception $e) {
                DB::rollback();
                return response()->json($e, 200);
                // something went wrong
            }   
        }
        return response()->json("sucess", 200);
    }

    //delete offers
    public function destroy(Offer $offer)
    {
        $offer->products()->detach($offer->products);
        $offer->delete();
        return redirect()->route('offers.index')
            ->with('success','Offer deleted successfully.');
    }








    



    public function show($id)
    {
        
        $offers=Offer::with(array('products'=>function($query){
            $query->select('products.*','offer_product.productPrice','offer_product.productCount');
        }))->where('id',$id)->first();
        $products = Product::all();
        return view('admin.offers.edit',compact('offers','products'));
    }


    // public function edit($ids)
    // {
    //     $selected_products = explode("," , $ids);
    //     $selected_products = Product::findMany($selected_products);

    //     $products = Product::all();
    //     return view("admin.offers.create", compact('products' , 'selected_products'));
    // }


    // public function update(Request $request,$id)
    // {
    //     error_log(print_r("hiiiiiiiii",true));
    //     return response()->json("sucess", 200);
    // }



}