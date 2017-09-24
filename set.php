<?php
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
session_start();
global $userid;global $idd;
$userid=get_s_var('userid');$idd=get_s_var('idd');$page=sqlp(get_var('page'));
$oper=GET('oper');

if($oper==""){
	new_header("Location:index.php");
	exit;
}

function go_box_fr2M2($language){if($language=="en") new_header("Location:en/cabinet/basket"); 
else new_header("Location:cabinet/basket");}

function go_box_fr2($language){
	if($language=="en") $langstr='?language=en'; else $langstr='';
	if(get_var('where_go')!=""){
		new_header("Location:".get_var('where_go'));
		set_var('where_go','');
	}
	else 
	new_header("Location:market2.php$langstr");
}
switch($oper){
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
	case "add_tov":	// добавить товар в текцщий заказ//18012006
	save_userid();
	global $userid;
	$language=GET('language');
	$userid=get_s_var('userid');
	if($userid==""){echo "Обновите страницу, для добавления товара в корзину. К сожалению, сеанс связи устарел.";exit;}
	set_var("pick","add");
	set_var("pick_what","");
	$kol=1;
	$tov_id=GET('tov_id');
	//echo $tov_id;
	$q=explode("/",$tov_id);
	for($i=0;$i<count($q);$i++){
		$tov_id=$q[$i]; 
		if($tov_id==""){echo "не указан код добавляемого товара";exit;}  
		$r=sql("SELECT boxidd FROM box WHERE tov_id='$tov_id' AND idd='$idd' AND userid='$userid'");
		if(mysqli_num_rows($r)>0){//добавляем количество
			$row = mysqli_fetch_array($r);
			$r=sql("UPDATE box SET kol=kol+$kol WHERE boxidd='".$row['boxidd']."'");
			mysqli_free_result($r);
		}
		else{//добавляем новый
			$shid=whichshop();$rO=sql("SELECT boxid FROM box WHERE shopid='$shid' ORDER BY boxid DESC LIMIT 1");
			$row0= mysqli_fetch_array($rO);$boxidMAX=(integer)$row0['boxid'];$boxidMAX=$boxidMAX+1;$boxidd=$shid."/".$boxidMAX;
			sql("INSERT INTO box (boxidd,idd,boxid,shopid,tov_id,kol,userid,comp_id) VALUES ('$boxidd','$idd',$boxidMAX,'$shid','$tov_id',$kol,'$userid',$comp_id)");
			mysqli_free_result($rO);
		}
	}
	
	
	go_box_fr2($language);			
	exit;
	break;
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	case "sub_tov"://вычесть товар из корзины (только одну единицу)2017
	$boxid=GET('boxid');
	$kol=(integer)GET('kol');
	$language=GET('language');
	//if ($kol==0) $kol=1;
	if($boxid==""){echo "не указан код удаляемого товара";exit;}
	if($userid==""){echo "Не могу добавить товар в вашу корзину. не ицициализирован сеанс.";exit;}
	$r=sql("SELECT boxidd FROM box WHERE boxid='$boxid' AND userid='$userid'");
	if(mysqli_num_rows($r)>0)sql("UPDATE box SET kol=kol-1 WHERE boxid='$boxid'  AND userid='$userid'" );
	sql('DELETE FROM box WHERE (kol<=0)');
	mysqli_free_result($r);
	go_box_fr2M2($language);
	break;
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	case "del_tov"://вычесть товар из корзины (только одну единицу)31082015
	$boxid=GET('boxid');
	$language=GET('language');
	if($boxid==""){echo "не указан код удаляемого товара";exit;}
	if($userid==""){echo "Не могу добавить товар в вашу корзину. не ицициализирован сеанс.";exit;}
	$r=sql("SELECT boxid FROM box WHERE boxid='$boxid' AND userid='$userid'");
	if(mysqli_num_rows($r)>0)   sql("DELETE FROM box WHERE boxid='$boxid' AND userid='$userid'");   
	mysqli_free_result($r);
	go_box_fr2M2($language);  
	break; 
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	case "add_tovs"://вычесть товар из корзины (только одну единицу)31082015
	$boxid=GET('boxid');
	$language=GET('language');
	$kol=(integer)GET('kol');
	//if ($kol==0) $kol=1;
	if($boxid==""){echo "не указан код удаляемого товара";exit;}
	if($userid==""){echo "Не могу добавить товар в вашу корзину. не ицициализирован сеанс.";exit;}
	$r=sql("SELECT boxidd FROM box WHERE boxid='$boxid' AND userid='$userid'");
	if(mysqli_num_rows($r)>0)sql("UPDATE box SET kol=kol+1 WHERE boxid='$boxid'  AND userid='$userid'" );
	mysqli_free_result($r);
	go_box_fr2M2($language);
	break;
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



}
?>