@extends('category/layouts/temp')

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
    $(document).on("click", ".table a", function () {
        
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
        $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: 'product/'+Selectedid,
                type: 'get',
                
                success: function(result) {
                    //$("#product_name").val(result.name);
                    $(document).ready(function () {
                        $('#editProductModal #product_name').val(result[0].name);
                        $('#editProductModal #product_description').val(result[0].description);
                        $('#editProductModal #product_count').val(result[0].count);
                        $('#editProductModal #product_location').val(result[0].location);
                        $('#editProductModal #product_status').val(0);
                        $('#editProductModal #category_id').val(result[0].category_id);
                        $('#editProductModal #product_price1').val(result[0].price.split("-")[0]);
                        $('#editProductModal #product_price2').val(result[0].price.split("-")[1]);
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
                        <a href="#editProductModal" id="{{$product->id}}" class="edit" data-toggle="modal"><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/color/48/000000/approve-and-update.png"/></a>
                        <a href="#deleteCategoryModal" id="{{$product->id}}" class="delete" data-toggle="modal"><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a>
                        <a href="/image/{{$product->category_name}}-{{$product->name}}-{{$product->id}}" id="{{$product->id}}" class="view" ><img style="width: 20px ; height: 20px;"src="https://img.icons8.com/doodle/48/000000/read.png"/></a>
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
                <form action="product" enctype="multipart/form-data" method="post">
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
                            @foreach ($allCategory as $category)
                                
                            
                              <option selected>Choose...</option>
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            <input type="hidden" name="category_name" value="{{$category->name}}">
                            @endforeach
                
                            </select>
                          </div>

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
                            @foreach ($allCategory as $category)
                                
                            
                              <option selected>Choose...</option>
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            <input type="hidden" name="category_name" value="{{$category->name}}">
                            @endforeach
                
                            </select>
                          </div>

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
<!--for menu
<style> 
.custom-select {
display: inline-block;
width: 100%;
height: calc(2.25rem + 5px);
padding: .375rem 1.75rem .375rem .75rem;
line-height: 1.5;
color: #495057;
vertical-align: middle;
background: #fff url(data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E) no-repeat right .75rem center;
background-size: 8px 10px;
border: 1px solid #ced4da;
border-radius: .25rem;
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
}
input[type=file] {
    display: block !important;
    right: 1px;
    top: 1px;
    height: 34px;
    opacity: 0;
  width: 100%;
    background: none;
    position: absolute;
  overflow: hidden;
  z-index: 2;
}

.control-fileupload {
    display: block;
    border: 1px solid #d6d7d6;
    background: #FFF;
    border-radius: 4px;
    width: 100%;
    height: 36px;
    line-height: 36px;
    padding: 0px 10px 2px 10px;
  overflow: hidden;
  position: relative;
  
  &:before, input, label {
    cursor: pointer !important;
  }
  /* File upload button */
  &:before {
    /* inherit from boostrap btn styles */
    padding: 4px 12px;
    margin-bottom: 0;
    font-size: 14px;
    line-height: 20px;
    color: #333333;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
    cursor: pointer;
    background-color: #f5f5f5;
    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border: 1px solid #cccccc;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-bottom-color: #b3b3b3;
    border-radius: 4px;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    transition: color 0.2s ease;

    /* add more custom styles*/
    content: 'Browse';
    display: block;
    position: absolute;
    z-index: 1;
    top: 2px;
    right: 2px;
    line-height: 20px;
    text-align: center;
  }
  &:hover, &:focus {
    &:before {
      color: #333333;
      background-color: #e6e6e6;
      color: #333333;
      text-decoration: none;
      background-position: 0 -15px;
      transition: background-position 0.2s ease-out;
    }
  }
  
  label {
    line-height: 24px;
    color: #999999;
    font-size: 14px;
    font-weight: normal;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    position: relative;
    z-index: 1;
    margin-right: 90px;
    margin-bottom: 0px;
    cursor: text;
  }
}
</style>
-->
