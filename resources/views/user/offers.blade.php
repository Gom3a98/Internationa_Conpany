@extends('user/layouts/user')
@section('Header')
<li><a href="/home">HOME</a></li>
<li class="active"><a href="/offers">OFFER</a></li>
<li><a href="/about">ABOUT</a></li>
<li><a href="/news">NEWS</a></li>
<li><a href="/contact">CONTACT</a></li>

@endsection
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $("#posts").accordion({
            header: "div.tab",
            alwaysOpen: false,
            autoheight: true
        });

    });
    
</script>
<div class="faqs">
    <div id="posts">
        <div class="section group">
            @foreach ($offers as $offer)
                <div class="grid_1_of_3 images_1_of_3">
                    <img src="{{ asset('user/images/delivery-img1.jpg')}}" alt="" /><!-- {{$offer->img}} -->
                    <h3>{{$offer->title}} </h3> 
                    <span style="font-size:3em;font-family: 'ambleregular';
                        color:#CD1F25;">{{$offer->offerPrice}}</span> 
                    <p>{{$offer->desc}}</p>
                    <p>Duration:{{$offer->duration}} weeks</p>

                    <h2>Product in offer:</h2>
                    @foreach ($offer->products as $product)
                        <div class="tab bar">
                            <h4 class="post-title">{{ $loop->index +1}}.{{$product->name}}</h4>
                        </div>
                        <div class="panel margin-lr-7">
                            <p>{{$product->description}}.</p>
                            <p>count:{{$product->productCount}}</p>
                            <p>Actual price: 
                                @foreach(explode('-', $product->price) as $info) 
                                    {{$info}}   
                                @endforeach
                            </p>
                            <p>product price in offers:{{$product->productPrice}} .</p>
                            <p style="text-align: right;"><a href="/preview/{{$product->id}}">Details</a></p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection