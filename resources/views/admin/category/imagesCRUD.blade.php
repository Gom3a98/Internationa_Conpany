@extends('admin/layouts/category_product')

@section('title')
Image ({{$category_name}}-{{$product_name}})
@endsection


@section('links')

<div class="hint-text">Showing <b>{{sizeof($images)}}</b> out of <b>{{$imagesSize}}</b> entries</div>
<ul class="pagination">
    {{$images->links()}}
</ul>
@endsection


@section('content')
<script>

    //get selected image id
    var Selectedid = -1;
    $(document).on("click", "figure a", function () {
        Selectedid = $(this).attr('id');
    });


    // select image for be main
    $(document).on("click", '.select4Main input', function (event) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: '/admin/image/' + $(this).attr('id'),
            type: 'post',
            data: { 'product_id': {{ $product_id }}, _method: 'put'},
        success: function () {
            window.location = "/admin/image/" + '{{$category_name}}' + "-" + '{{$product_name}}' + "-" + '{{$product_id}}';
        }
        });
        
    });





    var allVals = new Set();
    $(document).on("click", ".delete input", function () {
        allVals.add(Selectedid);
        var arr = Array.from(allVals);
        if ($(this).attr('value') == "Delete" && allVals.size != 0) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/admin/image/' + arr,
                type: 'post',
                data: { 'images_ids': arr, _method: 'delete' },
                success: function (result) {
                    window.location = "/admin/image/" + '{{$category_name}}' + "-" + '{{$product_name}}' + "-" + '{{$product_id}}';
                }
            });
        }
        else if ($(this).attr('value') == "Delete")
            alert("Error happend")

    });



</script>
<!-- base -->

        <div class="mdb-lightbox no-margin">
            @foreach ($images as $image)
            <figure class="col-md-4 shadow p-3 mb-5 bg-white rounded" id="fig" style="width: auto; height: auto; ">
                <span class="radio select4Main">
                    <input type="checkbox" id="{{$image->id}}" name="options[]" {{ ($image->main==1) ? "checked" : "" }}
                    value="{{$image->id}}">
                    <label for="{{$image->id}}"></label>
                </span>
                <a class="black-text" href="#" data-size="1600x1067">
                    <img style="width: 200px; height: 200px;" class="rounded" alt="picture" src="{{asset($image->url)}}"
                        class="img-fluid">
                    <h3 class=" my-3">
                        


                                <a href="#editPath{{$image->id}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteModal"  id="{{$image->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                <h6>{{$image->url}}</h6> 


                                <div id="editPath{{$image->id}}" class="modal fade" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/admin/updatePath/{{$image->id}}" enctype="multipart/form-data" method="get">
                                                @csrf <!-- {{ csrf_field() }} -->
                                                
                                                <div class="modal-header">						
                                                    <h4 class="modal-title">Edit Image Path</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">					
                                                   
                                                    <div class="form-group">
                                                        <label>img URL</label>
                                                        <input type="text" class="form-control updatedName" name="imgURL" value="{{$image->url}}" required="">
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
                    </h3>
                </a>
            </figure>
            @endforeach
        </div>




<!--add images-->


<div id="addModal" class="modal fade in" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/image" enctype="multipart/form-data" method="post">
                {{ csrf_field()}}
                <div class="modal-header">						
                    <h4 class="modal-title">Add Image</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">					
                    <input type="hidden" name="product_id" value="{{$product_id}}">
                    <input type="hidden" name="product_name" value="{{$product_name}}">
                    <input type="hidden" name="category_name" value="{{$category_name}}">
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
@endsection