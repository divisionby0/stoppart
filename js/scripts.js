$(document).ready(function(){
    console.log("doc ready");

    var catalogCurrentOffset = 0;
    var getCatalogListingsTotalItems = 2;

    var scrollMax = 154;
    var currentState;
    var NORMAL = "NORMAL";
    var EXTENDED = "EXTENDED";

    var overlay = $("#overlay");
    var open_modal = $(".openmodal");
    var close = $(".modalclose, #overlay");
    var modal = $(".modaldiv");
    var cost1 = 890;
    var cost2 = 990;
    var cost3 = 2190;

    var menuInitPositionY = $("#menuContainer").css("top");
    var currentScrollPosition;

    var dragAnimationDuration = 600;
    var destroyAnimationDuration = 100;

    var totalBasketElements;

    var catalogParametersData = $("#catalogParametersDataContainer").text();
    var catalogParameters = JSON.parse(catalogParametersData);

    getCatalogListingsTotalItems = catalogParameters.listingsRequestTotalItems;

    console.log("catalogParameters=",catalogParameters);

    $("#getMoreListingButton").click(function(){
        catalogCurrentOffset+=getCatalogListingsTotalItems;
        // create ajax

        $.get( "/php/div0/getCatalogListingsRequest.php", {
            menuname2: catalogParameters.menuname2,
            menuname3: catalogParameters.menuname3,
            menuname4: catalogParameters.menuname4,
            menuname5: catalogParameters.menuname5,
            HotStr: catalogParameters.HotStr,
            HotStr3: catalogParameters.HotStr3,
            Filter: catalogParameters.Filter,
            Sort: catalogParameters.Sort,
            RightUslovie: catalogParameters.RightUslovie,
            stroka_sort: catalogParameters.stroka_sort,
            firstpage: catalogParameters.firstpage,
            numberofpages: catalogParameters.numberofpages,
            ShAll: catalogParameters.ShAll,
            language: catalogParameters.language,
            bgColorOfBottom: catalogParameters.bgColorOfBottom,
            offset: catalogCurrentOffset,
            listingsRequestTotalItems:catalogParameters.listingsRequestTotalItems
        } )
            .done(function( data ) {
                console.log("ajax response "+data);
                var infoElement = $(data);
                infoElement.appendTo($("#catalogListings"));
            });
    });

    onScroll();

    function LikeEngine(tag){
        var html = $.ajax({url: '/le.php?id=' +tag+'&uid=".$userid.$addlang."',async: false}).responseText;
        document.getElementById(tag).innerHTML=html;
    }


    function CloseModal()
    {
        $("#modalform").animate({opacity: 0, top: "45%"}, 200,	function(){$(this).css("display", "none");$("#overlay").fadeOut(400);});
        overlay.css("display", "none");
    }
    var a = $(this).text();
    $("a[id^=ishop]").click(function(){
        overlay.css("display", "block");
        $("#modalform").css("display", "block").animate({opacity: 1, top: "50%"}, 200);
    });
    $("#modalclose, #overlay").click( function(){
        CloseModal();
    });
    $(this).keydown(function(eventObject){
        if (eventObject.which == 27){
            CloseModal();
        }
    });

    $("input[name*='optionRadio']").change(function (event) {
        var element = $(event.target);  var itemId = element.data("itemid");
        var value = element.val();
        var response = $.ajax({url: "/le.php?id=" +itemId+"&radio="+value,async: false}).responseText;
        var itemId2="size"+itemId;
        var data = JSON.parse(response);
        var price = data.price;
        $("#ishop"+itemId).attr("href", data.link);
        $('*[data-pricevalueelementd="'+itemId+'"]').html(price+" "+data.imageElement);
    });
    
    function onStateChanged(){
        switch(currentState){
            case NORMAL:
                $("#menuContainer").removeClass("absolutePositionMenu");
                $("#menuContainer").addClass("relativePositionMenu");
                $("#normalSiteMenu").show();
                $("#smallSiteMenu").hide();
                break;
            case EXTENDED:
                $("#menuContainer").removeClass("relativePositionMenu");
                $("#menuContainer").addClass("absolutePositionMenu");
                $("#normalSiteMenu").hide();
                $("#smallSiteMenu").show();
                break;
        }
    }

    function updateMenuPosition(positionY){
        if(currentState == EXTENDED){
            $("#menuContainer").css("top",positionY);
        }
        else{
            $("#menuContainer").css("top",menuInitPositionY);
        }
    }

    function onScroll(){
        currentScrollPosition = window.pageYOffset;
        updateMenuPosition(currentScrollPosition);
        if(currentScrollPosition > scrollMax){ if(currentState!=EXTENDED){ currentState = EXTENDED; onStateChanged(); } }
        else{
            if(currentState!=NORMAL)	 {
                currentState = NORMAL;
                onStateChanged();
            }
        }
    }

    $(window).scroll(function(){
        onScroll();
    });


    var scrollUp = document.getElementById('scrollup');

    scrollUp.onmouseover = function() {
        scrollUp.style.opacity=0.6;	 scrollUp.style.filter  = 'alpha(opacity=30)';
    };
    scrollUp.onmouseout = function()  {
        scrollUp.style.opacity = 0.8;scrollUp.style.filter  = 'alpha(opacity=50)';
    };
    scrollUp.onclick = function() {
        window.scrollTo(0,0);
    };

    window.onscroll = function () { // при скролле показывать и прятать блок
        if ( window.pageYOffset > 300 ) { 
            scrollUp.style.display = 'block';
        }
        else{ 
            scrollUp.style.display = 'none'; 
        }

    };

    //BASKET

    $(".totalBasketElements").each(function(index,element){
        totalBasketElements = parseInt($(element).text());
    });

    if(isNaN(totalBasketElements)){
        totalBasketElements = 0;
    }

    function updateTotalBasketElements(){
        $(".totalBasketElements").text(totalBasketElements);
    }

    $("[id*=ishop]").click(function(){

        var basketElement = $("#basketcontain");
        var idPostfix = $(this).attr("id").split("ishop")[1];


        if(idPostfix){
            var imageElement = $("#img"+idPostfix);

            var basketTop = basketElement.offset().top;
            var basketLeft = $(document).width() - 80;

            var imgclone = imageElement.clone()
                .offset({
                    top: imageElement.offset().top,
                    left: imageElement.offset().left
                })
                .css({
                    'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '210px',
                    'z-index': '100'
                })
                .appendTo($('body'))
                .animate({
                    'top': basketTop + 10,
                    'left': basketLeft + 10,
                    'width': 21,
                    'height': 15
                }, dragAnimationDuration,function(){
                    totalBasketElements++;
                    console.log("totalBasketElements="+totalBasketElements);
                    updateTotalBasketElements();
                });

            imgclone.animate({
                'width': 0,
                'height': 0
            }, destroyAnimationDuration, function () {
                $(this).detach();
            });
        }
        else{
            console.error("Undefined item id");
        }
    });
    
    /*
    // Listings View filters
    var menuFilterTip = document.getElementById('filtertip');
    var menuFilterPic = document.getElementById('filterpic');
    var menuFilterForm = document.getElementById('filterform');
    var menuFilterBrand = document.getElementById('filterbrand');

    if(menuFilterTip){
        var titleFilterTip = menuFilterTip.querySelector('.title');
        titleFilterTip.onclick = function() {menuFilterTip.classList.toggle('open');};
    }
    if(menuFilterPic){
        var titleFilterPic = menuFilterPic.querySelector('.title');
        titleFilterPic.onclick = function() {menuFilterPic.classList.toggle('open');};
    }
    if(menuFilterForm){
        var titleFilterForm = menuFilterForm.querySelector('.title');
        titleFilterForm.onclick = function() {menuFilterForm.classList.toggle('open');
        };
    }
    if(menuFilterBrand){
        var titleFilterBrand = menuFilterBrand.querySelector('.title');
        titleFilterBrand.onclick = function() {menuFilterBrand.classList.toggle('open');
        };
    }
    */
    
});