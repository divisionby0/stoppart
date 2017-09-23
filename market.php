<?php
session_start();
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
set_session_vars();
global $userid;	
global $idd;
$idd=get_var('idd');
$ordernum=$idd;
$ico1="/icons/gray.jpg";
$ico2="/icons/gray.jpg";
$ico3="/icons/gray.jpg";
$ico4="/icons/gray.jpg";
$ico5="/icons/gray.jpg";
$ico6="/icons/gray.jpg";
$titl1="nothing";
$titl2="nothing";
$titl3="nothing";
$titl4="nothing";
$titl5="nothing";
$titl6="nothing";
$st1='height="40px"';
$st2='height="40px"';
$st3='height="40px"';
$st4='height="40px"';
$st5='height="40px"';
$st6='height="40px"';
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Поволжье.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="'.cssname().'" type=text/css rel=stylesheet>';
$count=1;
//echo "idd=$idd, u=$userid";
 	$r=sql("SELECT box.tov_id,tovsNew.price1s,boxid,kol,tovsNew.name,tovsNew.sklad,tovsNew.zakaz,tovsNew.ida,tovsNew.id,box.date  FROM box INNER JOIN tovsNew ON box.tov_id = tovsNew.id WHERE  box.idd='$idd' AND userid='$userid' ORDER BY box.date DESC"); 
	$kolvotovarov=mysqli_num_rows($r);$sum=0;
	if($kolvotovarov!=0) while ($row=mysqli_fetch_array($r)){
	 $sum=$sum+($row['price1s']*$row['kol']);
		$ida=$row['ida'];
		$id=$row['id'];
		$id_crop = substr($ida, 2,5);
		$filename ="icons/".$id_crop."_resize.jpg";
		$filename2 ="icons/".$id_crop."_resize.JPG";
		$filename3 ="icons/".$id_crop.".jpg";
		$realname=$ida;
		if (file_exists($filename)) $perem="/".$filename;
		elseif (file_exists($filename2)) $perem="/".$filename2;
		elseif (file_exists($filename3)) $perem="/".$filename3;
		else $perem="/icons/noimage.jpg";
		$storona='width="52px"';
/*$src = getimagesize("http://ifarfor.ru$perem");
$w_src = $src[0]; 
$h_src = $src[1];
$sootn=$w_src/$h_src;
if ($sootn<1.3) $storona='height="40px"';  else $storona='width="52px"';*/
	 if($count==1) {$ico1=$perem;$st1=$storona;$titl1=$row['name']." ".$row['price1s']."руб. ".$row['kol']."шт";}//.$w_src.' '.$h_src.' '.$sootn.' '.$storona ;}
	 elseif($count==2) {$ico2=$perem;$st2=$storona;$titl2=$row['name']." ".$row['price1s']."руб. ".$row['kol']."шт";}//.$w_src.' '.$h_src.' '.$sootn.' '.$storona;}
	 elseif($count==3) {$ico3=$perem;$st3=$storona;$titl3=$row['name']." ".$row['price1s']."руб. ".$row['kol']."шт";}
	 elseif($count==4) {$ico4=$perem;$st4=$storona;$titl4=$row['name']." ".$row['price1s']."руб. ".$row['kol']."шт";}
	 elseif($count==5) {$ico5=$perem;$st5=$storona;$titl5=$row['name']." ".$row['price1s']."руб. ".$row['kol']."шт";}
	 elseif($count==6) {$ico6=$perem;$st6=$storona;$titl6=$row['name']." ".$row['price1s']."руб. ".$row['kol']."шт";};
	 $count++;
	 }
$ed=$kolvotovarov-(floor($kolvotovarov/10)*10);
if($kolvotovarov>4 and $kolvotovarov<21) $slovo="товаров";
elseif($ed==1)$slovo="товар";
elseif($ed>1 and $ed<5)$slovo="товара";
else $slovo="товаров";
/*$ans='<HTML><HEAD><title>antares e-shop</title><META http-equiv=content-type content="text/html; charset=windows-1251">
	<META http-equiv=Content-language content=ru-RU><META content="" name=description><META content="" name=keywords>
	<META content="" name=nocashing><SCRIPT LANGUAGE="JavaScript" src="comp.js"></SCRIPT></HEAD>
	<body topmargin="0" leftmargin="0" bottommargin="0" rightmargin="0" marginwidth="0" marginheight="0"  bgcolor="#FFFFFF" text="#000000">';
//*/
echo"
<table height='212px' width='203px' cellspacing='0' cellpadding='0'>";
echo'
				<tr>
				<td width="100%" height="26px" align="center" style="padding-left:15px;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;text-align:left;">
В <a href="'.aPSID("/cabinet/basket/").'" target="_top">корзине</a> <b>'.$kolvotovarov.'</b> '.$slovo.' 
				</td>
				</tr>
				<tr>
				<td width="100%" height="112px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">
					<table align="center" width="203px" height="112px" cellspacing="0" cellpadding="0" border="0">
					<tr>
					<td width="12px" height="7px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td width="52px" height="7px" align="center" style="border-top:#000000 1px solid;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td width="12px" height="7px" align="center" style="border-top:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td width="52px" height="7px" align="center" style="border-top:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td width="12px" height="7px" align="center" style="border-top:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td width="52px" height="7px" align="center" style="border-top:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td width="12px" height="7px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					</tr>
					<tr>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"><img '.$st1.' title="'.$titl1.'" src="'.$ico1.'"></td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"><img '.$st2.' title="'.$titl2.'" src="'.$ico2.'"></td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"><img '.$st3.' title="'.$titl3.'" src="'.$ico3.'"></td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					</tr>
					<tr>
					<td height="7px" colspan="7" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					</tr>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"><img '.$st4.' title="'.$titl4.'" src="'.$ico4.'"></td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"><img '.$st5.' title="'.$titl5.'" src="'.$ico5.'"></td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"><img '.$st6.' title="'.$titl6.'" src="'.$ico6.'"></td>
					<td height="40px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<tr>
					<td height="7px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td height="7px" colspan="5" align="center" style="border-bottom:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td height="7px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					</tr>
					</table>		
				</td>
				</tr>
				<td width="100%" height="70px" align="left" style="padding-left:15px;VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;text-align : left;">
				На сумму: '.$sum.' руб<br>
				<a href="'.aPSID("/cabinet/order").'" target="_top">Оформить покупку</a><br>
				</td>
				</tr>
				</table>';//*/
//$ans.="</body></html>";				<a href="" target="_self">Зарегистрироваться</a><br>
echo '</body></html>';
mysqli_free_result($r);
//return $ans;
?>