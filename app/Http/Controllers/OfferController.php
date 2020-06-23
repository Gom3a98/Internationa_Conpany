<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Offer;
use App\OfferProduct;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{

    public function index()
    {
        $offers=Offer::with(array('products'=>function($query){
            $query->select('products.*','offer_product.productPrice','offer_product.productCount');
        }))->paginate(50);
        return view('admin.offers.index',compact('offers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ids)
    {
        $selected_products = explode("," , $ids);
        $selected_products = Product::findMany($selected_products);

        $products = Product::all();
        return view("admin.offers.create", compact('products' , 'selected_products'));
        
    }

    public function store(Request $request)
    {
        $bill = new Offer;
        $sales_array = $request->sales;
        $sales = array();
        dd($sales_array);
        
        foreach($sales_array as $sale){
            error_log(print_r($sale,true));
            $obj = new OfferProduct;
            error_log(print_r("hiii",true));
            // dd($sale);
            $obj->productCount = $sale["product_count"];
            $obj->productPrice = $sale["price"];
            // $total_price+=$obj->price * $obj->product_count;
            $obj->product_id = $sale["product_id"];
            array_push($sales,$obj);
        }
       

        $bill->title = $request->title;
        $bill->desc = $request->desc;
        $bill->offerPrice =$request->offerPrice;
        $bill->duration = $request->duration;
        //images
        
        return response()->json($bill, 200, $headers);
        // $bill->save();
        // $bill->sales()->saveMany($sales);

        // return ( 'تم انشاء الفاتورة بنجاح');
        // error_log(print_r($request->title,true));
        // return response()->json($request->all(), 200, $headers);

    }


    public function show($id)
    {
        $offers=Offer::with(array('products'=>function($query){
            $query->select('products.*','offer_product.productPrice','offer_product.productCount');
        }))->where('id',$id)->first();
        $products = Product::all();
        // dd($offers);
        return view('admin.offers.edit',compact('offers','products'));
    }


    public function edit($ids)
    {
        $selected_products = explode("," , $ids);
        $selected_products = Product::findMany($selected_products);

        $products = Product::all();
        return view("admin.offers.create", compact('products' , 'selected_products'));
    }


    public function update(Request $request, Offer $offer)
    {

    }


    public function destroy(Offer $offer)
    {
        $offer->products()->detach($offer->products);
        $offer->delete();
        return redirect()->route('offers.index')
            ->with('success','Offer deleted successfully.');
    }
}