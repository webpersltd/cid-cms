$(document).ready(function(){

    $(document).on("click",".pagination li a",function(event){

        event.preventDefault();
        var page    = $(this).attr("data-ci-pagination-page");
        var infoFor = $(this).attr("href").split("_")[1].split("/")[0];
        var url     = "http://localhost/CID/get_info/pgn/"+page;

        if(infoFor != "" && page != ""){
            $.post(
                url, 
                {start: page, info_for: infoFor}, 
                function(result){
                    $("#myRecord").html(result.information_table);
                    $("#pagination_myRecord").html(result.pagination_link);
                    //alert(result.pagination_link);
                }, "json"
            );
        }

    });
});
