var protecTiveMark={
    secret:["SECRET",3,
        [
            "Raise international tension",
            "Seriously damage relations with friendly governments",
            "Threaten life directly ,or serious  prejudice public order ,or individual security or liberty",
            "Cause serious damage to the operational effectiveness or security of Bangladesh or its partners or the continuing effeciveness valuable security or intelligence operations",
            "Cause substantial material damage to national finance or economic and commercial interests"
        ]
],
    topsecret:["TOP SECRET",4,
        [
            "Threaten directly he  internal stability of Bangladesh of friendly countries",
            "Lead directily to widespread loss of life",
            "Cause exceptionally grave damage to the effectiveness or security of Bangladesh or its partners or to the continuing effectiveness of extremely valuable security or intelligence operations",
            "Cause exceptionally grave  damage to relations with friendly governments",
            "Cause serve long rerm damage to the economy of Bangladesh"
        ]
],
    restricted:["RESTRICTED",1,
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
    confidential:["CONFIDENTIAL",2,
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

$(document).ready(function(){
    $(".p_mark").click(function(){
        $(".error").remove();
        var clicked           = $(this).attr("flag");
        var data              = protecTiveMark[clicked];
        var aboutToBeSelected = protecTiveMark[clicked][1];
        $("#p_mark_head").html("PROTECTIVE MARKING : <span style='color:red'>"+data[0]+"</span>");
        document.getElementById("p_mark_body").innerHTML="";
        for(var i=0;i<data[2].length;i++){            
            document.getElementById("p_mark_body").innerHTML+='<li>'+data[2][i]+'</li>';
        }
    });

    $("#set_protective_marking").click(function(){
        var ptext = $("#p_mark_head").find("span").text();
        $(".p_mark").closest(".selected-protective-marking").css("border","1px solid black");
        $(".p_mark").closest(".selected-protective-marking").css("border-width","");
        $( "li a:containsExact("+ptext+")" ).closest(".selected-protective-marking").css("border","3px solid red");
        $( "li a:containsExact("+ptext+")" ).closest(".selected-protective-marking").css("border-width","thick");
        $('#protectiveIdInput').val(protecTiveMark[ptext.toLowerCase().replace(/\s/g, '')][1]); 
    });
});

$.extend( $.expr[":"], {
 containsExact: $.expr.createPseudo ?
  $.expr.createPseudo(function(text) {
   return function(elem) {
    return $.trim(elem.innerHTML.toLowerCase()) === text.toLowerCase();
   };
  }) :
  // support: jQuery <1.8
  function(elem, i, match) {
   return $.trim(elem.innerHTML.toLowerCase()) === match[3].toLowerCase();
  },

 containsExactCase: $.expr.createPseudo ?
  $.expr.createPseudo(function(text) {
   return function(elem) {
    return $.trim(elem.innerHTML) === text;
   };
  }) :
  // support: jQuery <1.8
  function(elem, i, match) {
   return $.trim(elem.innerHTML) === match[3];
  },

 containsRegex: $.expr.createPseudo ?
  $.expr.createPseudo(function(text) {
   var reg = /^\/((?:\\\/|[^\/]) )\/([mig]{0,3})$/.exec(text);
   return function(elem) {
    return RegExp(reg[1], reg[2]).test($.trim(elem.innerHTML));
   };
  }) :
  // support: jQuery <1.8
  function(elem, i, match) {
   var reg = /^\/((?:\\\/|[^\/]) )\/([mig]{0,3})$/.exec(match[3]);
   return RegExp(reg[1], reg[2]).test($.trim(elem.innerHTML));
  }

});

