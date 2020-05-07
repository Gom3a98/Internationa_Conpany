
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
                  فاتورة دفع
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
                           <strike>{{$products[$i]->price}} L.E</strike>
                        </td>
                        <td class="text-center" width="20%">{{$sales[$i]->price}} L.E</td>
                        <td class="text-center"width="20%">{{$sales[$i]->product_count* $sales[$i]->price}} L.E</td>
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
                        <span class="text-inverse">{{$actual_price}} L.E</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-minus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>خصم ({{$discount_precentage}}%)</small>
                        <span class="text-inverse">{{$discount_qantity}} L.E</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-minus text-muted"></i>
                     </div>
                     <div class="sub-price">
                         <small>خصم فاتورة</small>
                        <span class="text-inverse"> {{$bill->discount}} L.E</span>
                     </div>
                  </div>
               </div>
               <div class="invoice-price-right">
                   
                  <small>المجموع( <strike>{{$actual_price}} L.E</strike>)</small> <span class="f-w-600">{{$bill->total_price}} L.E</span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
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

