<!--  عرض سعر  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--  This file has been downloaded from https://bootdey.com  -->
        <!--  All snippets are MIT license https://bootdey.com/license -->
        <title> عرض سعر بصورة</title>
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

      border-color: transparent;
      background: transparent;
    }
    textarea{
      border:none;
      border-color: transparent;
      background: transparent;
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
                    {{-- <span class="pull-right hidden-print">
                    <a href="javascript:;" id="save" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-floppy-o"></i> save</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                    </span>
                    <a href="#"><img width="300" height="75" src="{{ asset('user/logo.png')}}" class="img-fluid img-thumbnail" alt="international company"></a> --}}
                    
                </div>
                <!-- end invoice-company -->
                <!-- begin invoice-header -->
                <div class="invoice-header">
                    <div class="invoice-from">
                    <small>from</small>
                    <address class="m-t-5 m-b-5">
                      <strong class="text-inverse">
                         <input type="text" value="Al Nabil Equipment">
                         </strong><br>
                      سلم مصر للطيران من دائرى المنيب<br>
                      Harm, Giza<br>
                      Phone: <input type="text" value="01110253191"><br>
    
                  </address>
                    </div>
                    <div class="invoice-to">
                    <!-- <small>to</small> -->
                    <address class="m-t-5 m-b-5">
                    <large>to: </large><input type="text" style="text-align: left" name="name" id="name" value="Mr/Mrs "><br>
                       <large> Phone: </large> <input type="text" style="text-align: left" name="phone" id="phone" value="+20 "><br>
                       
                    </address>
                    </div>
                    <div class="invoice-date">
                    <small>Invoice /{{date('M')}} period</small>
                    <div class="date text-inverse m-t-5">{{date('m/d/Y')}}</div>
                    عرض سعر

                    {{-- <div class="invoice-detail">
                        <img width="120" height="180" src="{{ asset('user/images/headLogo.png')}}" class="img-fluid img-thumbnail" alt="international company">

                    </div> --}}

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
                            {{-- <th scope="col" class="text-center" width="20%">{{trans('priceReport.product_description')}}</th> --}}
                            <th scope="col" class="text-center" width="10%">{{trans('priceReport.img')}}</th>
                            <th scope="col" class="text-center" width="5%">{{trans('priceReport.count')}}</th>
                            <th scope="col" class="text-center" width="5%">سعر الوحدة</th>
                            <th scope="col" class="text-center" width="10%">{{trans('priceReport.total')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                        @for ($i = 0; $i < sizeof($images_urls); $i++)
                            <tr>

                                <th width="5%" scope="row">{{$i+1}}</th>
                                <td class="text-center" width="30%">
                                    <span class="text-inverse"><b><a href="/Preview/{{$products[$i]->id}}">{{$products[$i]->name}}</a></b></span><br>
                                    <textarea style="text-align: right" name="description" id="description +{{$products[$i]->id}}" cols="30" value="{{$products[$i]->description}}">{{$products[$i]->description}}</textarea>
                                </td>
                                {{-- <td class="text-center" width="20%">
                                   
                                </td> --}}

                                @if($images_urls[$i]!="Not_Found")

                                <td width="10%">
                                  
                                    <img src="{{asset($images_urls[$i])}}" width = "300" hieght = "150" alt="{{$products[$i]->name}}">
                                </td>
                                @else
                                <td width="10%">
                                    <div class="fail">
                                      <textarea name="" id="" cols="30"> No Image To Preview</textarea>
                                    </div>
                                </td>
                                @endif 
                                
                                <td class="text-center" width="3%"><textarea type="text" name="count" cols="5">  {{$products[$i]->count}}</textarea></td>
                                
                                <td class="text-center" width="5%"><textarea type="text" name="price"cols="10" > {{number_format($products[$i]->price,2)}} </textarea></td>
                                <td class="text-center" ><textarea cols="10" class="total">{{number_format($products[$i]->count*$products[$i]->price,2)}}</textarea></td>
                            </tr>
                        
                        @endfor
                      </tbody>
                    </table>
                    </div>
                    <!-- end invoice-price -->
                </div>
                <!-- end invoice-content -->
                <!-- begin invoice-note -->

                <div class="invoice-note">
                  {{-- <div dir="rtl" style="text-align: right">
                      * ضمان 6 شهور ضد عيوب الصناعة</br>
                      * بعد مدة الضمان تتوافر جميع قطع الغيار بمقابل مادى<br>
                  </div>
                    * The warranty period is 6 months<br>
                    * One year warranty against manufacturing defects<br>
                    * The Warranty does not cover consumables or parts of limited regular functionality due to their natural wear and tear.<br>
                    * After the period of warranty the  spare parts are available for In exchange for money.<br>
                   --}}
               </div>

                <!-- end invoice-note -->
                <!-- begin invoice-footer -->
                <div class="invoice-footer">
                    <p class="text-center m-b-5 f-w-600">
                    THANK YOU FOR YOUR BUSINESS
                    </p>
                    {{-- <p class="text-center">
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
                    </p> --}}
                </div>
                <!-- end invoice-footer -->
            </div>
        </div>
        </div>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>

