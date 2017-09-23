<?php
session_start();
require_once("sql.php");
require_once("shop_func.php");
require_once("box_func.php");  
set_session_vars();
global $userid;	
global $idd;
$idd=get_var('idd');
$ordernum=$idd;
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>Императорский фарфор. Поволжье.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" link="#0055CC" alink="#FF0000" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="'.cssname().'" type=text/css rel=stylesheet>';
echo print_mybox_Farfor(1);
echo '</body></html>';
?>