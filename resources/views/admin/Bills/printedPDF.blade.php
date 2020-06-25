
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--  This file has been downloaded from https://bootdey.com  -->
        <!--  All snippets are MIT license https://bootdey.com/license -->
        <title> فاتورة دفع</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/invoice.css') }}" rel="stylesheet">
    </head>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

<style>
    h4 {
      margin: 2rem 0rem 1rem;
    }

    .table-image {
      td, th {
        vertical-align: middle;
      }
    }
    input{
      border:none;

      text-align : center
    }
    textarea{
      border:none;
    }
</style>
<script>
  $(document).ready(function() {
    $("#save").click(()=>{
      var siz = $("#products_count").val();
      for (var i= 1; i <= parseInt(siz);i++){
        var cells = $("#table tr").eq(i).find("td");
    
        var quantity  = cells.eq(3).find("input").val();
        var price = cells.eq(4).find("input").val();
        var total = parseInt(quantity) * parseInt(price);
        console.log(price);
        cells.eq(5).find(".total").text(total);
      }
      
      alert("is saved");

    });
  })


</script>
    <body>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
        <div class="row">
            <div class="invoice">
            <input type="number" name="products_count" value = "{{sizeof($images_urls)}}" hidden id="products_count">

                <!-- begin invoice-company -->
                <div class="invoice-company text-inverse f-w-600">
                    <span class="pull-right hidden-print">
                    <a href="javascript:;" id="save" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-floppy-o"></i> save</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                    </span>
                    <img width="300" height="75" src="{{ asset('user/logo.png')}}" class="img-fluid img-thumbnail" alt="international company">
                </div>
                <!-- end invoice-company -->
                <!-- begin invoice-header -->
                <div class="invoice-header">
                    <div class="invoice-from">
                    <small>from</small>
                    <address class="m-t-5 m-b-5">
                        <strong class="text-inverse">International Company.</strong><br>
                        Street Address<br>
                        City, Zip Code<br>
                        Phone: (123) 456-7890<br>
                        Fax: (123) 456-7890
                    </address>
                    </div>
                    <div class="invoice-to">
                    <!-- <small>to</small> -->
                    <address class="m-t-5 m-b-5">
                    <large>to: </large><input type="text" name="name" id="name"><br>
                       <large> Phone: </large> <input type="text" name="phone" id="phone"><br>
                       
                    </address>
                    </div>
                    <div class="invoice-date">
                    <small>Invoice /{{date('M')}} period</small>
                    <div class="date text-inverse m-t-5">{{date('m/d/Y')}}</div>
                    كشف حساب

                    <div class="invoice-detail">
                        <img width="120" height="180" src="{{ asset('user/images/ABOUTv.png')}}" class="img-fluid img-thumbnail" alt="international company">

                    </div>

                    </div>
                </div>
                <!-- end invoice-header -->
                <!-- begin invoice-content -->
                <div class="invoice-content">
                    <!-- begin table-responsive -->
                    <div class="table-responsive" >
                    <table class="table table-invoice table-bordered" id="table">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center" width="5%">{{trans('priceReport.iterator')}}</th>
                            <th scope="col" class="text-center" width="30%">{{trans('priceReport.product_name')}}</th>
                            <th scope="col" class="text-center" width="20%">{{trans('priceReport.product_description')}}</th>
                            <th scope="col" class="text-center" width="10%">{{trans('priceReport.img')}}</th>
                            <th scope="col" class="text-center" width="5%">{{trans('priceReport.count')}}</th>
                            <th scope="col" class="text-center" width="5%">{{trans('priceReport.price')}}</th>
                            <th scope="col" class="text-center" width="10%">{{trans('priceReport.total')}}</th>
                          </tr>
                        </thead>
                        @for ($i = 0; $i < sizeof($images_urls); $i++)
                        <tbody>
                            <tr>
                                <th width="5%" scope="row">{{$i+1}}</th>
                                <td class="text-center" width="30%">
                                    <span class="text-inverse"><b>{{$products[$i]->name}}</b></span><br>
                                </td>
                                <td class="text-center" width="20%">
                                    <textarea name="description" id="description +{{$products[$i]->id}}" cols="15" rows="7" value="{{$products[$i]->description}}">{{$products[$i]->description}}</textarea>
                                </td>
                                @if($images_urls[$i]!="Not_Found")
                                <td width="10%">
                                    <img src="{{asset($images_urls[$i])}}" width = "200" hieght = "250" alt="{{$products[$i]->name}}">
                                </td>
                                @else
                                <td width="10%">
                                    <div class="fail">No Image To Preview</div>
                                </td>
                                @endif
                                <td class="text-center" width="5%"><input type="text" name="count" value="{{$products[$i]->count}}"></td>
                                <td class="text-center" width="5%"><input type="text" name="price" value="{{$products[$i]->price}}"></td>

                                <td class="text-center"width="15%"><div class="total">{{$products[$i]->count*$products[$i]->price}}</div></td>
                            </tr>
                        </tbody>
                        @endfor
                    </table>
                    </div>
                    <!-- end invoice-price -->
                </div>
                <!-- end invoice-content -->
                <!-- begin invoice-note -->

                <div class="invoice-note">
                  <div dir="rtl">
                      * ضمان 6 اشهر </br>
                      * ضمان مدة عام واحد ضد عيوب الصناعة</br>
                      * بعد مدة الضمان تتوافر جميع قطع الغيار بمقابل مادى<br>
                  </div>
                    * The warranty period is 6 months<br>
                    * One year warranty against manufacturing defects<br>
                    * The Warranty does not cover consumables or parts of limited regular functionality due to their natural wear and tear.<br>
                    * After the period of warranty the  spare parts are available for In exchange for money.<br>
                  
               </div>

                <!-- end invoice-note -->
                <!-- begin invoice-footer -->
                <div class="invoice-footer">
                    <p class="text-center m-b-5 f-w-600">
                    THANK YOU FOR YOUR BUSINESS
                    </p>
                    <p class="text-center">
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
                    </p>
                </div>
                <!-- end invoice-footer -->
            </div>
        </div>
        </div>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>

