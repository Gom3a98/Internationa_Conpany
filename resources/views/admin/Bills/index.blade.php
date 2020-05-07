@extends('admin.layouts.admin')

@section('Contents')
<div class="container" dir="rtl">
    <div class="row justify-content-center  text-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">عرض كل الفواتير</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">اسم العميل</th>
                                <th scope="col">الهاتف</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col">عرض</th>
                                <th scope="col">حذف</th>
                                <th scope="col">تعديل</th>
                            </tr>
                        </thead>
                        @foreach($bills as $bill)
                            <tbody>
                                <tr>
                                    <td >{{$bill->customer_name}}</td>
                                    <td>{{$bill->phone_number}}</td>
                                    <td>{{$bill->created_at->format('d /m /Y')}}</td>
                                    <td>  <a href="{{'/getBill/' . $bill->id}}" class="btn btn-success">عرض التفاصيل</a>  </td>
                                    <td>
                                    <form action="{{'/deleteBill/' . $bill->id}}" method= "post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class='btn btn-danger'> حذف</button>
                                        </form>
                                          
                                    </td>
                                    <td>
                                        <a href="{{'/edit/'. $bill->id}}" class='btn btn-primary'>تعديل</a>    
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{$bills->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection