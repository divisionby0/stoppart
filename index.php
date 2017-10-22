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
require_once("php/div0/db/selector/HotStr3NotEmptySelectRequest.php");
require_once("php/div0/db/selector/HotStrNotEmptySelectRequest.php");
require_once("php/div0/db/selector/HotStringsEmptySelectRequest.php");
require_once("php/div0/menu/utils/MenuParser.php");
require_once("php/div0/localization/SiteLocale.php");
require_once("php/div0/utils/Cookie.php");
require_once("php/div0/utils/UrlUtils.php");
require_once("php/div0/utils/PerformanceUtil.php");
require_once("php/div0/utils/Logger.php");
require_once("php/div0/market/ProductView.php");
require_once("php/div0/market/ListingsView.php");
require_once("php/div0/market/GetCatalogListings.php");
require_once("php/div0/Settings.php");
prepare_parse("box.inc.html");

session_start();
set_session_vars();
global $order;
$bgColorOfBottom='#FFFFFF';
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlParameters = UrlUtils::parse($actual_link);
$searchString = NULL;

if(isset($_GET["search1"])){
	$searchString = $_GET["search1"];
}
else if(isset($_GET["search"])){
	$searchString = $_GET["search"];
}
else{
	$searchString = Cookie::getSearchString();
	Cookie::clearSearchString();
}

$search = new Search($bgColorOfBottom);
$catalog = new Catalog();
$HotStr='';
$menuVersion = whichshop3();
//$menuVersion = 'ifarfor';

if($menuVersion=='ifarfor') {
	$bclr='AD9E82';
} else {
	$bclr='82a0ae';
}

$searchline = $searchString;
//Logger::logMessage("searchLine:".$searchline);

$shiftleftmenu='23';
$sizebetweenfilters='3';
$sizebottomleftmenu='10';
$shiftleftedge='40';
if($searchline!='') {
	$HotStr=$searchline;
}

$menuname=$urlParameters[0];
//Logger::logMessage("__menuname:".$menuname);

// TODO прояснить каждый из параметров
if($menuname=="en"){
	$language=$menuname;
	$menuname=$urlParameters[1];
	$menuname2=$urlParameters[2];
	$menuname3=$urlParameters[3];
	$menuname4=$urlParameters[4];
	$menuname5=$urlParameters[5];
	$menuname6=$urlParameters[6];
}
else{
	$menuname2=$urlParameters[1];
	$menuname3=$urlParameters[2];
	$menuname4=$urlParameters[3];
	$menuname5=$urlParameters[4];
	$menuname6=$urlParameters[5];
}

if($language == "en"){
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
	$NotOnStock1="<br>Unfortunately the goods with articul ";
	$NotOnStock2=" was ended.<br>You can order this product for manufacturing. <br>Manufacturing time from one to three months.<br>To create an order for this product, you should write a request in free form to e-mail";
	$FILTR="FILTERS";
	$nameof="english";
	$Typemat="Kind of material";
	$Typepic="Picture";
	$Typeform="Shape";
	$Typefac="Factory";
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
	$NotOnStock1="<br>К сожалению товар с артикулом ";
	$NotOnStock2="закончился.<br> Вы можете заказать этот товар для изготовления на производстве. <br>Срок изготовления от одного до трёх месяцев. <br>Для создания заказа на этот товар можно обратиться по телефону: <br>8 (800) 2222-850 c 09:00 до 18:00 по Московскому времени.";
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

/*
Logger::logMessage("menuname:".$menuname);
Logger::logMessage("menuname2:".$menuname2);
Logger::logMessage("menuname3:".$menuname3);
Logger::logMessage("menuname4:".$menuname4);
Logger::logMessage("menuname5:".$menuname5);
Logger::logMessage("menuname6:".$menuname6);
*/

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

$addlang = "";
if($language=='en'){
	$addlang="&language=en";
	echo "<div id='currentLanguage'>en</div>";
}
else{
	echo "<div id='currentLanguage'>ru</div>";
}
echo "<div id='currentAddLanguage'>".$addlang."</div>";
echo "<div id='userId'>".$userid."</div>";
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
	echo '<table align="center" bgcolor="#F6F6F4" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#F6F6F4;vertical-align:top;padding-bottom:25px;"><tr><td width="17%" height="37" style="padding-left:17px;BACKGROUND-COLOR: '.$bgColorOfBottom.';"><img src="/empty.gif" width="255px" height="1px"></td><td id="breadcrumbsAndViewOptions" width="83%" style="text-align:left;padding-left:10px;BACKGROUND-COLOR: '.$bgColorOfBottom.';"><table align="center" width="100%"><tr><td width="65%" style="text-align:left;padding-left:0px;BACKGROUND-COLOR: '.$bgColorOfBottom.';"><span id="breadcrumbs">'.$stroka.'</span></td><td width="35%" style="text-align:right;padding-right:35px;BACKGROUND-COLOR: '.$bgColorOfBottom.';">'.$showphoto.'</td></tr></table></tr>';
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
	$kusokkoda1.='<td id="midFrame" height="342px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: '.$bgColorOfBottom.';padding-left:10px;padding-right:27px;">';
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
if($view!="")
{
	new ProductView($view, $search, $language, $langstr, $ComeBackToSearch,$NotOnStock1, $NotOnStock2);
}
elseif(($menuname=="shop" ) and $view==''){
	Logger::logMessage("is shop and view is empty");
	
	new ListingsView($userid, $catalog, $language, $nameof, $menu, $menuenglish, $m2, $shiftleftmenu, $menuname2, $menuname3, $menuname4, $menuname5, $sortstr, $langstr, $menuVersion, $HotStr, $HotStr3, $Filter, $FILTR, $Sort, $sortpage, $ShAll, $stroka_sort, $firstpage, $numberofpages, $Zagolovok, $Typefac, $Typemat, $Typeform, $Typepic, $bgColorOfBottom, $bclr, $sizebetweenfilters, $sizebottomleftmenu, $kusokkoda1);
}
elseif($menuname=="company")
{
	echo $kusokkoda1.'<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0"><tr><td width="25%">&nbsp;.</td><td height="400px" width="50%" style="vertical-align: top;padding-top:30px;padding:10px;background-color:'.$bgColorOfBottom.';">';
	$companyString = CompanyDataFactory::getString($language);
	echo $companyString;
	echo'</td><td width="25%">&nbsp;.</td></tr></table>';
}
elseif($menuname=="delivery")
{
	echo $kusokkoda1.'<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0"><tr><td width="25%">&nbsp;.</td><td height="400px" width="50%" style="vertical-align: top;padding-top:30px;padding:10px;background-color:'.$bgColorOfBottom.';">';
	$deliveryString = DeliveryDataFactory::getString($language);
	echo $deliveryString;
	echo '</td><td width="25%">&nbsp;</td></tr></table>';
}
elseif($menuname=="contact")
{
	echo $kusokkoda1.'<table align="center" bgcolor="'.$bgColorOfBottom.'" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0"><tr><td width="25%">&nbsp;.</td><td height="400px" width="50%" style="vertical-align: top;padding-top:30px;padding:10px;background-color:'.$bgColorOfBottom.';">';
	$contactString = ContactDataFactory::getString($language);
	echo $contactString;
	echo'</td><td width="25%">&nbsp;</td></tr></table>';}
elseif($menuname=="cabinet")
{
	$username=GetNameOfUser($userid);
	$activemenu = MenuParser::parseActiveMenu($menuname2);

	if($language=='en'){
		$langreset="&language=en";
	} 
	
	if($username!='Неизвестный' and $username!='Гость' ){
		echo PrintTopLeftMenu($showphoto,$bgColorOfBottom); 
		echo PrintLeftMenu($activemenu);
		$resettext="&rst=1";
	}
	
	if($menuname2=="create") {
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/create.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="worked")	{
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/worked.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="archive")	{
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/archive.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="signin")	{
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/signin.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="adminwork")	{
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="YES" width="100%" height="1300px;" id=order name=order src="'.aPSID('/adminworking.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="reset")	{
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/reset.php?uid='.$menuname3.'&sw='.$menuname4.$resettext.$langreset).'"></IFRAME>';
	}
	elseif($menuname2=="logout")	{
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/logout.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="pay")	{
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/pay.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="edit")	{
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/cabinet.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="order"){
		echo '<IFRAME hspace="0"  frameborder="0" marginheight="0" marginwidth="0" vspace="0" scrolling="No" width="100%" height="1300px;" id=order name=order src="'.aPSID('/order.php'.$langaddstr).'"></IFRAME>';
	}
	elseif($menuname2=="basket") {
		echo print_mybox_Farfor(1,$language);
	}
	else{

	}
	echo '</form></td></tr></table></td></tr></table></td></tr></table></td></tr></table>';
}
elseif($menuname=='search'){
	echo'';
}
else {
	echo $menuname;
}

echo '</body></html>';