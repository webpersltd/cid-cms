var initials=function(){
   
    other_source=function(id=null){
        if(id===null){
            document.getElementById("other-source-input-field").style="display:none";
            return;
        }
        document.getElementById(id).style="display:block";
         
    }
    


    return (
        {
            other_source:other_source
        }
    )

}



document.getElementById("source-selection").addEventListener('change',function(e){
if(e.target.value==="Other") initials().other_source("other-source-input-field");
else initials().other_source()
})