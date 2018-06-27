$(document).ready(function(){
    $(document).on("click","#pm_confirm_ok, #review_info_ok",function(){
        var htmlID = $(this).attr('id');
        var tid    = $("input[name=tid]").val();
        var url    = "http://localhost/CID/reviewProcess/";        

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
                    $('.decission').html('<button type="button" id="pm_confirm_ok" class="btn btn-default" style="margin-right: 4px;"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    $('.decission2').html('<button type="button" id="review_info_ok" class="btn btn-default" style="margin-right: 4px;"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    $("#remaining").text(setCharAt($("#remaining").text(),7,result.remainingText));
                    $("#remaining").append('<span class="glyphicon glyphicon-menu-right" style="color: black; margin-left: 14px;"></span>');
                }
            }, "json"
        );
    });

    function setCharAt(str,index,chr) {
        if(index > str.length-1) return str;
        return str.substr(0,index) + chr + str.substr(index+1);
    }

    $("#update_pro_mark").click(function(){
        var id              = $("input[name=tid]").val();
        var protective_mark = $("#updated_hi").val();
        var url             = "http://localhost/CID/update_pro_mark/";        
        $.post(
            url, 
            {protectiveMark: protective_mark, tid: id}, 
            function(result){
                $("#p_mark_name").text(result.name);
            }, "json"
        );
    });

    $("#recheck_pro").click(function(){
        var id  = $("input[name=tid]").val();
        var url = "http://localhost/CID/collectRecheckDataForPro/";
        $.post(
            url, 
            {textID: id}, 
            function(result){
                $("#selected_pm").val(result.protective_id);
            }, "json"
        );
    });

    $(document).on({
        ajaxStart: function() { $(".loader").show(); },
        ajaxStop: function() { $(".loader").hide(); }    
    });
});