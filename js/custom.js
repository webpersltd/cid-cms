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


/* Add dynamic textbox in text.html page  start */

var textBoxNo=0; 
$("#addNewTextBox").click(function(){
    textBoxNo++;
    appendText(textBoxNo);    
});
function appendText(id) {
    var txt1 = '<div style="margin-left:-13px" class="col-md-12"><div class="form-group"><label class="control-label col-md-1" for="email">TEXT :</label><div class="col-md-10"><textarea class="text_box" id="'+id+'" rows="5" style="width:100%"></textarea></div><div><h4>GRADING</h5><ul><li id="s'+id+'">0</li><li id="i'+id+'">0</li></ul></div></div></div>';               
     // Create with DOM
   $("#text-box").append(txt1); 
   // alert("Hellow")     // Append the new elements 
}





var gradingsrcArray={}
var gradinginfoArray={}
var targetArea;
var handlingCode=[];
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
            document.getElementById("s"+targetArea).innerText=e.target.textContent[0];
        }else{
            console.log("Span tag",e.target.textContent);
            gradingsrcArray[+targetArea]=e.target.textContent[0];
            document.getElementById("s"+targetArea).innerText=e.target.textContent[0];
        }
        
    }
    if(e.target.getAttribute("class")==="info_grade"){
        if(e.target.tagName==="A"){
            gradinginfoArray[+targetArea]=e.target.textContent[0];
            console.log("Anchor tag",e.target.textContent[0]);
            document.getElementById("i"+targetArea).innerText=e.target.textContent[0];
        }else{
            gradinginfoArray[+targetArea]=e.target.textContent;
            console.log("Span tag",e.target.textContent);
            document.getElementById("i"+targetArea).innerText=e.target.textContent;
        }
        
    }

    if(e.target.getAttribute("class")==="gCheck"){
        console.log(e.target.name);
        editId=e.target.name;
        localStorage.setItem("current_id",editId);
        document.getElementById("save_modal").setAttribute("flag",editId);
        document.getElementById("text_modal").textContent=data[e.target.name].value;
        document.getElementById("src_edit").textContent=data[e.target.name].grading[0];
        document.getElementById("info_edit").textContent=data[e.target.name].grading[1];
    }

    if(e.target.getAttribute("flag")==="iie"){
        alert(e.target.textContent.trim()[0]);
        document.getElementById("info_edit").textContent=e.target.textContent.trim()[0];

    }
    if(e.target.getAttribute("flag")==="se"){
        alert(e.target.textContent.trim()[0]);
        document.getElementById("src_edit").textContent=e.target.textContent.trim()[0];
        
    }
    if(e.target.getAttribute("id")==="close_modal"){
        location.reload();
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
        data[e.target.getAttribute("flag")].grading[0]=document.getElementById("src_edit").textContent;
        data[e.target.getAttribute("flag")].grading[1]=document.getElementById("info_edit").textContent;
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
            this.data.push({ id: this.targetElement[i].id, value: this.targetElement[i].value, grading: [grdSrc[i],grdInfo[i]],freeText:"",protectiveMarking:""});
        }
    };
    return TextBoxHandle;
}());

/* save text to database using ajax call function start */


/* save text to database using ajax call function end */





var obj = new TextBoxHandle();




/* Add dynamic textbox in text.html page  end */

/* load data from text.html page in saveinformation and review page start */
addEventListener('load',appendTextBox)
function appendTextBox() {
    var data=JSON.parse(localStorage.getItem("data"));
    
   for(var i=0;i<data.length;i++){
        var txt1 ='<div  class="row"><div class="col-md-7"><textarea id="'+data[i].id+'" rows="5" style="width:100%" disabled>'+data[i].value+'</textarea></div> <div class="col-md-2"><ul class="textReview"><li>'+data[i].grading[0]+'</li><li>'+data[i].grading[1]+'</li></ul></div><div class="col-md-3"><div class="pretty p-default p-curve"><input type="radio"  class="gCheck" name="'+data[i].id+'" /><div class="state p-success-o"><label>OKEY</label></div></div> <div class="pretty p-default p-curve"> <input class="gCheck" data-toggle="modal" data-target="#myModal" type="radio" name="'+data[i].id+'" /><div class="state p-danger-o"><label>EDIT</label></div></div></div></div>';               
        $("#text_summery").append(txt1); 
   }
    
   // alert("Hellow")     // Append the new elements 
}


document.getElementById("s_and_r").addEventListener("click", function () {
    obj.setData(gradingsrcArray,gradinginfoArray);
    localStorage.setItem("data", JSON.stringify(obj.data));
    location.href="../savereview/";
});
//console.log(localStorage.getItem("data"));




