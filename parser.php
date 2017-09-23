<?php
require_once ("shop_func.php");     
session_start();
function prepare_parse($src_name){
global $texts_string;
$src_name=$_SERVER['DOCUMENT_ROOT']."/".$src_name;
$src=fopen($src_name,"r");
  if ($src)
  {
  	$start_str="";
    while(!feof($src))
    {
      $str = fgets($src);
	  $start_str.=$str;
    }
  }
  else
  {
    echo("Ошибка открытия файла");
	exit;
  }
  $tags="<";
//теперь делим на массивы
	$qq=explode("<!--@",$start_str);
    $num = count($qq);
    for($i = 1; $i < $num;) {
			$line=$qq[$i++];
			$pos=strpos($line,"-->");
			if ($pos!=0){
			$name=substr($line,0,$pos);
			$val=substr($line,$pos+3);
			$str1='$texts_strings[\''.$name.'\']="'.$val.'";
';
			$texts_string[$name]=$val;
			//echo "<h1>name=$name</h1><br>";// для вывода списка кусков разремить
			if (strpos($tags,"<".$name.">")) 
				echo"<hr><h3 style='color: Red;'>Дубль тэга '$name' в файле '$src_name'</h3><hr>";
			$tags.=$name."><";
			}
    }
fclose($src);
};
function parse_repval($line){//функция не готова
	$pos1=strpos($line,"<?");
	$pos2=strpos($line,"?>");
	while ($pos1!=false && $pos2!=false) {
	$line2=substr($line,$pos1+2,$pos2-$pos1-2);
	$str='$str='.$line2;
	//echo "<hr>$line2<hr>";
	eval($str);
	$line=str_replace("<?".$line2."?>",$str,$line);
	$pos1=strpos($line,"<?");
	$pos2=strpos($line,"?>");
	}
	return $line;
}
function parse($name1,$parse_str=""){
	global $texts_string;
	$str=$texts_string[$name1];
	//заменим переменные
	$qq=explode("@",$parse_str);
    $num = count($qq);
    for($i = 0; $i < $num;) {
		$line=$qq[$i++];
		$pos=strpos($line,"=");
		if ($pos!=0){
			$name=substr($line,0,$pos);
			$val=substr($line,$pos+1);
//			echo "<hr>***************$name*********$val<br>";
			$str=str_replace("@".$name.".",$val,$str);
			//заменим <? test(4567,456) /? > на его значение
		}
	}
    if(get_s_var('cookie_on'==1)){
	$str=str_replace("?@PHPSESSID.","",$str); 
	$str=str_replace("&@PHPSESSID.","",$str); 
    }
    else{
	$str=str_replace("?@PHPSESSID.","?PHPSESSID=".session_id(),$str); 
	$str=str_replace("&@PHPSESSID.","&PHPSESSID=".session_id(),$str); 
    }
    if ($str=="") return ("<h3>No echo in $name1</h3>");
	$str=str_replace("DOGSIMBOL","@",$str); 
$str=parse_repval($str);
return add_sessid_to_tag($str);
}
?>