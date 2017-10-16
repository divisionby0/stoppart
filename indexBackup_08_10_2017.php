<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);

session_set_cookie_params(1080000);
require_once("shop_func.php");
require_once("box_func.php");
require_once("parser.php");
require_once("gui.php");
require_once("php/div0/views/menu/SiteMenu.php");
//require_once("php/div0/views/menu/SmallSiteMenu.php");
prepare_parse("box.inc.html");

session_start();set_session_vars();
$HotStr='';
$menuVersion = whichshop3();
if($menuVersion=='ifarfor') $bclr='AD9E82'; else $bclr='82a0ae';//8da39e
//$searchline=post('search');if($searchline!=''){new_header('location:index.php?search='.$searchline);}
$searchline=$_GET['search'];if($searchline=='')$searchline=$_GET['search1'];
$shiftleftmenu='23';$sizebetweenfilters='3';$sizebottomleftmenu='10';
$shiftleftedge='40';//
if($searchline!='') $HotStr=$searchline;
global $order;$bgColorOfBottom='#FFFFFF';
$menuname=$_GET['menu'];
if($menuname=="en"){$language=$menuname;$menuname=$_GET['menu2'];$menuname2=$_GET['menu3'];$menuname3=$_GET['menu4'];$menuname4=$_GET['menu5'];$menuname5=$_GET['menu6'];$menuname6=$_GET['menu7'];}
else{$menuname2=$_GET['menu2'];$menuname3=$_GET['menu3'];$menuname4=$_GET['menu4'];$menuname5=$_GET['menu5'];$menuname6=$_GET['menu6'];}
//$lang=$_GET['language'];
if($language=="en"){$langstr="/en";$unlangstr="";$tovarstr="A new item has been added to your Shopping Cart.";
	$sortstr0="Sort by:";$sortstr2="Name";$sortstr3="Cost";$ifstr="or";$logogif="/ifarfor.gif";
	$showallstr="Show all";$shownotallstr="Only with photo";$langaddstr="?language=en";$MainLabel="Imperial porcelain. Official store.";
	$adrstr="Addresses and phones";$phonestr="<b>+7 927 268-15-33</b>";
	$namestr="Official store of Imperial Porcelain Manufacture. Russia.";$searchstr="search2en.box";$LabelAlt="IMPERIAL PORCELAIN";$Rollupalt="Roll up";
	$ComeBackToSearch="Come back to search results";$strbrname="Produced by";
	$NotOnStock1="<br>Unfortunately the goods with articul "; $NotOnStock2=" was ended.<br> 
	You can order this product for manufacturing. <br>
	Manufacturing time from one to three months. 
	<br>To create an order for this product, you should write a request in free form to e-mail";
	$FILTR="FILTERS";
	$nameof="english";$Typemat="Kind of material";$Typepic="Picture";$Typeform="Shape";$Typefac="Factory";
}
else{$langstr="";$unlangstr="/en";$tovarstr="Товар успешно добавлен в корзину.";$sortstr0="Сортировать по:";$sortstr2="Названию";$sortstr3="Цене";$ifstr="или";
	$showallstr="Показывать всё";$shownotallstr="Только с фотографией";$logogif="/logo_ifarfor.gif";$MainLabel="Императорский фарфор. Официальный магазин АО «ИФЗ».";
	$adrstr="Адреса и телефоны";$phonestr='<b title="Бесплатный звонок по России. C 9:00 до 18:00 MSK">8 (800) 2222-850 </b>';
	$namestr="Фирменные магазины АО «ИФЗ».";$searchstr="search2.box";$LabelAlt="ИМПЕРАТОРСКИЙ ФАРФОР";$Rollupalt="Прокрутить вверх";
	$ComeBackToSearch="Вернуться к результатам поиска";$strbrname="Производство";
	$NotOnStock1="<br>К сожалению товар с артикулом "; $NotOnStock2="закончился.<br> 
	Вы можете заказать этот товар для изготовления на производстве. <br>
	Срок изготовления от одного до трёх месяцев. 
	<br>Для создания заказа на этот товар можно обратиться по телефону: <br>8 (800) 2222-850 c 09:00 до 18:00 по Московскому времени.";
	$FILTR="ФИЛЬТРЫ";
	$nameof="name";$Typemat="Тип материала";$Typepic="Рисунок";$Typeform="Форма";$Typefac="Производитель";
}

if($menuname==''){
if($menuVersion=='ifarfor') 	
	{$menuname='shop';$menuname2='ware';global $HotStr3;
	$HotStr3='newyear';$HotStr3='easter';$HotStr3='love';$HotStr3='russianstyle';$HotStr3='cobaltnet';}
else {
$menuname='shop';$menuname2='artplate';$menuname3='stoppard';	
}
}
	
if($menuVersion=='ifarfor'){
$menu=array(
	array("ware","Фарфоровая посуда","serv","Сервизы и наборы","stol","Столовые предметы",
		"grafin","Графины","teacof","Чайные и кофейные предметы","horeca","Посуда для кафе и ресторанов"),
	array("sculpture","Скульптура","animalist","Анималистическая","janre","Жанровая"),
	array("crystal","Хрусталь","colour","Цветной хрусталь","bohema","Богемское стекло","tray","Блюда/ подносы","glass","Бокалы/ Фужеры/ Стаканы Рюмки/ Стопки","layout","Вазы для сервировки стола","shtof","Графины/ кувшины/ штофы","caviar","Икорницы/ рыбницы","crset","Хрустальные сервизы"),
	array("artplate","Декоративные тарелки","stoppard","Декоративные тарелки Stoppard","decoplate","Декоративные тарелки ИФЗ","holder","Подставки для тарелок"),//"vodka","Для водки","water","Для воды","martini","Для мартини","champagne","Для шампанского","glasses","Стеклянная посуда"
	array("tableware","Столовые приборы","settw","Наборы столовых приборов","single","Отдельные предметы"),
	array("souvenirs","Сувениры","krstrochka","Крестецкая строчка","ariel","Новогодние игрушки Ариэль","majolica","Ярославская майолика","rings","Колокольчики","dymkatoy","Дымковская игрушка","ceramic","Семикаракорская керамика","souvenir","Сувениры из фарфора","crsouv","Сувениры из хрусталя"),
	array("interior","Предметы интерьера","vases","Вазы","colour","Вазы из цветного хрусталя","ring","Кольцо для салфеток","candlest","Подсвечники","textile","Текстиль","frame","Фоторамки","casket","Шкатулки и коробочки")
);//"aroma","Ароматы и свечи",
$menuenglish=array(
	array("ware","Porcelain ware","serv","Tableware & teaware set","stol","Tableware pieces",
		"grafin","Decanters","teacof","Teaware pieces","horeca","Hotel&restaurant ware"),
	array("sculpture","Sculpture","animalist","Animalistic","janre","Genre"),
	array("crystal","Crystal","colour","Coloured crystal","bohema","Glass ware","tray","Tray","glass","Drinking glasses","layout","Vases for table","shtof","Decanters","caviar","Dishes for fish","mugs","Mugs","socket","small crystal vases","crset","Crystal set"),
	array("artplate","Decorative plates","stoppard","Decorative plates Stoppard","decoplate","Decorative plates IPM","holder","Holder for plates"),
	array("tableware","Cutlery (Flatware)","settw","Cutlery set","single","Cutlery pieces"),
	array("souvenirs","Gifts","krstrochka","Kresteckaya strochka","ariel","Christmas toys","majolica","Jaroslavl's majolica","dymkatoy","Dymkovo toys","ceramic","Ceramic gift","souvenir","Porcelain gift","crsouv","Crystal gift"),
	array("interior","Home & gifts","vases","Vases","colour","Colour crystal vases","ring","Napkin rings","candlest","Candlesticks","textile","Tablecloths & textil napkins","frame","Photo Frames","casket","Boxes & caskets")
);//"aroma","Home parfum & candles",
}	
else //STOPPARD
{
	$menu=array(
	array("artplate","Декоративные тарелки","stoppard","Stoppard","holder","Подставки для тарелок"),
	array("artholder","Подставки","holder","Подставки для тарелок")
);
	$menuenglish=array(
	array("artplate","Decorative plates","stoppard","Stoppard","holder","Holder for plates"),
	array("artholder","Holder","holder","Holder for plates")
);
}
//Ищем есть ли в строке товар для Превью
//заканчиваем шапку, начинаем верхнее меню.
//=======================Определяем какая группа товаров выбрана======================================
switch($menuname2){  case $menu[0][0]: $m2=0;break;
	case $menu[1][0]: $m2=1;break;
	case $menu[2][0]: $m2=2;break;
	case $menu[3][0]: $m2=3;break;
	case $menu[4][0]: $m2=4;break;
	case $menu[5][0]: $m2=5;break;
	case $menu[6][0]: $m2=6;break;
	case $menu[7][0]: $m2=7;break;
	default: $m2=1;}
if($searchline!=""){$menuname="search";$m2=99;}
if($viewstr!="")$m2=99;
//=====================По названию определяем, какая подгруппа выбрана================================
switch($menuname3){  case $menu[$m2][2]: $m3=0;break;
	case $menu[$m2][4]: $m3=1;break;
	case $menu[$m2][6]: $m3=2;break;
	case $menu[$m2][8]: $m3=3;break;
	case $menu[$m2][10]: $m3=4;break;
	case $menu[$m2][12]: $m3=5;break;
	case $menu[$m2][14]: $m3=6;break;
	case $menu[$m2][16]: $m3=7;break;
	default: $m3=1;}
//Ищем страницу
$firstpage='';$numberofpages='';
//Ищем метод сортировки по переменным
$sortby='name';$sortway='';$sortstr='';$firstpage="01";$numberofpages="42";$ShAll="0";
if(substr($menuname3, 0, 4)=="sort"){$sortby=substr($menuname3, 6, 4);$sortway=substr($menuname3, 11, 1);
	$firstpage=substr($menuname3, 10, 2);$numberofpages=substr($menuname3, 12, 2);$ShAll=substr($menuname3, 14, 1);$menuname3="";}
elseif(substr($menuname4, 0, 4)=="sort"){$sortby=substr($menuname4, 6, 4);$sortway=substr($menuname4, 11, 1);
	$firstpage=substr($menuname4, 10, 2);$numberofpages=substr($menuname4, 12, 2);$ShAll=substr($menuname4, 14, 1);$menuname4="";}
elseif(substr($menuname5, 0, 4)=="sort"){$sortby=substr($menuname5, 6, 4);$sortway=substr($menuname5, 11, 1);
	$firstpage=substr($menuname5, 10, 2);$numberofpages=substr($menuname5, 12, 2);$ShAll=substr($menuname5, 14, 1);$menuname5="";}
elseif(substr($menuname6, 0, 4)=="sort"){$sortby=substr($menuname6, 6, 4);$sortway=substr($menuname6, 11, 1);
	$firstpage=substr($menuname6, 10, 2);$numberofpages=substr($menuname6, 12, 2);$ShAll=substr($menuname6, 14, 1);$menuname6="";};
if(isset($_POST['npage'])) $firstpage=$_POST["npage"] ;
if(isset($_POST['ShowFoto'])) $ShAll="0";
if(post('ShowFoto')=='yes')$ShAll="1";
//if($language=='')$language='ru';						
if($sortway=='')$sortway='';
if($sortby!='') $sortstr='sortby'.$sortby.'01'.$numberofpages.$ShAll;//$sortway.
else			$sortstr='sortbyname0142'.$ShAll;//по умолчанию сортируем по имени
if($Filter!="")  $sortstr=$sortstr."/".$filterstr;
$stroka_sort="$langstr/shop";$unstroka_sort="$unlangstr/shop";//$Zagolovok='Чайные сервизы';// надо ли это вообще? ///////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($menuVersion =='stoppart') $stroka="stoppart.com"; else $stroka="ifarfor.ru";
if($language=='en')$marketstr="market2.php?language=en&menuname=$menuname";	else $marketstr="market2.php?&menuname=$menuname";
if($menuname=="cabinet" or $menuname=="contact" or $menuname=="company" or $menuname=="delivery"){
	$stroka_unfull="$langstr/$menuname/$menuname2";
	$stroka_sort="$langstr/$menuname/$menuname2";
	$unstroka_sort="$unlangstr/$menuname/$menuname2";
}
elseif($menuname2!=""){
	for($ji=0,$ju='';$ji<7;$ji++) if($menuname2==$menu[$ji][0]){
		if($language=='en') $ju=$menuenglish[$ji][1];
		else $ju=$menu[$ji][1];
		$stroka=$stroka."/$ju";
	}
	$stroka_unfull="$langstr/shop/$menuname2";
	$stroka_sort="$langstr/shop/$menuname2/$sortstr";
	$unstroka_sort="$unlangstr/shop/$menuname2/$sortstr";
	if($ju!='')$Zagolovok=$ju;
	$marketstr.="&menuname2=$menuname2";
};
if($menuname3!=""){
	$ruru=sql("SELECT * FROM tovsNew WHERE id='$menuname3' and grp='1'");$countruru=mysqli_num_rows($ruru);$ji=0;
	if($countruru>0){
		$rowjuk=mysqli_fetch_array($ruru);
		if($language=='en') $juk=$rowjuk[english];
		else $juk=$rowjuk[name];
		if($juk=="")$juk=$rowjuk[name];
		$stroka=$stroka."<a href='".aPSID("$langstr/shop/$menuname2/$menuname3/$sortstr")."'>/$juk</a>";
		$stroka_unfull="$langstr/shop/$menuname2/$menuname3";
		$stroka_sort="$langstr/shop/$menuname2/$menuname3/$sortstr";
		$unstroka_sort="$unlangstr/shop/$menuname2/$menuname3/$sortstr";if($juk!='')$Zagolovok=$juk;
		$marketstr.="&menuname3=$menuname3";
	}
	mysqli_free_result($ruru);
}
if($menuname4!=""){
	$ruru=sql("SELECT * FROM tovsNew WHERE id='$menuname4' and grp='1'");$countruru=mysqli_num_rows($ruru);$ji=0;
	if($countruru>0){
		$rowjuk=mysqli_fetch_array($ruru);
		if($language=='en') $juk=$rowjuk[english];
		else $juk=$rowjuk[name];
		if($juk=="")$juk=$rowjuk[name];
		$stroka=$stroka."<a href='".aPSID("$langstr/shop/$menuname2/$menuname3/$menuname4/$sortstr")."'>/$juk</a>";
		$stroka_unfull="$langstr/shop/$menuname2/$menuname3/$menuname4";
		$stroka_sort="$langstr/shop/$menuname2/$menuname3/$menuname4/$sortstr";
		$unstroka_sort="$unlangstr/shop/$menuname2/$menuname3/$menuname4/$sortstr";if($juk!='')$Zagolovok=$juk;
		$marketstr.="&menuname4=$menuname4";
	}
	mysqli_free_result($ruru);
}
if($menuname5!=""){
	$ruru=sql("SELECT * FROM tovsNew WHERE id='$menuname5' and grp='1'");$countruru=mysqli_num_rows($ruru);$ji=0;
	if($countruru>0){
		$rowjuk=mysqli_fetch_array($ruru);
		if($language=='en') $juk=$rowjuk[english];
		else $juk=$rowjuk[name];
		if($juk=="")$juk=$rowjuk[name];
		$stroka=$stroka."<a href='".aPSID("$langstr/shop/$menuname2/$menuname3/$menuname4/$menuname5/$sortstr")."'>/$juk</a>";
		$stroka_unfull="$langstr/shop/$menuname2/$menuname3/$menuname4/$menuname5";
		$stroka_sort="$langstr/shop/$menuname2/$menuname3/$menuname4/$menuname5/$sortstr";
		$unstroka_sort="$unlangstr/shop/$menuname2/$menuname3/$menuname4/$menuname5/$sortstr";if($juk!='')$Zagolovok=$juk;
		$marketstr.="&menuname5=$menuname5";
	}
	mysqli_free_result($ruru);
}
if($sortstr!="")$marketstr.="&sortstr=$sortstr";
//=========================Пишем строку ссылки для изменения сортировки=========================================
if($sortby=="cost"){$sortpage=$sortstr0." <a href='".aPSID("$stroka_unfull/sortbyname$firstpage$numberofpages$ShAll")."'>$sortstr2 </a> $ifstr <b>$sortstr3</b>";$Sort='p';}
else{$sortpage=$sortstr0." <b>$sortstr2</b> $ifstr <a href='".aPSID("$stroka_unfull/sortbycost$firstpage$numberofpages$ShAll")."'>$sortstr3</a>";$Sort='n';}
if($ShAll=="1"){$Showpage="<b>$showallstr</b> $ifstr <a href='".aPSID("$stroka_unfull/sortby$sortby"."01420")."'>$shownotallstr</a>";}
else{$Showpage="<a href='".aPSID("$stroka_unfull/sortby$sortby"."01421")."'>$showallstr</a> $ifstr <b>$shownotallstr</b>";}

//====================================Конец работы с сортировкой=============================================
//==========================================================================================================	
if($menuVersion=='ifarfor') $FontMenu='19'; else $FontMenu='16'; 
$am = array();
for($i=0;$i<7;$i++){
	$menuLink=$menu[$i][0];
	if($menuLink=="ware") $menuLink="ware/serv/teaserv";
	if($menuLink=="sculpture") $menuLink="sculpture/janre/gogol";
	if($menuLink=="artplate") $menuLink="artplate/stoppard/vangogh";
	if($menuLink=="artholder") $menuLink="artholder/holder";
	if($menuLink=="tableware") $menuLink="tableware/settw";
	if($menuLink=="souvenirs") $menuLink="souvenirs/krstrochka";
	if($menuLink=="interior") $menuLink="interior/vases";
	$tekname=$menu[$i][1];
	
	if($language=="") $tekname=$menu[$i][1]; elseif($language=="en") $tekname=$menuenglish[$i][1];
	if($m2==$i) 
	{
		$strokas='<a href="'.aPSID($langstr.'/shop/'.$menuLink.'/'.$sortstr).'" style="FONT-SIZE:'.$FontMenu.'px;color:#FFFFFF;" ><B>'.my_strtoupper($tekname).'</B></a>';
	$cm[$i][0]=aPSID($langstr.'/shop/'.$menuLink.'/'.$sortstr);
	$cm[$i][1]='<b>'.my_strtoupper($tekname).'</b>';
	}
	else 
	{
	$strokas='<a href="'.aPSID($langstr.'/shop/'.$menuLink.'/'.$sortstr).'" style="FONT-SIZE:'.$FontMenu.'px;FONT-weight:300px;color:#FFFFFF;" >'.my_strtoupper($tekname).'</a>';
	$cm[$i][0]=aPSID($langstr.'/shop/'.$menuLink.'/'.$sortstr);
	$cm[$i][1]=my_strtoupper($tekname);
	}
	$am[$i]=$strokas;

};
if($language=='en')$addlang="&language=en";
//Ищем есть ли в строке активация правого меню, с горячими позициями
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
$(document).ready(function(){//1

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
	
	scrollUp.onmouseover = function() {	scrollUp.style.opacity=0.6;	 scrollUp.style.filter  = 'alpha(opacity=30)';};
	scrollUp.onmouseout = function()  { scrollUp.style.opacity = 0.8;scrollUp.style.filter  = 'alpha(opacity=50)';};
	scrollUp.onclick = function() { window.scrollTo(0,0);	};
// show button
	window.onscroll = function () { // при скролле показывать и прятать блок
		if ( window.pageYOffset > 300 ) { scrollUp.style.display = 'block';} 
		else 							{ scrollUp.style.display = 'none'; }

	};
};</script>";

echo '<style type="text/css">.big-link { display:block; margin-top: 100px; text-align: center; font-size: 20px; color: #06f; }
#modalform {
display: none;top: 100px; left: 50%;margin-left: -300px;width: 350px;background: #FFF url("/jquery/reveal/modal-gloss.png") no-repeat -200px -80px;
position: fixed;z-index: 101;padding: 30px 40px 34px;-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;
-moz-box-shadow: 0 0 10px rgba(0,0,0,.4);-webkit-box-shadow: 0 0 10px rgba(0,0,0,.4);box-shadow: 0 0 10px rgba(0,0,0,.4);}
#modalclose {font-size: 22px;line-height: .5;position: absolute;top: 8px;right: 11px;color: #aaa;text-shadow: 0 -1px 1px rbga(0,0,0,.6);font-weight: bold;cursor: pointer;}
#overlay {position: fixed; height: 100%;width: 100%;background: #000;opacity: 0.1;z-index: 100;display: none;top: 0;left: 0;}</style>';
echo '</HEAD>

<body bgcolor="#FFFFFF" link="#333366" alink="#333366" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
<link href="/'.cssname().'" type=text/css rel=stylesheet>';//Конец заголовка

if($searchline!='' and $language=="en") $unstroka_sort="/?search=$searchline";
if($searchline!='' and $language=="") $unstroka_sort="/en/?search=$searchline";
if($unstroka_sort=="" and $language=="") $unstroka_sort="/en";
elseif($unstroka_sort=="" and $language=="en") $unstroka_sort="/";
if($language=="en")$engtext="Русский"; else $engtext="English";
$hrefen='<a style="font-size:14px;TEXT-DECORATION: underline;" href="'.$unstroka_sort.'" target="_top">'.$engtext.'</a>';
echo '<table align="right" bgcolor="#FFFFFF" width="100%" height="20px" cellspacing="0" cellpadding="0" border="0">
<tr><td style="text-align:center;">   
<div id="modalform"><h2>'.$tovarstr.'</h2><span style="font-size:18px;font-weight:300;color:#0000CC;TEXT-DECORATION: underline;" 
id="modalclose">X</a></div><div id="overlay"></div>
</td>
<td style="text-align:right;FONT-SIZE: 14px;padding-right:10px;padding-top:5px;">'.$hrefen.'</td></tr></table>';

//Начало шапки
if($menuVersion=='ifarfor')
	{
	echo '<table align="center" bgcolor="#FFFFFF" width="100%" height="69px" cellspacing="0" cellpadding="0" border="0" style="">
	<tr><td width="17%" height="132px" style="text-align:left;padding-left:'.$shiftleftedge.'px;FONT-SIZE: 19px;vertical-align:top;">
	<table align="center" bgcolor="#FFFFFF" width="100%" height="69px" cellspacing="0" cellpadding="0" border="0">
	<tr><td width="17%" height="32px" style="text-align:left;FONT-SIZE: 18px;color:#333333;vertical-align:top;">
	'.$phonestr.'</td></tr><tr><td height="20px" style="text-align:left;FONT-SIZE: 20px;vertical-align:top;padding-top:5px;">		
	<a href="'.$langstr.'/contact" target="_blank" style="FONT-SIZE: 17px;">'.$adrstr.'</a>
	<img src="/empty.gif" width="150px" height="1px"></td></tr>
	<tr><td valign="top">';echo parse($searchstr,"@searchline=$searchline@left=");echo '</td></tr></table></td>
	<td width="66%" align="center" style="FONT-SIZE: 40px;text-align:center;vertical-align:top;padding-top:8px;">
	<a href="'.aPSID("$langstr/shop/sculpture/animalist/Dogs/sortbycost0142").'" target="_self">
	<img src="'.$logogif.'" alt="'.$LabelAlt.'"></a><BR>
	<div style="padding-top:20px;FONT-SIZE:17px; color="#A7A9AC;">'.$namestr;
	//Ссылка на Регистрацию и Вход, Корзина тут же в Фрейме
	echo '<td width="17%" align="left" style="vertical-align:top;padding-right:47px;">';
	$LK=LK($userid,$language);
	// id="vassa" onClick="vassa.height=\'20px\';" onMouseOver="vassa.height=\'20px\';"  onMouseOut="vassa.height=\'20px\';"
	echo '<table cellspacing="0" cellpadding="0" border="0" width="100%" align="left">
	<tr><td height="20px" style="FONT-SIZE: 16px;vertical-align: top;text-align:left;">'.$LK.'</td></tr>
	<tr><td width="150px"><img src="/empty.gif" width="150px" height="10px"></td></tr>
	<tr><td width="150px">';
	echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="86px;" id=market name=market src="'.aPSID('/'.$marketstr).'"></IFRAME>';
	echo '</td></tr></table><img src="/empty.gif" width="155px" height="1px"></td></tr></table>';
	}
else
	{
	echo '<table align="center" bgcolor="#FFFFFF" width="100%" height="75px" cellspacing="0" cellpadding="0" border="0" style="">
	<tr><td width="100%" align="center" style="text-align:center;padding-bottom:20px;">
	<a href="'.aPSID("$langstr/shop/artplate/stoppard/vangogh/sortbyname0142").'" target="_self">
	<img  height="120px"  src="/icons/logo_stoppard.gif" alt="Stoppard"></a>	
	</td><td width="0">	
	<IFRAME hspace="0"  frameborder="0"  scrolling="No" width="100%" height="1px;" id=market name=market src="'.aPSID('/'.$marketstr).'"></IFRAME></td></tr></table>';
//	echo parse($searchstr,"@searchline=$searchline@left=");//padding-left:40px;
	} 
$view='';//$sortway='';$sortstr='';
if(substr($menuname2, 0, 4)=="view"){$view=substr($menuname2, 4);$menuname2="";}
elseif(substr($menuname3, 0, 4)=="view"){$view=substr($menuname3, 4);$menuname3="";}
elseif(substr($menuname4, 0, 4)=="view"){$view=substr($menuname4, 4);$menuname4="";}
elseif(substr($menuname5, 0, 4)=="view"){$view=substr($menuname5, 4);$menuname5="";}
elseif(substr($menuname6, 0, 4)=="view"){$view=substr($menuname6, 4);$menuname6="";};
if($view!='') $viewstr='view'.$view;
if($menuname!='cabinet'){
	new SiteMenu($am,$cm,$language,$searchline,$userid);
}

if($menuname=="search"){
	$qu=printsearch($searchline);
	echo $qu;
}
elseif($menuname=='about'){
echo about();
}
elseif($menuname=='dealer'){
echo dealer();
}
elseif(($menuname=='shop' or $searchline!="") and $view==''){
	if($HotStr!='') $stroka='&nbsp;';
	//=========================рисуем строку ifarfor.ru/ХХХ	Сортировать по: ХХХ=======================================
	if($ShAll=="1")//Показывать товары без фотографий
	{$checksf='checked';} else{$checksf='';}
	$showphoto="<form name='FFilter' method='post' action=''>$Showpage";
	//	<input name='ShowFoto' $checksf type='checkbox' value='yes' onclick='FFilter.submit()'>Показывать всё (даже без фотографий)";
	echo'<table align="center" bgcolor="#F6F6F4" width="100%" cellspacing="0" cellpadding="0" border="0" 
	style="background-color:#F6F6F4;vertical-align:top;padding-bottom:25;">
	<tr><td width="17%" height="37" style="padding-left:17px;BACKGROUND-COLOR: '.$bgColorOfBottom.';"><img src="/empty.gif" width="255px" height="1px"></td>
	<td width="83%" style="text-align:left;padding-left:10px;BACKGROUND-COLOR: '.$bgColorOfBottom.';">
	<table align="center" width="100%"><tr><td width="65%" style="text-align:left;padding-left:0px;BACKGROUND-COLOR: '.$bgColorOfBottom.';">'.$stroka.'</td>
	<td width="35%" style="text-align:right;padding-right:35px;BACKGROUND-COLOR: '.$bgColorOfBottom.';">'.$showphoto.'</td></tr></table>
	</tr>';
		//=========================размещаем нижнюю часть странички=====================================================
	echo '<tr><td width="240px" height="408px" align="left" style="padding-left:7px;vertical-align: top;BACKGROUND-COLOR: '.$bgColorOfBottom.';">
	<table align="left" width="240px" height="208px" cellspacing="0" cellpadding="0" border="0">
		<tr><td height="158px" align="left" style="PADDING:10px;border :none;
			VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;text-align: left;">';
	//echo 'x';	echo PrintTopLeftMenu($showphoto,$bgColorOfBottom);echo 'x';
	//=========================нижнюю часть левого кадра страницы заносим в переменную $kusokkoda1===================
	$kusokkoda1='</td></tr>
	<tr>
	<td height="12px" align="left" style="VERTICAL-ALIGN: top;
	PADDING-LEFT:0px;PADDING-RIGHT:0px;PADDING-TOP:0px;PADDING-BOTTOM:0px;BACKGROUND-COLOR: '.$bgColorOfBottom.'"></td>
	</tr>
	<td height="400px" align="left" style="VERTICAL-ALIGN: bottom;color : #999999;font-size:14px;padding-left:0px;BACKGROUND-COLOR: '.$bgColorOfBottom.'">
	<div style="width: 247px;">';
	if($menuVersion=='ifarfor') $kusokkoda1.='© 1744-2017'; else $kusokkoda1.='© 2014-2017';
	$kusokkoda1.='<div id="scrollup"><img width="50px" alt="'.$Rollupalt.'" src="/img/up.png"></div>
	</td></tr></table>
	</td>';
	//========================средний кадр страницы добавляем в переменную $kusokkoda1===============================
	$kusokkoda1.='	
	<td height="342px" align="left" style="VERTICAL-ALIGN: top;
	BACKGROUND-COLOR: '.$bgColorOfBottom.';padding-left:10px;padding-right:27px;">';//width="776px" 
	//=========нижнюю часть левого кадра страницы для всяких музеев и контактов - заносим в переменную $kusokkoda2=======
	$kusokkoda2='</td></tr>
	<tr><td height="12px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #F6F6F4;
	PADDING-LEFT:0px;PADDING-RIGHT:0px;PADDING-TOP:0px;PADDING-BOTTOM:0px;"></td></tr>
	<tr><td width="203px" height="106px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: '.$bgColorOfBottom.';">
	<a href="http://www.hermitagemuseum.org/html_Ru/12/2003/hm12_3_3.html" target="_blank"><img src="/img/hermitage.gif"></a>
	</td></tr>
	<tr><td width="203px" height="695px" align="left" style="VERTICAL-ALIGN: bottom;BACKGROUND-COLOR: '.$bgColorOfBottom.';color : #999999;">
	© 1744-2017</td>';
	//============средний кадр страницы добавляем в переменную $kusokkoda2===================================
	$kusokkoda2.='<td width="12px" height="708px" align="left" style="BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
	<td width="744px" height="172px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;">
	<table align="center" bgcolor="#FFFFFF" width="100%" height="704px" cellspacing="0" cellpadding="0" border="0">
	<tr><td style="vertical-align: top;">';
}
elseif($menuname=='contact') echo '';
//==============Начинаем работу по определению, какую страницу размещать===================================
$i=0;$j=2;
//====================================================================================================
//====================================== М А Г А З И Н ==================================================
//====================================================================================================
//====================================================================================================
//====================================== О П И С А Н И Е==============================================
//====================================================================================================
///search/тут будем добавлять возврат к поиску
if($view!="") //тут надо поменять на исследование, выбран ли товар для превью
{$stroka='';
	//if ( !empty($_SERVER['HTTP_REFERER']) ) $stroka='<a href="' . $_SERVER['HTTP_REFERER'] . '" title="Вернуться в каталог">Вернуться в каталог</a>';
	if($search!='')  $stroka='<a href="'.aPSID($langstr.'/search').'" title="'.$ComeBackToSearch.'">'.$ComeBackToSearch.'</a>';
	echo '<table align="center" bgcolor="#FFFFFF" width="100%" cellspacing="0" cellpadding="0" border="0" 
	style="vertical-align:top;padding-left:70px;padding-right:70px;">
	<tr><td width="60%" height="37"style="text-align:left;">'.$stroka.'</td>
	<td width="40%" style="text-align:left;padding-left:10px;">&nbsp;</td></tr>';
	//расчет переменных	
	$query1=sql("SELECT * FROM tovsNew WHERE ida='$view'");
	$row = mysqli_fetch_array($query1);
	//////////////////////заглушка для пустого превью
	if(mysqli_num_rows($query1)>0){
		$rowname=str_replace ("/","-", $row['name']);
		$rowname=str_replace (","," ", $rowname);
		$rowname=str_replace ("  "," ", $rowname);
		$rowArtikul=$row['ida'];
		$rowRealID=	$row['id'];
		$rowSklad=	$row['sklad'];
		$rowCollection=$row['Collection'];
		$rowPerson=$row['Person'];
		$rowPredmetov=$row['Predmetov'];
		if($language=="en"){
			$roww=mysqli_fetch_array(sql("SELECT * FROM picture WHERE id='".$row['Picture']."'"));$rowPictureR=$roww['name'];$rowPicture=$roww['english'];if($rowPicture=="") $rowPicture=$roww['name'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM form WHERE id='".$row['Form']."'"));$rowFormR=$roww['name'];$rowForm=$roww['english'];if($rowForm=="") $rowForm=$roww['name'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM material WHERE id='".$row['TipOfMaterial']."'"));$rowTipOfMaterial=$roww['english'];if($rowTipOfMaterial=="") $rowTipOfMaterial=$roww['name'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM creator WHERE id='".$row['AutorForm']."'"));
			$rowAutorForm=$roww['english'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM creator WHERE id='".$row['AutorPicture']."'"));
			$rowAutorPicture=$roww['english'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM tovsNew LEFT JOIN brand ON brand.id = tovsNew.Factory WHERE tovsNew.ida='$view'"));
			$rowFactory=$roww['name'];$strana=$roww['Strana'];
			if($language=="en"){if($strana=="Россия") $strana="Russia"; elseif($strana=="Китай") $strana="China";}
			$proizv="";
			if($rowFactory=='Императорский фарфоровый завод'){ if($language=="en")$rowFactory='Imperial Porcelain Manufacture.';else $rowFactory='АО "ИФЗ"'; }
			else $rowFactory='';
			if($rowFactory!='')$rowFactory="$rowFactory, $strana";
			elseif($strana!='')$rowFactory="$strana";
			$addlang='&language=en';
			$Formstr="Form";$Picstr="Picture";$Afstr="Sculptor";$Apstr="Artist";$Prstr="Produced by";$Artstr="Articul";$Pricestr="Cost";$Addbstr="Add to basket";
			$Shirstr="Width";$Shirstr2="Lenght";$Shirstr3="Height";$Shirstr4="Capacity";$Shirstr5="Available";
			$NotOnStock="Not on stock. For order call +7(800)2222-850 or write to order2@ifarfor.ru.";
			$Diametr="Diameter";
			$Shirstr5="Stock balance";$textDiameterSaucer='Diameter of the saucer';$textWidthCup='Top diameter of the cup';
			$SugarCap='Capacity of the sugarbowl';$CupHeight='Height of the cup';$CupCap='Capacity of the cup';$PodCap='Capacity of the teapot';
			$scrollup="Scroll up";$Sostav="Composed";$SostavKomp="Kit contents";$Teapot="Teapot";$ML="ml";$ST="PC";$Coffeepod="Coffee-pot";
			$Sugar="Sugar bowl";$Cup="Cup";$Saucer="Saucer";$PLATEDESSERT="Plate dessert";$Creamer="Creamer";$VaseJam="Vase for jam";
			$VaseFlower="Vase for flowers";$Breadbowl="Bread bowl";$Vase="Vase for candy";$VaseCandy="Vase for candy";$PlateGl="Deep plate";
			$PlatePl="Flat plate";$SalatBig="Large salad bowl";$SalatSmall="Small salad bowl";$DishOval="Oval dish";$Pepper="Pepper-pot";
			$High="Height";$Salt="Salt cellar";$Piala="Piala";$Sousnik="Sauceboat";$Supnica="Tureen";$DishPryam="Rectangular dish";
			$DishCircle="Round dish";$DishSous="Sauce dish";$Rings="Ring for napkins";$MM="MM";
			$Blin="Stand for pancakes";$PlateBlin="Plate for pancakes";$ForSmetana="Vase for cream/jam";
			$Spoon1="Dining table spoon";$Fork1="Dining table fork";$Knife1="Dining table knife";$Spoon2="Dessert spoon";$Fork2="Dessert fork";
			$Shipzy="Sugar tongs";
			$Spoon3="Serving spoon";$Fork3="Serving fork";$Spoon4="Cake slice";$Spoon5="Sauce spoon";$Spoon6="Ladle";
			$textDiameter1='Height of big teapot';$textWidth1='Capacity of the teapot';$textHeight1='Height of the teapot';$textCapacity1='Capacity of big teapot';
			$textDiameter2='Diameter of the saucer';$textWidth2='Diameter of dessert plate';$textHeight2='Height of the cup';$textCapacity2='Capacity of the cup';
		}
		else{
			$roww=mysqli_fetch_array(sql("SELECT name FROM picture WHERE id='".$row['Picture']."'"));
			$rowPicture=$roww['name'];$rowPictureR=$rowPicture;
			$roww=mysqli_fetch_array(sql("SELECT name FROM form WHERE id='".$row['Form']."'"));
			$rowForm=$roww['name'];$rowFormR=$rowForm;
			$roww=mysqli_fetch_array(sql("SELECT name FROM material WHERE id='".$row['TipOfMaterial']."'"));
			$rowTipOfMaterial=$roww['name'];
			$roww=mysqli_fetch_array(sql("SELECT name FROM creator WHERE id='".$row['AutorForm']."'"));
			$rowAutorForm=$roww['name'];
			$roww=mysqli_fetch_array(sql("SELECT name FROM creator WHERE id='".$row['AutorPicture']."'"));
			$rowAutorPicture=$roww['name'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM tovsNew LEFT JOIN brand ON brand.id = tovsNew.Factory WHERE tovsNew.ida='$view'"));
			$rowFactory=$roww['name'];$strana=$roww['Strana'];
			if($rowFactory=='Императорский фарфоровый завод') $rowFactory='ИФЗ';
			else $rowFactory='';
			if($rowFactory!='')$rowFactory="$rowFactory, $strana";
			elseif($strana!='')$rowFactory="$strana";
			$addlang='';
			$Formstr="Форма";$Picstr="Вид росписи";$Afstr="Автор формы";$Apstr="Автор росписи";$Prstr="Производитель";$Artstr="Артикул";$Pricestr="Цена";
			$Addbstr="Добавить в корзину";	$Shirstr="Ширина";$Shirstr2="Длина";$Shirstr3="Высота";$Shirstr4="Объем";$Diametr="Диаметр";
			$Shirstr5="ОСТАТКИ В МАГАЗИНАХ";$textDiameterSaucer='Диаметр блюдца';$textWidthCup='Диаметр верхнего края чашки';
			$SugarCap='Объем сахарницы';$CupHeight='Высота чашки';$CupCap='Объем чашки';$PodCap='Объем чайника';
			$NotOnStock="Нет в наличии. Цена при заказе может изменится. Для заказа звоните 8(800)2222-850.";
			$scrollup="Прокрутить вверх";$Sostav="Состав";$SostavKomp="Состав комплекта";$Teapot="Чайник";$ML="мл";$ST="шт";$Coffeepod="Кофейник";
			$Sugar="Сахарница";$Cup="Чашка";$Saucer="Блюдце";$PLATEDESSERT="Тарелка десертная";$Creamer="Сливочник";$VaseJam="Вазочка для варенья";
			$VaseFlower="Ваза для цветов";$Breadbowl="Сухарница";$Vase="Конфетница";$VaseCandy="Ваза для конфет";$PlateGl="Тарелка глубокая";
			$PlatePl="Тарелка плоская";$SalatBig="Салатник большой";$SalatSmall="Салатник малый";$DishOval="Блюдо овальное";$Pepper="Перечница";
			$High="Высота";$Salt="Солонка";$Piala="Пиала";$Sousnik="Соусник";$Supnica="Супница";$DishPryam="Блюдо прямоугольное";
			$DishCircle="Блюдо круглое";$DishSous="Блюдо под соусник";$Rings="Кольцо для салфеток";$MM="мм";
			$Blin="Блинница";$PlateBlin="Тарелка для блинов";$ForSmetana="Розетка для сметаны/варенья";
			$Spoon1="Ложка столовая";$Fork1="Вилка столовая";$Knife1="Нож столовый";$Spoon2="Ложка десертная";$Fork2="Вилка десертная";$Shipzy="Щипцы для сахара";
			$Spoon3="Сервировочная ложка";$Fork3="Сервировочная вилка";$Spoon4="Лопатка для торта";$Spoon5="Ложка для соуса";$Spoon6="Суповой половник";
			$textDiameter1='Высота доливного чайника';$textWidth1='Объём заварного чайника';$textHeight1='Высота заварного чайника';$textCapacity1='Объём доливного чайника';
			$textDiameter2='Диаметр блюдца';$textWidth2='Диаметр десертной тарелки';$textHeight2='Высота чашки';$textCapacity2='Объём чашки';$KRest1='Дорожка';$KRest2='Салфетка';
		}
		$rowVid=$row['Vid'];
		$rowTip=$row['Tip'];
		$engvid=$row['videnglish'];
		$engtip=$row['tipenglish'];
		$Height=$row['Height'];		$Capacity=$row['Capacity'];		$Diameter=$row['Diameter'];$Width=$row['Width'];
		$Nnewprice=$row['price1s'];
		$Nnewprice=$Nnewprice;
		$ts=floor($Nnewprice/1000);
		$ed=$Nnewprice-($ts*1000);
		if($ts=='0') $ts="";
		else{if($ed<10)$ed='00'.$ed;
		elseif($ed<100)$ed='0'.$ed;};
		$newprice1="$ts $ed ";
		$id_crop = substr($view, 2,5);
		$filename ="icons/".$id_crop."_resize.jpg";
		$filename2 ="icons/".$id_crop."_resize.JPG";
		$filename3 ="icons/".$id_crop.".jpg";
		$filename4 ="foto/".$view.".jpg";
		$fname ="";
		if(file_exists($filename4)){$perem="/".$filename4;$fname ="foto/".$view.".jpg";}
		elseif(file_exists($filename)){$perem="/".$filename;$fname ="images/".$id_crop."_resize.jpg";}
		elseif(file_exists($filename2)){$perem="/".$filename2;$fname ="images/".$id_crop."_resize.JPG";}
		elseif(file_exists($filename3)){$perem="/".$filename3;$fname ="images/".$id_crop.".jpg";}
		//elseif (file_exists($filename4)) {$perem="/".$filename4;$fname ="foto/".$view.".jpg";}	
		else $perem="";
		if(file_exists($fname))$fname="/".$fname;
		else $fname=$perem;
		$PPPers='';
		if($rowPerson!='0' and $rowPerson!='' and $rowPerson!='1'  and $rowPredmetov!='0' and $rowPredmetov!='1' and $rowPredmetov!='') $PPPers=$rowPerson."/".$rowPredmetov.' ';
		$frontname=MakeFrontName($brandid,$rowname,$rowVid,$rowTip,$rowPicture,$rowForm,$rowTipOfMaterial,$rowPerson,$rowPredmetov,
			$rowAutorPicture,$Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
		/////////////
		if($rowVid=="Бокал с бл.с крышкой") $rowVid="Бокал с блюдцем и крышкой";
		if($rowVid=="Комплект детский в чемода") $rowVid="Комплект детский в чемоданчике.";
		if($rowTip=="трёхпредметный в чемоданч")$rowTip="трёхпредметный в чемоданчике";
		if($rowVid=="Чашка с блюдцем" and $rowTip=="чайн.") $rowTip="чайная";
		if($rowVid=="Чашка с блюдцем и крышкой" and $rowTip=="чайн.") $rowTip="чайная";
		if($rowVid=="Чашка с блюдцем" and $rowTip=="кофейн.") $rowTip="кофейная";
		if($rowVid=="Подарочный набор" and $rowTip=="кофейн.") $rowTip="кофейный";
		///////////////
		if($language=="en"){
			$vidtip="$engvid $engtip";
			if($vidtip=="Set Table") $vidtip="Table Set";
			elseif($vidtip=="Set Tea") $vidtip="Tea Set";
			elseif($vidtip=="Set Coffee") $vidtip="Coffee Set";
			else $vidtip="$engvid $engtip";
		}
		else $vidtip="$rowVid $rowTip";
		if($rowVid!="Скульптура"){
			if($rowPicture=='' and $rowForm=='') $FirstName=my_strtoupper("<b>$rowname</b>");
			elseif($rowPicture=='') $FirstName=my_strtoupper("<b>$vidtip «$rowForm"."» $PPPers</b>");
			elseif($rowForm=='') $FirstName=my_strtoupper("<b>$vidtip «$rowPicture"."» $PPPers</b>");
			else $FirstName=my_strtoupper("<b>$vidtip «$rowPicture"."» $PPPers</b>")."</li><li>$Formstr: $rowForm";
		}
		else{
			if($rowPicture=='' and $rowForm=='') $FirstName=my_strtoupper("<b>$rowname</b>");
			elseif($rowForm=='') $FirstName=my_strtoupper("<b>$vidtip «$rowPicture"."» </b>");
			elseif($rowPicture=='') $FirstName=my_strtoupper("<b>$vidtip «$rowForm"."» </b>");
			else $FirstName=my_strtoupper("<b>$vidtip «$rowForm"."» </b>")."</li><li>$Picstr: $rowPicture.";
		}
		//$FirstName=$FirstName.$frontname;
		//$FirstName=$FirstName."1$rowname,2$rowVid,3$rowTip,4$rowPicture,5$rowForm,6$rowTipOfMaterial,7$rowPerson,8$rowPredmetov,9$rowAutorPicture,10$Height,11$Capacity,12$Diameter,13$Width";
		//заполним как надо
		//echo'1'.$fname;
		echo "<tr><td>";$fnamesub=substr($view, -1);
		if(file_exists('foto/'.$view.'.jpg')){echo "<img src='/foto/".$view.".jpg' width='100%'>";}
		elseif(file_exists("foto/".$view.'S.jpg')){echo "<img src='/foto/".$view."S.jpg' width='100%'>";}
		elseif(file_exists("foto/".$view.'B.jpg')){echo "<img src='/foto/".$view."B.jpg' width='100%'>";}
		elseif(file_exists("foto/".$fnamesub.'.jpg')){echo "<img src='/foto/".$fnamesub.".jpg' width='100%'>";}
			$indeed=2;$howmanytimes=0;
			while($indeed!=0){
				
				$filename5="foto/".$view."-".$indeed.".jpg";
				if(file_exists($filename5)){
					$perem="/".$filename5;
					echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
					$indeed++;$howmanytimes++;
				}
				else $indeed=0;
			}
			if($howmanytimes==0 and substr($view, -1)=='S' or substr($view, -1)=='B')
			while($indeed!=0){
				
				$filename5="foto/".substr($view, 0, -1)."-".$indeed.".jpg";
				if(file_exists($filename5)){
					$perem="/".$filename5;
					echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
					$indeed++;$howmanytimes++;
				}
				else $indeed=0;
			}
			if($howmanytimes==0)
			while($indeed!=0){
				
				$filename5="foto/".$view."B-".$indeed.".jpg";
				if(file_exists($filename5)){
					$perem="/".$filename5;
					echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
					$indeed++;$howmanytimes++;
				}
				else $indeed=0;
			}
			if($howmanytimes==0)
			while($indeed!=0){
				
				$filename5="foto/".$view."S-".$indeed.".jpg";
				if(file_exists($filename5)){
					$perem="/".$filename5;
					echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
					$indeed++;$howmanytimes++;
				}
				else $indeed=0;
			}		
			echo "&nbsp;</td>";
		
		echo "<td style='FONT-SIZE: 18px;text-align: left;vertical-align:top;padding-left: 20px;'><ul style='padding:0;'>
		<li style='FONT-SIZE: 18px;'>$FirstName</li>";
		if($rowVid!="")echo"<li>$rowTipOfMaterial</li>";
		//Ручная роспись
		if($rowAutorForm!="" and $rowAutorForm!='-')echo"<li>$Afstr: $rowAutorForm</li>";
		if($rowAutorPicture!="" and $rowAutorPicture!='-')echo"<li>$Apstr: $rowAutorPicture</li>";
		if($rowFactory!="")echo"<li>$Prstr: $rowFactory</li>";
		//Объем и размер
		$tagform='';	if($rowForm!='' and $rowForm!='-')$tagform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagform$rowFormR$addlang")."'>#$rowForm</a>&nbsp;&nbsp;";
		$tagpic='';	if($rowPicture!='' and $rowPicture!='-')$tagpic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagpic$rowPictureR$addlang")."'>#$rowPicture</a>&nbsp;&nbsp;";
		$tagaform='';	if($rowAutorForm!='' and $rowAutorForm!='-')$tagaform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagaform$rowAutorForm$addlang")."'>#$rowAutorForm</a>&nbsp;&nbsp;";
		$tagapic='';	if($rowAutorPicture!='' and $rowAutorPicture!='-')$tagapic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagapic$rowAutorPicture$addlang")."'>#$rowAutorPicture</a>&nbsp;&nbsp;";
		echo"<li style='color:#333333;'>$Artstr: $rowArtikul</li>";
		echo"<li style='color:#333333;'>$tagform $tagpic $tagaform $tagapic</li>";
		echo"<HR>";
		//echo"</ul>";
		//echo "<ul style='FONT-SIZE: 16px;text-align: left;vertical-align:top;padding-left: 20px;'>";
		//<ul style='padding:0;'>";
		//если есть разные комплектации, то печатаем Варианты комплектации
		//если это сервиз, печатаем СЕРВИЗ
		//цену и в корзину memberID1 memberQuant1
		//echo"<li style='FONT-SIZE: 14px;color:#333333;'>Артикул: $rowArtikul</li><br>
		echo "<li>$Pricestr: <b style='FONT-SIZE: 20px;'>$newprice1</b><img src='/img/rub-002.png' style='height:14px' alt='р.'>";
		//	echo"<HR>";
		if($rowSklad!=0) echo'<a style="padding-left:40px;font-size:18px;font-weight:600;color:#0000CC;TEXT-DECORATION: underline;" 
		href="'.aPSID('/set.php?oper=add_tov&tov_id='.$row['id']).'" id="ishop$id'.$row['id'].'" target="market" title="'.$Addbstr.'">'.$Addbstr.'</a></li>';
		else echo"</li><li>$NotOnStock</li>";
		echo"<HR>";
		echo'<div id="scrollup"><img width="50px" alt="'.$scrollup.'";" src="/img/up.png"></div>';
		if($rowVid!='Сервиз'){
			$rowmemberID1=$row['memberID1'];
			if($rowmemberID1!=''){
				$rommemberQuant1=$row['memberQuant1'];
				$ruru=sql("SELECT * FROM tovsNew WHERE id='$rowmemberID1'");
				$countruru=mysqli_num_rows($ruru);
			}
			if($countruru>0 and $rowmemberID1!=''){
				$rowmem = mysqli_fetch_array($ruru);
				$rowname=$rowmem['name'];
				$rowVid=$rowmem['Vid'];
				$rowTip=$rowmem['Tip'];
				echo"<li style='color:#333333;'>$Sostav :</li><li>$rowVid $rowTip <b>$rommemberQuant1 $ST</b></li>";
				$rowmemberID2=$row['memberID2'];
				if($rowmemberID2!=''){
					$rommemberQuant2=$row['memberQuant2'];
					$rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID2'"));
					$rowname=$rowmem['name'];
					$rowVid=$rowmem['Vid'];
					$rowTip=$rowmem['Tip'];
					echo"<li>$rowVid $rowTip <b>$rommemberQuant2 $ST</b></li>";
				}
				$rowmemberID3=$row['memberID3'];
				if($rowmemberID3!=''){
					$rommemberQuant3=$row['memberQuant3'];
					$rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID3'"));
					$rowname=$rowmem['name'];
					$rowname=str_replace ("1 2","1/2", $rowname);
					$rowVid=$rowmem['Vid'];
					$rowTip=$rowmem['Tip'];
					echo"<li>$rowVid $rowTip <b>$rommemberQuant3 $ST</b></li>";
				}
				$rowmemberID4=$row['memberID4'];
				if($rowmemberID4!=''){
					$rommemberQuant4=$row['memberQuant4'];
					$rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID4'"));
					$rowname=$rowmem['name'];
					$rowVid=$rowmem['Vid'];
					$rowTip=$rowmem['Tip'];
					echo"<li>$rowVid $rowTip <b>$rommemberQuant4 $ST</b></li>";
				}
			}
		}
		$rowDiameter=$row['Diameter'];
		$rowWidth=$row['Width'];
		$rowHeight=$row['Height'];
		$rowCapacity=$row['Capacity'];
		$rowVid=$row['Vid'];
		$rowTip=$row['Tip'];
		$rowID=array();
		$rowID+=array($row['memberID1'].a=> $row['memberQuant1']);
		$rowID+=array($row['memberID2'].b=> $row['memberQuant2']);
		$rowID+=array($row['memberID3'].c=> $row['memberQuant3']);
		$rowID+=array($row['memberID4'].d=> $row['memberQuant4']);
		$rowID+=array($row['memberID5'].e=> $row['memberQuant5']);
		$rowID+=array($row['memberID6'].f=> $row['memberQuant6']);
		$rowID+=array($row['memberID7'].g=> $row['memberQuant7']);
		$rowID+=array($row['memberID8'].h=> $row['memberQuant8']);
		$rowID+=array($row['memberID9'].i=> $row['memberQuant9']);
		$rowID+=array($row['memberID10'].j=> $row['memberQuant10']);
		$rowID+=array($row['memberID11'].k=> $row['memberQuant11']);
		ksort ($rowID);
		if($rowVid=='Сервиз' or $rowVid=='Комплект детский' or ($rowVid=='Подарочный набор' and $rowTip=='для чая')){
			echo"<li><b>$SostavKomp:</b></li>";
			foreach($rowID as $kbr1 => $tbr){
				$kbr=substr($kbr1, 0, -1);
				$useheight=0;
				if($tbr>0){
					if($kbr=='C001051'){if($rowCapacity>'0')echo"<li>$Teapot $rowCapacity $ML: $tbr $ST.</li>"; else echo"<li>$Teapot: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C0010001'){if($rowCapacity>'0')echo"<li>$Coffeepod $rowCapacity $ML: $tbr $ST.</li>"; else echo"<li>$Coffeepod: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001052'){if($rowWidth>'0')echo"<li>$Sugar $rowWidth $ML: $tbr $ST.</li>"; else echo"<li>$Sugar: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001053'){
						if($rowHeight>'0')echo"<li>$Cup $rowHeight $ML: $tbr $ST.</li>"; else echo"<li>$Cup: $tbr $ST.";echo"</li>";
						if($rowDiameter>'0')echo"<li>$Saucer $rowDiameter $MM: $tbr $ST.</li>"; else echo"<li>$Saucer: $tbr $ST.";echo"</li>";
					}
					elseif($kbr=='C001054'){echo"<li>$Saucer: $tbr $ST</li>";}
					elseif($kbr=='C001055'){echo"<li>$PLATEDESSERT: $tbr $ST</li>";}
					elseif($kbr=='C001056'){echo"<li>$Creamer: $tbr $ST</li>";}
					elseif($kbr=='C001057'){echo"<li>$VaseJam: $tbr $ST</li>";}
					elseif($kbr=='C001058'){echo"<li>$VaseFlower: $tbr $ST</li>";}
					elseif($kbr=='C001059'){echo"<li>$Breadbowl: $tbr $ST</li>";}
					elseif($kbr=='C001060'){echo"<li>$VaseCandy: $tbr $ST</li>";}
					elseif($kbr=='C001061'){echo"<li>$VaseCandy: $tbr $ST</li>";}
					//столовый rowDiameter
					elseif($kbr=='C001062'){if($rowWidth>'0')echo"<li>$PlateGl $rowWidth $MM: $tbr $ST.</li>"; else echo"<li>$PlateGl: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001063'){if($rowHeight>'0')echo"<li>$PlatePl $rowHeight $MM: $tbr $ST.</li>"; else echo"<li>$PlatePl: $tbr $ST.";echo"</li>";$rowHeight=$rowDiameter;}
					elseif($kbr=='C001064'){if($tbr>10)echo"<li>$SalatBig ".$tbr."0 $ML: 1 $ST.</li>"; else echo"<li>$SalatBig: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001065'){if($rowCapacity>'0')echo"<li>$SalatSmall $rowCapacity $MM: $tbr $ST.</li>"; else echo"<li>$SalatSmall: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001066'){if($tbr>10)echo"<li>$DishOval ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$DishOval: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001067'){if($tbr>3)echo"<li>$Pepper ($Shirstr3 ".$tbr." $MM): 1 $ST.</li>"; else echo"<li>$Pepper: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001068'){if($tbr>3)echo"<li>$Salt ($Shirstr3 ".$tbr." $MM): 1 $ST.</li>"; else echo"<li>$Salt: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001069'){if($tbr>15)echo"<li>$Piala ".$tbr." $ML: 1 $ST.</li>"; else echo"<li>$Piala: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001070'){if($tbr>15)echo"<li>$Sousnik ".$tbr." $ML: 1 $ST.</li>"; else echo"<li>$Sousnik: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001071'){if($tbr>3)echo"<li>$Supnica ".$tbr."0 $ML: 1 $ST.</li>"; else echo"<li>$Supnica: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001072'){if($tbr>10)echo"<li>$DishPryam ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$DishPryam: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001073'){if($tbr>10)echo"<li>$DishCircle ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$DishCircle: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001074'){if($tbr>10)echo"<li>$DishSous ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$DishSous: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001092'){if($tbr>15)echo"<li>$Rings ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$Rings: $tbr $ST.";echo"</li>";}
				}
			}
		}//	$Shirstr="Ширина";$Shirstr2="Длина";$Shirstr3="Высота";$Shirstr4="Объем";$Shirstr5="ОСТАТКИ В МАГАЗИНАХ";
		elseif($rowVid=='Набор' and $rowTip=='для блинов'){
			echo"<li><b>$SostavKomp:</b></li>";
			foreach($rowID as $kbr1 => $tbr){
				$kbr=substr($kbr1, 0, -1);
				$useheight=0;
				if($tbr>0){
					if($kbr=='C001071'){if($tbr>3)echo"<li>$Blin ".$tbr."0 $ML: 1 $ST.</li>"; else echo"<li>$Blin: $tbr $ST.";echo"</li>";}
					elseif($kbr=='C001055'){echo"<li>$PlateBlin: $tbr $ST</li>";}
					elseif($kbr=='C001057'){echo"<li>$ForSmetana: $tbr $ST</li>";}
				}
			}
		}
		elseif($rowVid=='Набор' and $rowTip=='чайный'){
			echo"<li><b>$SostavKomp:</b></li>";
			foreach($rowID as $kbr1 => $tbr){
				$kbr=substr($kbr1, 0, -1);
				if($tbr>0){		
					if($kbr=='B00847'){echo"<li>$KRest1 $rowWidth $MM х $rowHeight $MM: $tbr $ST</li>";}
					elseif($kbr=='C001060'){echo"<li>$KRest2 $rowDiameter $MM х $rowCapacity $MM: $tbr $ST</li>";}
				}
			}
		}
		elseif($rowVid=='Набор столовых приборов'){
			echo"<li><b>$SostavKomp:</b></li>";
			foreach($rowID as $kbr1 => $tbr){
				$kbr=substr($kbr1, 0, -1);
				//			$useheight=0;
				if($tbr>0){
					if($kbr=='M0000394'){echo"<li>$Spoon1: $tbr $ST</li>";}
					elseif($kbr=='M0000395'){echo"<li>$Fork1: $tbr $ST</li>";}
					elseif($kbr=='M0000396'){echo"<li>$Knife1: $tbr $ST</li>";}
					elseif($kbr=='M0000397'){echo"<li>$Spoon2: $tbr $ST</li>";}
					elseif($kbr=='M0000398'){echo"<li>$Fork2: $tbr $ST</li>";}
					elseif($kbr=='M0000399'){echo"<li>$Shipzy: $tbr $ST</li>";}
					elseif($kbr=='M0000400'){echo"<li>$Spoon3: $tbr $ST</li>";}
					elseif($kbr=='M0000401'){echo"<li>$Fork3: $tbr $ST</li>";}
					elseif($kbr=='M0000402'){echo"<li>$Spoon4: $tbr $ST</li>";}
					elseif($kbr=='M0000403'){echo"<li>$Spoon5: $tbr $ST</li>";}
					elseif($kbr=='M0000404'){echo"<li>$Spoon6: $tbr $ST</li>";}
					//			elseif($kbr=='М0000405'){echo"<li>Сервировочная вилка: $tbr $ST</li>";}
				}
			}
		}
		elseif($rowVid=='Комплект чайников'){
			echo"<li>$textDiameter1: $rowDiameter $MM</li>";
			echo"<li>$textCapacity1: $rowCapacity $ML</li><br>";
			echo"<li>$textHeight1: $rowHeight $MM</li>";
			echo"<li>$textWidth1: $rowWidth $ML</li>";
		}
		elseif($rowVid=='Комплект' and $rowTip=='трехпредметный'){
			echo"<li>$textCapacity2: $rowCapacity $ML</li>";
			echo"<li>$textHeight2: $rowHeight $MM</li>";
			echo"<li>$textDiameter2: $rowDiameter $MM</li>";
			echo"<li>$textWidth2: $rowWidth $MM</li>";
		}
		else{
			if($rowDiameter!='' and $rowDiameter!='0'){
				if($rowVid=='Чашка с блюдцем') $textDiameter=$textDiameterSaucer;
				elseif($rowVid=='Шкатулка') $textDiameter=$Shirstr2;
				//		elseif (($rowVid=='Сервиз') and ($rowTip=='чайный' or $rowTip=='кофейный')) $textDiameter='Диаметр блюдца'; 
				else $textDiameter=$Diametr;
			}
			if($rowWidth!='' and $rowWidth!='0'){
				$razmer=$MM;
				if($rowVid=='Чашка с блюдцем') $textWidth=$textWidthCup; else $textWidth=$Shirstr;
				if($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный'){$textWidth=$SugarCap; $razmer=$ML;}
				echo"<li>$textWidth: $rowWidth $razmer</li>";
			}
			if($textWidth==$Shirstr and $textDiameter==$Diametr) $textDiameter=$Shirstr2;
			if($rowDiameter!='' and $rowDiameter!='0') echo"<li>$textDiameter: $rowDiameter $MM</li>";
			if($rowHeight!='' and $rowHeight!='0'){
				$razmer=$MM;
				if($rowVid=='Чашка с блюдцем') $textHeight=$CupHeight; else $textHeight=$Shirstr3;
				if($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный'){$textHeight=$CupCap; $razmer=$ML;}
				echo"<li>$textHeight: $rowHeight $razmer</li>";
			}
			if($rowCapacity!='' and $rowCapacity!='0'){
				$textDiameter=$Shirstr4;
				if($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный'){$textDiameter=$PodCap; $razmer=$ML;}
				echo"<li>$textDiameter: $rowCapacity $ML</li>";
			}
		}
		////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////Остатки в магазинах////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////
		echo QuantsInShop($rowRealID,1,$language);
		echo"</ul>";
		$fname="legend/$id_crop.txt";
		if(file_exists($fname)){$fname=$fname;	$legend=file_get_contents($fname);}
		else $legend='';
		echo"$legend";
	}//////////////////////конец заглушки на пустое превью
	else{echo '<div style="padding-left:40px;">'.$NotOnStock1.$view.$NotOnStock2.'</div>';
		//$query1=sql("SELECT * FROM tovsNewback WHERE ida='$view'");
		$query2=sql("SELECT * FROM tovsNew WHERE ida='$view'");
		/*if(mysqli_num_rows($query1)){
			$row = mysqli_fetch_array($query1);
			$rowVid=$row['Vid'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM picture WHERE id='".$row['Picture']."'"));$rowPictureR=$roww['name'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM form WHERE id='".$row['Form']."'"));$rowFormR=$roww['name'];
			echo printsearch($rowVid.' '.$rowFormR);
			mysqli_free_result($query1);	
		}*/
		if(mysqli_num_rows($query2)>0){
			$row = mysqli_fetch_array($query2);
			$rowVid=$row['Vid'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM picture WHERE id='".$row['Picture']."'"));$rowPictureR=$roww['name'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM form WHERE id='".$row['Form']."'"));$rowFormR=$roww['name'];
			echo printsearch($rowVid.' '.$rowFormR);
		}
		elseif($view=='8122811001') echo printsearch("Ландыш Дуэль");
		elseif($view=='8115701') echo printsearch("Ландыш Да нет");
		elseif($view=='8119218001') echo printsearch("Яблочко медальон");
		
		mysqli_free_result($query2);///	
	}
	echo "</td>";
	echo '</tr></table>';

}
elseif(($menuname=="shop" ) and $view==''){//or $searchline!=""
	//=============================================================================================
	//================================Размещаем левое меню========================================
	//=============================================================================================
	if($language=="en") $tekname=$menuenglish[$m2][1]; else $tekname=$menu[$m2][1];
	echo '<p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.my_strtoupper($tekname).'</b></p>';
	//echo "<form name='FFilter' method='post' action=''> ";
	$menu1='menu open';

	$hoh=0;
	for($i=2;$i<count($menu[$m2]);$i=$i+2){
		if($language=="en") $tekname=$menuenglish[$m2][$i+1]; else $tekname=$menu[$m2][$i+1];
		$ho=$i/2-$hoh;$NameOfGroup="<font style='text-transform: uppercase;'>".$tekname."</font>";$idOfGroup=$menu[$m2][$i];
		$echob2='';$echob3='';$menu1='menu'; $spanbegin='';	$spanend='';
		$ruru2=sql("SELECT * FROM tovsNew WHERE idg='$idOfGroup' and grp='1'");
		$addstyle="padding-top:10px;padding-bottom:10px;border-top:1px solid #EEEEEE;";
		$tableforspan="<table align='left' width='100%' height='20px' cellspacing='0' cellpadding='1' border='0' ><tr>
		<td style='width:10%;vertical-align:top;$addstyle'>";
		while($rowruru2=mysqli_fetch_array($ruru2)){
			if($language=="en") $nameeng=$rowruru2['english']; else $nameeng=$rowruru2['name'];
			$ruru5=sql("SELECT * FROM tovsNew WHERE idg='".$rowruru2['id']."' and grp='0'");
			if(mysqli_num_rows($ruru5)>0){
				$stylepad='';
				$PechID2="".$rowruru2['id'];
				$spanbegin="<span class='title'>";$spanend="</span>";
				if($PechID2==$menuname4){$menu1='menu open';$echob3.= "<li><b>".$nameeng."</b></li>";}
				else $echob3.= "<li><a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$PechID2/$sortstr")."' target='_self'>"
					.$nameeng."</a></li>";
			}
		}
		mysqli_free_result($ruru2);
		if($spanbegin!="") $echob2.="<ul>$echob3</ul>"; else{$echob2.=$echob3;$menu1="mumnu";}
		if($spanbegin=="" and $menu1!='mumnu' and $menuname4!='' ) $echobeg= "<div id='cat$ho' class='$menu1'>
		$tableforspan </td><td style='width:90%;$addstyle'>
		<a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'><b>wwww$NameOfGroup</b>1</a>
		</td></tr></table></div>";
		//вот  графин
		elseif($menu1=='mumnu' and $idOfGroup!=$menuname3){$echobeg= "<div style='padding-top:5px;padding-bottom:5px;'>
			$tableforspan </td><td style='width:90%;$addstyle'><a class='$menu1' href='".aPSID("$langstr/shop/".
				$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'>$NameOfGroup</a>
			</td></tr></table>
			</div>"; $hoh=$hoh+1;}
		//графин совпал
		elseif($menu1=='mumnu' and $idOfGroup==$menuname3){$echobeg= "<div style='padding-top:5px;padding-bottom:5px;'>
			$tableforspan </td><td style='width:90%;$addstyle'>
			<b>$NameOfGroup</b>
			</td></tr></table></div>"; $hoh=$hoh+1;}
		//а это раскрывающееся меню
		elseif($menuname4=='' and $idOfGroup!=$menuname3)   $echobeg= "<div id='cat$ho' class='menu'>
		$tableforspan <span class='title' ></td><td style='width:90%;$addstyle'>
		<a href='".aPSID("$langstr/shop/".
				$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'>$NameOfGroup</a>
		</td>
		</tr></table>
		</span>";
		//а это раскрывающееся меню выбрано//<span class='title'> убрал после меню опен
		elseif($menuname4=='' and $idOfGroup==$menuname3)   $echobeg= "<div id='cat$ho' class='menu open'>
		$tableforspan  $spanbegin</td><td style='width:90%;$addstyle'> 
		<b>$NameOfGroup</b>
		</td>
		</tr></table>
		</span>";
		else $echobeg= "<div id='cat$ho' class='$menu1'> 
		$tableforspan $spanbegin</td><td style='width:90%;$addstyle'>
		<a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'>$NameOfGroup</a>
		</td>
		</tr></table>
		$spanend";
		echo $echobeg.$echob2;
		if($menu1!='mumnu')  echo "</div>";
	}
	//echo 'hotstr='.$HotStr.' sl='.$searchline;
if($menuVersion=='ifarfor')
{
		if($HotStr!='zu' and $HotStr3==''){
		echo'</td></tr>';
		echo'<tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:'.$sizebetweenfilters.'px;">
		&nbsp;
		</td></tr><tr><td align="left" style="PADDING:10px;PADDING-bottom:'.$sizebottomleftmenu.'px;border : 0;
		VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;">
		<p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.$FILTR.'</b></p>
		';

		//=============================================================================================
		//=========================Конец размещения левого меню=======================================
		//=============================================================================================
		//=========================Фильтры============================================================ zakaz sklad
		//=================выбираем группу, по которой будет строиться фильтр===========================
		$RightUslovie2='';
		$a = array();
		if($menuname4==''){
			if($menuname3==''){
				if($menuname2==''){$a='';}
				else $strokeSQL=MakeStrokeSQL($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);}
			else 	$strokeSQL=MakeStrokeSQL($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);}
		else 	$strokeSQL=MakeStrokeSQL($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
		if($strokeSQL=='')$strokeSQL='1=1';
		$rurus=sql("SELECT * FROM tovsNew LEFT JOIN picture ON picture.id = tovsNew.Picture WHERE ".$strokeSQL);
		//========================Если выбор не пустой, то формируем список Рисунков и добавляем их в массив $a=======
		if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)) 
		if($roww[$nameof]!='')
		$a+=array($roww[$nameof]=> $roww['id']);	
		ksort ($a);
		$aform = array();
		if($menuname4==''){
			if($menuname3==''){
				if($menuname2==''){$a='';}
				else $strokeSQL=MakeStrokeSQLForm($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);}
			else 	$strokeSQL=MakeStrokeSQLForm($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);}
		else 	$strokeSQL=MakeStrokeSQLForm($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
		mysqli_free_result($rurus);
		$rurus=sql("SELECT * FROM tovsNew LEFT JOIN form ON form.id = tovsNew.Form WHERE".$strokeSQL);
		//========================Если выбор не пустой, то формируем список Форм и добавляем их в массив $a=======
		if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)) if($roww[$nameof]!='')$aform+=array($roww[$nameof]=> $roww['id']); ksort ($aform);
		$amat = array();
		if($menuname4==''){
			if($menuname3==''){
				if($menuname2==''){$amat='';}
				else $strokeSQL=MakeStrokeSQLMat($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);}
			else 	$strokeSQL=MakeStrokeSQLMat($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);}
		else 	$strokeSQL=MakeStrokeSQLMat($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
		mysqli_free_result($rurus);
		$rurus=sql("SELECT * FROM tovsNew LEFT JOIN material ON material.id = tovsNew.TipOfMaterial WHERE".$strokeSQL);
		//========================Если выбор не пустой, то формируем список Форм и добавляем их в массив $a=======
		if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)) if($roww[$nameof]!='')$amat+=array($roww[$nameof]=> $roww['id']); ksort ($amat);
		$abr = array();
		if($menuname4==''){
			if($menuname3==''){
				if($menuname2==''){$abr='';}
				else $strokeSQL=MakeStrokeSQLBrand($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);}
			else 	$strokeSQL=MakeStrokeSQLBrand($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);}
		else 	$strokeSQL=MakeStrokeSQLBrand($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
		mysqli_free_result($rurus);
		$rurus=sql("SELECT * FROM tovsNew LEFT JOIN brand ON brand.id = tovsNew.Factory WHERE".$strokeSQL);
		//========================Если выбор не пустой, то формируем список Factory и добавляем их в массив $a=======
		if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)) if($roww[$nameof]!='')$abr+=array($roww[$nameof]=> $roww['id']);
		ksort ($abr);
		mysqli_free_result($rurus);
		//=======================Рисуем Фильтр по типу фарфора===================================================
		$RightMatUslovie2='';$menuc='menu';$echomatfor='';
		foreach($amat as $kmat => $tmat){
			$checks='';
			if(isset($_POST["mat$tmat"]) and   $_POST["mat$tmat"] == 'yes'){
				$checks='checked';$menuc='menu open';
				if($RightMatUslovie2=='')$RightMatUslovie2.=" AND (TipOfMaterial=$tmat"; else $RightMatUslovie2.=" OR TipOfMaterial=$tmat";
			}
			else{$checks='';}
			//		$echomatfor.="<div class='checkbox'><input name='mat$tmat' $checks type='checkbox' value='yes' onclick='FFilter.submit()'><label for='check'>$kmat</label></div>";
			$echomatfor.="<li><input name='mat$tmat' $checks type='checkbox' value='yes' onclick='FFilter.submit()'>$kmat</li>";
		};
		$echomatbegin="<div id='filtertip' class='$menuc'>
		$tableforspan<span class='title'></span></td><td style='width:90%;$addstyle'>$Typemat</td></tr></table><ul>";
		//	$tableforspan<span class='title'></span></td><td style='width:90%;'> Тип материала</td></tr></table><ul>";
		echo $echomatbegin.$echomatfor."</ul></div>";if($RightMatUslovie2!='') $RightMatUslovie2.=")";
		$RightUslovie=$RightMatUslovie1.$RightMatUslovie2;
		//=======================Рисуем Фильтр по Рисунку из переменной============================================
		$menup='menu';$echopicfor='';
		foreach($a as $k => $t){
			$checks='';
			if(isset($_POST["pcx$t"]) and   $_POST["pcx$t"] == 'yes'){
				$checks='checked';$menup='menu open';
				if($RightUslovie2=='')$RightUslovie2.=" AND (picture=$t"; else $RightUslovie2.=" OR picture=$t";
			}
			else{$checks='';}
			$echopicfor.="<li><input name='pcx$t' $checks type='checkbox' value='yes' onclick='FFilter.submit()'>$k</li>";
		};
		$echopicbegin="<div id='filterpic' class='$menup'>
		$tableforspan<span class='title'></span></td><td style='width:90%;$addstyle'>$Typepic</td></tr></table><ul>";
		echo $echopicbegin.$echopicfor."</ul></div>";if($RightUslovie2!='') $RightUslovie2.=")";
		$RightUslovie.=$RightUslovie1.$RightUslovie2;
		//=======================Рисуем Фильтр по Форме из переменной============================================
		$RightFormUslovie2='';$menuf='menu';$echoformfor='';
		foreach($aform as $kform => $tform){
			$checks='';
			if(isset($_POST["frm$tform"]) and   $_POST["frm$tform"] == 'yes'){
				$checks='checked';$menuf='menu open';
				if($RightFormUslovie2=='')$RightFormUslovie2.=" AND (form=$tform"; else $RightFormUslovie2.=" OR form=$tform";
			}
			else{$checks='';}
			$echoformfor.="<li><input name='frm$tform' $checks type='checkbox' value='yes' onclick='FFilter.submit()'>$kform</li>";
		};
		$echoformbegin="<div id='filterform' class='$menuf'>
		$tableforspan<span class='title'></span></td><td style='width:90%;$addstyle'>$Typeform</td></tr></table><ul>";
		echo $echoformbegin.$echoformfor."</ul></div>";if($RightFormUslovie2!='') $RightFormUslovie2.=")";
		$RightUslovie.=$RightFormUslovie1.$RightFormUslovie2;
		//=======================Рисуем Фильтр по Производителю============================================
		$RightBrandUslovie2='';$menubrand='menu';$echobrandfor='';
		foreach($abr as $kbr => $tbr){
			$checks='';
			if(isset($_POST["br$tbr"]) and   $_POST["br$tbr"] == 'yes'){
				$checks='checked';$menubrand='menu open';
				if($RightBrandUslovie2=='')$RightBrandUslovie2.=" AND (Factory=$tbr"; else $RightBrandUslovie2.=" OR Factory=$tbr";
			}
			else{$checks='';}
			$echobrandfor.="<li><input name='br$tbr' $checks type='checkbox' value='yes' onclick='FFilter.submit()'>$kbr</li>";
		};
		$echobrandbegin="<div id='filterbrand' class='$menubrand'>
		$tableforspan<span class='title'></span></td><td style='width:90%;$addstyle'>$Typefac</td></tr></table><ul>";
		echo $echobrandbegin.$echobrandfor."</ul></div>";if($RightBrandUslovie2!='') $RightBrandUslovie2.=")";
		$RightUslovie.=$RightBrandUslovie1.$RightBrandUslovie2;
	}
	echo'</td></tr><tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:'.$sizebetweenfilters.'px;">
	&nbsp;
	</td></tr><tr><td align="left" style="PADDING:10px;border : none;
	VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;">
	<p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;">';
	$result=sql("SELECT * FROM likeengine WHERE userid='$userid'");
	$CountOfMyLike=mysqli_num_rows($result);
	if($language=="en"){
		echo'<b>FAVORITE</b></p>';
		if($CountOfMyLike>0){echo'<div class="hot">';
			echo'<a href="'.aPSID("/index.php?search=tagMYLIKE&language=en").'" class="link1">MY LIKES</a></div>';}
		echo'<div class="hot">';if($HotStr=='RUSSIANSTYLE')echo'<b>RUSSIAN STYLE</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagRUSSIANSTYLE&language=en").'" class="link1">RUSSIAN STYLE</a>';
		echo'</div><div class="hot">';if($HotStr=='cobaltnet')echo'<b>COBALT NET</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagcobaltnet&language=en").'" class="link1">COBALT NET</a>';
		echo'</div><div class="hot">';if($HotStr=='nega')echo'<b>NEGA</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagnega&language=en").'" class="link1">NEGA</a>';
		echo'</div><div class="hot">';if($HotStr=='zamoscow')echo'<b>ZAMOSKVORECHYE</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagzamoscow&language=en").'" class="link1">ZAMOSKVORECHYE</a>';
		echo'</div><div class="hot">';if($HotStr=='nephrit')echo'<b>NEPHRITE BACKGROUND</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagnephrit&language=en").'" class="link1">NEPHRITE BACKGROUND</a>';
		echo'</div><div class="hot">';if($HotStr=='WHITE')echo'<b>WHITE PORCELAIN</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagWHITE&language=en").'" class="link1">WHITE PORCELAIN</a>';
		echo'</div><div class="hot">';if($HotStr=='project')echo'<b>IPM PROJECTS</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagproject&language=en").'" class="link1">IPM PROJECTS</a>';
		echo'</div>';
		$FLOWERS="FLOWERS";$LITERATURE="LITERATURE";$THEATRE="THEATRE";$PETER="SAINT PETERSBURG";$MOSCOW="MOSCOW";$WEDDING="WEDDING";
		$HAPPYBD="HAPPY BIRTHDAY";$NEWYEAR="HAPPY NEW YEAR";$VALENTINE="SAINT VALENTINE'S DAY";$MASL="MASLENITSA";$EASTER="HAPPY EASTER";$VICTORY="VICTORY'S DAY";
		$FEB23="MILITARY PORCELAIN";$MART8="8TH MARTH";$TEACHER="GIFT FOR TEACHER";$KIDS="FOR KIDS";$lang="&language=en";$THEME="THEMES";
	}
	else{
		echo'<b>САМОЕ ЛЮБИМОЕ</b></p>';
		if($CountOfMyLike>0){echo'<div class="hot">';
			echo'<a href="'.aPSID("/index.php?search=tagMYLIKE").'" class="link1">МОИ ОТМЕТКИ НРАВИТСЯ</a></div>';}
		echo'<div class="hot">';if($HotStr=='RUSSIANSTYLE')echo'<b>РУССКИЙ СТИЛЬ</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagRUSSIANSTYLE").'" class="link1">РУССКИЙ СТИЛЬ</a>';
		echo'</div><div class="hot">';if($HotStr=='cobaltnet')echo'<b>КОБАЛЬТОВАЯ СЕТКА</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagcobaltnet").'" class="link1">КОБАЛЬТОВАЯ СЕТКА</a>';
		echo'</div><div class="hot">';if($HotStr=='nega')echo'<b>ВОРОБЬЕВСКИЙ</b>'; else
			echo'<a href="'.aPSID("/?search=tagapicВоробьевский А.В.").'" class="link1">ВОРОБЬЕВСКИЙ</a>';
		echo'</div><div class="hot">';if($HotStr=='zamoscow')echo'<b>ЗАМОСКВОРЕЧЬЕ</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagzamoscow").'" class="link1">ЗАМОСКВОРЕЧЬЕ</a>';
		echo'</div><div class="hot">';if($HotStr=='nephrit')echo'<b>НЕФРИТОВЫЙ ФОН</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagnephrit").'" class="link1">НЕФРИТОВЫЙ ФОН</a>';
		echo'</div><div class="hot">';if($HotStr=='WHITE')echo'<b>БЕЛЫЙ ФАРФОР</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagWHITE").'" class="link1">БЕЛЫЙ ФАРФОР</a>';
		echo'</div><div class="hot">';if($HotStr=='project')echo'<b>ПРОЕКТЫ ИФЗ</b>'; else
			echo'<a href="'.aPSID("/index.php?search=tagproject").'" class="link1">ПРОЕКТЫ ИФЗ</a>';
		echo'</div>';
		$FLOWERS="ЦВЕТЫ";$LITERATURE="ЛИТЕРАТУРА";$THEATRE="ТЕАТР";$PETER="САНКТ-ПЕТЕРБУРГ";$MOSCOW="МОСКВА";$WEDDING="СВАДЬБА";
		$HAPPYBD="ДЕНЬ РОЖДЕНИЯ";$NEWYEAR="НОВЫЙ ГОД";$VALENTINE="ДЕНЬ ВЛЮБЛЕННЫХ";$MASL="МАСЛЕНИЦА";$EASTER="ПАСХА";$VICTORY="ДЕНЬ ПОБЕДЫ";
		$FEB23="23 ФЕВРАЛЯ";$MART8="8 МАРТА";$TEACHER="ПОДАРОК УЧИТЕЛЮ";$KIDS="ДЕТЯМ";$lang="";$THEME="ТЕМЫ";
	}
	echo'</td></tr><tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:'.$sizebetweenfilters.'px;">
	&nbsp;
	</td></tr><tr><td align="left" style="PADDING:10px;border : none;
	VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;">
	<p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.$THEME.'</b></p>
	';
	//echo'	<p style="padding-left:20px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>ТЕМЫ</b></p>		';
	echo'<div class="hot">'; echo'<a href="'.aPSID("/index.php?search=tagFLOWERS$lang").'" class="link1">'.$FLOWERS.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagLITERATURE$lang").'" class="link1">'.$LITERATURE.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagTHEATRE$lang").'" class="link1">'.$THEATRE.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagPETER$lang").'" class="link1">'.$PETER.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagMOSCOW$lang").'" class="link1">'.$MOSCOW.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagWEDDING$lang").'" class="link1">'.$WEDDING.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagHAPPYBD$lang").'" class="link1">'.$HAPPYBD.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagNEWYEAR$lang").'" class="link1">'.$NEWYEAR.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagVALENTINE$lang").'" class="link1">'.$VALENTINE.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagMASL$lang").'" class="link1">'.$MASL.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagEASTER$lang").'" class="link1">'.$EASTER.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagVICTORY$lang").'" class="link1">'.$VICTORY.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagFEB23$lang").'" class="link1">'.$FEB23.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagMART8$lang").'" class="link1">'.$MART8.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagTEACHER$lang").'" class="link1">'.$TEACHER.'</a>';
	echo'</div><div class="hot">';echo'<a href="'.aPSID("/index.php?search=tagKIDS$lang").'" class="link1">'.$KIDS.'</a>';
	echo'</div>';
	
}
	//===========================Все скрипты для фильтров, анимация ==================================			
	echo"<script>";
	if($HotStr==''){
		echo"
		var menuFilterTip = document.getElementById('filtertip');
		var titleFilterTip = menuFilterTip.querySelector('.title');
		titleFilterTip.onclick = function() {menuFilterTip.classList.toggle('open');};
		var menuFilterPic = document.getElementById('filterpic');
		var titleFilterPic = menuFilterPic.querySelector('.title');
		titleFilterPic.onclick = function() {menuFilterPic.classList.toggle('open');};
		var menuFilterForm = document.getElementById('filterform');
		var titleFilterForm = menuFilterForm.querySelector('.title');
		titleFilterForm.onclick = function() {menuFilterForm.classList.toggle('open');};
		var menuFilterBrand = document.getElementById('filterbrand');
		var titleFilterBrand = menuFilterBrand.querySelector('.title');
		titleFilterBrand.onclick = function() {menuFilterBrand.classList.toggle('open');};
		";
	}
	for($i=1;$i<=$ho;$i++){
		echo"var menu$i = document.getElementById('cat$i');
		var titlem$i = menu$i.querySelector('.title');
		titlem$i.onclick = function() {menu$i.classList.toggle('open');};
		";
	};
	/*echo"  
	var menuprifz = document.getElementById('prifz');
	var titleprifz = menuprifz.querySelector('.title');
	titleprifz.onclick = function() {menuprifz.classList.toggle('open');};";//*/
	echo"  </script>";
	//=============================================================================================
	//=================нижнюю часть левого кадра страницы=========================================
	echo $kusokkoda1;
	//=================Если меню 5 пустое, то =======================================================
	//=================Если товар не выбран, то мы выводим каталог==================================
	$wwidth=strlen($Zagolovok)*9+25;
	echo '<table align="left" bgcolor="'.$bgColorOfBottom.'" width="100%" height="50px" cellspacing="0" cellpadding="0" border="0" style="padding-bottom:10px;"><tr>
	<td style="padding-left:10px;padding-right:10px;width:'.$wwidth.'px;background-color:#'.$bclr.';FONT-SIZE:19px;color:#FFFFFF;text-align:center;">
	<img src="/empty.gif" width="'.$wwidth.'px" height="1px"><b>'.$Zagolovok.'</b></td>
	<td  style="padding-right:10px;width:100%;background-color:#FFFFFF;text-align:right;">'.$sortpage.'</td>
	</tr>
	</table>';
	echo '<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="660px" cellspacing="0" cellpadding="0" border="0"><tr>';
	if($menuname4=='stoppard' or $menuname3=='stoppard' or $menuname2=='stoppard'){$menuname5='stoppard';}
	if($menuname4==''){if($menuname3==''){if($menuname2==''){$a='';}
	else $a=PrintCatalog($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language);
	}
	else 	$a=PrintCatalog($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language);
	}
	else 	$a=PrintCatalog($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language);
	echo $a;
	echo'</tr></table></td></tr></table></form>'; 	////echo'</tr></table></td></tr></table></td>'; 	}
	//=================Если выбран конкретный товар, то мы выводим описание товара===================
}//========================Описание магазина окончено=======================================
//==========================================================================================
//==========================Контакты========================================================
elseif($menuname=="company"){//<img src="/img/contact.jpg">
	echo $kusokkoda1.'
	<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
	<td width="25%">&nbsp;.</td>
	<td height="400px" width="50%" style="vertical-align: top;padding-top:30px;padding:10px;background-color:'.$bgColorOfBottom.';">';
	if($language=='en') echo '
	REQUISITES: <HR style="height: 2px;border: none; color: black; background-color: black;">
	«Imperial Porcelain Manufactory JSC» <br>
	INN (Taxpayer Identification Number): 7811000276 <br>
	KPP (Tax Registration Reason Code): CRR 781101001 <br>
	Address: 151, Obukhovskoy Oborony pr-t, Saint Petersburg, Russian Federation <br>
	<br>
	Euro Bank Account Details: <br>
	Account  40702978139040000236 <br>
	JSC VTB BANK (OPERU BRANCH) <br>
	SWIFT: VTBRRUM2NWR <br>
	Bank Address: st. Bolshaya Morskaya, 30, 190000 St.Petersburg, Russia. <br>
	<HR style="height: 2px;border: none; color: black; background-color: black;">
	Requisites for payment by bank transfer when you buy in the store Imperial porcelain at Togliatti, ul. Yubileinaya, 40:<br>
	"IFZ Togliatty LLC"<br>
	INN (Taxpayer Identification Number):6321239803<br>
	KPP (Tax Registration Reason Code): CRR 632101001<br>
	Address:  st. Topolinaya, 4a, 445031 Togliatti, Russia.<br>
	Bank Account Details: JSC GLOBEX BANK , BIK 043678713, ks 30101810400000000713 Account 40702810525000023930';
	else echo '
	Реквизиты<HR style="height: 2px;border: none; color: black; background-color: black;">
	Реквизиты АО "ИФЗ" <br>
	Полное наименование организации Акционерное общество "Императорский фарфоровый завод"<br>
	Юридический адрес 192171, Российская Федерация, г. Санкт-Петербург, проспект Обуховской Обороны, дом 151<br>
	Почтовый (контактный) адрес 192171, Российская Федерация, г. Санкт-Петербург, проспект Обуховской Обороны, дом 151<br>
	Идентификационный номер (ИНН)	ИНН 7811000276, КПП 781101001<br>
	Код организации по ОКПО	00303812<br>
	Код организации по ОКВЭД 26.21<br>
	Полное наименование банка Филиал ОПЕРУ ОАО Банк ВТБ в Санкт-Петербурге г.Санкт-Петербург Расчетный счет 40702810312000001477<br>
	Корреспондентский счет 30101810200000000704<br>
	БИК	044030704<br>
	SWIFT: VTBRRUM2NWR<br>
	Наименование Банка: JSC VTB BANK (OPERU BRANCH)<br>
	Идентификационный номер (ИНН) Банка	ИНН: 7702070139, КПП: 997950001<br>
	<HR style="height: 2px;border: none; color: black; background-color: black;">
	Реквизиты для оплаты по безналичному расчету при покупке в магазине Императорский фарфор по адресу г. Тольятти, ул. Юбилейная, 40:<br>
	ООО "ИФЗ Тольятти"<br>
	ИНН/КПП 6321239803 / 632101001<br>
	ОГРН 1106320000973<br>
	Юридический адрес: 445031 РФ, Самарская область г.Тольятти, ул. Тополиная, 4а<br>
	Наименование и адрес банка: Филиал "Поволжский" ЗАО "ГЛОБЭКСБАНК" г. Тольятти, БИК 043678713, к/с 30101810400000000713 Р/с 40702810525000023930';
	echo'</td> 	<td width="25%">&nbsp;.</td></tr></table>';
}
elseif($menuname=="delivery"){//<img src="/img/contact.jpg">
	echo $kusokkoda1.'
	<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
	<td width="25%">&nbsp;.</td>
	<td height="400px" width="50%" style="vertical-align: top;padding-top:30px;padding:10px;background-color:'.$bgColorOfBottom.';">';
	if($language=='en')
		echo 'Terms of delivery.<HR style="height: 2px;border: none; color: black; background-color: black;">
	Delivery is possible anywhere in the world. We cooperate with Fedex and DHL.<br>
	The exact cost of delivery can be calculated after the formation of the order.<br>
	<br>
	Delivery in Russia is carried out in cooperation with the SDEC.<br>
	Стоимость доставки по России определяется тарифами службы доставки.<br>
	Например, стоимость доставки по городу Тольятти при заказе до 5000рублей составит 300 рублей.<br>
	When the cost of the order is more than 10000rubles - delivery to the address in any city of Russia is free *<br><br>
	* In case the delivery service has delivery points in the settlement where the address of the recipient is located.<br><br>';
	else  echo '
	Общие условия доставки.<HR style="height: 2px;border: none; color: black; background-color: black;">
	Доставка по России осуществляется в сотрудничестве с международной службой доставки СДЭК.<br>
	Стоимость доставки по России определяется тарифами службы доставки.<br>
	Например, стоимость доставки по городу Тольятти при заказе до 5000рублей составит 300 рублей.<br>
	Стоимость доставки по городу Москве при заказе до 5000рублей составит в среднем от 300 до 500 рублей.<br>
	При заказе от 5000 рублей - доставка до пункта выдачи в любом городе России - бесплатна*.<br>
	При стоимости заказа свыше 10000рублей - доставка до адреса в любом городе России бесплатна*.<br><br>
	Точная стоимость доставки будет рассчитана и сообщена заказчику по телефону менеджером сайта после формирования заказа и указания адреса получения.<br><br>
	*В случае, если у службы доставки есть пункты выдачи в населенном пункте, где расположен адрес получателя.<br><br>
	Возможна доставка в любую точку мира, стоимость и сроки доставки рассчитает менеджер сайта, после создания заказа и сообщит по телефону.';
	echo '</td><td width="25%">&nbsp;</td></tr></table>';
}
elseif($menuname=="contact"){//<img src="/img/contact.jpg">
	echo $kusokkoda1.'
	<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
	<td width="25%">&nbsp;.</td>
	<td height="400px" width="50%" style="vertical-align: top;padding-top:30px;padding:10px;background-color:'.$bgColorOfBottom.';">';
	if($language=="en")
		echo '<b>Addresses and phone numbers of stores</b><HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Russia, Saratov</b><br><br><a href="https://www.google.ru/maps/place/%D1%83%D0%BB.+%D0%92%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B0%D1%8F,+87,+%D0%A1%D0%B0%D1%80%D0%B0%D1%82%D0%BE%D0%B2,+%D0%A1%D0%B0%D1%80%D0%B0%D1%82%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+410000/@51.5334043,46.0227858,17z/data=!3m1!4b1!4m5!3m4!1s0x4114c7b89f8405e1:0x8aa73aca80509ebf!8m2!3d51.533401!4d46.0249745"
	target="_blank">Volsky st., 87<br> phone number: +7 (8452) 46-90-70 <br>Open all days: from 10:00 till 20:00</a><br>
	<br>
	<HR><b>Russia, Kazan</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@55.7909555,49.1055376,17z/data=!3m1!4b1!4m5!3m4!1s0x415ead18459d845d:0x7ca145cf40bfbdfe!8m2!3d55.7909525!4d49.1077263"
	target="_blank">Chernyshevsky st., 27a, <br>phone number: +7 (843) 245-27-99 <br>Open all days: from 10:00 till 20:00</a><br>
	<br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@55.7932628,49.1486481,17z/data=!3m1!4b1!4m5!3m4!1s0x415ead717a861767:0x5a9a98bd6a7d9c6!8m2!3d55.7932598!4d49.1508368"
	target="_blank">Hotel&Shopping Center Korston, Ershov st., 1a, ground floor<br>phone number: +7 (843) 245-12-99 <br>Open all days: from 10:00 till 22:00</a><br>
	<br>
	<HR><b>Russia, Ulyanovsk</b><br><br><a href="https://www.google.ru/maps/place/%D1%83%D0%BB.+%D0%93%D0%BE%D0%BD%D1%87%D0%B0%D1%80%D0%BE%D0%B2%D0%B0,+5,+%D0%A3%D0%BB%D1%8C%D1%8F%D0%BD%D0%BE%D0%B2%D1%81%D0%BA,+%D0%A3%D0%BB%D1%8C%D1%8F%D0%BD%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+432000/@54.3098474,48.3939591,17z/data=!4m13!1m7!3m6!1s0x415d3712a1477c0f:0x433483926c91e1fc!2z0YPQuy4g0JPQvtC90YfQsNGA0L7QstCwLCA1LCDQo9C70YzRj9C90L7QstGB0LosINCj0LvRjNGP0L3QvtCy0YHQutCw0Y8g0L7QsdC7LiwgNDMyMDAw!3b1!8m2!3d54.310273!4d48.395901!3m4!1s0x415d3712a1477c0f:0x433483926c91e1fc!8m2!3d54.310273!4d48.395901"
	target="_blank">Goncharova st., 5, <br>phone number: +7 (8422) 70-36-40 <br>Open all days: from 10:00 till 20:00</a><br>
	<br>
	<HR><b>Russia, Ufa</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@54.7262411,55.938389,17z/data=!3m1!4b1!4m5!3m4!1s0x43d93a4329b38ba7:0x8a5c59ffb17ee864!8m2!3d54.7262411!4d55.9405777"
	target="_blank">Karl Marx st., 25, <br>phone number: +7 (347) 266-58-86 <br>Open all days: from 10:00 till 20:00</a><br>
	<br>
	<HR><b>Russia, Samara</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.1868906,50.0887003,17z/data=!3m1!4b1!4m5!3m4!1s0x41661e17982eff57:0xd6396e0f7bc86803!8m2!3d53.1868874!4d50.090889"
	target="_blank">Frunze st., 86, <br>phone number: +7 (846) 277-03-86 <br>Open all days: from 10:00 till 20:00<br></a>
	<br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.212534,50.1796523,17z/data=!3m1!4b1!4m5!3m4!1s0x41661ea35056d5b3:0x200099537d46c4a5!8m2!3d53.2125308!4d50.181841!6m1!1e1"
	target="_blank">Shopping center Rus-at-Volga, Moskovskoe highway, 15B, ground floor, <br>phone number: +7 (846) 277-08-23 <br>Open all days: from 10:00 till 21:00<br></a>
	<br>
	<HR><b>Russia, Toglyatti</b><br><br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.5009726,49.2712072,17z/data=!3m1!4b1!4m5!3m4!1s0x41687bcd78f69091:0x967b08739ab39798!8m2!3d53.5009694!4d49.2733959"
	target="_blank">Shopping center Vega, Yubileinaya st., 40, room 144<br>phone number: +7 (8482) 78-39-70 <br>Open all days: from 10:00 till 21:00<br></a>
	<br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.5096364,49.4205637,17z/data=!3m1!4b1!4m5!3m4!1s0x41687f33af3ade19:0xff53ee2051812291!8m2!3d53.5096332!4d49.4227524"
	target="_blank">Pobedy st., 78<br>phone number: +7 (8482) 78-15-33  <br>Open all days: from 10:00 till 20:00</a><br><br>
	<HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Imperial porcelain in social networks</b><HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Facebook</b><br><a href="https://www.facebook.com/ifarfor/" target="_blank">
	https://www.facebook.com/ifarfor/</a><br>
	<HR>
	<b>VK</b><br><a href="https://vk.com/ipmclub" target="_blank">https://vk.com/ipmclub</a><br>
	<HR>
	<b>Instagram</b><br><a href="https://www.instagram.com/ifarfor/" target="_blank">https://www.instagram.com/ifarfor/</a><br>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<a href="/en/company/" target="_top"><b>Requisites</b></a>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<a href="/en/delivery/" target="_top"><b>Terms of delivery</b></a>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<b>Email</b><HR style="height: 1px;border: none; color: black; background-color: black;">
	For orders and cooperation: order2 @ ifarfor . ru <br><br><br><br>';
	else
		echo '<b>Адреса и телефоны магазинов</b><HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>г. Саратов</b><br><br><a href="https://www.google.ru/maps/place/%D1%83%D0%BB.+%D0%92%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B0%D1%8F,+87,+%D0%A1%D0%B0%D1%80%D0%B0%D1%82%D0%BE%D0%B2,+%D0%A1%D0%B0%D1%80%D0%B0%D1%82%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+410000/@51.5334043,46.0227858,17z/data=!3m1!4b1!4m5!3m4!1s0x4114c7b89f8405e1:0x8aa73aca80509ebf!8m2!3d51.533401!4d46.0249745"
	target="_blank">ул. Вольская, 87 (между проспектом Кирова и Большой Казачьей),<br>
	телефон: +7 (8452) 46-90-70 <br>график работы: с 10:00 до 20:00 без выходных </a><br>
	<br>
	<HR><b>г. Ульяновск</b><br><br><a href="https://www.google.ru/maps/place/%D1%83%D0%BB.+%D0%93%D0%BE%D0%BD%D1%87%D0%B0%D1%80%D0%BE%D0%B2%D0%B0,+5,+%D0%A3%D0%BB%D1%8C%D1%8F%D0%BD%D0%BE%D0%B2%D1%81%D0%BA,+%D0%A3%D0%BB%D1%8C%D1%8F%D0%BD%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+432000/@54.3098474,48.3939591,17z/data=!4m13!1m7!3m6!1s0x415d3712a1477c0f:0x433483926c91e1fc!2z0YPQuy4g0JPQvtC90YfQsNGA0L7QstCwLCA1LCDQo9C70YzRj9C90L7QstGB0LosINCj0LvRjNGP0L3QvtCy0YHQutCw0Y8g0L7QsdC7LiwgNDMyMDAw!3b1!8m2!3d54.310273!4d48.395901!3m4!1s0x415d3712a1477c0f:0x433483926c91e1fc!8m2!3d54.310273!4d48.395901"
	target="_blank">ул. Гончарова, 5, рядом с гостиницей «Волга»<br>телефон: +7 (8422) 70-36-40 <br>график работы с 10:00 до 20:00 без выходных  </a><br>
	<br>
	<HR><b>г. Казань</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@55.7909555,49.1055376,17z/data=!3m1!4b1!4m5!3m4!1s0x415ead18459d845d:0x7ca145cf40bfbdfe!8m2!3d55.7909525!4d49.1077263"
	target="_blank">ул. Чернышевского, 27а, телефон: +7 (843) 245-27-99 <br>график работы: с 10:00 до 20:00 без выходных </a><br>
	<br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@55.7932628,49.1486481,17z/data=!3m1!4b1!4m5!3m4!1s0x415ead717a861767:0x5a9a98bd6a7d9c6!8m2!3d55.7932598!4d49.1508368"
	target="_blank">ГТРК «Корстон», ул. Николая Ершова, 1А, левый вход, первый этаж, напротив «Le Buffet», <br>телефон: +7 (843) 245-12-99 <br>график работы с 10:00 до 22:00 без выходных </a><br>
	<br>
	<HR><b>г. Уфа</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@54.7262411,55.938389,17z/data=!3m1!4b1!4m5!3m4!1s0x43d93a4329b38ba7:0x8a5c59ffb17ee864!8m2!3d54.7262411!4d55.9405777"
	target="_blank">ул. Карла Маркса, 25, рядом с гостиницей «Астория»<br>телефон: +7 (347) 266-58-86 <br>график работы с 10:00 до 20:00 без выходных  </a><br>
	<br>
	<HR><b>г. Самара</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.1868906,50.0887003,17z/data=!3m1!4b1!4m5!3m4!1s0x41661e17982eff57:0xd6396e0f7bc86803!8m2!3d53.1868874!4d50.090889"
	target="_blank">ул. Фрунзе, 86, пересечение ул. Ленинградской и ул. Фрунзе,  <br>телефон: +7 (846) 277-03-86 <br>график работы с 10:00 до 20:00 без выходных <br></a>
	<br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.212534,50.1796523,17z/data=!3m1!4b1!4m5!3m4!1s0x41661ea35056d5b3:0x200099537d46c4a5!8m2!3d53.2125308!4d50.181841!6m1!1e1"
	target="_blank">ТЦ «Русь на Волге», Московское шоссе, 15Б, первый этаж, <br>телефон: +7 (846) 277-08-23 <br>график работы с 10:00 до 21:00 без выходных <br></a>
	<br>
	<HR><b>г. Тольятти</b><br><br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.5009726,49.2712072,17z/data=!3m1!4b1!4m5!3m4!1s0x41687bcd78f69091:0x967b08739ab39798!8m2!3d53.5009694!4d49.2733959"
	target="_blank">ТРЦ «Вега», ул. Юбилейная, 40, секция 144, рядом с кинотеатром, <br>тел: +7 (8482) 78-39-70 <br>график работы с 10:00 до 21:00 без выходных <br></a>
	<br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.5096364,49.4205637,17z/data=!3m1!4b1!4m5!3m4!1s0x41687f33af3ade19:0xff53ee2051812291!8m2!3d53.5096332!4d49.4227524"
	target="_blank">ул. Победы, 78, рядом с центральным парком, <br>телефон: +7 (8482) 78-15-33  <br>график работы с 10:00 до 20:00 без выходных</a><br><br>
	<HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Императорский фарфор в социальных сетях</b><HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Facebook</b><br><a href="https://www.facebook.com/ifarfor/" target="_blank">
	https://www.facebook.com/ifarfor/</a><br>
	<HR>
	<b>ВКонтакте</b><br><a href="https://vk.com/ipmclub" target="_blank">https://vk.com/ipmclub</a><br>
	<HR>
	<b>Instagram</b><br><a href="https://www.instagram.com/ifarfor/" target="_blank">https://www.instagram.com/ifarfor/</a><br>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<a href="/company/" target="_top"><b>Реквизиты</b></a>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<a href="/delivery/" target="_top"><b>Условия доставки</b></a>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<b>Электронная почта</b><HR style="height: 1px;border: none; color: black; background-color: black;">
	По вопросам заказов и сотрудничества: order2 @ ifarfor . ru <br><br><br><br>';
	echo'		</td><td width="25%">&nbsp;</td></tr></table>';}
elseif($menuname=="cabinet"){
	$username=GetNameOfUser($userid);
	switch($menuname2){
		case "create": case "order": case "signin": $activemenu=10;break;
		case "basket":$activemenu=7;break;
		case "edit":$activemenu=4;break;
		case "reset": $activemenu=5;break;
		case "logout": $activemenu=6;break;
		case "pay":  $activemenu=8;break;
		case "worked":  $activemenu=2;break;
		case "archive":  $activemenu=3;break;
		case "adminwork":  $activemenu=11;break;
		default:$activemenu=0;}
	if($language=='en') $langreset="&language=en";
	if($username!='Неизвестный' and $username!='Гость' ){
		echo PrintTopLeftMenu($showphoto,$bgColorOfBottom); 
		echo PrintLeftMenu($activemenu);
		$resettext="&rst=1";
	}
	if($menuname2=="create"){
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/create.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="worked")	echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/worked.php'.$langaddstr).'"></IFRAME>';
	elseif($menuname2=="archive")	echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/archive.php'.$langaddstr).'"></IFRAME>';
	elseif($menuname2=="signin")	echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/signin.php'.$langaddstr).'"></IFRAME>';
	elseif($menuname2=="adminwork")	echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="YES" width="100%" height="1300px;" id=order name=order src="'.aPSID('/adminworking.php'.$langaddstr).'"></IFRAME>';
	elseif($menuname2=="reset")	echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/reset.php?uid='.$menuname3.'&sw='.$menuname4.$resettext.$langreset).'"></IFRAME>';
	elseif($menuname2=="logout")	echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/logout.php'.$langaddstr).'"></IFRAME>';
	elseif($menuname2=="pay")	echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/pay.php'.$langaddstr).'"></IFRAME>';
	elseif($menuname2=="edit")	echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/cabinet.php'.$langaddstr).'"></IFRAME>';
	elseif($menuname2=="order")echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/order.php'.$langaddstr).'"></IFRAME>';
	elseif($menuname2=="basket") echo print_mybox_Farfor(1,$language);
	else{	}
	//echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1000px;" id=order name=order src="/cabinet.php"></IFRAME>';
	echo '	 </form></td></tr></table></td></tr></table></td></tr></table></td></tr></table>';
}
elseif($menuname=='search')echo'';
else echo $menuname;
/*$pagename=$_GET['page'];
$Mozno=0;
if($pagename=="news.php")$Mozno=1;
elseif($pagename=="help.php")$Mozno=1;
elseif(strpos($pagename,"help.php")==1)$Mozno=1;
if($Mozno==1){
	$pagename=$_SERVER['DOCUMENT_ROOT']."/".$pagename;
	if(file_exists($pagename)){
		if(strpos($pagename,".htm")){
			$file = fopen ($pagename,"r");
			if($file ){
				$response = fread ($file,filesize($pagename));
				fclose ($file);
				echo add_sessid_to_tag($response);
				set_stat($_GET['page']);
			}
		}
		else include($pagename);
	}
	else echo("файл ".$pagename." не найден на сервере.");
}*/
//else  //include("news.php");
//echo '<div id="modalform" style="display: none;"><h2>'.$tovarstr.'</h2><span style="font-size:18px;font-weight:300;color:#0000CC;TEXT-DECORATION: underline;" id="modalclose">X</a></div>';
echo '</body>';


echo '</html>';
//========================================================================================================
//========================================================================================================
//========================================================================================================
//========================================================================================================
//============================================MakeStrokeSQL  ==============================================
//========================================================================================================
//========================================================================================================
function MakeStrokeSQL($HotStr2,$page,$group,$Uslovie,$Filter,$Sort,$ShAll){
	if($Uslovie=="all") $Uslovie="";
	if($Filter!=""){
		$sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)';
		$qq=explode("|",$Filter);
		$num = count($qq);
		for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
		$Uslovie.=$sql_filter;
	}
	//$bone='';
	//if(isset($_POST['TipBone']) and   $_POST['TipBone'] == 'yes') {$Uslovie.=' AND (TipOfMaterial=3 OR TipOfMaterial=4 OR TipOfMaterial=6)';}
	//==============вставка=================================по форме отбор==========================
	$a = array();$RightFormUslovie2='';//$menup='menu';
	$rurusi=sql("SELECT * FROM form"); $countrurus=mysqli_num_rows($rurusi);
	if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
	ksort ($a);
	foreach($a as $k => $t){
		if(isset($_POST["frm$t"]) and   $_POST["frm$t"] == 'yes'){
			if($RightUslovie2=='')$RightUslovie2.=" AND (form=$t"; else $RightUslovie2.=" OR form=$t"; }  };
	if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
	mysqli_free_result($rurusi);
	//==============вставка============================================================================
	//==============вставка=================================по производителю отбор====================
	$a = array();$RightUslovie2='';
	$rurusi=sql("SELECT * FROM brand"); $countrurus=mysqli_num_rows($rurusi);
	if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
	ksort ($a);
	foreach($a as $k => $t){
		if(isset($_POST["br$t"]) and   $_POST["br$t"] == 'yes'){
			if($RightUslovie2=='')$RightUslovie2.=" AND (Factory=$t"; else $RightUslovie2.=" OR Factory=$t"; }  };
	if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
	mysqli_free_result($rurusi);
	//==============вставка============================================================================
	//echo 'h'.$HotStr2;
	if($HotStr2==""){$SQLZapros=" (idg='$group' ";
		$query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
	}
	else{
		$sql_filter='grp=0';
		$qq=explode(" ",$HotStr2);
		$num = count($qq);
		for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
		$Uslovie.=$sql_filter;
		$query0=sql("SELECT id FROM tovsNew WHERE grp=1 AND $Uslovie ORDER BY name");
		$SQLZapros=" (";
	}
	$countquery1=mysqli_num_rows($query0);
	while($row = mysqli_fetch_array($query0)){
		$iddd=$row['id'];
		$SQLZapros=$SQLZapros." or idg ='$iddd'";
	};
	//$SQLZapros.=")AND grp=0 $Uslovie";
	if($ShAll=="1") $SQLZapros.=")AND grp=0 AND ((zakaz+sklad+grp)>0) $Uslovie";//post('ShowFoto')=='yes' or 
	else $SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0) $Uslovie";
	//будем считать только условия! и их и возвращать, а уже саму строку Селекта добавлять не в функции, а в теле программы
	//if($HotStr=='')$query1=sql($SQLZapros);else $query1=sql($HotStr);*/
	mysqli_free_result($query0);
	return $SQLZapros;
}//========================================================================================================
//============================================MakeStrokeSQL  Mat=========================================
//========================================================================================================
function MakeStrokeSQLMat($HotStr,$page,$group,$Uslovie,$Filter,$Sort,$ShAll){
	$a = array();
	if($Uslovie=="all") $Uslovie="";
	if($Filter!=""){
		$sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)' ;
		$qq=explode("|",$Filter);
		$num = count($qq);
		for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
		$Uslovie.=$sql_filter;
	}
	//$bone='';
	//if(isset($_POST['TipBone']) and   $_POST['TipBone'] == 'yes') {$Uslovie.=' AND (TipOfMaterial=3 OR TipOfMaterial=4 OR TipOfMaterial=6)';}
	//==============вставка=================================по картинке отбор==========================
	$a = array();$RightUslovie2='';
	$rurusi=sql("SELECT * FROM picture"); $countrurus=mysqli_num_rows($rurusi);
	if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
	ksort ($a);
	foreach($a as $k => $t){
		if(isset($_POST["pcx$t"]) and   $_POST["pcx$t"] == 'yes'){
			if($RightUslovie2=='')$RightUslovie2.=" AND (picture=$t"; else $RightUslovie2.=" OR picture=$t"; }  };
	if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
	mysqli_free_result($rurusi);
	//==============вставка============================================================================
	//==============вставка=================================по производителю отбор====================
	$a = array();$RightUslovie2='';
	$rurusi=sql("SELECT * FROM brand"); $countrurus=mysqli_num_rows($rurusi);
	if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
	ksort ($a);
	foreach($a as $k => $t){
		if(isset($_POST["br$t"]) and   $_POST["br$t"] == 'yes'){
			if($RightUslovie2=='')$RightUslovie2.=" AND (Factory=$t"; else $RightUslovie2.=" OR Factory=$t"; }  };
	if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
	mysqli_free_result($rurusi);
	//==============вставка============================================================================
	if($HotStr==""){$SQLZapros=" (idg='$group' ";
		$query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
	}
	else{
		$sql_filter='grp=0';
		$qq=explode(" ",$HotStr);
		$num = count($qq);
		for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
		$Uslovie.=$sql_filter;
		$query0=sql("SELECT id FROM tovsNew WHERE grp=1 AND $Uslovie ORDER BY name");
		$SQLZapros=" ($Uslovie ";
	}
	$countquery1=mysqli_num_rows($query0);
	while($row = mysqli_fetch_array($query0)){
		$iddd=$row['id'];
		$SQLZapros=$SQLZapros." or idg ='$iddd'";
	};
	//$SQLZapros.=")AND grp=0 $Uslovie";
	if($ShAll=="1") $SQLZapros.=")AND grp=0 AND ((zakaz+sklad+grp)>0) $Uslovie";//post('ShowFoto')=='yes'
	else $SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0) $Uslovie";
	//будем считать только условия! и их и возвращать, а уже саму строку Селекта добавлять не в функции, а в теле программы
	//if($HotStr=='')$query1=sql($SQLZapros);else $query1=sql($HotStr);*/
	mysqli_free_result($query0);
	return $SQLZapros;
}
//========================================================================================================
//============================================MakeStrokeSQL  Form=========================================
//========================================================================================================
function MakeStrokeSQLForm($HotStr,$page,$group,$Uslovie,$Filter,$Sort,$ShAll){
	$a = array();
	if($Uslovie=="all") $Uslovie="";
	if($Filter!=""){
		$sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)' ;
		$qq=explode("|",$Filter);
		$num = count($qq);
		for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
		$Uslovie.=$sql_filter;
	}
	//$bone='';
	//if(isset($_POST['TipBone']) and   $_POST['TipBone'] == 'yes') {$Uslovie.=' AND (TipOfMaterial=3 OR TipOfMaterial=4 OR TipOfMaterial=6)';}
	//==============вставка=================================по картинке отбор==========================
	$a = array();$RightUslovie2='';
	$rurusi=sql("SELECT * FROM picture"); $countrurus=mysqli_num_rows($rurusi);
	if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
	ksort ($a);
	foreach($a as $k => $t){
		if(isset($_POST["pcx$t"]) and   $_POST["pcx$t"] == 'yes'){
			if($RightUslovie2=='')$RightUslovie2.=" AND (picture=$t"; else $RightUslovie2.=" OR picture=$t"; }  };
	if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
	mysqli_free_result($rurusi);
	//==============вставка============================================================================
	//==============вставка=================================по производителю отбор====================
	$a = array();$RightUslovie2='';
	$rurusi=sql("SELECT * FROM brand"); $countrurus=mysqli_num_rows($rurusi);
	if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
	ksort ($a);
	foreach($a as $k => $t){
		if(isset($_POST["br$t"]) and   $_POST["br$t"] == 'yes'){
			if($RightUslovie2=='')$RightUslovie2.=" AND (Factory=$t"; else $RightUslovie2.=" OR Factory=$t"; }  };
	if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
	mysqli_free_result($rurusi);
	//==============вставка============================================================================
	if($HotStr==""){$SQLZapros=" (idg='$group' ";
		$query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
	}
	else{
		$sql_filter='grp=0';
		$qq=explode(" ",$HotStr);
		$num = count($qq);
		for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
		$Uslovie.=$sql_filter;
		$query0=sql("SELECT id FROM tovsNew WHERE grp=1 AND $Uslovie ORDER BY name");
		$SQLZapros=" ($Uslovie ";
	}
	$countquery1=mysqli_num_rows($query0);
	while($row = mysqli_fetch_array($query0)){
		$iddd=$row['id'];
		$SQLZapros=$SQLZapros." or idg ='$iddd'";
	};
	//$SQLZapros.=")AND grp=0 $Uslovie";
	if($ShAll=="1") $SQLZapros.=")AND grp=0 AND ((zakaz+sklad+grp)>0) $Uslovie";//post('ShowFoto')=='yes'
	else $SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0) $Uslovie";
	//будем считать только условия! и их и возвращать, а уже саму строку Селекта добавлять не в функции, а в теле программы
	//if($HotStr=='')$query1=sql($SQLZapros);else $query1=sql($HotStr);*/
	mysqli_free_result($query0);
	return $SQLZapros;
}
//========================================================================================================
//============================================MakeStrokeSQL  Brand=========================================
//========================================================================================================
function MakeStrokeSQLBrand($HotStr,$page,$group,$Uslovie,$Filter,$Sort,$ShAll){
	$a = array();
	if($Uslovie=="all") $Uslovie="";
	if($Filter!=""){
		$sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)';
		$qq=explode("|",$Filter);
		$num = count($qq);
		for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
		$Uslovie.=$sql_filter;
	}
	//$bone='';
	//if(isset($_POST['TipBone']) and   $_POST['TipBone'] == 'yes') {$Uslovie.=' AND (TipOfMaterial=3 OR TipOfMaterial=4 OR TipOfMaterial=6)';}
	//==============вставка=================================по картинке отбор==========================
	$a = array();$RightUslovie2='';
	$rurusi=sql("SELECT * FROM picture"); $countrurus=mysqli_num_rows($rurusi);
	if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
	ksort ($a);
	foreach($a as $k => $t){
		if(isset($_POST["pcx$t"]) and   $_POST["pcx$t"] == 'yes'){
			if($RightUslovie2=='')$RightUslovie2.=" AND (picture=$t"; else $RightUslovie2.=" OR picture=$t"; }  };
	if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
	mysqli_free_result($rurusi);
	//==============вставка============================================================================
	//==============вставка=================================по форме отбор====================
	$a = array();$RightUslovie2='';
	$rurusi=sql("SELECT * FROM form"); $countrurus=mysqli_num_rows($rurusi);
	if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
	ksort ($a);
	foreach($a as $k => $t){
		if(isset($_POST["frm$t"]) and   $_POST["frm$t"] == 'yes'){
			if($RightUslovie2=='')$RightUslovie2.=" AND (form=$t"; else $RightUslovie2.=" OR form=$t"; }  };
	if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
	mysqli_free_result($rurusi);
	//==============вставка============================================================================
	if($HotStr==""){$SQLZapros=" (idg='$group' ";
		$query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
	}
	else{
		$sql_filter='grp=0';
		$qq=explode(" ",$HotStr);
		$num = count($qq);
		for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
		$Uslovie.=$sql_filter;
		$query0=sql("SELECT id FROM tovsNew WHERE grp=1 AND $Uslovie ORDER BY name");
		$SQLZapros=" ($Uslovie ";
	}
	$countquery1=mysqli_num_rows($query0);
	while($row = mysqli_fetch_array($query0)){
		$iddd=$row['id'];
		$SQLZapros=$SQLZapros." or idg ='$iddd'";
	};
	//$SQLZapros.=")AND grp=0 $Uslovie";
	if($ShAll=="1") $SQLZapros.=")AND grp=0 AND ((zakaz+sklad+grp)>0) $Uslovie";//post('ShowFoto')=='yes'
	else $SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0) $Uslovie";
	//будем считать только условия! и их и возвращать, а уже саму строку Селекта добавлять не в функции, а в теле программы
	//if($HotStr=='')$query1=sql($SQLZapros);else $query1=sql($HotStr);*/
	mysqli_free_result($query0);
	return $SQLZapros;
}
//========================================================================================================
//========================================================================================================
//============================================PrintCatalog=================================================
//========================================================================================================
//========================================================================================================
function PrintCatalog($HotStr,$page,$group,$Uslovie,$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language){
		global $HotStr3;
	$dollar=GetCurentKursDolars();if($Uslovie=="all") $Uslovie="";$pobeda=$_GET['pobeda'];if($language=="en")$strbask="Add to basket";else $strbask="в корзину";
$menuVersion = whichshop3();	
if($menuVersion=='ifarfor') $bclr='AD9E82'; else $bclr='82a0ae';	
if($HotStr=='' and $HotStr3=='')
{	
	if($Filter!=""){
		$sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)'; $qq=explode("|",$Filter); $num = count($qq);
		for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';$Uslovie.=$sql_filter;}
	$Uslovie.=$RightUslovie." ORDER BY ";
	switch($Sort){
		case "n": $Uslovie.="name";break; case "-n": $Uslovie.="name DESC";break;
		case "p": $Uslovie.="price1s";break; case "-p": $Uslovie.="price1s DESC";break;
		default: $Uslovie.="name";break;
	}
	
	if($page=='stoppard') $Diameter200="  and zakaz='1' "; else $Diameter200='AND ((zakaz+sklad)>0)'; //AND ((zakaz)>0)
		
	$SQLZapros="SELECT * FROM tovsNew WHERE (idg='$group' ";$query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
	$countquery1=mysqli_num_rows($query0);
	while($row = mysqli_fetch_array($query0)){$iddd=$row['id'];$SQLZapros=$SQLZapros." or idg ='$iddd'";};
	if($ShAll==1)  $SQLZapros.=")AND grp=0 $Diameter200 $Uslovie";
	else {
		$SQLZaprosTest=$SQLZapros.")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' $Diameter200 $Uslovie";
		$query1=sql($SQLZaprosTest);
		$countquery1=mysqli_num_rows($query1);
		if($countquery1==0) $SQLZapros.=")AND grp=0 $Diameter200 $Uslovie";//Если товаров с фотографиями в группе нет - покажем ка мы даже без фото! 
		else				$SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' $Diameter200 $Uslovie";
	}
	$query1=sql($SQLZapros);
	//echo($SQLZapros);
}
elseif($HotStr!='')
	{
		if($ShAll=="1") $SQLZapros="AND grp=0 AND ((zakaz+sklad)>0) ORDER BY name";//post('ShowFoto')=='yes'
		else $SQLZapros="AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad)>0) ORDER BY name";// 
		if($HotStr=="RUSSIANSTYLE"){$HotStr="SELECT * FROM tovsNew WHERE Rstyle='1'  $SQLZapros";}
		elseif($HotStr=="project"){$HotStr="SELECT * FROM tovsNew WHERE TipAss='Проект'  $SQLZapros";}
		elseif($HotStr=="cobaltnet"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE (picture.english='Cobalt net' or picture.name='Кобальтовая сетка Модерн') $SQLZapros";}
		elseif($HotStr=="nega"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM form LEFT JOIN tovsNew ON form.id = tovsNew.Form WHERE form.name='Нега' $SQLZapros";}
		elseif($HotStr=="zamoscow"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE picture.name='Замоскворечье' $SQLZapros";}
		elseif($HotStr=="newyear"){$HotStr="SELECT * FROM tovsNew WHERE NY='1' $SQLZapros";}
		elseif($HotStr=="nephrit"){$HotStr="SELECT * FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE (picture.name='Нефритовый фон' or  picture.name='Нефритовый фон 2') $SQLZapros";}
		$query1=sql($HotStr);
	}
else
	{

	if($HotStr3!=''){
		$SQLZapros="AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad)>0) ORDER BY name DESC";// 
		if($HotStr3=="newyear"){$HotStr="SELECT * FROM tovsNew WHERE NY='1' $SQLZapros";}
		elseif($HotStr3=="cobaltnet"){$HotStr="SELECT  * FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE (picture.english='Cobalt net' or picture.name='Кобальтовая сетка Модерн')
		AND grp=0 AND ((zakaz+sklad)>0)  AND Imagefile<>'/icons/noimage.jpg' ORDER BY tovsNew.tip ";}
		elseif($HotStr3=="love"){$HotStr="SELECT * FROM tovsNew WHERE InLove='1' $SQLZapros";}
		elseif($HotStr3=="easter"){$HotStr="SELECT * FROM tovsNew WHERE Easter='1' $SQLZapros";}
		elseif($HotStr3=="russianstyle"){$HotStr="SELECT * FROM tovsNew WHERE Rstyle='1' $SQLZapros";}
		$query1=sql($HotStr);
	}
}
	$countquery1=mysqli_num_rows($query1);$counterofpage=0;$firstpiece=($firstpage-1)*$numberofpages;$lastpiece=$firstpiece+$numberofpages;if($lastpiece==0)$lastpiece=1000;$i=1;$j=1;
	if($language=="en")$rownamelang="english"; else$rownamelang="name";
	while($row = mysqli_fetch_array($query1)){
		$counterofpage++;
		if($counterofpage>$firstpiece and $counterofpage<=$lastpiece){
			$rowname=$row[$rownamelang];$Nnewprice=$row['price1s'];$Nnewprice=$Nnewprice;
			$ts=floor($Nnewprice/1000);$ed=$Nnewprice-($ts*1000);
			if($ts=='0') $ts="";else{if($ed<10)$ed='00'.$ed;elseif($ed<100)$ed='0'.$ed;};
			$newprice1="$ts $ed <img src='/img/rub-002.png' style='height:14px' alt='rur'>";
			$sklad=$row['sklad'];
			if($sklad=="0")$colorbag="bug.gif";	else $colorbag="bag.gif";
			$info="&nbsp;";
			$ida=$row['ida'];
			$id=$row['id'];
			$realname=$ida; 
			$perem=$row['Imagefile'];
			$vid=$row['Vid'];
			$tip=$row['Tip'];
			$picture=$row['Picture'];$form=$row['Form'];$brandid=$row['Factory'];$engvid=$row['videnglish'];$engtip=$row['tipenglish'];
			$rurus=sql("SELECT name FROM  brand WHERE id='$brandid'");if(mysqli_num_rows($rurus)>0) {$roww=mysqli_fetch_array($rurus); $brandname=$roww['name'];}
			$Height=$row['Height'];		$Capacity=$row['Capacity'];		$Diameter=$row['Diameter'];$Width=$row['Width'];
			$TipOfMaterial=$row['TipOfMaterial'];$flashbackcolor='red';$backcolor='blue';
			$Person=$row['Person'];$Predmetov=$row['Predmetov'];$AutorPicture=$row['AutorPicture'];
			$frontname=MakeFrontName($brandid,$rowname,$vid,$tip,$picture,$form,$TipOfMaterial,$Person,$Predmetov,$AutorPicture,
				$Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
			$bottomname=MakeBottomName($brandid,$newprice1,$language);
			if($perem=='/icons/noimage.jpg') $imginsert="";
			else $imginsert="<img width='100%' id='img".$id."' src='$perem'>";
			if($i<=3) $sti="padding-right:10px;";else $sti='';$Prov=ProverkaNal($id,'5');
			$result=sql("SELECT * FROM likeengine WHERE id='$id'");
			$countQuantStr=mysqli_num_rows($result);
			$printlike='<div id="like'.$id.'" onClick="LikeEngine(\'like'.$id.'\')" style="font-size:14px;font-weight:500;color:#'.$bclr.';vertical-align:top;cursor: pointer;">'.printlike($id,$countQuantStr,$language).'</div>';
			if($brandname=='Stoppard'){//Если это тарелки
				$printsize=printsize($id,200,$language);
				if($language=='en') $MM=' mm';else $MM=' мм';
				if(($Prov=='0') and ($pobeda=='1')){$i=$i-1;echo'1';}//пропускаем товар, которого нет в магазине
				else $echo.="<td class='ifzshop' style='$sti'>
				<table  cellpadding='0' cellspacing='0' class='cat'><tr><td class='cat1'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$frontname</a></td></tr>
				<td class='cat2'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$imginsert</a></td></tr>
				<td class='cat3'>
				<table width='100%'><tr><td width='50%'>
					<input data-itemid='$id' name='optionRadio$id' id='size1$id' value='150' type='radio'> 150$MM<br>
					<input data-itemid='$id' checked name='optionRadio$id' id='size2$id' value='200' type='radio'> 200$MM<br> 
					<input data-itemid='$id' name='optionRadio$id' id='size3$id' value='260' type='radio'> 260$MM 
				</td>
				<td width='50%' ><div id='size$id' style='FONT-SIZE: 15px;'>$printsize</div></td></tr></table>
			$printlike</td></tr></table></td>";	
			}
			else {//это не тарелки
			if(($Prov=='0') and ($pobeda=='1')){$i=$i-1;echo'1';}//пропускаем товар, которого нет в магазине
			else $echo.="<td class='ifzshop' style='$sti'>
			<table  cellpadding='0' cellspacing='0' class='cat'><tr><td class='cat1'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$frontname</a></td></tr>
			<td class='cat2'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$imginsert</a></td></tr>
			<td class='cat3'>$bottomname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href='".aPSID("/set.php?oper=add_tov&tov_id=$id&language=$language")."' id='ishop$id' target='market'>$strbask </a>$printlike
			</td></tr></table></td>";
			}
			if($i++>2){$i=1;$j++;$echo.="</tr><tr>";}
		}
	};
	while($j++<3)	$echo.="<td style='background-color:#FFFFFF;' ></td>";
	$echo.="</tr><tr>";
	if($numberofpages<$countquery1 and $numberofpages>0){
		$bhref="$stroka_sort/sortbycost";//$firstpage$numberofpages'>Цене</a>";
		$echo.="<td colspan='3' style='padding-top:30px;text-align:center;height:40px;'>
		<table align='center' cellpadding='2' cellspacing='10'><tr>";
		$echo.=" <td width='44%'>&nbsp;</td>";
		$npage=0;$addecho='';
		while($npage*$numberofpages<$countquery1){
			
			if($npage++<9)$addprn='0'; else $addprn="";
			$echo.=" <td width='1%' style='height: 40px;background-color:#FFFFFF;text-align:center;'>";
			if($npage==$firstpage)  $echo.="<figure style='width: 5px;height: 30px;  padding-left:10px; padding-bottom:5px;padding-right:10px;padding-top:12px; margin:0px; 
			vertical-align:middle;font-size:18px;'><b>".$npage."</b></figure>";
			else $echo.="<input width='15' height='15' type='submit' name='npage'  value='$npage'>";
			$echo.="</td>";
			if(round($npage/15)==$npage/15){$echo.="<td width='44%'>&nbsp;</td></tr><tr><td width='44%'>&nbsp;</td>";$addecho="<td width='15%' colspan='15'>&nbsp;</td>";}
		};
		$echo.=" $addecho<td width='44%'>&nbsp;</td></tr></table></td>";
	}
	//mysqli_free_result($query1);
	//mysqli_free_result($query0);
	return $echo;
}
//========================================================================================================
//========================================================================================================
//============================================printsearch=================================================
//========================================================================================================
//========================================================================================================
function printsearch($searchline){
	$searchline=sqlpz($searchline);
	global $language; global $userid;
	$rurus=sql("SELECT id FROM  brand WHERE name='Stoppard'");if(mysqli_num_rows($rurus)>0) {$roww=mysqli_fetch_array($rurus); $StoppardID=$roww['id'];}
	$menuVersion = whichshop3();
	if($menuVersion=='ifarfor') {$bclr='AD9E82';$StoppardUslovie='';} else {$bclr='82a0ae';$StoppardUslovie=' AND Factory="'.$StoppardID.'" AND zakaz="1"';} 
	if($language=="en"){$Zagolovok='Searching results';$strbask="Add to basket";$strnothing1="On your request:"; $strnothing2="found nothing. Trying to find something else.";}
	else{$Zagolovok='Результаты поиска';$strbask="в корзину";$strnothing1="По вашему запросу:"; $strnothing2="ничего не найдено. Попробуйте поискать что-то ещё.";}
	if(substr($searchline, 0, 7)=="tagform"){
		$searchline=substr($searchline, 7);
		$Uslovie="form.name='$searchline' AND sklad>0 AND Imagefile<>'/icons/noimage.jpg' ";
		$HotStr="SELECT tovsNew.name,ida, idg,tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM form LEFT JOIN tovsNew ON form.id = tovsNew.Form WHERE $Uslovie $StoppardUslovie ORDER BY tovsNew.name";//
		$r=sql($HotStr);
	}
	elseif(substr($searchline, 0, 6)=="tagpic"){
		$searchline=substr($searchline, 6);
		$Uslovie="picture.name='$searchline' AND sklad>0 AND Imagefile<>'/icons/noimage.jpg' ";
		$HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE $Uslovie $StoppardUslovie ORDER BY tovsNew.name";//
		$r=sql($HotStr);
	}
	elseif(substr($searchline, 0, 7)=="tagapic"){
		$searchline=substr($searchline, 7);
		$sql_filter='creator.name = "'.$searchline.'"';
		$Uslovie.=$sql_filter." AND sklad>0 AND Imagefile<>'/icons/noimage.jpg' ";
		$HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM creator LEFT JOIN tovsNew ON creator.id = tovsNew.AutorPicture WHERE $Uslovie $StoppardUslovie ORDER BY tovsNew.name";//
		$r=sql($HotStr);
	}
	elseif(substr($searchline, 0, 8)=="tagaform"){
		$searchline=substr($searchline, 8);
		$sql_filter='creator.name = "'.$searchline.'"';
		$Uslovie.=$sql_filter." AND sklad>0 AND Imagefile<>'/icons/noimage.jpg' ";
		$HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,AutorForm,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM creator LEFT JOIN tovsNew ON creator.id = tovsNew.AutorForm  WHERE $Uslovie $StoppardUslovie ORDER BY tovsNew.name";//
		$r=sql($HotStr);
	}
	elseif(substr($searchline, 0, 3)=="tag"){
		$searchline=substr($searchline, 3);
		$HotStr=$searchline;
		$SQLZapros="AND grp=0 $StoppardUslovie AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0)  ORDER BY name DESC";
		//if($HotStr=="RUSSIANSTYLE"){
		//elseif($HotStr=="cobaltnet")
		if($language=="en"){
			switch($HotStr){
				case "RUSSIANSTYLE": $nametitle="RUSSIAN STYLE";break;
				case "MYLIKE": $nametitle="MY LIKES";break;
				case "project": $nametitle="IPM PROJECTS";break;
				case "cobaltnet": $nametitle="COBALT NET";break;
				case "nega": $nametitle="NEGA";break;
				case "zamoscow": $nametitle="ZAMOSKVORECHYE";break;
				case "nephrit": $nametitle="NEPHRITE BACKGROUND";break;
				case "WHITE": $nametitle="WHITE PORCELAIN";break;
				case "FLOWERS": $nametitle="FLOWERS";break;
				case "LITERATURE": $nametitle="LITERATURE";break;
				case "THEATRE": $nametitle="THEATRE";break;
				case "PETER": $nametitle="SAINT PETERSBURG";break;
				case "MOSCOW": $nametitle="MOSCOW";break;
				case "WEDDING": $nametitle="WEDDING";break;
				case "HAPPYBD": $nametitle="HAPPY BIRTHDAY";break;
				case "NEWYEAR": $nametitle="HAPPY NEW YEAR";break;
				case "VALENTINE": $nametitle="SAINT VALENTINE'S DAY";break;
				case "MASL": $nametitle="MASLENITSA";break;
				case "EASTER": $nametitle="HAPPY EASTER";break;
				case "VICTORY": $nametitle="VICTORY'S DAY";break;
				case "FEB23": $nametitle="MILITARY PORCELAIN";break;
				case "MART8": $nametitle="8TH MARTH";break;
				case "TEACHER": $nametitle="GIFT FOR TEACHER";break;
				case "KIDS": $nametitle="FOR KIDS";break;
				default: ;break;}
		}
		else{
			switch($HotStr){
				case "RUSSIANSTYLE": $nametitle="РУССКИЙ СТИЛЬ";break;
				case "MYLIKE": $nametitle="МОИ ОТМЕТКИ НРАВИТСЯ";break;
				case "project": $nametitle="ПРОЕКТЫ ИФЗ";break;
				case "cobaltnet": $nametitle="КОБАЛЬТОВАЯ СЕТКА";break;
				case "nega": $nametitle="НЕГА";break;
				case "zamoscow": $nametitle="ЗАМОСКВОРЕЧЬЕ";break;
				case "nephrit": $nametitle="НЕФРИТОВЫЙ ФОН";break;
				case "zamoscow": $nametitle="ЗАМОСКВОРЕЧЬЕ";break;
				case "WHITE": $nametitle="БЕЛЫЙ ФАРФОР";break;
				case "FLOWERS": $nametitle="ЦВЕТЫ";break;
				case "LITERATURE": $nametitle="ЛИТЕРАТУРА";break;
				case "THEATRE": $nametitle="ТЕАТР";break;
				case "PETER": $nametitle="САНКТ-ПЕТЕРБУРГ";break;
				case "MOSCOW": $nametitle="МОСКВА";break;
				case "WEDDING": $nametitle="СВАДЬБА";break;
				case "HAPPYBD": $nametitle="ДЕНЬ РОЖДЕНИЯ";break;
				case "NEWYEAR": $nametitle="НОВЫЙ ГОД";break;
				case "VALENTINE": $nametitle="ДЕНЬ ВЛЮБЛЕННЫХ";break;
				case "MASL": $nametitle="МАСЛЕНИЦА";break;
				case "EASTER": $nametitle="ПАСХА";break;
				case "VICTORY": $nametitle="ДЕНЬ ПОБЕДЫ";break;
				case "FEB23": $nametitle="23 ФЕВРАЛЯ";break;
				case "MART8": $nametitle="8 МАРТА";break;
				case "TEACHER": $nametitle="ПОДАРОК УЧИТЕЛЮ";break;
				case "KIDS": $nametitle="ДЕТЯМ";break;
				default: ;break;}
		}
		if($HotStr=="RUSSIANSTYLE"){$HotStr="SELECT * FROM tovsNew WHERE Rstyle='1' $SQLZapros";}
		elseif($HotStr=="MYLIKE"){
			$HotStr="SELECT * FROM likeengine LEFT JOIN tovsNew ON likeengine.id = tovsNew.id WHERE likeengine.userid='$userid' ORDER BY tovsNew.name";
		}
		elseif($HotStr=="project"){$HotStr="SELECT * FROM tovsNew WHERE TipAss='Проект'  $SQLZapros";}
		elseif($HotStr=="cobaltnet"){
			$r=sql("SELECT id FROM picture WHERE name='Кобальтовая сетка'");$row=mysqli_fetch_array($r);$id1=$row[id];
			$r=sql("SELECT id FROM picture WHERE name='Кобальтовая сетка Модерн'");$row=mysqli_fetch_array($r);$id2=$row[id];
			$HotStr="SELECT * FROM tovsNew WHERE Picture='$id1' or Picture='$id2' $SQLZapros";}
		elseif($HotStr=="nega"){
			$r=sql("SELECT id FROM form WHERE name='Нега'");$row=mysqli_fetch_array($r);$id1=$row[id];
			$HotStr="SELECT * FROM tovsNew WHERE Form='$id1' $SQLZapros";}
		elseif($HotStr=="zamoscow"){
			$r=sql("SELECT id FROM picture WHERE name='Замоскворечье'");$row=mysqli_fetch_array($r);$id1=$row[id];
			$HotStr="SELECT * FROM tovsNew WHERE Picture='$id1' $SQLZapros";}
		//elseif($HotStr=="newyear"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE picture.name='Замоскворечье' $SQLZapros";}
		elseif($HotStr=="nephrit"){
			$r=sql("SELECT id FROM picture WHERE name='Нефритовый фон'");$row=mysqli_fetch_array($r);$id1=$row[id];
			$HotStr="SELECT * FROM tovsNew WHERE Picture='$id1' $SQLZapros";}
		elseif($HotStr=="FLOWERS"){$HotStr="SELECT * FROM tovsNew WHERE Flower='1' $SQLZapros";}
		//elseif($HotStr=="ПРОЕКТЫ ИФЗ"){$HotStr="SELECT name,ida,id,idg,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM tovsNew WHERE TipAss='Проект' $SQLZapros";}
		elseif($HotStr=="LITERATURE"){$HotStr="SELECT * FROM tovsNew WHERE Literature='1' $SQLZapros";}
		elseif($HotStr=="THEATRE"){$HotStr="SELECT * FROM tovsNew WHERE Theatre='1' $SQLZapros";}
		elseif($HotStr=="PETER"){$HotStr="SELECT * FROM tovsNew WHERE Peterburg='1' $SQLZapros";}
		elseif($HotStr=="MOSCOW"){$HotStr="SELECT * FROM tovsNew WHERE Moscow='1' $SQLZapros";}
		elseif($HotStr=="WEDDING"){$HotStr="SELECT * FROM tovsNew WHERE Wedding='1' $SQLZapros";}
		elseif($HotStr=="HAPPYBD"){$HotStr="SELECT * FROM tovsNew WHERE Birthday='1' $SQLZapros";}
		elseif($HotStr=="NEWYEAR"){$HotStr="SELECT * FROM tovsNew WHERE NY='1' $SQLZapros";}
		elseif($HotStr=="VALENTINE"){$HotStr="SELECT * tovsNew WHERE InLove='1' $SQLZapros";}
		elseif($HotStr=="MASL"){$HotStr="SELECT * FROM tovsNew WHERE PancakeWeek='1' $SQLZapros";}
		elseif($HotStr=="EASTER"){$HotStr="SELECT * FROM tovsNew WHERE Easter='1' $SQLZapros";}
		elseif($HotStr=="VICTORY"){$HotStr="SELECT * FROM tovsNew WHERE VictoryDay='1' $SQLZapros";}
		elseif($HotStr=="FEB23"){$HotStr="SELECT * FROM tovsNew WHERE DefenderDay='1' $SQLZapros";}
		elseif($HotStr=="MART8"){$HotStr="SELECT * FROM tovsNew WHERE WomanDay='1' $SQLZapros";}
		elseif($HotStr=="TEACHER"){$HotStr="SELECT * FROM tovsNew WHERE TeacherDay='1' $SQLZapros";}
		elseif($HotStr=="KIDS"){$HotStr="SELECT * FROM tovsNew WHERE Kids='1' $SQLZapros";}
		elseif($HotStr=="WHITE"){$HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,Picture,Form,videnglish,tipenglish,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture 
			WHERE (picture.name='БЕЛЫЙ' OR picture.name='БЕЛОСНЕЖКА' OR picture.name='Bord Platine Brillant 3176' OR picture.name='Passion Platine 6828' 
			OR picture.name='Золотая лента' OR picture.name='Платиновая лента' OR picture.name='Bord Or' OR picture.name='Золотая отводка'
			OR picture.name='Астория' OR picture.name='Гольф'  OR picture.name='Кружево'  OR picture.name='Облака'  OR picture.name='Севилья' 
			OR picture.name='Феникс'   OR picture.name='Флора'   OR picture.name='Камея'   OR picture.name='Гармония' )AND Imagefile<>'/icons/noimage.jpg'  AND ((zakaz+sklad+grp)>0)  ORDER BY tovsNew.name";}
		else{$HotStr="SELECT * FROM tovsNew WHERE Rstyle='1'  $SQLZapros";}
		$r=sql($HotStr);
	}
	else{
		if($searchline!=""){
			$sql_filter='(grp=0';
			//$searchline=iconv('utf-8', 'windows-1251', $searchline);
			$qq=explode(" ",$searchline);
			$num = count($qq);
			for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND ( (lowername) LIKE  "%'.mb_strtolower($qq[$i]).'%")';
			$sql_filter.=') OR (grp=0';
			for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND ((english) LIKE "%'.(($qq[$i])).'%")';
			$sql_filter.=')';
			$Uslovie.=$sql_filter;
		}
		//	$query="SELECT * FROM tovsNew WHERE sklad>0 AND $Uslovie ORDER BY name";
		$r=sql("SELECT * FROM tovsNew WHERE sklad>0 $StoppardUslovie AND $Uslovie  ORDER BY name");
		
	}
	//$rtw=sql('show variables like "%collation%"');
	if(mysqli_num_rows($r)==0)
	{$echo="<tr><td style='padding-top:20px;' colspan='5'>$strnothing1 $searchline $strnothing2 </td></tr>";
		$Zagolovok='';}
	else{
		if($nametitle!='') $Zagolovok=$nametitle;
		$wwidth='300px';//1 $rowname,2 $vid,3 $tip,4 $picture,5 $form
		$echo= '<table align="left" width="100%" height="60px" cellspacing="0" cellpadding="0" border="0" style="padding:20px;padding-bottom:0px;"><tr>
		<td style="padding-left:10px;padding-right:10px;width:'.$wwidth.'px;background-color:#'.$bclr.';FONT-SIZE:19px;color:#FFFFFF;text-align:center;">
		<b>'.$Zagolovok.'</b></td>
		<td  style="padding-right:10px;width:80%;background-color:#FFFFFF;text-align:right;">&nbsp;</td>
		</tr>
		</table>';//'.$sortpage.' height="1px">
		$echo.= '<table style="padding:20px;" align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="660px" cellspacing="0" cellpadding="0" border="0"><tr>';
		$countquery1=mysqli_num_rows($r);
		$i=1;$j=1;
		while($row = mysqli_fetch_array($r)){
			$idg=$row['idg'];
			$queryz=sql("SELECT * FROM tovsNew WHERE id='$idg' AND grp=1 ");
			$countqueryz=mysqli_num_rows($queryz);
			if($countqueryz>0){
				$rowname=$row['name'];$Nnewprice=$row['price1s'];$Nnewprice=$Nnewprice;
				$ts=floor($Nnewprice/1000);$ed=$Nnewprice-($ts*1000);
				if($ts=='0') $ts="";else{if($ed<10)$ed='00'.$ed;elseif($ed<100)$ed='0'.$ed;};
				$newprice1="$ts $ed <img src='/img/rub-002.png' style='height:14px' alt='р.'>";
				$sklad=$row['sklad'];
				if($sklad=="0")$colorbag="bug.gif";	else $colorbag="bag.gif";
				$info="&nbsp;";
				$ida=$row['ida'];$id=$row['id'];$realname=$ida; $perem=$row['Imagefile'];
				$vid=$row['Vid'];
				$tip=$row['Tip'];
				$engvid=$row['videnglish'];$engtip=$row['tipenglish'];
				$picture=$row['Picture'];
				$form=$row['Form'];
				$brandid=$row['Factory'];
				$Height=$row['Height'];		$Capacity=$row['Capacity'];		$Diameter=$row['Diameter'];$Width=$row['Width'];
				$TipOfMaterial=$row['TipOfMaterial'];$flashbackcolor='red';$backcolor='blue';
				$Person=$row['Person'];$Predmetov=$row['Predmetov'];$AutorPicture=$row['AutorPicture'];
				//$Diameter='..';
				$frontname=MakeFrontName($brandid,$rowname,$vid,$tip,$picture,$form,$TipOfMaterial,$Person,$Predmetov,$AutorPicture, $Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
				$bottomname=MakeBottomName($brandid,$newprice1,$language);
				if($perem=='/icons/noimage.jpg') $imginsert="";
				else $imginsert="<img width='100%' id='img".$id."' src='$perem'>";
				if($i<=4) $sti="padding-right:10px;";else $sti='';//1 $rowname,2 $vid,3 $tip,4 $picture,5 $form
				global $langstr;
				$stroka_sort=$langstr.'/shop';//		1 $rowname,2 $vid,3 $tip,4 $picture,5 $form,6 $TipOfMaterial,7 $Person,8 $Predmetov,9 $frontname
				$echo.="<td class='ifzsearch' style='$sti'>
				<table  cellpadding='0' cellspacing='0' class='cat'><tr><td class='cat1'>
				<a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$frontname</a></td></tr>
				<td class='cat2'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$imginsert</a></td></tr>
				<td class='cat3'>$bottomname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href='".aPSID("/set.php?oper=add_tov&tov_id=$id")."' id='ishop$id' target='market'>$strbask</a>";

				$result=sql("SELECT * FROM likeengine WHERE id='$id'");
				$countQuantStr=mysqli_num_rows($result);
				$printlike='<div id="like'.$id.'" onClick="LikeEngine(\'like'.$id.'\')" style="font-size:14px;font-weight:500;color:#'.$bclr.';vertical-align:top;cursor: pointer;">';
				$printlike.=printlike($id,$countQuantStr,$language);
				$printlike.='</div>';

				$echo.=$printlike;
				$echo.="</td></tr></table></td>";
				if($i++>3){$i=1;$j++;$echo.="</tr><tr>";}
			}
		};
		mysqli_free_result($queryz);
		while($j++<4)	$echo.="<td style='background-color:#FFFFFF;' ></td></tr><tr>";
		$echo.='</tr></table></td></tr></table>';
		//onClick="vassa.height=\'20px\';" onMouseOver="vassa.height=\'20px\';"  onMouseOut="vassa.height=\'20px\';"
		//$echo.='<div id="scrollup"><img width="50px" alt="Прокрутить вверх";" src="/img/up.png"></div></td>';
	}
	$echo.='<div id="scrollup"><img width="50px" alt="Прокрутить вверх";" src="/img/up.png"></div></td>';

	mysqli_free_result($r);
	return $echo;//$SQLZapros.$HotStr.$countquery1.*/
}
//
echo '
</tr></table>';
?>