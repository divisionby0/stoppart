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
$username=GetNameOfUser($userid);
if($username!='Неизвестный' and $username!='Гость' ) $slash="265px"; else $slash="0px";
$firstturn=utf1251(post('firstturn'));$continue='0';$save=0;
if($firstturn=='yes'){$continue='1';$save=1;}
$password=utf1251(post('password'));$email=utf1251(post('email'));
$imya=utf1251(post('imya'));$familia=utf1251(post('familia'));
$PROVE=utf1251(post("prove"));
if($continue=='1'){
	$row=sql("SELECT * FROM users WHERE login='$email' LIMIT 1"); //Проверяем есть ли логин
	$NameNotUnic=mysqli_num_rows($row);
	if(mysqli_num_rows($row)!=0){$r=mysqli_fetch_array($row);$RealPassword=$r['password'];$Newuserid=$r['userid'];$familia=$r['familia'];$imya=$r['imya']; }
	mysqli_free_result($row);
	if($email==''){$error++;$emailerror="Укажите ваш адрес электронной почты, он же ваш логин.";$emailborder=$ErrFrame;$save=0;}
//	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {$error++;$emailerror="Адрес электронной почты заполнен с ошибками.";$emailborder=$ErrFrame;$save=0;}
	elseif($NameNotUnic==0){$error++;$emailerror="Указанного логина не существует.";$emailborder=$ErrFrame;$save=0;}
	if($password=='' ){$error++;$passworderror="Пароль не заполнен.";$passwordborder=$ErrFrame;$save=0;}
	elseif(strlen($password)<5){$error++;$passworderror="Длина пароля должна составлять от 5 символов.";$passwordborder=$ErrFrame;$save=0;}
	elseif($RealPassword!=$password and $NameNotUnic!=0){$error++;$passworderror="Указанный пароль не подошёл.";$passwordborder=$ErrFrame;$save=0;}
}
if($save==1)
{//обновим текущего юзера и перетащим ему корзину в его аккаунт.
	$needlogout=0;
	if($Newuserid!=$userid) $needlogout=1;
	if($needlogout==1)
		{	$needflybasket=0;
			$row=sql ("SELECT * FROM  box WHERE userid='$userid' LIMIT 1");//Проверяем есть ли корзина у пользователя, чтобы её перенести на нового
			if(mysqli_num_rows($row)!=0){$r=mysqli_fetch_array($row);$boxid=$r['boxid'];$OldUid=$userid; $needflybasket=1;}
			mysqli_free_result($row);
			//меняем текущего пользователя на того, что выбрали
			do_login($Newuserid);
//			if($needflybasket==1){echo"Корзину $boxid переносим";FlyBasketToCurrent(0,$OldUid);}
		}
	set_var('logon',true);
	$SuccessCreate=1;	//*/
}
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Вход.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
<link href="'.cssname().'" type=text/css rel=stylesheet>';
//echo '<table align="center" bgcolor="#FFFFFF" width="100%" style="padding:17px;padding-bottom:0px;" cellspacing="0" cellpadding="0" border="0"><tr><td></td></tr></table>';
//echo '<table align="center" bgcolor="#FFFFFF" width="100%;" style="padding:17px;padding-top:0px;" cellspacing="0" cellpadding="0" border="0"><tr><td style="text-align:left;width:260px;height:26px;font-size:18px;vertical-align:top">';
echo "<form action='".aPSID("/signin.php")."' method='post' name='order' target='_self'>";
if($SuccessCreate!=1)
{
echo '<table align="center" width="100%" style="padding-left:0px;padding-right:'.$slash.';" cellspacing="14" cellpadding="0" border="0">
	<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;"><b>Вход</b></td></tr>';
echo'
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">Ваш логин/email:</td>
<td style="width:1%;"><input type="text" name="email" style="width:260px;height:25px;border:'.$emailborder.';font-size:16px;text-align:left;" required value="'.$email.'">
</td><td class="errtxt">'.$emailerror.'&nbsp;</td></tr>
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">Пароль:</td>
<td style="width:1%;"><input type="text" name="password" style="width:260px;height:25px;border:'.$passwordborder.';font-size:16px;text-align:left;" required value="'.$password.'">
</td><td class="errtxt">'.$passworderror.'&nbsp;</td></tr>
<tr><td style="height:32px;text-align:right;width:50%;font-size:18px;padding-right:9px;">&nbsp;</td>
<td style="width:1%;height:25px;background-color:#FFFFFF;font-size:18px;text-align:center;">
<input type="button" style="width:260px;height:32px;margin-top:25px;background-color: #649B51; color: #FFFFFF;font-weight:bold;text-align:center;"
onclick="order.submit();" value="';
echo 'ВОЙТИ">
</td><td class="errtxt" style="color:black;vertical-align:bottom;">не регистрировались раньше?<br><a class="usuallink" target="_parent" href="'.aPSID("/cabinet/create").'">Регистрация тут</a></td></tr>
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">&nbsp;</td>
<td style="width:1%;"><a class="usuallink" target="_parent" href="'.aPSID("/cabinet/reset").'">Забыли свой пароль?</a>
</td><td class="errtxt">'.$passworderror.'&nbsp;</td></tr>
</td></tr>
';
}
else //аккаунт был создан - известим об этом
{
echo '<table align="center" width="100%" style="padding-left:17px;padding-right:17px;border-top:1px solid gray;" cellspacing="14" cellpadding="0" border="0">
	<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>Здравствуйте, '."$imya $familiya".'. Вход прошёл успешно.</b>
	<br><a class="usuallink" target="_parent" href="'.aPSID("/").'">Вернуться в каталог</a></td></tr>';
}
echo '<tr><td colspan="3" height="0"><br><input name="firstturn" type="hidden" value="yes" checked></td></tr></table></form>';
//*/
echo '</body></html>';
?>