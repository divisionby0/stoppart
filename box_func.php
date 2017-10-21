<?php 
require_once ("sql.php");
require_once ("shop_func.php");
require_once("parser.php");
require_once("gui.php");
prepare_parse("box-tbl.inc.html");
$comp_id=(integer)"0".get_s_var('comp_id');
session_start();  
/********************************************************************************************************
								Функции, обслуживающие всё 
*********************************************************************************************************/
function my_strtoupper($str){$str=mb_strtoupper($str);return $str;}
function dealer()
{
	$echo='<table align="center" width="720" cellspacing="7" cellpadding="0" border="0">
	<tr><td width="67%"><a href="/shop/artplate/stoppard/redute" target="_self"><img width="472" src="/img/redute.jpg"></a></td>
	<td width="33%" style="background:#8aa6a0;">
	<div style="padding:20 20 20 20;color:white;text-align:center;vertical-align:top;FONT-weight:300;FONT-FAMILY: \'Roboto Condensed\';FONT-size:20px;">
	<img width="80" src="/img/logo_stoppard_white.gif">
	<hr noshade>Декоративные тарелки Stoppard<hr noshade>
	Произведения более тридцати художников с мировым именем<hr noshade>
	Продукция представлена в восьми регионах России<hr noshade>
	Ассортимент из более, чем 500 наименований<hr  noshade>
	Бесплатная доставка*
	</div></td></tr>
	<tr><td style="background:#d5d8df;vertical-align:top;">
	<H1 style="padding:10 20 0 20;FONT-size:48px;text-align:justify;FONT-FAMILY: \'Arial black\';text-align:center;">ПРЕДЛОЖЕНИЕ</H1>
	<H1 style="padding:0 20 10 20;FONT-size:24px;text-align:justify;FONT-FAMILY: \'Arial black\';text-align:center;">ДЛЯ РОЗНИЧНЫХ МАГАЗИНОВ</H1>
		<div style="padding:10 25 0 25 ;vertical-align:top;FONT-size:16px;FONT-weight:400;line-height: 1.5;">
		Декоративные тарелки Stoppard производятся в России с 2014 года. 
		Продукция представлена коллекциями декоративных тарелок из фарфора, декорированных по мотивам картин знаменитых художников. </div>
		<div style="padding:10 25 0 25 ;vertical-align:top;FONT-size:16px;FONT-weight:400;line-height: 1.5;">
Сотрудничество возможно, как по договору поставки, так  и по договору комиссии.
</div><div style="padding:10 25 25 25 ;vertical-align:top;FONT-size:16px;FONT-weight:400;line-height: 2;">
Гарантия качества. Бесплатный обмен боя при поставке.
<br>
Возможен обмен и возврат продукции. 
<br>
Прайс в формате xls доступен по ссылке <a target="_blank" class="usuallink" href="stoppart.com/price">stoppart.com/price</a>
<br>
В каталоге указаны рекомендуемые розничные цены.
<br>
*Бесплатная доставка при отгрузке от 10000 рублей.
	</div>
	</td>
	<td style="background:#86afc4;">
	<div style="padding:20 20 20 20;color:white;text-align:center;vertical-align:top;FONT-weight:300;FONT-size:18px;">
	Декоративные тарелки Stoppard<br><br>
	Отдел продаж<br>
	+7(937)232-07-84<br>
	с 10:00 до 20:00<br>
	без выходных<br>
	opt@stoppart.com<br><br>
	Офис<br>
	+7(8482)78-06-78<br>
	Понедельник-пятница<br>
	с 14:00 до 18:00<br>
	office@stoppart.com<br><br>
	www.stoppart.com<br>
	<br>


	</div></td></tr>
	<tr><td width="67%"><a href="/shop/artplate/stoppard/redute" target="_self"><img width="472" src="/img/redute.jpg"></a></td>
	<td width="33%" style="background:#8aa6a0;">
	<div style="padding:20 20 20 20;color:white;text-align:center;vertical-align:top;FONT-weight:300;FONT-FAMILY: \'Roboto Condensed\';FONT-size:20px;">
	<img width="80" src="/img/logo_stoppard_white.gif">
	<hr noshade>Декоративные тарелки Stoppard<hr noshade>
	Произведения более тридцати художников с мировым именем<hr noshade>
	Продукция представлена в восьми регионах России<hr noshade>
	Ассортимент из более, чем 500 наименований<hr  noshade>
	Бесплатная доставка*
	</div></td></tr>
	</table>';
	return $echo;
}
function about()
{
	$echo='<table align="center" width="820" cellspacing="7" cellpadding="0" border="0">
	<tr><td width="57%"><a href="/shop/artplate/stoppard/vangogh" target="_self"><img width="472" src="/img/vangogh.jpg"></a></td>
	<td width="43%" style="background:#8aa6a0;">
	<div style="padding:20 20 20 20;color:white;text-align:center;vertical-align:top;FONT-weight:300;FONT-FAMILY: \'Roboto Condensed\';FONT-size:20px;">
	<img width="80" src="/img/logo_stoppard_white.gif">
	<hr noshade>
	В середине двадцатого века европейские производители начали создавать коллекции тарелок, предназначенных исключительно для украшения, а совсем не для еды. Этот удачный коммерческий ход изменил отношение к тарелкам, как к предметам, используемым только в обиходе. Сегодня украшение интерьера декоративными тарелками является модным, изысканным и креативным решением.<hr noshade>
	</div></td></tr>
	<tr><td width="57%"><a href="/shop/artplate/stoppard/modil" target="_self"><img width="472" src="/img/modigliani.jpg"></a></td>
	<td width="43%" style="background:#ADACA0;">
	<div style="padding:20 20 20 20;color:white;text-align:center;vertical-align:top;FONT-weight:300;FONT-FAMILY: \'Roboto Condensed\';FONT-size:20px;">
	<img width="80" src="/img/logo_stoppard_white.gif">
	<hr noshade>
	Чем более сдержан по цветовой гамме ваш интерьер, — тем более разнообразной может быть ваша коллекция тарелок на стене. Там, где цвета и так уже достаточно, — лучше выбрать однотонные модели.
	<hr noshade>
Разумеется, желателен контраст фона. Достаточно оригинально смотрятся декоративные тарелки на полосатых обоях, прерывая их монотонность и жесткий ритм.
<hr noshade>
	</div></td></tr>
	<tr><td width="57%"><a href="/shop/artplate/stoppard/beardsley" target="_self"><img width="472" src="/img/beardsley.jpg"></a></td>
	<td width="43%" style="background:#767567;">
	<div style="padding:20 20 20 20;color:white;text-align:center;vertical-align:top;FONT-weight:300;FONT-FAMILY: \'Roboto Condensed\';FONT-size:20px;">
	<img width="80" src="/img/logo_stoppard_white.gif">
	<hr noshade>
	Те обои, что издалека смотрятся как однотонные (фактурные) — самый идеальный фон для любых декоративных тарелок.
	<hr noshade>
Из «форм» для композиций самые выигрышные — вертикаль, симметрия вокруг зеркала или картины, а также асимметричное «облако».
<hr noshade>
	</div></td></tr>
	<tr><td width="57%"><a href="/shop/artplate/stoppard/redute" target="_self"><img width="472" src="/img/redute.jpg"></a></td>
	<td width="43%" style="background:#799EAC;">
	<div style="padding:20 20 20 20;color:white;text-align:center;vertical-align:top;FONT-weight:300;FONT-FAMILY: \'Roboto Condensed\';FONT-size:20px;">
	<img width="80" src="/img/logo_stoppard_white.gif">
	<hr noshade>
	На обоях с мелким пестрым рисунком не советуем размещать пестрые тарелки, особенно те, что не слишком подходят по цветовой гамме. Лучше выбрать однотонные или двухцветные. 
	<hr noshade>
В последнем случае желательно, чтобы хотя бы один из оттенков «поддерживался» в цвете другого, достаточно крупного предмета интерьера, например, в обивке дивана или скатерти на столе.
<hr noshade>
	</div></td></tr>
	
	</table>';
	return $echo;
}
function updatetovs(){
	sql('UPDATE tovsNew SET zakaz="0", sklad="0" WHERE 1=1');
	//	sql("COMMIT");
	//$PRRid='OOO';
	if(whichshop3()=='ifarfor') $lines = file('http://ifarfor.ru/tovs.txt');
	else $lines = file('http://stoppart.com/tovs.txt');
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
		$filename5 ="ico/".$Pida."S.jpg";
		$filename6 ="ico/".$Pida."B.jpg";
		
		$last=substr($Pida, -1);
		$Pida1 = substr($Pida, 0, -1);
		$filename7 ="ico/".$Pida1.".jpg";	
		if(file_exists($filename0)) $perem="/".$filename0;
		elseif(file_exists($filename)) $perem="/".$filename;
		elseif(file_exists($filename2)) $perem="/".$filename2;
		elseif(file_exists($filename3)) $perem="/".$filename3;
		elseif(file_exists($filename4)) $perem="/".$filename4;	
		elseif(file_exists($filename5)) $perem="/".$filename5;	
		elseif(file_exists($filename6)) $perem="/".$filename6;
		elseif(file_exists($filename7) AND ($last=='S' or $last==' B')) $perem="/".$filename7;		
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
		if($PFactory=='Stoppard' and $PVid=="Декоративная тарелка" and $PDiameter=='200') {$Pprice='990';$Pprice1s='990';}
		if($PFactory=='Stoppard' and $PVid=="Декоративная тарелка" and $PDiameter=='260') {$Pprice='2190';$Pprice1s='2190';}
		if($PFactory=='Stoppard' and $PVid=="Декоративная тарелка" and $PDiameter=='150') {$Pprice='890';$Pprice1s='890';}
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
		VALUES ('".$NeedId."S','$Pidg','".$NeedId."S','$Pname','890','890','$Pgrp','$PTip','$Pquant','$Pzakaz','$Psklad',
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
		VALUES ('$NeedId','$Pidg','$NeedId','$Pname','990','990','$Pgrp','$PTip','$Pquant','$Pzakaz','$Psklad',
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
}
function LK($userid,$language)
{
$r=sql("SELECT * FROM users WHERE userid='$userid' LIMIT 1");
if(mysqli_num_rows($r)!=0){
	$row = mysqli_fetch_array($r);
	$login=$row['login'];
	$name=$row['name'];
	$password=$row['password'];
	$phone=$row['phone'];
	$date=$row['date'];
	$hash=$row['hash'];
	$imya=$row['imya'];	
	$otchestvo=$row['otchestvo'];	
	$familia=$row['familia'];	
	$email=$row['email'];	
	$adres=$row['adres'];	
	$town=$row['town'];	
	$country=$row['country'];	
	$phone2=$row['phone2'];	
}
mysqli_free_result($r);
if($language=="en") {$regstr="Join";$lkstr="My ifarfor";$entstr="Sign in";$langstr="/en";}
else  {$regstr="Регистрация";$lkstr="Личный кабинет";$entstr="Вход";$langstr="";}
if($hash=='425' or $hash==''){ $echo='<a href="'.aPSID("$langstr/cabinet/signin").'" style="vertical-align:top;"  target="_self">'.$entstr.'</a>';
//if($userid!='')<img height="18" src="/img/lk.png">
$echo.='&nbsp;/&nbsp;<a href="'.aPSID("$langstr/cabinet/create").'"  style="vertical-align:top;"  target="_self">'.$regstr.'</a>';}
else $echo='<a href="'.aPSID("$langstr/cabinet/edit").'" style="vertical-align:top;"  target="_self"> '.$lkstr.'</a>';///<img height="18" src="/img/lk.png">
return $echo;
}
function GetCurentKursDolars(){
   $say = date('d');
   if (date('N')==6) $say = $say-1;
   if (date('N')==7) $say = $say-2;
   if (date('N')==1) $say = $say-3;
   $date = date($say."/m/Y");
   @$red = file_get_contents("http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1=".$date."&date_req2=".$date."&VAL_NM_RQ=R01235");
   if (empty($red))
      return false;
   $pos = strpos($red, '<Record Date="');
   if ($pos === false)
      return false;
   @$xml = new SimpleXMLElement($red);
   if (!isset($xml->Record) || !isset($xml->Record->Value))
      return false;
   $kurs = $xml->Record->Value;
   $kurs = (array)$kurs;
   if (!isset($kurs[0]))
      return false;
   return $kurs[0];
}

function MakeShortName($tovid,$language)
	{
	if($language=='en') { $MM=' mm';}else {$MM=' мм';}
	$query1=sql("SELECT * FROM tovsNew WHERE ida='$tovid'");
	$row = mysqli_fetch_array($query1);
	//////////////////////заглушка для пустого превью
	if(mysqli_num_rows($query1)>0){
		$rowname=str_replace ("/","-", $row['name']);
		$rowname=str_replace (","," ", $rowname);
		$rowname=str_replace ("  "," ", $rowname);
		$rowPerson=$row['Person'];
		$rowPredmetov=$row['Predmetov'];
		$form=$row['Form'];
		$picture=$row['Picture'];
		$Diameter=$row['Diameter'].' '.$MM;	
		$Vid=$row['Vid'];
		$Tip=$row['Tip'];	
		$engvid=$row['videnglish'];
		$engtip=$row['tipenglish'];
		if($language=="en"){
			$row=mysqli_fetch_array(sql("SELECT * FROM picture where id='$picture'"));$picturename=$row['english'];
			$row=mysqli_fetch_array(sql("SELECT * FROM form where id='$form'"));$formname=$row['english'];
			$formen="Form";
		}
		else{
			$row=mysqli_fetch_array(sql("SELECT * FROM picture where id='$picture'"));$picturename=$row['name'];
			$row=mysqli_fetch_array(sql("SELECT * FROM form where id='$form'"));$formname=$row['name'];
			$formen="Форма";
		}

		if($language=="en"){
			$vidtip="$engvid $engtip";
			if($vidtip=="Set Table") $vidtip="Table Set";
			elseif($vidtip=="Set Tea") $vidtip="Tea Set";
			elseif($vidtip=="Set Coffee") $vidtip="Coffee Set";
			else $vidtip="$engvid $engtip"; 
		}
		else $vidtip=$Vid.' '.$Tip.'';
		
		if($Vid=="Декоративная тарелка" )//and $AutorPictureName!=''and $AutorPictureName!='-'
		{
			if($picturename=='' and $Diameter=='') return "<b>$rowname</b>";
			elseif($picturename=='') return "<b>$vidtip $AutorPictureName «$Diameter"."» </b>";
			elseif($Diameter=='') return "<b>$vidtip $AutorPictureName «$picturename"."» </b>";	
			else return "<b>$vidtip $AutorPictureName «$picturename"."» $Diameter</b>. ";
		}
		elseif($Vid!="Скульптура" and $Vid!="Сувенир" and $Vid!="Набор столовых приборов"){
			if($picturename=='' and $formname=='') return "<b>$rowname</b>";
			elseif($picturename=='') return "<b>$vidtip «$formname"."» $PPPers</b>";
			elseif($formname=='') return "<b>$vidtip «$picturename"."» $PPPers</b>";	
			else return "<b>$vidtip «$picturename"."» $PPPers</b> $formname. ";
		}
		else{
			if($picturename=='' and $formname=='') return "<b>$rowname</b>";
			elseif($formname=='') return "<b>$vidtip «$picturename"."» </b>";
			elseif($picturename=='') return "<b>$vidtip «$formname"."»</b>";
			else return "<b>$vidtip «$formname"."» $PPPers</b> $picturename. $AddSize";
		}
	}
}

function MakeFrontName($brandid,$rowname,$vid,$tip,$picture,$form,$TipOfMaterial,$Person,$Predmetov,$AutorPicture, $Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language)
{
	$PPPers='';

	if($Person!='0' and $Person!='' and $Person!='1'  and $Predmetov!='0' and $Predmetov!='1' and $Predmetov!=''){
		$PPPers=$Person."/".$Predmetov.' ';
	}

	if($language=="en")
	{
		$row=mysqli_fetch_array(sql("SELECT * FROM picture where id='$picture'"));
		$picturename=$row['english'];

		if($picturename=="") {
			$picturename=$row['name'];
		}
		
		$row=mysqli_fetch_array(sql("SELECT * FROM form where id='$form'"));
		$formname=$row['english'];

		if($formname==""){
			$formname=$row['name'];
		}
		$row=mysqli_fetch_array(sql("SELECT * FROM brand where id='$brandid'"));
		$brand=$row['name'];
		$row=mysqli_fetch_array(sql("SELECT * FROM material where id='$TipOfMaterial'"));
		$TipOfMaterialname=$row['english'];

		if($TipOfMaterialname==""){
			$TipOfMaterialname=$row['name'];
		}
		$row=mysqli_fetch_array(sql("SELECT * FROM creator where id='$AutorPicture'"));
		$AutorPictureName=$row['english'];
		$MM=" mm. ";
		$ML=" ml. ";
		$formen="Form";
		$highen="Height";
		$Diam="Diameter";
	}
	else
	{
		$row=mysqli_fetch_array(sql("SELECT * FROM picture where id='$picture'"));
		$picturename=$row['name'];
		$row=mysqli_fetch_array(sql("SELECT * FROM form where id='$form'"));
		$formname=$row['name'];
		$row=mysqli_fetch_array(sql("SELECT * FROM material where id='$TipOfMaterial'"));
		$TipOfMaterialname=$row['name'];
		$row=mysqli_fetch_array(sql("SELECT * FROM brand where id='$brandid'"));
		$brand=$row['name'];
		$row=mysqli_fetch_array(sql("SELECT * FROM creator where id='$AutorPicture'"));
		$AutorPictureName=$row['name'];
		$MM=" мм. ";
		$ML=" мл. ";
		$formen="Форма";
		$highen="Высота";
		$Diam="Диаметр";
	}

	/////////////////////////Добавка про размеры///////////////////////////////
	$AddSize='';
	if ($vid=="Бокал с бл.с крышкой") $vid="Бокал с блюдцем и крышкой";
	if ($vid=="Комплект детский в чемода") $vid="Комплект детский четырёхпредметный в чемоданчике.";
	if ($tip=="трёхпредметный в чемоданч")$tip="трёхпредметный в чемоданчике";
	if ($vid=="Чашка с блюдцем" and $tip=="чайн.") $tip="чайная";
	if ($vid=="Чашка с блюдцем и крышкой" and $tip=="чайн.") $tip="чайная";
	if ($vid=="Чашка с блюдцем" and $tip=="кофейн.") $tip="кофейная";
	if ($vid=="Подарочный набор" and $tip=="кофейн.") $tip="кофейный";
	if ($vid=="Блюдо" and $Diameter!='' and $Diameter!='0')$AddSize=$Diameter.$MM;
	elseif ($vid=="Блюдо" and $Width!='' and $Width!='0')$AddSize=$Width.$MM;
	elseif ($vid=="Ваза" and $Height!='' and $Height!='0')$AddSize=$Height.$MM;
	elseif ($vid=="Фоторамка" and $Height!='' and $Height!='0' and $Width!='0')$AddSize="$Height x $Width$MM";
	elseif ($vid=="Шкатулка" and $Diameter!='' and $Diameter!='0' and $Width!='0' and $Height!='0')$AddSize="$Diameter x $Width x $Height$MM";
	elseif (($vid=="Чашка с блюдцем" or $vid=="Чайник" or $vid=="Кофейник" or $vid=="Подарочный набор"
	or $vid=="Бокал" or $vid=="Бокал с блюдцем и крышкой" or $vid=="Бокал с блюдцем" or $vid=="Кружка"
	or $vid=="Чашка" or $vid=="Сахарница" or $vid=="Комплект" or $vid=="Сливочник" or $vid=="Чашка с блюдцем и крышкой"
	)and $Capacity!='' and $Capacity!='0')$AddSize=$Capacity.$ML;
	if ($vid=="Скульптура" and $Height!='' and $Height!='0')$AddSize="$highen $Height$MM";
	if ($vid=="Елочная игрушка" and $Height!='' and $Height!='0')$AddSize="$highen $Height$MM";
	if ($vid=="Ёлочная игрушка" and $Height!='' and $Height!='0')$AddSize="$highen $Height$MM";
	///////////////////////////////////////////////////////////////////////////
	if($language=="en")
		{
		$vidtip="$engvid $engtip";
		if($vidtip=="Set Table") $vidtip="Table Set";
		elseif ($vidtip=="Set Tea") $vidtip="Tea Set";
		elseif ($vidtip=="Set Coffee") $vidtip="Coffee Set";
		else $vidtip="$engvid $engtip";
		}
	else $vidtip="$vid $tip";
	if($tip=='декор.' and $vid=="Тарелка") {
		$vid="Декоративная тарелка";
		$tip='';
	}
	if($tip=='декор.' and $vid=="Подарочный набор") {
		$vidtip="Подарочный набор";
	}
	if ($vid=="Декоративная тарелка" or ($tip=='декор.' and $vid=="Подарочный набор"))
	{
		if($picturename=='' and $formname=='') return "<b>$rowname</b>";
		elseif($picturename=='') return "<b>$vidtip «$AutorPictureName»</b><br>$Diam: $Diameter$MM. <br>$TipOfMaterialname";
		elseif($formname=='') return "<b>$vidtip $AutorPictureName «$picturename"."»</b><br>$Diam: $Diameter$MM. <br>$TipOfMaterialname";
		elseif($brand=='Stoppard') return "<b>$vidtip $AutorPictureName «$picturename"."»</b><br>$TipOfMaterialname";
		else return "<b>$vidtip $AutorPictureName «$picturename"."»</b><br>$Diam: $Diameter$MM. <br>$TipOfMaterialname";
	}
	elseif($vid!="Скульптура" and $vid!="Сувенир" and $vid!="Набор столовых приборов"){
		if($picturename=='' and $formname=='') return "<b>$rowname</b>";
		elseif($picturename=='') return "<b>$vidtip «$formname"."» $PPPers</b><br>$AddSize$TipOfMaterialname";
		elseif($formname=='') return "<b>$vidtip «$picturename"."» $PPPers</b><br>$AddSize$TipOfMaterialname";
		else return "<b>$vidtip «$picturename"."» $PPPers</b><br>$formen: $formname. <br>$AddSize$TipOfMaterialname";
	}
	else {
		if($picturename=='' and $formname=='') return "<b>$rowname</b><br>$TipOfMaterialname";
		elseif($formname=='') return "<b>$vidtip «$picturename"."» </b><br>$AddSize$TipOfMaterialname";
		elseif($picturename=='') return "<b>$vidtip «$formname"."»</b><br>$AddSize$TipOfMaterialname";
		else return "<b>$vidtip «$formname"."» $PPPers</b><br>$picturename. $AddSize$TipOfMaterialname";
	}
}

function MakeBottomName($brandid,$price,$language)
	{
$row=mysqli_fetch_array(sql("SELECT * FROM brand where id='$brandid'"));
$strana=$row['Strana'];$name=$row['name'];
if($language=="en") 
{$strbrname="Produced by";if($strana=="Россия") $strana="Russia"; elseif($strana=="Китай") $strana="China";}
else
{$strbrname="Производство";}
$proizv="";
if($name=='Императорский фарфоровый завод') { if($language=="en")$name='Imperial Porcelain Manufacture.';else $name='АО "ИФЗ"'; }
else $name='';
//if($name=='Сциталис. Астрахань') $name='ООО "ПФ"';
if(($strana=='') and ($name=='')) $proizv=""; 
elseif($name=='')$proizv="$strbrname: $strana<br>";
else $proizv="$strbrname: $name, $strana<br>";
//else  
$proizv="$name $strana<br>";
return "$proizv<font class='price'>$price</font>";
	}
FUNCTION TransIdForYandex($id)
{
//$id=strtoupper($id);
$idNumber=strtr($id, 
	array(
	"A"=>"01","B"=>"02","C"=>"03","D"=>"04","E"=>"05","F"=>"06","G"=>"07","H"=>"08","I"=>"09","J"=>"10",
	"K"=>"11","L"=>"12","M"=>"13","N"=>"14","O"=>"15","P"=>"16","Q"=>"17","R"=>"18","S"=>"19","T"=>"20",
	"U"=>"21","V"=>"22","W"=>"23","X"=>"24","Y"=>"25","Z"=>"26","-"=>"27",
	"a"=>"31","b"=>"32","c"=>"33","d"=>"34","e"=>"35","f"=>"36","g"=>"37","h"=>"38","i"=>"39","j"=>"40",
	"k"=>"41","l"=>"42","m"=>"43","n"=>"44","o"=>"45","p"=>"46","q"=>"47","r"=>"48","s"=>"49","t"=>"50",
	"u"=>"51","v"=>"52","w"=>"53","x"=>"54","y"=>"55","z"=>"56","."=>"57")
         );
    // Возвращаем результат.
    return $idNumber;
}
FUNCTION cssname()
{
$name='ifarfor2.css';
return $name;
}

function PrintLeftMenu($activemenu)
{$echo='&nbsp;';
global $language;
//$menuname22=$_GET['menu'];
if($language=="en") {
$langstr="/en";
$MYORDERS='MY ORDERS';$BASKET='BASKET';$LISTOFORDERS='LIST OF ORDERS';$EDIT='EDIT';
$PERSONALDATA='PERSONAL DATA';$CHANGEPASSWORD='CHANGE PASSWORD';$LOGOUT='LOG OUT';
} else 
{$langstr="";$MYORDERS='МОИ ЗАКАЗЫ';$BASKET='КОРЗИНА';$LISTOFORDERS='ВЕДОМОСТЬ ЗАКАЗОВ';$EDIT='РЕДАКТИРОВАТЬ';
$PERSONALDATA='ЛИЧНЫЕ ДАННЫЕ';$CHANGEPASSWORD='СМЕНИТЬ ПАРОЛЬ';$LOGOUT='ВЫЙТИ ИЗ УЧЕТНОЙ ЗАПИСИ';
}
if($activemenu!=10)
{
	$echo='
		<p style="padding-left:20px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.$MYORDERS.'</b></p>
		';
$echo.='<div class="hot">';if($activemenu==7)$echo.='<b>'.$BASKET.'</b>'; else 
$echo.='<a href="'.aPSID($langstr.'/cabinet/basket').'" class="link1">'.$BASKET.'</a>'; 
/*$echo.='</div><div class="hot">';if($activemenu==1)$echo.='<b>СОХРАНЕННЫЕ</b>'; else 
$echo.='<a href="'.aPSID('/cabinet/saved').'" class="link1">СОХРАНЕННЫЕ</a>';*/ 
$echo.='</div><div class="hot">';if($activemenu==2)$echo.='<b>'.$LISTOFORDERS.'</b>'; else 
$echo.='<a href="'.aPSID($langstr.'/cabinet/worked').'" class="link1">'.$LISTOFORDERS.'</a>'; 
if (is_admin()){	
$echo.='</div><div class="hot">';if($activemenu==11)$echo.='<b>ВСЕ ЗАКАЗЫ САЙТА</b>'; else 
$echo.='<a href="'.aPSID($langstr.'/cabinet/adminwork').'" class="link1">ВСЕ ЗАКАЗЫ САЙТА</a>'; 	}
$echo.='</div>';	
$echo.='</td></tr><tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:9px;">
		&nbsp;
		</td></tr><tr><td align="left" style="PADDING:10px;border : none;
		VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;">
		<p style="padding-left:20px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.$PERSONALDATA.'</b></p>
		';
$echo.='<div class="hot">';if($activemenu==4)$echo.='<b>'.$EDIT.'</b>'; else 
$echo.='<a href="'.aPSID($langstr.'/cabinet/edit').'" class="link1">'.$EDIT.'</a>'; 
$echo.='</div>';	
$echo.='<div class="hot">';if($activemenu==5)$echo.='<b>'.$CHANGEPASSWORD.'</b>'; else 
$echo.='<a href="'.aPSID($langstr.'/cabinet/reset').'" class="link1">'.$CHANGEPASSWORD.'</a>'; 
$echo.='</div>';	
$echo.='<div class="hot">';if($activemenu==6)$echo.='<b>'.$LOGOUT.'</b>'; else 
$echo.='<a href="'.aPSID($langstr.'/cabinet/logout').'" class="link1">'.$LOGOUT.'</a>'; 
$echo.='</div>';	
}
$echo.='</td></tr></table></td><td>';
	return $echo;
}

function ProverkaNal($tovid,$shop)
{
	$QuantStr=sql("SELECT * FROM quants WHERE tov_id='$tovid' and shopid='$shop'");
	$countQuantStr=mysqli_num_rows($QuantStr);
	mysqli_free_result($QuantStr);
	if($countQuantStr>0) {
		return 1;
	} else {
		return 0;
	}
}
function QuantsInShop($rowRealID,$case,$language)
{
	if($language=="en")
	{
		$ostatki="STOCK BALANCE";
		$MALO="A LITTLE BIT";
		$NAL="IN STOCK";
		$MNOGO="A LOT";
		$Addr1="Russia, Togliatty, Vega";
		$Addr2="Russia, Samara, Frunze st., 86";
		$Addr3="Russia, Ulyanovsk, Goncharova st., 5";
		$Addr4="Russia, Samara, Rus";
		$Addr5="Russia, Togliatty, Pobedi st., 78";
		$Addr6="Russia, Ufa, Karl Marx st., 25";
		$Addr7="Russia, Kazan, Chernyshevskii st., 27a";
		$Addr8="Russia, Saratov, Volskaya st., 87";
		$Addr9="Russia, Kazan, Korston, Ershov st., 1a";
		$Uslovia="<HR style='margin-top:10px;'><li style='padding-top:10px;'>We can make delivery to any point of world.</li><li>Our partners of delivery are DHL and Fedex.</li>";
	}
	else
	{
		$ostatki="ОСТАТКИ В МАГАЗИНАХ";$MALO="Мало";$NAL="В наличии";$MNOGO="Много";
		$Addr1="г. Тольятти, ТРЦ Вега, ул. Юбилейная, 40";
		$Addr2="г. Самара, ул. Фрунзе, 86";
		$Addr3="г. Ульяновск, ул. Гончарова, 5";
		$Addr4="г. Самара, ТЦ Русь на Волге";
		$Addr5="г. Тольятти, ул. Победы, 78";
		$Addr6="г. Уфа, ул. Карла Маркса, 25";
		$Addr7="г. Казань, ул. Чернышевского, 27a";
		$Addr8="г. Саратов, ул. Вольская, 87";
		$Addr9="г. Казань, ГТРК Корстон, ул. Н. Ершова, 1а";
		$Uslovia="<HR style='margin-top:10px;'><li style='padding-top:10px;'>Предварительной оплаты не требуется. </li><li>Оплата наличными при получении</li><li>Доставка в любой город РФ от 300 рублей.</li><li>Бесплатная доставка до пункта выдачи по России при заказе от 5000 рублей.</li><li>Бесплатная доставка до адреса по России при заказе от 10000 рублей*.</li><li>Обычно доставка до адреса по г. Москве осуществляется в течение 2-3 рабочих дней.</li><li><br><a href='/delivery' class='usuallink1' target='_blank'>*Подробные условия доставки можно посмотреть здесь</a>.</li>";
	}
$QuantStr=sql("SELECT * FROM quants WHERE tov_id='$rowRealID' ORDER BY shopid ");
$countQuantStr=mysqli_num_rows($QuantStr);
if($countQuantStr>0) {
	if($case==1)
		{
		$echo="<HR><li style='padding-top:10px;'><b>$ostatki:</b></li>";
		while($roww=mysqli_fetch_array($QuantStr)) 
			{
			$kolvo='';$rowk=$roww['kol'];
			if($rowk<3) $kolvo="<i>$MALO</i>";
			elseif($rowk<7) $kolvo="<i>$NAL</i>";
			else $kolvo="<i>$MNOGO</i>";
			//$rowk='';
			switch($roww['shopid'])	{
					case "1": $echo.="<li>$Addr1: <span title='$rowk'>$kolvo.</span></li>";break;	
					case "2": $echo.="<li>$Addr2: <span title='$rowk'>$kolvo.</span></li>";break;	
					case "4": $echo.="<li>$Addr4: <span title='$rowk'>$kolvo.</span></li>";break;	
					case "5": $echo.="<li>$Addr5: <span title='$rowk'>$kolvo.</span></li>";break;	
					case "6": $echo.="<li>$Addr6: <span title='$rowk'>$kolvo.</span></li>";break;	
					case "7": $echo.="<li>$Addr7: <span title='$rowk'>$kolvo.</span></li>";break;	
					case "8": $echo.="<li>$Addr8: <span title='$rowk'>$kolvo.</span></li>";break;	
					case "9": $echo.="<li>$Addr9: <span title='$rowk'>$kolvo.</span></li>";break;	
					case "3": $echo.="<li>$Addr3: <span title='$rowk'>$kolvo.</span></li>";break;	
					default: ;break;}///*
			}
		$echo.=$Uslovia;
	}
	else //выводим остатки для сайта
	{
			$echo="";
		while($roww=mysqli_fetch_array($QuantStr)) 
			{
			$kolvo='';$rowk=$roww['kol'];if($rowk<3) $kolvo='<i>Мало</i>';elseif($rowk<7) $kolvo='<i>В наличии</i>';else $kolvo='<i>Много</i>';
			switch($roww['shopid'])	{
					case "1": $echo.="Вега-$rowk ";break;	
					case "2": $echo.="Фрунзе-$rowk ";break;	
					case "3": $echo.="Ульяновск-$rowk ";break;	
					case "4": $echo.="Русь-$rowk ";break;	
					case "5": $echo.="Победа-$rowk ";break;	
					case "6": $echo.="Уфа-$rowk ";break;	
					case "7": $echo.="Чернышевского-$rowk ";break;	
					case "8": $echo.="Саратов-$rowk ";break;	
					case "9": $echo.="Корстон-$rowk ";break;	
					default: ;break;}
			}
	}
}
mysqli_free_result($QuantStr);
return $echo;
}
function printbuttonup()
{
$ans="<script type='text/javascript'>window.onload = function() { // после загрузки страницы
	var scrollUp = document.getElementById('scrollup'); 
	var bag = document.getElementById('bag'); 
	scrollUp.onmouseover = function() {	
		scrollUp.style.opacity=0.6;	
		scrollUp.style.filter  = 'alpha(opacity=30)';
	};
	scrollUp.onmouseout = function() { 
		scrollUp.style.opacity = 0.8;
		scrollUp.style.filter  = 'alpha(opacity=50)';
	};
	scrollUp.onclick = function() { 
		window.scrollTo(0,0);
	};
// show button
	window.onscroll = function () { // при скролле показывать и прятать блок
		if ( window.pageYOffset > 300 ) {
			scrollUp.style.display = 'block';
		} else {
			scrollUp.style.display = 'none';
		}
		if(bag){
			if ( window.pageYOffset > 50 && window.pageYOffset < 250 ) {
				bag.style.display = 'none';	
			} else{
				bag.style.display = 'block';
			} 
			if ( window.pageYOffset > 250 ) {
				bag.style.opacity = 0.5;
			} else {
				bag.style.opacity = 1.0;
			}
		}
	};
};</script>";
return $ans;
}
/********************************************************************************************************
								Функции, обслуживающие корзину  
*********************************************************************************************************/
function ToRub($Nnewprice,$height){
		$ts=floor($Nnewprice/1000);$ed=$Nnewprice-($ts*1000);
		if($ts=='0') $ts="";else {if($ed<10)$ed='00'.$ed;elseif($ed<100)$ed='0'.$ed;};
		return "$ts $ed <img src='/img/rub-002.png' style='height: $height"."px' alt='р.'>";
}
function GetLastBoxIdd($userid){
	$r=sql("SELECT idd FROM box WHERE userid='$userid' ORDER BY idd DESC LIMIT 1");
	if(mysqli_num_rows($r)>0) {
		$row = mysqli_fetch_array($r);
		$iddret=$row['idd'];
		if($iddret=='')$iddret=0;
	}
	mysqli_free_result($r);
	return $iddret;
}
function MakeNewIDDforOrder(){
	$r=sql("SELECT idd FROM orders ORDER BY idd DESC LIMIT 1");
	if(mysqli_num_rows($r)>0) {
		$row = mysqli_fetch_array($r);
		$idd=$row['idd'];
		if($idd=='')$idd=0;
	}
	$idd=$idd+5;$idd=1006;
	mysqli_free_result($r);
	return $idd;
}
function ChangeBasketToOrder($userid){
$r=sql("SELECT * FROM box WHERE userid='$userid' AND (idd='' OR idd='0')");
if(mysqli_num_rows($r)==0) return "";
	$row=sql("SELECT promo FROM users WHERE userid='$userid' LIMIT 1"); 
	if(mysqli_num_rows($row)!=0){
		$r=mysqli_fetch_array($row);$promo=$r['promo'];
		sql ("UPDATE users SET promo='' WHERE userid='$userid'");
	}
	global $idd;
	//$idd=MakeNewIDDforOrder();
	/*$rux=sql("SELECT idd FROM orders ORDER BY idd DESC LIMIT 1");
	if(mysqli_num_rows($rux)>0) {
		$rowux = mysqli_fetch_array($rux);
		$iddux=$rowux['idd'];
		if($iddux=='')$iddux=0;
	}
	$iddux=$iddux+5;*/
	$iddux=1010;$rrrux=1;
	while($rrrux!=0)
	{
	$iddux=$iddux+1;
	$rux=sql("SELECT idd FROM orders WHERE idd='$iddux'");
	$rrrux=mysqli_num_rows($rux);
	}
	$idd=$iddux;
	$orderid=$idd;
	sql("UPDATE box SET idd = $orderid WHERE userid='$userid' AND (idd='' OR idd='0')");
	sql("UPDATE users SET orderidd = $orderid WHERE userid='$userid'");
	set_var("idd",$idd);
//summa
//status,link_dostavka,date_dostavka
	sql("INSERT INTO orders
(idd, userid,hash,familia,imya,otchestvo,country,town,strana,adres,regionpunkt,
citypunkt,addresspunkt,email,phone,phone2)
SELECT 
orderidd, userid,hash,familia,imya,otchestvo,country,town,strana,adres,regionpunkt,
citypunkt,addresspunkt,email,phone,phone2
FROM users WHERE userid='$userid'");
sql("UPDATE orders SET promo = '$promo' WHERE userid='$userid' AND idd='$orderid'");
mysqli_free_result($r);mysqli_free_result($row);mysqli_free_result($rux);
	return $idd;
}
function print_orders($userid,$num,$language){//печатает список заказов
if($language=='en')
{$namelang='english';$listoforders="List of orders";$basket='Basket';
}
else
{$namelang='name';$listoforders="Ведомость заказов";$basket='Корзина';
}
if($num=='all')	$r=sql("SELECT * FROM box WHERE userid='$userid' ORDER BY idd DESC");
else $r=sql("SELECT * FROM box WHERE userid='$userid' AND idd='$num' ORDER BY idd DESC");
	if(mysqli_num_rows($r)==0) return "Заказов нет.";
	$ans='<strong><font size=3 color="#000000">'.$listoforders.'</font></strong><BR><BR>
<table width="800" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="20%" height="28px" align="center">&nbsp;</td>
    <td width="20%" align="center">&nbsp;</td>
	<td width="40%" align="center">&nbsp;</td>
    <td width="20%" align="center">&nbsp;</td>
    <td width="20%" align="center"><img src="/empty.gif" width="50px" height="1px"></td>
    <td width="20%" align="center"><img src="/empty.gif" width="50px" height="1px"></td>
</tr>';
$ctrlidd='';
	while ($row = mysqli_fetch_array($r)){
    $ordernum=$row['idd'];
	$date=$row['date'];
	if($ctrlidd!=$ordernum) //1234567890
		{$ctrlidd=$ordernum;//2017-01-19
		$day=substr($date, 8,2).'.'.substr($date, 5,2).'.'.substr($date, 0,4);
		//$day   = date( "m.d.y",$date );
		if($ordernum=='')$numofz=$basket; else $numofz='№'.$ordernum;
		$ans.='<tr>
		<td height="26px" height="25px" align="center" style=""><b>'.$day.'</b></td>
		<td align="center" height="25px" style=""><b>'.$numofz.'</b></td>
		<td align="center" height="25px" style="">'.$status.'</td>
		<td align="center" height="25px" colspan="4" style="">&nbsp;</td>';
		$ans.='</tr>';//tov_id
		$ru=sql("SELECT * FROM box WHERE userid='$userid' AND idd='$ordernum'");
		$itogo=0;
		while ($rowu = mysqli_fetch_array($ru)){
				$kol=$rowu['kol'];$tov_id=$rowu['tov_id'];
				$ru2=sql("SELECT * FROM tovsNew WHERE id='$tov_id'");
				$rowu2 = mysqli_fetch_array($ru2);
			    $tovsname=$rowu2[$namelang];
				$price=$rowu2['price1s'];
				$pprice=$price*1;
				$sum=$kol*$price;$itogo=$itogo+$sum;
				$ans.='<tr>
				<td align="center" colspan="4" height="25px" style="border-top:1px solid gray;">'.$tovsname.'</td>
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
$ans.='</table><BR><BR>';
mysqli_free_result($r);
mysqli_free_result($row);
mysqli_free_result($ru);
mysqli_free_result($ru2);
return $ans;
}
function print_mybox_line_Farfor($DostupOnZakaz,$clickable,$r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$ida)//печатает корзину 
{
if($DostupOnZakaz==0) $StyleD="background-color:gray;"; else $StyleD="";
if($DostupOnZakaz==0) $NeD="товар недоступен для заказа";  else $NeD="";
if ($clickable==1)
return "<tr>
<td colspan='2' class='n' style='$StyleD'><a href='".aPSID("/shop/sculptur/animal/$ida")."' target='_blank'>$NeD $r1</a></td>
<td class='p' style='$StyleD'>$r2</td>
<td class='q' style='$StyleD'>$r3</td>
<td class='s' style='$StyleD'>$r4</td>
<td class='a1' style='$StyleD'><a href='".aPSID($r5)."' style='font-size:16px;' title='увеличить количество' target='_self'>+</a></td>
<td class='a2' style='$StyleD'><a href='".aPSID($r6)."' style='font-size:16px;' title='уменьшить количество' target='_self'>–</a></td></tr>";
else
return '<tr>
<td colspan="2" class="n">'.$r1.'</td>
<td class="p">'.$r2.'</td>
<td class="q">'.$r3.'</td>
<td class="a2">'.$r4.'</td>
</tr>';
}
function get_order_sum($idd){
  global $userid;
	$r=sql("SELECT boxid,orderid FROM box WHERE idd='$idd'"); 
	if(mysqli_num_rows($r)==0){ 
        return 0;
	} 
	else{
        $sum=0;
		$r=sql("SELECT * FROM box INNER JOIN tovsNew ON box.tov_id = tovsNew.id WHERE box.idd='$idd'"); 
		if(mysqli_num_rows($r)!=0) 	while ($row = mysqli_fetch_array($r)){ $sum=$sum+$row['price']*$row['kol'];	}
    }
	  mysqli_free_result($r); 
return $sum;
} 
function print_zagolovok($num,$language)
{
$Nname="Наименование";$NArticul="Артикул";$NPrice="Цена";$NQTY="Количество";$NSubTotal="Сумма";$NNothing="Корзина пуста.";//$idd.$userid
$Nbag="Ваша корзина";$NDelivery="Доставка";$Npay="Безопасный платёж";$NConf="Подтверждение";$NContinue="ПРОДОЛЖИТЬ ПОКУПКИ";
$NOrder="ОФОРМИТЬ ЗАКАЗ";$NGrandTotal="ОБЩАЯ СУММА ЗАКАЗА";$NDec="Уменьшить количество";$NAdd="Увеличить количество";$NRemove="Убрать из корзины";
$NPromo="ПРОМОКОД";$NPromoApply="ПРИМЕНИТЬ ПРОМОКОД";
$NRem="Вы действительно хотите убрать из корзины";$langstr="";
if($language=="en") {
$Nname="PRODUCT NAME"; $NArticul="PRODUCT CODE";$NPrice="UNIT PRICE";$NQTY="QTY";$NSubTotal="SUBTOTAL";$NNothing="Shopping basket is empty";
$Nbag="Shopping basket";$NDelivery="Shipping method";$Npay="Payment method";$NConf="Confirmation";$NContinue="CONTINUE SHOPPING";
$NOrder="PLACE ORDER NOW";$NGrandTotal="GRAND TOTAL";$NDec="Decrease QTY";$NAdd="Increase QTY";$NRemove="Remove item";$NRem="Are you really want to remove item from shopping basket";
$NPromo="PROMOCODE";$NPromoApply="RECOUNT";$langstr="/en";
}
$class1="bagN";$color1="color:#BFCAE2;";$class2="bagN";$color2="color:#BFCAE2;";$class3="bagN";$color3="color:#BFCAE2;";$class4="bagN";$color4="color:#BFCAE2;";
if($num==1) {$class1="bagHL";$color1="";}
elseif($num==2) {$class2="bagHL";$color2="";}
elseif($num==3) {$class3="bagHL";$color3="";}
elseif($num==4) {$class4="bagHL";$color4="";}
$ans= '<table align="center" bgcolor="#FFFFFF" width="100%" style="padding:17px;padding-bottom:0px;" cellspacing="0" cellpadding="0" border="0">
	<tr>
	<td class="bagSide"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-top:13px;"><tr><td class="bagLine2"></td></tr></table></td>
	<td style="text-align:center;width:530px;height:27px;"><img src="/empty.gif" width="530px" height="1px">
	<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr>
		<td class="'.$class1.'"><img src="/empty.gif" width="27px" height="1px">1</td>
		<td class="bagLine"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-top:13px;"><tr><td class="bagLine2"></td></tr></table></td>
		<td class="'.$class2.'"><img src="/empty.gif" width="27px" height="1px">2</td>
		<td class="bagLine"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-top:13px;"><tr><td class="bagLine2"></td></tr></table></td>
		<td class="'.$class3.'"><img src="/empty.gif" width="27px" height="1px">3</td>
		<td class="bagLine"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-top:13px;"><tr><td class="bagLine2"></td></tr></table></td>
		<td class="'.$class4.'"><img src="/empty.gif" width="27px" height="1px">4</td>
	</tr></table>
	</td>
	<td class="bagSide"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-top:13px;"><tr><td class="bagLine2"></td></tr></table></td>
</tr></table>';
$ans.= '<table align="center" bgcolor="#FFFFFF" width="100%" style="padding:10px;" cellspacing="0" cellpadding="0" border="0">
	<tr>
	<td class="bagSide"></td>
	<td style="text-align:center;width:610px;"><img src="/empty.gif" width="610px" height="1px">
	<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr>
		<td style="width:105px;'.$color1.'text-align:center;"><img src="/empty.gif" width="105px" height="1px"><a href="'.$langstr.'/cabinet/basket" style="'.$color1.'" target="_top">'.$Nbag.'</a></td>
		<td style="text-align:center;width:33%;"></td>
		<td style="width:105px;'.$color2.'text-align:center;"><img src="/empty.gif" width="105px" height="1px"><a href="'.$langstr.'/cabinet/order" style="'.$color2.'" target="_top">'.$NDelivery.'</a></td>
		<td style="text-align:center;width:33%;"></td>
		<td style="width:105px;'.$color3.'text-align:center;">'.$NConf.'<img src="/empty.gif" width="105px" height="1px"></td>
		<td style="text-align:center;width:33%;"></td>
		<td style="width:105px;'.$color4.'text-align:center;">'.$Npay.'<img src="/empty.gif" width="105px" height="1px"></td>
	</tr></table>
	</td>
	<td class="bagSide"></td>
</tr></table>';
return $ans;
}
function print_mybox_Farfor($clickable,$language)
{//печатает корзину 
global $userid;	
global $idd;
$idd=get_var('idd');$userid=get_s_var("userid");
$Promovalue=post('promo');
$ordernum=$idd;
if($language=="en") {
$Nname="PRODUCT NAME"; $NArticul="PRODUCT CODE";$NPrice="UNIT PRICE";$NQTY="QTY";$NSubTotal="SUBTOTAL";$NNothing="Shopping basket is empty";
$Nbag="Shopping basket";$NDelivery="Shipping method";$Npay="Payment method";$NConf="Confirmation";$NContinue="CONTINUE SHOPPING";
$NOrder="PLACE ORDER NOW";$NGrandTotal="GRAND TOTAL";$NDec="Decrease QTY";$NAdd="Increase QTY";$NRemove="Remove item";$NRem="Are you really want to remove item from shopping basket";
$NPromo="PROMOCODE";$NPromoApply="RECOUNT";$langstr="/en";$rowlang="english";$langadd="&language=en";
}
else
{
$Nname="Наименование";$NArticul="Артикул";$NPrice="Цена";$NQTY="Количество";$NSubTotal="Сумма";$NNothing="Корзина пуста.";//$idd.$userid
$Nbag="Ваша корзина";$NDelivery="Доставка";$Npay="Безопасный платёж";$NConf="Подтверждение";$NContinue="ПРОДОЛЖИТЬ ПОКУПКИ";
$NOrder="ОФОРМИТЬ ЗАКАЗ";$NGrandTotal="ОБЩАЯ СУММА ЗАКАЗА";$NDec="Уменьшить количество";$NAdd="Увеличить количество";$NRemove="Убрать из корзины";
$NPromo="ПРОМОКОД";$NPromoApply="ПРИМЕНИТЬ ПРОМОКОД";
$NRem="Вы действительно хотите убрать из корзины";$langstr="";$rowlang="name";$langadd="";
}
$ans=print_zagolovok(1,$language);
$ans.= "<form action='".aPSID($langstr."/cabinet/basket")."' method='post' name='order' target='_self'>";
$ans.= '<table align="center" width="100%" style="padding:17px;padding-bottom:6px;" cellspacing="0" cellpadding="0" border="0">
<tr>
<td colspan="2" style="width:100%;height:26px;background-color:#7F7355;color:white;text-align:center;"><b>'.$Nname.'</b><br><img src="/empty.gif" width="150px" height="1px"></td>
<td style="width:1%;background-color:#7F7355;color:white;text-align:center;"><b>'.$NArticul.'</b><br><img src="/empty.gif" width="140px" height="1px"></td>
<td style="width:1%;background-color:#7F7355;color:white;text-align:center;"><b>'.$NPrice.'</b><br><img src="/empty.gif" width="140px" height="1px"></td>
<td style="width:1%;background-color:#7F7355;color:white;text-align:center;"><b>'.$NQTY.'</b><br><img src="/empty.gif" width="140px" height="1px"></td>
<td style="width:1%;background-color:#7F7355;color:white;text-align:center;"><b>'.$NSubTotal.'</b><br><img src="/empty.gif" width="140px" height="1px"></td>
<td style="width:1%;background-color:#7F7355;">&nbsp;<img src="/empty.gif" width="70px" height="1px"></td>
</tr>';
$r=sql("SELECT boxid,orderid FROM box WHERE idd='$idd' AND userid='$userid'"); 
if(mysqli_num_rows($r)==0) $ans.="<td align='center' colspan='7' style='font-size:20px;text-align:center;padding:30px;'><i><b>$NNothing</b></i></td>"; 
else{
	$sum=0;
	$r=sql("SELECT box.comp_id,box.tov_id,tovsNew.price1s,boxid,kol,tovsNew.name,tovsNew.english,tovsNew.tip,tovsNew.sklad,tovsNew.zakaz,tovsNew.ida,tovsNew.Imagefile  FROM box INNER JOIN tovsNew ON box.tov_id = tovsNew.id WHERE  box.idd='$idd' AND comp_id=0 AND userid='$userid' ORDER BY 7,6"); 
      (integer)$sumDostup=0;
	while ($row = mysqli_fetch_array($r)){ 
	$rowname=MakeShortName($row[ida],$language).'';
$rowboxid=$row['boxid'];$rowkol=$row['kol'];
		$link2=aPSID('/set.php?oper=del_tov&boxid='.$rowboxid.$langadd);
		$ans.= '<tr>
		<td style="width:1%;text-align:center;padding:8px;padding-right:24px;padding-left:16px;vertical-align:middle;border-bottom: 1px solid gray;">
		<a href="'.aPSID($langstr.'shop/view'.$row['ida']).'" target="_blank"><img src="'.$row['Imagefile'].'" width="100px"></a></td>
		<td style="width:100%;text-align:left;vertical-align:middle;border-bottom: 1px solid gray;font-size:18px;"><b>'.$rowname.'</b></td>
		<td style="text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:18px;">'.$row['ida'].'</td>
		<td style="text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:20px;"><b>'.ToRub($row['price1s'],14).'</b></td>
		<td style="text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:18px;">';
		if ($rowkol>1) 
			$ans.='<a style="font-size:18px;padding-top:10px;" title="'.$NDec.'" target="_self" href="'.aPSID('/set.php?oper=sub_tov&boxid='.$rowboxid.$langadd).'">–</a>';
		else $ans.='&nbsp;&nbsp;&nbsp;';
		$ans.='&nbsp; <input type="text" style="width:25px;height:25px;border:1px solid black;font-size:16px;text-align:center;" value="'.$rowkol.'" name="TOVAR'.$rowboxid.'" readonly="true">&nbsp;
		<a target="_self" title="'.$NAdd.'" style="font-size:18px;margin-bottom:10px;" href="'.aPSID('/set.php?oper=add_tovs&boxid='.$rowboxid.$langadd).'">+</a> </td>
		<td style="text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:20px;"><b>'.ToRub($rowkol*$row['price1s'],14).'</b></td>
		<td style="text-align:center;cursor: pointer;vertical-align:middle;border-bottom: 1px solid gray;color:red;font-size:24px;"
		onClick="document.location=\''.aPSID($link2).'\'"
		><a href="'.aPSID($link2).'" target="_self" style="font-size:18px;color:red;" title="'.$NRemove.'"><b>X</b></a></td></tr>';
		$sum=$sum+($row['price1s']*$rowkol);
		}
mysqli_free_result($r);
$ans.= '<tr><td colspan="5" style="padding-top:20px;text-align:right;font-size:20px;">'.$NGrandTotal.':</td><td style="padding-top:20px;text-align:center;font-size:22px;"><b>'.ToRub($sum,16).'</b></td></tr>';
//$ans.= '<tr><td colspan="5" style="padding-top:20px;text-align:right;font-size:20px;">'.$NPromo.':</td><td style="padding-top:20px;text-align:left;font-size:22px;"><input type="text" style="width:80%;height:25px;border:1px solid black;font-size:16px;text-align:center;" value="" name="promo"></td></tr>';
$ans.= '</td></tr>';
if($Promovalue=='VK201704' or $Promovalue=='FB201704'or $Promovalue=='YA201704' or $Promovalue=='IN201704') { $ans.= '<tr><td colspan="5" style="padding-top:20px;text-align:right;font-size:20px;">СУММА ЗАКАЗА СО СКИДКОЙ:</td><td style="padding-top:20px;text-align:center;font-size:22px;"><b>'.ToRub($sum*0.98,16).'</b></td></tr>
</td></tr>';sql ("UPDATE users SET promo='$Promovalue' WHERE userid='$userid'");}
$ans.='<table align="center" bgcolor="#FFFFFF" width="100%" style="padding:10px;" cellspacing="0" cellpadding="0" border="0"><tr>
<td style="width:1%;text-align:center;height:32px;padding-bottom:0px;"><input placeholder='.$NPromo.' type="text" 
style="width:100%;height:25px;border:1px solid gray;font-size:16px;text-align:center;" value="'.$Promovalue.'" name="promo"></td>
<td style="width:100%;"></td>
<td style="width:1%;text-align:center;background-color:#7F7355;"><a href="'.aPSID($langstr.'/cabinet/order').'" target="_top" title="'.$NOrder.'" style="color:white;"><b>'.$NOrder.'</b></a><br><img src="/empty.gif" width="200px" height="0px"></td>
</tr><tr>
<td style="width:1%;text-align:center;padding-bottom:24px;">
<input type="button" style="width:100%;height:32px;background-color: #7F7355; color: #FFFFFF;font-weight:bold;text-align:center;"
onclick="order.submit();" value="'.$NPromoApply.'">
</td>
<td colspan="2" style="padding-bottom:24px;">&nbsp;</td>
</tr><tr>
<td style="width:1%;height:32px;text-align:center;background-color:#7F7355;"><a href="'.aPSID($langstr.'/').'" target="_top" style="color:white;"><b>'.$NContinue.'</b><br><img src="/empty.gif" width="200px" height="0px"></td>
<td colspan="2">&nbsp;</td>
</tr>';
};
$ans.='</form></table>';
return $ans;
} 
//<input type="button" style="width:260px;height:32px;margin-top:25px;background-color: #649B51; color: #FFFFFF;font-weight:bold;text-align:center;"
//onclick="order.submit();" value=ВОЙТИ">';
function saveorder($userid,$flag){//сохраняет содержимое корзины в новом заказе
global $idd;
$idd=get_s_var('idd');
if ($idd=='0') {//это новый заказ
	$shid=whichshop();
	$r=sql("SELECT boxid,userid FROM box WHERE idd='0' AND userid='$userid'");
	$rO=sql("SELECT orderid FROM orders WHERE shopid='$shid' ORDER BY orderid DESC LIMIT 1");
	$row = mysqli_fetch_array($rO);$orderidMAX=(integer)$row['orderid'];$orderidMAX=$orderidMAX+1;
	$idd=$shid."/".$orderidMAX;
	set_var("idd",$idd);
		if(mysqli_num_rows($r)>0) {//если в корзине что то есть ее в заказы
			// создает заказ и кладет в него содержимое корзины
			if($flag=='0') {
				sql("INSERT INTO orders (idd,orderid,shopid,userid,status) VALUES ('$idd','$orderidMAX','$shid','$userid','other')");
				sql("UPDATE box SET idd='$idd' WHERE idd='0' AND userid='$userid'");
				$tempidd=$idd;
	//			set_var("idd",'0');
	//			$idd='0';
				mysqli_free_result($rO);mysqli_free_result($r);
				return $tempidd;
			}
			else {
				sql("INSERT INTO orders (idd,orderid,shopid,userid,status) VALUES ('$idd','$orderidMAX','$shid','$flag','other')");
				sql("UPDATE box SET idd='$idd'		 WHERE idd='0' 	  AND userid='$userid'");
				sql("UPDATE box SET userid = '$flag' WHERE idd='$idd' AND userid='$userid'");
				//и теперь куку заказу тоже обновить
				set_var("idd",$idd);
				return $idd;
			}
		}
	}
	else{//а это существующий заказ -надо стереть undo
		set_var("idd",'0');
		$idd='0';
		return '0';
	}
}
function get_pay_text($language)
{
global $userid;	
if($language=='en')
{$ChoosePay='Select a payment method';$ByCard='Payment by card.';$ByYaCard='Payment by Yandex Money.';$PayNow='Pay now';
$YourOrder='Your order number';$Onsum=' total cost ';$InProcess='RUR now in process.<br><br>
Cost of the order not include delivery.<br><br>
You can pay now by card or pay in cash upon receipt (Payment by cash available only in Russia).<br><br>
The consultant call you during working hours (from 10AM to 6PM by Moscow time)<br>';
$InProcessWOPay='RUR now in process.<br><br>
Cost of the order not include delivery.<br><br>
You can pay in cash upon receipt (Payment by cash available only in Russia).<br><br>
In case you wish pay by card you should ask consultant about account.<br><br>
The consultant call you during working hours (from 10AM to 6PM by Moscow time)<br>';$BasketisEmpty="Recent order isn't exist.";
}
else
{$ChoosePay='Выберите способ оплаты';$ByCard='Оплата банковской картой.';$ByYaCard='Оплата через Яндекс кошелек.';$PayNow='Оплатить сейчас';
$YourOrder='Ваш заказ №';$Onsum=' на сумму ';$InProcess='руб. уже поступил в обработку.<br><br>
В сумму заказа не входит стоимость доставки.<br><br>
Вы можете оплатить его сейчас банковской картой или оплатить наличными при получении. <br><br>
В рабочее время (10:00-18:00 по московскому времени) с вами свяжется менеджер, чтобы уточнить детали заказа.<br>';
$InProcessWOPay='руб. уже поступил в обработку.<br><br>
В сумму заказа не входит стоимость доставки.<br><br>
Не нужно вносить предоплату сейчас, оплатить можно будет наличными при получении. <br><br>
При желании, можно оплатить банковским переводом на почте или в любом банке, для этого попросите менеджера прислать вам счёт. <br><br>
В рабочее время (10:00-18:00 по московскому времени) с вами свяжется менеджер, чтобы уточнить детали заказа и оплаты.<br>';
$BasketisEmpty="Недавние покупки не обнаружены.";
}
$userid=get_s_var("userid");
$idd=GetLastBoxIdd($userid);
//global $idd;
//$idd=get_var('idd');
$ordernum=$idd;
$today = date("d.m.Y"); 
$number=$idd;if ($number=='')$number=0;
/*$r=sql("SELECT boxid FROM box WHERE idd='$idd' AND userid='$userid'"); 
if(mysqli_num_rows($r)==0) $number="_"; else{$row = mysqli_fetch_array($r);$number=$row['boxid'];}*/
$customerNumber=$number;
$r=sql("SELECT * FROM users WHERE userid='$userid' LIMIT 1");
if(mysqli_num_rows($r)!=0){
	$row = mysqli_fetch_array($r);
	$cps_phone=$row['phone'];
	$imya=$row['imya'];
	$otchestvo=$row['otchestvo'];
	$familia=$row['familia'];
	$custName=$familia+' '+$imya+' '+$otchestvo;
	$custEmail=$row['email'];
	}
//mysqli_free_result($r);
$r=sql("SELECT boxid,orderid FROM box WHERE idd='$idd' AND userid='$userid'"); 
if(mysqli_num_rows($r)==0) $echo=$BasketisEmpty;
else{
	$sum=0;
	$r=sql("SELECT box.comp_id,box.tov_id,tovsNew.price1s,boxid,kol,tovsNew.name,tovsNew.tip,tovsNew.sklad,tovsNew.zakaz,tovsNew.ida,tovsNew.Imagefile  FROM box INNER JOIN tovsNew ON box.tov_id = tovsNew.id WHERE  box.idd='$idd' AND comp_id=0 AND userid='$userid' ORDER BY 7,6"); 
	while ($row = mysqli_fetch_array($r)) $sum=$sum+($row['price1s']*$row['kol']);
//	mysqli_free_result($r);
}
mysqli_free_result($r);
$canpay=0;
if ($echo=='')
{
if($canpay==1)
	{
	$echo= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
	<HTML><HEAD><title></title>
	<META http-equiv=content-type content="text/html; charset=utf-8"><META http-equiv=Content-language content=ru-RU>
	<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
	<body bgcolor="#FFFFFF" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
	<link href="'.cssname().'" type=text/css rel=stylesheet>';
	$echo.=print_zagolovok(4,$language);
	$echo.= '<form method="POST" name="order" target="_blank"  action="https://money.yandex.ru/eshop.xml">
	<input type="hidden" name="shopId" value="117317">
	<input type="hidden" name="scid" value="45552">
	<input type="hidden" title="Идентификатор клиента" name="customerNumber" value="'.$customerNumber.'">
	<input type="hidden" title="Сумма (руб.)" name="sum" value="'.$sum.'">
	<input type="hidden" title="Телефон" name="cps_phone" value="'.$cps_phone.'">
	<input type="hidden" title="Ф.И.О." name="custName" value="'.$custName.'">
	<input type="hidden" title="Адрес доставки" name="custAddr" value="ул. Юбилейная, 40, секция 141">
	<input type="hidden" title="E-mail" name="custEmail" value="'.$custEmail.'">
	<input type="hidden" title="Содержание заказа" name="orderDetails" value="Продукция из фарфора">
	<table align="center" width="100%" style="padding-left:0px;padding-right:245px;" cellspacing="5" cellpadding="0" border="0">
		<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;padding-bottom:25px;"><b>'.$ChoosePay.'</b></td></tr>
	<tr><td style="height:26px;text-align:right;width:40%;font-size:18px;padding-right:9px;">&nbsp;</td>
	<td style="text-align:left;"><input type="radio" name="paymentType" value="AC" checked="checked">'.$ByCard.'
	</td><td class="errtxt">&nbsp;</td></tr>
	<tr><td style="text-align:right;padding-right:9px;"></td>
	<td style="width:20%;text-align:left;"><input type="radio" name="paymentType" value="PC" >'.$ByYaCard.'
	</td><td class="errtxt">&nbsp;</td></tr>
	<tr><td style="height:32px;text-align:right;font-size:18px;padding-right:9px;">&nbsp;</td>
	<td style="height:25px;background-color:#FFFFFF;font-size:18px;text-align:center;">
	<input type="button" style="width:300px;height:32px;margin-top:25px;background-color: #649B51; color: #FFFFFF;font-weight:bold;text-align:center;"
	onclick="order.submit();" value="'.$PayNow.'">
	</td><td class="errtxt" style="color:black;vertical-align:bottom;">';
//	$text1=listOrders();
	$echo.= '<tr><td style="text-align:right;padding-right:9px;"></td>
	<td style="text-align:left;padding-top:20px;">'.$YourOrder.$customerNumber.$Onsum.$sum.$InProcess.$text1.'</td>
	<td class="errtxt">&nbsp;</td></tr>';
	$echo.= '</body></html>';
}
else
{
	$echo= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
	<HTML><HEAD><title></title>
	<META http-equiv=content-type content="text/html; charset=utf-8"><META http-equiv=Content-language content=ru-RU>
	<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
	<body bgcolor="#FFFFFF" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>
	<link href="'.cssname().'" type=text/css rel=stylesheet>';
	$echo.=print_zagolovok(4,$language);
	$echo.= '
	<table align="center" width="100%" style="padding-left:0px;padding-right:245px;" cellspacing="5" cellpadding="0" border="0">
		<tr><td colspan="3" style="text-align:center;width:100%;height:26px;font-size:18px;padding-bottom:25px;"><b>'.$ChoosePay.'</b></td></tr>';
	$echo.= '<tr><td style="text-align:right;padding-right:9px;">&nbsp;</td>
	<td style="text-align:left;padding-top:20px;padding-left:40px;">'.$YourOrder.$customerNumber.$Onsum.$sum.$InProcessWOPay.$text1.'</td>
	<td class="errtxt">&nbsp;</td></tr>';
	$echo.= '</body></html>';
}
}
return $echo;
}
function get_email($idd)
{
	$r=sql("SELECT * FROM orders WHERE idd='$idd' LIMIT 1 "); 
	if(mysqli_num_rows($r)!=0){ 
        $row = mysqli_fetch_array($r);
		$email=$row['email'];
		}
	else $email="";
	mysqli_free_result($r);
	return $email;
}
function OrderToPrint($idd,$language){
global $userid;	
$Version = whichshop3();
if($Version=='stoppart') $topurl="stoppart.com"; else $topurl="ifarfor.ru";
$ordernum=$idd;$today = date("d.m.Y");$number=$idd;if ($number=='')$number=0;
$row=sql("SELECT promo FROM orders WHERE userid='$userid' and idd='$ordernum' LIMIT 1"); 
if(mysqli_num_rows($row)!=0){$r=mysqli_fetch_array($row);$promo=$r['promo'];}

if($language=="en") {
$TextPhone2txt="Additional phone";$TipOfDostavka1='Delivery to issue point';$TextAddresstxt1='Issue point:<br>&nbsp;Address';
$WorkingHours='Working hours';$PhoneN='Phone';$DeliveryToHome='Delivery to home';$Recipient='Recipient';$IP="IMPERIAL PORCELAIN";
$CONFIRMATION="CONFIRMATION OF AN ORDER";$CONFIRMATION2="We confirm that we received your order.<br><br>
The letter contains the details of the order. If you want to change the shipping information, please contact us. <br> <br>
When your order is sent, you will receive an email about it.";$NumberofOrder='Number of the order';$DataTXT='Data';
$DeliveryKind="Kind of delivery";$NameTXT='Name';$ArticulTXT='Vendor code';$CostTXT='Cost';$ST="PC";$AmountTXT='Amount';$EmptyTXT="Basket is empty";
$NameLNG='english';$NGrandTotal="GRAND TOTAL";$RURTXT='RUR';$NGrandTotalPromo="Grand Total with promo discount";$ADRTXT='Delivery address';
if($Version=='ifarfor') $PHONENUM='+7 927 268-15-33'; else $PHONENUM='+7(937)232-07-84';
$subject1="Confirmation of the order";

$subject2="from the site $topurl";
}
else{
$TextPhone2txt="Дополнительный телефон";$TipOfDostavka1='Доставка в пункт выдачи';$TextAddresstxt1='Пункт выдачи:<br>&nbsp;Адрес';
$WorkingHours='Время работы';$PhoneN='Телефон';$DeliveryToHome='Доставка на дом';$Recipient='Получатель';$IP="ИМПЕРАТОРСКИЙ ФАРФОР";
$CONFIRMATION="ПОДТВЕРЖДЕНИЕ ЗАКАЗА";$CONFIRMATION2="Мы подтверждаем, что получили ваш заказ.<br><br>
К письму прилагаются подробности заказа. Если вы хотите изменить информацию о доставке, пожалуйста, свяжитесь с нами.<br><br>
Когда ваш заказ будет отправлен, вы получите электронное сообщение об этом.";$NumberofOrder='Номер заказа';$DataTXT='Дата';
$DeliveryKind='Способ доставки';$NameTXT='Наименование';$ArticulTXT='Артикул';$CostTXT='Цена';$ST="Шт";$AmountTXT='Сумма';$EmptyTXT="товары не подобраны";
$NameLNG='name';$NGrandTotal="Общая сумма заказа";$RURTXT='РУБ';$NGrandTotalPromo="Сумма заказа со скидкой по промокоду";$ADRTXT='Адрес доставки';
if($Version=='ifarfor') $PHONENUM='8 (800) 2222-850'; else $PHONENUM='+7(937)232-07-84';
$subject1="Подтверждение заказа";$subject2="на сайте $topurl";
}
//mysqli_free_result($row);
$r=sql("SELECT * FROM users WHERE userid='$userid' LIMIT 1");
if(mysqli_num_rows($r)!=0){
	$row = mysqli_fetch_array($r);
	$login=$row['login'];
	$name=$row['name'];
	$password=$row['password'];
	$phone=$row['phone'];
	$date=$row['date'];
	$hash=$row['hash'];
	$imya=$row['imya'];	
	$otchestvo=$row['otchestvo'];	
	$familia=$row['familia'];	
	$email=$row['email'];	
	$adres=$row['adres'];	
	$town=$row['town'];	
	$country=$row['country'];	
	$phone2=$row['phone2'];	
	$regionpunkt=$row['regionpunkt'];	
	$citypunkt=$row['citypunkt'];		
	$Address=$row['addresspunkt'];	
	$TextPhone2='';	if($phone2!='')$TextPhone2="<br>$TextPhone2txt: $phone2<br>";
	}
	if ($hash=='1') {
	$TipOfDostavka=$TipOfDostavka1;
	$addr111=sql("SELECT * FROM punkts WHERE ID='$Address' LIMIT 1");
		if(mysqli_num_rows($addr111)!=0)    $row2 = mysqli_fetch_array($addr111);
		$AddressPunkta=$row2['Address'];
		$TimePunkta=$row2['WorkTime'];
		$PhonePunkta=$row2['Phone'];
	$TextAddress=$regionpunkt.'. '.$citypunkt.'. <br><br>'.$TextAddresstxt1.':'.$AddressPunkta."<br>&nbsp;$WorkingHours: $TimePunkta.<br> 
	&nbsp;$PhoneN: $PhonePunkta"
	."<br><br>Получатель: $familia $imya $otchestvo<br>$PhoneN: ".$phone."<br>$TextPhone2";
	}
	elseif ($hash=='2') {
	$TipOfDostavka=$DeliveryToHome;
	$TextAddress=$country.'. '.$town.'. '.$adres.'.<br>'.$PhoneN.': '.$phone."<br>$TextPhone2
	<br>email: $email login: $login
	<br>$Recipient: $familia $imya $otchestvo";	
	}
	mysqli_free_result($r);
$text='
<table align="center" bgcolor="#FFFFFF" width="800" cellspacing="0" cellpadding="0" border="0">
<tr><td style="text-align:center;vertical-align:middle;font-family : Times;FONT-SIZE:34PX;height:50px;"><b>'.$IP.'</b></td></tr>
<tr><td style="background-color:#7F7355;color:white;text-align:center;width:100%;height:26px;FONT-SIZE:18PX;"><b>'.$CONFIRMATION.'</b></td></tr>
<tr><td style="text-color:#7F7355;text-align:center;FONT-SIZE:16PX;height:40px;border-bottom:1px solid black;">'.$date.'</td></tr>
<tr><td style="text-align:left;FONT-SIZE:14PX;border-bottom:1px solid black;padding-left:10px;padding-top:20px;padding-right:10px;padding-bottom:20px;">
'.$CONFIRMATION2.'
</td></tr>
<tr><td style="text-align:justify;FONT-SIZE:16PX;border-bottom:1px solid black;">
<table align="center" bgcolor="#FFFFFF" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td style="width:25%;text-align:left;FONT-SIZE:15PX;height:20px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
'.$NumberofOrder.': '.$number.'</td>
<td style="width:25%;text-align:left;FONT-SIZE:15PX;height:30px;padding-left:20px;">
'.$DataTXT.': '.$today.' </td>
<td style="width:50%;text-align:left;FONT-SIZE:15PX;height:30px;padding-left:20px;">
'.$DeliveryKind.': '.$TipOfDostavka.'.</td></tr></table>
</td></tr>
<tr><td style="text-align:justify;border-bottom:1px solid black;">
<table align="center" bgcolor="#FFFFFF" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td style="width:50%;text-align:left;FONT-SIZE:14PX;height:30px;border-bottom:1px solid black;padding-left:20px;background-color:#7F7355;color:white;">
'.$NameTXT.'</td><td style="width:15%;text-align:center;FONT-SIZE:14PX;border-bottom:1px solid black;background-color:#7F7355;color:white;">
'.$ArticulTXT.'</td><td style="width:15%;text-align:center;FONT-SIZE:14PX;border-bottom:1px solid black;background-color:#7F7355;color:white;">
'.$CostTXT.'</td><td style="width:5%;text-align:center;FONT-SIZE:14PX;border-bottom:1px solid black;background-color:#7F7355;color:white;">
'.$ST.'</td><td style="width:15%;text-align:center;FONT-SIZE:14PX;border-bottom:1px solid black;background-color:#7F7355;color:white;">
'.$AmountTXT.'</td></tr>';
$r=sql("SELECT boxid,orderid FROM box WHERE idd='$idd' AND userid='$userid'"); 
if(mysqli_num_rows($r)==0) $text.=$EmptyTXT; 
else{
	$sum=0;
	$r=sql("SELECT box.comp_id,box.tov_id,tovsNew.price1s,boxid,kol,tovsNew.name,tovsNew.english,tovsNew.tip,tovsNew.sklad,tovsNew.zakaz,tovsNew.ida,tovsNew.Imagefile  FROM box INNER JOIN tovsNew ON box.tov_id = tovsNew.id WHERE  box.idd='$idd' AND userid='$userid' ORDER BY 7,6"); 
      (integer)$sumDostup=0;
	while ($row = mysqli_fetch_array($r)){ 
		$link2=aPSID('/set.php?oper=del_tov&boxid='.$row['boxid']);
		$text.= '<tr>
		<td style="height:30px;padding-left:20px;
		padding-top:7px;padding-bottom:7px;text-align:left;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">'.$row[$NameLNG].'</td>
		<td style="padding-top:7px;padding-bottom:7px;text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">'.$row['ida'].'</td>
		<td style="padding-top:7px;padding-bottom:7px;padding-left:10px;text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">'.$row['price1s'].'Р.</td>
		<td style="padding-top:7px;padding-bottom:7px;text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">';
		$text.=$row['kol'].'</td>
		<td style="padding-top:7px;padding-bottom:7px;text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">'.($row['kol']*$row['price1s']).'Р.</td>
		</tr>';
		$sum=$sum+($row['price1s']*$row['kol']);
		}
mysqli_free_result($r);
}
$text.='
<tr><td colspan="4" height="30" style="text-align:right;FONT-SIZE:16PX;height:30px;border-bottom:1px solid black;padding-right:10px;background-color:#7F7355;color:white;">
'.$NGrandTotal.':</td><td style="height:30px;text-align:center;FONT-SIZE:16PX;height:20px;border-bottom:1px solid black;padding-left:10px;background-color:#7F7355;color:white;">
'.$sum.$RURTXT.'</td></tr>';
if($promo!='')
$text.='<tr><td colspan="4" height="30" style="text-align:right;FONT-SIZE:16PX;height:30px;border-bottom:1px solid black;padding-right:10px;background-color:#7F7355;color:white;">
'.$NGrandTotalPromo.' '.$promo.':</td>
<td style="height:30px;text-align:center;FONT-SIZE:16PX;height:20px;border-bottom:1px solid black;padding-left:10px;background-color:#7F7355;color:white;">
'.($sum*0.98).'Р.</td></tr>';
$text.='<tr><td style="text-align:right;FONT-SIZE:16PX;height:60px;border-bottom:1px solid black;padding-right:30px;padding-top:15px;padding-bottom:15px;">
'.$ADRTXT.':</td><td colspan="4" style="padding-top:15px;padding-bottom:15px;text-align:left;FONT-SIZE:16PX;border-bottom:1px solid black;padding-right:20px;padding-left:5px;">
'.$TextAddress.'</td></tr>
<tr><td style="text-align:left;FONT-SIZE:14PX;height:30px;border-bottom:1px solid black;padding-left:30px;background-color:#7F7355;color:white;padding-top:10px;padding-bottom:10px;">
'.$PHONENUM.'</td>
<td colspan="4" style="text-align:right;FONT-SIZE:14PX;border-bottom:1px solid black;padding-right:30px;background-color:#7F7355;color:white;padding-top:10px;padding-bottom:10px;">
order2 @ '.$topurl.'. ru</td></tr>';
return $text;
}
function send_order_by_email($idd,$language){
global $userid;$number=$idd;
$Version = whichshop3();
if($Version=='stoppart') $topurl="stoppart.com"; else $topurl="ifarfor.ru";
$r=sql("SELECT * FROM users WHERE userid='$userid' LIMIT 1");if(mysqli_num_rows($r)!=0){$row = mysqli_fetch_array($r);$email=$row['email'];}
if($language=="en") {$subject1="Confirmation of the order";$subject2="from the site ".$topurl.".ru";$IP="IMPERIAL PORCELAIN";}
else{$subject1="Подтверждение заказа";$subject2="на сайте Императорский фарфор";$IP="ИМПЕРАТОРСКИЙ ФАРФОР";}
$text=OrderToPrint($idd,$language).'</tr>';
$textpobeda=$text;
$text.='</table></td></tr></td></tr></table></body></html>';
mysqli_free_result($r);
$r=sql("SELECT box.comp_id,box.tov_id,tovsNew.price1s,boxid,kol,tovsNew.name,tovsNew.tip,tovsNew.sklad,tovsNew.zakaz,tovsNew.ida,tovsNew.Imagefile,tovsNew.id  FROM box INNER JOIN tovsNew ON box.tov_id = tovsNew.id WHERE  box.idd='$idd' AND comp_id=0 AND userid='$userid' ORDER BY 7,6"); 		
while ($row = mysqli_fetch_array($r)){ 
		$link2=aPSID('/set.php?oper=del_tov&boxid='.$row['boxid']);
		$idtn=$row['id'];
		$quant=QuantsInShop($idtn,0,$language);
		$textpobeda.= '<tr><td style="height:30px;padding-left:20px;
		padding-top:7px;padding-bottom:7px;text-align:left;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">'.$row['name'].'</td>
		<td style="padding-top:7px;padding-bottom:7px;text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">'.$row['ida'].'</td>
		<td style="padding-top:7px;padding-bottom:7px;padding-left:10px;text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">'.$row['price1s'].'Р.</td>
		<td style="padding-top:7px;padding-bottom:7px;text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">';
		$textpobeda.=$row['kol'].'</td>
		<td style="padding-top:7px;padding-bottom:7px;text-align:center;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">'.($row['kol']*$row['price1s']).'Р.</td>
		</tr><tr><td colspan="5" style="height:30px;padding-left:20px;
		padding-top:7px;padding-bottom:7px;text-align:left;vertical-align:middle;border-bottom: 1px solid gray;font-size:14px;">'.
		$quant.'</td></tr>';
		}
mysqli_free_result($r);
$textpobeda.='</tr></table></td></tr></td></tr></table></body></html>';
$subject="$subject1 $number $subject2";
$sender = "=?utf-8?B?" . base64_encode($IP) . "?= <" . "site@".$topurl.".ru" . ">";
$header="Content-type: text/html; charset=\"utf-8\"\r\n";
$header.="From: $sender\r\n";
$header.="Subject: $subject"."\r\n";
$header.="Content-type: text/html; charset=\"utf-8\"\r\n";
$msg=$text;
$subject = "=?utf-8?b?" . base64_encode($subject) . "?=";
mail("site@ifarfor.ru", $subject, $msg, $header);
if(filter_var($email, FILTER_VALIDATE_EMAIL)) mail($email, $subject, $msg, $header);
$msg=$textpobeda;
mail("pobeda@ifarfor.ru", $subject, $msg, $header);
//if($r) 
return $text;
// else return ("err");
}
function makeoffer($view) 
{
global $language;
if($language=="en") 
{}
else
{}
$stroka='';
$usualtov='';
//расчет переменных	
//
$query1=sql("SELECT * FROM tovsNew WHERE ida='$view'");
$row = mysqli_fetch_array($query1);
if(mysqli_num_rows($query1)>0){
	$rowname=str_replace ("/","-", $row['name']);
	$rowname=str_replace (","," ", $rowname);
	$rowname=str_replace ("  "," ", $rowname);
	$rowArtikul=$row['ida'];
	/////////////////////////////////////////////////////////////////
	$url="http://www.ifarfor.ru/shop/ware/view".$rowArtikul;/////////
	/////////////////////////////////////////////////////////////////
	$rowRealID=	$row['id'];
	/////////////////////////////////////////////////////////////////
	$id=$rowRealID;//////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////
	$groupid=$row['idg'];////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////
	$id=$rowRealID;//////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////	
	$rowCollection=$row['Collection'];//1
	$roww=mysqli_fetch_array(sql("SELECT name FROM picture WHERE id='".$row['Picture']."'"));
	$rowPicture=$roww['name'];//2
	$roww=mysqli_fetch_array(sql("SELECT name FROM form WHERE id='".$row['Form']."'"));
	$rowForm=$roww['name'];//3
	$roww=mysqli_fetch_array(sql("SELECT name FROM material WHERE id='".$row['TipOfMaterial']."'"));		
	$rowTipOfMaterial=$roww['name'];//4
	$rowPerson=$row['Person'];//5
	$rowPredmetov=$row['Predmetov'];//6
	$roww=mysqli_fetch_array(sql("SELECT name FROM creator WHERE id='".$row['AutorForm']."'"));		
	$rowAutorForm=$roww['name'];//7
	$roww=mysqli_fetch_array(sql("SELECT name FROM creator WHERE id='".$row['AutorPicture']."'"));	
	$rowAutorPicture=$roww['name'];//8
	$roww=mysqli_fetch_array(sql("SELECT * FROM tovsNew LEFT JOIN brand ON brand.id = tovsNew.Factory WHERE tovsNew.ida='$view'"));			
	$rowFactory=$roww['name'];$strana=$roww['Strana'];
	if($rowFactory=='Императорский фарфоровый завод') $rowFactory='ИФЗ';
	$factory=$rowFactory;
	$rowVid=$row['Vid'];
	$rowTip=$row['Tip'];		
	$engvid=$row['videnglish'];
	$engtip=$row['tipenglish'];
	$Height=$row['Height'];		$Capacity=$row['Capacity'];		$Diameter=$row['Diameter'];$Width=$row['Width'];
	$Nnewprice=$row['price1s'];
	/////////////////////////////////////////////////////////////////
	$price=$Nnewprice;///////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////	
	$PPPers='';
	if($rowPerson!='0' and $rowPerson!='' and $rowPerson!='1'  and $rowPredmetov!='0' and $rowPredmetov!='1' and $rowPredmetov!='') $PPPers=$rowPerson."/".$rowPredmetov.' ';
//echo $rowname$rowVid,$rowTip,$rowPicture,$rowForm,$rowTipOfMaterial,$rowPerson,$rowPredmetov,$rowAutorPicture,$Height,$Capacity,$Diameter,$Width;
	$frontname=MakeFrontName($brandid,$rowname,$rowVid,$rowTip,$rowPicture,$rowForm,$rowTipOfMaterial,$rowPerson,$rowPredmetov,$rowAutorPicture,$Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
	//echo '-1-';
	$frontname=$rowname;
/*	if ($rowVid=="Бокал с бл.с крышкой") $rowVid="Бокал с блюдцем и крышкой";
	if ($rowVid=="Комплект детский в чемода") $rowVid="Комплект детский в чемоданчике.";
	if ($rowTip=="трёхпредметный в чемоданч")$rowTip="трёхпредметный в чемоданчике";
	if ($rowVid=="Чашка с блюдцем" and $rowTip=="чайн.") $rowTip="чайная";
	if ($rowVid=="Чашка с блюдцем и крышкой" and $rowTip=="чайн.") $rowTip="чайная";
	if ($rowVid=="Чашка с блюдцем" and $rowTip=="кофейн.") $rowTip="кофейная";
	if ($rowVid=="Подарочный набор" and $rowTip=="кофейн.") $rowTip="кофейный";*/
	///////////////
	$NeedName='';
	if($rowVid=='' or ($rowPicture=='' and $rowForm=='')) $NeedName="$frontname";//rowname
	if($rowTip=='') $tip=htmlspecialchars(($rowVid),ENT_QUOTES);
	else $tip=htmlspecialchars(($rowVid.' '.$rowTip),ENT_QUOTES);
	if($rowVid!="Скульптура"){
		if($rowPicture=='') $model=$rowForm." ".$PPPers;
		elseif($rowForm=='') $model=$rowPicture." ".$PPPers;
		else $model=$rowPicture." ".$rowForm." ".$PPPers;
	}
	else {
		if($rowForm=='') $model=$rowPicture;
		elseif($rowPicture=='') $model=$rowForm;
		else $model=$rowForm." ".$rowPicture;
	}
	if($rowTipOfMaterial!='') $model.=' '.$rowTipOfMaterial; 
	if ($rowVid=="Декоративная тарелка" and $rowAutorPicture!='') $model.=' '.$rowAutorPicture; 
//$FirstName=$FirstName.$frontname;
//$FirstName=$FirstName."1$rowname,2$rowVid,3$rowTip,4$rowPicture,5$rowForm,6$rowTipOfMaterial,7$rowPerson,8$rowPredmetov,9$rowAutorPicture,10$Height,11$Capacity,12$Diameter,13$Width";
	//заполним как надо
	$picture='';	
	$filename5="foto/".$view.".jpg";
	if (file_exists($filename5)) {
		$perem="/".$filename5;
		$picture.='<picture>http://www.ifarfor.ru'.$perem.'</picture>';
		}
//	if($fname!='') {//echo "<tr><td><img src='$fname' width='100%'>";	
	$indeed=2;//picture
	while($indeed!=0)
	{
		$filename5="foto/".$view."-".$indeed.".jpg";
		if (file_exists($filename5)) {
			$perem="/".$filename5;
			$picture.='<picture>http://www.ifarfor.ru'.$perem.'</picture>';
			$indeed++;
			if($indeed==7)$indeed=0;
			}
		else $indeed=0;
	}
	$Description='';
	if($rowVid!="")$Description.="<p>$rowTipOfMaterial</p>";
	//Ручная роспись
	if($rowAutorForm!="" and $rowAutorForm!='-')$Description.="<p>Автор формы: $rowAutorForm</p>";
	if($rowAutorPicture!="" and $rowAutorPicture!='-')$Description.="<p>Автор росписи: $rowAutorPicture</p>";
	if($rowFactory!="")$Description.="<p>Производитель: $rowFactory</p>";
	//Объем и размер
	$tagform=='';	if($rowForm!='' and $rowForm!='-')$tagform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagform$rowForm")."'>#$rowForm</a>&nbsp;&nbsp;";
	$tagpic=='';	if($rowPicture!='' and $rowPicture!='-')$tagpic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagpic$rowPicture")."'>#$rowPicture</a>&nbsp;&nbsp;";
	$tagaform=='';	if($rowAutorForm!='' and $rowAutorForm!='-')$tagaform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagaform$rowAutorForm")."'>#$rowAutorForm</a>&nbsp;&nbsp;";
	$tagapic=='';	if($rowAutorPicture!='' and $rowAutorPicture!='-')$tagapic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagapic$rowAutorPicture")."'>#$rowAutorPicture</a>&nbsp;&nbsp;";
	$memb=$row['memberID1'];$memq=$row['memberQuant1'];
	$DescriptionSostav='';
	if ($rowVid!='Сервиз') 
		{
		$rowmemberID1=$row['memberID1'];
		if($rowmemberID1!='')
			{
			$rommemberQuant1=$row['memberQuant1'];
			$ruru=sql("SELECT * FROM tovsNew WHERE id='$rowmemberID1'");
			$countruru=mysqli_num_rows($ruru);
			}
		if($countruru>0 and $rowmemberID1!='')
			{
			$rowmem = mysqli_fetch_array($ruru);
			$rowname=$rowmem['name'];
			$rowVid=$rowmem['Vid'];
			$rowTip=$rowmem['Tip'];
			$DescriptionSostav.="<p>Состав :</p><ul><li>$rowVid $rowTip $rommemberQuant1 шт</li>";	
			$rowmemberID2=$row['memberID2'];
			if($rowmemberID2!='')
				{
				$rommemberQuant2=$row['memberQuant2'];
				$rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID2'"));
				$rowname=$rowmem['name'];
				$rowVid=$rowmem['Vid'];
				$rowTip=$rowmem['Tip'];
				$DescriptionSostav.="<li>$rowVid $rowTip $rommemberQuant2 шт</li>";	
				}
			$rowmemberID3=$row['memberID3'];
			if($rowmemberID3!='')
				{
				$rommemberQuant3=$row['memberQuant3'];
				$rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID3'"));
				$rowname=$rowmem['name'];
				$rowname=str_replace ("1 2","1/2", $rowname);
				$rowVid=$rowmem['Vid'];
				$rowTip=$rowmem['Tip'];
				$DescriptionSostav.="<li>$rowVid $rowTip $rommemberQuant3 шт</li>";	
				}
			$rowmemberID4=$row['memberID4'];
			if($rowmemberID4!='')
				{
				$rommemberQuant4=$row['memberQuant4'];
				$rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID4'"));
				$rowname=$rowmem['name'];
				$rowVid=$rowmem['Vid'];
				$rowTip=$rowmem['Tip'];
				$DescriptionSostav.="<li>$rowVid $rowTip $rommemberQuant4 шт</li>";	
				}
			$DescriptionSostav.="</ul>";
			}
		}
	$rowDiameter=$row['Diameter'];
	$rowWidth=$row['Width'];
	$rowHeight=$row['Height'];
	$rowCapacity=$row['Capacity'];
	$rowVid=$row['Vid'];
	$rowTip=$row['Tip'];
	$rowID=array();
	$rowID+=array($row['memberID1'].a=> $row['memberQuant1']); 
	$rowID+=array($row['memberID2'].b=> $row['memberQuant2']); 
	$rowID+=array($row['memberID3'].c=> $row['memberQuant3']); 
	$rowID+=array($row['memberID4'].d=> $row['memberQuant4']); 
	$rowID+=array($row['memberID5'].e=> $row['memberQuant5']); 
	$rowID+=array($row['memberID6'].f=> $row['memberQuant6']); 
	$rowID+=array($row['memberID7'].g=> $row['memberQuant7']); 
	$rowID+=array($row['memberID8'].h=> $row['memberQuant8']); 
	$rowID+=array($row['memberID9'].i=> $row['memberQuant9']); 
	$rowID+=array($row['memberID10'].j=> $row['memberQuant10']); 
	$rowID+=array($row['memberID11'].k=> $row['memberQuant11']); 
	ksort ($rowID);
	if ($rowVid=='Сервиз' or $rowVid=='Комплект детский') 
		{
		if($memb!='' and $memq!='') $DescriptionSostav.="<p>Состав комплекта:</p><ul>";
		foreach ($rowID as $kbr1 => $tbr) 
			{
			$kbr=substr($kbr1, 0, -1);
			$useheight=0;
			if($tbr>0)
				{
				if($kbr=='C001051'){if($rowCapacity>'0')$DescriptionSostav.="<li>Чайник $rowCapacity мл: $tbr шт.</li>"; else $DescriptionSostav.="<li>Чайник: $tbr шт."."</li>";}
				elseif($kbr=='C0010001'){if($rowCapacity>'0')$DescriptionSostav.="<li>Кофейник $rowCapacity мл: $tbr шт.</li>"; else $DescriptionSostav.="<li>Кофейник: $tbr шт."."</li>";}
				elseif($kbr=='C001052'){if($rowWidth>'0')$DescriptionSostav.="<li>Сахарница $rowWidth мл: $tbr шт.</li>"; else $DescriptionSostav.="<li>Сахарница: $tbr шт."."</li>";}
				elseif($kbr=='C001053'){
					if($rowHeight>'0')$DescriptionSostav.="<li>Чашка $rowHeight мл: $tbr шт.</li>"; else $DescriptionSostav.="<li>Чашка: $tbr шт."."</li>";
					if($rowDiameter>'0')$DescriptionSostav.="<li>Блюдце $rowDiameter мм: $tbr шт.</li>"; else $DescriptionSostav.="<li>Блюдце: $tbr шт."."</li>";
					}
				elseif($kbr=='C001054'){$DescriptionSostav.="<li>Блюдце: $tbr шт</li>";}
				elseif($kbr=='C001055'){$DescriptionSostav.="<li>Тарелка десертная: $tbr шт</li>";}
				elseif($kbr=='C001056'){$DescriptionSostav.="<li>Сливочник: $tbr шт</li>";}
				elseif($kbr=='C001057'){$DescriptionSostav.="<li>Вазочка для варенья: $tbr шт</li>";}
				elseif($kbr=='C001058'){$DescriptionSostav.="<li>Ваза для цветов: $tbr шт</li>";}
				elseif($kbr=='C001059'){$DescriptionSostav.="<li>Сухарница: $tbr шт</li>";}
				elseif($kbr=='C001060'){$DescriptionSostav.="<li>Конфетница: $tbr шт</li>";}
				elseif($kbr=='C001061'){$DescriptionSostav.="<li>Ваза для конфет: $tbr шт</li>";}
				//столовый rowDiameter
				elseif($kbr=='C001062'){if($rowWidth>'0')$DescriptionSostav.="<li>Тарелка глубокая $rowWidth мм: $tbr шт.</li>"; else $DescriptionSostav.="<li>Тарелка глубокая: $tbr шт."."</li>";}
				elseif($kbr=='C001063'){if($rowHeight>'0')$DescriptionSostav.="<li>Тарелка плоская $rowHeight мм: $tbr шт.</li>"; else $DescriptionSostav.="<li>Тарелка плоская: $tbr шт."."</li>";$rowHeight=$rowDiameter;}
				elseif($kbr=='C001064'){if($tbr>10)$DescriptionSostav.="<li>Салатник большой ".$tbr."0 мл: 1 шт.</li>"; else $DescriptionSostav.="<li>Салатник большой: $tbr шт."."</li>";}
				elseif($kbr=='C001065'){if($rowCapacity>'0')$DescriptionSostav.="<li>Салатник малый $rowCapacity мм: $tbr шт.</li>"; else $DescriptionSostav.="<li>Салатник малый: $tbr шт."."</li>";}
				elseif($kbr=='C001066'){if($tbr>10)$DescriptionSostav.="<li>Блюдо овальное ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Блюдо овальное: $tbr шт."."</li>";}
				elseif($kbr=='C001067'){if($tbr>3)$DescriptionSostav.="<li>Перечница (Высота ".$tbr." мм): 1 шт.</li>"; else $DescriptionSostav.="<li>Перечница: $tbr шт."."</li>";}
				elseif($kbr=='C001068'){if($tbr>3)$DescriptionSostav.="<li>Солонка (Высота ".$tbr." мм): 1 шт.</li>"; else $DescriptionSostav.="<li>Солонка: $tbr шт."."</li>";}			
				elseif($kbr=='C001069'){if($tbr>15)$DescriptionSostav.="<li>Пиала ".$tbr." мл: 1 шт.</li>"; else $DescriptionSostav.="<li>Пиала: $tbr шт."."</li>";}			
				elseif($kbr=='C001070'){if($tbr>15)$DescriptionSostav.="<li>Соусник ".$tbr." мл: 1 шт.</li>"; else $DescriptionSostav.="<li>Соусник: $tbr шт."."</li>";}			
				elseif($kbr=='C001071'){if($tbr>3)$DescriptionSostav.="<li>Супница ".$tbr."0 мл: 1 шт.</li>"; else $DescriptionSostav.="<li>Супница: $tbr шт."."</li>";}			
				elseif($kbr=='C001072'){if($tbr>10)$DescriptionSostav.="<li>Блюдо прямоугольное ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Блюдо прямоугольное: $tbr шт."."</li>";}
				elseif($kbr=='C001073'){if($tbr>10)$DescriptionSostav.="<li>Блюдо круглое ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Блюдо круглое: $tbr шт."."</li>";}
				elseif($kbr=='C001074'){if($tbr>10)$DescriptionSostav.="<li>Блюдце под соусник ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Блюдце под соусник: $tbr шт."."</li>";}
				elseif($kbr=='C001092'){if($tbr>15)$DescriptionSostav.="<li>Кольцо для салфеток ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Кольцо для салфеток: $tbr шт."."</li>";}
				}
			}
		if($memb!='' and $memq!='') $DescriptionSostav.="</ul>";
		}
	elseif ($rowVid=='Набор столовых приборов') {
		if($memb!='' and $memq!='') $DescriptionSostav.="<p>Состав комплекта:</p><ul>";
		foreach ($rowID as $kbr1 => $tbr) 
			{
			$kbr=substr($kbr1, 0, -1);
			if($tbr>0)
				{
				if($kbr=='M0000394'){$DescriptionSostav.="<li>Ложка столовая: $tbr шт</li>";}
				elseif($kbr=='M0000395'){$DescriptionSostav.="<li>Вилка столовая: $tbr шт</li>";}
				elseif($kbr=='M0000396'){$DescriptionSostav.="<li>Нож столовый: $tbr шт</li>";}
				elseif($kbr=='M0000397'){$DescriptionSostav.="<li>Ложка десертная: $tbr шт</li>";}
				elseif($kbr=='M0000398'){$DescriptionSostav.="<li>Вилка десертная: $tbr шт</li>";}
				elseif($kbr=='M0000399'){$DescriptionSostav.="<li>Щипцы для сахара: $tbr шт</li>";}
				elseif($kbr=='M0000400'){$DescriptionSostav.="<li>Сервировочная ложка: $tbr шт</li>";}
				elseif($kbr=='M0000401'){$DescriptionSostav.="<li>Сервировочная вилка: $tbr шт</li>";}
				elseif($kbr=='M0000402'){$DescriptionSostav.="<li>Лопатка для торта: $tbr шт</li>";}
				elseif($kbr=='M0000403'){$DescriptionSostav.="<li>Ложка для соуса: $tbr шт</li>";}
				elseif($kbr=='M0000404'){$DescriptionSostav.="<li>Суповой половник: $tbr шт</li>";}
	//			elseif($kbr=='М0000405'){echo"<li>Сервировочная вилка: $tbr шт</li>";}
				}
			}
		if($memb!='' and $memq!='') $DescriptionSostav.="</ul>";
		}
	elseif ($rowVid=='Комплект чайников') 
		{
		$textDiameter='Высота доливного чайника';
		$textWidth='Объём заварного чайника';
		$textHeight='Высота заварного чайника';
		$textCapacity='Объём доливного чайника';
		if(($rowDiameter!='' and $rowDiameter!='0') or ($rowCapacity!='' and $rowCapacity!='0') or ($rowHeight!='' and $rowHeight!='0') or ($rowWidth!='' and $rowWidth!='0')) $ul=1;else $ul=0;
		if($ul==1) $DescriptionSostav.="<ul>";
		if($rowDiameter!='' and $rowDiameter!='0')$DescriptionSostav.="<li>$textDiameter: $rowDiameter мм</li>";	
		if($rowCapacity!='' and $rowCapacity!='0')$DescriptionSostav.="<li>$textCapacity: $rowCapacity мл</li>";	
		if($rowHeight!='' and $rowHeight!='0')$DescriptionSostav.="<li>$textHeight: $rowHeight мм</li>";	
		if($rowWidth!='' and $rowWidth!='0')$DescriptionSostav.="<li>$textWidth: $rowWidth мл</li>";	
		if($ul==1) $DescriptionSostav.="</ul>";
		}
	elseif ($rowVid=='Комплект' and $rowTip=='трехпредметный') 
		{
		$textDiameter='Диаметр блюдца';
		$textWidth='Диаметр десертной тарелки';
		$textHeight='Высота чашки';
		$textCapacity='Объём чашки';
		if(($rowDiameter!='' and $rowDiameter!='0') or ($rowCapacity!='' and $rowCapacity!='0') or ($rowHeight!='' and $rowHeight!='0') or ($rowWidth!='' and $rowWidth!='0')) $ul=1; else $ul=0;
		if($ul==1) $DescriptionSostav.="<ul>";
		if($rowCapacity!='' and $rowCapacity!='0')$DescriptionSostav.="<li>$textCapacity: $rowCapacity мл</li>";	
		if($rowHeight!='' and $rowHeight!='0')$DescriptionSostav.="<li>$textHeight: $rowHeight мм</li>";	
		if($rowDiameter!='' and $rowDiameter!='0')$DescriptionSostav.="<li>$textDiameter: $rowDiameter мм</li>";	
		if($rowWidth!='' and $rowWidth!='0')$DescriptionSostav.="<li>$textWidth: $rowWidth мм</li>";	
		if($ul==1) $DescriptionSostav.="</ul>";
		}
	else
		{
		if($rowDiameter!='' and $rowDiameter!='0')
			{
			if ($rowVid=='Чашка с блюдцем') $textDiameter='Диаметр блюдца';
			elseif ($rowVid=='Шкатулка') $textDiameter='Длина'; 
	//		elseif (($rowVid=='Сервиз') and ($rowTip=='чайный' or $rowTip=='кофейный')) $textDiameter='Диаметр блюдца'; 
			else $textDiameter='Диаметр';
			$DescriptionSostav.="<p>$textDiameter: $rowDiameter мм</p>";	
			}
		if($rowWidth!='' and $rowWidth!='0')
			{
			$razmer='мм';
			if ($rowVid=='Чашка с блюдцем') $textWidth='Диаметр верхнего края чашки'; else $textWidth='Ширина';
			if ($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный') {$textWidth='Объем сахарницы'; $razmer='мл';}
			$DescriptionSostav.="<p>$textWidth: $rowWidth $razmer</p>";
			}
		if($rowHeight!='' and $rowHeight!='0')
			{
			$razmer='мм';
			if ($rowVid=='Чашка с блюдцем') $textHeight='Высота чашки'; else $textHeight='Высота';
			if ($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный') {$textHeight='Объем чашки'; $razmer='мл';}
			$DescriptionSostav.="<p>$textHeight: $rowHeight $razmer</p>";	
			}
		if($rowCapacity!='' and $rowCapacity!='0')
			{
			$textDiameter='Объем';
			if ($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный') {$textDiameter='Объем чайника'; $razmer='мл';}
			$DescriptionSostav.="<p>$textDiameter: $rowCapacity мл</p>";	
			}
		}
	$usualtov='';
	if($picture!=''){if($NeedName=='') $tttype='type="vendor.model" ';
		$usualtov='
		<offer id="'.$view.'" '.$tttype.'available="true" bid="1" cbid="1" fee="1">
		<url>'.$url.'</url>
		<price>'.ceil($price).'</price>
		<currencyId>RUR</currencyId>
		<categoryId>'.TransIdForYandex($groupid).'</categoryId>
		'.$picture.'
		<store>true</store>
		<pickup>true</pickup>
		<delivery>true</delivery>';
		if($NeedName!='')$usualtov.='<name>'.$NeedName.'</name>';
		else $usualtov.='<typePrefix>'.$tip.'</typePrefix>';
		$usualtov.='
		<vendor>'.$factory.'</vendor>
		<model>'.$model.'</model>';
	if($DescriptionSostav!='' or $Description!='')
			{
			$usualtov.='<description><![CDATA[';
			if($Description!='')$usualtov.=$Description;
			if($DescriptionSostav!='')$usualtov.=$DescriptionSostav;
			$usualtov.=']]></description>';
			}
		$usualtov.='
		<sales_notes>Бесплатная доставка по России от 5000р.</sales_notes>
		<age>0</age>
		<manufacturer_warranty>false</manufacturer_warranty>';
		//$Height,$Capacity,$Diameter,$Width);
		if($rowPicture!='') $usualtov.='<param name="Рисунок">'.$rowPicture.'</param>';
		if($rowForm!='') $usualtov.='<param name="Форма">'.$rowForm.'</param>';
		if($rowTipOfMaterial!='') $usualtov.='<param name="Материал">'.$rowTipOfMaterial.'</param>';
		//if($rowPerson!='' and $rowPerson!='0' and $rowPerson!='1') $usualtov.='<param name="Рисунок">'.$rowPerson.'</param>';
		//if($rowPredmetov!='') $usualtov.='<param name="Рисунок">'.$rowPredmetov.'</param>';
		if($rowAutorPicture!='' and $rowAutorPicture!='-') $usualtov.='<param name="Автор рисунка">'.$rowAutorPicture.'</param>';
		if($rowAutorForm!="" and $rowAutorForm!='-')$usualtov.='<param name="Автор формы">'.$rowAutorForm.'</param>';//*/
		$usualtov.='</offer>';
		}//*/
	}
//echo htmlspecialchars($usualtov);
mysqli_free_result($query1);

/*$usualtov='<offer id="111" available="true" bid="1" cbid="1" fee="1">
		<sales_notes>Бесплатная доставка по России от 5000р.'.($rowPicture).'</sales_notes>
		<age>0</age>
</offer>';*/
return $usualtov;
}
function MakePrice($shop)
{
$category='
<category id="99910">Все товары</category>';
$menu=array(
array("99910","99911","Дом и дача"),
array("99911","99912","Посуда и кухонные принадлежности"),
array("99912","99913","Приготовление напитков"),
array("99912","99921","Сервировка стола"),
array("99910","99914","Интерьер"),
array("99910","99915","Подарки и цветы"),
array("99915","99916","Предметы искусства"),
array("99915","99917","Новогодние товары"),
array("99915","99918","Сувениры"),
array("99915","99919","Дом и интерьер"),
array("99921","99922","Сервизы","cofserv","kidset","setwine","deskserv","teaserv","crset"),
array("99921","99923","Блюда  и салатники","dish","salad","biscuit","layout","caviar"),
array("99921","99924","Предметы сервировки","vaseice","nap","vfruit","ring","oiler","setspec","herring","sauce","tureen","vasejam"
,"vasecandy","glasses","sockets","sugar","creamer","whatnots"),
array("99921","99925","Рюмки и стопки","pile"),
array("99921","99926","Тарелки","deeplate","splate"),
array("99921","99927","Кувшины и графины","grafin","shtof"),
array("99921","99928","Кружки, блюдца и пары","broth","mug","teacup","cupcover","teasets"),
array("99913","99929","Заварочные чайники","teapots"),
array("99914","99930","Вазы","colour","C0001122","C0001235"),
array("99921","99931","Бокалы и стаканы","wine","wisky","vodka","water","cogniac","martini","champagne","cream","glass"),
array("99921","99932","Столовые приборы","settw"),
array("99914","99933","Статуэтки и фигурки","Africa","Pet","Amphibia","Zodiac","Horses","Cats","Forest","Bears","Monkey","Birds"
,"Fish","North","Dogs","white","gogol","woman","twice","theatre","jakut","dymkatoy"),
array("99917","99934","Елочные украшения","ariel","majolica","rings","suspens"),
array("99918","ceramic","Сувениры из керамики"),
array("99918","souvenir","Сувениры из фарфора","eggs"),
array("99918","99935","Сувениры из стекла","crsouv"),
array("99919","candlest","Подсвечники"),
array("99919","frame","Фотоальбомы и рамки"),
array("99918","casket","Шкатулки"),
array("99916","99936","Декоративные тарелки","plate260","Декоративные тарелки ИФЗ","decoplate"),//и подгруппы
array("99914","99937","Декоративные тарелки","plate200")//и подгруппы
);
$CatText='';
$hoh=0;
$counmenu=count($menu);
//echo $counmenu;
for($ji=0;$ji<count($menu);$ji++) 
{
$category.='<category id="'.TransIdForYandex($menu[$ji][1]).'" parentId="'.TransIdForYandex($menu[$ji][0]).'">'.$menu[$ji][2].'</category>';
	$counmenu2=count($menu[$ji]);
//	echo $counmenu2;
	if($counmenu2>2) {
		for($i=3;$i<$counmenu2;$i=$i+1){
			//echo $menu[$ji][$i];
			$r=sql("SELECT * FROM tovsNew WHERE id='".$menu[$ji][$i]."' and grp='1'");
			if(mysqli_num_rows($r)!=0){
				$row=mysqli_fetch_array($r);
				$nameofgroup= $row['name'];
				$category.='<category id="'.TransIdForYandex($menu[$ji][$i]).'" parentId="'.TransIdForYandex($menu[$ji][1]).'">'.$nameofgroup.'</category>';
				if($menu[$ji][$i]=='plate260' or $menu[$ji][$i]=='plate200')
					{
					$ruru2=sql("SELECT * FROM tovsNew WHERE idg='".$menu[$ji][$i]."' and grp='1'");
					while ($rowruru2=mysqli_fetch_array($ruru2)){
						$ID2=$rowruru2['id'];
						$name2= $rowruru2['name'];
						$category.='<category id="'.TransIdForYandex($ID2).'" parentId="'.TransIdForYandex($menu[$ji][$i]).'">'.$name2.'</category>';
						}
					}
			}
		}
	}
}
//mysqli_free_result($r);mysqli_free_result($ruru2);
$offer='';
$hoh=0;
$counmenu=count($menu);
if($shop=="kaz") $addselect=' and (quants.shopid=7 or quants.shopid=9)';
elseif($shop=="tlt") $addselect=' and (quants.shopid=1 or quants.shopid=5)';
elseif($shop=="sar") $addselect=' and (quants.shopid=8)';
elseif($shop=="sam") $addselect=' and (quants.shopid=2 or quants.shopid=4)';
elseif($shop=="ufa") $addselect=' and (quants.shopid=6)';
else $addselect='';
for($ji=0;$ji<count($menu);$ji++) 
{
	$counmenu2=count($menu[$ji]);
	if($counmenu2>0) {
		for($i=1;$i<$counmenu2;$i=$i+1){
		//	$ruru2=sql("SELECT ida FROM tovsNew WHERE idg='".$menu[$ji][$i]."' and grp='0' and sklad='1'");
//$HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE $Uslovie ORDER BY tovsNew.name";//
			//$ruru2=sql("SELECT tovsNew.ida,tovsNew.idg,tovsNew.grp, quants.tov_id, tovsNew.id FROM quants LEFT JOIN tovsNew ON quants.tov_id=tovsNew.id WHERE tovsNew.idg='".$menu[$ji][$i]."' and tovsNew.grp='0' LIMIT 10");
			$ruru2=sql("SELECT tov_id,ida FROM quants LEFT JOIN tovsNew ON quants.tov_id=tovsNew.id WHERE tovsNew.idg='".$menu[$ji][$i]."' and tovsNew.grp='0'".$addselect." ORDER BY quants.tov_id");
//echo "SELECT tovsNew.ida FROM tovsNew LEFT JOIN quants ON quants.tov_id=tovsNew.id WHERE tovsNew.idg='".$menu[$ji][$i]."' and tovsNew.grp='0' LIMIT 10";
			while ($rowruru2=mysqli_fetch_array($ruru2)){
//				$ID3=$rowruru2['tov_id'];
				$ID2=$rowruru2['ida'];
				if($ID3!=$ID2) $offer.=makeoffer($ID2);
				$ID3=$ID2;
				}
		}
	}
}
$ruru3=sql("SELECT * FROM tovsNew WHERE idg='plate260' and grp='1'");
	while ($rowruru3=mysqli_fetch_array($ruru3)){
		$ID3=$rowruru3['id'];
		$ruru2=sql("SELECT ida FROM tovsNew WHERE idg='".$ID3."' and grp='0' and sklad='1'");
			while ($rowruru2=mysqli_fetch_array($ruru2)){
				$ID2=$rowruru2['ida'];
				$offer.=makeoffer($ID2);
				}
		}
$ruru3=sql("SELECT * FROM tovsNew WHERE idg='plate200' and grp='1'");
	while ($rowruru3=mysqli_fetch_array($ruru3)){
		$ID3=$rowruru3['id'];
		$ruru2=sql("SELECT ida FROM tovsNew WHERE idg='".$ID3."' and grp='0' and sklad='1'");
			while ($rowruru2=mysqli_fetch_array($ruru2)){
				$ID2=$rowruru2['ida'];
				$offer.=makeoffer($ID2);
				}
		}
$today = date("Y-m-d H:i");
echo $today;
$xml3='<?xml version="1.0" encoding="UTF-8"?>
<yml_catalog date="'.$today.'"><shop><name>Императорский фарфор</name><company>"ООО "ИФЗ Тольятти"</company><url>http://www.ifarfor.ru/</url>
<currencies><currency  id="RUR" rate="1"/><currency  id="USD" rate="60"/></currencies>
<categories>'.$category.'</categories>
<delivery-options><option cost="500" days="2-4"/></delivery-options>
<offers>'.$offer.'</offers></shop></yml_catalog>';
echo $xml3;
$dom_xml= new DomDocument("1.0", "UTF-8");
$dom_xml->loadXML($xml3); 
if($shop=="kaz") $path="autokaz.xml";
elseif($shop=="tlt") $path="autotlt.xml";
elseif($shop=="sar") $path="autosar.xml";
elseif($shop=="ufa") $path="autoufa.xml";
elseif($shop=="sam") $path="autosam.xml";
elseif($shop=="all") $path="auto2.xml";
//else $path="auto4.xml";
$dom_xml->save($path);
mysqli_free_result($ruru2);mysqli_free_result($ruru3);
}

function makeofferGoogle($view) 
{
/*
Строка, должна быть закодирована в формате Unicode. Рекомендуем использовать только символы из кодировки ASCII.

<g:id>tddy123uk</g:id>//идентификатор
<title>Мужская футболка из органического хлопка с логотипом Google. Цвет – синий, размер – М</title> //150символов
<g:description>	Удобные шариковые ручки с утолщенным грипом и выдвижным стержнем.</g:description>
<link>http://www.example.com/writing/google-pens</link>
<g:condition>new</g:condition>
*/

global $language;
if($language=="en") 
{}
else
{}
$stroka='';
$usualtov='';
//расчет переменных	
//
$query1=sql("SELECT * FROM tovsNew WHERE ida='$view'");
$row = mysqli_fetch_array($query1);
if(mysqli_num_rows($query1)>0){
	$rowname=str_replace ("/","-", $row['name']);
	$rowname=str_replace (","," ", $rowname);
	$rowname=str_replace ("  "," ", $rowname);
	$rowArtikul=$row['ida'];
	/////////////////////////////////////////////////////////////////
	$url="http://www.ifarfor.ru/shop/ware/view".$rowArtikul;/////////
	/////////////////////////////////////////////////////////////////
	$rowRealID=	$row['id'];
	/////////////////////////////////////////////////////////////////
	$id=$rowRealID;//////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////
	$groupid=$row['idg'];////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////
	$id=$rowRealID;//////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////	
	$rowCollection=$row['Collection'];//1
	$roww=mysqli_fetch_array(sql("SELECT name FROM picture WHERE id='".$row['Picture']."'"));
	$rowPicture=$roww['name'];//2
	$roww=mysqli_fetch_array(sql("SELECT name FROM form WHERE id='".$row['Form']."'"));
	$rowForm=$roww['name'];//3
	$roww=mysqli_fetch_array(sql("SELECT name FROM material WHERE id='".$row['TipOfMaterial']."'"));		
	$rowTipOfMaterial=$roww['name'];//4
	$rowPerson=$row['Person'];//5
	$rowPredmetov=$row['Predmetov'];//6
	$roww=mysqli_fetch_array(sql("SELECT name FROM creator WHERE id='".$row['AutorForm']."'"));		
	$rowAutorForm=$roww['name'];//7
	$roww=mysqli_fetch_array(sql("SELECT name FROM creator WHERE id='".$row['AutorPicture']."'"));	
	$rowAutorPicture=$roww['name'];//8
	$roww=mysqli_fetch_array(sql("SELECT * FROM tovsNew LEFT JOIN brand ON brand.id = tovsNew.Factory WHERE tovsNew.ida='$view'"));			
	$rowFactory=$roww['name'];$strana=$roww['Strana'];
	if($rowFactory=='Императорский фарфоровый завод') $rowFactory='ИФЗ';
	$factory=$rowFactory;
	$rowVid=$row['Vid'];
	$rowTip=$row['Tip'];		
	$engvid=$row['videnglish'];
	$engtip=$row['tipenglish'];
	$Height=$row['Height'];		$Capacity=$row['Capacity'];		$Diameter=$row['Diameter'];$Width=$row['Width'];
	$Nnewprice=$row['price1s'];
	/////////////////////////////////////////////////////////////////
	$price=$Nnewprice;///////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////	
	$PPPers='';
	if($rowPerson!='0' and $rowPerson!='' and $rowPerson!='1'  and $rowPredmetov!='0' and $rowPredmetov!='1' and $rowPredmetov!='') $PPPers=$rowPerson."/".$rowPredmetov.' ';
//echo $rowname$rowVid,$rowTip,$rowPicture,$rowForm,$rowTipOfMaterial,$rowPerson,$rowPredmetov,$rowAutorPicture,$Height,$Capacity,$Diameter,$Width;
	$frontname=MakeFrontName($brandid,$rowname,$rowVid,$rowTip,$rowPicture,$rowForm,$rowTipOfMaterial,$rowPerson,$rowPredmetov,$rowAutorPicture,$Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
	//echo '-1-';
	$frontname=$rowname;
/*	if ($rowVid=="Бокал с бл.с крышкой") $rowVid="Бокал с блюдцем и крышкой";
	if ($rowVid=="Комплект детский в чемода") $rowVid="Комплект детский в чемоданчике.";
	if ($rowTip=="трёхпредметный в чемоданч")$rowTip="трёхпредметный в чемоданчике";
	if ($rowVid=="Чашка с блюдцем" and $rowTip=="чайн.") $rowTip="чайная";
	if ($rowVid=="Чашка с блюдцем и крышкой" and $rowTip=="чайн.") $rowTip="чайная";
	if ($rowVid=="Чашка с блюдцем" and $rowTip=="кофейн.") $rowTip="кофейная";
	if ($rowVid=="Подарочный набор" and $rowTip=="кофейн.") $rowTip="кофейный";*/
	///////////////
	$NeedName='';
	if($rowVid=='' or ($rowPicture=='' and $rowForm=='')) $NeedName="$frontname";//rowname
	if($rowTip=='') $tip=htmlspecialchars(($rowVid),ENT_QUOTES);
	else $tip=htmlspecialchars(($rowVid.' '.$rowTip),ENT_QUOTES);
	if($rowVid!="Скульптура"){
		if($rowPicture=='') $model=$rowForm." ".$PPPers;
		elseif($rowForm=='') $model=$rowPicture." ".$PPPers;
		else $model=$rowPicture." ".$rowForm." ".$PPPers;
	}
	else {
		if($rowForm=='') $model=$rowPicture;
		elseif($rowPicture=='') $model=$rowForm;
		else $model=$rowForm." ".$rowPicture;
	}
	if($rowTipOfMaterial!='') $model.=' '.$rowTipOfMaterial; 
	if ($rowVid=="Декоративная тарелка" and $rowAutorPicture!='') $model.=' '.$rowAutorPicture; 
//$FirstName=$FirstName.$frontname;
//$FirstName=$FirstName."1$rowname,2$rowVid,3$rowTip,4$rowPicture,5$rowForm,6$rowTipOfMaterial,7$rowPerson,8$rowPredmetov,9$rowAutorPicture,10$Height,11$Capacity,12$Diameter,13$Width";
	//заполним как надо
	$picture='';	
	$filename5="foto/".$view.".jpg";
	if (file_exists($filename5)) {
		$perem="/".$filename5;
		$picture.='<picture>http://www.ifarfor.ru'.$perem.'</picture>';
		}
//	if($fname!='') {//echo "<tr><td><img src='$fname' width='100%'>";	
	$indeed=2;//picture
	while($indeed!=0)
	{
		$filename5="foto/".$view."-".$indeed.".jpg";
		if (file_exists($filename5)) {
			$perem="/".$filename5;
			$picture.='<picture>http://www.ifarfor.ru'.$perem.'</picture>';
			$indeed++;
			if($indeed==7)$indeed=0;
			}
		else $indeed=0;
	}
	$Description='';
	if($rowVid!="")$Description.="<p>$rowTipOfMaterial</p>";
	//Ручная роспись
	if($rowAutorForm!="" and $rowAutorForm!='-')$Description.="<p>Автор формы: $rowAutorForm</p>";
	if($rowAutorPicture!="" and $rowAutorPicture!='-')$Description.="<p>Автор росписи: $rowAutorPicture</p>";
	if($rowFactory!="")$Description.="<p>Производитель: $rowFactory</p>";
	//Объем и размер
	$tagform=='';	if($rowForm!='' and $rowForm!='-')$tagform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagform$rowForm")."'>#$rowForm</a>&nbsp;&nbsp;";
	$tagpic=='';	if($rowPicture!='' and $rowPicture!='-')$tagpic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagpic$rowPicture")."'>#$rowPicture</a>&nbsp;&nbsp;";
	$tagaform=='';	if($rowAutorForm!='' and $rowAutorForm!='-')$tagaform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagaform$rowAutorForm")."'>#$rowAutorForm</a>&nbsp;&nbsp;";
	$tagapic=='';	if($rowAutorPicture!='' and $rowAutorPicture!='-')$tagapic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagapic$rowAutorPicture")."'>#$rowAutorPicture</a>&nbsp;&nbsp;";
	$memb=$row['memberID1'];$memq=$row['memberQuant1'];
	$DescriptionSostav='';
	if ($rowVid!='Сервиз') 
		{
		$rowmemberID1=$row['memberID1'];
		if($rowmemberID1!='')
			{
			$rommemberQuant1=$row['memberQuant1'];
			$ruru=sql("SELECT * FROM tovsNew WHERE id='$rowmemberID1'");
			$countruru=mysqli_num_rows($ruru);
			}
		if($countruru>0 and $rowmemberID1!='')
			{
			$rowmem = mysqli_fetch_array($ruru);
			$rowname=$rowmem['name'];
			$rowVid=$rowmem['Vid'];
			$rowTip=$rowmem['Tip'];
			$DescriptionSostav.="<p>Состав :</p><ul><li>$rowVid $rowTip $rommemberQuant1 шт</li>";	
			$rowmemberID2=$row['memberID2'];
			if($rowmemberID2!='')
				{
				$rommemberQuant2=$row['memberQuant2'];
				$rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID2'"));
				$rowname=$rowmem['name'];
				$rowVid=$rowmem['Vid'];
				$rowTip=$rowmem['Tip'];
				$DescriptionSostav.="<li>$rowVid $rowTip $rommemberQuant2 шт</li>";	
				}
			$rowmemberID3=$row['memberID3'];
			if($rowmemberID3!='')
				{
				$rommemberQuant3=$row['memberQuant3'];
				$rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID3'"));
				$rowname=$rowmem['name'];
				$rowname=str_replace ("1 2","1/2", $rowname);
				$rowVid=$rowmem['Vid'];
				$rowTip=$rowmem['Tip'];
				$DescriptionSostav.="<li>$rowVid $rowTip $rommemberQuant3 шт</li>";	
				}
			$rowmemberID4=$row['memberID4'];
			if($rowmemberID4!='')
				{
				$rommemberQuant4=$row['memberQuant4'];
				$rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID4'"));
				$rowname=$rowmem['name'];
				$rowVid=$rowmem['Vid'];
				$rowTip=$rowmem['Tip'];
				$DescriptionSostav.="<li>$rowVid $rowTip $rommemberQuant4 шт</li>";	
				}
			$DescriptionSostav.="</ul>";
			}
		}
	$rowDiameter=$row['Diameter'];
	$rowWidth=$row['Width'];
	$rowHeight=$row['Height'];
	$rowCapacity=$row['Capacity'];
	$rowVid=$row['Vid'];
	$rowTip=$row['Tip'];
	$rowID=array();
	$rowID+=array($row['memberID1'].a=> $row['memberQuant1']); 
	$rowID+=array($row['memberID2'].b=> $row['memberQuant2']); 
	$rowID+=array($row['memberID3'].c=> $row['memberQuant3']); 
	$rowID+=array($row['memberID4'].d=> $row['memberQuant4']); 
	$rowID+=array($row['memberID5'].e=> $row['memberQuant5']); 
	$rowID+=array($row['memberID6'].f=> $row['memberQuant6']); 
	$rowID+=array($row['memberID7'].g=> $row['memberQuant7']); 
	$rowID+=array($row['memberID8'].h=> $row['memberQuant8']); 
	$rowID+=array($row['memberID9'].i=> $row['memberQuant9']); 
	$rowID+=array($row['memberID10'].j=> $row['memberQuant10']); 
	$rowID+=array($row['memberID11'].k=> $row['memberQuant11']); 
	ksort ($rowID);
	if ($rowVid=='Сервиз' or $rowVid=='Комплект детский') 
		{
		if($memb!='' and $memq!='') $DescriptionSostav.="<p>Состав комплекта:</p><ul>";
		foreach ($rowID as $kbr1 => $tbr) 
			{
			$kbr=substr($kbr1, 0, -1);
			$useheight=0;
			if($tbr>0)
				{
				if($kbr=='C001051'){if($rowCapacity>'0')$DescriptionSostav.="<li>Чайник $rowCapacity мл: $tbr шт.</li>"; else $DescriptionSostav.="<li>Чайник: $tbr шт."."</li>";}
				elseif($kbr=='C0010001'){if($rowCapacity>'0')$DescriptionSostav.="<li>Кофейник $rowCapacity мл: $tbr шт.</li>"; else $DescriptionSostav.="<li>Кофейник: $tbr шт."."</li>";}
				elseif($kbr=='C001052'){if($rowWidth>'0')$DescriptionSostav.="<li>Сахарница $rowWidth мл: $tbr шт.</li>"; else $DescriptionSostav.="<li>Сахарница: $tbr шт."."</li>";}
				elseif($kbr=='C001053'){
					if($rowHeight>'0')$DescriptionSostav.="<li>Чашка $rowHeight мл: $tbr шт.</li>"; else $DescriptionSostav.="<li>Чашка: $tbr шт."."</li>";
					if($rowDiameter>'0')$DescriptionSostav.="<li>Блюдце $rowDiameter мм: $tbr шт.</li>"; else $DescriptionSostav.="<li>Блюдце: $tbr шт."."</li>";
					}
				elseif($kbr=='C001054'){$DescriptionSostav.="<li>Блюдце: $tbr шт</li>";}
				elseif($kbr=='C001055'){$DescriptionSostav.="<li>Тарелка десертная: $tbr шт</li>";}
				elseif($kbr=='C001056'){$DescriptionSostav.="<li>Сливочник: $tbr шт</li>";}
				elseif($kbr=='C001057'){$DescriptionSostav.="<li>Вазочка для варенья: $tbr шт</li>";}
				elseif($kbr=='C001058'){$DescriptionSostav.="<li>Ваза для цветов: $tbr шт</li>";}
				elseif($kbr=='C001059'){$DescriptionSostav.="<li>Сухарница: $tbr шт</li>";}
				elseif($kbr=='C001060'){$DescriptionSostav.="<li>Конфетница: $tbr шт</li>";}
				elseif($kbr=='C001061'){$DescriptionSostav.="<li>Ваза для конфет: $tbr шт</li>";}
				//столовый rowDiameter
				elseif($kbr=='C001062'){if($rowWidth>'0')$DescriptionSostav.="<li>Тарелка глубокая $rowWidth мм: $tbr шт.</li>"; else $DescriptionSostav.="<li>Тарелка глубокая: $tbr шт."."</li>";}
				elseif($kbr=='C001063'){if($rowHeight>'0')$DescriptionSostav.="<li>Тарелка плоская $rowHeight мм: $tbr шт.</li>"; else $DescriptionSostav.="<li>Тарелка плоская: $tbr шт."."</li>";$rowHeight=$rowDiameter;}
				elseif($kbr=='C001064'){if($tbr>10)$DescriptionSostav.="<li>Салатник большой ".$tbr."0 мл: 1 шт.</li>"; else $DescriptionSostav.="<li>Салатник большой: $tbr шт."."</li>";}
				elseif($kbr=='C001065'){if($rowCapacity>'0')$DescriptionSostav.="<li>Салатник малый $rowCapacity мм: $tbr шт.</li>"; else $DescriptionSostav.="<li>Салатник малый: $tbr шт."."</li>";}
				elseif($kbr=='C001066'){if($tbr>10)$DescriptionSostav.="<li>Блюдо овальное ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Блюдо овальное: $tbr шт."."</li>";}
				elseif($kbr=='C001067'){if($tbr>3)$DescriptionSostav.="<li>Перечница (Высота ".$tbr." мм): 1 шт.</li>"; else $DescriptionSostav.="<li>Перечница: $tbr шт."."</li>";}
				elseif($kbr=='C001068'){if($tbr>3)$DescriptionSostav.="<li>Солонка (Высота ".$tbr." мм): 1 шт.</li>"; else $DescriptionSostav.="<li>Солонка: $tbr шт."."</li>";}			
				elseif($kbr=='C001069'){if($tbr>15)$DescriptionSostav.="<li>Пиала ".$tbr." мл: 1 шт.</li>"; else $DescriptionSostav.="<li>Пиала: $tbr шт."."</li>";}			
				elseif($kbr=='C001070'){if($tbr>15)$DescriptionSostav.="<li>Соусник ".$tbr." мл: 1 шт.</li>"; else $DescriptionSostav.="<li>Соусник: $tbr шт."."</li>";}			
				elseif($kbr=='C001071'){if($tbr>3)$DescriptionSostav.="<li>Супница ".$tbr."0 мл: 1 шт.</li>"; else $DescriptionSostav.="<li>Супница: $tbr шт."."</li>";}			
				elseif($kbr=='C001072'){if($tbr>10)$DescriptionSostav.="<li>Блюдо прямоугольное ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Блюдо прямоугольное: $tbr шт."."</li>";}
				elseif($kbr=='C001073'){if($tbr>10)$DescriptionSostav.="<li>Блюдо круглое ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Блюдо круглое: $tbr шт."."</li>";}
				elseif($kbr=='C001074'){if($tbr>10)$DescriptionSostav.="<li>Блюдце под соусник ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Блюдце под соусник: $tbr шт."."</li>";}
				elseif($kbr=='C001092'){if($tbr>15)$DescriptionSostav.="<li>Кольцо для салфеток ".$tbr." мм: 1 шт.</li>"; else $DescriptionSostav.="<li>Кольцо для салфеток: $tbr шт."."</li>";}
				}
			}
		if($memb!='' and $memq!='') $DescriptionSostav.="</ul>";
		}
	elseif ($rowVid=='Набор столовых приборов') {
		if($memb!='' and $memq!='') $DescriptionSostav.="<p>Состав комплекта:</p><ul>";
		foreach ($rowID as $kbr1 => $tbr) 
			{
			$kbr=substr($kbr1, 0, -1);
			if($tbr>0)
				{
				if($kbr=='M0000394'){$DescriptionSostav.="<li>Ложка столовая: $tbr шт</li>";}
				elseif($kbr=='M0000395'){$DescriptionSostav.="<li>Вилка столовая: $tbr шт</li>";}
				elseif($kbr=='M0000396'){$DescriptionSostav.="<li>Нож столовый: $tbr шт</li>";}
				elseif($kbr=='M0000397'){$DescriptionSostav.="<li>Ложка десертная: $tbr шт</li>";}
				elseif($kbr=='M0000398'){$DescriptionSostav.="<li>Вилка десертная: $tbr шт</li>";}
				elseif($kbr=='M0000399'){$DescriptionSostav.="<li>Щипцы для сахара: $tbr шт</li>";}
				elseif($kbr=='M0000400'){$DescriptionSostav.="<li>Сервировочная ложка: $tbr шт</li>";}
				elseif($kbr=='M0000401'){$DescriptionSostav.="<li>Сервировочная вилка: $tbr шт</li>";}
				elseif($kbr=='M0000402'){$DescriptionSostav.="<li>Лопатка для торта: $tbr шт</li>";}
				elseif($kbr=='M0000403'){$DescriptionSostav.="<li>Ложка для соуса: $tbr шт</li>";}
				elseif($kbr=='M0000404'){$DescriptionSostav.="<li>Суповой половник: $tbr шт</li>";}
	//			elseif($kbr=='М0000405'){echo"<li>Сервировочная вилка: $tbr шт</li>";}
				}
			}
		if($memb!='' and $memq!='') $DescriptionSostav.="</ul>";
		}
	elseif ($rowVid=='Комплект чайников') 
		{
		$textDiameter='Высота доливного чайника';
		$textWidth='Объём заварного чайника';
		$textHeight='Высота заварного чайника';
		$textCapacity='Объём доливного чайника';
		if(($rowDiameter!='' and $rowDiameter!='0') or ($rowCapacity!='' and $rowCapacity!='0') or ($rowHeight!='' and $rowHeight!='0') or ($rowWidth!='' and $rowWidth!='0')) $ul=1;else $ul=0;
		if($ul==1) $DescriptionSostav.="<ul>";
		if($rowDiameter!='' and $rowDiameter!='0')$DescriptionSostav.="<li>$textDiameter: $rowDiameter мм</li>";	
		if($rowCapacity!='' and $rowCapacity!='0')$DescriptionSostav.="<li>$textCapacity: $rowCapacity мл</li>";	
		if($rowHeight!='' and $rowHeight!='0')$DescriptionSostav.="<li>$textHeight: $rowHeight мм</li>";	
		if($rowWidth!='' and $rowWidth!='0')$DescriptionSostav.="<li>$textWidth: $rowWidth мл</li>";	
		if($ul==1) $DescriptionSostav.="</ul>";
		}
	elseif ($rowVid=='Комплект' and $rowTip=='трехпредметный') 
		{
		$textDiameter='Диаметр блюдца';
		$textWidth='Диаметр десертной тарелки';
		$textHeight='Высота чашки';
		$textCapacity='Объём чашки';
		if(($rowDiameter!='' and $rowDiameter!='0') or ($rowCapacity!='' and $rowCapacity!='0') or ($rowHeight!='' and $rowHeight!='0') or ($rowWidth!='' and $rowWidth!='0')) $ul=1; else $ul=0;
		if($ul==1) $DescriptionSostav.="<ul>";
		if($rowCapacity!='' and $rowCapacity!='0')$DescriptionSostav.="<li>$textCapacity: $rowCapacity мл</li>";	
		if($rowHeight!='' and $rowHeight!='0')$DescriptionSostav.="<li>$textHeight: $rowHeight мм</li>";	
		if($rowDiameter!='' and $rowDiameter!='0')$DescriptionSostav.="<li>$textDiameter: $rowDiameter мм</li>";	
		if($rowWidth!='' and $rowWidth!='0')$DescriptionSostav.="<li>$textWidth: $rowWidth мм</li>";	
		if($ul==1) $DescriptionSostav.="</ul>";
		}
	else
		{
		if($rowDiameter!='' and $rowDiameter!='0')
			{
			if ($rowVid=='Чашка с блюдцем') $textDiameter='Диаметр блюдца';
			elseif ($rowVid=='Шкатулка') $textDiameter='Длина'; 
	//		elseif (($rowVid=='Сервиз') and ($rowTip=='чайный' or $rowTip=='кофейный')) $textDiameter='Диаметр блюдца'; 
			else $textDiameter='Диаметр';
			$DescriptionSostav.="<p>$textDiameter: $rowDiameter мм</p>";	
			}
		if($rowWidth!='' and $rowWidth!='0')
			{
			$razmer='мм';
			if ($rowVid=='Чашка с блюдцем') $textWidth='Диаметр верхнего края чашки'; else $textWidth='Ширина';
			if ($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный') {$textWidth='Объем сахарницы'; $razmer='мл';}
			$DescriptionSostav.="<p>$textWidth: $rowWidth $razmer</p>";
			}
		if($rowHeight!='' and $rowHeight!='0')
			{
			$razmer='мм';
			if ($rowVid=='Чашка с блюдцем') $textHeight='Высота чашки'; else $textHeight='Высота';
			if ($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный') {$textHeight='Объем чашки'; $razmer='мл';}
			$DescriptionSostav.="<p>$textHeight: $rowHeight $razmer</p>";	
			}
		if($rowCapacity!='' and $rowCapacity!='0')
			{
			$textDiameter='Объем';
			if ($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный') {$textDiameter='Объем чайника'; $razmer='мл';}
			$DescriptionSostav.="<p>$textDiameter: $rowCapacity мл</p>";	
			}
		}
	$usualtov='';
	if($picture!=''){if($NeedName=='') $tttype='type="vendor.model" ';
		$usualtov='
		<offer id="'.$view.'" '.$tttype.'available="true" bid="1" cbid="1" fee="1">
		<url>'.$url.'</url>
		<price>'.ceil($price).'</price>
		<currencyId>RUR</currencyId>
		<categoryId>'.TransIdForYandex($groupid).'</categoryId>
		'.$picture.'
		<store>true</store>
		<pickup>true</pickup>
		<delivery>true</delivery>';
		if($NeedName!='')$usualtov.='<name>'.$NeedName.'</name>';
		else $usualtov.='<typePrefix>'.$tip.'</typePrefix>';
		$usualtov.='
		<vendor>'.$factory.'</vendor>
		<model>'.$model.'</model>';
	if($DescriptionSostav!='' or $Description!='')
			{
			$usualtov.='<description><![CDATA[';
			if($Description!='')$usualtov.=$Description;
			if($DescriptionSostav!='')$usualtov.=$DescriptionSostav;
			$usualtov.=']]></description>';
			}
		$usualtov.='
		<sales_notes>Бесплатная доставка по России от 5000р.</sales_notes>
		<age>0</age>
		<manufacturer_warranty>false</manufacturer_warranty>';
		//$Height,$Capacity,$Diameter,$Width);
		if($rowPicture!='') $usualtov.='<param name="Рисунок">'.$rowPicture.'</param>';
		if($rowForm!='') $usualtov.='<param name="Форма">'.$rowForm.'</param>';
		if($rowTipOfMaterial!='') $usualtov.='<param name="Материал">'.$rowTipOfMaterial.'</param>';
		//if($rowPerson!='' and $rowPerson!='0' and $rowPerson!='1') $usualtov.='<param name="Рисунок">'.$rowPerson.'</param>';
		//if($rowPredmetov!='') $usualtov.='<param name="Рисунок">'.$rowPredmetov.'</param>';
		if($rowAutorPicture!='' and $rowAutorPicture!='-') $usualtov.='<param name="Автор рисунка">'.$rowAutorPicture.'</param>';
		if($rowAutorForm!="" and $rowAutorForm!='-')$usualtov.='<param name="Автор формы">'.$rowAutorForm.'</param>';//*/
		$usualtov.='</offer>';
		}//*/
	}
//echo htmlspecialchars($usualtov);
mysqli_free_result($query1);

/*$usualtov='<offer id="111" available="true" bid="1" cbid="1" fee="1">
		<sales_notes>Бесплатная доставка по России от 5000р.'.($rowPicture).'</sales_notes>
		<age>0</age>
</offer>';*/
return $usualtov;
}
function MakePriceGoogle($shop)
{
$category='
<category id="99910">Все товары</category>';
$menu=array(
array("99910","99911","Дом и дача"),
array("99911","99912","Посуда и кухонные принадлежности"),
array("99912","99913","Приготовление напитков"),
array("99912","99921","Сервировка стола"),
array("99910","99914","Интерьер"),
array("99910","99915","Подарки и цветы"),
array("99915","99916","Предметы искусства"),
array("99915","99917","Новогодние товары"),
array("99915","99918","Сувениры"),
array("99915","99919","Дом и интерьер"),
array("99921","99922","Сервизы","cofserv","kidset","setwine","deskserv","teaserv","crset"),
array("99921","99923","Блюда  и салатники","dish","salad","biscuit","layout","caviar"),
array("99921","99924","Предметы сервировки","vaseice","nap","vfruit","ring","oiler","setspec","herring","sauce","tureen","vasejam"
,"vasecandy","glasses","sockets","sugar","creamer","whatnots"),
array("99921","99925","Рюмки и стопки","pile"),
array("99921","99926","Тарелки","deeplate","splate"),
array("99921","99927","Кувшины и графины","grafin","shtof"),
array("99921","99928","Кружки, блюдца и пары","broth","mug","teacup","cupcover","teasets"),
array("99913","99929","Заварочные чайники","teapots"),
array("99914","99930","Вазы","colour","C0001122","C0001235"),
array("99921","99931","Бокалы и стаканы","wine","wisky","vodka","water","cogniac","martini","champagne","cream","glass"),
array("99921","99932","Столовые приборы","settw"),
array("99914","99933","Статуэтки и фигурки","Africa","Pet","Amphibia","Zodiac","Horses","Cats","Forest","Bears","Monkey","Birds"
,"Fish","North","Dogs","white","gogol","woman","twice","theatre","jakut","dymkatoy"),
array("99917","99934","Елочные украшения","ariel","majolica","rings","suspens"),
array("99918","ceramic","Сувениры из керамики"),
array("99918","souvenir","Сувениры из фарфора","eggs"),
array("99918","99935","Сувениры из стекла","crsouv"),
array("99919","candlest","Подсвечники"),
array("99919","frame","Фотоальбомы и рамки"),
array("99918","casket","Шкатулки"),
array("99916","99936","Декоративные тарелки","plate260","Декоративные тарелки ИФЗ","decoplate"),//и подгруппы
array("99914","99937","Декоративные тарелки","plate200")//и подгруппы
);
$CatText='';
$hoh=0;
$counmenu=count($menu);
//echo $counmenu;
for($ji=0;$ji<count($menu);$ji++) 
{
$category.='<category id="'.TransIdForYandex($menu[$ji][1]).'" parentId="'.TransIdForYandex($menu[$ji][0]).'">'.$menu[$ji][2].'</category>';
	$counmenu2=count($menu[$ji]);
//	echo $counmenu2;
	if($counmenu2>2) {
		for($i=3;$i<$counmenu2;$i=$i+1){
			//echo $menu[$ji][$i];
			$r=sql("SELECT * FROM tovsNew WHERE id='".$menu[$ji][$i]."' and grp='1'");
			if(mysqli_num_rows($r)!=0){
				$row=mysqli_fetch_array($r);
				$nameofgroup= $row['name'];
				$category.='<category id="'.TransIdForYandex($menu[$ji][$i]).'" parentId="'.TransIdForYandex($menu[$ji][1]).'">'.$nameofgroup.'</category>';
				if($menu[$ji][$i]=='plate260' or $menu[$ji][$i]=='plate200')
					{
					$ruru2=sql("SELECT * FROM tovsNew WHERE idg='".$menu[$ji][$i]."' and grp='1'");
					while ($rowruru2=mysqli_fetch_array($ruru2)){
						$ID2=$rowruru2['id'];
						$name2= $rowruru2['name'];
						$category.='<category id="'.TransIdForYandex($ID2).'" parentId="'.TransIdForYandex($menu[$ji][$i]).'">'.$name2.'</category>';
						}
					}
			}
		}
	}
}
//mysqli_free_result($r);mysqli_free_result($ruru2);
$offer='';
$hoh=0;
$counmenu=count($menu);
if($shop=="kaz") $addselect=' and (quants.shopid=7 or quants.shopid=9)';
elseif($shop=="tlt") $addselect=' and (quants.shopid=1 or quants.shopid=5)';
elseif($shop=="sar") $addselect=' and (quants.shopid=8)';
elseif($shop=="sam") $addselect=' and (quants.shopid=2 or quants.shopid=4)';
elseif($shop=="ufa") $addselect=' and (quants.shopid=6)';
else $addselect='';
for($ji=0;$ji<count($menu);$ji++) 
{
	$counmenu2=count($menu[$ji]);
	if($counmenu2>0) {
		for($i=1;$i<$counmenu2;$i=$i+1){
		//	$ruru2=sql("SELECT ida FROM tovsNew WHERE idg='".$menu[$ji][$i]."' and grp='0' and sklad='1'");
//$HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE $Uslovie ORDER BY tovsNew.name";//
			//$ruru2=sql("SELECT tovsNew.ida,tovsNew.idg,tovsNew.grp, quants.tov_id, tovsNew.id FROM quants LEFT JOIN tovsNew ON quants.tov_id=tovsNew.id WHERE tovsNew.idg='".$menu[$ji][$i]."' and tovsNew.grp='0' LIMIT 10");
			$ruru2=sql("SELECT tov_id,ida FROM quants LEFT JOIN tovsNew ON quants.tov_id=tovsNew.id WHERE tovsNew.idg='".$menu[$ji][$i]."' and tovsNew.grp='0'".$addselect." ORDER BY quants.tov_id");
//echo "SELECT tovsNew.ida FROM tovsNew LEFT JOIN quants ON quants.tov_id=tovsNew.id WHERE tovsNew.idg='".$menu[$ji][$i]."' and tovsNew.grp='0' LIMIT 10";
			while ($rowruru2=mysqli_fetch_array($ruru2)){
//				$ID3=$rowruru2['tov_id'];
				$ID2=$rowruru2['ida'];
				if($ID3!=$ID2) $offer.=makeoffer($ID2);
				$ID3=$ID2;
				}
		}
	}
}
$ruru3=sql("SELECT * FROM tovsNew WHERE idg='plate260' and grp='1'");
	while ($rowruru3=mysqli_fetch_array($ruru3)){
		$ID3=$rowruru3['id'];
		$ruru2=sql("SELECT ida FROM tovsNew WHERE idg='".$ID3."' and grp='0' and sklad='1'");
			while ($rowruru2=mysqli_fetch_array($ruru2)){
				$ID2=$rowruru2['ida'];
				$offer.=makeoffer($ID2);
				}
		}
$ruru3=sql("SELECT * FROM tovsNew WHERE idg='plate200' and grp='1'");
	while ($rowruru3=mysqli_fetch_array($ruru3)){
		$ID3=$rowruru3['id'];
		$ruru2=sql("SELECT ida FROM tovsNew WHERE idg='".$ID3."' and grp='0' and sklad='1'");
			while ($rowruru2=mysqli_fetch_array($ruru2)){
				$ID2=$rowruru2['ida'];
				$offer.=makeoffer($ID2);
				}
		}
$today = date("Y-m-d H:i");
echo $today;
$xml3='<?xml version="1.0" encoding="UTF-8"?>
<yml_catalog date="'.$today.'"><shop><name>Императорский фарфор</name><company>"ООО "ИФЗ Тольятти"</company><url>http://www.ifarfor.ru/</url>
<currencies><currency  id="RUR" rate="1"/><currency  id="USD" rate="60"/></currencies><categories>'.$category.'</categories>
<delivery-options><option cost="500" days="2-4"/></delivery-options>
<offers>'.$offer.'</offers></shop></yml_catalog>';
echo $xml3;
$dom_xml= new DomDocument("1.0", "windows-1251");
$dom_xml->loadXML($xml3); 
if($shop=="kaz") $path="autokaz.xml";
elseif($shop=="tlt") $path="autotlt.xml";
elseif($shop=="sar") $path="autosar.xml";
elseif($shop=="ufa") $path="autoufa.xml";
elseif($shop=="sam") $path="autosam.xml";
elseif($shop=="all") $path="auto2.xml";
//else $path="auto4.xml";
$dom_xml->save($path);
mysqli_free_result($ruru2);mysqli_free_result($ruru3);
}