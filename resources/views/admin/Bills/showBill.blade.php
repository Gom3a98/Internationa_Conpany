
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
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            International Company.
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
               <small>to</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">{{$bill->customer_name}}</strong><br>
                  Phone: {{$bill->phone_number}}<br>
               </address>
            </div>
            <div class="invoice-date">
               <small>Invoice /{{$bill->created_at->format('M')}} period</small>
               <div class="date text-inverse m-t-5">{{$bill->created_at->format('m/d/Y')}}</div>

               <div class="invoice-detail">
                        <img width="100" height="150" src="{{ asset('user/images/headLogo.png')}}" class="img-fluid img-thumbnail" alt="international company">

                    </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>اسم المنتج</th>
                        <th class="text-center" width="20%">الكمية</th>
                        <th class="text-center" width="20%">سعر الواحدة الاصلي</th>
                        <th class="text-center" width="20%">سعر الواحدة</th>
                        <th class="text-center" width="20%">السعر الكلي</th>
                     </tr>
                  </thead>
                  @for ($i = 0; $i < sizeof($products); $i++)
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">{{$products[$i]->name}}</span><br>
                        </td>
                        <td class="text-center" width="20%">{{$sales[$i]->product_count}}</td>
                        <td width="20%" class="text-center"> 
                           <strike>{{number_format($products[$i]->price,2)}} L.E</strike>
                        </td>
                        <td class="text-center" width="20%">{{number_format($sales[$i]->price,2)}} L.E</td>
                        <td class="text-center"width="20%">{{number_format($sales[$i]->product_count* $sales[$i]->price,2)}} L.E</td>
                     </tr>
                  </tbody>
                  @endfor
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>السعر الاصلي</small>
                        <span class="text-inverse">{{number_format($actual_price,2)}} L.E</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-minus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>خصم ({{$discount_precentage}}%)</small>
                        <span class="text-inverse">{{number_format($discount_qantity,2)}} L.E</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-minus text-muted"></i>
                     </div>
                     <div class="sub-price">
                         <small>خصم فاتورة</small>
                        <span class="text-inverse"> {{number_format($bill->discount,2)}} L.E</span>
                     </div>
                  </div>
               </div>
               <div class="invoice-price-right">
                   
                  <small>المجموع( <strike>{{number_format($actual_price,2)}} L.E</strike>)</small> <span class="f-w-600">{{number_format($bill->total_price,2)}} L.E</span>
               </div>
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
<script type="text/javascript">
	
</script>
</body>
</html>

