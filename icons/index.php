<?php

require_once("shop_func.php");
require_once("box_func.php");
$menu=array(
array("service","Сервизы","tea","Сервизы чайные","coffee","Сервизы кофейные","teacoffe","Комплекты чайно-кофейные","flat","Комплекты плоские","dinner","Сервизы столовые"),
array("sculptur","Скульптура","animal","Анималистическая","genre","Жанровая"),
array("piece","Штуки","plates","Тарелки","piecetc","Штуки чайно-кофейные","pieced","Штуки столовые","cup","Чашки с блюдцем","goblet","Бокалы с блюдцем","threep","Комплекты трехпредметные"),
array("interior","Предметы интерьера","pierglass","Трюмо","vase","Вазы декоративные","Egg","Яйца пасхальные","souvenir","Сувениры","decorate","Декоративные предметы"),
array("deshoul","Лиможский фарфор","deshoule","Лиможский фарфор"),
array("crystal","Гусевской хрусталь","vased","Вазы декоративные","vaseb","Вазы для цветов большие","vasem","Вазы для цветов малые и средние","present","Предметы интерьера, подарки, сувениры","imperial","Серия Императорская","malcov","Серия Мальцовская","flame","Серия Пламя","other","Прочее"),
array("textiles","Текстиль","cloth","Скатерти","napkin","Салфетки"),
array("book","Книги","books","Книги по фарфору")
);
clearstatcache();


echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Поволжье.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" link="#333366" alink="#333366" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="/ifarfor.css" type=text/css rel=stylesheet>';

echo '<table align="center" bgcolor="#FFFFFF" width="960" height="96" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td width="204" align="center"><a href="http://ifarfor.ru/" target="_self"><img src="/img/logo.gif" alt="ipm" width="75" height="67" border="0"></a></td>
	<td width="300" align="left" valign="middle" style="FONT-SIZE: 16px;">
	Императорский фарфоровый завод<br>сайт фирменных магазинов Поволжья</td>
	<td width="456" align="right">
		<table cellspacing="0" cellpadding="0" border="0" width="100%" align="right">
			<tr><td height="40px" valign="middle" style="FONT-SIZE: 12px;vertical-align: middle;text-align:right;">
			&nbsp;</td></tr>
			<tr><td height="20px">&nbsp;</td></tr>
			<tr><td height="40px">
				<table width="100%"  align="center" height="100%" cellspacing="0" cellpadding="0" border="0">
					<tr><td class="top" width="28%" style="padding-right: 17px; border-right: 1px solid black; text-align: right;">Новости</td>
					<td class="top" width="20%" style="border-right: 1px solid black;"><a href="/about" target="_self">О заводе</a></td>
					<td class="top" width="34%" style="border-right: 1px solid black;"><a href="/shop" target="_self">Каталог товара</a></td>
					<td class="top" width="18%" style="text-align: right;"><a href="/contact" target="_self">Контакты</a></td></tr>
				</table>
			</td></tr>
		</table>
	</td>
</tr>
</table>
<table align="center" bgcolor="#F6F6F4" width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr><td width="100%"style="vertical-align: top;"><img src="/img/topline.gif" width="100%" height="14px"></td></tr>
	<tr>
	<td height="758px" width="100%" style="BACKGROUND-COLOR: #F6F6F4;vertical-align: top;">
		<table align="center" bgcolor="#F6F6F4" width="960" height="708px" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td width="203px" height="708px" align="left" style="vertical-align: top;BACKGROUND-COLOR: #FFFFFF;">
				<table align="center" width="203" height="708px" cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td width="203px" height="358px" align="left" style="PADDING-LEFT:20px;PADDING-Right:20px;PADDING-TOP: 20px;VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;">

';
$kusokkoda1='						</td>
		</tr>
		<tr>
			<td width="203px" height="12px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #F6F6F4;
			PADDING-LEFT:0px;PADDING-RIGHT:0px;PADDING-TOP:0px;PADDING-BOTTOM:0px;">
			</td>
		</tr>
		<tr>
			<td width="203px" height="208px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;">
			<table align="center" width="203px" height="208px" cellspacing="0" cellpadding="0" border="0">
				<tr>
				<td width="100%" height="26px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;text-align:center;">
				В корзине нет товара
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
					<td height="94px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<td height="94px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #EEEEEE;">&nbsp;</td>
					<td height="94px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<td height="94px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #EEEEEE;">&nbsp;</td>
					<td height="94px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					<td height="94px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #EEEEEE;">&nbsp;</td>
					<td height="94px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;">&nbsp;</td>
					</tr>
					<tr>
					<td height="7px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td height="7px" align="center" style="border-bottom:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td height="7px" align="center" style="border-bottom:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td height="7px" align="center" style="border-bottom:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td height="7px" align="center" style="border-bottom:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td height="7px" align="center" style="border-bottom:1px solid black;VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					<td height="7px" align="center" style="VERTICAL-ALIGN: middle;BACKGROUND-COLOR: #FFFFFF;"></td>
					</tr>

					</table>		

				</td>
				</tr>
				
				<td width="100%" height="70px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;">
				Всего на сумму: 0 руб<br>
				<a href="" target="_self">Оформить покупку</a><br>
				<a href="" target="_self">Зарегистрироваться</a><br>
				</td>
				</tr>
			</table>
			
			
			
			</td>
		</tr>
		<tr>
			<td width="203px" height="12px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #F6F6F4;
			PADDING-LEFT:0px;PADDING-RIGHT:0px;PADDING-TOP:0px;PADDING-BOTTOM:0px;">
			</td>
		</tr>
		<tr>
			<td width="203px" height="106px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;">
			<a href="http://www.hermitagemuseum.org/html_Ru/12/2003/hm12_3_3.html" target="_blank"><img src="/img/hermitage.gif"></a>
			</td>
		</tr>
		<tr>
			<td width="203px" height="30px" align="left" style="VERTICAL-ALIGN: bottom;BACKGROUND-COLOR: #F6F6F4;color : #999999;">
			  © 1744-2011 ИФ Поволжье
			</td>
		</tr>
	</table>
</td>
<td width="12px" height="708px" align="left" style="BACKGROUND-COLOR: #F6F6F4;">&nbsp;</td>
<td width="744px" height="342px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;">
<table align="center" bgcolor="#FFFFFF" width="100%" height="704px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td style="vertical-align: top;">
';
$kusokkoda2='						</td>
					</tr>
					<tr>
						<td width="203px" height="12px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #F6F6F4;
						PADDING-LEFT:0px;PADDING-RIGHT:0px;PADDING-TOP:0px;PADDING-BOTTOM:0px;">
						</td>
					</tr>
					<tr>
						<td width="203px" height="106px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;">
						<a href="http://www.hermitagemuseum.org/html_Ru/12/2003/hm12_3_3.html" target="_blank"><img src="/img/hermitage.gif"></a>
						</td>
					</tr>
					<tr>
						<td width="203px" height="695px" align="left" style="VERTICAL-ALIGN: bottom;BACKGROUND-COLOR: #F6F6F4;color : #999999;">
						  © 1744-2011 ИФ Поволжье
						</td>
					</tr>
				</table>
			</td>
			<td width="12px" height="708px" align="left" style="BACKGROUND-COLOR: #F6F6F4;">&nbsp;</td>
			<td width="744px" height="172px" align="left" style="VERTICAL-ALIGN: top;BACKGROUND-COLOR: #FFFFFF;">
			<table align="center" bgcolor="#FFFFFF" width="100%" height="704px" cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td style="vertical-align: top;">
';
$i=0;$j=2;
$menuname=$_GET['menu'];$menuname2=$_GET['menu2'];$menuname3=$_GET['menu3'];$menuname4=$_GET['menu4'];
if ($menuname=="")$menuname="about";
if ($menuname=="shop"){
	switch($menuname2)
	{  case $menu[0][0]: $m2=0;break;
	   case $menu[1][0]: $m2=1;break;
	   case $menu[2][0]: $m2=2;break;
	   case $menu[3][0]: $m2=3;break;
	   case $menu[4][0]: $m2=4;break;
	   case $menu[5][0]: $m2=5;break;
	   case $menu[6][0]: $m2=6;break;
	   case $menu[7][0]: $m2=7;break;
	   default: $m2=-1;}
	switch ($m2)
	{
	case -1:
		for($i=0;$i<8;$i++){echo "<a href='/shop/".$menu[$i][0]."' target='_self'>".$menu[$i][1]."</a><br>";if($i==3) echo"<HR>";	}
		echo $kusokkoda1."<img src='/img/makar.jpg'></td></tr><tr><td><table align='center' bgcolor='#FFFFFF' width='100%' height='356px' cellspacing='0' cellpadding='0' border='0'><tr>";
		for($i=0;$i<8;$i++){
		echo"<td height='178px' width='25%'><a href='/shop/".$menu[$i][0]."' target='_self'><img src='/img/menu$i.jpg'><br>".$menu[$i][1]."</a></td>";
		if($i==3) echo"</tr><tr>";}
		echo"</td></tr></table></td></tr></table></td></tr></table></td></tr></table>";
	break;
	default:
	if($menu)
	switch($menuname3)
	{  case "": $m3=-1;break;
	   case $menu[$m2][2]: $m3=0;break;
	   case $menu[$m2][4]: $m3=1;break;
	   case $menu[$m2][6]: $m3=2;break;
	   case $menu[$m2][8]: $m3=3;break;
	   case $menu[$m2][10]: $m3=4;break;
	   case $menu[$m2][12]: $m3=5;break;
	   case $menu[$m2][14]: $m3=6;break;
	   case $menu[$m2][16]: $m3=7;break;
	   default: $m3=-1;}
	for($i=0;$i<$m2+1;$i++){if($i==4) echo"<HR>";echo "<a href='/shop/".$menu[$i][0]."' target='_self'>".$menu[$i][1]."</a><br>";	}
		echo '<p style="FONT-SIZE: 15px;margin-top:5px;margin-bottom:5px;">';
		for($i=2;$i<count($menu[$m2]);$i=$i+2){echo "<a href='/shop/".$menu[$m2][0]."/".$menu[$m2][$i]."' target='_self'>".$menu[$m2][$i+1]."</a><br>";}
		echo '</p>';
		for($i=$m2+1;$i<8;$i++){if($i==4) echo"<HR>";echo "<a href='/shop/".$menu[$i][0]."' target='_self'>".$menu[$i][1]."</a><br>";	}	
		echo $kusokkoda1;
	switch($m3)
	{case -1:
		echo '<img src="/img/'.$menu[$m2][0].'.jpg"></td></tr><tr><td>
			<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0"><tr>';
			for($i=2;$i<count($menu[$m2]);$i=$i+2){$k=($i-2)/2;echo "<td height='178px' width='25%'>
		<a href='/shop/".$menu[$m2][0]."/".$menu[$m2][$i]."' target='_self'><img src='/img/".$menu[$m2][0].$k.".jpg'><br>
		".$menu[$m2][$i+1]."</a></td>";	if($i==8) echo"</tr><tr>";}
		echo"</td></tr></table></td></tr></table></td></tr></table></td></tr></table>";
	break;
	case 0: case 1: case 2: case 3: case 4: case 5: case 6: case 7:
		echo '<table align="center" bgcolor="#F6F6F4" width="99%" height="26px" cellspacing="0" cellpadding="0" border="0" style="margin-top:4px;border-top:2px solid #E3E3E1;">
	<tr>
	<td style="color:gray;font-size:13px;background-color: #F6F6F4;vertical-align: middle;text-align:left;padding-left:10px;">Сортировать по наименованию, по цене. Отображать все товары, товары в наличии. </td>
	</tr></table>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="660px" cellspacing="0" cellpadding="0" border="0" style="margin-top:4px;"><tr>';
	
//PrintCatalog($page,$m3,$Uslovie,$Filter,$Sort);
  $a=PrintCatalog($menuname4,$menu[$m2][2+($m3*2)],"all","","n");

  echo $a;
	
	echo'</tr></table>';
	break;
	default:
	}

	}
				
}
elseif ($menuname=="contact"){
echo '
	<a href="/shop/service" target="_self">Сервизы</a><br>
	<a href="/shop/sculpture" target="_self">Скульптура</a><br>
	<a href="/shop/piece" target="_self">Штучный ассортимент</a><br>
	<a href="/shop/interior" target="_self">Предметы интерьера</a><br><br>
	<HR><br>
	Лиможский фарфор<br>
	<a href="/shop/crystal" target="_self">Гусевской хрусталь</a><br>
	Текстиль<br>
	Книги<br>'.$kusokkoda1.'
<img src="/img/contact.jpg"></td></tr><tr>
<td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="356px" width="100%" style="vertical-align: top;padding-top:30px;">
		ОАО "Императорский Фарфоровый завод", г. Санкт-Петербург, пр. Обуховской обороны, 155<br><br>

Фирменные магазины ОАО "Императорский Фарфоровый завод" в Поволжье:<br><br>
г. Самара, ТРК "Вива Лэнд", пр. Кирова, 147, первый этаж, телефон: +7 (846) 277-03-86<br>
г. Самара, ТЦ "Русь на Волге", Московское шоссе, 15б, первый этаж, телефон: +7 (846) 277-08-23<br><br>

г. Тольятти, ТРЦ "Аэрохолл", ул. Баныкина, 62а, первый этаж, телефон: +7 (8482) 95-71-17<br>
г. Тольятти, ТОЦ "Гранд Сити", Новый проезд, 3, первый этаж, телефон: +7 (8482) 52-54-50<br><br>

По вопросам сотрудничества и оптовых закупок обращаться на электронную почту: director@ifarfor.ru<br>
		</td>
	</tr>
	</table></td></tr></table></td></tr></table></td></tr></table>';}
elseif ($menuname=="about"){
echo '
	<a href="/museum" target="_self">Музей</a><br>
	<a href="/history" target="_self">История завода</a><br>
	<a href="/manufacture" target="_self">Производство</a><br>
	<HR>
'.$kusokkoda1.'<img src="/img/about.jpg"></td></tr><tr><td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="178px" width="25%"><a href="/museum" target="_self"><img src="/img/about1.jpg"><br>Музей</a></td>
		<td width="25%"><a href="/history" target="_self"><img src="/img/about2.jpg"><br>История завода</a></td>
		<td width="25%"><a href="/manufacture" target="_self"><img src="/img/about3.jpg"><br>Производство</a></td>
		<td width="25%">&nbsp;</td>
	</tr>
	<tr>
		<td height="178px" width="100%" colspan="4">&nbsp;
		</td></tr></table></td></tr></table></td></tr></table></td></tr></table>';
}
elseif ($menuname=="museum"){
echo '
	<a href="/museum" target="_self">Музей</a><br>
	<a href="/history" target="_self">История завода</a><br>
	<a href="/manufacture" target="_self">Производство</a><br>
	<HR>
'.$kusokkoda2.'<img src="/img/museum.jpg"></td></tr><tr><td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="534px" width="100%" style="vertical-align: top;text-align:left;padding:12px;"><img src="/img/about1.jpg" hspace=10 vspace=10 style="float: left">
<p>В феврале 2001 г. Государственный Эрмитаж принял под свое управление уникальное историческое собрание музея Императорского фарфорового завода, расположенного на территории ОАО «ИФЗ» по адресу: проспект Обуховской обороны, 151.
</p><p>
Заводской музей был основан в 1844 году по распоряжению Николая I как хранилище образцов, достойных изучения и копирования. Он возник гораздо раньше таких знаменитых хранилищ произведений искусства, как Третьяковская галерея и Русский музей. В музее сформировалась единственная в мире уникальная коллекция, отражающая почти 260 летнюю историю первого фарфорового завода России. Она насчитывает более 30 тысяч экспонатов. Это фарфор и стекло Императорских заводов, вещи советского периода, изделия известных европейских мануфактур и русских частных заводов, образцы японского и китайского фарфора. Здесь представлены исторические и культурные ценности, аналогов которым нет ни в одном музее мира. В библиотеке музея, основанной во второй половине ХIХ века собраны редчайшие книги по фарфору и искусству, эскизы и рисунки художников с мировым именем.
</p><p>
С последней четверти ХIХ века по личному распоряжению императора Александра III все заказы императорской семьи исполнялись на заводе в двух экземплярах, один из которых оставался в музее. Эта традиция регулярного пополнения музея была сохранена и в советский период, начиная с фарфора 20-х годов до последнего десятилетия ХХ века. Дважды коллекция музея покидала стены завода: с осени 1917 - до осени 1918 года в целях сохранности ее вывозили в Петрозаводск, и в годы войны и Ленинградской блокады экспонаты были эвакуированы на Урал, в Ирбит.
</p><img src="/img/museum1.jpg" hspace=10 vspace=10 style="float: right"><p>
После окончания войны в Москве было принято решение о передаче фондов заводской коллекции фарфора в Русский музей. Ведущим художникам завода во главе с Н.М. Суетиным при поддержке известных деятелей культуры удалось сохранить коллекцию на ИФЗ. Большую помощь в решении этого вопроса оказала знаменитый скульптор В.И. Мухина. Уже тогда было доказано, что собрание заводского музея, являясь национальным достоянием Отечества, не может существовать вне стен завода, где музей был основан, и благодаря которому постоянно пополнялся. На протяжении полутора веков музей был школой высочайшего мастерства, благодатным источником творческого вдохновения художников нескольких поколений, связующим звеном между прошлым и будущим искусства русского художественного фарфора. На базе музейной коллекции формировались многочисленные отечественные и зарубежные выставки, устраивались персональные выставки ведущих художников. По решению Министерства культуры фарфор из коллекции заводского музея экспонировался на выставках в Англии, Австрии, Швейцарии, Японии, Германии, Бельгии и др.
</p><p>
В книге Почетных гостей завода, и в первую очередь музея, оставили свои автографы члены императорской семьи, Казимир Малевич, Луначарский, Горький, Шаляпин, Есенин, Маяковский и Лиля Брик, Мейерхольд и Зинаида Райх, министр культуры СССР Е.Фурцева и первая женщина-космонавт В. Терешкова, Генеральный секретарь ЦК КПСС Л. Брежнев и первый мэр Петербурга А. Собчак – этот перечень можно продолжать и продолжать…
</p><p>
Императорский фарфоровый завод с его музеем – это уникальное место,где создается и хранится материализованная в фарфоре история и культура России на протяжении почти трех веков.
</p><p>
На рубеже 2000 года приватизированный завод оказался в руках американских фондов и вновь остро возник вопрос о местонахождении и сохранности уникального музейного собрания, которое не подлежало приватизации и оставалось государственной собственностью. Уже было принято постановление бывшего губернатора города о передаче музейной коллекции Русскому музею с экспонированием ее в залах Строгановского дворца. В защиту сохранения коллекции на ее историческом месте вступился директор Эрмитажа М. Б. Пиотровский, который прекрасно понимал, что разрушение этой связи может привести к необратимой потере традиций. Высочайший авторитет «музейщика» мирового уровня и предложение Михаила Борисовича взять заводской музей под патронат Государственного Эрмитажа, оставив его в стенах завода, сыграли решающую роль при рассмотрении вопроса в Министерстве культуре РФ.
</p><img src="/img/museum2.jpg" hspace=5 vspace=10 style="float: left"><p>
В начале 2003 года на базе музейной коллекции и в стенах ИФЗ создается новый отдел ГЭ «Музей фарфорового завода». К этому времени на заводе сменился собственник, и владельцами завода стала семья Г. и Н. Цветковых.
</p><p>
Ими принимается решение о финансировании реконструкции помещений музея и входной группы с созданием нового магазина и галереи современного фарфора. 22 декабря состоялось новое рождение Музея фарфорового завода, как отдела Государственного Эрмитажа. А это значит, впервые за сто лет музей стал открытым и доступным для всех желающих.
</p><p>

Музей открыт для посетителей ежедневно, кроме понедельника. 
Ознакомиться с виртуальной экспозицией музея ИФЗ вы можете на сайте Государственного Эрмитажа
</p>
</td>
		</tr>
</table></td></tr></table></td></tr></table></td></tr></table>';
}
elseif ($menuname=="history"){
echo '
	<a href="/museum" target="_self">Музей</a><br>
	<a href="/history" target="_self">История завода</a><br>
<p style="FONT-SIZE: 15px;margin-top:5px;margin-bottom:5px;padding-left:15px">
1744 - год основания<br>
1762 - 1801<br>
1801 - 1825<br>
1825 - 1894<br>
1894 - 1912<br>
1920е годы<br>
Довоенные годы<br>
Период после ВОВ<br>
Наши дни</p>
	<a href="/manufacture" target="_self">Производство</a><br>
	<HR>
'.$kusokkoda2.'<img src="/img/history.jpg"></td></tr><tr><td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="534px" width="100%" style="vertical-align: top;text-align:left;padding:12px;"><img src="/img/about1.jpg" hspace=10 vspace=10 style="float: left">
<h2>Первый фарфор России</h2>
<p>
Императорский фарфоровый завод — явление уникальное. Его продукция — художественный фарфор, является первым фарфором  России, как по времени своего возникновения, так и значительному вкладу в российскую и мировую культуру.
</p><p>
Изделия завода своими лучшими образцами декоративно-прикладного искусства завоевывали высокие награды на международных выставках в Лондоне, Париже, Нью-Йорке, Брюсселе, Вене. Они представлены в собраниях крупнейших музеев мира и в частных коллекциях. За право обладать ими борются на престижных международных аукционах «Сотбис» и «Кристи».
</p><p>
Художественное реноме императорского фарфора значительно возросло после того, как коллекция заводского музея, которая включает образцы продукции завода с середины XVIII века — до современных работ художников, перешла под патронат Государственного Эрмитажа, а музей, оставаясь на заводе, стал филиалом мировой сокровищницы культуры.
</p><p>
Императорский фарфоровый завод — один из немногих сохранившихся заводов, которому удалось пережить катаклизмы революций и войн, целые исторические эпохи, и при этом на протяжении почти трех веков постоянно создавать «фарфоровую летопись» Северной Пальмиры и всей России.
</p>
</td>
		</tr>
</table></td></tr></table></td></tr></table></td></tr></table>';
}
elseif ($menuname=="manufacture"){
echo '
	<a href="/museum" target="_self">Музей</a><br>
	<a href="/history" target="_self">История завода</a><br>
	<a href="/" target="_self">Производство</a><br>
	<HR>
'.$kusokkoda2.'<img src="/img/manufacture.jpg"></td></tr><tr><td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="534px" width="100%" style="vertical-align: top;text-align:left;padding:12px;"><img src="/img/about1.jpg" hspace=10 vspace=10 style="float: left">
<h2>Производство фарфора</h2>

<p>
Процесс изготовления фарфоровых изделий весьма сложен. К примеру, чтобы получить одну готовую чашку, необходимо выполнить до 80  технологических операций. В целом, на заводе сохранена основа технологии производства классического фарфора, разработанная еще в середине ХVIII века  Д. И. Виноградовым.
</p><p>
Фарфоровая масса изготавливается из тонких смесей каолина (белой глины), кварца, полевого шпата и других алюмосиликатов  и включает до 40 различных добавок.
</p><p style="padding-left:30px;">
<br>
Основное сырье:<img src="/img/manufacture1.jpg" hspace=10 vspace=0 style="float: right">
</p>
<li style="padding-left:50px;">каолин;</li>
<li style="padding-left:50px;">кварц, полевой шпат, пегматит;</li>
<li style="padding-left:50px;">глина;</li>
<li style="padding-left:50px;">кварцевый песок;</li>
<li style="padding-left:50px;">гипс пешеланский;</li>
<li style="padding-left:50px;">глинозем;</li>
<li style="padding-left:50px;">кости трубчатые.</li></p><p>
Полые изделия изготавливаются методом ручного или машинного литья. Жидкая фарфоровая масса  (шликер) заливается в гипсовые формы, состоящие из двух и более частей. За счет того, что гипс впитывает влагу,  в форме происходит  набор черепка определенной толщины, после чего  остатки шликера сливаются. Форма раскрывается и из нее  извлекается  пока еще хрупкое изделие, которое  подлежит оправке и последующей сушке.
</p><p>
Плоские изделия  делают методом формовки из более обезвоженной массы на формовочных полуавтоматах. Прочность фарфора достигается  за счет высокой температуры обжига  вначале «утельного» — до 900°С в течение 24 часов, а  после глазурования — «политого», при температуре 1380–1430°С до двух и более суток. При обжиге фарфор на 1/7  дает усадку, что необходимо учитывать при создании форм.
</p><p>
Анималистическая  скульптура изготавливается из «мягкого» фарфора,  обжигаемого  при температуре до 1280°С.  В  его состав  входят те же компоненты, только с более высоким содержанием полевого шпата.
</p><p>
З5 лет назад впервые в России на заводе  была разработана технология и осуществлен промышленный выпуск  изделий из тонкостенного костного фарфора — повышенной белизны, тонкости и просвечиваемости. В состав массы ввели фосфаты кальция — золу костей крупного рогатого скота, поэтому и фарфор называется костяным. За создание этой технологии и промышленный выпуск изделий группа специалистов ЛФЗ в 1980 году была удостоена Государственной премии СССР в области науки и техники.
</p><p>
Выпускаемые заводом изделия декорируются надглазурной и подглазурной росписью ручным, механизированным и комбинированным способом нанесения рисунка на фарфоровую поверхность. Подглазурные краски наносятся на сырой черепок, они более долговечны, т.к. сверху  защищены глазурью, но имеют ограниченную палитру. Наиболее популярен темно-синий кобальт. Надглазурные краски, обжигаемые при более низких температурах 720–860°С,  имеют обширную цветовую палитру. При обжиге многие керамические краски изменяют свой цвет, что обеспечивает дополнительные  художественные возможности при росписи  фарфора.
</p><p>
При декорировании изделий применяется деколь — переводная картинка, напечатанная керамическими красками на гуммированной бумаге и сверху покрытая  специальным лаком. При  обжиге уже декорированного изделия  пленка выгорает, а  краски спекаются с глазурью, и на поверхности фарфора остается рисунок. Подобная техника декорирования в сочетании с ручной дорисовкой позволяет  значительно увеличить тираж изделия.
</p><p>
Широкую мировую известность заводу принесла ручная высокохудожественная роспись. Целый ряд изделий  декорируется натуральным золотом с нанесением гравировального рисунка. Многие сервизы, вазы и  почти вся анималистическая скульптура декорируются подглазурными красками. Широко применяется сочетание   насыщенного подглазурного кобальта  с яркими надглазурными красками и золотом, что придает особый эффект продукции ИФЗ. 
</p><p>
Из уникальных технологий сохранилось также «крытье» кобальтом и подглазурная  пейзажная живопись, внедренная на ИФЗ  в конце ХІХ века.
</p><p>
Запланированный  ввод в строй  нового литейно–формовочного цеха и  установка в нем оборудования для современных  технологий. Уже сегодня на заводе успешно осваивается современная технология компьютерного  3D моделирования, которая позволит значительно сократить время   изготовление новых моделей  для производства фарфоровых изделий, а значит появится возможность  чаше обновлять ассортимент   
</p><p>
Продукция
</p><p>

В  настоящее время завод  выпускает около 4000  наименований изделий по форме и росписи. Это чайные, кофейные  и столовые сервизы, отдельные предметы посудного назначения, сувенирно-подарочные изделия, жанровая и анималистическая скульптура, декоративные блюда, тарелки и т. д. Они изготовлены из твердого, мягкого и костяного фарфора. Изделия  декорированы надглазурной и подглазурной росписью,  ручным, механизированным и комбинированным способами, с использованием в декоре красок из редких и драгоценных металлов. По заказу  завод изготавливает реплики из музейной коллекции ХVIII–ХХ вв., фирменную посуду с логотипом и монограммой заказчика.
</p><p>
На протяжении десятилетий повышенным спросом пользуется  фирменный сервиз завода с рисунком «Кобальтовая сетка» (С. Е. Яковлева, А. А. Яцкевич), удостоенный золотой медали на Всемирной выставке в Брюсселе. Широко известны в России и за рубежом  изделия по образцам народных художников России А. В. Воробьевского и И. И. Ризнича, академика Академии художеств Н. П. Славиной, дипломанта Академии художеств и Международной квадриеннале в Эрфурте  И. С. Олевской, художников Н. Л. Петровой, Т. В. Афанасьевой, Г. Д. Шуляк, С. А. Соколова, М. А. Сорокина, Ю. Я. Жгирова и др.
</p><p>
Завод выпускает продукцию в широком диапазоне: от домашнего сервиза и памятного сувенира — до банкетных сервизов президентского уровня и правительственных подарков главам зарубежных государств, призов  для крупнейших соревнований и фестивалей. Так, в дни празднования 300–летия Санкт-Петербурга все столы на торжественных приемах были накрыты посудой с маркой «ЛФЗ». 
</p><p>
Продукция с маркой «ЛФЗ» (введена в 1936 году) экспортируется  в высокоразвитые страны мира, такие как США, Германия, Франция,  Англия, Канада, Швеция, Норвегия, Япония и др. За последние годы основным направлением экспортных продаж (доля в общем объеме продаж 15%) был и остается рынок США, вторым и третьим по значимости являются рынки Германии и Великобритании . Можно выделить положительную тенденцию в продвижении товара на рынки Японии, Канады, Франции, Италии.
</p><p>
В настоящее время  ИФЗ возглавляет Группу предприятий, в состав которой, помимо  Императорского фарфорового завода, входят: Apilco-Yves Deshoulieres и Porcelaine de Sologne — лиможские заводы из Франции, что предполагает широкие перспективы совместного сотрудничества. Таким образом, старейший  фарфоровый завод России, в год своего 260–летия, вступает в новый этап исторического развития.
</p>
</td>
		</tr>
</table></td></tr></table></td></tr></table></td></tr></table>';
}
else echo $menuname;

$pagename=$_GET['page'];

$Mozno=0;
if ($pagename=="news.php")$Mozno=1;
elseif ($pagename=="help.php")$Mozno=1;
elseif (strpos($pagename,"help.php")==1)$Mozno=1;	

if ($Mozno==1) {
	$pagename=$_SERVER['DOCUMENT_ROOT']."/".$pagename;
	if (file_exists($pagename)){
    	if (strpos($pagename,".htm")){
    		$file = fopen ($pagename,"r");
    		if ($file ){
           		$response = fread ($file,filesize($pagename));
            	fclose ($file);
            	echo add_sessid_to_tag($response);
	 			set_stat($_GET['page']);			 
        		}
     		}
		else include($pagename); 
        }
	else echo("файл ".$pagename." не найден на сервере.");
}
//else  //include("news.php");

echo '</body></html>';

function PrintCatalog($page,$group,$Uslovie,$Filter,$Sort)
{
if($Uslovie=="all") $Uslovie="";
if ($Filter!=""){
			$sql_filter='HAVING 1=1'; 
			$qq=explode("|",$Filter); 
		    $num = count($qq);
	    	for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
			$Uslovie.=$sql_filter;
}
if($Sort!=""){
if($Sort=="n") 		 $Uslovie.=" ORDER BY name";
elseif ($Sort=="-n") $Uslovie.=" ORDER BY name DESC";
elseif ($Sort=="p")  $Uslovie.=" ORDER BY price";
elseif ($Sort=="-p") $Uslovie.=" ORDER BY price DESC";
elseif ($Sort=="b")  $Uslovie.=" ORDER BY brand";
elseif ($Sort=="-b") $Uslovie.=" ORDER BY brand DESC";
}
if($Sort=="") $Uslovie.=" ORDER BY name";


$query1=sql("SELECT name,ida,id,price1s,sklad FROM tovs WHERE idg='".$group."' AND grp=0 $Uslovie");

$i=1;$j=1;
while ($row = mysql_fetch_array($query1)) {
		$rowname=str_replace ("/"," ", $row['name']);
		$rowname=str_replace (","," ", $rowname);
		$rowname=str_replace ("  "," ", $rowname);
		$rowname=str_replace ("Не определен!","", $rowname);
		$rowname=str_replace ("Не определен","", $rowname);
		//if ($i>1)$class="catshop"; else $class="catshop2"; if ($j>1)$class.="0";

		$Nnewprice=$row['price1s'];
		$Nnewprice=$Nnewprice*0.85;
		$ts=floor($Nnewprice/1000);
		$ed=$Nnewprice-($ts*1000);
		if($ts=='0') $ts="";
		else {if($ed<10)$ed='00'.$ed;
		elseif($ed<100)$ed='0'.$ed;};
		$newprice1="$ts $ed р";
		
		$sklad=$row['sklad'];
		if($sklad=="0")$colorbag="bug.gif";	else $colorbag="bag.gif";
		
		$info="&nbsp;";
		$id_crop = substr($row['ida'], 3,5);
		
		$filename ="icons/".$id_crop."_resize.jpg";
		$filename2 ="icons/".$id_crop."_resize.JPG";
		$filename3 ="icons/".$id_crop.".jpg";
		$fname ="";

clearstatcache();
if (file_exists($filename)) {$perem="/".$filename;$fname ="images/".$id_crop."_resize.jpg";}
elseif (file_exists($filename2)) {$perem="/".$filename2;$fname ="images/".$id_crop."_resize.JPG";}
elseif (file_exists($filename3)) {$perem="/".$filename3;$fname ="images/".$id_crop.".jpg";}
else $perem="/icons/noimage.jpg";
if (file_exists($fname))$fname="/".$fname;
else $fname=$perem;


		$echo.="<td class='ifshop'>
		<table width='100%' 'cellspacing='0' cellpadding='0' border='0' style='margin-bottom:5px;margin-top:5px;'><tr>
		<td width='100%' height='145px' valign='bottom'><a href='$fname' target='_blank'><img height='150px' src='$perem'></td></tr>
		<td width='100%' height='62px' valign='middle'>$rowname</td></tr>
		<td width='100%' height='20px' valign='middle' align='center' style='border-bottom: 1px solid grey;vertical-align: top;'>
		<b>$newprice1</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='' target='_self'>в корзину</td></tr></table></td>";
		if ($i++>2){$i=1;$j++;$echo.="</tr><tr>";}
		
		};
		while($j++<4){
		$echo.="<td colspan='4'></td></tr><tr>";
		};


return $echo;
}


?>