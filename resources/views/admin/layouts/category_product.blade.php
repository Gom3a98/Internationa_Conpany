<!DOCTYPE html>
<html lang="en">

<head>
    <!-- https://codepen.io/lauraMM/pen/pZoeZG -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/searchAdmin.js') }}"></script>
    <link href="{{ asset('css/searchAdmin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/category_product.css') }}" rel="stylesheet">
    <script>
        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
    </script>
</head>

<body>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>@yield('title')</b></h2>
                </div>

                <div class="col-sm-6">
                    <a href="#addModal" class="btn btn-success" data-toggle="modal"><img
                            style="width: 30px;height: 30px;"
                            src="https://img.icons8.com/plasticine/100/000000/create-new.png" /><span>Add New
                            @yield('title')</span></a>
                    <a href="#salesBillModal" class="btn btn-success" data-toggle="modal"><img
                            style="width: 30px;height: 30px;"
                            src="https://img.icons8.com/bubbles/50/000000/create-new.png" /><span>Sales(Bill-Offer)
                        </span></a>
                    <a href="#deleteModal" class="btn btn-danger" data-toggle="modal"><img
                            style="width: 30px;height: 30px;"
                            src="https://img.icons8.com/bubbles/50/000000/delete-sign.png" /><span>Delete</span></a>
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
       
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>


                @foreach($errors->all() as $error)
                {{ $error }}<br />
                @endforeach
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


</body>
</html>





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



    &:before,
    input,
    label {
        cursor: pointer !important;
    }

    /* File upload button */
    &:before {

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

    &:hover,
    &:focus {
        &:before {
            color: #333333;
            background-color: #e6e6e6;
            color: #333333;
            text-decoration: none;
            background-position: 0 -15px;
            transition: background-position 0.2s ease-out;
        }
    }
</style>