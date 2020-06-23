<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Sale;
use App\Product;
class billController extends Controller
{

    public function index()
    {
        $bills = Bill::latest()->paginate(5);
        return view('admin.Bills.index',compact('bills'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function create($ids)
    {
        $selected_products = explode("," , $ids);
        $selected_products = Product::findMany($selected_products);

        $products = Product::all();
        // dd($products);
        return view('admin.Bills.create' , compact('products' , 'selected_products'));
    }

    /**
     * Store a newly created Bill into database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bill = new Bill;
        $sales_array = $request->sales;
        $sales = array();
        // dd($sales_array);
        $total_price = 0;
        foreach($sales_array as $sale){
            $obj = new Sale;
            // dd($sale);
            $obj->product_count = $sale["product_count"];
            $obj->price = $sale["price"];
            $total_price+=$obj->price * $obj->product_count;
            $obj->product_id = $sale["product_id"];
            array_push($sales,$obj);
        }
        $bill->customer_name = $request->customer_name;
        $bill->phone_number = $request->phone_number;
        $bill->total_price = $total_price - $request->discount;
        $bill->discount = $request->discount;
        $bill->save();
        $bill->sales()->saveMany($sales);

        return ( 'تم انشاء الفاتورة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        if ($bill){
            $sales = $bill->sales;
            $products = array();
            $actual_price = 0;
            foreach($sales as $sale){
                $tp = Product::find($sale->product_id);
                $actual_price += $tp->price * $sale->product_count;
                array_push($products , $tp);

            }
            $discount_precentage = 100 - round(($bill->total_price / $actual_price)*100, 2);
            $discount_qantity = $actual_price - $bill->total_price - $bill->discount ;
            return view('admin.Bills.showBill' , compact('sales' , 'bill' ,
                        'discount_precentage','discount_qantity','products' , 'actual_price'));
        }
        return response()->json("الفاتورة مش موجودة");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $bill = Bill::find($id);
        $products = Product::all();
        if ($bill){
            $sales = $bill->sales;
            $sale_products = array();
            $actual_price = 0;
            foreach($sales as $sale){
                $tp = Product::find($sale->product_id);
                array_push($sale_products , $tp);
            }
            return view('admin.Bills.edit' , compact('sales' , 'bill' , 'sale_products' , 'products'));
        }
        return view('admin.Bills.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $bill = Bill::find($request->id);
        if ($bill){
            $sales_array = $request->sales;
            $sales = array();
            // dd($sales_array);
            $total_price = 0;

            foreach($sales_array as $sale){
                $obj = new Sale;
                // dd($sale);
                $obj->product_count = $sale["product_count"];
                $obj->price = $sale["price"];
                $total_price+=$obj->price  *  $sale["product_count"];
                $obj->product_id = $sale["product_id"];
                array_push($sales,$obj);

                $bill->sales()->update($sale);
            }
            $bill->customer_name = $request->customer_name;
            $bill->phone_number = $request->phone_number;
            $bill->total_price = $total_price - $request->discount;
            $bill->discount = $request->discount;

            $bill->update();
            return ( 'تم تجديد الفاتورة بنجاح');
        }
        else {
            return response()->json("الفاتورة مش موجودة");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::find($id);
        if($bill){
            $bill->sales()->delete();
            $bill->delete();
            return redirect("/admin/bills");
        }
       return response()->json(" الفاتورة مش موجودة اصلاذ");
    }
}