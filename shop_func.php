<?php
require_once ("sql.php");
echolog("перед первым si=".session_id());
session_set_cookie_params(1080000);
session_start();
//set_session_vars();
global $userid;
global $idd;
$userid=get_s_var('userid');
$idd=get_s_var('idd');
function whichshop(){$ret=whichshop2(); return $ret;}
/********************************************************************************************************
                                                                вспомогательные функции общего назначения
*********************************************************************************************************/

function printlike($id,$countQuantStr,$language)
{	
	$colortext='#966D3F';$heart='hheart';
	if($countQuantStr==0){$countQuantStr='';$colortext='#AD9E82';$heart='heart';}
	if($countQuantStr==1)$countQuantStr='';
	if($language=='en') $Like='Like'; else $Like='Нравится';
	$echo.='<span style="display: block; float: left; margin: 10px 0 0 0; text-align: center; vertical-align:middle;"><img src="/img/'.$heart.'3.gif"></span>
	<span style="display: block; float: left; margin: 13px 0 10 0; padding-left:5px;text-align: center; color:'.$colortext.';vertical-align:middle;">'.$Like.' '.$countQuantStr.'</span>';
	return $echo;
}

function updateaddtobasketdata($id,$radio,$language){
	$imageStyle = 'height:14px';
	$imageAltText = 'rur';
	$imageSrc = '/img/rub-002.png';
	$price = null;
	$Addsize="";
	
	if($language=='en') {
		$strbask='Add to basket'; 
	}else {
		$strbask='Добавить в корзину';
	}
	
	if($radio=='150'){
		$price="950";
		$Addsize='S';
	}
	elseif($radio=='200'){
		$price="1 090";
	}
	elseif($radio=='260'){
		$price="2 190";
		$Addsize='B';
	}
	
	$imgElement = " <img src='".$imageSrc."' style='".$imageStyle."' alt='".$imageAltText."'>";
	//$price.=$imgElement;
	
	$link = aPSID("/set.php?oper=add_tov&tov_id=$id$Addsize&language=$language");
	$linkTarget = 'market';
	
	$data = ['price'=>$price, 'link'=>$link, 'elementId'=>'ishop', 'imageElement'=>$imgElement,'linkTarget'=>$linkTarget, 'label'=>$strbask];
	
	return json_encode($data);
}



function printsize($id,$radio,$language)
{
	if($language=='en') {
        $strbask='Add to basket'; $MM=' mm';
    }else
    {
        $strbask='Добавить в корзину';$MM=' мм';
    }
	if($radio=='200')$price="1 090 <img src='/img/rub-002.png' style='height:14px' alt='rur'>";
	elseif($radio=='150'){$price="950 <img src='/img/rub-002.png' style='height:14px' alt='rur'>";$Addsize='S';}
	elseif($radio=='260'){$price="2 190 <img src='/img/rub-002.png' style='height:14px' alt='rur'>";$Addsize='B';}
	$echo="<font class='price' data-pricevalueelementd='$id'>$price</font>".'<br><br>
		<a href="'.aPSID("/set.php?oper=add_tov&tov_id=$id$Addsize&language=$language").'" id="ishop'.$id.'" target="market">
		'.$strbask.'</a>';

	return $echo;
}

function add_sessid_to_tag($str){ //добавляет таг в строку всем линкам
    $len=0;
    if(strpos($str,'href'))
	{
    $q=preg_split('<a href="', $str,-1,PREG_SPLIT_NO_EMPTY);
    $ans=$q[0];
    for ($i=1;$i<count($q);$i++){
        //if (strpos($q[$i],"PHPSESSID=")==false){
        $pos=strpos($q[$i],'"');
        $link=substr($q[$i],0,$pos);
        $end=substr($q[$i],$pos);
        $ans.='<a href="'.aPSID($link)."".$end;//&test1=123
        /*}
        else{
        $ans.='<a href="'.$q[$i];
        }*/
    }
    return $ans;
	}
	else return $str;
}
function post($name){
    return sqlp($_POST[$name]);
}
function GetNameOfUser($name){
    $r=sql("SELECT * FROM users WHERE userid='$name' LIMIT 1");    
        if(mysqli_num_rows($r)==0){ 
		    $ans="Неизвестный";
	    } 
        else{
                $row = mysqli_fetch_array($r);
                $role=$row['role'];
                $family=$row['family'];
                $imya=$row['imya'];
                $otchestvo=$row['otchestvo'];
				if($role=='tmp') $ans="Гость";
				elseif($imya=='' and $family=='' and $otchestvo=='') $ans="Анонимный";
				else $ans=$family.'<br>'.$imya.'<br>'.$otchestvo;
        }
	mysqli_free_result($r);
    return $ans;
}
function GetNameOfUser2($name){
    $r=sql("SELECT * FROM users WHERE userid='$name' LIMIT 1");    
        if(mysqli_num_rows($r)==0){ 
		    $ans="Неизвестный";
	    } 
        else{
                $row = mysqli_fetch_array($r);
                $role=$row['role'];
                $family=$row['family'];
                $imya=$row['imya'];
                $otchestvo=$row['otchestvo'];
				if($role=='tmp') $ans="Гость";
				elseif($imya=='' and $family=='' and $otchestvo=='') $ans="Анонимный";
				else $ans=$imya.' '.$family;
        }
	mysqli_free_result($r);		
    return $ans;
}
function get_filial($order_cod){
                $fil=$order_cod % 21;
                return $fil;
}function get_order_number($order_cod){
                $fil=$order_cod % 21;
                $num=($order_cod-$fil)/21;
                return $num;
}
function set_session_vars(){
set_session_var(0);
}
function save_userid()
{
set_session_var(1);
}
function set_session_var($makesql)
{
	
	global $userid;
	$page=page_url();
	if(isset($_COOKIE['userid'])){
		$cookieuserid=$_COOKIE['userid'];
		if(get_s_var('userid')==''){
			set_var('userid',$cookieuserid);$userid=$cookieuserid;
		}
		elseif(get_s_var('userid')!=$cookieuserid){
			$userid=get_s_var('userid');
			session_set_cookie_params(1080000);
			setcookie('userid',$userid , time()+25920000,"/","ifarfor.ru");
			if(substr_count($page,'PHPSESSID=')!=0){
				$page=str_replace('?PHPSESSID='.session_id(),"",$page);
				$page=str_replace('&PHPSESSID='.session_id(),"",$page);
				if($makesql!=0){
					$r=sql("SELECT userid FROM users WHERE userid='$userid'");
					if(mysqli_num_rows($r)==0)
						sql("INSERT INTO users (userid,orderidd,login,password,role,hash) 
						VALUES ('$userid','0','unknown_$userid','$pass','tmp','425')");
					mysqli_free_result($r);
				}
				//new_header("Location: $page");
				//exit;
			}
		}
	}
	else{//нет куков (или не установлены или запрещены)
		if(get_s_var('userid')==''){
			$ok=1;	
			while($ok>0){
				srand();
				$userid="ctm".rand(100000000,999999999);
				$pass="".rand(1000,9999);
				$r=sql("SELECT userid FROM users WHERE userid='$userid'");
				$ok=mysqli_num_rows($r);//$ok=0;
				mysqli_free_result($r);
			}
			set_var('userid',$userid);
		}
		setcookie('userid',$userid , time()+25920000,"/","ifarfor.ru");
		if(substr_count($page,"PHPSESSID")==0){
			$id=session_id();
			if(strpos($page,"?")>0)	$page="$page&PHPSESSID=$id";
			else $page="$page?PHPSESSID=$id";
			if($makesql!=0){
				$r=sql("SELECT userid FROM users WHERE userid='$userid'");
				if(mysqli_num_rows($r)==0)
					sql("INSERT INTO users (userid,orderidd,login,password,role,hash) 
					VALUES ('$userid','0','unknown_$userid','$pass','tmp','425')");
				mysqli_free_result($r);
			}
			//new_header("Location: $page");
			//exit;
		}
	}
$userid=get_s_var('userid');
if($makesql!=0){
	$r=sql("SELECT userid FROM users WHERE userid='$userid'");
	if(mysqli_num_rows($r)==0)
		sql("INSERT INTO users (userid,orderidd,login,password,role,hash) 
		VALUES ('$userid','0','unknown_$userid','$pass','tmp','425')");
	mysqli_free_result($r);
	}	
}
function set_session_var3($makesql) {// эта процедура работает с кукой, проверяет есть ли кука, и если есть ставить все переменные
global $userid;
$page=page_url();  
if (get_s_var('cookie_on')=="")//куков нет
	{
    if(substr_count($page,'ct=1')==0 and $_GET['ct']!="1")
    	{
        setcookie("cookie_test","1",time()+2592000,"/","ifarfor.ru");
		session_set_cookie_params(1080000);
        if(substr_count($page,"?")==0) {new_header("Location: $page?ct=1");exit;}
        else{
        	new_header("Location: $page&ct=1");
        exit;
        }
        }
	else
    	{
        $page=str_replace("?ct=1&","?",$page);
		$page=str_replace("?ct=1","",$page);$page=str_replace("&ct=1","",$page);
        if($_COOKIE["cookie_test"]!="1"){set_var("cookie_on",-1);new_header("Location: $page");exit;}
        else {set_var("cookie_on",1);new_header("Location: $page");
        exit;
        }
		}
	}
$PHPSESSID_InLine = substr_count($page,"PHPSESSID"); 
$userid=get_s_var('userid');
if ($userid!="" and $PHPSESSID_InLine!=0)  return; //куков нет, userid есть. делать ничего не нужно, возврат.
if (isset($_COOKIE['userid'])) $cookieuserid=$_COOKIE['userid'];
if ($cookieuserid!="") {set_var('userid',$cookieuserid);$userid=$cookieuserid;}
elseif ($userid!="") 	setcookie('userid',$userid , time()+25920000,"/","ifarfor.ru");
if ($userid=="")
	{
			$ok=1;	
			while ($ok>0) 
				{
				srand();
				$userid="ctm".rand(100000000,999999999);
				$pass="".rand(1000,9999);
				$r=sql("SELECT userid FROM users WHERE userid='$userid'");
				$ok=mysqli_num_rows($r);//$ok=0;
				mysqli_free_result($r);
				}
	set_var('userid',$userid);
	setcookie('userid',$userid , time()+25920000,"/","ifarfor.ru");
	if (substr_count($page,"PHPSESSID")==0 && session_id()!="" && get_s_var('cookie_on')==-1) {new_header("location:".$page);exit;}
	};
$r=sql("SELECT userid FROM users WHERE userid='$userid'");
	if(mysqli_num_rows($r)==0 and $makesql!=0)//and $makesql!=0
		sql("INSERT INTO users (userid,orderidd,login,password,role,hash) VALUES ('$userid','0','unknown_$userid','$pass','tmp','425')");
mysqli_free_result($r);		
}
function get_sql_param_for_tovs(){
        switch(get_var("pick_what")){
                        case "new":$str="(zakaz=1 OR (sklad=1 AND bu=0))";break;
                        case "bu":$str="(bu=1 AND sklad=1)";break;
                        case "allbu":$str="(bu=1 OR bu=0)";break;
                        case "sklad":$str="(sklad=1 AND bu=0)";break;
                        default:$str="(zakaz=1 OR (sklad=1 AND bu=0))";break;
                        }
        return $str;
}
function get_sql_param_for_tovs_category(){
        switch(get_var("pick_what")){
                        case "new":$str="(zakaz=1 OR (sklad=1))";break;
                        case "bu":$str="(bu=1 AND sklad=1)";break;
                        case "allbu":$str="(bu=1 OR bu=0)";break;
                        case "sklad":$str="(sklad=1)";break;
                        default:$str="(zakaz=1 OR (sklad=1))";break;
                        }
        return $str;
}
function user_alert($msg)
{
set_var('inline_body',$msg);
require_once("index.php");
}
function msg($text){//печатает окно с предурпеждением прямо на странице
//return "";
echo '<SCRIPT language=JavaScript type=text/javascript>
        alert("'.$text.'");
        </SCRIPT>'.$text."<br>";
}
function get_var($id,$def=""){// запролняет переменные сессии
        $var=$_GET[$id];//берем из get
        if ($var=="") {$var=$_POST[$id];}//либо из пост
        if ($var=="") {$var=$_SESSION['s_'.$id];}//если никак не задано - берем из пераметра
        if ($var=="") {//если никак не задано и куках нет то заполняем по умолчанию
                $var=$def;
                $_SESSION['s_'.$id]=$def;
        }
        return sqlp($var);
}
function set_var($id,$def=""){// запролняет переменные сессии
        $_SESSION['s_'.$id]=$def;//если задано явно - сохраняем значение
//msg ("установили $id=$def");
        return $def;
}
function bugrep($t){
        echo $t;
        return "";
}
function get_name($userid){
        if ($userid=="") return "";
        $r=sql("SELECT * FROM users WHERE userid='$userid' LIMIT 1");
        if(mysqli_num_rows($r)==0) return "";
		mysqli_free_result($r);
        if ($row['imya']!="") $ret=$row['familia'].' '.$row['imya'].' '.$row['otchestvo'];
        else $ret=$row['login'];
	    mysqli_free_result($r);
		return $ret;
}
function get_phone($userid){
        if ($userid=="") return "";
        $r=sql("SELECT * FROM users WHERE userid='$userid' LIMIT 1");
        if(mysqli_num_rows($r)==0) return "";
        $row = mysqli_fetch_array($r);
        if ($row['phone']!="") $ret= $row['phone'].' '.$row['phone2'];
        else $ret= $row['email'];
		mysqli_free_result($r);
		return $ret;
}
function get_price($tov){//возвращает цену товара из справочника цен
        $r=sql('SELECT price FROM tovsNew WHERE id="'.sqlp($tov).'" LIMIT 1');
        if(mysqli_num_rows($r)==0) return 0;
		$price=$row['price'];
        mysqli_free_result($r);
        return $price;
}
function print_selector($value,$text,$sel){
if ($value==$sel)
        return '<option value="'.$value.'" SELECTED>'.$text.'</option>';
        else
        return '<option value="'.$value.'">'.$text.'</option>';
}
function print_button($text,$link,$goto){
return '<p align="left"><form action="'.$link.'" method="post">
<input type="submit" value="'.$text.'" style="BORDER-RIGHT: black 1px solid; BORDER-TOP: black 1px solid; FONT-SIZE: 14px; BORDER-LEFT: black 1px solid; BORDER-BOTTOM: black 1px solid; background-color: White;">
<input type="hidden"  name="goto" value="'.$goto.'">
</form></p>';
}
function get_oper(){
$oper=$_POST['oper'];
if ($_GET['oper']!="")
        $oper=$_GET['oper'];
return $oper;
}
function set_my_cookie($name,$value){
        $y3k = mktime(0,0,0,1,1,2030);
        setcookie($name,$value , time()+25920000,"/","ifarfor.ru");
};
function print_fields($paramlist,$test,$errors=0){//печатает и проверяет списки ввода
        $ans="";
        if ($test>0){
                if ($_POST['pass1']!="")
                        if ($_POST['pass1']!=$_POST['pass2']){
                                $ans='<br><font style="color:red">Не совпадают пароли.</font><br>';
                                $errors+=1;
                        }
        }
        $ans.="<table cellspacing=\"0\" cellpadding=\"2\" border=\"0\">";
        $qq=explode("#",$paramlist);
        $num = count($qq);
        for($i = 0; $i < $num; $i += 2){
                $p1=$qq[$i];
                $p2=$qq[$i+1];
                $mustbe="";
                if (substr($p2,0,1)=="*"){
                   $fname=substr($p2,1);
                   $mustbe='<font style="color:red">*</font>';
                  }
                else{
                        $fname=$p2;
                        $mustbe='';
                 }
                $value=$_POST[$fname];
                if (($test>0) && (substr($p2,0,1)=="*")){//проверка заполненности поля
                        if ($value==""){
                                $errors+=1;
                                $mustbe='<br><font style="color:red">не заполнено поле</font>';
                          }
                }
                if ($value==""){//а может нам передали параметр уже
                        $value=$GLOBALS["define_".$fname];
                        }
                if (substr($fname,0,4)=="pass")
//                        $field='<input type="password" value="'.$value.'" name="'.$fname.'">';
                        $field='<input size="21" type="password" value="" name="'.$fname.'">';
                else
                        if (substr($fname,0,1)=="<")
                                $field=$fname;
                        else
                                $field='<input  size="21" type="text" value="'.$value.'" name="'.$fname.'">';
                        $ans.="<tr><td align='right' style='font-size: 12px'>".$p1.$mustbe."</td><td>".$field."</td></tr>";
        }//for
        $ans.='
';
        if (($errors==0) and ($test>0))
                return "OK";
        else
                return $ans;
}
/********************************************************************************************************
                                                                Функции, обслуживающие логин пользователя
*********************************************************************************************************/

function login_test(){// пробует логинуть юзера и либо логает с высылкой куки, либо возвращает
// 1 -есть известная кука, 2 - выполнен вход, 0 - вход не выполенен
global $userid;
        $userid=get_s_var('userid');
        $login=sqlp($_POST['login']);
        if ($login!="") {
                $r=sql("SELECT * from users WHERE login='$login'");
                if(mysqli_num_rows($r)>0) {
                        $row = mysqli_fetch_array($r);
                        if ($row['password']==sqlp($_POST['password'])){
                                // логинулись типа по посту
                                // кидаем старую корзину в заказы юзера
                                save_old_user_box($row['userid']);//кидаем это в заказы
                                //меняем код у текущей корзины
                                //update_box(get_s_var('cur_box'),$row['userid']);
                                //меняем переменные
                                $userid=$row['userid'];
                                $cur_box=0;
                                //переставляем куки
                                set_var('userid',$userid);
                                set_var('cur_box',0);
                                set_var('logon',true);
                                set_my_cookie('userid',$userid);
                                sql("UPDATE users SET date=NOW() WHERE userid='$userid'");                 
								mysqli_free_result($r);               
                                return 2;
                        }
                }
        }
        mysqli_free_result($r);
        if (!get_s_var('logon')) return 0;        
        if ($userid!=""){
                //есть у нас какой-то кук
                $r=sql("SELECT role from users WHERE userid='$userid'");
                if(mysqli_num_rows($r)>0){
                    $row = mysqli_fetch_array($r);
                    if ($row['role']=='tmp') set_var('logon',false);
                    else set_var('logon',true);
					mysqli_free_result($r);
                        return 1;//кука есть и мы про нее знаем
                }
        }
        //так куки не нашли может нам уже постят что-то
        return 0;
}
function do_reset($resetUID,$login,$language){//Отправка пользователю сообщения о сбросе пароля
$ok=0;$secretword='sw';
$secretword="SW".rand(1000000000,9999999999);
$r=sql("SELECT userid FROM user_fl WHERE userid='$resetUID'");
$ok=mysqli_num_rows($r);echo 'r='.$resetUID;
if($ok==0)	sql("INSERT INTO user_fl (userid,idd,imya,date) VALUES ('$resetUID','$resetUID','$secretword',NOW())");
else sql ("UPDATE user_fl SET imya='$secretword',date=NOW() WHERE userid='$resetUID'");
//отправим почту со ссылкой
if($language=='en')
{
$text="You have been requested to change the password for your account on the Imperial Porcelain website. <br>
<br>
To reset the password, click this link.:<br>
www.ifarfor.ru/cabinet/reset/$resetUID/$secretword <br>
And enter a new password for your account: $login<br>
<br>
";
$subject="Resetting the user's password on the Imperial Porcelain";
$sender = "=?windows-1251?B?" . base64_encode("Imperial Porcelain") . "?= <" . "site@ifarfor.ru" . ">";
}
else
{
$text="Запрошено изменение пароля Вашего аккаунта на сайте Императорский фарфор. <br>
<br>
Чтобы сбросить пароль нажмите на эту ссылку:<br>
www.ifarfor.ru/cabinet/reset/$resetUID/$secretword <br>
и введите новый пароль для своего логина: $login<br>
<br>
";
$subject="Сброс пароля пользователя на сайте Императорский фарфор";
$sender = "=?utf-8?B?" . base64_encode("Императорский фарфор") . "?= <" . "site@ifarfor.ru" . ">";
}
$header="Content-type: text/html; charset=\"utf-8\"\r\n";
$header.="From: $sender\r\n";
$header.="Subject: $subject"."\r\n";
$header.="Content-type: text/html; charset=\"utf-8\"\r\n";
$msg=$text;
$subject = "=?utf-8?b?" . base64_encode($subject) . "?=";
//mail("site@ifarfor.ru", $subject, $msg, $header);
if(filter_var($login, FILTER_VALIDATE_EMAIL)) mail($login, $subject, $msg, $header);
mysqli_free_result($r);
}
function do_reset2($resetUID,$secretword){//проверка валидности секретного слова при сбросе пароля
$ok=0;
$r=sql("SELECT userid FROM user_fl WHERE userid='$resetUID' and imya='$secretword' ");
$ok=mysqli_num_rows($r);
mysqli_free_result($r);
if($ok==0)	return FALSE;
else return true;
}
function do_setnewpassword($Newuserid,$password){//установка нового пароля и стирание секретного слова из user_fl
sql ("UPDATE user_fl SET imya='',date=NOW() WHERE userid='$Newuserid'");
sql ("UPDATE users SET password='$password',role='usr',date=NOW() WHERE userid='$Newuserid'");
}
function do_logout(){
    global $userid;
	$userid='';
        set_var('userid','');
//		setcookie("userid","", 1);
		setcookie('userid',"" ,1,"/","ifarfor.ru");
		setcookie ("PHPSESSID", "", 1);
		setcookie('PHPSESSID',"" ,1,"/","ifarfor.ru");		
		setcookie('cookie_test',"" ,1,"/","ifarfor.ru");		
        set_var('cur_box','');
//        new_header("Location: index.php");
}
function do_login($NewUserid){
//		session_start();
   		global $userid;$y2k = mktime(0,0,0,1,1,2000);
        $y3k = mktime(0,0,0,1,1,2030);    
		setcookie('userid',$NewUserid , $y3k,"/","ifarfor.ru");
        set_var('userid',$NewUserid);
//		setcookie("userid","", 1);
		setcookie ("PHPSESSID", "", 1);		
        set_var('cur_box','');
        set_var('logon',true); 
}
function FlyBasketToCurrent($idbasket,$OldUid){
    global $userid;
	$userid=get_s_var("userid");
	sql ("UPDATE box SET userid='$userid',date=NOW() WHERE idd='$idbasket' and userid='$OldUid'");
}

/********************************************************************************************************
                                                                Функции, обслуживающие заказ товара
*********************************************************************************************************/
function get_new_order_number($fil){//по номеру фиоиала выдает номер документа АВТОНУМЕРАТОР
        sql1();
}
//Функция загрузки файлов на сервер
function uploadfile($url,$FILE) {
$FILE='/HD4870-2.jpg';
$url="Files/";
    //$url - текущая папка, $file - массив $_FILES
      //Проверяем, существует ли имя.
if($FILE['FILE']['name']){
    //Проверяем загрузился ли файл на сервер
    if(is_uploaded_file($_FILES['FILE']['tmp_name'])) {
        //Проверяем размер файла
        if($FILE['FILE']['size'] != 0 AND $FILE['FILE']['size']<=102400) {
            //Перемещаем загруженный файл в необходимую папку $url
            if(move_uploaded_file($FILE['FILE']['tmp_name'], $url."/".basename($FILE['FILE']['name']))) {
                    //Выводим сообщение что файл обработа и загружен
                    return TRUE;
                                                                                                           }
            else { echo 'Произошла ошибка при перемещении файла в папку'.$url;}
                                                                              }
        else {echo 'Размер файла не должен превышать 100Кб';}
                                                        }
    else { echo'Прозошла ошибка при загрузке файла на сервер';}
                             }
else { echo 'Файл должен иметь название';}
echo "url=$url file=$FILE";
    }
function save_old_user_box($userid){//создает новый заказ и кладет туда указанную корзину $userid - это новый логин
        $cur_userid=get_s_var('userid');
		$shid=whichshop();
        $r=sql("SELECT boxid FROM box WHERE userid='$cur_userid' AND orderid='0'");
                if(mysqli_num_rows($r)>0) {//если в корзине что то есть ее в заказы
                    if ($userid!=$cur_userid) saveorder($userid,'0');
                }
       sql("UPDATE box SET userid='$userid' WHERE userid='$cur_userid'");
       sql("UPDATE orders SET userid='$userid' WHERE userid='$cur_userid'");
mysqli_free_result($r);
        return $orderid;
}
function print_check($test){
        $ans='<h2>Проверьте данные
        о заказе:</h2><br>';
        $ans.=print_mybox(0);
$ans.='<h2>личные данные</h2>';
$r=sql('SELECT * FROM users WHERE userid="'.$userid.'" LIMIT 1');
        if(mysqli_num_rows($r)==0) $ans.='не удалось обнаружить личные данне на сервере.<br>';
        else{
                $row = mysqli_fetch_array($r);
                $ans.='имя: '.$row['imya'].' '.$row['otchestvo'].' '.$row['family'].'<br>
                контактный e-mail: '.$row['email'].'<br>
                контактный телефон: '.$row['phones'];
        }
$ans.='<h2>адрес доставки</h2>';
$shid=whichshop();
$r=sql('SELECT * FROM orders WHERE idd="'.sqlp(get_s_var('idd')).'" LIMIT 1');
        if(mysqli_num_rows($r)==0) $ans.='не удалось обнаружить адрес доставки на сервере.<br>';
        else{
                $row = mysqli_fetch_array($r);
                $ans.='улица: '.$row['street'].'<br>
                дом/корпус: '.$row['house'].'<br>
                квартира/офис: '.$row['room'].'<br>
                дополнительно: '.$row['dopaddr'].'<br>
                дата и время доставки: '.$row['timedostavki'];
        }
$ans.='<form action="'.aPSID("order.php").'" method="post">
<input type="hidden" name="oper" value="sendorder">
<input type="submit" value="оформить заказ">
</form>
<form action="'.aPSID("order.php").'"  method="post">
<input type="hidden" name="oper" value="saveorder">
<input type="submit" value="сохранить заказ">
</form>';mysqli_free_result($r);
return $ans;
}//function
function print_ok(){
        $ans='<h2>Ваш заказ принят к обработке. Спасибо за покупку! </h2> Ваш номер заказа i/'.get_s_var('cur_box').'. В течении 2-х часов (в рабочее время) с вами свяжется наш менеджер, для уточнения даты и времени доставки. Если Вам никто не позвонит, пожалуйста, перезвоните
        на номер 20-92-07 и уточните все необходимые данные. Следить за состоянием заказа вы можете, воспользовавшись кнопкой "мой antares"';
return $ans;
}//function
function get_file_from_internet($url,$local_cache,$errors=false){
         $load=false;
         $err="";
         $$response="";
        $er=error_reporting();
        error_reporting(0);
        if(preg_match("/^http:\/\/([^\/]+)(.*)$/", $url, $matches)){
            $host = $matches[1];
            $uri = $matches[2];
            $request = "GET $uri HTTP/1.0\r\n";
            $request .= "Host: $host\r\n";
            $request .= "User-Agent: RSSMix/0.1 http://www.rssmix.com\r\n";
			$request .= "Connection: close\r\n\r\n";
                       if($http = fsockopen($host, 80, $errno, $errstr, 5)){
                fwrite($http, $request);
                $timeout = time() + 5;
                while(time() < $timeout && !feof($http)) {
                    $response .= fgets($http, 4096);
                }
                list($header, $xml) = preg_split("/\r?\n\r?\n/", $response, 2);
                if(preg_match("/^HTTP\/[0-9\.]+\s+(\d+)\s+/", $header, $matches)){
                    $status = $matches[1];
                    if($status == 200){
                            $file = fopen ("../cache/$local_cache","w+");
                          if ($file ){
                            $pos=strpos($response,"\r\n\r\n");
                            echo "(($pos))";
                            $response=substr($response,$pos+4);
                            fputs ( $file, $response);
                            fclose ($file);
                          }
                               $load=true;   
                    }
                    else {
                        $err = "Can't get feed: HTTP status code $status";
                    }
                }
                else {
                    $err = "Can't get status from header";
                }
            }
            else {
                $err = "Can't connect to $host";
            }
        }
        else {
            $err = "Invalid url: $url";
        }
        error_reporting($er);
        if (!$load){
            //надо из файла забрать
                          $file = fopen ("../cache/$local_cache","r");
                          if ($file ){
                                  $response = fread ($file,filesize("../cache/$local_cache"));
                                  fclose ($file);
                                  list($header, $xml) = preg_split("/\r?\n\r?\n/", $response, 2);
                          }
        }
        if ($errors and $err!="")
            return $err;
        else {
            // отрежем заголовок
            return "\r\n\r\n".$response;
        }
}
       // $y3k = mktime(0,0,0,1,1,2030);
        //$site_error="Об этой ошибке сообщите администратору";
?>