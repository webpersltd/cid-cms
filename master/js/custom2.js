var TextObj=[
    {
        text:"First Text Field",
        grading:{se:"A",IIE:"1"}
    },
    {
        text:"Second Text Field",
        grading:{se:"B",IIE:"2"}
    },
    {
        text:"Third Text Field",
        grading:{se:"C",IIE:"3"}
    }
]

var textBoxNo=0; 
$("#addNewTextBox").click(function(){
    textBoxNo++;
    appendText(textBoxNo);    
});
function appendText(id) {
    var txt1 = '<div style="margin-left:-13px" class="col-md-12"><div class="form-group"><label class="control-label col-md-1" for="email">TEXT :</label><div class="col-md-10"><textarea class="text_box" id="'+id+'" rows="5" style="width:97.5%"></textarea></div></div></div>';               
     // Create with DOM
   $("#text-box").append(txt1); 
   // alert("Hellow")     // Append the new elements 
}



addEventListener('load',appendTextBox)
function appendTextBox() {
    var data=JSON.parse(localStorage.getItem("data"));
    
   for(var i=0;i<data.length;i++){
        var txt1 ='<div  class="row"><div class="col-md-7"><textarea id="'+data[i].id+'" rows="5" style="width:100%" disabled>'+data[i].value+'</textarea></div> <div class="col-md-2"><ul class="textReview"><li>'+data[i].grading[0]+'</li><li>'+data[i].grading[1]+'</li></ul></div><div class="col-md-3"><div class="pretty p-default p-curve"><input type="radio"  class="gCheck" name="'+data[i].id+'" /><div class="state p-success-o"><label>OKEY</label></div></div> <div class="pretty p-default p-curve"> <input class="gCheck" data-toggle="modal" data-target="#myModal" type="radio" name="'+data[i].id+'" /><div class="state p-danger-o"><label>CANCEL</label></div></div></div></div>';               
        $("#text_summery").append(txt1); 
   }
    
   // alert("Hellow")     // Append the new elements 
}

var gradingsrcArray={}
var gradinginfoArray={}
var targetArea;
addEventListener('click',function(e){
    var data=JSON.parse(localStorage.getItem("data"));
    var editId;
    if(e.target.getAttribute("class")==="text_box"){
        targetArea=e.target.id;
        console.log(targetArea);
    }
    if(e.target.getAttribute("class")==="src_grade"){
        if(e.target.tagName==="A"){
            console.log("Anchor tag",e.target.textContent[0]);
            gradingsrcArray[+targetArea]=e.target.textContent[0];
        }else{
            console.log("Span tag",e.target.textContent);
            gradingsrcArray[+targetArea]=e.target.textContent[0];
        }
        
    }
    if(e.target.getAttribute("class")==="info_grade"){
        if(e.target.tagName==="A"){
            gradinginfoArray[+targetArea]=e.target.textContent[0];
            console.log("Anchor tag",e.target.textContent[0]);
        }else{
            gradinginfoArray[+targetArea]=e.target.textContent;
            console.log("Span tag",e.target.textContent);
        }
        
    }

    if(e.target.getAttribute("class")==="gCheck"){
        console.log(e.target.name);
        editId=e.target.name;
        document.getElementById("save_modal").setAttribute("flag",editId);
        document.getElementById("text_modal").textContent=data[e.target.name].value;
        document.getElementById("src_edit").textContent=data[e.target.name].grading[0];
        document.getElementById("info_edit").textContent=data[e.target.name].grading[1];
    }

    if(e.target.getAttribute("id")==="close_modal"){
        location.href="./saveinformationandreview.html";
    }

    if(e.target.getAttribute("id")==="save_modal"){
        // console.log(e.target.getAttribute("flag"));
        // data[e.target.getAttribute("flag")*1].value=document.getElementById("text_modal").textContent;
        // console.log(data[e.target.getAttribute("flag")]);
        // localStorage.removeItem("data");
        // localStorage.setItem("data",JSON.stringify(data));
        // //location.href="./saveinformationandreview.html";
        //console.log(data[0].value);
        data[e.target.getAttribute("flag")].value=document.getElementById("text_modal").value;
        console.log(data[e.target.getAttribute("flag")].value);
        localStorage.setItem("data",JSON.stringify(data));
    }
    

    
    
    
},false);








var TextBoxHandle = /** @class */ (function () {
    function TextBoxHandle() {
        this.data = [];
        this.targetElement = document.getElementsByClassName("text_box");
    }
    TextBoxHandle.prototype.setData = function (grdSrc,grdInfo) {
        for (var i = 0; i < this.targetElement.length; i++) {
            this.data.push({ id: this.targetElement[i].id, value: this.targetElement[i].value, grading: [grdSrc[i],grdInfo[i]] });
        }
    };
    return TextBoxHandle;
}());
var obj = new TextBoxHandle();
document.getElementById("s_and_r").addEventListener("click", function () {
    //alert("GOTCH..");
    obj.setData(gradingsrcArray,gradinginfoArray);
    localStorage.setItem("data", JSON.stringify(obj.data));
});
console.log(localStorage.getItem("data"));




/*handling code  start */


/* load text from text area  start */
var data=JSON.parse(localStorage.getItem("data"));

addEventListener('load',function(e){
    
   
   
   for(var i=0;i<data.length;i++){
        var txt1 ='<div  class="row"><div class="col-md-7"><textarea id="'+data[i].id+'" rows="5" style="width:100%" disabled>'+data[i].value+'</textarea></div> <div class="col-md-2"></div>'; 
        var gradingData="<tr><td>"+data[i].grading[0]+"</td><td>"+data[i].grading[1]+"</td></tr>";
        var area='<div id="text_area" class="col-md-8"><textarea id="'+data[i].id+'" rows="5" style="width:100%" disabled>'+data[i].value+'</textarea></div> <div class="col-md-2"><table  class="table grade-table table-bordered"><tbody id="grading-body"><tr><td>'+data[i].grading[0]+'</td><td>'+data[i].grading[1]+'</td><td id="hc_gd_'+data[i].id+'"></td></tr></tbody></table></div><div class="col-md-10 handling-grade"><table class="table handling-table table-bordered"><tbody><tr id="hc_mr_'+data[i].id+'"><td><b>HANDLING CODE</b><br>To be completed by <br>the evaluator on <br>receipt and prior to <br> entry ont the <br> intelligence system.</td><td onclick="hc_click(this)" class="functional"><b>1</b><br>Permits dissemination<br> within Customs and to <br> other law inforcement <br>agencies in Bangladesh <br>as specified.</td><td onclick="hc_click(this)" class="functional"><b>2</b><br>Permits<br>dissemination to <br>Bangladesh non <br>prosecuting parties</td><td onclick="hc_click(this)" class="functional"><b>3</b><br>Permits<br>dissemination to <br> foreign law <br>agencies</td><td onclick="hc_click(this)" class="functional"><b>4</b><br>Permits dissemination<br>within Bangladesh<br>Customs only: specify<br>reasons and internal<br>recipient(s)</td><td onclick="hc_click(this)" class="functional"><b>5</b><br>Permits<br>dissemination, but<br>receiving agency to<br>observe conditions<br>as specified</td></tr></tbody></table></div><div class="col-md-10 handling-heading"><h4>DETAILED HANDLING INSTRUCTIONS:</h4></div><div class="col-md-10 handling-heading"><textarea class="instruction" style="margin-bottom:15px" id="hc_free_txt_'+data[i].id+'"  class="form-control" rows="5" id="instructions"></textarea></div></hr>';
        $("#container_handling_code").append(area);              
     
   }
})


/* load text from text area  end */

/*Handling code click function start*/

function hc_click(e){
    console.log(e.parentElement.childNodes)
    for(var i=0;i<e.parentElement.childNodes.length;i++){
        e.parentElement.childNodes[i].removeAttribute("class")
    }
    e.setAttribute("class","selected-handling-code");
    var grdId=e.parentElement.getAttribute("id")[e.parentElement.getAttribute("id").length-1];

    document.getElementById("hc_gd_"+e.parentElement.getAttribute("id")[e.parentElement.getAttribute("id").length-1]).textContent=e.textContent.trim()[0];
    handlingCode[grdId]=e.textContent.trim()[0];
    data[grdId].grading[2]=e.textContent.trim()[0];
}
/*Handling code click function end*/



/* save andling code data start */

document.getElementById("save_handling_code_data").addEventListener("click",function(e){
    //location.href="./text.html"
    
    console.log(data);
});
/* save handling code data end */





/*handling code  end */