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
$passworderrorTXT="Here the password is expected.";$passworderrorTXT2="Длина пароля должна составлять от 5 символов.";
$emailerrorTXT="Here the email address is expected";$emailerrorTXT2="Sorry, we don't recognize this email.";$Resetpassword="Reset password.";
$EnterNewPassword="Enter new password.";$SetNewPass="SET NEW PASSWORD.";$CancelSetNewPass="Cancel password reset.";
$YourLogin="Your account name/e-mail";$Apply="APPLY";$or='or';$NewPassWasSet='The new password was successfully installed.';$Loginwithnewpass='Log in with a new password.';
$BackToCatalog="Back to the catalog";$SentLetter1="A letter with code for password reset  has been sent to your address";
}
else
{
$passworderrorTXT="Пароль не заполнен.";$passworderrorTXT2="That password is too short, please use a longer than 5 symbols.";
$emailerrorTXT="Укажите ваш логин или адрес электронной почты.";$emailerrorTXT2="Указанная вами почта не зарегистрирована.";
$Resetpassword="Сброс пароля.";$EnterNewPassword="Введите новый пароль.";$SetNewPass="УСТАНОВИТЬ НОВЫЙ ПАРОЛЬ.";$CancelSetNewPass="Отменить сброс пароля.";
$YourLogin="Ваш логин/email.";$Apply="ПРИМЕНИТЬ";$or='или';$NewPassWasSet='Новый пароль был успешно установлен.';$Loginwithnewpass='Войти с новым паролем.';
$BackToCatalog="Вернуться в каталог";$SentLetter1="На адрес пользователя";$SentLetter2="отправлено письмо с кодом сброса пароля. Обычно оно приходит в течение 10 минут";
}
$firstturn=utf1251(post('firstturn'));$continue='0';$save=0;
if($firstturn=='yes'){$continue='1';$save=1;}
$email=utf1251(post('email'));$password=utf1251(post('password'));
$resetuserid=$_GET['uid'];$sw=$_GET['sw'];$rst=$_GET['rst'];//$resetuserid=1;
if(do_reset2($resetuserid,$sw)) $pagesetpass=1; else $pagesetpass=0;
if($pagesetpass==1)//страница по установке нового пароля (при заходе по правильной ссылке)
{
if($continue=='1'){
	if($password=='' ){$error++;$passworderror=$passworderrorTXT;$passwordborder=$ErrFrame;$save=0;}
	elseif(strlen($password)<5){$error++;$passworderror=$passworderrorTXT2;$passwordborder=$ErrFrame;$save=0;}
}
if($save==1){
do_setnewpassword($resetuserid,$password);
//sql ("UPDATE user_fl SET imya='',date=NOW() WHERE userid='$Newuserid'");
//sql ("UPDATE users SET password='$password',date=NOW() WHERE userid='$Newuserid'");
$SuccessCreate=1;
}//
}
else
{//страница по вводу данных от пользователя для сброса пароля
if($continue=='1'){
		$row=sql("SELECT * FROM users WHERE login='$email' LIMIT 1"); //Проверяем есть ли логин
		$NameNotUnic=mysqli_num_rows($row);
		if($NameNotUnic==0)$row=sql("SELECT * FROM users WHERE email='$email' LIMIT 1");
		else $emailneed=1;
		$NameNotUnic=mysqli_num_rows($row);
		if(mysqli_num_rows($row)!=0){$r=mysqli_fetch_array($row);$RealPassword=$r['password'];$Newuserid=$r['userid'];$familia=$r['familia'];$imya=$r['imya']; 
		if($emailneed==1) $email=$r['email'];
		mysqli_free_result($row);
		}
		if($email==''){$error++;$emailerror=$emailerrorTXT;$emailborder=$ErrFrame;$save=0;}
//		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {$error++;$emailerror="Адрес электронной почты заполнен с ошибками.";$emailborder=$ErrFrame;$save=0;}
		elseif($NameNotUnic==0){$error++;$emailerror=$emailerrorTXT2;$emailborder=$ErrFrame;$save=0;}	
	}
	if($save==1){do_reset($Newuserid,$email,$language);$SuccessCreate=1;}
}
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title></title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
<link href="'.cssname().'" type=text/css rel=stylesheet>';
echo "<form action='".aPSID("/reset.php?uid=$resetuserid&sw=$sw")."' method='post' name='order' target='_self'>";
if($SuccessCreate!=1)
{
if($rst==1) $padright='265'; else $padright='0'; 
echo '<table align="center" width="100%" style="padding-left:0px;padding-right:'.$padright.'px;" cellspacing="14" cellpadding="0" border="0">
	<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$Resetpassword.'</b></td></tr>';
	if($pagesetpass==1)
		{
			echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$EnterNewPassword.':</td>
			<td style="width:1%;"><input type="text" name="password" style="width:260px;height:25px;border:'.$passwordborder.';font-size:16px;text-align:left;" required value="'.$password.'">
			</td><td class="errtxt">'.$passworderror.'&nbsp;</td></tr>';
			echo'<tr><td style="height:32px;text-align:right;width:50%;font-size:18px;padding-right:9px;">&nbsp;</td><td style="width:1%;height:25px;background-color:#FFFFFF;font-size:18px;text-align:center;">
			<input type="button" style="width:260px;height:32px;margin-top:25px;background-color: #649B51; color: #FFFFFF;font-weight:bold;text-align:center;"
			onclick="order.submit();" value="'.$SetNewPass.'">
			</td><td class="errtxt" style="color:black;vertical-align:bottom;">или <a class="usuallink" target="_parent" href="'.aPSID("/cabinet/signin").'">'.$SetNewPass.'</a></td></tr>';
			}
		else {
			echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">'.$YourLogin.':</td>
			<td style="width:1%;"><input type="text" name="email" style="width:260px;height:25px;border:'.$emailborder.';font-size:16px;text-align:left;" required value="'.$email.'">
			</td><td class="errtxt">'.$emailerror.'&nbsp;</td></tr>';
			echo'<tr><td style="height:32px;text-align:right;width:50%;font-size:18px;padding-right:9px;">&nbsp;</td><td style="width:1%;height:25px;background-color:#FFFFFF;font-size:18px;text-align:center;">
			<input type="button" style="width:260px;height:32px;margin-top:25px;background-color: #649B51; color: #FFFFFF;font-weight:bold;text-align:center;"
			onclick="order.submit();" value="'.$Apply.'"></td><td class="errtxt" style="color:black;vertical-align:bottom;">';
			if($rst!=1)echo $or.' <a class="usuallink" target="_parent" href="'.aPSID("/cabinet/signin").'">'.$CancelSetNewPass.'</a>';else echo'&nbsp;';
			echo'</td></tr>';
			}
}
else //аккаунт был создан - известим об этом
{	if($pagesetpass==1) echo '<table align="center" width="100%" style="padding-left:17px;padding-right:17px;border-top:1px solid gray;" cellspacing="14" cellpadding="0" border="0">
		<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$NewPassWasSet.'</b>
		<br><a class="usuallink" target="_parent" href="'.aPSID("/cabinet/signin").'">'.$Loginwithnewpass.'</a>
		<br><a class="usuallink" target="_parent" href="'.aPSID("/").'">'.$BackToCatalog.'</a></td></tr>';
	else echo '<table align="center" width="100%" style="padding-left:17px;padding-right:17px;border-top:1px solid gray;" cellspacing="14" cellpadding="0" border="0">
		<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>'.$SentLetter1.' '.$email.' '.$SentLetter2.'</b>
		<br><a class="usuallink" target="_parent" href="'.aPSID("/").'">'.$BackToCatalog.'</a></td></tr>';
}
echo '<tr><td colspan="3" height="0"><br><input name="firstturn" type="hidden" value="yes" checked></td></tr></table></form>';
echo '</body></html>';
?>