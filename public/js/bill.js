$("#pp").change(function(){
    var name = $(this).children("option:selected").text();
    var id  = $(this).children("option:selected").val();
    alert("You have selected the product - " + id);
    $("#exam_list").val(current+" | "+selectedEXam);
    $("#exam_listIds").val(currentIndex+"|"+selectedExamId);
})