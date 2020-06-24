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
        $posts = Offer::whereHas('products', function($q){

            $q->where('id', 11); //this refers id field from categories table

        })
        ->paginate(5);
        dd($posts);
        // $offers=Offer::with(array('products'=>function($query){
        //     $query->select('products.*','offer_products.productPrice','offer_products.productCount');
        // }))->paginate(50);
        return view('admin.offers.index',compact('offers'));
        
    }



    private function Createimage($request)
    {
        $arrayName = array();
        // Handle File Upload   
        if($request->hasFile('file')){
            $image=$request->file('file');
            $filenameWithExt = $image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Path to store
                $path = '/Offer/'.$fileNameToStore;
                $image->move('Offer/',$fileNameToStore);
                return $path;
        } 
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
        
        $offer = new Offer;
        $offer->img = $this->Createimage($request);
        $offer->title = $request->title;
        $offer->desc = $request->desc;
        $offer->offerPrice =$request->offerPrice;
        $offer->duration = $request->duration;
        $offer->save();
        $sales_array =json_decode($request->sales , true);
        $sales = array();
        foreach($sales_array as $sale){
            DB::insert("insert into offer_product 
            (productCount, productPrice, product_id, offer_id, updated_at, created_at)
             values (?,?,?,?,?,?)" , [$sale["product_count"] , $sale["price"] , $sale["product_id"] , $offer->id , NULL , NULL]);
            array_push($sales,$obj);
        }
        return response()->json($offer, 200);
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