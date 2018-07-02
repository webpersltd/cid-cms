$(document).ready(function(){
    $(document).on("click","#handling_code_ok, #handling_instruction_ok, #pro_mark_ok",function(){
        var htmlID = $(this).attr('id');
        var tid    = $("input[name=tid]").val();
        var url    = "http://localhost/CID/disseminationProcess/";        

        $.post(
            url, 
            {textid: tid, updateData: htmlID}, 
            function(result){
                if(result.summaryInfo == "none"){
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
                    $("#summary").text(result.summaryInfo);
                    $("#src_eval").text(result.src_eval);
                    $("#inf_int_eval").text(result.inf_int_eval);
                    $("#code").text(result.codeInfo);
                    $("#instruction").text(result.instruction);
                    $("input[name=tid]").val(result.txtID);
                    $('.decission1').html('<button type="button" id="handling_code_ok" class="btn btn-default" style="margin-right: 5px;"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button id="review_handling_code" type="button" class="btn btn-default" data-toggle="modal" data-target="#handling_code"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    $('.decission2').html('<button type="button" id="review_handling_instruction" class="btn btn-default" data-toggle="modal" data-target="#handling_instruction" style="margin-right: 5px;"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button type="button" id="handling_instruction_ok" class="btn btn-default"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    $('.decission3').html('<button type="button" id="pro_mark_ok" class="btn btn-default" style="margin-right: 5px;"><span class="glyphicon glyphicon-ok" style="color: green;"></span></button><button id="recheck_pro" data-toggle="modal" data-target="#pro_mark" type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>');
                    $("#remaining").text(setCharAt($("#remaining").text(),14,result.remainingText));
                }
            }, "json"
        );
    });

    var protecTiveMark = {
        secret:["SECRET",3,
            [
                "Raise international tension",
                "Seriously damage relations with friendly governments",
                "Threaten life directly ,or serious  prejudice public order ,or individual security or liberty",
                "Cause serious damage to the operational effectiveness or security of Bangladesh or its partners or the continuing effeciveness valuable security or intelligence operations",
                "Cause substantial material damage to national finance or economic and commercial interests"
            ]
        ],
        topsecret:["TOP SECRET",4,
            [
                "Threaten directly he  internal stability of Bangladesh of friendly countries",
                "Lead directily to widespread loss of life",
                "Cause exceptionally grave damage to the effectiveness or security of Bangladesh or its partners or to the continuing effectiveness of extremely valuable security or intelligence operations",
                "Cause exceptionally grave  damage to relations with friendly governments",
                "Cause serve long rerm damage to the economy of Bangladesh"
            ]
        ],
        restricted:["RESTRICTED",1,
            [
                "Cause substantial distress to individuals",
                "Make it more difficult to maintain operational effectiveness or security of Bangladesh or its partners",
                "Prejudice an on -going investigation or facilities the comission of crime",
                "Impede the effective development or operation of govenment policies",
                "Undermine the effectiveness of bangladesh Customs compiance strategies and targeting techniques",
                "Breach proper undertaking to maintain the confidence of material provided by third parties",
                "Breach legislative or satutory restrictions on disclosure of material",
                "Disadvantage Bangladesh commercial or policy negotiations with others",
                "Undermine the proper management of the public sector and its operations"
            ]
        ],
        confidential:["CONFIDENTIAL",2,
            [
                "Materially damage diplomatic relations ,that is ,cause formal protest or other sanctions",
                "Prejudice individual security or liberty",
                "Cause damage to the operational effectiveness or security of Bangladesh or its partners or the effectiveness of valuable security or intelligence operations",
                "Work substantially against national finance or economic and commercial interests",
                "Substantially undermine the financial viability of major organizations",
                "Impede the investigation or facilitate the comission of serious crime",
                "Shut down or otherwise substantially disrupt bangladesh Customs compliance strategies and targeting tecniques",
                "Seriously impede government policies",
                "Shut down or otherwise substantially disrupt significant national Bangladesh Customs operations"
            ]
        ]
    }

    $(document).on("change", "#pro_marking", function(){
        var select            = $("#pro_marking option:selected").text();
        var clicked           = select.toLowerCase().replace(/\s+/, "");
        var data              = protecTiveMark[clicked];
        var aboutToBeSelected = protecTiveMark[clicked][1];

        $("#p_mark_head").html("PROTECTIVE MARKING : <span style='color:red'>"+data[0]+"</span>");
        document.getElementById("p_mark_body").innerHTML="";
        for(var i=0;i<data[2].length;i++){            
            document.getElementById("p_mark_body").innerHTML+='<li>'+data[2][i]+'</li>';
        }
        $("#modalDetails").modal();
    });

    $(document).on("click", "#close_protective_btn", function(){
        var url = "http://localhost/CID/collectProMark/";
        $.post(
            url, 
            function(result){
                $("#pro_marking").val(result.pid);
            }, "json"
        );
        $("#pro_mark").modal();
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

        $("#pro_mark").modal('hide');
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