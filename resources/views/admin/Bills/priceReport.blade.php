



























































{{-- <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    h4 {
      margin: 2rem 0rem 1rem;
    }

    .table-image {
      td, th {
        vertical-align: middle;
      }
    }
</style>
<script>
 function testPdf(){
  var pdf = new jsPDF('p', 'pt', 'word');
 //send the div to PDF
 specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '#bypassme': function(element, renderer) {
      // true = "handled elsewhere, bypass text extraction"
      return true
    }
  };
  margins = {
    top: 80,
    bottom: 60,
    left: 40,
    width: 522
  };
 source = $('#card_to_print').html();
 console.log(source)
 alert("jbjvnj")
 pdf.fromHTML(
    source, // HTML string or DOM elem ref.

    function(dispose) {
      // dispose: object with X, Y of the last line add to the PDF 
      //          this allow the insertion of new lines after html
      pdf.save('Test.pdf');
    });
}
       $(document).ready(function() {
          $("#save").click(()=>{
            var siz = $("#products_count").val();
            for (var i= 1; i <= parseInt(siz);i++){
              var cells = $("#table tr").eq(i).find("td");
              var quantity  = cells.eq(2).find("input").val();
              var price = cells.eq(3).find("input").val();
              var total = parseInt(quantity) * parseInt(price);
              cells.eq(4).find(".total").text(total);
            }
            
            alert("is saved");

          });
          // $("#print").click(()=>{

          // })
       })


</script>
@extends('admin.layouts.admin')

@section('Contents')

<div class="conrainer" dir="rtl">
  <div class="card card-primary" id = "card_to_print" >
          <div class="card-header">
              <h3 class="card-title text-center">{{trans('priceReport.page_title')}} </h3>
          </div>
          <div class="card-body" >
          <input type="number" name="products_count" value = "{{sizeof($images_urls)}}" hidden id="products_count">
                  <!-- text input -->
                  <div class="form-group">
                      <label class="float-right">أسم العميل</label>
                      <input type="text" name = "customer_name" id = "customer_name" class="form-control" placeholder="عمرو محمد فهمي ">
                  </div>
                  <div class="form-group">
                      <label class="float-right">رقم الهاتف المحمول</label>
                      <input type="text" id = "phone_number" name = "phone_number" class="form-control" placeholder="0123456789">
                  </div>

                  <div class="form-group">
                      <label class="float-right">خصم الفاتورة</label>
                      <input type="number" id = "discount" name = "discount" class="form-control" placeholder="50 L.E">
                  </div>
                  <div class="info">
                    <table class="table table-image" id="table">
                        <thead>
                          <tr>
                            <th scope="col">{{trans('priceReport.iterator')}}</th>
                            <th scope="col">{{trans('priceReport.img')}}</th>
                            <th scope="col">{{trans('priceReport.product')}}</th>
                            <th scope="col">{{trans('priceReport.count')}}</th>
                            <th scope="col">{{trans('priceReport.price')}}</th>
                            <th scope="col">{{trans('priceReport.total')}}</th>
                          </tr>
                        </thead>
                        @for ($i = 0; $i < sizeof($images_urls); $i++)
                        <tbody>
                            <tr>
                              <th scope="row">{{$i+1}}</th>
                              <td class="w-25">
                                <img src="{{asset($images_urls[$i])}}" class="img-fluid img-thumbnail" alt="{{$products[$i]->name}}">
                              </td>
                              <td>
                                        <h4><b>{{$products[$i]->name}}</b></h4>
                                        <p>{{$products[$i]->description}}</p>
                                  </td>
                              <td><input type="text" name="count" value="{{$products[$i]->count}}"></td>
                              <td><input type="text" name="price" value="{{$products[$i]->price}}"></td>
                              <td><div class="total">{{$products[$i]->count*$products[$i]->price}}</div></td>
                            </tr>
                        </tbody>
                        @endfor
                      </table> 
                  </div>
          </div>
          <div class="card-footer">
                <div class=" row">
                    <button class="btn btn-block btn-outline-primary btn-lg float-right col-5 ml-5" id ="save">{{trans('priceReport.save')}}</button>
                    <button class="btn btn-block btn-outline-primary btn-lg float-left col-5 " onclick = "window.print()" id="print">{{trans('priceReport.print')}}</button>
                </div>
            </div>
  </div>
</div>

@endsection --}}
