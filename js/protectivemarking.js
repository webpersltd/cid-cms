
let dataStore=JSON.parse(localStorage.getItem("data"));
let allProtectingMarkLabel=document.getElementsByClassName("p_mark");
let currentMarking=0;
var protecTiveMark={
    secret:["SECRET",2,
        [
            "Raise international tension",
            "Seriously damage relations with friendly governments",
            "Threaten life directly ,or serious  prejudice public order ,or individual security or liberty",
            "Cause serious damage to the operational effectiveness or security of Bangladesh or its partners or the continuing effeciveness valuable security or intelligence operations",
            "Cause substantial material damage to national finance or economic and commercial interests"
        ]
],
    topsecret:["TOP SECRET",3,
        [
            "Threaten directly he  internal stability of Bangladesh of friendly countries",
            "Lead directily to widespread loss of life",
            "Cause exceptionally grave damage to the effectiveness or security of Bangladesh or its partners or to the continuing effectiveness of extremely valuable security or intelligence operations",
            "Cause exceptionally grave  damage to relations with friendly governments",
            "Cause serve long rerm damage to the economy of Bangladesh"
        ]
],
    restricted:["RESTRICTED",0,
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
    confidential:["CONFIDENTIAL",1,
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



addEventListener("click",function(e){
    //e.preventDefault();
    if(e.target.getAttribute("class")==="p_mark"){
       var data=protecTiveMark[e.target.getAttribute("flag")];
       //allProtectingMarkLabel[currentMarking].setAttribute("class","addedMark");
       currentMarking=protecTiveMark[e.target.getAttribute("flag")][1];
       document.getElementById("p_mark_head").innerHTML="PROTECTIVE MARKING : <span style='color:red'>"+data[0]+"</span>";
       document.getElementById("p_mark_body").innerHTML="";
	   for(var i=0;i<data[2].length;i++){
		    
            document.getElementById("p_mark_body").innerHTML+='<li>'+data[2][i]+'</li>';
       }
    }

    if(e.target.getAttribute("id")==="set_protective_marking"){
        dataStore[0].protecTiveMark=currentMarking;
        //allProtectingMarkLabel[currentMarking].setAttribute("class","addedMark");
        for(var i=0;i<allProtectingMarkLabel.length;i++){
            allProtectingMarkLabel[i].style="boder:null"
        }
        allProtectingMarkLabel[currentMarking].style="border:7px solid red";
    }
    if(e.target.getAttribute("id")==="save_protective_code_data"){
        localStorage.setItem("data",JSON.stringify(dataStore));
        location.href="../review/";
    }
})

