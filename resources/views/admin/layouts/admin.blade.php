@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="container">
            @yield('Contents')
        </div>
    </div>

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
@endsection