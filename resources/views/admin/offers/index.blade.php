@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{ asset('user/js/jquery-1.7.2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('user/js/jquery.accordion.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $("#posts").accordion({
            header: "div.tab",
            alwaysOpen: false,
            autoheight: true
        });

    });


</script>
<div class="container" dir="rtl">
    <div class="row justify-content-center  text-center">
        <div class="col-md-12">
            <h2 class="text-right"><a href="{{route('product.index')}}"><button
                        class="btn btn-primary">{{trans('offers.create_new_offer')}}</button></a></h2>
            <div class="card">
                <div class="card-header">{{trans('offers.offers')}}</div>
                <div class="card-body">
                    <div class="faqs">
                        <div id="posts">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center"scope="col">العنوان</th>
                                        <th style="text-align: center"scope="col">{{trans('offers.desc')}}</th>
                                        <th style="text-align: center"scope="col">الصورة</th>
                                        <th style="text-align: center" scope="col">{{trans('offers.price')}}</th>
                                        {{-- <th scope="col">{{trans('offers.duration')}}</th> --}}
                                        <th scope="col">{{trans('offers.products')}}</th>
                                        


                                    </tr>
                                </thead>
                                @foreach($offers as $offer)
                                <tbody>
                                    <tr>

                                        <td>{{$offer->title}}</td>
                                        <td>{{$offer->desc}}</td>
                                        <td><img style="width: 70px; height: 70px;"
                                                src="{{ asset('user/images/delivery-img1.jpg')}}" alt="" /></td>
                                        <td>{{number_format($offer->offerPrice,2)}}</td>
                                        {{-- <td>{{$offer->duration}}</td> --}}

                                        <td>
                                            @foreach ($offer->products as $product)
                                            <div class="tab bar">
                                                <h4 class="post-title">{{ $loop->index +1}}.{{$product->name}}</h4>
                                            </div>
                                            <div style="text-align: left" class="panel margin-lr-7">
                                                <p>{{$product->description}}:description</p>
                                                <p>count:{{$product->productCount}}</p>
                                                <p>price Range:
                                                    {{number_format($product->from_price,2)}} to  {{number_format($product->price,2)}}
                                                </p>
                                                <p>product price in offers:{{number_format($product->productPrice,2)}}
                                                </p>
                                                <p style="text-align: right;"><a
                                                        href="/preview/{{$product->id}}">Details</a></p>
                                            </div>
                                            @endforeach

                                        </td>



                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#{{$offer->id}}">
                                                {{trans('offers.delete')}}
                                            </button>
        
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="{{$offer->id}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                {{trans('offers.delete_message')}}</h5>
                                                            <button float-left type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{$offer->desc}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('offers.close')}}</button>
                                                            <form action="{{route('offers.destroy',$offer->id)}}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-primary">{{trans('offers.delete_confirmation')}}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

{{-- 
                                            <a href="{{route('offers.show',$offer->id)}}"
                                                class='btn btn-primary'>{{trans('offers.update')}}</a> --}}
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    {{$offers->links()}}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection