var data=JSON.parse(localStorage.getItem("data"))
var protectiveMark=["RESTRICTED","CONFIDENTIAL","SECRET","TOP SECRET"]


class Dissemination{

     
     onLoad(){
            addEventListener("load",function(e){
                document.getElementById("des_protect").textContent=protectiveMark[data[0].protecTiveMark];
                document.getElementById("temp_d_p").textContent+=" "+protectiveMark[data[0].protecTiveMark];
            })
            this.protectiveMarkPointer=null;
            for(var i=0;i<data.length;i++){
                //document.getElementById("dissemination-container").innerHTML+='<div class="col-md-8"><h4>SUMMERY OF TEXT:</h4></div><div style="vertical-align:top" class="col-md-4"><h4 style="margin-left:35px">GRADING</h4><ul class="des_grading" style="display:inline-block"><li style="display:inline-block">'+data[i].grading[0]+'</li><li style="display:inline-block">'+data[i].grading[1]+'</li><li style="display:inline-block">'+data[i].grading[2]+'</li></ul></div><div class="col-md-12"><textarea rows="10" disabled id="diss_s_'+i+'" style="width:70%">"'+data[i].value+'"</textarea></div><div class="col-md-6"><h4>Detailed handling instruction</h4></div><div class="col-md-12"><textarea rows="7" disabled id="diss_h_'+i+'" style="width:70%">"'+data[i].freeText+'"</textarea></div><div style="border-bottom: 2px solid black;margin-bottom: 30px;padding-bottom: 45px;margin-top: 10px;" class="col-md-12"><h3>CAN THIS INFORMATION BE DISSEMINATED IN LINE WITH THE HANDLING CODE APPLIED: </h3><div class="pretty p-default p-curve"><input  type="radio" class="gCheck" name="h_c_a'+i+'"><div class="state p-success-o"><label>YES</label></div></div> <div class="pretty p-default p-curve"> <input class="gCheck" data-toggle="modal" data-target="#myModal1" type="radio" name="h_c_a'+i+'"><div class="state p-danger-o"><label>NO</label></div></div><h3>ARE ADDITIONAL DETAILED HANDLING INSTRUCTIONS REQUIRED: </h3><div class="pretty p-default p-curve"><input  type="radio" class="gCheck"  data-toggle="modal" data-target="#myModal1" name="h_i_'+i+'"><div class="state p-success-o"><label>YES</label></div></div> <div class="pretty p-default p-curve"> <input class="gCheck"  type="radio" name="h_i_'+i+'"><div class="state p-danger-o"><label>NO</label></div></div><h3>CAN THIS INFORMATION BE DISSEMINATED IN LINE WITH THE PROTECTIVE MARKING APPLIED: </h3><div class="pretty p-default p-curve"><input  type="radio" class="gCheck" data-toggle="modal" data-target="#myModal1" name="d_p_m'+i+'"><div class="state p-success-o"><label>YES</label></div></div> <div class="pretty p-default p-curve"> <input class="gCheck"  type="radio" name="d_p_m'+i+'"><div class="state p-danger-o"><label>NO</label></div></div></div>'
                document.getElementById("dissemination-container").innerHTML+='<div class="col-md-8"><h4>SUMMERY OF TEXT:</h4></div><div style="vertical-align:top" class="col-md-4"><h4 style="margin-left:35px">GRADING</h4><ul class="des_grading" style="display:inline-block"><li style="display:inline-block">'+data[i].grading[0]+'</li><li style="display:inline-block">'+data[i].grading[1]+'</li><li style="display:inline-block">'+data[i].grading[2]+'</li></ul></div><div class="col-md-12"><textarea rows="10" disabled id="diss_s_'+i+'" style="width:70%">"'+data[i].value+'"</textarea></div><div class="col-md-6"><h4>Detailed handling instruction</h4></div><div class="col-md-12"><textarea rows="7" disabled id="diss_h_'+i+'" style="width:70%">"'+data[i].freeText+'"</textarea></div>';
            }
    }

    onChangeProtectiveMark(){
        addEventListener('click',function(e){
            if(e.target.getAttribute("class")==="p_mark"){
                //console.log(data[0].protecTiveMark=e.target.getAttribute("dissemination_mark"))
                this.protectiveMarkPointer=e.target.getAttribute("dissemination_mark")
                //localStorage.setItem("data",JSON.stringify(data));
                //location.reload();
                var nodes=document.getElementById("protective-mark-id").childNodes;
                console.log(nodes)
                for(var i=0;i<nodes.length;i++){
                    //console.log(nodes[i].childNodes[0].innerHTML)
                    if(nodes[i].nodeName!=="text"){
                        nodes[i].style="color:black"
                    }
                   
                }
                e.target.style="color:red !important;font-weight:bold"
                //e.target.style="font-weight:bold"
                document.getElementById("temp_d_p").textContent="Protective mark is: "+protectiveMark[e.target.getAttribute("dissemination_mark")];

                
            }
            if(e.target.getAttribute("id")==="d_p_m"){
                console.log(this.protectiveMarkPointer)
                data[0].protecTiveMark=this.protectiveMarkPointer;
                localStorage.setItem("data",JSON.stringify(data));
                location.reload();
            }
           
            
        //localStorage.setItem("data",JSON.stringify(data));
            //
        })
    }
}



var obj= new Dissemination();
obj.onLoad();
obj.onChangeProtectiveMark();