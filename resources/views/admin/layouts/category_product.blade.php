@extends('admin.layouts.app')
@section('body')



<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>@yield('title') </b></h2>
                    </div>

                    <div class="col-sm-6">
                        <a href="#addModal" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i><span>Add New
                                @yield('title')</span></a>
                        <a href="#addExcel" class="btn btn-success" data-toggle="modal"><span>import excel
                            </span></a>

                        <a href="#salesBillModal" class="btn btn-success" data-toggle="modal"><span>Price View
                            </span></a>
                        <a href="#deleteModal" class="btn btn-danger" data-toggle="modal"><i
                                class="material-icons">&#xE15C;</i><span>Delete</span></a>
                    </div>
                </div>
            </div>
            <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ session()->get('success') }}
            </div>
            @endif



            <table class="table table-striped table-hover results">
                <thead>

                    <tr>

                        @yield('table_title')
                    </tr>
                    <tr class="warning no-result">
                        <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                    </tr>
                </thead>
                <tbody>
                    @yield('content')
                </tbody>
            </table>
            <div class="clearfix">
                @yield('links')
            </div>
        </div>

    </div>
</div>

@endsection


<!-- Delete Modal HTML delete cat-prod-img-->
<div id="deleteModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <script>

            </script>
            <div class="modal-header">
                <h4 class="modal-title">Delete @yield('title')</h4>
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


