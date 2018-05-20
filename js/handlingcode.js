$(document).ready(function(){
    $(".functional").click(function(){
        var hc       = $(this).children("b").text();
        $(".functional").removeClass("selected-handling-code");
        $(this).addClass("selected-handling-code"); 
        $("#handlingcode").text(hc);
        $('#handlingcodeInput').val(hc);
    });
});


/*
function codeArea(){
    $(".functional").click(function(){
        var hc       = $(this).children("b").text();
        var parentId = $(this).parent().attr('id');
        var lastChar = parentId[parentId.length - 1];

        $("#hc_data_"+lastChar+" .functional").removeClass("selected-handling-code");
        $(this).addClass("selected-handling-code"); 
        $("#handlingcode_"+lastChar).text(hc);
        $('#handlingcodeInput_1').val(hc);
    });
}
*/
