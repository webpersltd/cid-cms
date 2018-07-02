$(document).ready(function(){
    $(document).on("click", "#review_info_ok",function(){
        var tid = $("input[name=tid]").val();
        var url = "http://localhost/CID/reviewProcess/";
        $.post(
            url, 
            {textid: tid}, 
            function(result){
                if(result.summaryInfo=="none"){
                    window.location.href = "http://localhost/CID/review_protective_mark/";
                }else{
                    $("#summary").text(result.summaryInfo);
                    $("#src_eval").text(result.src_eval);
                    $("#inf_int_eval").text(result.inf_int_eval);
                    $("#code").text(result.codeInfo);
                    $("#instruction").text(result.instruction);
                    $("input[name=tid]").val(result.txtID);
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

    $("#pro_marking").change(function(){
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

    $("#close_protective_btn").click(function(){
        var url = "http://localhost/CID/collectProMark/";
        $.post(
            url, 
            function(result){
                $("#pro_marking").val(result.pid);
            }, "json"
        );
        $("#pro_mark").modal();
    });

    $("#review_eval").click(function(){
        var id  = $("input[name=tid]").val();
        var url = "http://localhost/CID/collectEval/";
        $.post(
            url, 
            {txtID: id}, 
            function(result){
                $("#src_of_eval").val(result.src_eval);
                $("#inf_of_eval").val(result.inf_int_eval);
            }, "json"
        );
    });

    $("#update_info").click(function(){
        var id      = $("input[name=tid]").val();
        var srcEval = $("#src_of_eval").val();
        var infEval = $("#inf_of_eval").val();

        var url     = "http://localhost/CID/updateEval/";
        $.post(
            url, 
            {txtID: id, src: srcEval, inf: infEval}, 
            function(result){
                $("#src_eval").text(result.src_eval);
                $("#inf_int_eval").text(result.inf_int_eval);
            }, "json"
        );
    });

    $("#recheck_pro").click(function(){
        var url = "http://localhost/CID/collectProMark/";
        $.post(
            url, 
            function(result){
                $("#pro_marking").val(result.pid);
            }, "json"
        );
    });

    $("#update_pro_mark").click(function(){
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

    $("#pm_confirm_ok").click(function(){
        var url = "http://localhost/CID/confirmProMark/";
        $.post(
            url, 
            function(result){
                $('#p_mark_name').text(result.name);
                window.location.href = "http://localhost/CID/dissemination/";
            }
        );
    });

    $(document).on({
        ajaxStart: function() { $(".loader").show(); },
        ajaxStop:  function() { $(".loader").hide(); }    
    });
});