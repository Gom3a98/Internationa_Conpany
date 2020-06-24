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
    // {
    //     [
    //         {{$offer->title}}
    //         {{$offer->desc}}
    //         {{$offer->duration}}
    //         {{$offer->img}}
    //         [
    //             {{$product->name}}
    //             {{$product->description}}
    //             {{$product->productCount}}
    //             {{$product->from_price}}
    //             {{$product->price}}
    //             {{$product->productPrice}}
    //         ]
    //     ]
    // }
</script>
<div class="faqs">
    <div id="posts">
        <div class="section group">
            @foreach ($offers as $offer)
                <div class="grid_1_of_3 images_1_of_3">
                    <img src="{{ asset('user/images/delivery-img1.jpg')}}" alt="" /><!-- {{$offer->img}} -->
                    <h3>{{$offer->title}} </h3> 
                    <span style="font-size:3em;font-family: 'ambleregular';
                        color:#CD1F25;">{{number_format($offer->offerPrice,2)}}</span> 
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
                                {{number_format($product->from_price,2)}} <h5>to</h5> {{number_format($product->price,2)}}
                            </p>
                            <p>product price in offers:{{number_format($product->productPrice,2)}} .</p>
                            <p style="text-align: right;"><a href="/preview/{{$product->id}}">Details</a></p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection