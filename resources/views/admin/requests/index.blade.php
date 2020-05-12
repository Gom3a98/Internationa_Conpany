@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <div class="row justify-content-center  text-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{trans('requests.requests')}}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{trans('requests.customer')}}</th>
                                <th scope="col">{{trans('requests.phone')}}</th>
                                <th scope="col">{{trans('requests.reuested_products')}}</th>
                                <th scope="col"><th>
                            </tr>
                        </thead>
                        @foreach($requests as $request)
                            <tbody>
                                <tr>
                                    <td >{{$request->name}}</td>
                                    <td>{{$request->phone_number}}</td>
                                    <td>{{$request->product->name}}</td>
                                    <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$request->id}}">
                                                {{trans('requests.delete')}}
                                            </button>                             
                                    <!-- Button trigger modal -->
                                    

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{trans('offers.delete_message')}}</h5>
                                            <button float-left type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            {{$request->name}}
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('offers.close')}}</button>
                                              <form action="/requests/{{$request->id}}" method= "post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">{{trans('offers.delete_confirmation')}}</button>
                                                </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                          
                                    </td>
                                    
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{$requests->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection