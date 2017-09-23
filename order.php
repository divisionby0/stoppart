<?php
session_set_cookie_params(1080000);
session_start();
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
set_session_vars();
global $userid;$userid=get_s_var("userid");global $idd;$idd=get_var('idd');$ordernum=$idd;
$region='';$city='';$Address='';$country='';$error=0;$PROVE=post("prove");
global $oldregion;global $oldcountry; $oldregion=utf1251(get_var('oldregion'));$oldcountry=utf1251(get_var('oldcountry'));
$menuname=$_GET['menu'];if($menuname=="en")$language=$menuname;
if($language=="en"){
	$CountryE="It's necessary to specify the country of the destination";$TownE="It's necessary to specify the city of the destination";$AddrE="It's necessary to specify the address of the destination";$DeliveryKind="Kind of delivery";
	$DeliveryToPoint="Delivery to the issue point";$DeliveryToHome="Delivery to the home";$ChoosePoint="Choose the issue point";$Country="Country";$ChooseCountry="Choose the country";
	$Region="Region";$ChooseRegion="Choose the region";$Locality="Name of the city/locality";$ChooseCity="Choose a city";$NoPoint="Your region doesn't have an issue point, choose delivery to the destination";
	$IssuePoint="The issue point";$ChooseIssuePoint="Choose the issue point";$PointOutPhone="Enter your phone number";
	$EnterAddress="Enter the address of delivery";$AddressDelivery="Address of delivery";$addlang='?language=en';
	$Cellphone="Cellphone";$AdditionalPhone="Additional phone number (not necessary)";$EnterName="Enter name of recipient";$Firstname="Surname";$Secondname="First name";
	$Otchestvo="Additional name (not necessary)";$EnterEmail="Enter your email address";
	$ConfirmContact="I confirm that the contact details have been verified and entered correctly.";$Continue="NEXT";
	$phoneerrorTXT="Fill out the phone number";$imyaerrorTXT="Here the recipient's name is expected";$familiaerrorTXT="Here the recipient's surname is expected";
	$emailerrorTXT="Here the email address is expected";$emailerrorTXT2="The email address was filled in with errors";
	$YourBasketEmpty="Your basket is empty.";$zaglang='en';
}
else{
	$CountryE="Нужно указать страну получателя";$TownE="Нужно указать город получателя";$AddrE="Нужно указать адрес получателя";$DeliveryKind="Способ доставки";
	$DeliveryToPoint="Доставка в пункт выдачи";$DeliveryToHome="Доставка на дом";$ChoosePoint="Выберите пункт выдачи, из которого вам удобно забрать заказ";$Country="Страна";$ChooseCountry="Выберите страну";
	$Region="Регион";$ChooseRegion="Выберите страну";$Locality="Населенный пункт";$ChooseCity="Выберите город";$NoPoint="В вашем регионе нет пунктов выдачи, воспользуйтесь доставкой до адреса";
	$IssuePoint="Пункт выдачи";$ChooseIssuePoint="Выберите адрес пункта выдачи";$PointOutPhone="Введите № телефона, по которому с вами смогут связываться сотрудники пункта выдачи";
	$EnterAddress="Введите адрес, по которому будет осуществлена доставка";$AddressDelivery="Адрес доставки";$addlang='';
	$Cellphone="Мобильный телефон";$AdditionalPhone="Дополнительный телефон";$EnterName="Введите ФИО получателя";$Firstname="Фамилия";$Secondname="Имя";
	$Otchestvo="Отчество";$EnterEmail="Введите адрес электронной почты для извещения о состоянии заказа";
	$ConfirmContact="Подтверждаю, что контактные данные проверены и введены верно.";$Continue="ПРОДОЛЖИТЬ";
	$phoneerrorTXT="Заполните номер телефона";$imyaerrorTXT="Нужно указать имя получателя";$familiaerrorTXT="Нужно указать фамилию получателя";
	$emailerrorTXT="Укажите адрес электронной почты, он может быть вашим логином.";$emailerrorTXT2="Адрес электронной почты заполнен с ошибками";
	$YourBasketEmpty="Ваша корзина пуста.";$zaglang='ru';
}
$Frame='1px solid black';$ErrFrame='2px solid red';$proveborder='black';
$phoneborder=$Frame;$imyaborder=$Frame;$familiaborder=$Frame;$countryborder=$Frame;$townborder=$Frame;$addrdostborder=$Frame;
$TipOfDostavka=utf1251(post('dostavka'));$firstturn=utf1251(post('firstturn'));if($firstturn=='yes')$continue='1';
$addrdost=utf1251(post('addrdost'));$country=utf1251(post('country'));$town=utf1251(post('town'));$region=utf1251(post('region'));
$city=utf1251(post('city'));$Address=utf1251(post('Address'));$phone=utf1251(post('phone'));$phone2=utf1251(post('phone2'));
$email=utf1251(post('email'));$imya=utf1251(post('imya'));$familia=utf1251(post('familia'));$otchestvo=utf1251(post('otchestvo'));
$save=1;
if($firstturn==''){$save=0;
	$row=sql("SELECT * FROM users WHERE userid='$userid' LIMIT 1"); 
	if(mysqli_num_rows($row)!=0){ 
		$r=mysqli_fetch_array($row);
		$region=$r['regionpunkt'];$city=$r['citypunkt'];$Address=$r['addresspunkt'];$phone=$r['phone'];$phone2=$r['phone2'];$email=$r['email'];$imya=$r['imya'];
		$familia=$r['familia'];$addrdost=$r['adres'];$town=$r['town'];$country=$r['country'];$otchestvo=$r['otchestvo'];
	}
	mysqli_free_result($row);
}
else{
	if($TipOfDostavka=='home' and $save==1){
		if($country==''){$error++;$countryerror=$CountryE;$countryborder=$ErrFrame;}
		if($town==''){$error++;$townerror=$TownE;$townborder=$ErrFrame;}
		if($addrdost==''){$error++;$addrdosterror=$AddrE;$addrdostborder=$ErrFrame;}
		if($continue=='1')$proveborder='red';
	}
	elseif($TipOfDostavka=='punkt' and $save==1) if($continue=='1')$proveborder='red';
	if($phone=='' and $continue=='1'){$error++;$phoneerror=$phoneerrorTXT;$phoneborder=$ErrFrame;}
	if($imya=='' and $continue=='1'){$error++;$imyaerror=$imyaerrorTXT;$imyaborder=$ErrFrame;}
	if($familia=='' and $continue=='1'){$error++;$familiaerror=$familiaerrorTXT;$familiaborder=$ErrFrame;}
	$row=sql("SELECT * FROM users WHERE login='$email' and  userid<>'".get_s_var("userid")."' LIMIT 1"); //Проверяем нужно ли делать Логаут
	$NameNotUnic=mysqli_num_rows($row);
	if($email==''){$error++;$emailerror=$emailerrorTXT;$emailborder=$ErrFrame;$save=0;}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){$error++;$emailerror=$emailerrorTXT2;$emailborder=$ErrFrame;$save=0;}
	mysqli_free_result($row);
	//	elseif($NameNotUnic!=0){$error++;$emailerror="Логин с этой почтой занят. Если это ваша почта вы можете восстановить пароль.";$emailborder=$ErrFrame;$save=0;}
	// если логин неуникальный и логин не принадлежит текущему контрагенту, 
	//нужно создать рандомный пароль и отправить по указанному адресу логин и рандомный пароль,
	//для того чтобы пользователь всегда мог зайти под этим логином и паролем и посмотреть состояние заказа.
	if($error>0) $save=0;
	if($NameNotUnic==0) $changelogin="login='$email',"; else $changelogin='';
	if($TipOfDostavka=='home' and $save==1){//логин проверять, если заполнен, то почту ему новую не присваивать. 
		//если почта уже есть такая, то предлагать выбрать другую наверное
		sql ("UPDATE users SET $changelogin
			hash='2',
			imya='$imya', 
			otchestvo='$otchestvo', 
			familia='$familia', 
			email='$email', 
			adres='$addrdost', 
			town='$town', 
			country='$country', 
			phone='$phone', 
			phone2='$phone2', 
			date=NOW()
			WHERE userid='".get_s_var("userid")."'");
	}
	elseif($TipOfDostavka=='punkt' and $save==1){
		sql ("UPDATE users SET $changelogin
			hash='1',
			imya='$imya', 
			otchestvo='$otchestvo', 
			familia='$familia', 
			email='$email', 
			regionpunkt='$region', 
			citypunkt='$city', 
			country='$country', 
			addresspunkt='$Address', 
			phone='$phone', 
			phone2='$phone2',  
			date=NOW()
			WHERE userid='".get_s_var("userid")."'");
		/*	$addr111=sql("SELECT * FROM punkts WHERE ID='$Address' LIMIT 1");
		if(mysqli_num_rows($addr111)!=0)    $row2 = mysqli_fetch_array($addr111);
		$AddressPunkta=$row2['Address'];
		$TimePunkta=$row2['WorkTime'];
		$PhonePunkta=$row2['Phone'];*/
	}
	if($error>0) set_var('logon',true);
}
$col1="#FFFFFF";$col2="#FFFFFF";$col3="#FFFFFF";$col4="#FFFFFF";$col5="#FFFFFF";$col6="#FFFFFF";
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Поволжье.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body height="80px" bgcolor="#FFFFFF"  link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
<link href="'.cssname().'" type=text/css rel=stylesheet>';
echo '<table align="center" bgcolor="#FFFFFF" width="100%" style="padding:17px;padding-bottom:0px;" cellspacing="0" cellpadding="0" border="0"><tr><td>';
//echo "addrdost=$addrdost country=$country town=$town region=$region city=$city Address=$Address";
echo'</td></tr></table>';
$PROVE=post("prove");
if($error==0 and $firstturn!='' and $PROVE=="yes")///////////////////////////Подтверждение///////////////////////////////////////////////////////////////////
{/////////////////////////////==========[1]==========[2]=========[3]========[4]==================////////////////////
	$r=sql("SELECT * FROM box WHERE userid='$userid' AND (idd='' OR idd='0')");
	if(mysqli_num_rows($r)==0) echo $YourBasketEmpty;
	else{
		echo print_zagolovok(3,$zaglang);
		//echo '<table align="center" width="100%" style="padding:17px;" cellspacing="0" cellpadding="0" border="0">
		//<tr><td style="background-color:#7F7355;color:white;text-align:center;width:100%;height:26px;"><b>Подтверждение заказа</b></td></tr></table>';
		$idd4=ChangeBasketToOrder($userid);
		if($language=='en'){$NContinue="Next";$langadd='/en';}else{$NContinue="Перейти к безопасному платежу";$langadd='';}
		echo '<table align="center" width="100%" style="padding-left:17px;padding-right:17px;" cellspacing="14" cellpadding="0" border="0">
		<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;">'.
		OrderToPrint($idd4,$language)
		.'<tr>
		<td colspan="5" style="text-align:right;">
		<form action="'.aPSID($langadd."/cabinet/pay").'" method="post" name="order" target="_parent">
		<input type="button" style="width:260px;height:32px;margin-top:25px;background-color: #649B51; 
		color: #FFFFFF;font-weight:bold;text-align:center;"
		onclick="order.submit();" value="'.$NContinue.'">
		</td>
		</tr>
		</table></td></tr>
		</td></tr></table>
		</td></tr>
		</table>';
		echo "<script type='text/javascript'> window.scrollTo(0,0); </script>";
		send_order_by_email($idd4,$language);
		$idd="";set_var("idd",$idd);
		$firstturn='';
	}
}
else///////////////////////////Получение данных от заказчика///////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{/////////////////////////////==========[1]==========[2]=========[3]========[4]==================////////////////////
	echo print_zagolovok(2,$zaglang);
	if($city=='' or $region==''){ 
		include("SxGeo.php");
		$SxGeo = new SxGeo('SxGeoCity.dat');
		$ip = $_SERVER['REMOTE_ADDR'];
		$amseek = array();
		$amseek=$SxGeo->getCityFull($ip);
		//$city1=iconv("UTF-8","windows-1251",$amseek[0]);$region1=iconv("UTF-8","windows-1251",$amseek[1]);
		//echo 'Geo Search'.$city1.$region1.$ip.$amseek[0].$amseek[1];
	}
	$smena=0;
	if($oldcountry!=$country and $country!='' and $oldcountry!=''){
		$smena=1;$smenastrany=1;
		//	$oldcountry=$country;set_var("oldcountry",$oldcountry);
		$oldregion='';set_var("oldregion",$oldregion);$region='';$city='';
		if($country=='Россия'){//echo 'смена страны на Россию';
			include("SxGeo.php");
			$SxGeo = new SxGeo('SxGeoCity.dat');
			$ip = $_SERVER['REMOTE_ADDR'];
			$amseek = array();
			$amseek=$SxGeo->getCityFull($ip);
			//$city=iconv("UTF-8","windows-1251",$amseek[0]);$region=iconv("UTF-8","windows-1251",$amseek[1]);
			$city=$amseek[0];$region=$amseek[1];}
	};
	$oldcountry=$country;set_var("oldcountry",$oldcountry);
	if($country=='' and $firstturn=='')$country='Россия';
	//if($country=='' and $firstturn==''){$country='Россия';$city=iconv("UTF-8","windows-1251",$amseek[0]);$region=iconv("UTF-8","windows-1251",$amseek[1]);}
	//$country=iconv("UTF-8","windows-1251",$amseek[2]);
	if($city=='') $city=$amseek[0];//$city=iconv("UTF-8","windows-1251",$amseek[0]);
	if($region=='') $region=$amseek[1];//$region=iconv("UTF-8","windows-1251",$amseek[1]);
	if($oldregion!=$region){$smena=1;$oldregion=$region;set_var("oldregion",$oldregion);$city='';};
	$aSTR='';$aSTR = array();$rurus=sql("SELECT ID,OblName,Strana FROM punkts");
	if(mysqli_num_rows($rurus)>0){while($roww=mysqli_fetch_array($rurus)) $aSTR+=array($roww['Strana']=> $roww['ID']);	};ksort ($aSTR);
	mysqli_free_result($rurus);
	$a='';$a = array();$rurus=sql("SELECT ID,OblName,Strana FROM punkts WHERE  Strana='$country'  ");//$obltemp='';
	if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)){$a+=array($roww['OblName']=> $roww['ID']);	}//if($obltemp=='') $obltemp=$roww['OblName'];
	ksort ($a);
	foreach($a as $k => $t)if($region=='')$region=$k;
	mysqli_free_result($rurus);
	$at = array();$rurus=sql("SELECT ID,City FROM punkts WHERE Strana='$country' and OblName='$region'");
	if(mysqli_num_rows($rurus)>0){while($roww=mysqli_fetch_array($rurus)){$at+=array($roww['City']=> $roww['ID']);}//if($smena==1 or $city=='') {$city=$roww['City'];$smena=0;}
		ksort ($at);}
	foreach($at as $k => $t)if($city=='')$city=$k;
	$atp ='';
	$atp = array();$atpWorktime='';
	mysqli_free_result($rurus);
	$rurus=sql("SELECT ID,Address,WorkTime FROM punkts WHERE Strana='$country' and OblName='$region' and City='$city'");
	if(mysqli_num_rows($rurus)>0){
		while($roww=mysqli_fetch_array($rurus)){
			$atp+=array($roww['Address']=> $roww['ID']);
			if($atpWorktime=='' or $roww['ID']==$atpWorktime)$atpWorktime=$roww['WorkTime'];}
		ksort ($atp);
		mysqli_free_result($rurus);
	}
	else //пунктов нет - обнуляем город и повторяем
	{
		$city='';
		$at = array();$rurus=sql("SELECT ID,City FROM punkts WHERE Strana='$country' and OblName='$region'");
		if(mysqli_num_rows($rurus)>0){while($roww=mysqli_fetch_array($rurus)){$at+=array($roww['City']=> $roww['ID']);}//if($smena==1 or $city=='') {$city=$roww['City'];$smena=0;}
			ksort ($at);}
		foreach($at as $k => $t)if($city=='')$city=$k;
		$atp ='';
		$atp = array();$atpWorktime='';
		$rurus=sql("SELECT ID,Address,WorkTime FROM punkts WHERE Strana='$country' and OblName='$region' and City='$city'");
		if(mysqli_num_rows($rurus)>0){while($roww=mysqli_fetch_array($rurus)){$atp+=array($roww['Address']=> $roww['ID']);
				if($atpWorktime=='' or $roww['ID']==$atpWorktime)$atpWorktime=$roww['WorkTime'];}
			mysqli_free_result($rurus);
			ksort ($atp);
		}
		else{//пунктов опять нет - обнуляем регион и повторяем
			$region='';
			$a='';$a = array();$rurus=sql("SELECT ID,OblName,Strana FROM punkts WHERE  Strana='$country'  ");//$obltemp='';
			if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)){$a+=array($roww['OblName']=> $roww['ID']);	}//if($obltemp=='') $obltemp=$roww['OblName'];
			ksort ($a);
			foreach($a as $k => $t)if($region=='')$region=$k;
			mysqli_free_result($rurus);
			$at = array();$rurus=sql("SELECT ID,City FROM punkts WHERE Strana='$country' and OblName='$region'");
			if(mysqli_num_rows($rurus)>0){while($roww=mysqli_fetch_array($rurus)){$at+=array($roww['City']=> $roww['ID']);}//if($smena==1 or $city=='') {$city=$roww['City'];$smena=0;}
				ksort ($at);}
			foreach($at as $k => $t)if($city=='')$city=$k;
			$atp ='';
			$atp = array();$atpWorktime='';
			mysqli_free_result($rurus);
			$rurus=sql("SELECT ID,Address,WorkTime FROM punkts WHERE Strana='$country' and OblName='$region' and City='$city'");
			if(mysqli_num_rows($rurus)>0){
				while($roww=mysqli_fetch_array($rurus)){
					$atp+=array($roww['Address']=> $roww['ID']);
					if($atpWorktime=='' or $roww['ID']==$atpWorktime)$atpWorktime=$roww['WorkTime'];}
				ksort ($atp);
				mysqli_free_result($rurus);			
			}
			else//пунктов опять нет - обнуляем город и повторяем
			{
				$city='';
				$at = array();$rurus=sql("SELECT ID,City FROM punkts WHERE Strana='$country' and OblName='$region'");
				if(mysqli_num_rows($rurus)>0){
					while($roww=mysqli_fetch_array($rurus)){$at+=array($roww['City']=> $roww['ID']);}
					ksort ($at);
				}
				foreach($at as $k => $t)if($city=='')$city=$k;
				$atp ='';
				$atp = array();$atpWorktime='';
				mysqli_free_result($rurus);
				$rurus=sql("SELECT ID,Address,WorkTime FROM punkts WHERE Strana='$country' and OblName='$region' and City='$city'");
				if(mysqli_num_rows($rurus)>0){
					while($roww=mysqli_fetch_array($rurus)){
						$atp+=array($roww['Address']=> $roww['ID']);
						if($atpWorktime=='' or $roww['ID']==$atpWorktime)$atpWorktime=$roww['WorkTime'];
					}
					ksort ($atp);
				}
				else $atp='';
				mysqli_free_result($rurus);
			}
			
		}
	}
	echo '<table align="center" width="100%" style="padding:17px;" cellspacing="0" cellpadding="0" border="0">
	<tr><td style="background-color:#7F7355;color:white;text-align:center;width:100%;height:26px;"><b>'.$DeliveryKind.'</b></td></tr></table>';
	echo '<table align="center" bgcolor="#FFFFFF" width="260px;" style="padding:17px;padding-top:0px;" cellspacing="0" cellpadding="0" border="0">
	<tr><td style="text-align:left;width:260px;height:26px;font-size:18px;vertical-align:middle">';
	//Тут выбор куда доставлять
	if($TipOfDostavka==''){if($language=="")$TipOfDostavka='punkt'; else $TipOfDostavka='home';}
	if($TipOfDostavka=='punkt') $checks='checked';
	elseif($TipOfDostavka=='home') $checksh='checked';
	//выбор области
	$echopicfor='';///////////////////////////////////////--- III
	$echopicbegin="<form action='".aPSID("/order.php".$addlang)."' method='post' name='order' target='_self'>";
	$echopicbegin.="<input $checks type='radio' name='dostavka' value='punkt' onclick='order.submit()'>&nbsp;&nbsp;&nbsp;$DeliveryToPoint</td></tr>
	<tr><td style='text-align:left;width:260px;height:26px;font-size:18px;vertical-align:middle'>
	<input $checksh type='radio' name='dostavka' value='home' onclick='order.submit()'>&nbsp;&nbsp;&nbsp;$DeliveryToHome</td>
	</tr></table>";
	if($TipOfDostavka=='punkt'){
		//===========================================================================================//
		//====================================Доставка в пункт========================================//
		//===========================================================================================//
		$echopicbegin.= '<table align="center" width="100%" style="padding-left:17px;padding-right:17px;border-top:1px solid gray;" cellspacing="14" cellpadding="0" border="0">
		<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$ChoosePoint.':</b></td></tr>
		<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Country.':</td>
		<td style="width:1%;">';
		$echopicbegin.="<select style='height:25px;width:260px;' name='country' onchange='order.submit();'><option disabled>$ChooseCountry</option>";
		foreach($aSTR as $kSTR => $tSTR){//echo $kSTR;
			if($kSTR==$country) $echopicfor.="<option selected value='$kSTR'>$kSTR</option>";
			else $echopicfor.="<option value='$kSTR'>$kSTR</option>";
		};
		echo $echopicbegin.$echopicfor;
		$echopicfor='';
		$echopicbegin= '
		<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Region.':</td>
		<td style="width:1%;">';
		$echopicbegin.="<select style='height:25px;width:260px;' name='region' onchange='order.submit();'><option disabled>$ChooseRegion</option>";
		foreach($a as $k => $t){if($k=='null')$ktext='-';else $ktext=$k;
			if($k==$region) $echopicfor.="<option selected value='$k'>$ktext</option>";
			else $echopicfor.="<option value='$k'>$ktext</option>";
		};
		echo $echopicbegin.$echopicfor;
		echo'
		</td><td style="padding-left:9px;width:50%;">&nbsp;</td></tr>
		<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Locality.':</td>
		<td style="width:1%;">';
		//выбор города из конкретной области
		if($at!=''){
			$echopicfor='';
			$echopicbegin="<select style='height:25px;width:260px;' name='city' onchange='order.submit();'><option disabled>$ChooseCity</option>";
			foreach($at as $k => $t){
				if($k==$city) $echopicfor.="<option selected value='$k'>$k</option>";
				else $echopicfor.="<option value='$k'>$k</option>";	};
			echo $echopicbegin.$echopicfor;////////////////////
		}
		else 
		echo'<input disabled type="text" style="width:260px;height:25px;border:1px solid black;font-size:12px;text-align:center;" value="'.$NoPoint.'">';
		echo'</td><td style="padding-left:9px;width:50%;">&nbsp;</td></tr>
		<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$IssuePoint.':</td>
		<td style="width:1%;">';
		//выбор города из конкретной области
		if($atp!=''){
			$echopicfor='';
			$echopicbegin="<select style='height:25px;width:260px;' name='Address'><option disabled>$ChooseIssuePoint</option>";
			foreach($atp as $k => $t){
				if($t==$Address) $echopicfor.="<option selected value='$t'>$k</option>";
				else $echopicfor.="<option value='$t'>$k</option>";
			};
			echo $echopicbegin.$echopicfor;////////////////////
		}
		else 
		echo '<input type="text" disabled style="width:260px;height:25px;border:1px solid black;font-size:12px;text-align:center;" value="'.$NoPoint.'">';
		echo '</td><td style="padding-left:9px;width:50%;">'.$atpWorktime.' &nbsp;</td></tr>
		<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$PointOutPhone.':</b></td></tr>
		';
	}
	else{
		//===========================================================================================//
		//====================================Доставка по адресу=====================================//
		//===========================================================================================//
		$echopicbegin.= '<table align="center" width="100%" style="padding-left:17px;padding-right:17px;border-top:1px solid gray;" cellspacing="14" cellpadding="0" border="0">
		<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$EnterAddress.':</b></td></tr>
		<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Country.':</td>
		<td style="width:1%;"><input type="text" name="country" style="width:260px;height:25px;border:'.$countryborder.';font-size:16px;text-align:left;" required value="'.$country.'">
		</td><td style="padding-left:9px;width:50%;color:#F20A77;"><b><i>'.$countryerror.' </i></b>&nbsp;</td></tr>
		<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Locality.':</td>
		<td style="width:1%;"><input type="text" name="town" style="width:260px;height:25px;border:'.$townborder.';font-size:16px;text-align:left;" required value="'.$town.'">
		</td><td style="padding-left:9px;width:50%;color:#F20A77;"><b><i>'.$townerror.' </i></b>&nbsp;</td></tr>
		<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$AddressDelivery.':</td>
		<td style="width:1%;"><input type="text" name="addrdost" style="width:260px;height:25px;border:'.$addrdostborder.';font-size:16px;text-align:left;" required value="'.$addrdost.'">
		</td><td style="padding-left:9px;width:50%;color:#F20A77;"><b><i>'.$addrdosterror.' </i></b>&nbsp;</td></tr>
		<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$PointOutPhone.':</b></td></tr>
		';
		echo $echopicbegin;
		//	echo'	</td><td style="padding-left:9px;width:50%;">&nbsp;</td></tr>';
		//<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">Мобильный телефон:</td>
		//<td style="width:1%;"><input type="text" name="phone" style="width:260px;height:25px;border:'.$phoneborder.';font-size:16px;text-align:left;" required value="'.$phone.'">
		//</td><td style="padding-left:9px;width:50%;color:#F20A77;"><b><i>'.$phoneerror.' </i></b>&nbsp;</td></tr>
	}
	Echo'
	<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Cellphone.':</td>
	<td style="width:1%;"><input type="text" name="phone" style="width:260px;height:25px;border:'.$phoneborder.';font-size:16px;text-align:left;" required value="'.$phone.'">
	</td><td style="padding-left:9px;width:50%;color:#F20A77;"><b><i>'.$phoneerror.' </i></b>&nbsp;</td></tr>
	<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$AdditionalPhone.':</td>
	<td style="width:1%;"><input type="text" name="phone2"  style="width:260px;height:25px;border:1px solid black;font-size:16px;text-align:left;" value="'.$phone2.'">
	</td><td style="padding-left:9px;width:50%;">&nbsp;</td></tr>
	<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$EnterName.':</b></td></tr>
	<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Firstname.':</td>
	<td style="width:1%;"><input type="text" name="familia" style="width:260px;height:25px;border:'.$familiaborder.';font-size:16px;text-align:left;" required value="'.$familia.'">
	</td><td style="padding-left:9px;width:50%;color:#F20A77;"><b><i>'.$familiaerror.'</i></b>&nbsp;</td></tr>
	<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Secondname.':</td>
	<td style="width:1%;"><input type="text" name="imya" style="width:260px;height:25px;border:'.$imyaborder.';font-size:16px;text-align:left;" required value="'.$imya.'">
	</td><td style="padding-left:9px;width:50%;color:#F20A77;"><b><i>'.$imyaerror.'</i></b>&nbsp;</td></tr>
	<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Otchestvo.':</td>
	<td style="width:1%;"><input type="text" name="otchestvo"  style="width:260px;height:25px;border:1px solid black;font-size:16px;text-align:left;" required value="'.$otchestvo.'">
	</td><td style="padding-left:9px;width:50%;">&nbsp;</td></tr>
	<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$EnterEmail.':</b></td></tr>
	<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">Email:</td>
	<td style="width:1%;"><input type="text" name="email" 
	style="width:260px;height:25px;border:1px solid black;font-size:16px;text-align:left;" required value="'.$email.'">
	</td><td style="padding-left:9px;width:50%;color:#F20A77;"><b><i>'.$emailerror.'</i></b>&nbsp;</td></tr>
	<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;color:'.$proveborder.';">
	<input name="prove" type="Checkbox" value="yes" >'.$ConfirmContact.'
	</td></tr>
	<tr><td style="height:32px;text-align:right;width:50%;font-size:18px;padding-right:9px;">&nbsp;</td>
	<td style="width:1%;height:25px;background-color:#FFFFFF;font-size:18px;text-align:center;">
	<input type="button" style="width:260px;height:32px;margin-top:25px;background-color: #649B51; color: #FFFFFF;font-weight:bold;text-align:center;"
	onclick="order.submit();" value="'.$Continue.'">
	</td><td style="padding-left:9px;width:50%;">&nbsp;</td></tr>
	<tr><td colspan="3" height="0"><br><input name="firstturn" type="hidden" value="yes" checked></td></tr>
	</form>
	</table>
	';//<tr><td colspan="3" height="0px;"></td></tr>
}
echo '</body></html>';
//return $ans;
?>