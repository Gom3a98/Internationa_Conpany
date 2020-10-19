<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
@extends('admin.layouts.admin')

@section('Contents')


<script>
    var Selectedid=-1;
    $(document).on("click", ".box-body a", function () {
         Selectedid= $(this).attr('id');
    });
    $(document).on("click", ".delete input", function () {
        if($(this).attr('value')=="Delete"&&Selectedid!=-1)
        {
            console.log(Selectedid)
            $('tr').remove('#table_body #'+Selectedid);
            $('#deleteModal').modal('hide');
        }
        
    });
       $(document).ready(function() {
        $('form'). submit( function(e){ e. preventDefault(); }); 
            $("#pp").change(function(){
                var name = $(this).children("option:selected").text();
                var id  = $(this).children("option:selected").val();
                var price = $(this).children("option:selected").attr("name");
                $('#table_body').append('<tr id="'+id+'"><td><h4><b>'+name+'</b></h4></td> <td><input type="text" name="count" value="1"><input type="text" name = "p_id" hidden value = "'+id+'" aria-label="First name" class="form-control"></td><td><input type="text" name="price" value="'+price+'"></td><td><a href="#deleteModal" id="'+id+'" class="delete"data-toggle="modal" ><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a></td></tr>');
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
               
                if(validate_sales(arr))
                {
                    toSend.sales = arr;
                    $.ajax({
                    url: '/api/storeBill',
                    type: 'post',
                    data: toSend,
                    success: function(result) {
                        var url = '/admin/bills';
                        var myWindow = window.open(url, "_self", "width=1200, height=600,scrollbars=yes,status=yes,location = yes");
                        }
                    });
                }
                else alert("تأكد من ان السعر او الكمية اكبر من 1")
 
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
    function validate_sales(sales){
        var res = sales.filter(checkConstarints);
       if (res.length == sales.length )
            return true;
        return false;
    }
    function checkConstarints(sale) {
         return sale.product_count >= 1 && sale.price >= 1;
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
                    <input required type="text" name = "customer_name" id = "customer_name" class="form-control" placeholder="اسم العميل ">
                </div>
                <div class="form-group">
                    <label class="float-right">رقم الهاتف المحمول</label>
                    <input required type="text" id = "phone_number" name = "phone_number" class="form-control" placeholder="eg 011">
                </div>

                <div class="form-group">
                    <label class="float-right">خصم الفاتورة</label>
                    <input required type="number" id = "discount" name = "discount" class="form-control" placeholder="00 L.E">
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
                 <div class="info">
                    <table class="table table-image" id="table">
                        <thead>
                          <tr>

                            <th scope="col">{{trans('priceReport.product_name')}}</th>
                            <th scope="col">{{trans('priceReport.count')}}</th>
                            <th scope="col">{{trans('priceReport.price')}}</th>
                            <th scope="col">{{trans('priceReport.delete')}}</th>      
                          </tr>
                        </thead>

                        <tbody id="table_body">
                        @foreach($selected_products as $product)
                            <tr id="{{$product->id}}">
                              <td>
                                <h4><b>{{$product->name}}</b></h4>
                              </td>
                              <td>
                              <input type="text" name="count" required value="1" placeholder = "MAX COUNT : {{$product->count}}" value="">
                              <input type="text" name = "p_id" hidden value = "{{$product->id}}" aria-label="First name" class="form-control">
                              </td>
                              <td><input type="text" name="price" value="{{$product->price}}"></td>
                              <td><a href="#deleteModal" id="{{$product->id}}" class="delete"data-toggle="modal" ><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a></td>
                            </tr>
                            </div>
                            @endforeach
                        </tbody>

                      </table> 
                  </div>
                <button class="btn btn-block btn-primary btn-lg submit">أنشاء</button>
            </form>
        </div>
                <!-- /.box-body -->
    </div>
</div>
@endsection
<!-- Delete Modal HTML delete cat-prod-img-->
<div id="deleteModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <script>

            </script>
            <div class="modal-header">
                <h4 class="modal-title">Delete @yield('title')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete these Records?</p>
                <p class="text-warning"><small style="color: black">This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer delete">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-danger" value="Delete">
            </div>

        </div>
    </div>
</div>
