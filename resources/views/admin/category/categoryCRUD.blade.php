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
<th>Image</th>   
<th>Actions</th> 
@endsection


@section('title') Category @endsection


@section('links')
    <div class="hint-text">Showing <b>{{sizeof($categories)}}</b> out of <b>{{$categoriesSize}}</b> entries</div>
    <ul class="pagination">
        {{$categories->links()}} 
    </ul>
@endsection


@section('content')

<script>
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


// put the id of selected rows
var Selectedid=-1;
$(document).on("click", ".table a", function () {
    Selectedid= $(this).attr('id');
});


$(document).on("click", ".delete input", function () {
    
    selectedRecord();//if select delete for one record will delete it only {if dont need that swap if and elseif}
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
            url: '/admin/category/'+arr,
            type: 'post',
            data: {'category_ids':arr, _method: 'delete'},
            success: function(result) {
                window.location="/admin/category";
            }
        });
        }
    else if($(this).attr('value')=="Delete")
        alert("no selected record for Delete")
        
});



var allVals = new Set();
// record are selected by check box put in allVals 
function selectedRecord() { 
     $('.selected4Deleted :checked').each(function() {
       allVals.add($(this).val());
     });
}


</script>
<!--basic form -->

        @foreach ($categories as $category)
        
            <tr >
                <td>
                    <span class="custom-checkbox selected4Deleted">
                        <input type="checkbox" id="{{$category->id}}" name="options[]" value="{{$category->id}}">
                    <label for="{{$category->id}}"></label>
                    </span>
                </td>
                <td> {{$category->id}}</td>
                <td><a href="/admin/product/{{$category->id}}" id="{{$category->id}}" class="view" >{{$category->name}} </a></td>
                <td>
                <img src="{{asset($category->imgURL)}}" style="width: 100px ; height: 100px;" alt=""></td>
                
                <td>
                    <a href="#editCategory{{$category->id}}" id="{{$category->id}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#deleteModal" id="{{$category->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    
                    
                    
                    <div id="editCategory{{$category->id}}" class="modal fade" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/admin/category/{{$category->id}}" enctype="multipart/form-data" method="post">
                                    @csrf <!-- {{ csrf_field() }} -->
                                    <input type="hidden" name="_method" value="put" />
                                    <div class="modal-header">						
                                        <h4 class="modal-title">Edit category</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">					
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control updatedName" name="product_name" value="{{$category->name}}" required="">
                                            <input type="hidden" name="category_name"value="categories">
                                        </div>	
                                        <div class="form-group">
                                            <label>img URL</label>
                                            <input type="text" class="form-control updatedName" name="imgURL" value="{{$category->imgURL}}" required="">
                                        </div>
                                        <div class="form-group">
                                            <span class="control-fileupload">
                                              <label for="file1"  class="text-left">Please choose a files on your computer.</label>
                                              <input type="file"  class="form-control custom-select mr-sm-2" name="product_images[]" id="file1"multiple>
                                            </span>
                                          </div>					
                                    </div>
                                    <div class="modal-footer update">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn btn-info" value="Save">
                                    </div>
                                </form>
                                    
                            </div>
                        </div>
                    </div>
                
                </td>
            </tr>
        
            @endforeach




{{-- all modaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaal --}}
<!-- add category-->
<div id="addModal" class="modal fade in" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/category" enctype="multipart/form-data" method="post">
                {{ csrf_field()}}
                <div class="modal-header">						
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control updatedName" name="product_name"  required="">
                                            <input type="hidden" name="category_name"value="categories">
                    </div>
                    <div class="col-sm-10">
                        <span class="control-fileupload">
                          <label for="file1"  class="text-left">Please choose a files on your computer.</label>
                          <input type="file" required  class="form-control custom-select mr-sm-2" name="product_images[]" id="file1"multiple>
                        </span>
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


    
@endsection
