<?php
session_set_cookie_params(1080000);
session_start();
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
set_session_vars();
$language=$_GET['language'];$menuname=$_GET['menu'];if($menuname=="en")$language="en";
echo get_pay_text($language);
?>