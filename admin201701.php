<?php
session_start();
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
//set_session_vars();
global $userid;$userid=get_s_var("userid");
$nameofadmin='admin201701';
//sql("UPDATE box SET userid = 'ctm705856460' WHERE userid = 'ctm446681460'");
//sql("UPDATE users SET familia = 'Кошель' WHERE familia = 'Кошель.'");
//ctm446681460
//create("users");
//sql("RENAME TABLE quants TO quantsbackNew");
//sql("DELETE FROM users WHERE login='office@ifarfor.ru'");
//sql("RENAME TABLE tovsNew TO tovsNewbackNew");
//sql("UPDATE users SET role = 'adm' WHERE login = 'office@ifarfor.ru'");
//sql("ALTER TABLE orders DROP COLUMN addres");
/*sql("ALTER TABLE form ADD  COLUMN english CHAR(50)");
sql("ALTER TABLE material ADD  COLUMN english CHAR(50)");
sql("ALTER TABLE picture ADD  COLUMN english CHAR(50)");
sql("ALTER TABLE tovsNew ADD  COLUMN english CHAR(150)");
sql("ALTER TABLE brand ADD  COLUMN english CHAR(50)");
sql("ALTER TABLE tovsNew ADD  COLUMN videnglish CHAR(30)");
sql("ALTER TABLE tovsNew ADD  COLUMN tipenglish CHAR(30)");*/
//sql("ALTER TABLE tovsNew ADD COLUMN nameenglish CHAR(30)");
//sql("ALTER TABLE tovsNew ADD  COLUMN Kids int(1) default NULL");
//sql("ALTER TABLE users ADD  COLUMN strana CHAR(25)");
//sql("ALTER TABLE creator ADD  COLUMN english CHAR(100)");
//	$r=sql("SELECT userid FROM stat WHERE date>'$databegin' and date<='$dataend' ORDER BY userid");
//sql("INSERT INTO `article` (`id`, `name`, `description`, `count_like`) VALUES (1, 'Первая статья', 'Текст первой статьи!', 0)");
set_var('page','admin');
//	if (!is_admin()){		echo "Ошибка 408";		exit;	}
	$days=-15;
	$dataend=date("Y-m-d");
	$databegin=date("Y",time()+$days*86400)."-".date("m",time()+$days*86400)."-".date("d",time()+$days*86400);
//sql("DELETE FROM users WHERE ((date<'$databegin') AND (hash='425'))  ORDER BY date");
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>ADMIN</title>
	<meta http-equiv="content-type" content="text/html; charset=Windows-1251">
	<META http-equiv=Content-language content=ru-RU>
</head>
<body  bgcolor="#FFFFFF" text="#000000">
<link href="Antares.css" type=text/css rel=stylesheet>
';/*
/*set_var('page','admin');
	if (!is_admin()){
		echo "У вас нет прав на работу с этой страницей!";
		exit;
	}*/
$oper=$_GET['oper'];
if ($oper=="drop"){
sql ("DROP TABLE ".$_GET['name']);
}
if ($oper=="del"){
sql ("DELETE FROM ".$_GET['name']);
 $oper="list";
}
if ($oper=="showuser"){
		echo("<br> Таблица <h1>$q</h1><a href='".aPSID("$nameofadmin.php?oper=list&name=$q")."'>Обновить </a><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>");
		echo '<table border="1" cellspacing="2" cellpadding="0">';
		$result2=sql("SELECT * FROM users WHERE userid='".$_GET['userid']."'");
		echo "<tr>";
		for ($i=0;$i<mysqli_num_fields($result2);$i++){
		echo "<td>".mysqli_fetch_field_direct($result2, $i)->name."</td>";
		}
		echo "</tr>";
		while ($data=mysqli_fetch_row($result2)) {
			echo "<tr><td>".implode(" </td><td>",$data), "</td></tr>\n";
			}
		echo "</table><br><hr width=2 size=90 noshade><br>";
		mysqli_free_result($result2);
}
if ($oper=="tables")
{
if(whichshop()=="a") $nametables='antares'; else $nametables='stoppart_farfor';
//$dbname = 'stoppart_ifarfor';//ifarfor.ru
$dbname = 'stoppart_farfor';//stoppart.ru
$result = sql("SHOW TABLES FROM $dbname");

    //$result = mysql_list_tables($nametables);
    if (!$result) { print "DB Error, could not list tables\n";  print 'MySQL Error: ' . mysqli_error();exit; }
    while ($row = mysqli_fetch_row($result)) {
		$q=$row[0];
		echo("<br><a href='".aPSID("$nameofadmin.php?oper=list&name=$q")."'>$q</a>
		<a href='".aPSID("$nameofadmin.php?oper=drop&name=$q")."'>Удалить</a><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>");
	    }
		echo '<br>';
    mysqli_free_result($result);
}
if ($oper=="rename")
{
//if(whichshop()=="i") $nametables='antares'; else $nametables='wwwmyantaresru';
$nametables='antares';
    $result = sql("SHOW TABLES FROM $nametables");//mysqli_list_tables($nametables);
    if (!$result) {
        print "DB Error, could not list tables\n";
        print 'MySQL Error: ' . mysqli_error();
        exit;
    }
    while ($row = mysqli_fetch_row($result)) {
		$q=$row[0];
		echo("<br><a href='".aPSID("$nameofadmin.php?oper=list&name=$q")."'>$q</a>
		<a href='".aPSID("$nameofadmin.php?oper=drop&name=$q")."'>Удалить</a><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>");
		if ($q!="ip_log" and $q!="ips"and $q!="logs"and $q!="undo") sql("RENAME TABLE $q TO _$q");
	    }
		echo '<br>';
    mysqli_free_result($result);
}if ($oper=="dropall")
{
//if(whichshop()=="i") $nametables='antares'; else $nametables='wwwmyantaresru';
$nametables='antares';
    $result = sql("SHOW TABLES FROM $nametables");//mysqli_list_tables($nametables);
    if (!$result) {
        print "DB Error, could not list tables\n";
        print 'MySQL Error: ' . mysqli_error();
        exit;
    }
    while ($row = mysqli_fetch_row($result)) {
		$q=$row[0];
		echo("<br><a href='".aPSID("$nameofadmin.php?oper=list&name=$q")."'>$q</a>
		<a href='".aPSID("$nameofadmin.php?oper=drop&name=$q")."'>Удалить</a><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>");
		if ($q!="ip_log" and $q!="ips"and $q!="logs"and $q!="undo") sql("drop TABLE $q");
	    }
		echo '<br>';
    mysqli_free_result($result);
}
if ($oper=="list")
{
	$q=$_GET['name'];
/*	if($q=='box')	{
		echo("<br> Таблица <h1>$q</h1><a href='".aPSID("$nameofadmin.php?oper=list&name=$q")."'>Обновить </a><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>");
		echo '<table border="1" cellspacing="2" cellpadding="0">';
		$ans='';$num='';
		$r=sql("SELECT box.comp_id,box.tov_id,box.price,boxid,kol,tovs.name,tovs.tip FROM box INNER JOIN tovs ON box.tov_id = tovs.id ORDER BY userid"); 
		if(mysqli_num_rows($r)!=0) {
			while ($row = mysqli_fetch_array($r)){ 
				$ans.=print_mybox_line2($num++,$row['name'],$row['price'],$row['kol'],($row['price']*$row['kol']));
//				$sum=$sum+$row['price']*$row['kol'];//сумму все равно считаем
            }
	    }
		$result2=sql("SELECT * FROM ".$q);
		echo "<tr>";
		for ($i=0;$i<mysql_num_fields($result2);$i++){
		echo "<td>".mysql_field_name($result2,$i)."</td>";
		}
		echo "</tr>";
		while ($data=mysql_fetch_row($result2)) {
			echo "<tr><td>".implode(" </td><td>",$data), "</td></tr>\n";
			}
		echo "</table><br><hr width=2 size=90 noshade><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>";
	}
	else {*/
if($_GET['showbox']==1){	
		echo("<br> Таблица <h1>$q</h1><a href='".aPSID("$nameofadmin.php?oper=list&name=$q")."'>Обновить </a><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>");
		echo '<table border="1" cellspacing="2" cellpadding="0">';
		$result2=sql("SELECT * FROM $q WHERE hash<>425");//familia='Фирсова'
		echo "<tr>";
		for ($i=0;$i<mysqli_num_fields($result2);$i++){
		echo "<td>".mysqli_fetch_field_direct($result2, $i)->name."</td>";
		}
		echo "</tr>";
		while ($data=mysqli_fetch_row($result2)) {
			echo "<tr><td>".implode(" </td><td>",$data), "</td></tr>\n";
			}
		echo "</table><br><hr width=2 size=90 noshade><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>";
		}
else{	
		echo("<br> Таблица <h1>$q</h1><a href='".aPSID("$nameofadmin.php?oper=list&name=$q")."'>Обновить </a><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>");
		echo '<table border="1" cellspacing="2" cellpadding="0">';
		$result2=sql("SELECT * FROM ".$q);
		echo "<tr>";
		for ($i=0;$i<mysqli_num_fields($result2);$i++){

		echo "<td>".mysqli_fetch_field_direct($result2, $i)->name."</td>";
		//echo "<td>".mysqli_fetch_field_direct($result2, $i)->name."</td>";
		}
		echo "</tr>";
		while ($data=mysqli_fetch_row($result2)) {
			echo "<tr><td>".implode(" </td><td>",$data), "</td></tr>\n";
			}
		echo "</table><br><hr width=2 size=90 noshade><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>";
		}
//	}
mysqli_free_result($result2);
}
if ($oper=="stat")
{
		$days=-$_GET['day'];
		$dataend=date("Y-m-d");
		$databegin=date("Y",time()+$days*86400)."-".date("m",time()+$days*86400)."-".date("d",time()+$days*86400);
		echo("<br> Таблица <h1>$q</h1><a href='".aPSID("$nameofadmin.php?oper=list&name=$q")."'>Обновить </a><a href='".aPSID("$nameofadmin.php?oper=del&name=$q")."'>Очистить</a><br>");
		echo '<table border="0" cellspacing="0" cellpadding="0">';
		$result2=sql("SELECT * FROM stat WHERE date>'$databegin' and date<=NOW() ORDER BY date");
		echo "<tr>";
		for ($i=0;$i<mysqli_num_fields($result2);$i++) echo "<td class='model'>".mysqli_fetch_field_direct($result2, $i)->name."</td>";
		echo "</tr>";
		$yozhik=0;
		while ($data=mysqli_fetch_row($result2)) {
//	$DDD=mysql_result($result2,$yozhik,'browser');
//	if (
//		$DDD!='iMediapartners-Google/2.1' 
//		and substr($DDD, 0,11)!='iigdeSpyder' 
//		and strstr($DDD,"bot")==false 
//		and strstr($DDD,"HTMLParser")==false 
//		and strstr($DDD,"Yahoo!")==false 
//		)
//	{
			echo "<tr><td class='model'>".implode(" </td><td class='model'>",$data), "</td>";
			if(substr(mysqli_result($result2,$yozhik++,'page'), 0,2)=="i ") 
				{
				$id_d=substr(mysqli_result($result2,$yozhik-1,'page'), 2,5);
				$rx=sql('SELECT name FROM tovsNew WHERE id="L'.$id_d.'"');
				$rowx = mysqli_fetch_array($rx);
				$name=$rowx['name'];
				echo "<td class='model'><a href='merlion.php?id=L".$id_d."' style='font-size: 12px; color:#003399;text-decoration:none;' target=_blank>"
				.$name."</a></td>";
				mysqli_free_result($rx);
				}
			echo "</tr>\n";
//	} else echo "1";
			}
		echo "</table>";
		echo "<style>
	td.model{ border : #cccccc 1px solid ;align:center;vertical-align: middle;font-size:12px;font-color:#333333;padding-left:5px;padding-right:5px;}
	</style>";
	mysqli_free_result($result2);
}
function create($tabl)
{
	if ($tabl=="users"){
	sql("CREATE TABLE IF NOT EXISTS users (
	idd CHAR(17),
	login CHAR(40),
	password CHAR(40),
	hash CHAR(3),
	name CHAR(50),
	familia CHAR(50),
	imya CHAR(50),
	otchestvo CHAR(50),
	country CHAR(50),
	town CHAR(50),
	strana CHAR(25),
	adres CHAR(50),
	regionpunkt CHAR(50),
	citypunkt CHAR(50),
	addresspunkt CHAR(20),
	email CHAR(50),
	userid CHAR(40),
	orderidd CHAR(17),
	phone CHAR(50),
	phone2 CHAR(50),
	role CHAR(3),
	date TIMESTAMP(6),
	PRIMARY KEY (userid)
	)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci
	");
	sql("CREATE TABLE IF NOT EXISTS likeengine (
	id CHAR(14),
	userid CHAR(17)
	)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
	//sql('DELETE FROM users WHERE userid="usr88888888"');
	//sql('REPLACE INTO users(login,imya,userid,password,role) VALUES("akr","Александр","usr77777777","grandadm1","adm")');	
	//sql('REPLACE INTO users(login,name,userid,password,role) VALUES("green","Григорий","usr88888888","grandadm2","adm")');
	//sql("UPDATE users SET login='green', name='Григорий', password='grandadm2', role='adm' WHERE userid='usr88888888'");   
	}
elseif ($tabl=="musers")
sql("CREATE TABLE IF NOT EXISTS musers (
  id		 		INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
  idparent		   varchar(8) ,
  grp 			   int(1) default 0,
  login	   		  CHAR(40) UNIQUE,
  password  CHAR(40),
  imya 			 varchar(20),
  otchestvo  varchar(20),
  family 		 varchar(20),
  email          CHAR(30),
  icq              CHAR(20),
  date 			 TIMESTAMP(6)
)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif ($tabl=="memo")
sql("CREATE TABLE IF NOT EXISTS memo(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
datebegin TIMESTAMP(6),
dateend TIMESTAMP(6),
status INT DEFAULT 0,
tema CHAR(40),
mark INT DEFAULT 0,
authorid INT UNSIGNED,
task TEXT
)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="maker")
sql("CREATE TABLE IF NOT EXISTS maker(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
memoid INT UNSIGNED,
makerid INT UNSIGNED
)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="memocomment")
sql("CREATE TABLE IF NOT EXISTS memocomment(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
date TIMESTAMP(6),
status INT DEFAULT 0,
authorid INT UNSIGNED,
comment TEXT
)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="logs")
sql("CREATE TABLE IF NOT EXISTS logs (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
time TIMESTAMP(6),
text TEXT,
link TEXT,
session_id TEXT)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="checkorder")
sql("CREATE TABLE IF NOT EXISTS checkorder (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
idd CHAR(17),
userid CHAR(40),
label CHAR(40))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="user_fl")
sql("CREATE TABLE IF NOT EXISTS user_fl (
idd CHAR(17) UNIQUE,
userid CHAR(40),
imya CHAR(20),
otchestvo CHAR(20),
family CHAR(30),
date TIMESTAMP(6),
PRIMARY KEY (idd))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="user_ul")
sql("CREATE TABLE IF NOT EXISTS user_ul (
idd CHAR(17) UNIQUE,
userid CHAR(40),
ooo CHAR(20),
brand CHAR(20),
uradres CHAR(30),
inn CHAR(10),
kpp CHAR(9),
rs CHAR(20),
bank CHAR(30),
boss CHAR(40),
date TIMESTAMP(6),
PRIMARY KEY (idd))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="user_chp")
sql("CREATE TABLE IF NOT EXISTS user_chp (
idd CHAR(17) UNIQUE,
userid CHAR(40),
imya CHAR(20),
otchestvo CHAR(20),
family CHAR(30),
dateborn DATETIME,
pasportsn CHAR(20),
pasportkem CHAR(20),
uradres CHAR(30),
inn CHAR(10),
date TIMESTAMP(6),
PRIMARY KEY (idd))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="orders")
sql("CREATE TABLE IF NOT EXISTS orders(
idd CHAR(17) UNIQUE,
userid CHAR(40),
status CHAR(20),
summa INT UNSIGNED,
link_dostavka CHAR(20),
hash CHAR(3),
familia CHAR(50),
	imya CHAR(50),
	otchestvo CHAR(50),
	country CHAR(50),
	town CHAR(50),
	strana CHAR(25),
	adres CHAR(50),
	regionpunkt CHAR(50),
	citypunkt CHAR(50),
	addresspunkt CHAR(20),
	email CHAR(50),
	phone CHAR(50),
	phone2 CHAR(50),
date_dostavka DATETIME,
PRIMARY KEY (idd)
)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="addres")
sql("CREATE TABLE IF NOT EXISTS addres(
charid CHAR(8),
shopid CHAR(2),
id INT UNSIGNED,
userid CHAR(40),
rayon CHAR(40),
street CHAR(30),
house CHAR(30),
room CHAR(30),
dopaddr TEXT,
date TIMESTAMP(6),
PRIMARY KEY (charid))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci
");
elseif($tabl=="box")
sql("CREATE TABLE IF NOT EXISTS box(
boxidd char(10),
boxid INT UNSIGNED, 
idd CHAR(17),
shopid CHAR(2),
comp_id INT DEFAULT 0,
orderid INT UNSIGNED,
userid CHAR(40),
tov_id CHAR(20),
kol INT UNSIGNED,
price DECIMAL (10,2),
summa DECIMAL (10,2),
date TIMESTAMP(6),
PRIMARY KEY (boxidd)
)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="quants")// остатки
sql("CREATE TABLE IF NOT EXISTS quants(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tov_id CHAR(20),
shopid CHAR(2),
kol INT UNSIGNED,
date TIMESTAMP(6))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif($tabl=="tovs")
sql("CREATE TABLE IF NOT EXISTS `tovsNew` (
  idd varchar(17),
  id varchar(10) NOT NULL default '',
  ida varchar(14),
  idg varchar(10),
  grp int(1) default 0,
  `name` CHAR(200) ,
    `lowername` CHAR(200) ,
  english CHAR(150),
  `price` decimal(10,2) default NULL,  
  `price1s` decimal(10,2) default NULL,
  `quant` int(11) default NULL,
  `Form` INT UNSIGNED default NULL,
  `Picture` INT UNSIGNED default NULL,
  `Factory` INT UNSIGNED default NULL,
  `komplekt` int(1) default NULL,
  `Vid` CHAR(50) ,
  `Tip` CHAR(50),  
  videnglish CHAR(30),
  tipenglish CHAR(30),
  `zakaz` int(1) default NULL, 
  `sklad` int(11) default NULL,
  `AutorForm` INT UNSIGNED default NULL,  
  `AutorPicture` INT UNSIGNED default NULL,  
  `MetodOfMade` varchar(5) , 
  `TipOfMaterial` INT UNSIGNED default NULL,
  `TipAss` varchar(15) ,
  `Covering` varchar(15) ,
  `Imagefile` varchar(25) ,
  `Diameter` int(3) default NULL,  
  `Person` int(2) default NULL, 
  `Predmetov` int(2) default NULL, 
  `Width` int(3) default NULL,
  `Height` int(3) default NULL,
  `Capacity` int(3) default NULL,
  `memberID1` varchar(10) ,
  `memberID2` varchar(10) ,
  `memberID3` varchar(10) ,
  `memberID4` varchar(10) ,
  `memberID5` varchar(10) ,
  `memberID6` varchar(10) ,
  `memberID7` varchar(10) ,
  `memberID8` varchar(10) ,
  `memberID9` varchar(10) ,
  `memberID10` varchar(10) ,
  `memberID11` varchar(10) ,
  `memberQuant1` int(2) default NULL,
  `memberQuant2` int(2) default NULL,
  `memberQuant3` int(2) default NULL,
  `memberQuant4` int(2) default NULL,
  `memberQuant5` int(2) default NULL,
  `memberQuant6` int(2) default NULL,
  `memberQuant7` int(2) default NULL,
  `memberQuant8` int(2) default NULL,
  `memberQuant9` int(2) default NULL,
  `memberQuant10` int(2) default NULL,
  `memberQuant11` int(2) default NULL,
   `RStyle` int(1) default NULL,
   `NY` int(1) default NULL,
   `InLove` int(1) default NULL,
   `PancakeWeek` int(1) default NULL,
   `Easter` int(1) default NULL,
   `VictoryDay` int(1) default NULL,
   `DefenderDay` int(1) default NULL,
   `WomanDay` int(1) default NULL,
   `TeacherDay` int(1) default NULL,
   `Birthday` int(1) default NULL,
   `Wedding` int(1) default NULL,
   `Literature` int(1) default NULL,
   `Theatre` int(1) default NULL,
   `Flower` int(1) default NULL,
   `Peterburg` int(1) default NULL,
   `Moscow` int(1) default NULL,
   `Kids` int(1) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `idd` (`idd`),
  KEY `idg` (`idg`),
  KEY `name` (`name`),
  KEY `tip` (`tip`),
  KEY `zakaz` (`zakaz`),
  KEY `sklad` (`sklad`),
  date TIMESTAMP(6)) ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;");
elseif ($tabl=="picture"){
sql("CREATE TABLE IF NOT EXISTS picture (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
english CHAR(50),
name CHAR(100) UNIQUE)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;");
echo "UNIQUE";}
elseif ($tabl=="form")
sql("CREATE TABLE IF NOT EXISTS form (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
english CHAR(100),
name CHAR(30) UNIQUE)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif ($tabl=="creator")
sql("CREATE TABLE IF NOT EXISTS creator (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
english CHAR(100),
name CHAR(100) UNIQUE)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif ($tabl=="brand")
sql("CREATE TABLE IF NOT EXISTS brand (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`Strana` CHAR(30),
english CHAR(200),
name CHAR(200) UNIQUE)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif ($tabl=="material")
sql("CREATE TABLE IF NOT EXISTS material (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
english CHAR(50),
name CHAR(100) UNIQUE)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif ($tabl=="chat")
	sql("CREATE TABLE IF NOT EXISTS chat (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	autor CHAR(60),
	text TEXT)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif ($tabl=="plat")
	sql("CREATE TABLE IF NOT EXISTS plat (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	text1 TEXT)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif ($tabl=="old_box")
sql("CREATE TABLE IF NOT EXISTS old_box(
boxidd CHAR(17),
boxid INT UNSIGNED,
idd CHAR(17), 
shopid CHAR(2),
comp_id INT DEFAULT 0,
orderid CHAR(40),
userid CHAR(40),
tov_id CHAR(20),
kol INT UNSIGNED,
gar INT UNSIGNED DEFAULT 1,
pack INT UNSIGNED DEFAULT 1,
ant INT UNSIGNED DEFAULT 1,
ex CHAR(7),
price INT UNSIGNED,
date TIMESTAMP(6),
PRIMARY KEY (boxidd))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");		
elseif ($tabl=="stat")
sql("CREATE TABLE IF NOT EXISTS stat(
ip CHAR(16),
browser CHAR(80),
date DATETIME,
page CHAR(10),
userid CHAR(40))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");	
elseif ($tabl=="complects")
sql("CREATE TABLE IF NOT EXISTS complects(
		owner CHAR(8),
		line INT,
		item CHAR(8),
		kol INT DEFAULT 1,
		price INT DEFAULT 0,
		date TIMESTAMP(6))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");	
elseif ($tabl=="nums"){
sql("CREATE TABLE IF NOT EXISTS nums(
		id INT UNIQUE PRIMARY KEY,
		idd CHAR(17),
		docnum INT,
		date TIMESTAMP(6))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");	
    $r=sql("SELECT * FROM nums");
    if (mysqli_num_rows($r)==0)    sql('INSERT INTO nums (id,idd,docnum,date) VALUES(1,"40",30,NOW())');
}
elseif ($tabl=="undo")
sql("CREATE TABLE IF NOT EXISTS undotbl(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
		userid CHAR(40),
		orderid INT UNSIGNED,
		tovid CHAR(8),
		kol INT DEFAULT 1)ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");	
elseif ($tabl=="tabel")
sql("CREATE TABLE IF NOT EXISTS tabel(
		id  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        idd CHAR(17),
		user CHAR(40),
		shop CHAR(1),
		date DATETIME,
		user_date CHAR(40))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
elseif ($tabl=="mod_exchange")
sql("CREATE TABLE IF NOT EXISTS mod_exchange(
		base CHAR(7) PRIMARY KEY,
		name CHAR(20),
		user CHAR(100),
		date DATETIME,
		date_с DATETIME,
  		uploaded_c INT UNSIGNED,
  		to_load INT UNSIGNED,
  		confirmed_c INT UNSIGNED,
  		uploaded INT UNSIGNED,
  		to_load_c INT UNSIGNED,
  		confirmed INT UNSIGNED,
		info CHAR(100))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
};
if ($_GET['oper']=="create")
	if ($_GET['name']=="all"){
	//sql("DROP TABLE tovsNew");
	//sql("DROP TABLE orders");
	//sql("DROP TABLE quants");
	//sql("DROP TABLE users");
	//sql("DROP TABLE user_fl");
	//sql("DROP TABLE user_ul");
	//sql("DROP TABLE user_chp");
	//sql("DROP TABLE box");
	//sql("DROP TABLE tovs");
	//sql("DROP TABLE chat");
	//sql("DROP TABLE plat");
	//sql("DROP TABLE stat");
	//sql("DROP TABLE old_box");
	//sql("DROP TABLE complects");
	//sql("DROP TABLE nums");
	//sql("DROP TABLE undo");
	//sql("DROP TABLE tabel");
	//sql("DROP TABLE mod_exchange");
	//sql("DROP TABLE addres");
	//sql("DROP TABLE logs");
	//sql("DROP TABLE checkorder");
	create("orders");
	create("quants");
	create("users");
	create("user_fl");
	create("user_ul");
	create("user_chp");
	create("box");
	create("tovs");
	create("tovs");
	create("tovsPlus");	
	create("chat");
	//create("musers");
	//create("guestbook");
	//create("memo");
	//create("maker");
	//create("memocomment");
	create("plat");
	create("stat");
	create("old_box");
	create("complects");	
	create("nums");	
	create("undo");
    create("tabel");
//    create("mod_exchange"); 
    create("addres"); 
     create("logs"); 
     create("checkorder"); 
     echo "12222222222";
    create("picture"); 
     create("form"); 
     create("creator");
     create("brand");
     create("material");
    echo "all ok";  
	}
	else
	create($_GET['name']);
elseif ($_GET['oper']=="up2"){
//sql("DROP TABLE orders2");
if ($tabl=="orders2")
sql("CREATE TABLE IF NOT EXISTS orders2(
idd CHAR(17) UNIQUE,
orderid INT UNSIGNED,
shopid CHAR(2),
docnum INT,
userid CHAR(40),
contragent_tip CHAR(3),
contragent CHAR(17),
rand_dig CHAR(6),
addres INT,
addres2 CHAR(20),
comment TEXT,
discont_card INT,
use_discount INT,
discount_precent INT,
money CHAR(7),
bank CHAR(10),
srok INT,
vznos INT,
upgrade INT,
doplata INT,
summa_credit INT,
credit_passed INT, 
creditinfo TEXT,
status CHAR(20),
sync INT UNSIGNED DEFAULT 0,     
summa INT UNSIGNED,
date_dostavka DATETIME,
time_dostavka CHAR(20),
date TIMESTAMP(6),
phone CHAR(15),
cellphone CHAR(15),
email CHAR(40),
PRIMARY KEY (idd)
)");
/*
sql("DELETE FROM orders2");
sql("INSERT INTO orders2(
idd,orderid,shopid,docnum,userid,contragent_tip,contragent,rand_dig,
addres,comment,discont_card,use_discount,discount_precent,
money,bank,srok,vznos,upgrade,
doplata,summa_credit,credit_passed, creditinfo,status,sync,summa,date_dostavka,time_dostavka,date,phone,cellphone,email
)
SELECT 
idd,orderid,shopid,docnum,userid,contragent_tip,contragent,rand_dig,
addres,comment,discont_card,use_discount,discount_precent,
money,bank,srok,vznos,upgrade,
doplata,summa_credit,credit_passed, creditinfo,status,sync,summa,date_dostavka,time_dostavka,date,phone,cellphone,email
FROM orders
");
sql("DROP TABLE orders");
sql("RENAME TABLE orders2 TO orders");*/
    }
global $userid;$userid=get_s_var("userid");
$uid=$userid;	
echo '<form action="'.aPSID("$nameofadmin.php").'" method="get">
<input type="submit" name="oper" value="tables">
<input type="text" name="name">
<input type="submit" name="oper" value="list">
<input type="submit" name="oper" value="drop">
</form>
<a href="'.aPSID($nameofadmin.'.php?name=all&oper=create').'">Create sqlСоздать все таблицы:<a/><br>
<a href="'.aPSID($nameofadmin.'.php?userid='.$uid.'&oper=showuser').'">Show dataПоказать данные текущего пользователя:<a/><br>
</body>
</html>';
?>