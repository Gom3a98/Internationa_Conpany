<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
@extends('admin.layouts.admin')

@section('Contents')


<script>
        var Selectedid=-1;
    $(document).on("click", ".box-body a", function () {
         Selectedid= $(this).attr('id');
    });
    $(document).on("click", ".input-group a", function () {
            console.log(Selectedid)
            $('div').remove('.info #'+Selectedid);
            $('#deleteModal').modal('hide');
        
});

        


       $(document).ready(function() {
           
        $('form'). submit( function(e){ e. preventDefault(); }); 
            $("#pp").change(function(){
                var name = $(this).children("option:selected").text();
                var id  = $(this).children("option:selected").val();
                var price = $(this).children("option:selected").attr("name");
                $('.info').append('<div class="input-group" id="'+id+'"><div class="input-group-prepend"><span class="input-group-text">'
                +name+'</span></div><input type="number" value = "1" class="form-control"><input type="text" name = "hhh" hidden value = '
                +id+' aria-label="First name" class="form-control"><input type="text" name="gggg" value = '
                +price+' aria-label="Last name" class="form-control"><a href="#deleteModal" id="'+
                id+'"class="delete"data-toggle="modal" ><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a></div>');
                })


                $(".submit").click(()=>{
                dataItems = getAllValues();
                var toSend = new Object();
                var form_data = new FormData();
                form_data.append("title",  dataItems[0]); 
                form_data.append("desc",  dataItems[1]); 
                form_data.append("offerPrice",  dataItems[2]); 
                form_data.append("duration",  dataItems[3]); 
                var file_data = $("#file").prop("files")[0];
                form_data.append("file", file_data); 

                var arr = []
                for (var i = 5 ; i < dataItems.length ;i+=3){
                    var temp = new Object();
                    temp.product_count = dataItems[i];
                    temp.product_id = dataItems[i+1];
                    temp.price = dataItems[i+2];
                    arr.push(temp)
                }
                // form_data.append("sales", arr); 
                form_data.append("sales",JSON.stringify(arr));
                $.ajax({
                    url: "/api/storeOffer",
                    dataType: 'script',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(result) {
                        var url = '/admin/offers';
                        var myWindow = window.open(url, "_self", "width=1200, height=600,scrollbars=yes,status=yes,location = yes");
                        }
                }) 
            })
       })
          
    function getAllValues() {
        var inputValues = $('form :input').map(function() {
            var type = $(this).prop("type");
            var name = $(this).prop('id');
            if (type == "text" || type == "number" || type=="textarea" || type=="file") { 
                 return $(this).val();
            }
        })
        return inputValues;
    }
</script>
<div style="text-align: right" class="conrainer" dir="rtl">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">أنشاء عرض جديدة</h3>
        </div>
                <!-- /.box-header -->
        <br>
        <div class="box-body" >
            <form action="#"> 
                <!-- text input -->
                <div class="form-group">
                    <label for="title">العنوان</label>
                    {{-- <textarea class="form-control" name="desc" id="desc"></textarea> --}}
                    <input type="text"class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="desc">{{trans('offers.desc')}}</label>
                    <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">{{trans('offers.price')}}</label>
                    <input type="number" name="price" class="form-control" id="price">
                </div>
                <div class="form-group">
                    <label for="duration">{{trans('offers.duration')}}</label>
                    <input type="number" name="duration" class="form-control" id="duration">
                </div>
                <div class="row form-group">
                    <div class="col-sm-10">
                        <span class="control-fileupload">
                          <label for="file1" class="text-left">Please choose a files on your computer.</label>
                          <input type="file" name="product_images" id="file">
                        </span>
                      </div>
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
                 @foreach($selected_products as $product)
                    <div class="input-group"id={{$product->id}}>
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{$product->name}}</span>
                        </div>
                        <input type="number" value = "{{$product->count}}" class="form-control">
                        <input type="text" name = "p_id" hidden value = "{{$product->id}}" aria-label="First name" class="form-control">
                        <input type="text" name="s_price" value = "{{$product->price}}" aria-label="Last name" class="form-control">
                        <a  href="#deleteModal" id="{{$product->id}}" class="delete"data-toggle="modal" ><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a>
                    </div>
                
                    @endforeach
                 </div>
                <button class="btn btn-block btn-primary btn-lg submit">أنشاء</button>
            </form>
        </div>
                <!-- /.box-body -->
    </div>
</div>

@endsection
