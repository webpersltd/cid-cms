var initials = function(){   
                    other_source = function(id=null){
                                        if(id===null){
                                            document.getElementById("other-source-input-field").style="display:none";
                                            document.getElementsByName("information_source_other")[0].value='';
                                            return;
                                        }
                                        document.getElementById(id).style="display:block";         
                                    }
                                    return (
                                        {
                                            other_source : other_source
                                        }
                                    )
                }

document.getElementById("source-selection").addEventListener('change',function(e){
    if(e.target.value === "11") initials().other_source("other-source-input-field");
    else initials().other_source()
});

$(document).ready(function(){
    $( "select, input" )
      .change(function () {
        $(this).closest(".col-md-6").children(".error").remove();
    });

    $("input").keyup(function(){
        $(this).closest(".col-md-6").children(".error").remove();
    });
});
