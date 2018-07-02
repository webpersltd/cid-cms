$(document).ready(function(){
    var val = $("#handlingcode").text();
    var selectedHandlingCode = parseInt(val)+1;
    
    if(val!=0){
        $(".functional:nth-of-type("+selectedHandlingCode+")").addClass("selected-handling-code");
    }

    $(".functional").click(function(){
        $(this).closest(".col-md-10").children(".error").remove();
        var hc = $(this).children("b").text();
        $(".functional").removeClass("selected-handling-code");
        $(this).addClass("selected-handling-code"); 
        $("#handlingcode").text(hc);
        $('#handlingcodeInput').val(hc);
    });

    $(".instruction").keypress(function(){
        $(this).closest(".col-md-10").children(".error").remove();
    });
});
