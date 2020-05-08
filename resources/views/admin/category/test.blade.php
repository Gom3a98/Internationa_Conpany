<!DOCTYPE html>
<html lang="en">
    <head>
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
    
</head>
<body>
    <div class="form-group pull-right">
        <input type="text" class="search form-control" placeholder="What you looking for?">
    </div>
    <span class="counter pull-right"></span>
   
    <table class="table table-hover table-bordered results">
      <thead>
        <tr>
          
          <th class="col-md-5 col-xs-5">Name</th>
          <th class="col-md-4 col-xs-4">Job</th>
          <th class="col-md-3 col-xs-3">City</th>
        </tr>
        <tr class="warning no-result">
          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>hi</td>
          <td>amr</td>
          <td>fahmy</td>
        </tr>
        <tr>
            <td>man</td>
            <td>ahmed</td>
            <td>fahmy</td>
        </tr>
        <tr>
          <td>Egemen Özbeyli</td>
          <td>Purchasing</td>
          <td>Kocaeli</td>
        </tr>
        @foreach ($categories as $category)
        
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->id}}</td>
          </tr>
    @endforeach
        
      </tbody>
    </table>
</body>
</html>

<style>
 body{
  padding:20px 20px;
}

.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}
</style>

<script>
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
</script>