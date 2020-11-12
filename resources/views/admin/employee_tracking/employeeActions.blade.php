@extends('admin/layouts/category_product')




@section('title') Employee Details @endsection

@section('content')
    <br><br>
    <form method="GET" action="/admin/employeeAccount">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Employee Name</label>
        <select class="custom-select mr-sm-2" name="employee_name" id="inlineFormCustomSelect">
            {{-- <option selected>Choose...</option> --}}
            <option value="Stock">Stock</option>
            <option value="Tamer">Tamer</option>
            <option value="Fathi">Fathi</option>
            <option value="Ahmed Nabil">Ahmed Nabil</option>
            <option value="Mohamed Nabil">Mohamed Nabil</option>
            <option value="Mohamed Ali">Mohamed Ali</option>
            <option value="Amr Fahmy">Amr Fahmy</option>
        </select>
        <br><br>
        <button class="btn btn-outline-secondary"  type="submit">حساب موظف</button>
    </form>

    <hr>

    <form method="GET" action="/admin/userMoney ">
        <label class="mr-sm-2" for="inlineFormCustomSelect">User Name</label>
        <select class="custom-select mr-sm-2" name="user_name" id="inlineFormCustomSelect">
            {{-- <option selected>Choose...</option> --}}
            <option value="Stock">Stock</option>
            <option value="Tamer">Tamer</option>
            <option value="Fathi">Fathi</option>
            <option value="Ahmed Nabil">Ahmed Nabil</option>
            <option value="Mohamed Nabil">Mohamed Nabil</option>
            <option value="Mohamed Ali">Mohamed Ali</option>
            <option value="Amr Fahmy">Amr Fahmy</option>
        </select>
        <br><br>
        <button class="btn btn-outline-secondary"  type="submit">ألمبلغ المدفوع</button>
    </form>


    <hr>

    

    <form method="GET" action="/admin/newMonth4Employee">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Employee Name</label>
        <select class="custom-select mr-sm-2" name="employee_name" id="inlineFormCustomSelect">
            {{-- <option selected>Choose...</option> --}}
            <option value="Stock">Stock</option>
            <option value="Tamer">Tamer</option>
            <option value="Fathi">Fathi</option>
            <option value="Ahmed Nabil">Ahmed Nabil</option>
            <option value="Mohamed Nabil">Mohamed Nabil</option>
            <option value="Mohamed Ali">Mohamed Ali</option>
            <option value="Amr Fahmy">Amr Fahmy</option>
        </select>
        <br><br>
        <button class="btn btn-outline-secondary"  type="submit">بدء شهر جديد</button>
    </form>

    <hr>

    <form method="GET" action="/admin/newMonth4All">
        <button class="btn btn-outline-secondary"  type="submit">بدء شهر جديد للكل</button>

    </form>
    
@endsection
