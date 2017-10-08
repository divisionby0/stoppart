<?php
//header("location:http://www.myantares.ru");/
//exit; ///////////////b - myantares ////////// a - antares.avtograd ///////c - ifarfor ////
function whichshop2(){
	return "stoppart";
}//return "ifarfor";
function whichshop3(){
	return "stoppart";
}//return "ifarfor";stoppart
Error_Reporting(E_ALL & ~E_NOTICE);
//session_start();
function get_s_var($id){// возвращает безопасную переменную сессии
	$var=sqlp($_SESSION['s_'.$id]);
	if($var=="") if(isset($_COOKIE[$id])) $var=$_COOKIE[$id];
	return $var;
}
function page_url(){
	$page=$_SERVER['REQUEST_URI'];
	if($page==""){
		$page=substr($_SERVER['URL'],1);
		if($_SERVER['QUERY_STRING']!=""){$page.="?".$_SERVER['QUERY_STRING']; }
	}  
	return $page;
}
function echolog($log){
	$url=page_url();
	// sql("INSERT INTO logs(time,text,link,session_id) VALUE (NOW(),'".sqlp($log)."','".$url."','".session_id()."')");
}
/*function aPSID($loc){// ïåðåõîä äëÿ òåõ, ó êîãî íåò êóê  
 if (get_s_var('cookie_on')==1){//êóêè ó íàñ åñòü íè÷åãî íå äîáàâëÿåì
    $loc=str_replace('?PHPSESSID='.session_id(),"",$loc);
    $loc=str_replace('&PHPSESSID='.session_id(),"",$loc);
    return $loc;
 	}
$r="";	
if (substr_count($loc,"PHPSESSID")!=0 or substr_count($loc,"#")!=0) $r=$loc;
else{
	if (get_s_var('cookie_on')==1) $r=$loc;
    else{
		$id=session_id();
		if ($id=='') $r=$loc;
	    else{
			if (strpos($loc,"?")>0)	$r="$loc&PHPSESSID=$id";
		    else $r="$loc?PHPSESSID=$id";
	        }
        }
    }
return $r;
}*/
function aPSID($loc){// переход для тех, у кого нет кук
$userid=get_s_var('userid');
	if(isset($_COOKIE['userid'])){//куки у нас есть ничего не добавляем
		$loc=str_replace('?PHPSESSID='.session_id(),"",$loc);
		$loc=str_replace('&PHPSESSID='.session_id(),"",$loc);
		return $loc;
	}
	$r="";	
	if(substr_count($loc,"PHPSESSID")!=0 or substr_count($loc,"#")!=0) $r=$loc;
	else{
		$id=session_id();
		
		if($id=='') $r=$loc;
		else{
			if(strpos($loc,"?")>0)	$r="$loc&PHPSESSID=$id";
			else $r="$loc?PHPSESSID=$id";
		}
	}
	return $r;
}
function new_header($loc){// переход для тех, у кого нет кук     
	header(aPSID($loc));
	return;
}
function sql($q){
if($link=='') $link=sql_logon();
$r=mysqli_query($link, $q);
return $r;
}
function sql1($q){
	$r=sql($q.' LIMIT 1');
	if(mysqli_num_rows($r)==0) return "";
	$row = mysqli_fetch_array($r);
	return $row;
	//return $row[$name];
}
function sql_field($q){
	$r=sql($q.' LIMIT 1');
	if(mysqli_num_rows($r)==0) return false;
	$row = mysqli_fetch_array($r);
	$fld=$row[0];
	return $fld;
}
function sqlp($param){
	//htmlspecialchars
	//if( ereg( '^http://' .$HTTP_HOST ,getenv ('HTTP_REFERER' ))); 
	//preg_match( '/^([a-z0-9_\-\.])+\@([a-z0-9_\-])+(\.([a-z0-9])+)+$/' ,$email); 
	$ans=$param;
	$ans=iconv('windows-1251', 'utf-8', $param);
	$ans=trim($ans);
	//strip_tags
	$ans=htmlspecialchars(($ans),ENT_QUOTES,'ISO-8859-1');
	//$ans=htmlspecialchars(($ans),ENT_QUOTES);
	return $ans;
}
function sqlpz($param){
	//htmlspecialchars
	//if( ereg( '^http://' .$HTTP_HOST ,getenv ('HTTP_REFERER' ))); 
	//preg_match( '/^([a-z0-9_\-\.])+\@([a-z0-9_\-])+(\.([a-z0-9])+)+$/' ,$email); 
	$ans=$param;
	//$ans=iconv('windows-1251', 'utf-8', $param);
	$ans=trim($ans);
	//strip_tags
	$ans=htmlspecialchars(($ans),ENT_QUOTES,'ISO-8859-1');
	//$ans=htmlspecialchars(($ans),ENT_QUOTES);
	return $ans;
}
function utf1251($param){

	$ans=iconv('utf-8','windows-1251', $param);
	$ans=trim($ans);
	$ans=htmlspecialchars(($ans),ENT_QUOTES,'ISO-8859-1');
	//$ans=htmlspecialchars(($ans),ENT_QUOTES);
	return $ans;
}
function utf1251only($param){

	$ans=iconv('utf-8','windows-1251', $param);
	//$ans=htmlspecialchars(($ans),ENT_QUOTES);
	return $ans;
}
function sql_count($q){
	$r=sql($q); 
	//echo"$q : mysqli_num_rows=".mysqli_num_rows($r);
	return mysqli_num_rows($r);
}
function set_stat($page){
	//global $isjava;
	//if(get_s_var('isjava')=='on') $isj='j'; else $isj='i';
	$REMOTE_ADDR=getenv("REMOTE_ADDR");
	$HTTP_USER_AGENT=getenv("HTTP_USER_AGENT");
	if($REMOTE_ADDR!='89.188.123.112'
		and $HTTP_USER_AGENT!='iMediapartners-Google/2.1' 
		and substr($HTTP_USER_AGENT, 0,11)!='iigdeSpyder' 
		and strstr($HTTP_USER_AGENT,"bot")==false 
		and strstr($HTTP_USER_AGENT,"web")==false 
		and strstr($HTTP_USER_AGENT,"Yandex")==false 
		and strstr($HTTP_USER_AGENT,"Yahoo!")==false 
		and strstr($HTTP_USER_AGENT,"HTMLParser")==false 
	)
	sql("INSERT INTO stat (ip,browser,date,page,userid) VALUES ('$REMOTE_ADDR','$isj$HTTP_USER_AGENT',NOW(),'".sqlp($page)."','".sqlp($_SESSION['s_userid'])."')");
}
/*
function set_stat($page){
sql("INSERT INTO stat (ip,browser,date,page,userid) VALUES ('".getenv("REMOTE_ADDR")."','".getenv("HTTP_USER_AGENT")."',NOW(),'".sqlp($page)."','".sqlp($_SESSION['s_userid'])."')");
}*/
function GET($par){return sqlp($_GET[$par]); }
function test($var){
	echo " $var=<b>".$$var."</b>";
}
function is_admin(){
	//return true;
	global $userid;
	$userid=get_s_var('userid');
	$r=sql("SELECT role FROM users WHERE userid='$userid' AND role='adm' LIMIT 1");
	if(mysqli_num_rows($r)==1) return true;
	else return false;
}
function is_manager(){
	return false;
	global $userid;
	$userid=get_s_var('userid');
	$r=sql("SELECT role FROM users WHERE userid='$userid' AND role='mng' LIMIT 1");
	if(mysqli_num_rows($r)==1) return true;
	else return false;
}
function sql_logon(){
	global $link;
	$link = mysqli_connect('localhost', 'root', 'kljh76RRenJh7','stoppart');
	if (mysqli_connect_errno()) {    printf("Не удалось подключиться: %s\n", mysqli_connect_error());    exit();}
	return $link; 
}
?>