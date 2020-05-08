@extends('admin/layouts/category_product')
@section('title')
    image  ({{$category_name}}-{{$product_name}})
@endsection
@section('links')

    <div class="hint-text">Showing <b>{{sizeof($images)}}</b> out of <b>{{$imagesSize}}</b> entries</div>
    <ul class="pagination">
        {{$images->links()}} 
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
    $(document).on("click", "figure a", function () {
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
                url: '/image/'+arr,
                type: 'post',
                data: {'images_ids':arr, _method: 'delete'},
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
      $(function () {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
       });
    </script>
<!-- base -->
<div class="row">
    
    <div class="col-md-12">
  
      <div id="mdb-lightbox-ui">
      </div>
  
      <div class="mdb-lightbox no-margin">
    @foreach ($images as $image)
    
        <figure class="col-md-4 shadow p-3 mb-5 bg-white rounded" id="fig"style="width: auto; height: auto; ">
            <span class="custom-checkbox selected4Deleted">
                <input type="checkbox" id="{{$image->id}}" name="options[]" value="{{$image->id}}">
            <label for="{{$image->id}}"></label>
            </span>
          <a class="black-text" href="#"
            data-size="1600x1067">
        <img style="width: 200px; height: 200px;"class="rounded" alt="picture" src="{{$image->url}}"
              class="img-fluid">
            <h3 class="text-center my-3">
                <a href="#deleteCategoryModal" id="{{$image->id}}" class="delete" data-toggle="modal"><img src="https://img.icons8.com/officel/16/000000/delete-sign.png"/></a>
            </h3>
          </a>
        </figure>
    @endforeach
      </div>
  
    </div>
  </div>





<!-- Edit Modal HTML add category-->
<div id="addCategoryModal" class="modal fade in" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/image" enctype="multipart/form-data" method="post">
                {{ csrf_field()}}
                <input type="hidden" name="product_id" value="{{$product_id}}">
                <input type="hidden" name="product_name" value="{{$product_name}}">
                <input type="hidden" name="category_name" value ="{{$category_name}}">
                <div class="modal-header">                      
                    <h4 class="modal-title">Add Image</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">                    
                    <div class="row form-group">
                        <div class="col-sm-10">
                            <span class="control-fileupload">
                              <label for="file1" class="text-left">Please choose a file on your computer.</label>
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
<!-- Delete Modal HTML delete category-->
<div id="deleteCategoryModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           
                <script>
                    
                </script>
                <div class="modal-header">                      
                    <h4 class="modal-title">Delete Image</h4>
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