$(document).ready(function(){
    $(document).on("click","#pm_confirm_ok, #review_info_ok",function(){
        var htmlID = $(this).attr('id');
        var tid    = $("input[name=tid]").val();
        var url    = "http://localhost/CID/reviewProcess/";
        /*var remaining         = $('#remaining').text().charAt(23);
        var remainingInt      = parseInt(remaining);
        remainingInt++;
        var fullRemainingText = $('#remaining').text();
        fullRemainingText     = setCharAt(fullRemainingText,23,remainingInt);*/
        $.post(
            url, 
            {textid: tid, updateData: htmlID}, 
            function(result){
                if(result.summaryInfo=="none"){
                    window.location.href = "http://localhost/CID/dissemination/";
                }else if(result.summaryInfo == "notfinished"){
                    if(htmlID == "pm_confirm_ok"){
                        $('.decission').html("<h4>YES</h4>");
                    }else{
                        $('.decission2').html("<h4>YES</h4>");
                    }
                }else{
                    $("#pm-title").html("<b>"+result.pmname+"</b>");
                    $("#summary").text(result.summaryInfo);
                    $("#src_eval").text(result.src_eval);
                    $("#inf_int_eval").text(result.inf_int_eval);
                    $("#code").text(result.codeInfo);
                    $("#instruction").text(result.instruction);
                    $("input[name=tid]").val(result.txtID);
                    $('.decission').html('<button type="button" id="pm_confirm_ok" class="btn btn-default"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    $('.decission2').html('&nbsp;&nbsp;<button type="button" id="review_info_ok" class="btn btn-default"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    //$("#remaining").text(fullRemainingText);
                }
            }, "json"
        );
    });

    function setCharAt(str,index,chr) {
        if(index > str.length-1) return str;
        return str.substr(0,index) + chr + str.substr(index+1);
    }

    $(document).on({
        ajaxStart: function() { $(".loader").show(); },
        ajaxStop: function() { $(".loader").hide(); }    
    });
});