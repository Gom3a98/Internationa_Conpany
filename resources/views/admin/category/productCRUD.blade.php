@extends('admin/layouts/category_product')
@section('table_title')
<th>
    <span class="custom-checkbox">
        <input type="checkbox" id="selectAll">
        <label for="selectAll"></label>
    </span>
</th>
    <th>ID</th>
    <th>Name</th> 
    <th>Category</th>       
    <th>Description</th> 
    {{-- <th>status</th> --}}
    <th>Count</th>
    <th>From Price</th>
    <th>To Price</th>
    <th>Action</th>
@endsection


@section('title')Product @endsection


@section('links')
    <div class="hint-text">Showing <b>{{sizeof($products)}}</b> out of <b>{{$productsSize}}</b> entries</div>
    <ul class="pagination">
        {{$products->links()}}
    </ul>
@endsection


@section('content')

    <script>
    // select/unSelect all check Box in each row 
    $(document).on("click",'#selectAll',function(event) { 
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;});
        } else {
            $(':checkbox').each(function() {
                this.checked = false;});
        }
    });


    //put the id of selected row in selected id and
    var Selectedid=-1;
    $(document).on("click", "table a", function () {
        Selectedid= $(this).attr('id');
        updatRecordeData();//to put the data in field of selected record
    });

    
    var allVals = new Set();
    function selectedRecord() { //record are selected
        $('.selected4Deleted :checked').each(function() {
        allVals.add($(this).val());
        });
    }


    //delete record
    $(document).on("click", ".delete input", function () {
        selectedRecord();//get all selected record
        //if select delete for one record will delete it only {if dont need that swap if and elseif}
        if(Selectedid!=-1)
        {
            allVals.clear();//to remove if another selected data
            allVals.add(Selectedid);
        }
        var arr=Array.from(allVals);
        if($(this).attr('value')=="Delete"&&allVals.size!=0)
        {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/admin/product/'+arr,
                type: 'delete',
                data: {'category_ids':arr, _method: 'delete'},
                success: function(result) {
                    location.reload();
                }
            });
        }
        else if($(this).attr('value')=="Delete")
            alert("no selected record for Delete")
            
    });

    //make sales Bill
    $(document).on("click", ".Bill input", function () {
        
        selectedRecord();//if select delete for one record will delete it only {if dont need that swap if and elseif}
        if(Selectedid!=-1)
        {
            allVals.clear();
            allVals.add(Selectedid);
        }
        var arr=Array.from(allVals); 
        if($(this).attr('value')=="Bill"&&allVals.size!=0)
            {
                var url = '/admin/create/'+arr;
                var myWindow = window.open(url, "_self", "width=1200, height=600,scrollbars=yes,status=yes,location = yes");
            }
        else if($(this).attr('value')=="Offer"&&allVals.size!=0)
        {
            var url = '/admin/priceReport/'+arr;
            var myWindow = window.open(url, "_self", "width=1200, height=600,scrollbars=yes,status=yes,location = yes");
                    
        }
        else if($(this).attr('value')=="Bill"||$(this).attr('value')=="Offer")
            alert("no selected record for Create Bill")
            
    });



    // put the data of updated record befor edit
    function updatRecordeData()
    {
        $.ajax({
                url: '/api/products/'+Selectedid,
                type: 'get',
                
                success: function(result) {

                    $(document).ready(function () {
                        $('#editProductModal #product_name').val(result.name);
                        $('#editProductModal #product_description').val(result.description);
                        $('#editProductModal #product_count').val(result.count);
                        $('#editProductModal #product_location').val(result.location);
                        $('#editProductModal #product_status').val(result.status);
                        $('#editProductModal #category_id').val(result.category_id);
                        $('#editProductModal #product_price1').val(result.from_price);
                        $('#editProductModal #product_price2').val(result.price);
                    });
                    
                }
            });
    }

    
    //for save update
    $(document).on("click", ".update input", function () {
        var updatedName = $(".updatedName").val();
        var data = { 'product_name':$('#editProductModal #product_name').val(),
                        'product_description':$('#editProductModal #product_description').val(),
                        'product_count':$('#editProductModal #product_count').val(),
                        'product_location':$('#editProductModal #product_location').val(),
                        'product_status':$('#editProductModal #product_status').val(),
                        'category_id':$('#editProductModal #category_id').val(),
                        'product_price1':$('#editProductModal #product_price1').val(),
                        'product_price2':$('#editProductModal #product_price2').val(),
                     }
        if($(this).attr('value')=="Save"&&Selectedid!=-1)
        {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/admin/product/'+Selectedid,
                type: 'post',
                data: { 'product_name':$('#editProductModal #product_name').val(),
                        'product_description':$('#editProductModal #product_description').val(),
                        'product_count':$('#editProductModal #product_count').val(),
                        'product_location':$('#editProductModal #product_location').val(),
                        'product_status':$('#editProductModal #product_status').val(),
                        'category_id':$('#editProductModal #category_id').val(),
                        'product_price1':$('#editProductModal #product_price1').val(),
                        'product_price2':$('#editProductModal #product_price2').val()
                        ,_method: 'put'},
                success: function(result) {
                    window.location="/admin/product/"+$('#editProductModal #category_id').val();
                }
            });
        
        }

            
    });
    </script>
    <!--basic form -->
@php

// $a = new \NumberFormatter("it-IT", \NumberFormatter::CURRENCY);
// $y= $a->formatCurrency(100000,"EGY"); // outputs €12.345,12
// echo (explode(" ",$y)[0]);

@endphp

    @foreach ($products as $product)
        <tr>
            <td>
                <span class="custom-checkbox selected4Deleted">
                    <input type="checkbox" id="{{$product->id}}" name="options[]" value="{{$product->id}}">
                <label for="{{$product->id}}"></label>
                </span>
            </td>
            <td>{{$product->id}} </td>
            <td> {{$product->name}}</td>
            <td> {{$product->category_name}}</td>
            <td> {{$product->description}}</td>
            {{-- <td> @if ($product->status==1)
                        public
                    @else
                        private
                @endif</td> --}}
                {{-- {{setlocale(LC_MONETARY,"de_DE")}} --}}
            {{-- <td>{{money_format("The price is %i", $product->price)}}</td> --}}
            <td> {{$product->count}}</td>
            <td>{{number_format($product->from_price,2)}} </td>
            <td>{{number_format($product->price,2)}}</td>
            <td>
                <a href="/admin/image/{{$product->category_name}}-{{$product->name}}-{{$product->id}}" id="{{$product->id}}" class="view" ><img style="width: 20px ; height: 20px;"src="https://img.icons8.com/doodle/48/000000/read.png"/></a>
                <a href="#editProductModal" id="{{$product->id}}" class="edit" data-toggle="modal"><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/color/48/000000/approve-and-update.png"/></a>
                <a href="#deleteModal" id="{{$product->id}}" class="delete" data-toggle="modal"><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a>
                
            </td>
        </tr>
    @endforeach

    <!-- add product-->
    <div id="addModal" class="modal fade in" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/admin/product" enctype="multipart/form-data" method="post">
                    {{ csrf_field()}}
                    <div class="modal-header">                      
                        <h4 class="modal-title">Add product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required="" name="product_name">
                        </div>

                        <div class="col-auto my-1 form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                            <select class="custom-select mr-sm-2" name="category_id" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                            @foreach ($allCategory as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                
                            </select>
                          </div>
                          <input type="hidden" name="category_name" value="{{$category->name}}">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" required="" name="product_description" rows="4" cols="50"></textarea>
                            
                        </div>  
                        <div class="col-auto my-1 form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>
                            <select class="custom-select mr-sm-2" name="product_status"id="inlineFormCustomSelect">
                              {{-- <option >Choose...</option> --}}
                              <option selected value="1">public</option>
                              <option value="0">private</option>
                            </select>
                          </div>    
                        <div class="form-group">
                            <label>count</label>
                            <input type="number" value="1" min="0" class="form-control" required="" name="product_count">
                        </div>  
                        <div class="form-group">
                            <label>location</label>
                            <input type="text" class="form-control" value="الرئيسى"name="product_location">
                        </div>
                        <div class="form-group" >
                            <label>price</label><br>
                            <input type="number" min="0" required="" style="width: 45%" name="product_price1"id="product_price1"    placeholder="from"> -
                            <input type="number" min="0" required="" style="width: 45%"name="product_price2" id="product_price2"  placeholder="to">    
                        </div>  
        
                        <div class="row form-group">
                            <div class="col-sm-10">
                                <span class="control-fileupload">
                                  <label for="file1" class="text-left">Please choose a files on your computer.</label>
                                  <input type="file" name="product_images[]" id="file1"multiple>
                                </span>
                              </div>
                            </div>
                          </div>

                          
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit product -->
    <div id="editProductModal" class="modal fade" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Edit product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required=""id="product_name" name="product_name">
                        </div>

                        <div class="col-auto my-1 form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                            <select class="custom-select mr-sm-2" id="category_id"name="category_id" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                                @foreach ($allCategory as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            
                            @endforeach
                
                            </select>
                          </div>
                          <input type="hidden" name="category_name" value="{{$category->name}}">
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" required="" id="product_description"name="product_description">
                        </div>  
                        <div class="col-auto my-1 form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>
                            <select class="custom-select mr-sm-2"id="product_status" name="product_status"id="inlineFormCustomSelect">
                              <option selected>Choose...</option>
                              <option value="1">public</option>
                              <option value="0">private</option>
                            </select>
                          </div>    
                        <div class="form-group">
                            <label>count</label>
                            <input type="number" min="0" class="form-control mb-2 mr-sm-2"  required=""id="product_count" name="product_count">
                        </div>  
                        <div class="form-group">
                            <label>location</label>
                            <input type="text" class="form-control" required=""id="product_location" name="product_location">
                        </div>
                        <div class="form-group" >
                            <label>price</label><br>
                            <input type="number" min="0" style="width: 45%" name="product_price1"id="product_price1"   placeholder="from"> -
                            <input type="number" min="0" style="width: 45%"name="product_price2"id="product_price2"  placeholder="to">    
                            
                        </div>  
        

                          
                    </div>
                    <div class="modal-footer update">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
            </div>
        </div>
    </div>
        <!-- view Price-->
    <div id="salesBillModal" class="modal fade" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
            
                    <script>
                        
                    </script>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Make sales Bill</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to Make sales Bill?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer Bill">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Bill">
                        <input type="submit" class="btn btn-success" value="Offer">
                    </div>
            
            </div>
        </div>
    </div>
    
@endsection