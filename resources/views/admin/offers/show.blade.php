@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <div class="row justify-content-center  text-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{trans('offers.details')}}</div>
                <div class="card-body">
                    <div class="coupon">
                        <div class="container">
                            <h3>Company Logo</h3>
                            </div>
                            <img src="hamburger.jpg" alt="Avatar" style="width:100%;">
                            <div class="container" style="background-color:white">
                            <h2><b>20% OFF YOUR PURCHASE</b></h2>
                            <p>Lorem ipsum..</p>
                        </div>
                        <div class="container">
                            <p>Use Promo Code: <span class="promo">BOH232</span></p>
                            <p class="expire">Expires: Jan 03, 2021</p>
                        </div>
                </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection