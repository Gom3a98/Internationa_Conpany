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
{{-- <th>Count</th> --}}
<th>Price</th>
<th>Price 14%</th>
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
    $(document).on("click", '#selectAll', function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function () {
                this.checked = false;
            });
        }
    });


    //put the id of selected row in selected id and
    var Selectedid = -1;
    $(document).on("click", "table a", function () {
        Selectedid = $(this).attr('id');
        updatRecordeData();//to put the data in field of selected record
    });


    var allVals = new Set();
    function selectedRecord() { //record are selected
        $('.selected4Deleted :checked').each(function () {
            allVals.add($(this).val());
        });
    }


    //delete record
    $(document).on("click", ".delete input", function () {
        selectedRecord();//get all selected record
        //if select delete for one record will delete it only {if dont need that swap if and elseif}
        if (Selectedid != -1) {
            allVals.clear();//to remove if another selected data
            allVals.add(Selectedid);
        }
        var arr = Array.from(allVals);
        if ($(this).attr('value') == "Delete" && allVals.size != 0) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/admin/product/' + arr,
                type: 'delete',
                data: { 'category_ids': arr, _method: 'delete' },
                success: function (result) {
                    location.reload();
                }
            });
        }
        else if ($(this).attr('value') == "Delete")
            alert("no selected record for Delete")

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
    <td> <a href="/admin/image/{{$product->category_name}}-{{$product->name}}-{{$product->id}}" id="{{$product->id}}"
            class="view">{{$product->name}} </a></td>
    <td> {{$product->category_name}}</td>
    <td> {!! nl2br(e("$product->description")) !!}</td>
    <td>{{number_format($product->from_price,2)}} </td>
    <td>{{number_format($product->price,2)}}</td>
    <td>
        <a href="#editProductModal{{$product->id}}" id="{{$product->id}}" class="edit" data-toggle="modal"><i
                class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
        <a href="#deleteModal" id="{{$product->id}}" class="delete" data-toggle="modal"><i class="material-icons"
                data-toggle="tooltip" title="Delete">&#xE872;</i></a>


        <div id="editProductModal{{$product->id}}" class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="/admin/product/{{$product->id}}" method="post">
                        <div class="modal-body">

                            @csrf
                            <!-- {{ csrf_field() }} -->
                            <input type="hidden" name="_method" value="put" />
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{$product->name}}" required=""
                                    id="product_name" name="product_name">
                            </div>

                            <div class="col-auto my-1 form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                                <select class="form-control custom-select mr-sm-2" id="category_id" name="category_id"
                                    id="inlineFormCustomSelect">
                                    <option value="{{$product->category_id}}" selected>{{$product->category_name}}
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="10" class="form-control" required="" id="product_description"
                                    name="product_description">{{$product->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>count</label>
                                <input type="number" min="0" class="form-control mb-2 mr-sm-2"
                                    value="{{$product->count}}" required="" id="product_count" name="product_count">
                            </div>

                            <div class="form-group">
                                <label>price</label><br>
                                <input type="number" min="0" style="width: 45%" name="product_price1"
                                    id="product_price1" placeholder="without 14%" value="{{$product->from_price}}"> -
                                <input type="number" min="0" style="width: 45%" name="product_price2"
                                    id="product_price2" placeholder="after 14%" value="{{$product->price}}">

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
                        <select class="form-control custom-select mr-sm-2" name="category_id"
                            id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            @foreach ($allCategory as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <input type="hidden" name="category_name" value="{{$category->name}}">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="product_description" rows="4" cols="50"></textarea>

                    </div>

                    <div class="form-group">
                        <label>count</label>
                        <input type="number" value="1" min="0" class="form-control" required="" name="product_count">
                    </div>

                    <div class="form-group">
                        <label>price</label><br>
                        <input type="number" min="0" required="" style="width: 45%" name="product_price1"
                            id="product_price1" placeholder="without 14%"> -
                        <input type="number" min="0" required="" style="width: 45%" name="product_price2"
                            id="product_price2" placeholder="after 14%">
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-10">
                            <span class="control-fileupload">
                                <label for="file1" class="text-left">Please choose a files on your computer.</label>
                                <input type="file" class="form-control custom-select mr-sm-2" name="product_images[]"
                                    id="file1" multiple>
                            </span>
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

<!-- view Price-->
<div id="salesBillModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <script>

            </script>
            <div class="modal-header">
                <h4 class="modal-title">Make sales </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Set your Prop</p>
                <input type="checkbox" name="image" id="image">
                <label for="image">attached image</label>
                <br>
                <input type="checkbox" name="tax" id="tax">
                <label for="tax">tax 14%</label>
                <br>
                <input type="checkbox" name="noDescription" id="noDescription">
                <label for="noDescription">No Description</label>
                <br>
                {{-- <input type="checkbox" name="tax" id="tax">
                <label for="tax">tax 14%</label>
                --}}


            </div>
            <div class="modal-footer Bill">
                {{-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"> --}}

                <input type="submit" class="btn btn-success" value="Price View">

            </div>

        </div>
    </div>
</div>



<div id="addExcel" class="modal fade in" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/excel" enctype="multipart/form-data" method="post">
                {{ csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Import product by Excel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">


                    <div class="col-auto my-1 form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                        <select class="form-control custom-select mr-sm-2" name="category_id"
                            id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            @foreach ($allCategory as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>add  price </label>
                        <input type="text" class="form-control" required="" name="addPrice">
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-10">
                            <span class="control-fileupload">
                                <label for="file1" class="text-left">Please choose a files on your computer.</label>
                                <input type="file" class="form-control custom-select mr-sm-2" name="excel"
                                    id="file1" >
                            </span>
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
@endsection