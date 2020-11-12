@extends('admin/layouts/category_product')

@section('table_title')
    <th>
        <span class="custom-checkbox">
            <input type="checkbox" id="selectAll">
            <label for="selectAll"></label>
        </span>
    </th>
    <th>id</th>
    <th>Name</th>
    <th>Money</th>
    <th>Reason</th>
    <th>User Name</th>
    <th>Date</th>
    <th>input Date</th>
    <th>Valid</th>
    <th>Actions</th>
@endsection


@section('title') Employee Details @endsection


@section('links')
    <div class="hint-text">Showing <b>{{sizeof($actions)}}</b> out of <b>{{$actionsSize}}</b> entries</div>
    <ul class="pagination">
        {{$actions->links()}}
    </ul>
@endsection


@section('content')

<script>



    // select all button for records
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


    // put the id of selected rows
    var Selectedid = -1;
    $(document).on("click", ".table a", function () {
        Selectedid = $(this).attr('id');
    });


    $(document).on("click", ".delete input", function () {

        selectedRecord();//if select delete for one record will delete it only {if dont need that swap if and elseif}
        if (Selectedid != -1) {
            allVals.clear();//to remove if another selected data
            allVals.add(Selectedid);
        }
        var arr = Array.from(allVals);
        if ($(this).attr('value') == "Delete" && allVals.size != 0) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/admin/tracking/' + arr,
                type: 'post',
                data: { 'actions_ids': arr, _method: 'delete' },
                success: function (result) {
                    window.location = "/admin/tracking";
                }
            });
        }
        else if ($(this).attr('value') == "Delete")
            alert("no selected record for Delete")

    });



    var allVals = new Set();
    // record are selected by check box put in allVals 
    function selectedRecord() {
        $('.selected4Deleted :checked').each(function () {
            allVals.add($(this).val());
        });
    }


    // for update record
    $(document).on("click", ".update input", function () {
        var updatedName = $(".updatedName").val();
        if ($(this).attr('value') == "Save" && Selectedid != -1) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/admin/tracking/' + Selectedid,
                type: 'post',
                data: { 'money': updatedName, _method: 'put' },
                success: function () {
                    window.location = "/admin/tracking";
                },
            });

        }


    });
</script>
<!--basic form -->

@foreach ($actions as $action)
    <tr>
        <td>
            <span class="custom-checkbox selected4Deleted">
                <input type="checkbox" id="{{$action->id}}" name="options[]" value="{{$action->id}}">
                <label for="{{$action->id}}"></label>
            </span>
        </td>
        <td>{{$action->id}} </td>
        <td>{{$action->employee_name}}</td>
        <td>{{number_format($action->money,2)}}</td>
        <td>{{$action->reason}}</td>
        <td>{{$action->user_name}}</td>
        <td>{{$action->date}}</td>
        <td>{{$action->created_at}}</td>
        <td>{{$action->valid}}</td>
        <td>
            <a href="#editCategoryModal" id="{{$action->id}}" class="edit" data-toggle="modal"><img
                    style="width: 20px ; height: 20px;"
                    src="https://img.icons8.com/color/48/000000/approve-and-update.png" /></a>
            <a href="#deleteModal" id="{{$action->id}}" class="delete" data-toggle="modal"><img
                    style="width: 20px ; height: 20px;"
                    src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png" /></a>
        </td>
    </tr>
@endforeach


{{-- all modaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaal --}}
<!-- Edit Modal HTML add Details-->
<div id="addModal" class="modal fade in" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/tracking/create" method="get">
                <div class="modal-header">
                    <h4 class="modal-title">Add Action</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">

                        <div class="col-auto my-1 form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Employee Name</label>
                            <select class="custom-select mr-sm-2" name="employee_name" id="inlineFormCustomSelect">
                                {{-- <option selected>Choose...</option> --}}
                                <option value="Stock">Stock</option>
                                <option value="Tamer">Tamer</option>
                                <option value="Fathi">Fathi</option>
                                <option value="Ahmed Nabil">Ahmed Nabil</option>
                                <option value="Mohamed Nabil">Mohamed Nabil</option>
                                <option value="Mohamed Ali">Mohamed Ali</option>
                                <option value="Amr Fahmy">Amr Fahmy</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Money</label>
                        <input type="number" class="form-control" required="" name="money">
                    </div>
                    <div class="form-group">
                        <label>Reason</label>
                        <textarea class="form-control" required="" name="reason" rows="4" cols="50"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" id="date" min="2020-11-01" max="2025-12-31" class="form-control" required=""
                            name="date">
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
                <h4 class="modal-title">Edit Employee Action</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>


            <div class="modal-body">
                <div class="form-group">
                    <label>Money</label>
                    <input type="number" class="form-control updatedName" required="">
                </div>
            </div>



            <div class="modal-footer update">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </div>
    </div>
</div>


@endsection
