<?php


class HTMLHead
{
    public function __construct($userid, $addlang, $MainLabel)
    {
        echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>'.$MainLabel.'</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<meta name="robots" content="index, follow" />
<meta name="keywords" content="ифз, ломоносовский фарфоровый завод, купить фарфор, лфз, императорский, кобальтовая сетка, сервизы, где купить фарфор, дорогой фарфор, кружки фарфор, элитный фарфор, посуда из фарфора, 
посуда фарфор, посуда фарфоровая интернет магазин, продажа фарфора, русский фарфор, сервиз фарфор, сервиз фарфор чайный, сервизы из фарфора, советский фарфор статуэтки, столовый сервиз фарфор, фарфор в москве, фарфор купить, 
посуда фарфор, посуда фарфоровая интернет магазин, продажа фарфора, русский фарфор, сервиз фарфор, сервиз фарфор чайный, сервизы из фарфора, советский фарфор статуэтки, столовый сервиз фарфор, фарфор в москве, фарфор купить, 
фарфоровая посуда купить, статуэтки из фарфора,
императорский фарфор, императорский фарфор магазин, фарфор императорского завода, императорский фарфор москва, императорский фарфор купить, фарфор императорского фарфорового завода, императорский фарфор сайт, императорский фарфор спб, императорский фарфор санкт петербург, императорский фарфор адреса магазинов, императорский фарфор интернет магазин, императорский фарфор ростов, императорский фарфоровый завод, магазин фарфора, императорский фарфоровый, ломоносовский фарфор, императорский завод, ломоносовский фарфоровый завод, фарфор лфз, императорский фарфоровый завод официальный сайт, фарфор купить, ломоносовский фарфор купить, фарфор ифз, интернет магазин фарфора, фарфор спб, кобальтовая сетка, магазин фарфоровый завод, ломоносовский завод, сайт императорского фарфорового завода, императорский фарфоровый завод официальный, императорский фарфоровый завод интернет магазин, императорский фарфоровый завод интернет магазин официальный сайт, петербург императорский фарфоровый завод, императорский фарфоровый завод санкт петербург, императорский фарфоровый завод каталог, спб императорский фарфоровый завод, сервиз императорский фарфоровый завод, императорский фарфоровый завод купить, императорский фарфоровый завод москва, императорский фарфоровый завод каталог товаров, магазин фарфора, магазин фарфоровый завод, фарфор лфз, фарфор ифз, ифз, ифз официальный, ифз официальный сайт, ифз санкт петербург, ифз санкт петербург официальный сайт, ифз интернет магазин, сервиз ифз, скульптуры ифз, фарфор купить, фарфор доставка, фарфор уфа, фарфор самара, фарфор тольятти, фарфор казань, фарфор купить интернет магазин, костяной фарфор купить, фарфор сервиз купить, чайная пара фарфор купить, фарфор лфз купить
" />
<meta name="description" content="Императорский фарфор. Официальный магазин ИФЗ." />
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<base target="_top"></base>
';//<link href="/bitrix/templates/gipertwo_/favicon.ico" rel="shortcut icon">
//Счетчик Гугла
        echo '	<script type="text/javascript" src="/jquery-1.8.2.min.js"></script>';
        echo '	<script type="text/javascript" src="/js/div0/basket.js"></script>';
        echo "<script type='text/javascript'>
var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-21694937-1']);_gaq.push(['_trackPageview']);
(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();</script>";

        echo"<script>function LikeEngine(tag){
var html = $.ajax({url: '/le.php?id=' +tag+'&uid=".$userid.$addlang."',async: false}).responseText;
document.getElementById(tag).innerHTML=html;}</script>";

        echo '<script type="text/javascript">
$(document).ready(function(){
	var overlay = $("#overlay");var open_modal = $(".openmodal");var close = $(".modalclose, #overlay");var modal = $(".modaldiv"); 
    var cost1 = 890;    var cost2 = 990;    var cost3 = 2190;
	function CloseModal(){
		$("#modalform").animate({opacity: 0, top: "45%"}, 200,	function(){$(this).css("display", "none");$("#overlay").fadeOut(400);});
		overlay.css("display", "none");
	}
	var a = $(this).text();
	$("a[id^=ishop]").click(function(){overlay.css("display", "block");
	$("#modalform").css("display", "block").animate({opacity: 1, top: "50%"}, 200);});
	$("#modalclose, #overlay").click( function(){ CloseModal();});
	$(this).keydown(function(eventObject){if (eventObject.which == 27){CloseModal();}});

	$("input[name*=\'optionRadio\']").change(function (event) {
		var element = $(event.target);  var itemId = element.data("itemid");  var value = element.val();
		var response = $.ajax({url: "/le.php?id=" +itemId+"&radio="+value,async: false}).responseText;
		var itemId2="size"+itemId; var data = JSON.parse(response); var price = data.price;
		$("#ishop"+itemId).attr("href", data.link);
		$(\'*[data-pricevalueelementd="\'+itemId+\'"]\').html(price+" "+data.imageElement);
    });

	// menu
	var scrollMax = 154; var currentState; var NORMAL = "NORMAL"; var EXTENDED = "EXTENDED";
	var menuInitPositionY = $("#menuContainer").css("top"); var currentScrollPosition;
    
	onScroll();
	
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
		if(currentState == EXTENDED){ $("#menuContainer").css("top",positionY); }
		else						{ $("#menuContainer").css("top",menuInitPositionY); }
	}

	function onScroll(){
		currentScrollPosition = window.pageYOffset;
		updateMenuPosition(currentScrollPosition);
		if(currentScrollPosition > scrollMax){ if(currentState!=EXTENDED){ currentState = EXTENDED; onStateChanged(); } }
		else{						           if(currentState!=NORMAL)	 { currentState = NORMAL;   onStateChanged(); } }
	}
    
	$(window).scroll(function(){   onScroll();  });
});//1
</script>';

        echo "<script type='text/javascript'>window.onload = function() { // после загрузки страницы
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
	// show button
	window.onscroll = function () { // при скролле показывать и прятать блок
		if ( window.pageYOffset > 300 ) { scrollUp.style.display = 'block';} 
		else 							{ scrollUp.style.display = 'none'; }

	};
};</script>";

        echo '<style type="text/css">
.big-link { 
	display:block; 
	margin-top: 100px; 
	text-align: center; 
	font-size: 20px; 
	color: #06f; 
}
#modalform {
	display: none;
	top: 100px; 
	left: 50%;
	margin-left: -300px;
	width: 350px;
	background: #FFF url("/jquery/reveal/modal-gloss.png") no-repeat -200px -80px;
	position: fixed;
	z-index: 101;
	padding: 30px 40px 34px;
	-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;
	-moz-box-shadow: 0 0 10px rgba(0,0,0,.4);
	-webkit-box-shadow: 0 0 10px rgba(0,0,0,.4);
	box-shadow: 0 0 10px rgba(0,0,0,.4);
}
#modalclose {
	font-size: 22px;
	line-height: .5;
	position: absolute;
	top: 8px;
	right: 11px;
	color: #aaa;
	text-shadow: 0 -1px 1px rbga(0,0,0,.6);
	font-weight: bold;
	cursor: pointer;
}
#overlay {
	position: fixed; 
	height: 100%;
	width: 100%;
	background: #000;
	opacity: 0.1;
	z-index: 100;
	display: none;
	top: 0;
	left: 0;
}</style>';

        echo '</HEAD>';
    }
}