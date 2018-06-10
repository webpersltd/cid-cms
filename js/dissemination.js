$(document).ready(function(){
    $(document).on("click","#handling_code_ok, #handling_instruction_ok, #pro_mark_ok",function(){
        var htmlID = $(this).attr('id');
        var tid    = $("input[name=tid]").val();
        var url    = "http://localhost/CID/disseminationProcess/";        

        $.post(
            url, 
            {textid: tid, updateData: htmlID}, 
            function(result){
                //alert(result);
                if(result.summaryInfo=="none"){
                    window.location.href = "http://localhost/CID/";
                }else if(result.summaryInfo == "notfinished"){
                    if(htmlID == "handling_code_ok"){
                        $('.decission1').html("<h4>YES</h4>");
                    }else if(htmlID == "handling_instruction_ok"){
                        $('.decission2').html("<h4>NO</h4>");
                    }else{
                        $('.decission3').html("<h4>YES</h4>");
                    }
                }else{
                    $("#pm-title").html("<b>"+result.pmname+"</b>");
                    $("#summary").text(result.summaryInfo);
                    $("#src_eval").text(result.src_eval);
                    $("#inf_int_eval").text(result.inf_int_eval);
                    $("#code").text(result.codeInfo);
                    $("#instruction").text(result.instruction);
                    $("input[name=tid]").val(result.txtID);
                    $('.decission1').html('<button type="button" id="handling_code_ok" class="btn btn-default" style="margin-right: 4px;"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    $('.decission2').html('<button type="button" class="btn btn-default" style="margin-right: 4px;"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button type="button" id="handling_instruction_ok" class="btn btn-default"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    $('.decission3').html('<button type="button" id="pro_mark_ok" class="btn btn-default" style="margin-right: 4px;"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    $("#remaining").text(setCharAt($("#remaining").text(),15,result.remainingText));
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