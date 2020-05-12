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
<th>Actions</th> 

@endsection
@section('title')
    Category
@endsection
@section('links')
    <div class="hint-text">Showing <b>{{sizeof($categories)}}</b> out of <b>{{$categoriesSize}}</b> entries</div>
    <ul class="pagination">
        {{$categories->links()}} 
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
function updateTextArea() { //record are selected
     $('.selected4Deleted :checked').each(function() {
       allVals.add($(this).val());
     });
  }
// for update record
$(document).on("click", ".update input", function () {
    var updatedName = $(".updatedName").val();
    if($(this).attr('value')=="Save"&&Selectedid!=-1)
        {
         $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/admin/category/'+Selectedid,
            type: 'post',
            data: {'category_name':updatedName,_method: 'put'},
            success: function() {
                window.location="/admin/category";
            },
        });

        }

        
});
</script>
<!--basic form -->

        @foreach ($categories as $category)
            <tr>
                <td>
                    <span class="custom-checkbox selected4Deleted">
                        <input type="checkbox" id="{{$category->id}}" name="options[]" value="{{$category->id}}">
                    <label for="{{$category->id}}"></label>
                    </span>
                </td>
                <td>{{$category->id}} </td>
                <td> {{$category->name}}</td>
                
                <td>
                    <a href="/admin/product/{{$category->id}}" id="{{$category->id}}" class="view" ><img style="width: 20px ; height: 20px;"src="https://img.icons8.com/doodle/48/000000/read.png"/></a>
                    <a href="#editCategoryModal" id="{{$category->id}}" class="edit" data-toggle="modal"><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/color/48/000000/approve-and-update.png"/></a>
                    <a href="#deleteCategoryModal" id="{{$category->id}}" class="delete" data-toggle="modal"><img style="width: 20px ; height: 20px;" src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a>
                    
                
                </td>
            </tr>
            @endforeach
            </tbody>
    </table>

    </div>
</div>
<!-- Edit Modal HTML add category-->
<div id="addCategoryModal" class="modal fade in" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/category/create" method="get">
                <div class="modal-header">						
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required="" name="category_name">
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
<div id="editCategoryModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">						
                    <h4 class="modal-title">Edit category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control updatedName" required="">
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
