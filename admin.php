<?php
require_once("sql.php");
require_once("shop_func.php");
//create("users");
//sql("UPDATE users SET role = 'adm' WHERE login = 'xmindx@yandex.ru'");
//sql("ALTER TABLE orders DROP COLUMN addres");
//sql("ALTER TABLE tovs ADD  COLUMN sprice INT DEFAULT 0");
//	$r=sql("SELECT userid FROM stat WHERE date>'$databegin' and date<='$dataend' ORDER BY userid");
	$days=-10;
	$dataend=date("Y-m-d");
	$databegin=date("Y",time()+$days*86400)."-".date("m",time()+$days*86400)."-".date("d",time()+$days*86400);
sql("DELETE FROM box WHERE date<'$databegin' ORDER BY date");

session_start();
set_session_vars(); 
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>ADMIN</title>
	<META http-equiv=content-type content="text/html; charset=windows-1251">
	<META http-equiv=Content-language content=ru-RU>

</head>

<body  bgcolor="#FFFFFF" text="#000000">
<link href="Antares.css" type=text/css rel=stylesheet>
';

set_var('page','admin');
	if (!is_admin()){
		echo "У вас нет прав на работу с этой страницей!";
		exit;
	}

$oper=$_GET['oper'];
if ($oper=="drop"){
sql ("DROP TABLE ".$_GET['name']);
}
if ($oper=="del"){
sql ("DELETE FROM ".$_GET['name']);
 $oper="list";
}

if ($oper=="tables")
{
if(whichshop()=="a") $nametables='antares'; else $nametables='wwwmyantaresru';
    $result = mysql_list_tables($nametables);
    if (!$result) {
        print "DB Error, could not list tables\n";
        print 'MySQL Error: ' . mysql_error();
        exit;
    }
    while ($row = mysql_fetch_row($result)) {
		$q=$row[0];
		echo("<br><a href='".aPSID("admin.php?oper=list&name=$q")."'>$q</a>
		<a href='".aPSID("admin.php?oper=drop&name=$q")."'>Удалить</a><a href='".aPSID("admin.php?oper=del&name=$q")."'>Очистить</a><br>");
	    }
		echo '<br>';

    mysql_free_result($result);
}
if ($oper=="rename")
{
//if(whichshop()=="i") $nametables='antares'; else $nametables='wwwmyantaresru';
$nametables='antares';
    $result = mysql_list_tables($nametables);
    if (!$result) {
        print "DB Error, could not list tables\n";
        print 'MySQL Error: ' . mysql_error();
        exit;
    }
    while ($row = mysql_fetch_row($result)) {
		$q=$row[0];
		echo("<br><a href='".aPSID("admin.php?oper=list&name=$q")."'>$q</a>
		<a href='".aPSID("admin.php?oper=drop&name=$q")."'>Удалить</a><a href='".aPSID("admin.php?oper=del&name=$q")."'>Очистить</a><br>");
		if ($q!="ip_log" and $q!="ips"and $q!="logs"and $q!="undo") sql("RENAME TABLE $q TO _$q");
	    }
		echo '<br>';

    mysql_free_result($result);
}if ($oper=="dropall")
{
//if(whichshop()=="i") $nametables='antares'; else $nametables='wwwmyantaresru';
$nametables='antares';
    $result = mysql_list_tables($nametables);
    if (!$result) {
        print "DB Error, could not list tables\n";
        print 'MySQL Error: ' . mysql_error();
        exit;
    }
    while ($row = mysql_fetch_row($result)) {
		$q=$row[0];
		echo("<br><a href='".aPSID("admin.php?oper=list&name=$q")."'>$q</a>
		<a href='".aPSID("admin.php?oper=drop&name=$q")."'>Удалить</a><a href='".aPSID("admin.php?oper=del&name=$q")."'>Очистить</a><br>");
		if ($q!="ip_log" and $q!="ips"and $q!="logs"and $q!="undo") sql("drop TABLE $q");
	    }
		echo '<br>';

    mysql_free_result($result);
}
if ($oper=="list")
{
	$q=$_GET['name'];
/*	if($q=='box')	{
		echo("<br> Таблица <h1>$q</h1><a href='".aPSID("admin.php?oper=list&name=$q")."'>Обновить </a><a href='".aPSID("admin.php?oper=del&name=$q")."'>Очистить</a><br>");
		echo '<table border="1" cellspacing="2" cellpadding="0">';
		$ans='';$num='';
		$r=sql("SELECT box.comp_id,box.tov_id,box.price,boxid,kol,tovs.name,tovs.tip FROM box INNER JOIN tovs ON box.tov_id = tovs.id ORDER BY userid"); 
		if(mysql_num_rows($r)!=0) {
			while ($row = mysql_fetch_array($r)){ 
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
		echo "</table><br><hr width=2 size=90 noshade><a href='".aPSID("admin.php?oper=del&name=$q")."'>Очистить</a><br>";
	}
	else {*/
		echo("<br> Таблица <h1>$q</h1><a href='".aPSID("admin.php?oper=list&name=$q")."'>Обновить </a><a href='".aPSID("admin.php?oper=del&name=$q")."'>Очистить</a><br>");
		echo '<table border="1" cellspacing="2" cellpadding="0">';
		$result2=sql("SELECT * FROM ".$q);
		echo "<tr>";
		for ($i=0;$i<mysql_num_fields($result2);$i++){
		echo "<td>".mysql_field_name($result2,$i)."</td>";
		}
		echo "</tr>";
		while ($data=mysql_fetch_row($result2)) {
			echo "<tr><td>".implode(" </td><td>",$data), "</td></tr>\n";
			}
		echo "</table><br><hr width=2 size=90 noshade><a href='".aPSID("admin.php?oper=del&name=$q")."'>Очистить</a><br>";
//	}
}
if ($oper=="stat")
{
		$days=-$_GET['day'];
		$dataend=date("Y-m-d");
		$databegin=date("Y",time()+$days*86400)."-".date("m",time()+$days*86400)."-".date("d",time()+$days*86400);
		echo("<br> Таблица <h1>$q</h1><a href='".aPSID("admin.php?oper=list&name=$q")."'>Обновить </a><a href='".aPSID("admin.php?oper=del&name=$q")."'>Очистить</a><br>");
		echo '<table border="0" cellspacing="0" cellpadding="0">';
		$result2=sql("SELECT * FROM stat WHERE date>'$databegin' and date<=NOW() ORDER BY date");
		echo "<tr>";
		for ($i=0;$i<mysql_num_fields($result2);$i++) echo "<td class='model'>".mysql_field_name($result2,$i)."</td>";
		echo "</tr>";
		$yozhik=0;
		while ($data=mysql_fetch_row($result2)) {
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
			if(substr(mysql_result($result2,$yozhik++,'page'), 0,2)=="i ") 
				{
				$id_d=substr(mysql_result($result2,$yozhik-1,'page'), 2,5);
				$rx=sql('SELECT name FROM tovs WHERE id="L'.$id_d.'"');
				$rowx = mysql_fetch_array($rx);
				$name=$rowx['name'];
				echo "<td class='model'><a href='merlion.php?id=L".$id_d."' style='font-size: 12px; color:#003399;text-decoration:none;' target=_blank>"
				.$name."</a></td>";
				mysql_free_result($rx);
				}
			echo "</tr>\n";
//	} else echo "1";
			}
		echo "</table>";
		echo "<style>
	td.model{ border : #cccccc 1px solid ;align:center;vertical-align: middle;font-size:12px;font-color:#333333;padding-left:5px;padding-right:5px;}
	</style>";
}



function create($tabl)
{
if ($tabl=="users"){
sql("CREATE TABLE IF NOT EXISTS users (
idd CHAR(17),
login CHAR(40),
password CHAR(40),
hash CHAR(100),
imya CHAR(20),
otchestvo CHAR(20),
family CHAR(30),
email CHAR(20),
userid CHAR(40),
orderidd CHAR(17),
prim TEXT,
sendmeprice INT,
phones CHAR(50),
role CHAR(3),
creditinfo TEXT, 
credit_filled INT, 
date TIMESTAMP(8),
PRIMARY KEY (userid)
)
");
sql('DELETE FROM users WHERE userid="usr88888888"');

sql('REPLACE INTO users(login,imya,userid,password,role) VALUES("akr","Александр","usr77777777","grandadm1","adm")');	
sql('REPLACE INTO users(login,imya,userid,password,role) VALUES("green","Григорий","usr88888888","grandadm2","adm")');

sql("UPDATE users SET
login='green', 
imya='Григорий', 
password='grandadm2', 
role='adm' 
WHERE userid='usr88888888'");   
}

if ($tabl=="musers"){
sql("CREATE TABLE IF NOT EXISTS musers (
  id		 		INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
  idparent		   varchar(8) character set cp1251 default '',
  grp 			   int(1) default 0,
  login	   		  CHAR(40) UNIQUE,
  password  CHAR(40),
  imya 			 varchar(20) character set cp1251 default NULL,
  otchestvo  varchar(20) character set cp1251 default NULL,
  family 		 varchar(20) character set cp1251 default NULL,
  email          CHAR(30),
  icq              CHAR(20),
  date 			 TIMESTAMP(8)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;");}

if ($tabl=="memo")
sql("CREATE TABLE IF NOT EXISTS memo(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
datebegin TIMESTAMP(8),
dateend TIMESTAMP(8),
status INT DEFAULT 0,
tema CHAR(40),
mark INT DEFAULT 0,
authorid INT UNSIGNED,
task TEXT
)");

if ($tabl=="maker")
sql("CREATE TABLE IF NOT EXISTS maker(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
memoid INT UNSIGNED,
makerid INT UNSIGNED
)");


if ($tabl=="memocomment")
sql("CREATE TABLE IF NOT EXISTS memocomment(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
date TIMESTAMP(8),
status INT DEFAULT 0,
authorid INT UNSIGNED,
comment TEXT
)");

  if ($tabl=="logs"){
sql("CREATE TABLE IF NOT EXISTS logs (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
time TIMESTAMP(8),
text TEXT,
link TEXT,
session_id TEXT)");
}

 if ($tabl=="checkorder"){
sql("CREATE TABLE IF NOT EXISTS checkorder (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
idd CHAR(17),
userid CHAR(40),
label CHAR(40))");
}

if ($tabl=="user_fl"){
sql("CREATE TABLE IF NOT EXISTS user_fl (
idd CHAR(17) UNIQUE,
userid CHAR(40),
imya CHAR(20),
otchestvo CHAR(20),
family CHAR(30),
date TIMESTAMP(8),
PRIMARY KEY (idd))
");
}

if ($tabl=="user_ul"){
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
date TIMESTAMP(8),
PRIMARY KEY (idd))
");
}

if ($tabl=="user_chp"){
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
date TIMESTAMP(8),
PRIMARY KEY (idd))
");
}

if ($tabl=="orders")//////////////in working
sql("CREATE TABLE IF NOT EXISTS orders(
idd CHAR(17) UNIQUE,
orderid INT UNSIGNED,
shopid CHAR(2),
docnum INT,
userid CHAR(40),
contragent_tip CHAR(3),
contragent CHAR(17),
rand_dig CHAR(6),
addres CHAR(8),
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
date TIMESTAMP(8),
phone CHAR(15),
cellphone CHAR(15),
email CHAR(40),
PRIMARY KEY (idd)
)");

if ($tabl=="addres"){
//sql("DROP TABLE addres2");
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
date TIMESTAMP(8),
PRIMARY KEY (charid))
");
//sql("DELETE FROM addres2");
/*sql("INSERT INTO addres2(
userid,rayon,street,house,room,dopaddr,date)
SELECT 
userid,rayon,street,house,room,dopaddr,date
FROM addres");
sql("DROP TABLE addres");
sql("RENAME TABLE addres2 TO addres");
sql("DROP TABLE addres2");*/
}
if ($tabl=="box")
// это наша корзина//////////////end working///in working - update
sql("CREATE TABLE IF NOT EXISTS box(
boxidd char(10),
boxid INT UNSIGNED, 
idd CHAR(17),
shopid CHAR(2),
comp_id INT DEFAULT 0,
orderid INT UNSIGNED,
userid CHAR(40),
tov_id CHAR(8),
kol INT UNSIGNED,
price DECIMAL (10,2),
summa DECIMAL (10,2),
date TIMESTAMP(8),
PRIMARY KEY (boxidd)
)");

if ($tabl=="quants")
// остатки
sql("CREATE TABLE IF NOT EXISTS quants(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tov_id CHAR(8),
shopid CHAR(2),
kol INT UNSIGNED,
date TIMESTAMP(8))");

if ($tabl=="tovs")

sql("CREATE TABLE IF NOT EXISTS `tovs` (
  idd varchar(17),
  id varchar(8) NOT NULL default '',
  idg varchar(8),
  grp int(1) default 0,
  `name` varchar(100) character set cp1251 default NULL,
  `price` decimal(10,2) default NULL,  
  `price1s` decimal(10,2) default NULL,
  `quant` int(11) default NULL,
  `tip` varchar(100) character set cp1251 default NULL,
  `brand` varchar(100) character set cp1251 default NULL,
  `prim` text character set cp1251,
  `zakaz` int(11) default NULL,
  `sklad` int(11) default NULL,
  `bu` int(11) default NULL, 
  `warranty` int(11) default 0,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `idd` (`idd`),
  KEY `idg` (`idg`),
  KEY `name` (`name`),
  KEY `tip` (`tip`),
  KEY `zakaz` (`zakaz`),
  KEY `sklad` (`sklad`),
  date TIMESTAMP(8),
  KEY `bu` (`bu`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;");

/*		sql("CREATE TABLE IF NOT EXISTS tovs( 
		idd CHAR(17) UNIQUE,
		id CHAR(8) PRIMARY KEY,
		idg CHAR(8),
		grp INT,
		name CHAR(100),
		price DECIMAL (10,2),
		quant INT,
		tip CHAR(100),		
		brand CHAR(100),
		prim TEXT,
		zakaz INT,
		sklad INT,
		bu  INT,
		KEY (idg),
		KEY (name),
		KEY (tip),
		KEY (zakaz),
		KEY (sklad),
		KEY (bu))");*/
/*if ($tabl=="grp")
		sql("CREATE TABLE IF NOT EXISTS grp 
		(id CHAR(8) PRIMARY KEY,
		idg CHAR(8),
		KEY (idg),
		name CHAR(100))");
*/
if ($tabl=="chat")
	sql("CREATE TABLE IF NOT EXISTS chat (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	autor CHAR(40),
	text TEXT)");
if ($tabl=="plat")
	sql("CREATE TABLE IF NOT EXISTS plat (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	text1 TEXT)");

/*if ($tabl=="comp_box")
sql("CREATE TABLE IF NOT EXISTS comp_box(
boxid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
comp_id INT DEFAULT 0,
userid CHAR(40),
tov_id CHAR(8),
kol INT UNSIGNED,
price INT UNSIGNED,
date TIMESTAMP(8))");
*/

if ($tabl=="old_box")
sql("CREATE TABLE IF NOT EXISTS old_box(
boxidd CHAR(17),
boxid INT UNSIGNED,
idd CHAR(17), 
shopid CHAR(2),
comp_id INT DEFAULT 0,
orderid CHAR(40),
userid CHAR(40),
tov_id CHAR(8),
kol INT UNSIGNED,
gar INT UNSIGNED DEFAULT 1,
pack INT UNSIGNED DEFAULT 1,
ant INT UNSIGNED DEFAULT 1,
ex CHAR(7),
price INT UNSIGNED,
date TIMESTAMP(8),
PRIMARY KEY (boxidd))");		

if ($tabl=="stat")
sql("CREATE TABLE IF NOT EXISTS stat(
ip CHAR(16),
browser CHAR(80),
date DATETIME,
page CHAR(10),
userid CHAR(40)
)");	
if ($tabl=="complects")
sql("CREATE TABLE IF NOT EXISTS complects(
		owner CHAR(8),
		line INT,
		item CHAR(8),
		kol INT DEFAULT 1,
		price INT DEFAULT 0,
		date TIMESTAMP(8)
)");	
if ($tabl=="nums"){
sql("CREATE TABLE IF NOT EXISTS nums(
		id INT UNIQUE PRIMARY KEY,
		idd CHAR(17),
		docnum INT,
		date TIMESTAMP(8)
)");	
    $r=sql("SELECT * FROM nums");
    if (mysql_num_rows($r)==0){
        sql('INSERT INTO nums (id,idd,docnum,date) VALUES(1,"40",30,NOW())');
    }
}

if ($tabl=="undo")
sql("CREATE TABLE IF NOT EXISTS undotbl(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
		userid CHAR(40),
		orderid INT UNSIGNED,
		tovid CHAR(8),
		kol INT DEFAULT 1
)");	

if ($tabl=="tabel")
sql("CREATE TABLE IF NOT EXISTS tabel(
		id  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        idd CHAR(17),
		user CHAR(40),
		shop CHAR(1),
		date DATETIME,
		user_date CHAR(40)
)");

if ($tabl=="mod_exchange")
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
		info CHAR(100)
)");


////////////////////////////////////////////////
}



if ($_GET['oper']=="create")
	
	if ($_GET['name']=="all"){
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
    create("mod_exchange"); 
    create("addres"); 
     create("logs"); 
     create("checkorder"); 
    
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
date TIMESTAMP(8),
phone CHAR(15),
cellphone CHAR(15),
email CHAR(40),
PRIMARY KEY (idd)
)");

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
sql("RENAME TABLE orders2 TO orders");
    }
	
echo '<form action="'.aPSID("admin.php").'" method="get">
<input type="submit" name="oper" value="tables">
<input type="text" name="name">
<input type="submit" name="oper" value="list">
<input type="submit" name="oper" value="drop">
</form>
<a href="'.aPSID('admin.php?name=all&oper=create').'">Создать все таблицы:<a/><br>

</body>
</html>';
?>