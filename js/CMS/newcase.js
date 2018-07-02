var numberOfTextBox=0;
var protectiveMarkingobj={
    restricted:
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
    ],
    confedential:
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

    ],
    secret:
    [
            "Raise international tension",
            "Seriously damage relations with friendly governments",
            "Threaten life directly ,or serious  prejudice public order ,or individual security or liberty",
            "Cause serious damage to the operational effectiveness or security of Bangladesh or its partners or the continuing effeciveness valuable security or intelligence operations",
            "Cause substantial material damage to national finance or economic and commercial interests"

    ],
    topsecret:
    [
            "Threaten directly he  internal stability of Bangladesh of friendly countries",
            "Lead directily to widespread loss of life",
            "Cause exceptionally grave damage to the effectiveness or security of Bangladesh or its partners or to the continuing effectiveness of extremely valuable security or intelligence operations",
            "Cause exceptionally grave  damage to relations with friendly governments",
            "Cause serve long rerm damage to the economy of Bangladesh"

    ]
}

var newCaseModule=function(){
    addTextBox=function(){
        var id="text_box_cms_"+numberOfTextBox;
        $( "#cms_text_box" ).append( '<textarea id="'+id+'"style="margin-top:10px;display:inline-block;width:100%;padding-top:7px;padding-bottom:7px;"></textarea>' );
        numberOfTextBox++;
    }

    protectiveMarking=function(val){
        
            var modal = document.getElementById('myModal');
            var span = document.getElementsByClassName("close")[0];
            modal.style.display = "block";
            span.onclick = function() {
                modal.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            document.getElementById("protective_marking_content").innerHTML="";
            for(var i=0;i<protectiveMarkingobj[val].length;i++){
                document.getElementById("protective_marking_content").innerHTML+="<li>"+protectiveMarkingobj[val][i]+"</li>";
            }
            document.getElementById("p_mark_head_cms").innerHTML='PROTECTIVE MARKING : <span style="color:red">'+val.toUpperCase()+'</span>';
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
           
        
    }

    addadditionalSubject=function(){
        var modal = document.getElementById('addSubjectModal');
            var span = document.getElementsByClassName("close1")[0];
            modal.style.display = "block";
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
    }

    return(
        {
            addTextBox:addTextBox,
            protectiveMarking:protectiveMarking,
            addadditionalSubject:addadditionalSubject
        }
    )
}


document.getElementById("add_text_box_cms").addEventListener('click',function(e){
    newCaseModule().addTextBox();
})


addEventListener("click",function(e){
    if(e.target.getAttribute("class")==="p_mark_cms"){
        newCaseModule().protectiveMarking(e.target.getAttribute("val"));
    }
})


document.getElementById("add_additional_subject_cms").addEventListener("click",function(e){
    e.preventDefault();
    newCaseModule().addadditionalSubject();
});