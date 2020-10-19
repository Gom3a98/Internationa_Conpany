@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="{{ asset('js/searchAdmin.js') }}"></script>
    <link href="{{ asset('css/searchAdmin.css') }}" rel="stylesheet">
<div class="container" dir="rtl">
    <div class="row justify-content-center  text-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{trans('requests.requests')}}
                  <div  class="form-group pull-right">
                    <input type="text" class="search form-control" placeholder="What you looking for?">
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover results">
                        <thead>
                            <tr>
                                <th scope="col">{{trans('requests.customer')}}</th>
                                <th scope="col">{{trans('requests.phone')}}</th>
                                <th scope="col">العنوان</th>
                                <th scope="col">{{trans('requests.reuested_products')}}</th>
                                <th scope="col"><th>
                            </tr>
                            
                        </thead>
                        @foreach($requests as $request)
                            <tbody>
                              
                                <tr>
                                    <td >{{$request->name}}</td>
                                    <td>{{$request->phone_number}}</td>
                                    <td>{{$request->address}}</td>
                                    <td>{{$request->userName}}</td>
                                    <td>
                                    <a href="/Preview/{{$request->product_id}}" class="btn btn-primary">preview</a>
                                          
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
                                              <form action="/admin/requests/{{$request->id}}" method= "post">
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
                        <tr class="warning no-result">
                          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                      </tr>
                    </table>
                    {{$requests->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection