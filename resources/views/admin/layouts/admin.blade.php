@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-9">
            @yield('Contents')
    </div>
    @if (!empty($requests))
       
   
   
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
                              
                        
                        <!-- Button trigger modal -->
                        

                              
                        </td>
                        
                    </tr>
                </tbody>
            @endforeach

        </table>
        {{$requests->links()}}
    </div>

    @endif


    <div class="card ml-3" style="max-width: 30rem;min-width: 13rem;">
        <div class="card-header bg-info text-white"> Actions.</div>
            <div class="card-body">
            <div class="container">
                <p class="card-text"> <a href="{{route('product.index')}}">أنشاء فاتورة</a></p>
                <p class="card-text"> <a href="{{route('product.index')}}">أنشاء عرض سعر</a></p>
            <p class="card-text"> <a href="/admin/bills">جميع الفواتير</a></p>
            <p class="card-text"><a href="{{route('category.index')}}">المصنفات</a></p>
                <p class="card-text"><a href="{{route('product.index')}}"> المنتجات </a></p>
                
                <p class="card-text"><a href="{{route('offers.index')}}">العروض</a></p>
                <p class="card-text"><a href="{{route('requests.index')}}">طلبات العملاء</a></p>


                
            </div>
            </div>
            
        </div>
        
    </div>
    
</div>
</div>
@endsection