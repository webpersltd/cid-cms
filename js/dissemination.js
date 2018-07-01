$(document).ready(function(){
    $(document).on("click","#handling_code_ok, #handling_instruction_ok, #pro_mark_ok",function(){
        var htmlID = $(this).attr('id');
        var tid    = $("input[name=tid]").val();
        var url    = "http://localhost/CID/disseminationProcess/";        

        $.post(
            url, 
            {textid: tid, updateData: htmlID}, 
            function(result){
                if(result.summaryInfo=="none"){
                    window.location.href = "http://localhost/CID/disseminationFinal/";
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

    $(document).on("click","#review_handling_code",function(){
        var id  = $("input[name=tid]").val();
        var url = "http://localhost/CID/collectHandlingCode/";
        $.post(
            url, 
            {txtID: id}, 
            function(result){
                $("#selected_hc").val(result);
            }
        );
    });

    $(document).on("click","#update_hc",function(){
        var cd  = $("#selected_hc").val();
        var id  = $("input[name=tid]").val();
        var url = "http://localhost/CID/reviewHandlingCode/";
        $.post(
            url, 
            {code: cd, txtID: id}, 
            function(result){
                $("#code").text(result);
            }
        );
    });

    $(document).on("click","#review_handling_instruction",function(){
        var id  = $("input[name=tid]").val();
        var url = "http://localhost/CID/reviewHandlingInstruction/";
        $.post(
            url, 
            {txtID: id}, 
            function(result){
                $("#review_instruction").val(result);
            }
        );
    });

    $(document).on("click","#update_hi",function(){
        var id  = $("input[name=tid]").val();
        var ins = $("#review_instruction").val();
        var url = "http://localhost/CID/updateHandlingInstruction/";
        $.post(
            url, 
            {txtID: id, instruction: ins}, 
            function(result){
                if(result == "empty"){
                    alert("Sorry, The Handling Instruction Field is Required.");
                }else{
                    $("#instruction").val(result);
                }
            }
        );
    });

    $(document).on("click", "#recheck_pro", function(){
        var url = "http://localhost/CID/collectProMark/";
        $.post(
            url, 
            function(result){
                $("#pro_marking").val(result.pid);
            }, "json"
        );
    });

    $(document).on("click", "#update_pro_mark", function(){
        var pro_mark = $("#pro_marking").val();
        var url      = "http://localhost/CID/updateProMark/";
        $.post(
            url,
            {proMark: pro_mark}, 
            function(result){
                $('#p_mark_name').text(result.name);
            }, "json"
        );
    });

    $(document).on({
        ajaxStart: function() { $(".loader").show(); },
        ajaxStop:  function() { $(".loader").hide(); }    
    });

    function setCharAt(str,index,chr) {
        if(index > str.length-1) return str;
        return str.substr(0,index) + chr + str.substr(index+1);
    }

    $("#disseminated_to").autocomplete({
        source: "http://localhost/CID/getName",
        select: function( event, ui ) {
            event.preventDefault();
            $('.error').remove();
            $("#disseminated_to").val(ui.item.value);
            $("#user").val(ui.item.id);
        }
    });
});