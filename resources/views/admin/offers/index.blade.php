@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <div class="row justify-content-center  text-center">
        <div class="col-md-12">
            <h2 class="text-right"><a href="{{route('offers.create')}}"><button class="btn btn-primary">{{trans('offers.create_new_offer')}}</button></a></h2>
            <div class="card">
                <div class="card-header">{{trans('offers.offers')}}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{trans('offers.desc')}}</th>
                                <th scope="col">{{trans('offers.price')}}</th>
                                <th scope="col">{{trans('offers.duration')}}</th>
                                <th scope="col">{{trans('offers.products')}}</th>
                                <th scope="col"></th>
                                <th scope="col"><th>
                            </tr>
                        </thead>
                        @foreach($offers as $offer)
                            <tbody>
                                <tr>
                                    <td >{{$offer->desc}}</td>
                                    <td>{{$offer->price}}</td>
                                    <td>{{$offer->duration}}</td>
                                    <td>
                                        @foreach($offer->products  as $product)
                                        <h3><a href="{{route('product.show',$product->id)}}">{{$product->name}}</a></h3>
                                        @endforeach

                                    </td>
                                        


                                    <td>  <a href="{{route('offers.show',$offer->id)}}" class="btn btn-success">{{trans('offers.show_details')}}</a>  </td>
                                    <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                {{trans('offers.delete')}}
                                            </button>
<!--                                             <button type="submit" class='btn btn-danger'></button>
 -->                                    
                                    <!-- Button trigger modal -->
                                    

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{trans('offers.delete_message')}}</h5>
                                            <button float-left type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            {{$offer->desc}}
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('offers.close')}}</button>
                                              <form action="{{route('offers.destroy',$offer->id)}}" method= "post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">{{trans('offers.delete_confirmation')}}</button>
                                                </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                          
                                    </td>
                                    <td>
                                        <a href="{{route('offers.edit',$offer->id)}}" class='btn btn-primary'>{{trans('offers.update')}}</a>    
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{$offers->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection