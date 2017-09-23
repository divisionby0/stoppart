<?php
require_once ("box_func.php");
function xml_tovs(){
}
function test_group($id,$field){
	//echo"тест группа ".$id."<br>";
	$r=sql('SELECT * FROM tovsNew WHERE idg="'.$id.'" AND ('.$field.'=1 OR grp=1)');
	if(mysqli_num_rows($r)==0){//echo "Пустая<br>";
		return 0;
	}
	$found=0;
	while($row = mysqli_fetch_array($r)){ 
		if($row['grp']==1) $found+=test_group($row['id'],$field);//считаем сколько у нас в группе чего
		else $found++;//это товар нашли
	}
	if($id!=""){//вот и посмотрим пустая у нас группа или нет
		if($found>0) $val="1";
		else $val="0";
		sql('UPDATE tovsNew SET '.$field.'='.$val.' WHERE id="'.$id.'"');
		//echo"Группа ".$id." установлена в $val и содержит $found позиций<br>";
	}
	mysqli_free_result($r);
	return $found;
}
function sql_to_xml_line($r,$row){
	$ans="";
	$fields=mysql_num_fields($r);
	for($j=0;$j<$fields;$j++){
		$name=mysql_field_name($r,$j);
		$val=$row[$name];
		if("".$val!=""){
			$ans.=' '.$name.'="'.sqlp($val).'"';
		}
	}
	return $ans;
}
function sql_to_xml_array($r,$tag){
	$ans="";
	$i=0;
	$fields=mysql_num_fields($r);
	while($row = mysqli_fetch_array($r)){
		$ans.="<".$tag.$i++;
		for($j=0;$j<$fields;$j++){
			$name=mysql_field_name($r,$j);
			$val=$row[$name];
			if("".$val!=""){
				$ans.=' '.$name.'="'.sqlp($val).'"';
			}
		}
		$ans.='/>';
	}
	return $ans;
}
if($_GET['adminpass']!="f4gY7gJJ8uHb9GtR9fGT4yh55NJU"){
	echo "wrong password";
	exit;
}
//а теперь выдаем на гора	
require_once ("sql.php");
$oper=$_GET['oper'];
switch($oper){
	case "TS":
	//	sql("DROP TABLE IF EXISTS quants2");
	//   $r=sql('DELETE FROM quants WHERE kol="0"'); 
	//   $ans= ("ok test");
	sql('UPDATE tovsNew SET zakaz="0", sklad="0" WHERE ((now()-date)>60*60*24)'); 
	break;
	case "getorders":
	# в $xml записан XML документ
	//Header( 'HTTP/1.1 200 OK' );
	$ans="";$ans.='<?xml version="1.0" encoding="windows-1251"?><КоммерческаяИнформация><ЗаявкиПокупателя>';
	$all=$_GET['all'];
	if($all=="1")$r=sql("SELECT *,date_format(date, '%d.%m.%Y') AS data_doc FROM orders");
	else 		  $r=sql("SELECT *,date_format(date, '%d.%m.%Y') AS data_doc FROM orders WHERE sync=0");
	$i=0;
	$fields=mysql_num_fields($r);
	while($row = mysqli_fetch_array($r)){
		$idd=$row['idd'];
		$ans.= '<num'.$i." ".sql_to_xml_line($r,$row).">";
		$userid=$row['userid'];
		$ans.="<ТЧ>"; // $q="SELECT boxidd FROM box WHERE orderid=$cur_box AND userid='$userid'";//$Puserid
		$r2=sql("SELECT box.tov_id,box.kol,tovsNew.price,box.summa FROM box INNER JOIN tovsNew ON box.tov_id = tovsNew.id WHERE box.idd='$idd' AND box.userid='$userid'");
		$ans.=sql_to_xml_array($r2,"line");
		mysqli_free_result($r2); 
		$ans.= '</ТЧ>';
		//теперь адрес
		if($row['addres']!='0'){
			$q3=("SELECT * FROM addres WHERE charid='".$row['addres']."' LIMIT 1");
			$r3=sql($q3);
			if(mysqli_num_rows($r3)==0) $addres='Адрес="'.$row['addres2'].'"';
			else{ 
				$row3 = mysqli_fetch_array($r3);
				switch($row3['rayon']){
					case "central":$rayon="г. Тольятти, ТОЦ «Гранд Сити», Новый проезд, 3";break;
					case "vlada":$rayon="г. Тольятти, ТК «Капитал», ул. Дзержинского, 21";break;
					case "mindal":$rayon="г. Тольятти, ТЦ «Миндаль», ул. 70 лет октября, дом 56";break;
					case "rus":$rayon="г. Тольятти, ТЦ «Русь», ул. Революционная, 52а";break;
					case "pobeda":$rayon="г. Тольятти, ул. Победы, 78";break;
					case "koms":$rayon="г. Тольятти, универмаг «Комсомольский», ул. Лизы Чайкиной, 85";break;
					case "samara":$rayon="г. Самара, ТЦ «Русь», Московское шоссе, дом 15б";break;
					case"avt":$rayon="Автозаводский район г. Тольятти";break;
					case"cen":$rayon="Центральный р-н. г. Тольятти";break;
					case"komsa":$rayon="Комсомольский р-н. г. Тольятти";break;
					case"sam":$rayon="г. Самара";break;
					case"other":$rayon="Район не указан,";break;
					default:$rayon=$row3['rayon'];
				}
				$addres= 'Адрес="'.sqlp($rayon.' '.$row3['street'].' д:'.$row3['house'].' кв(офис):'.$row3['room'].' '.$row3['dopaddr']).'"';
			} 
			mysqli_free_result($r3); 
		}
		else{$addres= 'Адрес="'.$row['addres2'].'"';}
		//сам контрагент
		$contragent_tip=$row['contragent_tip'];
		$addres.=" contragent_tip=\"$contragent_tip\"";
		if($contragent_tip=="fl" or $contragent_tip=="ul" or $contragent_tip=="chp"){
			$q3=("SELECT * FROM user_$contragent_tip WHERE idd='".$row['contragent']."' LIMIT 1");
			$r3=sql($q3);
			if(mysqli_num_rows($r3)==0) $ans.= "<Контрагент $addres/>";
			else{$row3 = mysqli_fetch_array($r3);$ans.= '<Контрагент '.sql_to_xml_line($r3,$row3)." $addres/>";} 
			mysqli_free_result($r3); 
		}
		else{$ans.= "<Контрагент $addres/>";}
		$ans.='</num'.$i.'>';
		$i++; 
	} 
	mysqli_free_result($r); 
	$ans.='</ЗаявкиПокупателя></КоммерческаяИнформация>';
	Header( 'Content-Length: '.strlen($ans) );
	Header( 'Content-type: text/xml' );
	echo $ans;
	break;
	case"confirm":
	//получено подтверждение от 1С
	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq);
	$i=0;
	while($i < $num){
		$idd=sqlp($qq[$i++]);
		$q=("UPDATE orders SET sync=1 WHERE idd='$idd'\r\n");
		//echo $q;
		sql($q);
	}
	echo ("OK");
	break;
	case"complects":
	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq);
	sql ("DELETE FROM complects");
	$i=0;
	while($i < $num){
		$test=sqlp($qq[$i++]);
		if($test=="owner"){
			$line=0;
			$owner=sqlp($qq[$i++]);
			$item=sqlp($qq[$i++]);
		}
		else $item=$test;
		$kol=sqlp($qq[$i++]);
		$cen=sqlp($qq[$i++]);
		$line++;
		$q=("INSERT INTO complects (line,owner,item,kol,price) VALUES ($line,'$owner','$item',$kol,$cen)\r\n");
		sql($q);
	}
	echo ("OK");
	break;
	case"postorders":
	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq);
	//сначала стираем все лишние записи в box
	//sql("DELETE FROM box WHERE (SELECT box.boxid FROM box LEFT JOIN orders ON box.orderid = orders.orderid WHERE (((orders.orderid) Is Null)))");
	$cur_num="";
	for($i = 0; $i < $num;){
		$id=sqlp($qq[$i++]);
		if($id=="doc"){//this is a doc
			$shopid=sqlp($qq[$i++]);//первая строчка - номер филиала
			$docid=sqlp($qq[$i++]);//затем номер документа
			$status=sqlp($qq[$i++]);//и статус заказа
			$str="SELECT orderid,shopid,docid FROM orders WHERE (shopid='$shopid' AND docid=$docid)";
			$r=sql($str);
			if(mysqli_num_rows($r)==0){//новая запись
				sql("INSERT INTO orders (shopid,docid,status,date) VALUES('$shopid','$docid','$status',NOW())");
				$orderid=mysql_insert_id();
				//echo "doc $shopid/$docid новый с ид= $orderid\n\r";
			}
			else{//такой документ есть на сайте. снесем все про него
				$row = mysqli_fetch_array($r);
				$orderid=$row['orderid'];
				sql("UPDATE orders SET status='$status' WHERE orderid='$orderid'");
				sql("DELETE FROM box WHERE orderid='$orderid'");
				//echo "doc $shopid/$docid НАШЛИ с ид= $orderid\n\r";
			}
		}
		else{// line of doc
			$tov=$id;
			$kol=sqlp($qq[$i++]);
			$cen=sqlp($qq[$i++]);
			//echo("INSERT INTO box (boxid, comp_id ,orderid ,tov_id,kol,price) VALUES ('','','$orderid','$tov',$kol,$cen)\n");
			sql("INSERT INTO box (boxid, comp_id ,orderid ,tov_id,kol,price) VALUES ('','','$orderid','$tov',$kol,$cen)");
		}
	}
	echo ("OK");
	break;
	case"tovs_begin":
	//sql("UPDATE users SET familia = 'Кошель' WHERE familia = 'Кошель..'");
	MakePrice("all");
	//MakePrice("kaz");
	//MakePrice("tlt");
	//MakePrice("sar");
	//MakePrice("ufa");
	//MakePrice("sam");
	//	sql("DROP TABLE IF EXISTS tovs2");
	//	sql("COMMIT");
	//    sql('CREATE TABLE tovs2 AS SELECT * FROM tovs'); 
	//    sql('UPDATE tovs2 SET zakaz="0", sklad="0" WHERE ((now()-date)>60*5)  '); 
	//	sql("COMMIT");
	echo ("OK");       
	break;
	case"tovs_fix":
	//	sql("DROP TABLE tovs");
	//	sql("COMMIT");
	//	sql("RENAME TABLE tovs2 TO tovs"); 
	//	sql("COMMIT");
	//	sql("DROP TABLE IF EXISTS tovs2");
	echo ("OK");       
	break;
	case"tovsOld":
	sql('UPDATE tovsNew SET zakaz="0", sklad="0" WHERE 1=1');
	//	sql("COMMIT");
	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq);
	for($i = 0; $i < $num;){
		$q="REPLACE INTO tovsNew (id,idg,ida,name,price,price1s,grp,tip,prim,quant,zakaz,sklad,bu,Collection,Picture,Form,Vid,Person,Predmetov) 
		VALUES (
		'".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."',
		'".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."',
		'".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."',
		'".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."')\r\n";
		$i++;$i++;//21 строка
		sql($q);
	}
	echo ("OK");
	break;
	case"tovs":
	sql('UPDATE tovsNew SET zakaz="0", sklad="0" WHERE 1=1');
	//	sql("COMMIT");
	//$PRRid='OOO';
	$lines = file('http://www.ifarfor.ru/tovs.txt');//2017
	$qq = array();
	foreach($lines as $line_num => $line){
		// echo "Строка #<b>{$line_num}</b> : " .rtrim($line) . "<br />\n";//htmlspecialchars(
		$qq[$line_num]=$line;
	}
	//	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq);
	for($i = 0; $i < $num;){
		$Pid=sqlp($qq[$i++]);//1
		$Pidg=sqlp($qq[$i++]);//2
		$Pida=sqlp($qq[$i++]);//3
		$Pname=sqlp($qq[$i++]);	//4
		if( $i < 500){$PRRid.=$i.$Pname;	}
		if($Pname=='Не определен!' or $Pname=='Не определен')$Pname='';	
		$Pprice=sqlp($qq[$i++]);	//5
		$Pprice1s=sqlp($qq[$i++]);	//6
		$Pgrp=sqlp($qq[$i++]);	//7
		$Ptip=sqlp($qq[$i++]);	//Родитель=Родитель.Родитель;Текст.ДобавитьСтроку(Родитель1);//tip   8
		$Pquant=sqlp($qq[$i++]);	//9
		$Pzakaz=sqlp($qq[$i++]);	//10
		$Psklad=sqlp($qq[$i++]);	//11
		$PWidth=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Ширина);12
		$PHeight=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Высота);13
		$PCapacity=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Объем);14
		$PForm=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Форма);Form` varchar(30) character set cp1251 default NULL15
		if($PForm=='Не определен!' or $PForm=='Не определен')$PForm='';	
		$PPicture=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Рисунок);Picture` varchar(30) character set cp1251 default NULL,16
		if($PPicture=='Не определен!' or $PPicture=='Не определен')$PPicture='';
		$PMetodOfMade=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.МетодИзготовления);`Vid` varchar(10) character set cp1251 default NULL,//17
		$PTipOfMaterial=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ТипМатериала);Tip` varchar(21) character set cp1251 default NULL, 18
		$PFactory=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Изготовитель);Factory` varchar(30) character set cp1251 default NULL,19
		$Pkomplekt=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Комплект);20
		$PmemberID1=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта01);21
		$PmemberID2=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта02);22
		$PmemberID3=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта03);23
		$PmemberID4=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта04);24
		$PmemberID5=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта05);25
		$PmemberID6=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта06);26
		$PmemberID7=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта07);27
		$PmemberID8=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта08);28
		$PmemberID9=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта09);29
		$PmemberID10=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта010);30
		$PmemberID11=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.СоставКомплекта011);31
		$PmemberQuant1=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта01);32
		$PmemberQuant2=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта02);33
		$PmemberQuant3=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта03);34
		$PmemberQuant4=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта04);35
		$PmemberQuant5=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта05);36
		$PmemberQuant6=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта06);37
		$PmemberQuant7=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта07);38
		$PmemberQuant8=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта08);39
		$PmemberQuant9=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта09);40
		$PmemberQuant10=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта010);41
		$PmemberQuant11=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.КолКомплекта011);42
		$PDiameter=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Диаметр);43
		$PPerson=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Персон);44
		$PPredmetov=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Предметов);45
		$PCovering=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Покрытие);46
		$PTipAss=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ТипАссортимента);47
		$PTip=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ТипИзделия);48
		//$PTip='ho';
		$PVid=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ВидИзделия);49
		$PAutorForm=sqlp($qq[$i++]);	//	  `AutorForm` varchar(30) character set cp1251 default NULL,  50
		$PAutorPicture=sqlp($qq[$i++]);	//  `AutorPicture` varchar(30) character set cp1251 default NULL,51
		$PAutorFormEnglish=sqlp($qq[$i++]);	//	  `AutorForm` varchar(30) character set cp1251 default NULL,  50
		$PAutorPictureEnglish=sqlp($qq[$i++]);	//  `AutorPicture` varchar(30) character set cp1251 default NULL,51
		$PStrana=sqlp($qq[$i++]);	// `Strana` varchar(15) character set cp1251 default NULL,52
		$PRstyle=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Комплект);53
		$PNY=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.НовыйГод);54
		$PInLove=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Влюбленный);55
		$PPancakeWeek=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Масленица);56
		$PEaster=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Пасха);57
		$PVictoryDay=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ДеньПобеды);58
		$PDefenderDay=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ЗащитникОтечества);59
		$PWomanDay=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ЖенскийДень);60
		$PWedding=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.Свадьба);61
		$PTeacherDay=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ДеньУчителя);62
		$PBirthday=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ДеньРождения);63
		$PKids=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ДеньРождения);63
		$PLiterature=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ДеньРождения);63
		$PTheatre=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ДеньУчителя);62
		$PFlower=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ДеньРождения);63
		$PPeterburg=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ДеньУчителя);62
		$PMoscow=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку(Спр.ДеньРождения);63
		$PEnglish=sqlp($qq[$i++]);		
		$PMaterialEnglish=sqlp($qq[$i++]);	//+
		$PFormEnglish=sqlp($qq[$i++]);	//+
		$PPictureEnglish=sqlp($qq[$i++]);	//+
		$PTipEnglish=sqlp($qq[$i++]);//$PTipEnglish='.';	
		$PVidEnglish=sqlp($qq[$i++]);	
		/*$PFactoryEnglish=sqlp($qq[$i++]);	//+*/
		$Pustyshka=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку("");//профилактика 20 52
		$Pustyshka=sqlp($qq[$i++]);	//Текст.ДобавитьСтроку("");//профилактика 21 */  idd varchar(17),53
		//	if($Pkomplekt=="")$Pkomplekt=0;
		//	if($PmemberQuant11=="")$PmemberQuant11=0;
		/*    create("picture"); 
		create("form"); 
		create("creator");
		create("brand");
		create("material");*/
		switch($PVid){
			case "Сервиз":
			switch($PTip){
				case "чайн.": $PTip="чайный";break;
				case "кофейн.": $PTip="кофейный";break;
				case "стол.": $PTip="столовый";break;
				default: break;
			}
			break;
			default: $PTip=$PTip;break;
		}
		switch($PForm){
			case "Молодежная 1":
			$PForm="Молодежная";	break;
			default: break;
		}
		/*
		switch($PTipOfMaterial)
		{
		case "костяной":$PTipOfMaterial="Костяной фарфор.";	break;
		case "Костяной фарфор":$PTipOfMaterial="Костяной фарфор.";	break;
		case "Фр костяной":$PTipOfMaterial="Костяной фарфор.";	break;
		case "твердый":$PTipOfMaterial="Твердый фарфор.";	break;
		case "Фр твердый":$PTipOfMaterial="Твердый фарфор.";	break;
		case "Твердый фарфор":$PTipOfMaterial="Твердый фарфор.";	break;
		case "<>":$PTipOfMaterial="";	break;
		case "мягкий":$PTipOfMaterial="Мягкий фарфор.";	break;
		case "Мягкий фарфор":$PTipOfMaterial="Мягкий фарфор.";	break;
		default: break;
		}*/
		$ida=$row['ida'];
		$id=$row['id'];
		$id_crop = substr($Pida, 2,5);
		if(substr($Pida, 0,1)=='8') $id_crop = substr($Pida, 2,5);
		else $id_crop = substr($Pida, 0,1).substr($Pida, 2,5);
		$filename0 ="ico/".$Pida.".jpg";		
		$filename ="images/".$id_crop."_resize.jpg";
		$filename2 ="images/".$id_crop."_resize.JPG";
		$filename3 ="images/".$id_crop.".jpg";
		$filename4 ="foto/".$Pida.".jpg";		
		if(file_exists($filename0)) $perem="/".$filename0;
		elseif(file_exists($filename)) $perem="/".$filename;
		elseif(file_exists($filename2)) $perem="/".$filename2;
		elseif(file_exists($filename3)) $perem="/".$filename3;
		elseif(file_exists($filename4)) $perem="/".$filename4;		
		else $perem="/icons/noimage.jpg";
		sql("INSERT IGNORE INTO picture (name) VALUES ('".$PPicture."')");$r=sql("SELECT id FROM picture WHERE name='".$PPicture."'");
		$row=mysqli_fetch_array($r);$idPPicture=$row[id];
		sql("UPDATE picture SET English = '$PPictureEnglish' WHERE id = '$idPPicture'");
		sql("INSERT IGNORE INTO form (name) VALUES ('$PForm')");$r=sql("SELECT id FROM form WHERE name='$PForm'");
		$row=mysqli_fetch_array($r);$idPForm=$row[id];
		sql("UPDATE form SET English = '$PFormEnglish' WHERE id = '$idPForm'");
		sql("INSERT IGNORE INTO creator (name) VALUES ('$PAutorPicture')");$r=sql("SELECT id FROM creator WHERE name='$PAutorPicture'");
		$row=mysqli_fetch_array($r);$idPAutorPicture=$row[id];
		sql("UPDATE creator SET english = '$PAutorPictureEnglish' WHERE id = '$idPAutorPicture'");
		sql("INSERT IGNORE INTO creator (name) VALUES ('$PAutorForm')");$r=sql("SELECT id FROM creator WHERE name='$PAutorForm'");
		$row=mysqli_fetch_array($r);$idPAutorForm=$row[id];
		sql("UPDATE creator SET english = '$PAutorFormEnglish' WHERE id = '$idPAutorForm'");
		sql("INSERT IGNORE INTO brand (name,Strana) VALUES ('$PFactory','$PStrana')");$r=sql("SELECT id FROM brand WHERE name='$PFactory'");
		$row=mysqli_fetch_array($r);$idPFactory=$row[id];
		sql("UPDATE brand SET English = '$PFactoryEnglish' WHERE id = '$idPFactory'");
		sql("INSERT IGNORE INTO material (name) VALUES ('$PTipOfMaterial')");$r=sql("SELECT id FROM material WHERE name='$PTipOfMaterial'");
		$row=mysqli_fetch_array($r);$idPTipOfMaterial=$row[id];
		sql("UPDATE material SET English = '$PMaterialEnglish' WHERE id = '$idPTipOfMaterial'");
		if($PEnglish==""){$PEnglish="$PTipEnglish $PVidEnglish $PFormEnglish $PPictureEnglish $PAutorPictureEnglish";
			if($PPerson!='' and $PPredmetov!='' and $PPerson!='1' and $PPredmetov!='1' and $PPerson!='0' and $PPredmetov!='0') $PEnglish.=' '.$PPerson.'/'.$PPredmetov;
		}
		$Pname=str_replace ("/"," ", $Pname);
		$Pname=str_replace (","," ", $Pname);
		$Pname=str_replace ("  "," ", $Pname);
		$Pname=str_replace ("Не определен!","", $Pname);
		$Pname=str_replace ("Не определен","", $Pname);
		$Pname = str_replace("\r", "", $Pname); // удаляем переносы
		$Pname = str_replace("\n", "", $Pname); // удаляем переносы
		$Plowername=mb_strtolower($Pname);
		$q="REPLACE INTO tovsNew (id,idg,ida,name,price,price1s,grp,tip,quant,zakaz,sklad,Picture,Form,Vid,Factory,komplekt,
		AutorForm,AutorPicture,MetodOfMade,TipOfMaterial,Covering,Diameter,Person,Predmetov,Width,Height,Capacity,
		memberID1,memberID2,memberID3,memberID4,memberID5,memberID6,memberID7,memberID8,memberID9,memberID10,memberID11,
		memberQuant1,memberQuant2,memberQuant3,memberQuant4,memberQuant5,memberQuant6,memberQuant7,memberQuant8,
		memberQuant9,memberQuant10,memberQuant11,RStyle,NY,InLove,PancakeWeek,Easter,VictoryDay,DefenderDay,WomanDay,
		Wedding,TeacherDay,Birthday,Literature,Theatre,Flower,Peterburg,Moscow,TipAss,Imagefile,Kids,tipenglish,videnglish,english,lowername)
		VALUES ('$Pid','$Pidg','$Pida','$Pname','$Pprice','$Pprice1s','$Pgrp','$PTip','$Pquant','$Pzakaz','$Psklad',
		'$idPPicture','$idPForm','$PVid','$idPFactory','$Pkomplekt',
		'$idPAutorForm','$idPAutorPicture','$PMetodOfMade','$idPTipOfMaterial','$PCovering',
		'$PDiameter','$PPerson','$PPredmetov','$PWidth','$PHeight','$PCapacity','$PmemberID1','$PmemberID2','$PmemberID3',
		'$PmemberID4','$PmemberID5','$PmemberID6','$PmemberID7','$PmemberID8','$PmemberID9','$PmemberID10','$PmemberID11',
		'$PmemberQuant1','$PmemberQuant2','$PmemberQuant3','$PmemberQuant4','$PmemberQuant5','$PmemberQuant6','$PmemberQuant7',
		'$PmemberQuant8','$PmemberQuant9','$PmemberQuant10','$PmemberQuant11','$PRstyle','$PNY','$PInLove','$PPancakeWeek',
		'$PEaster','$PVictoryDay','$PDefenderDay','$PWomanDay','$PWedding','$PTeacherDay','$PBirthday',
		'$PLiterature','$PTheatre','$PFlower','$PPeterburg','$PMoscow','$PTipAss','$perem','$PKids','$PTipEnglish','$PVidEnglish','$PEnglish','$Plowername')\r\n";
		sql($q);
		if($PFactory=='Stoppard' and $PVid=="Декоративная тарелка" )//and $PDiameter==200
			{//1
			if($PDiameter==200) $NeedId=$Pid; else $NeedId=substr($Pid, 0, -1);
			if($PDiameter==200 or $PDiameter==260) {//2
				$r=sql("SELECT * FROM tovsNew WHERE id='".$NeedId."S'");    
      			if(mysqli_num_rows($r)==0){//3
        $q="REPLACE INTO tovsNew (id,idg,ida,name,price,price1s,grp,tip,quant,zakaz,sklad,Picture,Form,Vid,Factory,komplekt,
		AutorForm,AutorPicture,MetodOfMade,TipOfMaterial,Covering,Diameter,Person,Predmetov,Width,Height,Capacity,
		memberID1,memberID2,memberID3,memberID4,memberID5,memberID6,memberID7,memberID8,memberID9,memberID10,memberID11,
		memberQuant1,memberQuant2,memberQuant3,memberQuant4,memberQuant5,memberQuant6,memberQuant7,memberQuant8,
		memberQuant9,memberQuant10,memberQuant11,RStyle,NY,InLove,PancakeWeek,Easter,VictoryDay,DefenderDay,WomanDay,
		Wedding,TeacherDay,Birthday,Literature,Theatre,Flower,Peterburg,Moscow,TipAss,Imagefile,Kids,tipenglish,videnglish,english,lowername)
		VALUES ('".$NeedId."S','$Pidg','".$NeedId."S','$Pname','950','950','$Pgrp','$PTip','$Pquant','$Pzakaz','$Psklad',
		'$idPPicture','$idPForm','$PVid','$idPFactory','$Pkomplekt',
		'$idPAutorForm','$idPAutorPicture','$PMetodOfMade','$idPTipOfMaterial','$PCovering',
		'150','$PPerson','$PPredmetov','$PWidth','$PHeight','$PCapacity','$PmemberID1','$PmemberID2','$PmemberID3',
		'$PmemberID4','$PmemberID5','$PmemberID6','$PmemberID7','$PmemberID8','$PmemberID9','$PmemberID10','$PmemberID11',
		'$PmemberQuant1','$PmemberQuant2','$PmemberQuant3','$PmemberQuant4','$PmemberQuant5','$PmemberQuant6','$PmemberQuant7',
		'$PmemberQuant8','$PmemberQuant9','$PmemberQuant10','$PmemberQuant11','$PRstyle','$PNY','$PInLove','$PPancakeWeek',
		'$PEaster','$PVictoryDay','$PDefenderDay','$PWomanDay','$PWedding','$PTeacherDay','$PBirthday',
		'$PLiterature','$PTheatre','$PFlower','$PPeterburg','$PMoscow','$PTipAss','$perem','$PKids','$PTipEnglish','$PVidEnglish','$PEnglish','$Plowername')\r\n";
		sql($q);	
			    } 	//3
			}		//2
		if($PDiameter==150 or $PDiameter==260) {//2
				$r=sql("SELECT * FROM tovsNew WHERE id='".$NeedId."'");    
      			if(mysqli_num_rows($r)==0){//3
        $q="REPLACE INTO tovsNew (id,idg,ida,name,price,price1s,grp,tip,quant,zakaz,sklad,Picture,Form,Vid,Factory,komplekt,
		AutorForm,AutorPicture,MetodOfMade,TipOfMaterial,Covering,Diameter,Person,Predmetov,Width,Height,Capacity,
		memberID1,memberID2,memberID3,memberID4,memberID5,memberID6,memberID7,memberID8,memberID9,memberID10,memberID11,
		memberQuant1,memberQuant2,memberQuant3,memberQuant4,memberQuant5,memberQuant6,memberQuant7,memberQuant8,
		memberQuant9,memberQuant10,memberQuant11,RStyle,NY,InLove,PancakeWeek,Easter,VictoryDay,DefenderDay,WomanDay,
		Wedding,TeacherDay,Birthday,Literature,Theatre,Flower,Peterburg,Moscow,TipAss,Imagefile,Kids,tipenglish,videnglish,english,lowername)
		VALUES ('$NeedId','$Pidg','$NeedId','$Pname','1090','1090','$Pgrp','$PTip','$Pquant','$Pzakaz','$Psklad',
		'$idPPicture','$idPForm','$PVid','$idPFactory','$Pkomplekt',
		'$idPAutorForm','$idPAutorPicture','$PMetodOfMade','$idPTipOfMaterial','$PCovering',
		'200','$PPerson','$PPredmetov','$PWidth','$PHeight','$PCapacity','$PmemberID1','$PmemberID2','$PmemberID3',
		'$PmemberID4','$PmemberID5','$PmemberID6','$PmemberID7','$PmemberID8','$PmemberID9','$PmemberID10','$PmemberID11',
		'$PmemberQuant1','$PmemberQuant2','$PmemberQuant3','$PmemberQuant4','$PmemberQuant5','$PmemberQuant6','$PmemberQuant7',
		'$PmemberQuant8','$PmemberQuant9','$PmemberQuant10','$PmemberQuant11','$PRstyle','$PNY','$PInLove','$PPancakeWeek',
		'$PEaster','$PVictoryDay','$PDefenderDay','$PWomanDay','$PWedding','$PTeacherDay','$PBirthday',
		'$PLiterature','$PTheatre','$PFlower','$PPeterburg','$PMoscow','$PTipAss','$perem','$PKids','$PTipEnglish','$PVidEnglish','$PEnglish','$Plowername')\r\n";
		sql($q);	
			    } 	//3
			}		//2
		if($PDiameter==200 or $PDiameter==150) {//2
				$r=sql("SELECT * FROM tovsNew WHERE id='".$NeedId."B'");    
      			if(mysqli_num_rows($r)==0){//3
        $q="REPLACE INTO tovsNew (id,idg,ida,name,price,price1s,grp,tip,quant,zakaz,sklad,Picture,Form,Vid,Factory,komplekt,
		AutorForm,AutorPicture,MetodOfMade,TipOfMaterial,Covering,Diameter,Person,Predmetov,Width,Height,Capacity,
		memberID1,memberID2,memberID3,memberID4,memberID5,memberID6,memberID7,memberID8,memberID9,memberID10,memberID11,
		memberQuant1,memberQuant2,memberQuant3,memberQuant4,memberQuant5,memberQuant6,memberQuant7,memberQuant8,
		memberQuant9,memberQuant10,memberQuant11,RStyle,NY,InLove,PancakeWeek,Easter,VictoryDay,DefenderDay,WomanDay,
		Wedding,TeacherDay,Birthday,Literature,Theatre,Flower,Peterburg,Moscow,TipAss,Imagefile,Kids,tipenglish,videnglish,english,lowername)
		VALUES ('".$NeedId."B','$Pidg','".$NeedId."B','$Pname','2190','2190','$Pgrp','$PTip','$Pquant','$Pzakaz','$Psklad',
		'$idPPicture','$idPForm','$PVid','$idPFactory','$Pkomplekt',
		'$idPAutorForm','$idPAutorPicture','$PMetodOfMade','$idPTipOfMaterial','$PCovering',
		'260','$PPerson','$PPredmetov','$PWidth','$PHeight','$PCapacity','$PmemberID1','$PmemberID2','$PmemberID3',
		'$PmemberID4','$PmemberID5','$PmemberID6','$PmemberID7','$PmemberID8','$PmemberID9','$PmemberID10','$PmemberID11',
		'$PmemberQuant1','$PmemberQuant2','$PmemberQuant3','$PmemberQuant4','$PmemberQuant5','$PmemberQuant6','$PmemberQuant7',
		'$PmemberQuant8','$PmemberQuant9','$PmemberQuant10','$PmemberQuant11','$PRstyle','$PNY','$PInLove','$PPancakeWeek',
		'$PEaster','$PVictoryDay','$PDefenderDay','$PWomanDay','$PWedding','$PTeacherDay','$PBirthday',
		'$PLiterature','$PTheatre','$PFlower','$PPeterburg','$PMoscow','$PTipAss','$perem','$PKids','$PTipEnglish','$PVidEnglish','$PEnglish','$Plowername')\r\n";
		sql($q);	
			    } 	//3
			}		//2
			
			}//1
	}
	echo ('Y'.$PRRid);echo ("OK");
	break;
	case"tovs2":
	echo ("OK");
	break;
	case"quants":	
	sql("CREATE TABLE IF NOT EXISTS quants2(
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		tov_id CHAR(10),
		shopid CHAR(4),
		kol INT UNSIGNED)");
	sql("CREATE TABLE IF NOT EXISTS quants(
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		tov_id CHAR(10),
		shopid CHAR(4),
		kol INT UNSIGNED)");
	$lines = file('http://www.ifarfor.ru/ostatki.txt');//2017
	$qq = array();
	foreach($lines as $line_num => $line){
		// echo "Строка #<b>{$line_num}</b> : " .rtrim($line) . "<br />\n";//htmlspecialchars(
		$qq[$line_num]=rtrim($line);
	}
	//	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq);
	for($i = 0; $i < $num;){
		$q="INSERT INTO quants2 (tov_id,shopid,kol) VALUES ('".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."')\r\n";
		sql($q);
	}
	echo ("OK");       
	break;
	case"towns":	
	//sql("DROP TABLE towns2");
	sql("DROP TABLE IF EXISTS towns");
	//sql("CREATE TABLE IF NOT EXISTS towns2(
	//id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	//OblName CHAR(50),
	//CityName CHAR(50),
	//ID INT UNSIGNED)");
	sql("CREATE TABLE IF NOT EXISTS towns(
		ID INT UNSIGNED PRIMARY KEY,
		OblName CHAR(50),
		CityName CHAR(50),
		Strana CHAR(50)
		)");
	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq);
	for($i = 0; $i < $num;){
		$q="INSERT INTO towns (ID,OblName,CityName,Strana) VALUES ('".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."','".sqlp($qq[$i++])."')\r\n";
		sql($q);
	}
	echo ("Towns OK"); 
	$reader = new XMLReader();
	if(!$reader->open("http://gw.edostavka.ru:11443/pvzlist.php","UTF-8"))
	echo("Failed to open input file gw.edostavka.ru."); 
	else{
		echo("Обновляем пункты выдачи");
		sql("DROP TABLE IF EXISTS punkts");	 
		sql("CREATE TABLE IF NOT EXISTS punkts(
			ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			CityCode INT UNSIGNED,
			City CHAR(50),
			WorkTime CHAR(50),
			Address CHAR(50),
			OblName CHAR(50),	
			Strana CHAR(30),	
			Phone CHAR(50)
			)");
		sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
			("431","Тольятти","10:00-20:00","Императорский фарфор, ул. Победы, 78","Самарская область","+79272681533","Россия")');	
		sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
			("431","Тольятти","10:00-21:00","Императорский фарфор, ул. Юбилейная, 40","Самарская область","+79272683970","Россия")');	
		sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
			("430","Самара","10:00-20:00","Императорский фарфор, ул. Фрунзе, 86","Самарская область","+79272070386","Россия")');	
		sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
			("430","Самара","10:00-21:00","Императорский фарфор, Московское ш., 15б","Самарская область","+79272070823","Россия")');	
		sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
			("424","Казань","10:00-20:00","Императорский фарфор, ул. Чернышевского, 27","Татарстан республика","+79376152799","Россия")');	
		sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
			("424","Казань","10:00-22:00","Императорский фарфор, ул. Н.Ершова, 1а","Татарстан республика","+79376151299","Россия")');	
		sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
			("256","Уфа","10:00-20:00","Императорский фарфор, ул. Карла Маркса, 25","Башкортостан республика","+79272365886","Россия")');	
		sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
			("428","Саратов","10:00-20:00","Императорский фарфор, ул. Вольская, 87","Саратовская область","+7 (8452) 46-90-70","Россия")');	
		while($reader->read()){
			$Name=iconv("UTF-8","windows-1251",$reader->getAttribute("Name"));
			if($Name!="Фиктивный" and $Name!=""){
				$citycode=iconv("UTF-8","windows-1251",$reader->getAttribute("CityCode"));
				$row=mysqli_fetch_array(sql("SELECT OblName,Strana FROM towns where id='$citycode'"));$OblName=$row['OblName'];$Strana=$row['Strana'];
				if($OblName=="")$OblName="Не определено";
				if($OblName=="АР Крым")$OblName="Крым";
				$OblName=str_replace ("обл.","область", $OblName);
				$OblName=str_replace ("респ.","республика", $OblName);
				$OblName=str_replace ("авт.","автономный", $OblName);
				$q="INSERT INTO punkts (CityCode,City,WorkTime,Address,OblName,Strana,Phone) VALUES ('$citycode','".
				iconv("UTF-8","windows-1251",$reader->getAttribute("City"))."','".
				iconv("UTF-8","windows-1251",$reader->getAttribute("WorkTime"))."','".
				iconv("UTF-8","windows-1251",$reader->getAttribute("Address"))."','$OblName','$Strana','".
				iconv("UTF-8","windows-1251",$reader->getAttribute("Phone"))."')\r\n";
				sql($q);
			}
		}
	}
	break;
	case"quants_fix":
	sql('DELETE FROM quants2 WHERE kol="0"');
	sql("DROP TABLE quants");
	//	sql('UPDATE tovs SET zakaz="0", sklad="0" WHERE ((now()-date)>60*5)  ');
	sql("RENAME TABLE quants2 TO quants"); 
	sql("DROP TABLE quants2");
	/*  
	sql("UPDATE tovs SET sklad=0");
	$r=sql("SELECT tovsNew.id, Sum(quants.kol) AS [ost] FROM tovs INNER JOIN quants ON tovsNew.id = quants.tov_id GROUP BY tovsNew.id");
	if(mysqli_num_rows($r)!=0) {
	while ($row = mysqli_fetch_array($r)){ 
	sql("UPDATE tovs SET sklad=".$row['ost']." WHERE tovsNew.id=".$row['tovsNew.id']);
	}
	}
	*/
	echo ("OK");       
	break;
	case"resort":
	//это надо вычислить как используются наши группы в разных режимах
	test_group('','zakaz');
	test_group('','sklad');
	test_group('','bu');
	echo ("OK");
	break;
	case"update_status":
	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq);
	for($i = 0; $i < $num;){
		$numer=sqlp($qq[$i++]);
		$status=sqlp($qq[$i++]);
		echo" doc:$numer status=$status";
		$q='UPDATE orders SET status="'.$status.'" WHERE orderid="'.$numer.'"';
		sql($q);
	}
	echo ("OK");
	break;
	case"get_status":
	$r=sql("SELECT * FROM orders WHERE status<>'Прочее'");	
	break;
	case "datetime":
	echo "datetime: ".date('d-m-Y H:i:s');    
	break;
	case "mod_exchange":
	$base=sqlp($_GET['base']);
	$name=sqlp($_GET['name']);
	$user=sqlp($_GET['user']);
	$to_load=(integer)sqlp($_GET['to_load']);
	$uploaded=(integer)sqlp($_GET['uploaded']);
	$confirmed=(integer)sqlp($_GET['confirmed']);
	$info=sqlp($_GET['info']);
	$cb=(integer)sqlp($_GET['cb']);
	$count=sql_count("SELECT * FROM mod_exchange WHERE base='$base'");
	Echo "count=$count";
	Echo "info=$info";
	if($count==0){
		$q=("INSERT INTO mod_exchange (base) VALUES ('$base')");
		Echo "sql=$q";
		sql($q);
	}
	if($cb==0){$q=("UPDATE mod_exchange SET to_load=$to_load,uploaded=$uploaded,confirmed=$confirmed,user='$user',date=NOW(), info='$info' WHERE base='$base'"); }
	else{$q=("UPDATE mod_exchange SET to_load_c=$to_load,uploaded_c=$uploaded,confirmed_c=$confirmed,date_с=NOW(),name='$name' WHERE base='$base'");}
	sql($q);
	echo ("OK");
	break;
	case"anketars":
	$box=sqlp($_GET['box']); 
	$r=sql("SELECT * FROM orders WHERE orderid=".$box);
	//$r=sql("SELECT * FROM orders");
	if(mysqli_num_rows($r)==0) return "Ошибка";
	$r = mysqli_fetch_array($r);
	echo $r['creditinfo'];
	break;
	case"show_order":
	$box=(integer)sqlp($_GET['box']); 
	header("");
	break;
	//////////////////////////////
	case"get_site_info":
	$ans="";
	$q=$_GET['name'];
	$fields="";
	$fieldslist="*";
	/*	if ($q=="tabel") $fieldslist="id,idd,user,shop,date,user_date";
	if ($q=="users") $fieldslist="idd,login,password,hash,imya,otchestvo,family,email,userid,orderid,prim,sendmeprice,phones,role,creditinfo,credit_filled,date";
	if ($q=="user_fl") $fieldslist="idd,userid,imya,otchestvo,family";
	if ($q=="user_ul") $fieldslist="idd,userid,ooo,brand,uradres,inn,kpp,rs,bank,boss";
	if ($q=="addres") $fieldslist="userid,rayon,street,house,room,dopaddr";
	if ($q=="") $fieldslist="";
	*/
	//	echo "SELECT $fieldslist FROM $q";
	$result2=sql("SELECT $fieldslist FROM $q");
	for($i=0;$i<mysql_num_fields($result2);$i++){
		$fields.=mysql_field_name($result2,$i);
		if($i+1<mysql_num_fields($result2)){$fields.=",";}
	}
	while($data=mysql_fetch_row($result2)){
		//$params="'".implode("','",$data). "'";
		$params="";
		foreach($data as $key => $value){$params.="'".mysql_real_escape_string($value)."',";}
		$params=substr($params, 0, -1); 		
		$ans.="replace INTO $q ($fields) VALUES($params);\r\n";
	}
	Header( 'Content-Length: '.strlen($ans));
	Header( 'Content-type: text/html');
	echo $ans;
	break;
	case"get_table":
	$ans="";
	$q=sqlp($_GET['name']);
	$key1=sqlp($_GET['key1']);
	$datakey=sqlp($_GET['datakey']);
	$fields="";
	$key1num=1;
	$datakeynum=1;
	$result2=sql("SELECT * FROM ".$q);
	for($i=0;$i<mysql_num_fields($result2);$i++){
		$fn=mysql_field_name($result2,$i);
		$fields.=$fn;
		if($fn==$key1) $key1num=$i;
		if($fn==$datakey) $datakeynum=$i;
		if($i+1<mysql_num_fields($result2)) $fields.=",";
	}
	while($data=mysql_fetch_row($result2)){
		//$params="'".implode("','",$data). "'";
		$params="";
		foreach($data as $key => $value){
			$params.="'".mysql_real_escape_string($value)."',";	
		}
		$params=substr($params, 0, -1); 
		$ans.=$key1."='".$data[$key1num]."' \r\n";		
		$ans.=$data[$datakeynum]."\r\n";		
		$ans.="REPLACE INTO $q ($fields) VALUES($params);\r\n";
	}
	Header( 'Content-Length: '.strlen($ans));
	Header( 'Content-type: text/html');
	echo $ans;
	break;//case"get_table":
	case"merge_table":
	$tablename=sqlp($_GET['name']);
	$key1=sqlp($_GET['key1']);
	$datakey=sqlp($_GET['datakey']);
	$ans="";
	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq)-1;
	for($i = 0; $i < $num; $i += 3){
		$where=$qq[$i];   
		$ans.=" условие $where<br>";                          
		$qw="SELECT $datakey FROM $tablename WHERE $where LIMIT 1";
		$ans.="Запрос: $qw<br>";
		$r=sql($qw);
		if(mysqli_num_rows($r)==0){
			$qwery=$qq[$i+2];
			if($qwery!=""){
				sql($qwery);
				$ans.="Новая строка <br>".$qwery."<hr>";
			}
		}
		else{
			$data=mysql_fetch_row($r);
			$ans.="datakey=$datakey<br>";
			$timelocal="".$data[0];
			$time=$qq[$i+1];
			//теперь их нужно сверить
			$ans.="время файла $time<br>";
			$ans.="время сайта $timelocal<br>";
			if($time>$timelocal){
				$qwery=$qq[$i+2];
				if($qwery!=""){
					sql($qwery);
					$ans.="обновляем свежий <br>".$qwery."<hr>";
				}
			}
			else{
				$ans.="обновлять не надо <br>".$qwery."<hr>";
			}
		}
	}//for
	echo "OK
	$ans";
	break;
	case"do_sql":
	$qq=explode("\r\n",$HTTP_RAW_POST_DATA); 
	$num = count($qq);
	for($i = 0; $i < $num; $i += 1){
		$query=$qq[$i];
		if($query!=""){
			sql($query);
			//echo $query."<hr>";
		}
	}
	echo "OK";
	break;
	case"qwery":
	$ans='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><title>Untitled</title></head><body>';
	$q=$_GET['query'];
	$v=$_GET['name'];
	$q=$_POST['querystring'];	
	$tip=$_GET['tip'];
	if($q=="") $q=$HTTP_RAW_POST_DATA;
	//$q="select * from zayavki limit 200";
	$ans.= "<style> TD {VERTICAL-ALIGN: middle;	border:#cccccc 1px solid ; FONT-FAMILY: Arial;font-size : 12px;text-align: left;}</style>";
	$ans.="<br>Запрос<br>";
	$ans.='<table border="0" cellspacing="0" cellpadding="0">';
	$result2=sql($q);
	$ans.="<tr>";
	for($i=0;$i<mysql_num_fields($result2);$i++)$ans.="<td>".mysql_field_name($result2,$i)."</td>";
	$ans.= "</tr>";
	//if (isset($_POST['name'])){} 
	while($data=mysql_fetch_row($result2)){
		$ans.= "<tr>";
		foreach($data as $key => $value){
			if($tip=="name"){$ans.= "<td>".namebyidd($value)."</td>";}
			else{$ans.= "<td>".($value)."</td>";}
		}
		$ans.= "</tr>\n";
	}
	/*	else
	{
	while ($data=mysql_fetch_row($result2)) 
	{
	$ans.= "<tr>";
	foreach ($data as $key => $value){$ans.= "<td>".nospace($value)."</td>";}
	$ans.= "</tr>\n";
	}
	}*/
	$ans.= '</table><br><hr></body></html>';
	Header( 'Content-Length: '.strlen($ans));
	Header( 'Content-type: text/html');
	echo $ans;
	break;
	//default:
	//echo ("Неизвестная команда: $oper");
	//break;
}
?>