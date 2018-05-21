var data=JSON.parse(localStorage.getItem("data"))
var pointer=0;

var reviewPage={
    getJsonthisdata:function(){
        //return JSON.parse(this.data)
    },
    id:0,
    reviewPageOnload:function(){
        for(var i=0;i<data.length;i++){
            var area='<div seperator="review_container" style="border-bottom:2px solid black " class="col-md-9"><h3>SUMMERY OF RECORD</h3><p>'+data[i].value+'</p><h3>HANDLING INSTRUCTION</h3><p>'+data[i].freeText+'</p><h3>I HAVE REVIEWED THIS ENTRY AND IT\'S CORRECT </h3><div style="margin-bottom:15px" class="pretty p-default p-curve"><input type="radio" marker="review_check" class="gCheck" name="'+i+'"><div class="state p-success-o"><label>OKEY</label></div></div> <div class="pretty p-default p-curve"> <input  class="gCheck" data-toggle="modal" marker="review_check" data-target="#myModal" id="review_edit'+i+'" type="radio" name="'+i+'"><div class="state p-danger-o"><label>EDIT</label></div></div>  </div><div class="col-md-3"><h3>GRADING</h3><table><tr><td style="border:1px solid black ; padding:10px">'+data[i].grading[0]+'</td><td style="border:1px solid black ;  padding:10px">'+data[i].grading[1]+'</td><td style="border:1px solid black ;  padding:10px">'+data[i].grading[2]+'</td></tr></table></div></div><hr>';
            $("#review-container").append(area);              
        
        }
    },
    setLocalData:function(){
        
    },
    markProtectivedata:function(){
        var nodes=document.getElementById("review_page_p_marking").childNodes[data[0].protecTiveMark];
       console.log(nodes.childNodes[0].style="color:red")
       

    },


    clickEvent:function(){
        addEventListener("click",function(e){
            if(e.target.id!=="review_btn_save" && e.target.getAttribute("marker")==="review_check"){
                console.log(e.target.getAttribute("marker"))
                pointer=e.target.getAttribute("id")[e.target.getAttribute("id").length-1]
            //console.log(data[e.target.getAttribute("id")[e.target.getAttribute("id").length-1]]);
            document.getElementById("edit_review_summery").value=data[e.target.getAttribute("id")[e.target.getAttribute("id").length-1]].value
            document.getElementById("edit_review_h_instruction").value=data[e.target.getAttribute("id")[e.target.getAttribute("id").length-1]].freeText
            console.log(data[e.target.getAttribute("id")[e.target.getAttribute("id").length-1]].grading)
            document.getElementById("review_grading").innerHTML="<ul><li>"+data[e.target.getAttribute("id")[e.target.getAttribute("id").length-1]].grading[0]+"</li><li>"+data[e.target.getAttribute("id")[e.target.getAttribute("id").length-1]].grading[1]+"</li><li>"+data[e.target.getAttribute("id")[e.target.getAttribute("id").length-1]].grading[2]+"</li></ul>"
            }
            
        })
        
    },

    saveEvent:function(){
        data[pointer].freeText=document.getElementById("edit_review_h_instruction").value
        data[pointer].value=document.getElementById("edit_review_summery").value
        data[pointer].grading[0]=document.getElementById("review_grading").childNodes[0].childNodes[0].textContent
        data[pointer].grading[1]=document.getElementById("review_grading").childNodes[0].childNodes[1].textContent;
        data[pointer].grading[2]=document.getElementById("review_grading").childNodes[0].childNodes[2].textContent;
        //console.log(JSON.stringify(data))
        localStorage.setItem("data",JSON.stringify(data))
        //console.log(localStorage.getItem("data"))
        location.reload();
        

        
    },
    changeGradingEvent:function(){
        addEventListener('click',function(e){
            if(e.target.parentNode.getAttribute("class")==="select_review_grading"){
                e.target.style="border:2px solid red"
                console.log(document.getElementById("review_grading").childNodes[0].childNodes[e.target.parentNode.getAttribute("order")].textContent=e.target.textContent)
                
            }
        })
    }
}




reviewPage.reviewPageOnload();
reviewPage.markProtectivedata();
reviewPage.changeGradingEvent();
reviewPage.clickEvent();
document.getElementById("review_btn_save").addEventListener('click',function(e){
    reviewPage.saveEvent();
});
console.log(data[pointer].freeText)

console.log('%c This portion is intented only for developers, don\'t  write anything ', 'font-size:30px ; font-weight:bold; color:red');