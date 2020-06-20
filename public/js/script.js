jQuery(document).ready(function(){

    jQuery('button#dateBtn').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': 'oJgVj1xFf3599fDG1PI8KT1Ls2GnIbMU7aeEcwzV'//$('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/reservation/hours",
            method: 'post',
            data: {
                day: jQuery('#dates').val(),
            },
            success: function(result){
                if (result.success)
                {
                    let availableHours = result.success;
                    function suc(obj) {
                        let create = '<br>';
                        create +="<select class=\"form-control\" name='hours'>";
                        for (let i = 0; i < obj.length; i++) {
                            create+='<option value ="'+obj[i]+'">'+obj[i]+'</optoin>'
                        }
                        create+='</select>';
                        create+=' <button type="submit" name="day" id="reserveBtn" class="btn btn-primary btn-block mt-4" value="'+result.day+'">حجز</button>';
                        if($('#availableHours').children().length<1)
                            jQuery('#availableHours').append(create);
                    }
                    suc(availableHours);

                }
                else
                    alert(result.failed);
            }});
    });
});
