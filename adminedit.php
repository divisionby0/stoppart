<?php
session_set_cookie_params(1080000);
session_start();
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
set_session_vars();
$orderid=$_GET['orderid'];$userid2=$_GET['userid'];
$firstturn=utf1251(post('firstturn'));$link_dostavka=utf1251(post('link_dostavka'));$status=utf1251(post('status'));
$continue='0';$save=0;
if($firstturn=='yes'){$continue='1';$save=1;}
if (!is_admin()){	echo "Ошибка 408";	exit;	}
$row=sql("SELECT * FROM orders WHERE idd='$orderid' AND userid='$userid2' LIMIT 1"); 
	if(mysqli_num_rows($row)!=0){ 
		$r=mysqli_fetch_array($row);
		$region=$r['regionpunkt'];$city=$r['citypunkt'];$Address=$r['addresspunkt'];$phone=$r['phone'];$phone2=$r['phone2'];$email=$r['email'];$imya=$r['imya'];
		$familia=$r['familia'];$addrdost=$r['adres'];$town=$r['town'];$country=$r['country'];$otchestvo=$r['otchestvo'];
		}
mysqli_free_result($row);
if($save==1)
{
	$sqltxt="UPDATE orders SET link_dostavka='$link_dostavka',
	status='status'
	WHERE userid='$userid2'";
	sql($sqltxt);
}
else
{
	$row=sql("SELECT * FROM orders WHERE idd='$orderid' AND userid='$userid2' LIMIT 1"); 
	if(mysqli_num_rows($row)!=0){ $r=mysqli_fetch_array($row);$link_dostavka=$r['link_dostavka'];$status=$r['status'];}
	mysqli_free_result($row);	
}
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Поволжье.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" vlink="#990099" text="#000000">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
<link href="'.cssname().'" type=text/css rel=stylesheet>';
echo "<form action='/adminedit.php?orderid=$orderid&userid=$userid2' method='post' name='order' target='_self'>";
echo print_orders($userid2,$orderid,$language);
echo '<table align="left" width="100%" style="padding-left:0px;padding-right:265px;" cellspacing="4" cellpadding="0" border="0">
	<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;"><b>Информация о заказе</b></td></tr>';
if($region!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Регион:</td>
<td style="width:1%;">'.$region.'</td><td class="errtxt">&nbsp;</td></tr>';
if($city!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Город:</td>
<td style="width:1%;">'.$city.'</td><td class="errtxt">&nbsp;</td></tr>';
if($Address!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Адрес:</td>
<td style="width:1%;">'.$Address.'</td><td class="errtxt">&nbsp;</td></tr>';
if($phone!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Телефон:</td>
<td style="width:1%;">'.$phone.'</td><td class="errtxt">&nbsp;</td></tr>';
if($phone2!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Телефон2:</td>
<td style="width:1%;">'.$phone2.'</td><td class="errtxt">&nbsp;</td></tr>';
if($email!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">email:</td>
<td style="width:1%;">'.$email.'</td><td class="errtxt">&nbsp;</td></tr>';
if($imya!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Имя:</td>
<td style="width:1%;">'.$imya.'</td><td class="errtxt">&nbsp;</td></tr>';
if($otchestvo!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Отчество:</td>
<td style="width:1%;">'.$otchestvo.'</td><td class="errtxt">&nbsp;</td></tr>';
if($familia!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Фамилия:</td>
<td style="width:1%;">'.$familia.'</td><td class="errtxt">&nbsp;</td></tr>';
if($country!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Страна:</td>
<td style="width:1%;">'.$country.'</td><td class="errtxt">&nbsp;</td></tr>';
if($town!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Город:</td>
<td style="width:1%;">'.$town.'</td><td class="errtxt">&nbsp;</td></tr>';
if($addrdost!="")echo'<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:19px;">Адрес:</td>
<td style="width:1%;">'.$addrdost.'</td><td class="errtxt">&nbsp;</td></tr>';
echo'
<tr><td style="height:26px;text-align:right;width:50%;font-size:18px;padding-right:9px;">СДЭК трекинг:</td>
<td style="width:1%;"><input type="text" name="link_dostavka" style="width:260px;height:25px;border:'.$link_dostavka.';font-size:16px;text-align:left;" required value="'.$link_dostavka.'">
</td><td class="errtxt">'.$link_dostavka.'&nbsp;</td></tr>
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
echo 'СОХРАНИТЬ ИЗМЕНЕНИЯ">
</td><td class="errtxt" style="color:black;vertical-align:bottom;">&nbsp;</td></tr>
<tr><td colspan="3" height="0"><br><input name="firstturn" type="hidden" value="yes" checked></td></tr>
</table>
</form>';
echo '</body></html>';
?>