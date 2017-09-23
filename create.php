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
$firstturn=utf1251(post('firstturn'));$continue='0';$save=0;
if($firstturn=='yes'){$continue='1';$save=1;}
$password=utf1251(post('password'));$email=utf1251(post('email'));
$imya=utf1251(post('imya'));$familia=utf1251(post('familia'));
$PROVE=utf1251(post("prove"));
if($continue=='1'){
	$row=sql("SELECT * FROM users WHERE login='$email' LIMIT 1"); //Проверяем нужно ли делать Логаут
	$NameNotUnic=mysqli_num_rows($row);
	if($email==''){$error++;$emailerror="Укажите адрес электронной почты, он будет вашим логином";$emailborder=$ErrFrame;$save=0;}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {$error++;$emailerror="Адрес электронной почты заполнен с ошибками";$emailborder=$ErrFrame;$save=0;}
	elseif($NameNotUnic!=0){$error++;$emailerror="Логин с этой почтой занят. Если это ваша почта вы можете восстановить пароль.";$emailborder=$ErrFrame;$save=0;}
	if($imya=='' ){$error++;$imyaerror="Имя не указано";$imyaborder=$ErrFrame;$save=0;}
	if($familia=='' ){$error++;$familiaerror="Фамилия не указана";$familiaborder=$ErrFrame;$save=0;}
	if($password=='' ){$error++;$passworderror="Пароль не заполнен";$passwordborder=$ErrFrame;$save=0;}
	elseif(strlen($password)<5){$error++;$passworderror="Длина пароля должна составлять от 5 символов";$passwordborder=$ErrFrame;$save=0;}
mysqli_free_result($row);
}
if($save==1)
{
	$needlogout=0;
	$row=sql("SELECT * FROM users WHERE userid='$userid' LIMIT 1"); //Проверяем нужно ли делать Логаут
	if(mysqli_num_rows($row)!=0){$r=mysqli_fetch_array($row);$role=$r['role'];if($role!='tmp') $needlogout=1;}
	if($needlogout==1)
		{	$needflybasket=0;
			$row=sql ("SELECT * FROM  box WHERE userid='$userid' LIMIT 1");//Проверяем есть ли корзина у пользователя, чтобы её перенести на нового
			if(mysqli_num_rows($row)!=0){$r=mysqli_fetch_array($row);$boxid=$r['boxid'];$OldUid=$userid; $needflybasket=1;}
			do_logout();
			if($needflybasket==1){echo "корзина=$boxid";FlyBasketToCurrent(0,$OldUid);}
		}
	save_userid();
	global $userid;
	$userid=get_s_var('userid');
	$sqltxt="UPDATE users SET login='$email',
	role='usr',
	password='$password',
	imya='$imya', 
	familia='$familia', 
	email='$email',
	hash='1',
	login='$email',
	date=NOW()
	WHERE userid='".get_s_var("userid")."'";//echo "$sqltxt";
	sql($sqltxt);
	set_var('logon',true);
$SuccessCreate=1;	
mysqli_free_result($row);
}
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Регистрация.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
<link href="'.cssname().'" type=text/css rel=stylesheet>';
echo "<form action='".aPSID("/create.php")."' method='post' name='order' target='_self'>";
if($SuccessCreate!=1)
{
echo '<table align="center" width="100%" style="padding-left:0px;padding-right:265px;" cellspacing="14" cellpadding="0" border="0">
	<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;"><b>Регистрация</b></td></tr>';
echo'
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">Имя:</td>
<td style="width:1%;"><input type="text" name="imya" style="width:260px;height:25px;border:'.$imyaborder.';font-size:16px;text-align:left;" required value="'.$imya.'">
</td><td class="errtxt">'.$imyaerror.'&nbsp;</td></tr>
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">Фамилия:</td>
<td style="width:1%;"><input type="text" name="familia" style="width:260px;height:25px;border:'.$familiaborder.';font-size:16px;text-align:left;" required value="'.$familia.'">
</td><td class="errtxt">'.$familiaerror.'&nbsp;</td></tr>
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">Ваш email:</td>
<td style="width:1%;"><input type="text" name="email" style="width:260px;height:25px;border:'.$emailborder.';font-size:16px;text-align:left;" required value="'.$email.'">
</td><td class="errtxt">'.$emailerror.'&nbsp;</td></tr>
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">Пароль:</td>
<td style="width:1%;"><input type="text" name="password" style="width:260px;height:25px;border:'.$passwordborder.';font-size:16px;text-align:left;" required value="'.$password.'">
</td><td class="errtxt">'.$passworderror.'&nbsp;</td></tr>
<tr><td style="height:32px;text-align:right;width:50%;font-size:18px;padding-right:9px;">&nbsp;</td>
<td style="width:1%;height:25px;background-color:#FFFFFF;font-size:18px;text-align:center;">
<input type="button" style="width:260px;height:32px;margin-top:25px;background-color: #649B51; color: #FFFFFF;font-weight:bold;text-align:center;"
onclick="order.submit();" value="';
echo 'СОЗДАТЬ НОВОГО ПОЛЬЗОВАТЕЛЯ">
</td><td class="errtxt" style="color:black;vertical-align:bottom;">регистрировались раньше? <a class="usuallink" target="_parent" href="'.aPSID('/cabinet/signin').'">Вход тут</a></td></tr>';
}
else //аккаунт был создан - известим об этом
{
echo '<table align="center" width="100%" style="padding-left:17px;padding-right:17px;border-top:1px solid gray;" cellspacing="14" cellpadding="0" border="0">
	<tr><td colspan="3" style="padding-top:17px;text-align:center;width:100%;height:26px;font-size:18px;"><b>Регистрация прошла успешно</b>
	<br><a class="usuallink" target="_parent" href="'.aPSID('/').'">Вернуться в каталог</a></td></tr>';
}
echo '<tr><td colspan="3" height="0"><br><input name="firstturn" type="hidden" value="yes" checked></td></tr></table></form>';
echo '</body></html>';
?>