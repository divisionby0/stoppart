$(document).ready(function(){
    console.log("doc ready");
    var cost1 = 950;
    var cost2 = 1090;
    var cost3 = 2190;

    var overlay = $("#overlay");
    var open_modal = $(".openmodal");
    var close = $(".modalclose, #overlay");
    var modal;

    var modalFormOverlay;
    var itemAddedDialog;

    function createModal(){
        var dialogText = $("#modalDialogText").text();
        return $('<div id="modalDialog" class="centered" style="text-align:center;display:block; width:400px; height:auto; padding-top:5px; padding-bottom:5px; background-color: white;"><div style="margin: auto;"><h2>'+dialogText+'</h2><span style="margin:auto; font-size:18px;font-weight:300;color:#0000CC;TEXT-DECORATION: underline; cursor: hand;" id="modalclose">X</a></span></div></div>');
    }
    function createModalOverlay(){
        return $('<div id="modalDialogOverlay" style="position:absolute; opacity:0.5; z-index:0; top:0px; left:0px; width:100%; height:100%; background-color: white;"></div>');
    }

    function CloseModal(){
        console.log("closing modal...");
        $("#modalDialogOverlay").remove();
        $("#modalDialog").remove();
    }
    
    var a = $(this).text();

    $("a[id*=ishop]").click(function(){
        var modalFormOverlay = createModalOverlay();
        modalFormOverlay.appendTo('body');

        modalFormOverlay.css("height", $(document).height());

        itemAddedDialog = createModal();
        itemAddedDialog.appendTo('body');

        var currentTopPosition = itemAddedDialog.offset().top;

        itemAddedDialog.css("top", currentTopPosition+$(window).scrollTop()+"px");
        itemAddedDialog.fadeIn()
            .css({top:currentTopPosition, position:'absolute'})
            .animate({top:currentTopPosition+$(window).scrollTop()}, 200);

        itemAddedDialog.click(function(){
            CloseModal();
        });
        modalFormOverlay.click(function(){
            CloseModal();
        });
    });

    $("#modalformOverlay, #modalform").click( function(){
        CloseModal();
    });
    
    $(this).keydown(function(eventObject){
        if (eventObject.which == 27){
            CloseModal();
        }
    });

    $("input[name*='optionRadio']").change(function (event) {
        var element = $(event.target);
        var itemId = element.data("itemid");
        var value = element.val();
        console.log("changed");
        
        var response = $.ajax(
            {
                url: "/le.php?id=" +itemId+"&radio="+value,
                async: false
            }).responseText;

        var itemId2="size"+itemId;
        console.log("element id to update "+itemId2);

        console.log("response: "+response);

		console.log("Element id to update #"+itemId2);
		console.log("Element to update ",$("#"+itemId2));
		
		var data = JSON.parse(response);
		console.log("data: ",data);
		
		$("#ishop"+itemId).attr("href", data.link);
		var price = data.price;
		$('*[data-pricevalueelementd="'+itemId+'"]').html(price+" "+data.imageElement);
		
        console.log("update complete !");
    });
});