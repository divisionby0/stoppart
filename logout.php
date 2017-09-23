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
$firstturn=post('firstturn');$continue='0';$save=0;
if($firstturn=='yes'){$continue='1';$save=1;}
if($save==1){do_logout();$SuccessCreate=1;}
$menuname=$_GET['menu'];
if($menuname=="en") $language=$menuname;
if($language=="en") {
$exit="Sign out";$basketclear="*When you sign out of your account the basket will be cleared.";$SIGNOUT="SIGN OUT";
$SIGNOUTSUCCESSFUL="You have successfully logged out from your account.";$BackToCatalog="Back to the catalog";
}
else
{
$exit="Выход из учетной записи";$basketclear="*При выходе из учетной записи корзина будет очищена.";$SIGNOUT="ВЫЙТИ";
$SIGNOUTSUCCESSFUL="Вы успешно вышли из своей учетной записи.";$BackToCatalog="Вернуться в каталог";
}
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title></title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
<link href="'.cssname().'" type=text/css rel=stylesheet>';
echo "<form action='' method='post' name='order' target='_self'>";
if($SuccessCreate!=1)
{
echo '<table align="center" width="100%" style="padding-left:0px;padding-right:265px;" cellspacing="14" cellpadding="0" border="0">
	<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$exit.'</b><br><br>
	'.$basketclear.'</td></tr>';
/*			echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">Ваш логин/email:</td>
			<td style="width:1%;"><input type="text" name="email" style="width:260px;height:25px;border:'.$emailborder.';font-size:16px;text-align:left;" required value="'.$email.'">
			</td><td class="errtxt">'.$emailerror.'&nbsp;</td></tr>';*/
			echo'<tr><td style="height:32px;text-align:right;width:50%;font-size:18px;padding-right:9px;">&nbsp;</td><td style="width:1%;height:25px;background-color:#FFFFFF;font-size:18px;text-align:center;">
			<input type="button" style="width:260px;height:32px;margin-top:25px;background-color: #649B51; color: #FFFFFF;font-weight:bold;text-align:center;"
			onclick="order.submit();" value="'.$SIGNOUT.'"></td><td class="errtxt" style="color:black;vertical-align:bottom;">';
			echo'&nbsp;';
			echo'</td></tr>';
}
else //аккаунт был создан - известим об этом
	echo '<table align="center" width="100%" style="padding-left:17px;padding-right:17px;border-top:1px solid gray;" cellspacing="14" cellpadding="0" border="0">
		<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$SIGNOUTSUCCESSFUL.'</b>
		<br><a class="usuallink" target="_parent" href="'.aPSID("/").'">'.$BackToCatalog.'</a></td></tr>';
echo '<tr><td colspan="3" height="0"><br><input name="firstturn" type="hidden" value="yes" checked></td></tr></table></form>';
echo '</body></html>';
?>