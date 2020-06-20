
       $(document).ready(function() {
           $(".search").keyup(function () {
               var searchTerm = $(".search").val();
               var listItem = $('.results tbody').children('tr');
               var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
               console.log(searchSplit);
           $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                   return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
               }
           });
               
           $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
               $(this).attr('visible','false');
           });
   
           $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
               $(this).attr('visible','true');
           });
   
           var jobCount = $('.results tbody tr[visible="true"]').length;
               $('.counter').text(jobCount + ' item');
   
           if(jobCount == '0') {$('.no-result').show();}
               else {$('.no-result').hide();}
                   });
   });
/*
class of table of table: results
button:
<div  class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
</div>

add in table:
<tr class="warning no-result">
    <td colspan="4"><i class="fa fa-warning"></i> No result</td>
</tr>

use:
<script src="{{ asset('js/searchAdmin.js') }}"></script>
<link href="{{ asset('css/searchAdmin.css') }}" rel="stylesheet">
*/

