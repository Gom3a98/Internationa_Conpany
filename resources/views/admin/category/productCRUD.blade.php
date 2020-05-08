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
    <th>status</th>
    <th>count</th>
    <th>price</th>
    <th>action</th>
@endsection
@section('title')
    Product
@endsection
@section('links')
    <div class="hint-text">Showing <b>{{sizeof($products)}}</b> out of <b>{{$productsSize}}</b> entries</div>
    <ul class="pagination">
        {{$products->links()}}
    </ul>
@endsection
@section('content')

    <script>
    //for delete Record
        // select all button for records
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
    var allVals = new Set(); ;
    var Selectedid=-1;
    $(document).on("click", "table a", function () {
        
        Selectedid= $(this).attr('id');
        
        Record4Prodcut();
    });
    $(document).on("click", ".delete input", function () {
        updateTextArea();//if select delete for one record will delete it only {if dont need that swap if and elseif}
        if(Selectedid!=-1)
            allVals.add(Selectedid);
        var arr=Array.from(allVals);
        if($(this).attr('value')=="Delete"&&allVals.size!=0)
            {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/product/'+arr,
                type: 'delete',
                data: {'category_ids':arr, _method: 'delete'},
                success: function(result) {
                    alert("deleted");
                    location.reload();
                }
            });
            }
        else if($(this).attr('value')=="Delete")
            alert("no selected record for Delete")
            
    });
    function updateTextArea() { //record are selected
        $('.selected4Deleted :checked').each(function() {
        allVals.add($(this).val());
        });
    }
    // intialize update record
    function Record4Prodcut()
    {
        alert("hii");
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
                        $('#editProductModal #product_price1').val(result.price.split("-")[0]);
                        $('#editProductModal #product_price2').val(result.price.split("-")[1]);
                    });
                    
                }
            });

        var url = '/product/'+Selectedid;

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
                url: '/product/'+Selectedid,
                type: 'post',
                data: {data,_method: 'put'},
                success: function(result) {
                    alert("update record with id = "+Selectedid);
                    location.reload();
                }
            });
            
            }

            
    });
    </script>
    <!--basic form -->

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
                    <td> @if ($product->status==1)
                                public
                            @else
                                private
                        @endif</td>
                    <td> {{$product->count}}</td>
                    <td> {{$product->price}}</td>
     
                    <td>
                        <a href="/image/{{$product->category_name}}-{{$product->name}}-{{$product->id}}" id="{{$product->id}}" class="view" ><img style="width: 20px ; height: 20px;"src="https://img.icons8.com/doodle/48/000000/read.png"/></a>
                        <a href="#editProductModal" id="{{$product->id}}" class="edit" data-toggle="modal"><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/color/48/000000/approve-and-update.png"/></a>
                        <a href="#deleteCategoryModal" id="{{$product->id}}" class="delete" data-toggle="modal"><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a>
                        
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>

        </div>
    </div>
    <!-- Edit Modal HTML add product-->
    <div id="addCategoryModal" class="modal fade in" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/product" enctype="multipart/form-data" method="post">
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
                              <option selected>Choose...</option>
                              <option value="1">public</option>
                              <option value="0">private</option>
                            </select>
                          </div>    
                        <div class="form-group">
                            <label>count</label>
                            <input type="text" class="form-control" required="" name="product_count">
                        </div>  
                        <div class="form-group">
                            <label>location</label>
                            <input type="text" class="form-control" required="" name="product_location">
                        </div>
                        <div class="form-group" >
                            <label>price</label>

                            <input type="number" name="product_price1" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="from">
                            <input type="number" name="product_price2" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="to">    
                        </div>  
        
                        <div class="row form-group">
                            <div class="col-sm-10">
                                <span class="control-fileupload">
                                  <label for="file1" class="text-left">Please choose a file on your computer.</label>
                                  <input type="file" name="product_images" id="file1">
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
    <!-- Edit Modal HTML edit categoy -->
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
                            <input type="number" class="form-control mb-2 mr-sm-2"  required=""id="product_count" name="product_count">
                        </div>  
                        <div class="form-group">
                            <label>location</label>
                            <input type="text" class="form-control" required=""id="product_location" name="product_location">
                        </div>
                        <div class="form-group" >
                            <label>price</label>

                            <input type="number" name="product_price1" class="form-control mb-2 mr-sm-2"  id="product_price1" placeholder="from">
                            <input type="number" name="product_price2" class="form-control mb-2 mr-sm-2"   id="product_price2" placeholder="to">    
                        </div>  
        

                          
                    </div>
                    <div class="modal-footer update">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML delete category-->
    <div id="deleteCategoryModal" class="modal fade" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
            
                    <script>
                        
                    </script>
                    <div class="modal-header">                      
                        <h4 class="modal-title">Delete Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer delete">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
            
            </div>
        </div>
    </div>
        
@endsection