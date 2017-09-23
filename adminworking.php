<?php
session_set_cookie_params(1080000);
session_start();
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
set_session_vars();
	if (!is_admin()){	echo "Ошибка 408";	exit;	}
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Поволжье.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body height="80px" bgcolor="#FFFFFF"  link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
<link href="'.cssname().'" type=text/css rel=stylesheet>';
	$rus=sql("SELECT userid FROM orders ORDER BY idd DESC");	
	if(mysqli_num_rows($rus)==0) {echo "Заказов нет.";exit;}
	$ans='<strong><font size=3 color="#000000">Ведомость всех активных заявок</font></strong><BR><BR>
<table width="800" border="0" cellspacing="0" cellpadding="0">';
//$HotStr,$page,$group,$Uslovie,$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language
$ans.=PrintCatalog2('nega',1,'',"all",'','name','','',1,10,'','');
	$ans.='
<tr>
    <td width="20%" height="28px" align="center"></td>
    <td width="20%" align="center">&nbsp;</td>
	<td width="40%" align="center">&nbsp;</td>
    <td width="20%" align="center">&nbsp;</td>
    <td width="20%" align="center"><img src="/empty.gif" width="50px" height="1px"></td>
    <td width="20%" align="center"><img src="/empty.gif" width="50px" height="1px"></td>
</tr>';
	$ctrluserid='';
	while ($rowus = mysqli_fetch_array($rus)){
    $userid1=$rowus['userid'];
		if($ctrluserid!=$userid1)
		{$name=get_name($userid1);$phone=get_phone($userid1);
				$ans.='<tr>
		<td height="26px" height="25px" align="center" style=""><b>'.$userid1.'</b></td>
		<td align="center" height="25px" style=""><b>'.$name.'</b></td>
		<td align="center" height="25px" style="">'.$phone.'</td>
		<td align="center" height="25px" colspan="4" style="">&nbsp;</td>';
		$ans.='</tr>';
		$ctrluserid=$userid1;
mysqli_free_result($rus);		
	$r=sql("SELECT * FROM box WHERE userid='$userid1' ORDER BY idd DESC");	
$ctrlidd='';
	while ($row = mysqli_fetch_array($r)){
    $ordernum=$row['idd'];
	$date=$row['date'];
	if($ctrlidd!=$ordernum) //1234567890
		{$ctrlidd=$ordernum;//2017-01-19
		$day=substr($date, 8,2).'.'.substr($date, 5,2).'.'.substr($date, 0,4);
		//$day   = date( "m.d.y",$date );
		if($ordernum=='')$numofz='Корзина'; else $numofz='№'.$ordernum;
		$ans.='<tr>
		<td height="26px" height="25px" align="center" style=""><b>'.$day.'</b></td>
		<td align="center" height="25px" style=""><b>'.$numofz.'</b></td>
		<td align="center" height="25px" style="">'.$status.'</td>
		<td align="center" height="25px" colspan="2" style="">0</td>
		<td align="center" height="25px" colspan="2" style="">
		<a href="/adminedit.php?orderid='.$ordernum.'&userid='.$userid1.'" target="_blank">Редактировать</a>
		</td>';
		$ans.='</tr>';//tov_id
		$ru=sql("SELECT * FROM box WHERE userid='$userid1' AND idd='$ordernum'");
		$itogo=0;
		while ($rowu = mysqli_fetch_array($ru)){
				$kol=$rowu['kol'];$tov_id=$rowu['tov_id'];
				$ru2=sql("SELECT * FROM tovsNew WHERE id='$tov_id'");
				$rowu2 = mysqli_fetch_array($ru2);
			    $tovsname=$rowu2['name'];$ida=$rowu2['ida'];
				$price=$rowu2['price1s'];
				$pprice=$price*1;
				$sum=$kol*$price;$itogo=$itogo+$sum;
				$ans.='<tr>
				<td align="center" colspan="4" height="25px" style="border-top:1px solid gray;">'.$tovsname.' '.$ida.'</td>
				<td align="center" height="25px" style="text-align:center;border-top:1px solid gray;">'.$pprice.'</td>
				<td align="center" height="25px" style="text-align:center;border-top:1px solid gray;">'.$kol.'</td>
				<td align="center" height="25px" style="text-align:right;border-top:1px solid gray;">'.$sum.'</td>';
				$ans.='</tr>';//tov_id
			}
				$ans.='<tr>
				<td align="center" colspan="5" height="25px" style="text-align:right;border-top:1px solid black;">Итого:</td>
				<td align="center" colspan="2" height="25px" style="text-align:right;border-top:1px solid black;"><b>'.$itogo.'</b></td>';
				$ans.='</tr><tr><td align="center" colspan="7">&nbsp;</td></tr>';//tov_id			
		}
	}
			}}////1-userid
$ans.='</table><BR><BR>';
echo $ans;
mysqli_free_result($ru);	mysqli_free_result($r);		mysqli_free_result($ru2);	
echo '</body></html>';
function PrintCatalog2($HotStr,$page,$group,$Uslovie,$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language)
{
if($HotStr=='')$query1=sql($SQLZapros);else 
{
if($ShAll=="1") $SQLZapros="AND grp=0 AND ((zakaz+sklad+grp)>0) ORDER BY name";//post('ShowFoto')=='yes'
else $SQLZapros="AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0) ORDER BY name";// 
if($HotStr=="RUSSIANSTYLE"){$HotStr="SELECT Height,Capacity,Width,Diametername,ida,id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM tovsNew WHERE Rstyle='1'  $SQLZapros";}
elseif($HotStr=="project"){$HotStr="SELECT Height,Capacity,Width,Diametername,ida,id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM tovsNew WHERE TipAss='Проект'  $SQLZapros";}
elseif($HotStr=="cobaltnet"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE picture.name='Кобальтовая сетка' $SQLZapros";}
elseif($HotStr=="nega"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM form LEFT JOIN tovsNew ON form.id = tovsNew.Form WHERE form.name='Нега'";}
elseif($HotStr=="zamoscow"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE picture.name='Замоскворечье' $SQLZapros";}
//elseif($HotStr=="newyear"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE picture.name='Замоскворечье' $SQLZapros";}
elseif($HotStr=="newyear"){$HotStr="SELECT name,ida,id,idg,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM tovsNew WHERE NY='1' $SQLZapros";}
elseif($HotStr=="nephrit"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE picture.name='Нефритовый фон' $SQLZapros";}
$query1=sql($HotStr);
}
$countquery1=mysqli_num_rows($query1);//return $countquery1;
$counterofpage=0;
$firstpiece=($firstpage-1)*$numberofpages;
$lastpiece=$firstpiece+$numberofpages;
if($lastpiece==0)$lastpiece=1000;
$i=1;$j=1;
if($language=="en")
{$rownamelang="english";
}
else
{$rownamelang="name";
}
while ($row = mysqli_fetch_array($query1)) 
{
$counterofpage++;
if($counterofpage>$firstpiece and $counterofpage<=$lastpiece) {
		$rowname=$row[$rownamelang];$Nnewprice=$row['price1s'];$Nnewprice=$Nnewprice;
		$ts=floor($Nnewprice/1000);$ed=$Nnewprice-($ts*1000);
		if($ts=='0') $ts="";else {if($ed<10)$ed='00'.$ed;elseif($ed<100)$ed='0'.$ed;};
		$newprice1="$ts $ed <img src='/img/rub-002.png' style='height:14px' alt='rur'>";
		$sklad=$row['sklad'];
		if($sklad=="0")$colorbag="bug.gif";	else $colorbag="bag.gif";
		$info="&nbsp;";
		$ida=$row['ida'];$id=$row['id'];$realname=$ida; $perem=$row['Imagefile'];$vid=$row['Vid'];$tip=$row['Tip'];
		$picture=$row['Picture'];$form=$row['Form'];$brandid=$row['factory'];$engvid=$row['videnglish'];$engtip=$row['tipenglish'];
		$Height=$row['Height'];		$Capacity=$row['Capacity'];		$Diameter=$row['Diameter'];$Width=$row['Width'];
		$TipOfMaterial=$row['TipOfMaterial'];$flashbackcolor='red';$backcolor='blue';
		$Person=$row['Person'];$Predmetov=$row['Predmetov'];$AutorPicture=$row['AutorPicture'];
		$frontname=MakeFrontName($rowname,$vid,$tip,$picture,$form,$TipOfMaterial,$Person,$Predmetov,$AutorPicture,
		$Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
		$bottomname=MakeBottomName($brandid,$newprice1,$language);//return $bottomname;
		if($perem=='/icons/noimage.jpg') $imginsert="";
		else $imginsert="<img width='100%' src='$perem'>";
		if($i<=3) $sti="padding-right:10px;";else $sti='';$Prov=ProverkaNal($id,'5');
		if(($Prov=='0') and ($pobeda=='1')) {$i=$i-1;echo'1';} else $echo.="<td class='ifzshop' style='$sti'>
		<table  cellpadding='0' cellspacing='0' class='cat'><tr><td class='cat1'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$frontname</a></td></tr>
		<td class='cat2'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$imginsert</a></td></tr>
		<td class='cat3'>$bottomname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='".aPSID("/set.php?oper=add_tov&tov_id=$id&language=$language")."' id='ishop$id' target='market' id='ishop' >$strbask </a>
		</td></tr></table></td>";
		if ($i++>2){$i=1;$j++;$echo.="</tr><tr>";}////////////////////////>>>>>>>>>>$SQLZapros///////////
		}
};
		while($j++<3)	$echo.="<td style='background-color:#FFFFFF;' ></td>";
		$echo.="</tr><tr>";
if($numberofpages<$countquery1 and $numberofpages>0) {
	$bhref="$stroka_sort/sortbycost";//$firstpage$numberofpages'>Цене</a>";
	$echo.="<td colspan='3' style='padding-top:30px;text-align:center;height:40px;'>
	 <table align='center' cellpadding='2' cellspacing='10'><tr>";
	$echo.=" <td width='44%'>&nbsp;</td>";
	//$echo.=" <td><a href='/' target='self'><figure style='padding:20px;  height: 40px;  width: 15%; vertical-align:middle;background-color:#EEEEEE;text-align:center;'>Предыдущая</figure></a></td>";
	$npage=0;$addecho='';
while($npage*$numberofpages<$countquery1)
{//<button name='btnp$npage' value='yes' formaction=='".$bhref.$addprn.$npage.$numberofpages.$ShAll."' form='FFilter' >$npage</button> 
//onclick='FFilter.submit()'
	if($npage++<9)$addprn='0'; else $addprn="";
	$echo.=" <td width='1%' style='height: 40px;background-color:#FFFFFF;text-align:center;'>";
	if($npage==$firstpage)  $echo.="<figure style='width: 5px;height: 30px;  padding-left:10px; padding-bottom:5px;padding-right:10px;padding-top:12px; margin:0px; 
			vertical-align:middle;font-size:18px;'><b>".$npage."</b></figure>";
	else $echo.="<input width='15' height='15' type='submit' name='npage'  value='$npage'>";
	//<a href='".$bhref.$addprn.$npage.$numberofpages.$ShAll."' target='_self' style=''>
	//<figure style='width: 5px;height: 30px; padding:10px; margin:0px; vertical-align:middle;font-size:18px;'>".$npage."</figure></a>
	//onclick='FFilter.submit();' //formaction='".$bhref.$addprn.$npage.$numberofpages.$ShAll."' 
//	else $echo.="<td onClick='document.forms.FFilter.submit();go_top(\"".$bhref.$addprn.$npage.$numberofpages.$ShAll."\";)' >
//	<figure style='width: 5px;height: 30px; padding:10px; margin:0px; vertical-align:middle;font-size:18px;'>".$npage."</figure></td>";
	$echo.="</td>";
	if(round($npage/15)==$npage/15){$echo.="<td width='44%'>&nbsp;</td></tr><tr><td width='44%'>&nbsp;</td>";$addecho="<td width='15%' colspan='15'>&nbsp;</td>";}
};
	// $echo.="<td><a href='/' target='self'><figure style='padding:20px;  height: 40px;  width: 15%; vertical-align:middle;background-color:#EEEEEE;text-align:center;'>Следующая</figure></a></td>";
	$echo.=" $addecho<td width='44%'>&nbsp;</td></tr></table></td>";
	}
mysqli_free_result($query1);
return $echo;
}
?>