$(document).ready(function(){
    $("#searchButtonContainer").click(function(event){
        event.preventDefault();
        var searchString = $("#searchInput").val();
        var searchForm =$("#searchForm");
        var searchFormName = searchForm.attr("name");
        window.location.href = "/?"+searchFormName+"="+searchString;
    });
});
