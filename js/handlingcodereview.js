$(document).ready(function(){
    $("#review_ok").click(function(){
        var id  = $("input[name=handlingcodeID]").val();
        var url = "http://localhost/CID/reviewdone/";
        $.post(
            url, 
            {handlingCodeID: id}, 
            function(result){
                if(result.summaryInfo=="none"){
                    window.location.href = "http://localhost/CID/protectivemark/";
                }else{
                    $("#summary").text(result.summaryInfo);
                    $("#src_eval").text(result.src_eval);
                    $("#inf_int_eval").text(result.inf_int_eval);
                    $("#code").text(result.codeInfo);
                    $("#instruction").text(result.instruction);
                    $("input[name=handlingcodeID]").val(result.handlingCodeid);
                }
            }, "json"
        );
    });

    $(document).on({
        ajaxStart: function() { $(".loader").show(); },
        ajaxStop: function() { $(".loader").hide(); }    
    });
});