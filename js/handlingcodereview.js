$(document).ready(function(){
    $("#review_ok").click(function(){
        var id                = $("input[name=handlingcodeID]").val();
        var url               = "http://localhost/CID/reviewdone/";
        var remaining         = $('#remaining').text().charAt(23);
        var remainingInt      = parseInt(remaining);
        remainingInt++;
        var fullRemainingText = $('#remaining').text();
        fullRemainingText     = setCharAt(fullRemainingText,23,remainingInt);
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
                    $("#remaining").text(fullRemainingText);
                }
            }, "json"
        );
    });

    function setCharAt(str,index,chr) {
        if(index > str.length-1) return str;
        return str.substr(0,index) + chr + str.substr(index+1);
    }

    $("#update_info").click(function(){
        var id                           = $("input[name=handlingcodeID]").val();
        var updated_handling_instruction = $("#updated_hi").val();
        var updated_handling_code        = $("#selected_hc").val();
        var url                          = "http://localhost/CID/update_info/";        
        $.post(
            url, 
            {handlingInstruction: updated_handling_instruction, handlingCode: updated_handling_code, hid: id}, 
            function(result){
                $("#instruction").text(result.instruction);
                $("#code").text(result.code);
            }, "json"
        );
    });

    $("#recheck").click(function(){
        var id  = $("input[name=handlingcodeID]").val();
        var url = "http://localhost/CID/collectRecheckData/";
        $.post(
            url, 
            {handlingCodeID: id}, 
            function(result){
                $("#selected_hc").val(result.code);
                $("#updated_hi").val(result.instruction);
            }, "json"
        );
    });

    $(document).on({
        ajaxStart: function() { $(".loader").show(); },
        ajaxStop: function() { $(".loader").hide(); }    
    });
});