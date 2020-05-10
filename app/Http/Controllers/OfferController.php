<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Offer;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with('products')->latest()->paginate(5);
        // dd($offers);
        return view('admin.offers.index',compact('offers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.offers.create");
        
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'desc' => 'required',
            'duration'=>'required',
            'price'   =>'required',
//            'products'=> 'required',
        ]);
        $productsid;
        $productsid[] = rand(1,20);
        for($i=1;$i<5;$i++){
            rand(0,1) ==0? $productsid[] = rand(1,20):null;
        }
         // return dd($productsid);
        $products = Product::find($productsid);

         $offer = new Offer;
        $offer->desc = $request->desc;
        $offer->price = $request->price;
        $offer->duration = $request->duration;

        $offer->save();
        $offer->products()->attach($products);

        // return 'success';
        return redirect()->route('offers.index')
            ->with('success','Offer created successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::with('products')->find($id);
        return view('admin.offers.show',compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('admin.offers.edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
         // dd($request->all());
        $request->validate([
            'desc' => 'required',
            'duration'=>'required',
            'price'   =>'required',
//            'products'=> 'required',
        ]);
        // dd($offer);

        
        $offer->desc = $request->desc;
        $offer->price = $request->price;
        $offer->duration = $request->duration;
        $offer->update();

        return redirect()->route('offers.index')
            ->with('success','Offer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        dd($offer);
        $offer->products()->detach($offer->products);
        $offer->delete();
        return redirect()->route('offers.index')
            ->with('success','Offer deleted successfully.');
    }
}
