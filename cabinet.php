<?php
session_set_cookie_params(1080000);
session_start();
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
set_session_vars();
global $userid;$userid=get_s_var("userid");
$error=0;$SuccessCreate=0;	
$Frame='1px solid gray';$ErrFrame='2px solid red';$proveborder='black';
$menuname=$_GET['menu'];
if($menuname=="en") $language=$menuname;
if($language=="en") {
$emailerrorTXT="Here the email address is expected";$emailerrorTXT2="The email address was filled in with errors";
$loginerrorTXT="Login name expected";$loginerrorTXT2="A ifarfor account already exists with this login name. ";$imyaerrorTXT="Here the name is expected";
$familiaerrorTXT="Here the surname is expected";$EditPersonalData="Editing of personal data";$Login="Account name";$Name="Name";
$Name2="Second name (not necessary)";$Surname="Surname";$SAVE="SAVE";$NeedToChangePass="Do you want to change password";$Itshere="It's here";
}
else
{
$emailerrorTXT="Укажите адрес электронной почты";$emailerrorTXT2="Адрес электронной почты заполнен с ошибками";
$loginerrorTXT="Логин не может быть пустым";$loginerrorTXT2="Этот логин занят. Выберите другой.";$imyaerrorTXT="Имя не указано";
$familiaerrorTXT="Фамилия не указана";$EditPersonalData="Редактирование личных данных";$Login="Логин";$Name="Имя";$Name2="Отчество";$Surname="Фамилия";
$SAVE="СОХРАНИТЬ ИЗМЕНЕНИЯ";$NeedToChangePass="нужно сменить пароль";$Itshere="Это тут";
}
$firstturn=utf1251(post('firstturn'));$continue='0';$save=0;
if($firstturn=='yes'){$continue='1';$save=1;}
$email=utf1251(post('email'));$login=utf1251(post('login'));$imya=utf1251(post('imya'));
$familia=utf1251(post('familia'));$PROVE=utf1251(post("prove"));
if($continue=='0'){
	$row=sql("SELECT * FROM users WHERE userid='$userid' LIMIT 1"); 
	if(mysqli_num_rows($row)!=0){ 
		$r=mysqli_fetch_array($row);
//		$region=$r['regionpunkt'];$city=$r['citypunkt'];$Address=$r['addresspunkt'];$phone=$r['phone'];$phone2=$r['phone2'];$addrdost=$r['adres'];$town=$r['town'];$country=$r['country'];
		$email=$r['email'];$login=$r['login'];$familia=$r['familia'];$imya=$r['imya'];$otchestvo=$r['otchestvo'];
		}
	mysqli_free_result($row);
}
if($continue=='1'){
	$row=sql("SELECT * FROM users WHERE login='$login' and userid<>'$userid' LIMIT 1"); 
	$NameNotUnic=mysqli_num_rows($row);
	if($email==''){$error++;$emailerror=$emailerrorTXT;$emailborder=$ErrFrame;$save=0;}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {$error++;$emailerror=$emailerrorTXT2;$emailborder=$ErrFrame;$save=0;}
	if($login==''){$error++;$loginerror=$loginerrorTXT;$loginborder=$ErrFrame;$save=0;}
	elseif($NameNotUnic!=0){$error++;$loginerror=$loginerrorTXT2;$loginborder=$ErrFrame;$save=0;}
	if($imya=='' ){$error++;$imyaerror=$imyaerrorTXT;$imyaborder=$ErrFrame;$save=0;}
	if($familia=='' ){$error++;$familiaerror=$familiaerrorTXT;$familiaborder=$ErrFrame;$save=0;}
	mysqli_free_result($row);
}
if($save==1)
{
	$sqltxt="UPDATE users SET login='$login',
	imya='$imya', 
	otchestvo='$otchestvo', 
	familia='$familia', 
	email='$email',
	login='$login',
	date=NOW()
	WHERE userid='".get_s_var("userid")."'";//echo "$sqltxt";
	sql($sqltxt);
	set_var('logon',true);
$SuccessCreate=1;
}
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title></title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
<link href="'.cssname().'" type=text/css rel=stylesheet>';
echo "<form action='".aPSID("/cabinet.php")."' method='post' name='order' target='_self'>";
if($SuccessCreate!=3)
{
echo '<table align="center" width="100%" style="padding-left:0px;padding-right:265px;" cellspacing="14" cellpadding="0" border="0">
	<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$EditPersonalData.'</b></td></tr>';
echo'
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Login.':</td>
<td style="width:1%;"><input type="text" name="login" style="width:260px;height:25px;border:'.$loginborder.';font-size:16px;text-align:left;" required value="'.$login.'">
</td><td class="errtxt">'.$loginerror.'&nbsp;</td></tr>
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Name.':</td>
<td style="width:1%;"><input type="text" name="imya" style="width:260px;height:25px;border:'.$imyaborder.';font-size:16px;text-align:left;" required value="'.$imya.'">
</td><td class="errtxt">'.$imyaerror.'&nbsp;</td></tr>
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Name2.':</td>
<td style="width:1%;"><input type="text" name="otchestvo" style="width:260px;height:25px;border:'.$otchestvoborder.';font-size:16px;text-align:left;" required value="'.$otchestvo.'">
</td><td class="errtxt">'.$otchestvoerror.'&nbsp;</td></tr>
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$Surname.':</td>
<td style="width:1%;"><input type="text" name="familia" style="width:260px;height:25px;border:'.$familiaborder.';font-size:16px;text-align:left;" required value="'.$familia.'">
</td><td class="errtxt">'.$familiaerror.'&nbsp;</td></tr>
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">E-mail:</td>
<td style="width:1%;"><input type="text" name="email" style="width:260px;height:25px;border:'.$emailborder.';font-size:16px;text-align:left;" required value="'.$email.'">
</td><td class="errtxt">'.$emailerror.'&nbsp;</td></tr>
<tr><td style="height:32px;text-align:right;width:50%;font-size:18px;padding-right:9px;">&nbsp;</td>
<td style="width:1%;height:25px;background-color:#FFFFFF;font-size:18px;text-align:center;">
<input type="button" style="width:260px;height:32px;margin-top:25px;background-color: #649B51; color: #FFFFFF;font-weight:bold;text-align:center;"
onclick="order.submit();" value="'.$SAVE.'">
</td><td class="errtxt" style="color:black;vertical-align:bottom;">'.$NeedToChangePass.'? <a class="usuallink" target="_parent" href="'.aPSID('/cabinet/reset').'">'.$Itshere.'</a></td></tr>
';
}
/*else //аккаунт был создан - известим об этом
{
echo '<table align="center" width="100%" style="padding-left:17px;padding-right:17px;border-top:1px solid gray;" cellspacing="14" cellpadding="0" border="0">
	<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>Регистрация прошла успешно</b>
	<br><a class="usuallink" target="_parent" href="'.aPSID('/').'">Вернуться в каталог</a></td></tr>';
}*/
echo '<tr><td colspan="3" height="0"><br><input name="firstturn" type="hidden" value="yes" checked></td></tr></table></form>';
echo '</body></html>';
?>