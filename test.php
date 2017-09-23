<?php
require_once("shop_func.php");require_once("box_func.php");	require_once("parser.php");	require_once("gui.php");prepare_parse("box.inc.html");

//MakePrice("all");
echo 'ok';

//exit;
require_once("sql.php");
//sql("INSERT INTO `picture` (`id`, `name`, `english`) VALUES (1, 'Первая статья', 'Text')");
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Поволжье.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body height="80px" bgcolor="#FFFFFF"  link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=cyrillic,latin" rel=stylesheet type=text/css>';
//sql("DROP TABLE towns2");
/*$lines = file('http://www.ifarfor.ru/tovs.txt');
// Осуществим проход массива и выведем содержимое в виде HTML-кода вместе с номерами строк.
foreach($lines as $line_num => $line){
	//$linenew=iconv('windows-1251', 'utf-8', $line);
//	echo "Строка #<b>{$line_num}</b> : " .sqlp($line) . "<br />\n";//htmlspecialchars(
	//   echo "Строка #<b>{$line_num}</b> : " .sqlp($line) . "<br />\n";//htmlspecialchars(
}
echo '</body></html>';*/
//exit;
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
if(!$reader->open("pvzlist.xml","Windows-1251"))
//if(!$reader->open("http://gw.edostavka.ru:11443/pvzlist.php","UTF-8"))
echo("Failed to open input file pvzlist.xml");
else{
	echo("Обновляем пункты выдачи");
	sql("DROP TABLE IF EXISTS punkts");	 
	sql("CREATE TABLE IF NOT EXISTS punkts(
		ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		CityCode INT UNSIGNED,
		City CHAR(100),
		WorkTime CHAR(100),
		Address CHAR(100),
		OblName CHAR(100),	
		Strana CHAR(60),	
		Phone CHAR(80))ENGINE=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
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
			("422","Ульяновск","10:00-20:00","Императорский фарфор, ул. Гончарова, 5","Ульяновская область","+7(8422)70-36-40","Россия")');
	sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
		("256","Уфа","10:00-20:00","Императорский фарфор, ул. Карла Маркса, 25","Башкортостан республика","+79272365886","Россия")');	
	sql('REPLACE INTO punkts(CityCode,City,WorkTime,Address,OblName,Phone,Strana) VALUES
		("428","Саратов","10:00-20:00","Императорский фарфор, ул. Вольская, 87","Саратовская область","+7 (8452) 46-90-70","Россия")');	
	while($reader->read()){
		//$Name=iconv("UTF-8","windows-1251",$reader->getAttribute("Name"));
		$Name=sqlpz($reader->getAttribute("Name"));
		if($Name!="Фиктивный" and $Name!=""){
			$citycode=$reader->getAttribute("CityCode");
			//$citycode=iconv("UTF-8","windows-1251",$reader->getAttribute("CityCode"));
			//$row=mysqli_fetch_array(sql("SELECT OblName,Strana FROM towns where id='$citycode'"));
			//$OblName=$row['OblName'];$Strana=$row['Strana'];
			$OblName=sqlpz($reader->getAttribute("RegionName"));
			$Strana=$reader->getAttribute("CountryName");
			if($OblName=="")$OblName="Не определено";
			if($OblName=="АР Крым")$OblName="Крым";
			$OblName=str_replace ("обл.","область", $OblName);
			$OblName=str_replace ("респ.","республика", $OblName);
			$OblName=str_replace ("авт.","автономный", $OblName);
			$q="INSERT INTO punkts (CityCode,City,WorkTime,Address,OblName,Strana,Phone) VALUES ('$citycode','".
//			iconv("UTF-8","windows-1251",$reader->getAttribute("City"))."','".
//			iconv("UTF-8","windows-1251",$reader->getAttribute("WorkTime"))."','".
//			iconv("UTF-8","windows-1251",$reader->getAttribute("Address"))."','$OblName','$Strana','".
//			iconv("UTF-8","windows-1251",$reader->getAttribute("Phone"))."')\r\n";
			$reader->getAttribute("City")."','".
			$reader->getAttribute("WorkTime")."','".
			$reader->getAttribute("Address")."','$OblName','$Strana','".
			$reader->getAttribute("Phone")."')\r\n";

			echo($q.'<br>');
			sql($q);
		}
	}

}
?>