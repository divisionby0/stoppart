<?php
session_set_cookie_params(1080000);
session_start();
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
set_session_vars();
global $userid;	
global $idd;
$idd=get_var('idd');$userid=get_s_var("userid");
$ordernum=$idd;
$language=$_GET['language'];$menuname=$_GET['menu'];$menuname2=$_GET['menu2'];$menuname3=$_GET['menu3'];$menuname4=$_GET['menu4'];$menuname5=$_GET['menu5'];
if($menuname=="en")$language="en";
$ico1="/empty.gif";
$ico2="/empty.gif";
$ico3="/empty.gif";
$ico4="/icons/gray.jpg";
$ico5="/icons/gray.jpg";
$ico6="/icons/gray.jpg";
$titl1="nothing";
$titl2="nothing";
$titl3="nothing";
$titl4="nothing";
$titl5="nothing";
$titl6="nothing";
$st1='height="29px"';
$st2='height="29px"';
$st3='height="29px"';
$st4='height="30px"';
$st5='height="30px"';
$st6='height="30px"';
$col1="#FFFFFF";$col2="#FFFFFF";$col3="#FFFFFF";$col4="#FFFFFF";$col5="#FFFFFF";$col6="#FFFFFF";
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Поволжье.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body height="80px" bgcolor="#FFFFFF"  link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
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
		$filename0 ="ico/".$ida.".jpg";	
		$filename ="icons/".$id_crop."_resize.jpg";
		$filename2 ="icons/".$id_crop."_resize.JPG";
		$filename3 ="icons/".$id_crop.".jpg";
		$filename4 ="foto/".$view.".jpg";
		$realname=$ida;
		if (file_exists($filename0)) $perem="/".$filename0;
		elseif (file_exists($filename)) $perem="/".$filename;
		elseif (file_exists($filename2)) $perem="/".$filename2;
		elseif (file_exists($filename3)) $perem="/".$filename3;
		elseif (file_exists($filename4)) $perem="/".$filename4;
		else $perem="/icons/noimage.jpg";
		$storona='width="52px"';
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
//if($titl1=="nothing")$col1="#FFFFFF"; else $col1="#CCCCCC";
//if($titl2=="nothing")$col2="#FFFFFF"; else $col2="#CCCCCC";
//if($titl3=="nothing")$col3="#FFFFFF"; else $col3="#CCCCCC";
$namebasket="КОРЗИНА";
//if($language=="en")$namebasket="BASKET";
if($language=="en")
{$namebasket="BASKET";$langstr="/en";$basketstr1="In";$basketstr2="basket";$basketstr3="Total";$basketstr4="RUR";$slovo="pcs";}
else {$langstr="";$basketstr1="В";$basketstr2="корзине";$basketstr3="На сумму";$basketstr4="руб";}
echo'
<table cellspacing="0" cellpadding="0" width="180px">
<tr><td width="92px" height="29px" class="bag" >
<a class="linkh" href="'.aPSID($langstr."/cabinet/basket").'" target="_top" style="FONT-SIZE: 19px;color:#FFFFFF;">'.$namebasket.'</a></td>
<td style="padding-left:2px;background-color:'.$col1.';"><img width="42px" height="31px" '.$st1.' title="'.$titl1.'" src="'.$ico1.'"></td>
<td style="padding-left:2px;background-color:'.$col2.';"><img width="42px" height="31px" '.$st2.' title="'.$titl2.'" src="'.$ico2.'"></td>';
//<td style="padding-left:2px;background-color:'.$col3.';"><img width="37px" '.$st3.' title="'.$titl3.'" src="'.$ico3.'"></td>
echo '</tr>
<tr><td colspan="3" height="18px" style="padding-top:10px;font-size:14px;text-align:left;font-weight: 300;">
'.$basketstr1.' <a href="'.aPSID($langstr."/cabinet/basket/").'" target="_top" style="font-size:14px;font-weight: 300;">'.$basketstr2.'</a> '.$kolvotovarov.' '.$slovo.' </td></tr>
<tr><td colspan="3" height="18px" style="font-size:14px;text-align:left;font-weight: 300;">'.$basketstr3.' '.$sum.' '.$basketstr4.'</td></tr>
</table>';
//echo "<div style='color:white;'>$userid</div>";
//<br><a href="/cabinet/order" target="_top">Оформить покупку</a>
echo '</body></html>';
mysqli_free_result($r);
//return $ans;
?>