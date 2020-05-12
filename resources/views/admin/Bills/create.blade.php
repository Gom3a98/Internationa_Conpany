<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
@extends('admin.layouts.admin')

@section('Contents')


<script>
       $(document).ready(function() {
        $('form'). submit( function(e){ e. preventDefault(); }); 
            $("#pp").change(function(){
                var name = $(this).children("option:selected").text();
                var id  = $(this).children("option:selected").val();
                var price = $(this).children("option:selected").attr("name");
                $('.info').append('<div class="input-group"><div class="input-group-prepend"><span class="input-group-text">'+name+'</span></div><input type="number" value = "1" class="form-control"><input type="text" name = "hhh" hidden value = '+id+' aria-label="First name" class="form-control"><input type="text" name="gggg" value = '+price+' aria-label="Last name" class="form-control"></div>');
                })
            $(".submit").click(()=>{
                dataItems = getAllValues();
                var toSend = new Object();
                toSend.customer_name = dataItems[0];
                toSend.phone_number = dataItems[1];
                toSend.discount = dataItems[2];
                var arr = []
                for (var i = 3 ; i < dataItems.length ;i+=3){
                    var temp = new Object();
                    temp.product_count = dataItems[i];
                    temp.product_id = dataItems[i+1];
                    temp.price = dataItems[i+2];
                    arr.push(temp)
                }
                toSend.sales = arr;
                $.ajax({
                    url: '/api/storeBill',
                    type: 'post',
                    data: toSend,
                    success: function(result) {
                        var url = '/bills';
                        var myWindow = window.open(url, "_self", "width=1200, height=600,scrollbars=yes,status=yes,location = yes");
                    }
                });
            })
       })
    function getAllValues() {
        var inputValues = $('form :input').map(function() {
            var type = $(this).prop("type");
            var name = $(this).prop('id');
            if ((type == "text" || type == "number" )&& name != "fname") { 
                 return $(this).val();
            }
        })
        console.log(inputValues);
        return inputValues;
    }
</script>
<div class="conrainer" dir="rtl">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">أنشاء فاتورة جديدة</h3>
        </div>
                <!-- /.box-header -->
        <br>
        <div class="box-body" >
            <form action="#"> 
                <!-- text input -->
                <div class="form-group">
                    <label class="float-right">أسم العميل</label>
                    <input type="text" name = "customer_name" id = "customer_name" class="form-control" placeholder="عمرو محمد فهمي ">
                </div>
                <div class="form-group">
                    <label class="float-right">رقم الهاتف المحمول</label>
                    <input type="text" id = "phone_number" name = "phone_number" class="form-control" placeholder="0123456789">
                </div>

                <div class="form-group">
                    <label class="float-right">خصم الفاتورة</label>
                    <input type="number" id = "discount" name = "discount" class="form-control" placeholder="50 L.E">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-postpend">
                        <button class="btn btn-outline-secondary" type="button">اختيار</button>
                    </div>
                    <select id = "pp" class="custom-select gg" id="inputGroupSelect03" aria-label="Example select with button addon">
                        @foreach($products as $product)
                            <option value = "{{$product->id}}" name = "{{$product->price}}">{{$product->name}}</option>
                        @endforeach
                     </select>
                 </div>
                 <div class="info"></div>
                <button class="btn btn-block btn-primary btn-lg submit">أنشاء</button>
            </form>
        </div>
                <!-- /.box-body -->
    </div>
</div>

@endsection
