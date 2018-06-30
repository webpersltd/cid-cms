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