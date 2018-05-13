$(document).ready(function(){
    $(".functional").click(function(){
        // $("td").removeClass("selected-handling-code");
        // $(this).addClass("selected-handling-code");
    });
});

/* load text from text area  start */
var data=JSON.parse(localStorage.getItem("data"));




/* load text from text area  end */

/*Handling code click function start*/

/*function hc_click(e){
    console.log(e.parentElement.childNodes);
    for(var i=0;i<e.parentElement.childNodes.length;i++){
        e.parentElement.childNodes[i].removeAttribute("class");
    }
    $(".functional").removeClass("selected-handling-code");
    e.setAttribute("class","selected-handling-code");
    var grdId=e.parentElement.getAttribute("id")[e.parentElement.getAttribute("id").length-1];

    document.getElementById("hc_gd_"+e.parentElement.getAttribute("id")[e.parentElement.getAttribute("id").length-1]).textContent=e.textContent.trim()[0];
    handlingCode[grdId]=e.textContent.trim()[0];
    data[grdId].grading[2]=e.textContent.trim()[0];
}*/

/*Handling code click function end*/

addEventListener('load',function(e){    
    for(var i=0;i<data.length;i++){
        var handlingCode=data[i].grading[2]===undefined ?"not set":data[i].grading[2];
        var text=data[i].freeText;
        var txt1 ='<div  class="row"><div class="col-md-7"><textarea id="'+data[i].id+'" rows="5" style="width:100%" disabled>'+data[i].value+'</textarea></div> <div class="col-md-2"></div>'; 
        var gradingData="<tr><td>"+data[i].grading[0]+"</td><td>"+data[i].grading[1]+"</td></tr>";
        var area='<div id="text_area" class="col-md-8"><textarea id="'+data[i].id+'" rows="5" style="width:100%" disabled>'+data[i].value+'</textarea></div> <div class="col-md-2"><h4>GRADING</h4><table  class="table grade-table table-bordered"><tbody id="grading-body"><tr><td>'+data[i].grading[0]+'</td><td>'+data[i].grading[1]+'</td><td id="hc_gd_'+data[i].id+'">'+handlingCode+'</td></tr></tbody></table></div><div class="col-md-10 handling-grade"><table class="table handling-table table-bordered"><tbody><tr id="hc_mr_'+data[i].id+'"><td><b>HANDLING CODE</b><br>To be completed by <br>the evaluator on <br>receipt and prior to <br> entry ont the <br> intelligence system.</td><td onclick="hc_click(this)" class="functional"><b>1</b><br>Permits dissemination<br> within Customs and to <br> other law inforcement <br>agencies in Bangladesh <br>as specified.</td><td onclick="hc_click(this)" class="functional"><b>2</b><br>Permits<br>dissemination to <br>Bangladesh non <br>prosecuting parties</td><td onclick="hc_click(this)" class="functional"><b>3</b><br>Permits<br>dissemination to <br> foreign law <br>agencies</td><td onclick="hc_click(this)" class="functional"><b>4</b><br>Permits dissemination<br>within Bangladesh<br>Customs only: specify<br>reasons and internal<br>recipient(s)</td><td onclick="hc_click(this)" class="functional"><b>5</b><br>Permits<br>dissemination, but<br>receiving agency to<br>observe conditions<br>as specified</td></tr></tbody></table></div><div class="col-md-10 handling-heading"><h4>DETAILED HANDLING INSTRUCTIONS:</h4></div><div class="col-md-10 handling-heading"><textarea class="instruction" style="margin-bottom:15px" id="hc_free_txt_'+data[i].id+'" onkeyup="freeText(this)"  class="form-control" value=""  rows="5" id="instructions">'+text+'</textarea></div></hr>';
        $("#container_handling_code").append(area);   
    }
})

function freeText(e){
    var freeTextId=e.getAttribute("id").trim()[e.getAttribute("id").length-1];
    data[freeTextId].freeText=e.value;
}

/* save andling code data start */

document.getElementById("save_handling_code_data").addEventListener("click",function(e){
    //location.href="./text.html"
    console.log(data);
    localStorage.setItem("data",JSON.stringify(data));
    location.href="../protectivemark/";
});
/* save handling code data end */
    