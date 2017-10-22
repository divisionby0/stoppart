$(document).ready(function(){
    console.log("doc ready");

    var currentLanguage = $("#currentLanguage").text();
    var addLang = $("#currentAddLanguage").text();
    var userId = $("#userId").text();

    var likeLangData = new Array();
    likeLangData["en"] = "Like";
    likeLangData["ru"] = "Нравится";

    var likeImages = new Array("/img/heart3.gif", "/img/hheart3.gif");

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

    var loadListingsEnabled = true;

    var scriptTimeStart = 0;

    getCatalogListingsTotalItems = catalogParameters.listingsRequestTotalItems;

    console.log("catalogParameters=",catalogParameters);

    $("#getMoreListingButton").click(function(){
        catalogCurrentOffset+=getCatalogListingsTotalItems;
        // create ajax
        getCatalogListings(catalogCurrentOffset);
    });

    function onCatalogListingsLoadedQuantity(totalItems){
        if(totalItems==0){
            loadListingsEnabled = false;
        }
    }

    function loadCatalogListings(offset){
        var date = new Date();
        scriptTimeStart = date.getTime();
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
            offset: offset,
            listingsRequestTotalItems:catalogParameters.listingsRequestTotalItems,
            userId:userId
        } )
            .done(function( data ) {
                onCatalogListingsLoadComplete(data);
            });
    }
    function onCatalogListingsLoadComplete(data){
        var dataObject = JSON.parse(data);
        console.log("dataObject", dataObject);
        var totalItems = dataObject.length;

        onCatalogListingsLoadedQuantity(totalItems);

        for(var i=0; i<totalItems; i++){
            var bottomDataString = dataObject[i].bottomData;
            var bottomDataObject = JSON.parse(bottomDataString);
            var topDataObject = dataObject[i].topData;

            var id = dataObject[i].id;
            var link = dataObject[i].link;
            var price = dataObject[i].price;
            var name = topDataObject.rowname;
            var tipOfMaterialname = topDataObject.TipOfMaterialname;

            var itemHtmlString = "<div class='catalogListingsItem col-md-4'><div class='catalogListingsItemContent'>";

            var itemHeaderString = createCatalogListingsItemHeader(link, name, tipOfMaterialname);
            itemHtmlString+=itemHeaderString;

            var itemImageString = "<a href='"+link+"' target='_blank'><img src="+dataObject[i].img+"></a>";
            itemHtmlString+=itemImageString;

            var country = bottomDataObject.country;
            var name = bottomDataObject.name;
            var strbrname = bottomDataObject.strbrname; // TODO узнать что это

            var basketString = dataObject[i].strbaskLinkText;
            var basketUrl = dataObject[i].strbaskLinkUrl;
            var shopId = dataObject[i].shopId;

            var likeValue = bottomDataObject.likeValue;

            var itemFooterString=createCatalogListingsItemFooter(name, country, price, basketString, basketUrl, shopId);
            itemHtmlString+=itemFooterString;

            var likeElement = createLikeElement(id, likeValue);

            itemHtmlString+=likeElement;

            itemHtmlString+"</div></div>";

            var itemElement = $(itemHtmlString);

            itemElement.appendTo($("#catalogListings"));
            itemElement.find(".likeElement").click(function(){
                var element = $(this);
                var id = element.data("itemid");
                onLikeClicked(id);
            });

        }
        var date = new Date();
        var scriptTimeFinish = date.getTime();
        console.log("script  time "+(scriptTimeFinish-scriptTimeStart)/1000);
    }

    function getCatalogListings(offset){
        if(loadListingsEnabled){
            loadCatalogListings(offset);
        }
        else
        {
            console.log("no more catalog listings available");
        }
    }

    function createCatalogListingsItemHeader(link, name, tipOfMaterialname){
        var itemHeaderString = "<div class='col-md-12 catalogListingsItemHeader'><a href='"+link+"' target='_blank'><b><div class='catalogListingsItemTextView'>"+name+"</div></b>";

        if(tipOfMaterialname){
            itemHeaderString+="<div class='spacer'></div>"+tipOfMaterialname;
        }

        itemHeaderString+="</a></div>";

        return itemHeaderString;
    }

    function createCatalogListingsItemFooter(name, country, price, basketString, basketUrl, shopId){

        var itemFooterString = "<div class='row catalogListingsItemFooterTextContainer'>";

        itemFooterString+="<div class='col-md-12'><div class='catalogListingsItemTextView'>"+name+"</div>";
        itemFooterString+="<div class='catalogListingsItemTextView'>"+country+"</div></div>";

        var costElement="<div class='col-md-12' style='line-height: 2px;'><div class='catalogListingsItemTextView catalogListingsItemPriceView'>"+price+"</div><div class='catalogListingsItemPriceRubView'></div>";
        costElement+="<div class='spacer'></div><div class='catalogListingsItemTextView'><a href='"+basketUrl+"' target='market' id='"+shopId+"'>"+basketString+"</a></div>";
        costElement+= "</div></p>";

        itemFooterString+=costElement;

        itemFooterString+="</div>";

        return itemFooterString;
    }

    function createLikeElement(id, likeValue){
        var likeImgSource = likeImages[likeValue];

        var likeElementHtml = "<div class='row catalogListingsItemFooterLikeContainer'><div data-itemId='"+id+"' class='likeElement col-md-5' style='cursor: pointer;'>";

        likeElementHtml+="<div class='catalogListingsItemTextView'><img id='likeImage"+id+"' class='likeImage' data-itemId='"+id+"' src='"+likeImgSource+"'></div><div class='catalogListingsItemTextView likeElement'>"+likeLangData[currentLanguage]+"</div>";
        likeElementHtml+="</div></div>";
        return likeElementHtml;
    }

    getCatalogListings(0);
    onScroll();

    function onLikeClicked(id){
        if(id){
            var tag = "like";
            if(currentLanguage=="ru"){
                tag+="Ru";
            }
            tag+=id;
            LikeEngine(tag);
        }
    }

    function LikeEngine(tag){
        var url = "/le.php?id="+tag+"&uid="+userId+addLang;
        var responseString = $.ajax({url:url, async: false}).responseText;
        var responseData = JSON.parse(responseString);
        var value = responseData.countQuantStr;
        var itemId = responseData.id.replace(/\D/g, '');

        onLikeChanged(value, itemId);
    }

    function onLikeChanged(value, itemId){
        if(value==1){
            $("#likeImage"+itemId).attr("src","/img/hheart3.gif");
        }
        else{
            $("#likeImage"+itemId).attr("src","/img/heart3.gif");
        }
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