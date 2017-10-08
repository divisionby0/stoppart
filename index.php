<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_set_cookie_params(1080000);
require_once("shop_func.php");
require_once("box_func.php");
require_once("parser.php");
require_once("gui.php");
require_once("php/div0/views/menu/SiteMenu.php");
require_once("HTMLHead.php");
require_once("MenuFactory.php");
require_once("PossibleFilters.php");
require_once("DeliveryDataFactory.php");
require_once("CompanyDataFactory.php");
require_once("ContactDataFactory.php");
require_once("Search.php");
require_once("Catalog.php");
require_once("php/div0/db/StrokeSQLRequestBuilder.php");
prepare_parse("box.inc.html");

session_start();
set_session_vars();
$strokeSQLRequestBuilder = new StrokeSQLRequestBuilder();
$search = new Search();
$catalog = new Catalog();
$HotStr='';
$menuVersion = whichshop3();
if($menuVersion=='ifarfor') {
	$bclr='AD9E82';
} else {
	$bclr='82a0ae';
}
$searchline=$_GET['search'];if($searchline==''){
	$searchline=$_GET['search1'];
}
$shiftleftmenu='23';
$sizebetweenfilters='3';
$sizebottomleftmenu='10';
$shiftleftedge='40';//
if($searchline!='') {
	$HotStr=$searchline;
}
global $order;$bgColorOfBottom='#FFFFFF';

$menuname=$_GET['menu'];
if($menuname=="en"){
	$language=$menuname;
	$menuname=$_GET['menu2'];
	$menuname2=$_GET['menu3'];
	$menuname3=$_GET['menu4'];
	$menuname4=$_GET['menu5'];
	$menuname5=$_GET['menu6'];
	$menuname6=$_GET['menu7'];
}
else{
	$menuname2=$_GET['menu2'];
	$menuname3=$_GET['menu3'];
	$menuname4=$_GET['menu4'];
	$menuname5=$_GET['menu5'];
	$menuname6=$_GET['menu6'];
}

if($language=="en"){
	$langstr="/en";
	$unlangstr="";
	$tovarstr="A new item has been added to your Shopping Cart.";
	$sortstr0="Sort by:";
	$sortstr2="Name";
	$sortstr3="Cost";
	$ifstr="or";
	$logogif="/ifarfor.gif";
	$showallstr="Show all";
	$shownotallstr="Only with photo";
	$langaddstr="?language=en";
	$MainLabel="Imperial porcelain. Official store.";
	$adrstr="Addresses and phones";
	$phonestr="<b>+7 927 268-15-33</b>";
	$namestr="Official store of Imperial Porcelain Manufacture. Russia.";
	$searchstr="search2en.box";
	$LabelAlt="IMPERIAL PORCELAIN";
	$Rollupalt="Roll up";
	$ComeBackToSearch="Come back to search results";
	$strbrname="Produced by";
	$NotOnStock1="<br>Unfortunately the goods with articul "; $NotOnStock2=" was ended.<br>You can order this product for manufacturing. <br>Manufacturing time from one to three months.<br>To create an order for this product, you should write a request in free form to e-mail";
	$FILTR="FILTERS";
	$nameof="english";
	$Typemat="Kind of material";
	$Typepic="Picture";
	$Typeform="Shape";$Typefac="Factory";
}
else{
	$langstr="";
	$unlangstr="/en";
	$tovarstr="Товар успешно добавлен в корзину.";
	$sortstr0="Сортировать по:";
	$sortstr2="Названию";
	$sortstr3="Цене";
	$ifstr="или";
	$showallstr="Показывать всё";
	$shownotallstr="Только с фотографией";
	$logogif="/logo_ifarfor.gif";
	$MainLabel="Императорский фарфор. Официальный магазин АО «ИФЗ».";
	$adrstr="Адреса и телефоны";
	$phonestr='<b title="Бесплатный звонок по России. C 9:00 до 18:00 MSK">8 (800) 2222-850 </b>';
	$namestr="Фирменные магазины АО «ИФЗ».";
	$searchstr="search2.box";
	$LabelAlt="ИМПЕРАТОРСКИЙ ФАРФОР";
	$Rollupalt="Прокрутить вверх";
	$ComeBackToSearch="Вернуться к результатам поиска";
	$strbrname="Производство";
	$NotOnStock1="<br>К сожалению товар с артикулом "; $NotOnStock2="закончился.<br> Вы можете заказать этот товар для изготовления на производстве. <br>Срок изготовления от одного до трёх месяцев. <br>Для создания заказа на этот товар можно обратиться по телефону: <br>8 (800) 2222-850 c 09:00 до 18:00 по Московскому времени.";
	$FILTR="ФИЛЬТРЫ";
	$nameof="name";
	$Typemat="Тип материала";
	$Typepic="Рисунок";
	$Typeform="Форма";
	$Typefac="Производитель";
}

if($menuname==''){
	if($menuVersion=='ifarfor') {
		$menuname='shop';
		$menuname2='ware';
		global $HotStr3;
		$HotStr3='newyear';
		$HotStr3='easter';
		$HotStr3='love';
		$HotStr3='russianstyle';
		$HotStr3='cobaltnet';
	}
	else {
		$menuname='shop';
		$menuname2='artplate';
		$menuname3='stoppard';	
	}
}

$menu=MenuFactory::get("ru", $menuVersion);
$menuenglish=MenuFactory::get("en", $menuVersion);

$possibleFilters = new PossibleFilters();
$filtersData = $possibleFilters->create($menuname, $menuname2, $menuname3, $menuname4, $menuname5, $menuname6, $menu, $searchline, $viewstr, $Filter, $filterstr, $langstr, $unlangstr, $menuVersion, $language, $sortstr0, $menuenglish, $sortstr2, $shownotallstr, $ifstr, $showallstr, $sortstr3);

$stroka_sort = $filtersData["stroka_sort"];
$marketstr = $filtersData["marketstr"];
$unstroka_sort = $filtersData["unstroka_sort"];
$sortpage = $filtersData["sortpage"];
$am = $filtersData["am"];
$cm = $filtersData["cm"];
$Showpage = $filtersData["Showpage"];
$Sort = $filtersData["Sort"];
$ShAll = $filtersData["ShAll"];
$sortstr = $filtersData["sortstr"];
$firstpage = $filtersData["firstpage"];
$numberofpages = $filtersData["numberofpages"];
$Zagolovok=$filtersData["Zagolovok"];
$menu = $filtersData["menu"];
$stroka = $filtersData["stroka"];
$menuname= $filtersData["menuname"];
$tekname = $filtersData["tekname"];
$m2 = $filtersData["m2"];

if($language=='en'){
	$addlang="&language=en";
}

new HTMLHead($userid, $addlang, $MainLabel);

echo '<body bgcolor="#FFFFFF" link="#333366" alink="#333366" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"><link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css><link href="/'.cssname().'" type=text/css rel=stylesheet>';

if($searchline!='' and $language=="en") {
	$unstroka_sort="/?search=$searchline";
}
if($searchline!='' and $language=="") {
	$unstroka_sort="/en/?search=$searchline";
}
if($unstroka_sort=="" and $language=="") {
	$unstroka_sort="/en";
}
elseif($unstroka_sort=="" and $language=="en") {
	$unstroka_sort="/";
}
if($language=="en"){
	$engtext="Русский";
} else {
	$engtext="English";
}
$hrefen='<a id="unstroka_sort" style="font-size:14px;TEXT-DECORATION: underline;" href="'.$unstroka_sort.'" target="_top">'.$engtext.'</a>';

echo '<table id="modalHolder" align="right" bgcolor="#FFFFFF" width="100%" height="20px" cellspacing="0" cellpadding="0" border="0"><tr><td style="text-align:center;"><div id="modalform"><h2>'.$tovarstr.'</h2><span style="font-size:18px;font-weight:300;color:#0000CC;TEXT-DECORATION: underline;" id="modalclose">X</a></div><div id="overlay"></div></td><td style="text-align:right;FONT-SIZE: 14px;padding-right:10px;padding-top:5px;">'.$hrefen.'</td></tr></table>';
	if($menuVersion=='ifarfor')
	{
		echo '<table align="center" bgcolor="#FFFFFF" width="100%" height="69px" cellspacing="0" cellpadding="0" border="0" style=""><tr><td width="17%" height="132px" style="text-align:left;padding-left:'.$shiftleftedge.'px;FONT-SIZE: 19px;vertical-align:top;"><table align="center" bgcolor="#FFFFFF" width="100%" height="69px" cellspacing="0" cellpadding="0" border="0"><tr><td width="17%" height="32px" style="text-align:left;FONT-SIZE: 18px;color:#333333;vertical-align:top;">'.$phonestr.'</td></tr><tr><td height="20px" style="text-align:left;FONT-SIZE: 20px;vertical-align:top;padding-top:5px;"><a href="'.$langstr.'/contact" target="_blank" style="FONT-SIZE: 17px;">'.$adrstr.'</a><img src="/empty.gif" width="150px" height="1px"></td></tr><tr><td valign="top">';
		echo parse($searchstr,"@searchline=$searchline@left=");
		echo '</td></tr></table></td><td width="66%" align="center" style="FONT-SIZE: 40px;text-align:center;vertical-align:top;padding-top:8px;"><a href="'.aPSID("$langstr/shop/sculpture/animalist/Dogs/sortbycost0142").'" target="_self"><img src="'.$logogif.'" alt="'.$LabelAlt.'"></a><BR><div style="padding-top:20px;FONT-SIZE:17px; color="#A7A9AC;">'.$namestr;
		echo '<td width="17%" align="left" style="vertical-align:top;padding-right:47px;">';

		$LK=LK($userid,$language);
		echo '<table cellspacing="0" cellpadding="0" border="0" width="100%" align="left"><tr><td height="20px" style="FONT-SIZE: 16px;vertical-align: top;text-align:left;">'.$LK.'</td></tr><tr><td width="150px"><img src="/empty.gif" width="150px" height="10px"></td></tr><tr><td width="150px">';
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="86px;" id=market name=market src="'.aPSID('/'.$marketstr).'"></IFRAME>';
		echo '</td></tr></table><img src="/empty.gif" width="155px" height="1px"></td></tr></table>';
	}
	else
	{
		echo '<table id="logoContainer" align="center" bgcolor="#FFFFFF" width="100%" height="75px" cellspacing="0" cellpadding="0" border="0" style=""><tr><td width="100%" align="center" style="text-align:center;padding-bottom:20px;"><a href="'.aPSID("$langstr/shop/artplate/stoppard/vangogh/sortbyname0142").'" target="_self"><img  height="120px"  src="/icons/logo_stoppard.gif" alt="Stoppard"></a></td><td width="0"><IFRAME hspace="0"  frameborder="0"  scrolling="No" width="100%" height="1px;" id=market name=market src="'.aPSID('/'.$marketstr).'"></IFRAME></td></tr></table>';
	} 
$view='';
if(substr($menuname2, 0, 4)=="view"){
	$view=substr($menuname2, 4);
	$menuname2="";
}
elseif(substr($menuname3, 0, 4)=="view"){
	$view=substr($menuname3, 4);
	$menuname3="";
}
elseif(substr($menuname4, 0, 4)=="view"){
	$view=substr($menuname4, 4);
	$menuname4="";
}
elseif(substr($menuname5, 0, 4)=="view"){
	$view=substr($menuname5, 4);
	$menuname5="";
}
elseif(substr($menuname6, 0, 4)=="view"){
	$view=substr($menuname6, 4);
	$menuname6="";
};
if($view!='') {
	$viewstr='view'.$view;
}
if($menuname!='cabinet'){
	new SiteMenu($am,$cm,$language,$searchline,$userid);
}

if($menuname=="search"){
	$qu=$search->getHTML($searchline);
	echo $qu;
}
elseif($menuname=='about'){
	echo about();
}
elseif($menuname=='dealer'){
	echo dealer();
}
elseif(($menuname=='shop' or $searchline!="") and $view==''){

	if($HotStr!='') {
		$stroka='&nbsp;';
	}
	if($ShAll=="1")
	{
		$checksf='checked';
	}
	else{
		$checksf='';
	}
	$showphoto="<form name='FFilter' method='post' action=''>$Showpage";
	echo '<table align="center" bgcolor="#F6F6F4" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#F6F6F4;vertical-align:top;padding-bottom:25;"><tr><td width="17%" height="37" style="padding-left:17px;BACKGROUND-COLOR: '.$bgColorOfBottom.';"><img src="/empty.gif" width="255px" height="1px"></td><td id="breadcrumbsAndViewOptions" width="83%" style="text-align:left;padding-left:10px;BACKGROUND-COLOR: '.$bgColorOfBottom.';"><table align="center" width="100%"><tr><td width="65%" style="text-align:left;padding-left:0px;BACKGROUND-COLOR: '.$bgColorOfBottom.';"><span id="breadcrumbs">'.$stroka.'</span></td><td width="35%" style="text-align:right;padding-right:35px;BACKGROUND-COLOR: '.$bgColorOfBottom.';">'.$showphoto.'</td></tr></table></tr>';
	echo '<tr><td width="240px" height="408px" align="left" style="padding-left:7px;vertical-align: top;BACKGROUND-COLOR: '.$bgColorOfBottom.';">';

	echo '<table id="leftMenuContainer" align="left" width="240px" height="208px" cellspacing="0" cellpadding="0" border="0"><tr><td height="158px" align="left" style="PADDING:10px;border :none;VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;text-align: left;">';
	$kusokkoda1='</td></tr><tr><td height="12px" align="left" style="VERTICAL-ALIGN: top;PADDING-LEFT:0px;PADDING-RIGHT:0px;PADDING-TOP:0px;PADDING-BOTTOM:0px;BACKGROUND-COLOR: '.$bgColorOfBottom.'"></td></tr><td height="400px" align="left" style="VERTICAL-ALIGN: bottom;color : #999999;font-size:14px;padding-left:0px;BACKGROUND-COLOR: '.$bgColorOfBottom.'"><div style="width: 247px;">';

	if($menuVersion=='ifarfor') {
		$kusokkoda1.='© 1744-2017';
	}
	else {
		$kusokkoda1.='© 2014-2017';
	}

	$kusokkoda1.='<div id="scrollup"><img width="50px" alt="'.$Rollupalt.'" src="/img/up.png"></div></td></tr></table></td>';
	//========================средний кадр страницы добавляем в переменную $kusokkoda1===============================
	$kusokkoda1.='<td id="midFrame" height="342px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: '.$bgColorOfBottom.';padding-left:10px;padding-right:27px;">';//width="776px"
	//=========нижнюю часть левого кадра страницы для всяких музеев и контактов - заносим в переменную $kusokkoda2=======

	$kusokkoda2='</td></tr><tr><td height="12px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #F6F6F4;PADDING-LEFT:0px;PADDING-RIGHT:0px;PADDING-TOP:0px;PADDING-BOTTOM:0px;"></td></tr><tr><td width="203px" height="106px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: '.$bgColorOfBottom.';"><a href="http://www.hermitagemuseum.org/html_Ru/12/2003/hm12_3_3.html" target="_blank"><img src="/img/hermitage.gif"></a></td></tr><tr><td width="203px" height="695px" align="left" style="VERTICAL-ALIGN: bottom;BACKGROUND-COLOR: '.$bgColorOfBottom.';color : #999999;">© 1744-2017</td>';
	//============средний кадр страницы добавляем в переменную $kusokkoda2===================================

	$kusokkoda2.='<td width="12px" height="708px" align="left" style="BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td><td width="744px" height="172px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;"><table align="center" bgcolor="#FFFFFF" width="100%" height="704px" cellspacing="0" cellpadding="0" border="0"><tr><td style="vertical-align: top;">';
}
elseif($menuname=='contact') {
	echo '';
}
//==============Начинаем работу по определению, какую страницу размещать===================================
$i=0;
$j=2;
//====================================================================================================
//====================================== М А Г А З И Н ==================================================
//====================================================================================================
//====================================================================================================
//====================================== О П И С А Н И Е==============================================
//====================================================================================================
echo "<h1>view=".$view." menuname=".$menuname."</h1>";
if($view!="")
{
	$stroka='';
	if($search!='')  {
		$stroka='<a href="'.aPSID($langstr.'/search').'" title="'.$ComeBackToSearch.'">'.$ComeBackToSearch.'</a>';
	}
	echo '<table id="someTable"  align="center" bgcolor="#FFFFFF" width="100%" cellspacing="0" cellpadding="0" border="0" style="vertical-align:top;padding-left:70px;padding-right:70px;"><tr><td width="60%" height="37"style="text-align:left;">'.$stroka.'</td><td width="40%" style="text-align:left;padding-left:10px;">&nbsp;</td></tr>';

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

		echo "<tr><td>";$fnamesub=substr($view, -1);
		if(file_exists('foto/'.$view.'.jpg')){
			echo "<img src='/foto/".$view.".jpg' width='100%'>";
		}
		elseif(file_exists("foto/".$view.'S.jpg')){
			echo "<img src='/foto/".$view."S.jpg' width='100%'>";}
		elseif(file_exists("foto/".$view.'B.jpg')){
			echo "<img src='/foto/".$view."B.jpg' width='100%'>";
		}
		elseif(file_exists("foto/".$fnamesub.'.jpg')){
			echo "<img src='/foto/".$fnamesub.".jpg' width='100%'>";
		}
			$indeed=2;
		$howmanytimes=0;
			while($indeed!=0){

				$filename5="foto/".$view."-".$indeed.".jpg";
				if(file_exists($filename5)){
					$perem="/".$filename5;
					echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
					$indeed++;$howmanytimes++;
				}
				else {
					$indeed=0;
				}
			}
			if($howmanytimes==0 and substr($view, -1)=='S' or substr($view, -1)=='B')
			while($indeed!=0){

				$filename5="foto/".substr($view, 0, -1)."-".$indeed.".jpg";
				if(file_exists($filename5)){
					$perem="/".$filename5;
					echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
					$indeed++;$howmanytimes++;
				}
				else {
					$indeed=0;
				}
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

		echo "<td style='FONT-SIZE: 18px;text-align: left;vertical-align:top;padding-left: 20px;'><ul style='padding:0;'><li style='FONT-SIZE: 18px;'>$FirstName</li>";
		if($rowVid!=""){
			echo"<li>$rowTipOfMaterial</li>";
		}
		//Ручная роспись
		if($rowAutorForm!="" and $rowAutorForm!='-'){
			echo"<li>$Afstr: $rowAutorForm</li>";
		}
		if($rowAutorPicture!="" and $rowAutorPicture!='-'){
			echo"<li>$Apstr: $rowAutorPicture</li>";
		}
		if($rowFactory!=""){
			echo"<li>$Prstr: $rowFactory</li>";
		}
		//Объем и размер
		$tagform='';
		if($rowForm!='' and $rowForm!='-'){
			$tagform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagform$rowFormR$addlang")."'>#$rowForm</a>&nbsp;&nbsp;";
		}
		$tagpic='';
		if($rowPicture!='' and $rowPicture!='-'){
			$tagpic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagpic$rowPictureR$addlang")."'>#$rowPicture</a>&nbsp;&nbsp;";
		}
		$tagaform='';
		if($rowAutorForm!='' and $rowAutorForm!='-'){
			$tagaform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagaform$rowAutorForm$addlang")."'>#$rowAutorForm</a>&nbsp;&nbsp;";
		}
		$tagapic='';
		if($rowAutorPicture!='' and $rowAutorPicture!='-'){
			$tagapic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagapic$rowAutorPicture$addlang")."'>#$rowAutorPicture</a>&nbsp;&nbsp;";
		}
		echo"<li style='color:#333333;'>$Artstr: $rowArtikul</li>";
		echo"<li style='color:#333333;'>$tagform $tagpic $tagaform $tagapic</li>";
		echo"<HR>";
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

		if(mysqli_num_rows($query2)>0){
			$row = mysqli_fetch_array($query2);
			$rowVid=$row['Vid'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM picture WHERE id='".$row['Picture']."'"));$rowPictureR=$roww['name'];
			$roww=mysqli_fetch_array(sql("SELECT * FROM form WHERE id='".$row['Form']."'"));$rowFormR=$roww['name'];
			echo $search->getHTML($rowVid.' '.$rowFormR);
		}
		elseif($view=='8122811001') echo $search->getHTML("Ландыш Дуэль");
		elseif($view=='8115701') echo $search->getHTML("Ландыш Да нет");
		elseif($view=='8119218001') echo $search->getHTML("Яблочко медальон");

		mysqli_free_result($query2);///
	}
	echo "</td>";
	echo '</tr></table>';

}
elseif(($menuname=="shop" ) and $view==''){

	echo "<h1>is shop and view is empty</h1>";
	echo "<h1>language=".$language."</h1>";
	echo "<h1>m2=".$m2."</h1>";
	echo "<h1>menuVersion=".$menuVersion."</h1>";

	if($language=="en") {
		$tekname=$menuenglish[$m2][1];
	} else {
		$tekname=$menu[$m2][1];
	}
	echo '<p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.my_strtoupper($tekname).'</b></p>';
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
		if($spanbegin!="") {
			$echob2.="<ul>$echob3</ul>";
		} else{
			$echob2.=$echob3;
			$menu1="mumnu";
		}
		if($spanbegin=="" and $menu1!='mumnu' and $menuname4!='' ) $echobeg= "<div id='cat$ho' class='$menu1'> $tableforspan </td><td style='width:90%;$addstyle'><a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'><b>wwww$NameOfGroup</b>1</a></td></tr></table></div>";
		//вот  графин
		elseif($menu1=='mumnu' and $idOfGroup!=$menuname3){
			$echobeg= "<div style='padding-top:5px;padding-bottom:5px;'> $tableforspan </td><td style='width:90%;$addstyle'><a class='$menu1' href='".aPSID("$langstr/shop/". $menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'>$NameOfGroup</a></td></tr></table></div>";
			$hoh=$hoh+1;
		}
		//графин совпал
		elseif($menu1=='mumnu' and $idOfGroup==$menuname3){
			$echobeg= "<div style='padding-top:5px;padding-bottom:5px;'> $tableforspan </td><td style='width:90%;$addstyle'><b>$NameOfGroup</b></td></tr></table></div>";
			$hoh=$hoh+1;
		}
		//а это раскрывающееся меню
		elseif($menuname4=='' and $idOfGroup!=$menuname3)   {
			$echobeg= "<div id='cat$ho' class='menu'> $tableforspan <span class='title' ></td><td style='width:90%;$addstyle'><a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'>$NameOfGroup</a></td></tr></table></span>";
		}
		elseif($menuname4=='' and $idOfGroup==$menuname3)   {
			$echobeg= "<div id='cat$ho' class='menu open'> $tableforspan  $spanbegin</td><td style='width:90%;$addstyle'><b>$NameOfGroup</b></td></tr></table></span>";
		}
		else {
			$echobeg= "<div id='cat$ho' class='$menu1'> $tableforspan $spanbegin</td><td style='width:90%;$addstyle'><a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'>$NameOfGroup</a></td></tr></table>$spanend";
		}
		echo $echobeg.$echob2;
		if($menu1!='mumnu'){
			echo "</div>";
		}
	}
	if($menuVersion=='ifarfor')
	{
		if($HotStr!='zu' and $HotStr3==''){
		echo'</td></tr>';
		echo'<tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:'.$sizebetweenfilters.'px;">&nbsp;</td></tr><tr><td align="left" style="PADDING:10px;PADDING-bottom:'.$sizebottomleftmenu.'px;border : 0;VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;"><p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.$FILTR.'</b></p>';

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
				else $strokeSQL=$strokeSQLRequestBuilder->createSimple($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);}
			else 	$strokeSQL=MakeStrokeSQL($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);}
		else 	$strokeSQL=$strokeSQLRequestBuilder->createSimple($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
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
				else $strokeSQL=$strokeSQLRequestBuilder->createForm($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);}
			else 	$strokeSQL=$strokeSQLRequestBuilder->createForm($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);}
		else 	$strokeSQL=$strokeSQLRequestBuilder->createForm($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
		mysqli_free_result($rurus);
		$rurus=sql("SELECT * FROM tovsNew LEFT JOIN form ON form.id = tovsNew.Form WHERE".$strokeSQL);
		//========================Если выбор не пустой, то формируем список Форм и добавляем их в массив $a=======
		if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)) if($roww[$nameof]!='')$aform+=array($roww[$nameof]=> $roww['id']); ksort ($aform);
		$amat = array();
		if($menuname4==''){
			if($menuname3==''){
				if($menuname2==''){$amat='';}
				else $strokeSQL=$strokeSQLRequestBuilder->createMat($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);}
			else 	$strokeSQL=$strokeSQLRequestBuilder->createMat($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);}
		else 	$strokeSQL=$strokeSQLRequestBuilder->createMat($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
		mysqli_free_result($rurus);
		$rurus=sql("SELECT * FROM tovsNew LEFT JOIN material ON material.id = tovsNew.TipOfMaterial WHERE".$strokeSQL);
		//========================Если выбор не пустой, то формируем список Форм и добавляем их в массив $a=======
		if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)) if($roww[$nameof]!='')$amat+=array($roww[$nameof]=> $roww['id']); ksort ($amat);
		$abr = array();
		if($menuname4==''){
			if($menuname3==''){
				if($menuname2==''){$abr='';}
				else $strokeSQL=$strokeSQLRequestBuilder->createBrand($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);}
			else 	$strokeSQL=$strokeSQLRequestBuilder->createBrand($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);}
		else 	$strokeSQL=$strokeSQLRequestBuilder->createBrand($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
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
	echo'</td></tr><tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:'.$sizebetweenfilters.'px;">&nbsp;</td></tr><tr><td align="left" style="PADDING:10px;border : none;VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;"><p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;">';
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
		$FLOWERS="FLOWERS";
		$LITERATURE="LITERATURE";
		$THEATRE="THEATRE";
		$PETER="SAINT PETERSBURG";
		$MOSCOW="MOSCOW";
		$WEDDING="WEDDING";
		$HAPPYBD="HAPPY BIRTHDAY";
		$NEWYEAR="HAPPY NEW YEAR";
		$VALENTINE="SAINT VALENTINE'S DAY";
		$MASL="MASLENITSA";
		$EASTER="HAPPY EASTER";
		$VICTORY="VICTORY'S DAY";
		$FEB23="MILITARY PORCELAIN";
		$MART8="8TH MARTH";
		$TEACHER="GIFT FOR TEACHER";
		$KIDS="FOR KIDS";
		$lang="&language=en";
		$THEME="THEMES";
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
		$FLOWERS="ЦВЕТЫ";
		$LITERATURE="ЛИТЕРАТУРА";
		$THEATRE="ТЕАТР";
		$PETER="САНКТ-ПЕТЕРБУРГ";
		$MOSCOW="МОСКВА";
		$WEDDING="СВАДЬБА";
		$HAPPYBD="ДЕНЬ РОЖДЕНИЯ";
		$NEWYEAR="НОВЫЙ ГОД";
		$VALENTINE="ДЕНЬ ВЛЮБЛЕННЫХ";
		$MASL="МАСЛЕНИЦА";
		$EASTER="ПАСХА";
		$VICTORY="ДЕНЬ ПОБЕДЫ";
		$FEB23="23 ФЕВРАЛЯ";
		$MART8="8 МАРТА";
		$TEACHER="ПОДАРОК УЧИТЕЛЮ";
		$KIDS="ДЕТЯМ";
		$lang="";
		$THEME="ТЕМЫ";
	}
	echo'</td></tr><tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:'.$sizebetweenfilters.'px;">&nbsp;</td></tr><tr><td align="left" style="PADDING:10px;border : none;VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;"><p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.$THEME.'</b></p>';
	
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
		echo "
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
			titleFilterForm.onclick = function() {menuFilterForm.classList.toggle('open');};
		}
		if(menuFilterBrand){
			var titleFilterBrand = menuFilterBrand.querySelector('.title');
			titleFilterBrand.onclick = function() {menuFilterBrand.classList.toggle('open');};
		}";
	}
	for($i=1;$i<=$ho;$i++){
		echo "var menu$i = document.getElementById('cat$i');
		if(menu$i){
			var titlem$i = menu$i.querySelector('.title');
			titlem$i.onclick = function() {menu$i.classList.toggle('open');};
		}";
	};
	echo "</script>";
	//=============================================================================================
	//=================нижнюю часть левого кадра страницы=========================================
	echo $kusokkoda1;

	//=================Если меню 5 пустое, то =======================================================
	//=================Если товар не выбран, то мы выводим каталог==================================
	$wwidth=strlen($Zagolovok)*9+25;
	echo '<table align="left" bgcolor="'.$bgColorOfBottom.'" width="100%" height="50px" cellspacing="0" cellpadding="0" border="0" style="padding-bottom:10px;"><tr><td style="padding-left:10px;padding-right:10px;width:'.$wwidth.'px;background-color:#'.$bclr.';FONT-SIZE:19px;color:#FFFFFF;text-align:center;"><img src="/empty.gif" width="'.$wwidth.'px" height="1px"><b>'.$Zagolovok.'</b></td><td  style="padding-right:10px;width:100%;background-color:#FFFFFF;text-align:right;">'.$sortpage.'</td></tr></table>';
	echo '<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="660px" cellspacing="0" cellpadding="0" border="0"><tr>';
	if($menuname4=='stoppard' or $menuname3=='stoppard' or $menuname2=='stoppard'){
		$menuname5='stoppard';
	}
	if($menuname4==''){
		if($menuname3==''){
			if($menuname2==''){
				$a='';
			}
			else {
				$a=$catalog->getHtml($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language);
			}
	}
	else 	$a=$catalog->getHtml($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language);
	}
	else 	$a=$catalog->getHtml($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language);
	echo $a;
	echo'</tr></table></td></tr></table></form>'; 	////echo'</tr></table></td></tr></table></td>'; 	}
	//=================Если выбран конкретный товар, то мы выводим описание товара===================
}//========================Описание магазина окончено=======================================

//==========================================================================================
//==========================Контакты========================================================
elseif($menuname=="company"){
	echo $kusokkoda1.'<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0"><tr><td width="25%">&nbsp;.</td><td height="400px" width="50%" style="vertical-align: top;padding-top:30px;padding:10px;background-color:'.$bgColorOfBottom.';">';
	$companyString = CompanyDataFactory::getString($language);
	echo $companyString;
	echo'</td> 	<td width="25%">&nbsp;.</td></tr></table>';
}
elseif($menuname=="delivery"){
	echo $kusokkoda1.'<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0"><tr><td width="25%">&nbsp;.</td><td height="400px" width="50%" style="vertical-align: top;padding-top:30px;padding:10px;background-color:'.$bgColorOfBottom.';">';
	$deliveryString = DeliveryDataFactory::getString($language);
	echo $deliveryString;
	echo '</td><td width="25%">&nbsp;</td></tr></table>';
}
elseif($menuname=="contact"){
	echo $kusokkoda1.'<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0"><tr><td width="25%">&nbsp;.</td><td height="400px" width="50%" style="vertical-align: top;padding-top:30px;padding:10px;background-color:'.$bgColorOfBottom.';">';
	$contactString = ContactDataFactory::getString($language);
	echo $contactString;
	echo'</td><td width="25%">&nbsp;</td></tr></table>';}
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
	if($username!='Неизвестный' and $username!='Гость' ){echo PrintTopLeftMenu($showphoto,$bgColorOfBottom); echo PrintLeftMenu($activemenu);$resettext="&rst=1";} //else echo $username.$userid;
	if($menuname2=="create") echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/create.php'.$langaddstr).'"></IFRAME>';
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
	echo '</form></td></tr></table></td></tr></table></td></tr></table></td></tr></table>';
}
elseif($menuname=='search'){
	echo'';
}
else echo $menuname;
echo '</body>';

echo '</html>';

echo '</tr></table>';
?>