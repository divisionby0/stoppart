<?php

require_once("shop_func.php");
require_once("box_func.php");
$menu=array(
array("service","�������","tea","������� ������","coffee","������� ��������","teacoffe","��������� �����-��������","flat","��������� �������","dinner","������� ��������"),
array("sculptur","����������","animal","����������������","genre","��������"),
array("piece","�����","plates","�������","piecetc","����� �����-��������","pieced","����� ��������","cup","����� � �������","goblet","������ � �������","threep","��������� ��������������"),
array("interior","�������� ���������","pierglass","�����","vase","���� ������������","Egg","���� ����������","souvenir","��������","decorate","������������ ��������"),
array("deshoul","��������� ������","deshoule","��������� ������"),
array("crystal","��������� ��������","vased","���� ������������","vaseb","���� ��� ������ �������","vasem","���� ��� ������ ����� � �������","present","�������� ���������, �������, ��������","imperial","����� �������������","malcov","����� �����������","flame","����� �����","other","������"),
array("textiles","��������","cloth","��������","napkin","��������"),
array("book","�����","books","����� �� �������")
);
clearstatcache();


echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><title>������������� ������. ��������.</title>
<META http-equiv=content-type content="text/html; charset=windows-1251"><META http-equiv=Content-language content=ru-RU>
<META content="" name=description><META content="" name=keywords><base target="_top"></base></HEAD>
<body bgcolor="#FFFFFF" link="#333366" alink="#333366" vlink="#990099" text="#000000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<link href="/ifarfor.css" type=text/css rel=stylesheet>';

echo '<table align="center" bgcolor="#FFFFFF" width="960" height="96" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td width="204" align="center"><a href="http://ifarfor.ru/" target="_self"><img src="/img/logo.gif" alt="ipm" width="75" height="67" border="0"></a></td>
	<td width="300" align="left" valign="middle" style="FONT-SIZE: 16px;">
	������������� ���������� �����<br>���� ��������� ��������� ��������</td>
	<td width="456" align="right">
		<table cellspacing="0" cellpadding="0" border="0" width="100%" align="right">
			<tr><td height="40px" valign="middle" style="FONT-SIZE: 12px;vertical-align: middle;text-align:right;">
			&nbsp;</td></tr>
			<tr><td height="20px">&nbsp;</td></tr>
			<tr><td height="40px">
				<table width="100%"  align="center" height="100%" cellspacing="0" cellpadding="0" border="0">
					<tr><td class="top" width="28%" style="padding-right: 17px; border-right: 1px solid black; text-align: right;">�������</td>
					<td class="top" width="20%" style="border-right: 1px solid black;"><a href="/about" target="_self">� ������</a></td>
					<td class="top" width="34%" style="border-right: 1px solid black;"><a href="/shop" target="_self">������� ������</a></td>
					<td class="top" width="18%" style="text-align: right;"><a href="/contact" target="_self">��������</a></td></tr>
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
				� ������� ��� ������
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
				����� �� �����: 0 ���<br>
				<a href="" target="_self">�������� �������</a><br>
				<a href="" target="_self">������������������</a><br>
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
			  � 1744-2011 �� ��������
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
						  � 1744-2011 �� ��������
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
	<td style="color:gray;font-size:13px;background-color: #F6F6F4;vertical-align: middle;text-align:left;padding-left:10px;">����������� �� ������������, �� ����. ���������� ��� ������, ������ � �������. </td>
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
	<a href="/shop/service" target="_self">�������</a><br>
	<a href="/shop/sculpture" target="_self">����������</a><br>
	<a href="/shop/piece" target="_self">������� �����������</a><br>
	<a href="/shop/interior" target="_self">�������� ���������</a><br><br>
	<HR><br>
	��������� ������<br>
	<a href="/shop/crystal" target="_self">��������� ��������</a><br>
	��������<br>
	�����<br>'.$kusokkoda1.'
<img src="/img/contact.jpg"></td></tr><tr>
<td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="356px" width="100%" style="vertical-align: top;padding-top:30px;">
		��� "������������� ���������� �����", �. �����-���������, ��. ���������� �������, 155<br><br>

��������� �������� ��� "������������� ���������� �����" � ��������:<br><br>
�. ������, ��� "���� ����", ��. ������, 147, ������ ����, �������: +7 (846) 277-03-86<br>
�. ������, �� "���� �� �����", ���������� �����, 15�, ������ ����, �������: +7 (846) 277-08-23<br><br>

�. ��������, ��� "��������", ��. ��������, 62�, ������ ����, �������: +7 (8482) 95-71-17<br>
�. ��������, ��� "����� ����", ����� ������, 3, ������ ����, �������: +7 (8482) 52-54-50<br><br>

�� �������� �������������� � ������� ������� ���������� �� ����������� �����: director@ifarfor.ru<br>
		</td>
	</tr>
	</table></td></tr></table></td></tr></table></td></tr></table>';}
elseif ($menuname=="about"){
echo '
	<a href="/museum" target="_self">�����</a><br>
	<a href="/history" target="_self">������� ������</a><br>
	<a href="/manufacture" target="_self">������������</a><br>
	<HR>
'.$kusokkoda1.'<img src="/img/about.jpg"></td></tr><tr><td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="178px" width="25%"><a href="/museum" target="_self"><img src="/img/about1.jpg"><br>�����</a></td>
		<td width="25%"><a href="/history" target="_self"><img src="/img/about2.jpg"><br>������� ������</a></td>
		<td width="25%"><a href="/manufacture" target="_self"><img src="/img/about3.jpg"><br>������������</a></td>
		<td width="25%">&nbsp;</td>
	</tr>
	<tr>
		<td height="178px" width="100%" colspan="4">&nbsp;
		</td></tr></table></td></tr></table></td></tr></table></td></tr></table>';
}
elseif ($menuname=="museum"){
echo '
	<a href="/museum" target="_self">�����</a><br>
	<a href="/history" target="_self">������� ������</a><br>
	<a href="/manufacture" target="_self">������������</a><br>
	<HR>
'.$kusokkoda2.'<img src="/img/museum.jpg"></td></tr><tr><td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="534px" width="100%" style="vertical-align: top;text-align:left;padding:12px;"><img src="/img/about1.jpg" hspace=10 vspace=10 style="float: left">
<p>� ������� 2001 �. ��������������� ������� ������ ��� ���� ���������� ���������� ������������ �������� ����� �������������� ����������� ������, �������������� �� ���������� ��� ���ǻ �� ������: �������� ���������� �������, 151.
</p><p>
��������� ����� ��� ������� � 1844 ���� �� ������������ ������� I ��� ��������� ��������, ��������� �������� � �����������. �� ������ ������� ������ ����� ���������� �������� ������������ ���������, ��� ������������� ������� � ������� �����. � ����� �������������� ������������ � ���� ���������� ���������, ���������� ����� 260 ������ ������� ������� ����������� ������ ������. ��� ����������� ����� 30 ����� ����������. ��� ������ � ������ ������������� �������, ���� ���������� �������, ������� ��������� ����������� ���������� � ������� ������� �������, ������� ��������� � ���������� �������. ����� ������������ ������������ � ���������� ��������, �������� ������� ��� �� � ����� ����� ����. � ���������� �����, ���������� �� ������ �������� �I� ���� ������� ��������� ����� �� ������� � ���������, ������ � ������� ���������� � ������� ������.
</p><p>
� ��������� �������� �I� ���� �� ������� ������������ ���������� ���������� III ��� ������ ������������� ����� ����������� �� ������ � ���� �����������, ���� �� ������� ��������� � �����. ��� �������� ����������� ���������� ����� ���� ��������� � � ��������� ������, ������� � ������� 20-� ����� �� ���������� ����������� �� ����. ������ ��������� ����� �������� ����� ������: � ����� 1917 - �� ����� 1918 ���� � ����� ����������� �� �������� � ������������, � � ���� ����� � ������������� ������� ��������� ���� ������������ �� ����, � �����.
</p><img src="/img/museum1.jpg" hspace=10 vspace=10 style="float: right"><p>
����� ��������� ����� � ������ ���� ������� ������� � �������� ������ ��������� ��������� ������� � ������� �����. ������� ���������� ������ �� ����� � �.�. �������� ��� ��������� ��������� �������� �������� ������� ��������� ��������� �� ���. ������� ������ � ������� ����� ������� ������� ���������� ��������� �.�. ������. ��� ����� ���� ��������, ��� �������� ���������� �����, ������� ������������ ���������� ���������, �� ����� ������������ ��� ���� ������, ��� ����� ��� �������, � ��������� �������� ��������� ����������. �� ���������� �������� ����� ����� ��� ������ ����������� ����������, ����������� ���������� ����������� ����������� ���������� ���������� ���������, ��������� ������ ����� ������� � ������� ��������� �������� ��������������� �������. �� ���� �������� ��������� ������������� �������������� ������������� � ���������� ��������, ������������ ������������ �������� ������� ����������. �� ������� ������������ �������� ������ �� ��������� ���������� ����� �������������� �� ��������� � ������, �������, ���������, ������, ��������, ������� � ��.
</p><p>
� ����� �������� ������ ������, � � ������ ������� �����, �������� ���� ��������� ����� ������������� �����, ������� �������, �����������, �������, �������, ������, ���������� � ���� ����, ���������� � ������� ����, ������� �������� ���� �.������� � ������ �������-��������� �. ���������, ����������� ��������� �� ���� �. ������� � ������ ��� ���������� �. ������ � ���� �������� ����� ���������� � �����������
</p><p>
������������� ���������� ����� � ��� ������ � ��� ���������� �����,��� ��������� � �������� ����������������� � ������� ������� � �������� ������ �� ���������� ����� ���� �����.
</p><p>
�� ������ 2000 ���� ����������������� ����� �������� � ����� ������������ ������ � ����� ����� ������ ������ � ��������������� � ����������� ����������� ��������� ��������, ������� �� ��������� ������������ � ���������� ��������������� ��������������. ��� ���� ������� ������������� ������� ����������� ������ � �������� �������� ��������� �������� ����� � ��������������� �� � ����� �������������� ������. � ������ ���������� ��������� �� �� ������������ ����� ��������� �������� �������� �. �. �����������, ������� ��������� �������, ��� ���������� ���� ����� ����� �������� � ����������� ������ ��������. ���������� ��������� ���������� �������� ������ � ����������� ������� ���������� ����� ��������� ����� ��� �������� ���������������� ��������, ������� ��� � ������ ������, ������� �������� ���� ��� ������������ ������� � ������������ �������� ��.
</p><img src="/img/museum2.jpg" hspace=5 vspace=10 style="float: left"><p>
� ������ 2003 ���� �� ���� �������� ��������� � � ������ ��� ��������� ����� ����� �� ������ ����������� ������. � ����� ������� �� ������ �������� �����������, � ����������� ������ ����� ����� �. � �. ���������.
</p><p>
��� ����������� ������� � �������������� ������������� ��������� ����� � ������� ������ � ��������� ������ �������� � ������� ������������ �������. 22 ������� ���������� ����� �������� ����� ����������� ������, ��� ������ ���������������� ��������. � ��� ������, ������� �� ��� ��� ����� ���� �������� � ��������� ��� ���� ��������.
</p><p>

����� ������ ��� ����������� ���������, ����� ������������. 
������������ � ����������� ����������� ����� ��� �� ������ �� ����� ���������������� ��������
</p>
</td>
		</tr>
</table></td></tr></table></td></tr></table></td></tr></table>';
}
elseif ($menuname=="history"){
echo '
	<a href="/museum" target="_self">�����</a><br>
	<a href="/history" target="_self">������� ������</a><br>
<p style="FONT-SIZE: 15px;margin-top:5px;margin-bottom:5px;padding-left:15px">
1744 - ��� ���������<br>
1762 - 1801<br>
1801 - 1825<br>
1825 - 1894<br>
1894 - 1912<br>
1920� ����<br>
��������� ����<br>
������ ����� ���<br>
���� ���</p>
	<a href="/manufacture" target="_self">������������</a><br>
	<HR>
'.$kusokkoda2.'<img src="/img/history.jpg"></td></tr><tr><td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="534px" width="100%" style="vertical-align: top;text-align:left;padding:12px;"><img src="/img/about1.jpg" hspace=10 vspace=10 style="float: left">
<h2>������ ������ ������</h2>
<p>
������������� ���������� ����� � ������� ����������. ��� ��������� � �������������� ������, �������� ������ ��������  ������, ��� �� ������� ������ �������������, ��� � ������������� ������ � ���������� � ������� ��������.
</p><p>
������� ������ ������ ������� ��������� �����������-����������� ��������� ����������� ������� ������� �� ������������� ��������� � �������, ������, ���-�����, ��������, ����. ��� ������������ � ��������� ���������� ������ ���� � � ������� ����������. �� ����� �������� ��� ������� �� ���������� ������������� ��������� ������� � �������.
</p><p>
�������������� ������ �������������� ������� ����������� �������� ����� ����, ��� ��������� ���������� �����, ������� �������� ������� ��������� ������ � �������� XVIII ���� � �� ����������� ����� ����������, ������� ��� �������� ���������������� ��������, � �����, ��������� �� ������, ���� �������� ������� ������������ ��������.
</p><p>
������������� ���������� ����� � ���� �� �������� ������������� �������, �������� ������� �������� ���������� ��������� � ����, ����� ������������ �����, � ��� ���� �� ���������� ����� ���� ����� ��������� ��������� ����������� ��������� �������� �������� � ���� ������.
</p>
</td>
		</tr>
</table></td></tr></table></td></tr></table></td></tr></table>';
}
elseif ($menuname=="manufacture"){
echo '
	<a href="/museum" target="_self">�����</a><br>
	<a href="/history" target="_self">������� ������</a><br>
	<a href="/" target="_self">������������</a><br>
	<HR>
'.$kusokkoda2.'<img src="/img/manufacture.jpg"></td></tr><tr><td>
	<table align="center" bgcolor="#FFFFFF" width="100%" height="356px" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td height="534px" width="100%" style="vertical-align: top;text-align:left;padding:12px;"><img src="/img/about1.jpg" hspace=10 vspace=10 style="float: left">
<h2>������������ �������</h2>

<p>
������� ������������ ���������� ������� ������ ������. � �������, ����� �������� ���� ������� �����, ���������� ��������� �� 80  ��������������� ��������. � �����, �� ������ ��������� ������ ���������� ������������ ������������� �������, ������������� ��� � �������� �VIII ����  �. �. ������������.
</p><p>
���������� ����� ��������������� �� ������ ������ ������� (����� �����), ������, �������� ����� � ������ ��������������  � �������� �� 40 ��������� �������.
</p><p style="padding-left:30px;">
<br>
�������� �����:<img src="/img/manufacture1.jpg" hspace=10 vspace=0 style="float: right">
</p>
<li style="padding-left:50px;">������;</li>
<li style="padding-left:50px;">�����, ������� ����, ��������;</li>
<li style="padding-left:50px;">�����;</li>
<li style="padding-left:50px;">��������� �����;</li>
<li style="padding-left:50px;">���� �����������;</li>
<li style="padding-left:50px;">��������;</li>
<li style="padding-left:50px;">����� ���������.</li></p><p>
����� ������� ��������������� ������� ������� ��� ��������� �����. ������ ���������� �����  (������) ���������� � �������� �����, ��������� �� ���� � ����� ������. �� ���� ����, ��� ���� ��������� �����,  � ����� ����������  ����� ������� ������������ �������, ����� ����  ������� ������� ���������. ����� ������������ � �� ���  �����������  ���� ��� ������� �������, �������  �������� ������� � ����������� �����.
</p><p>
������� �������  ������ ������� �������� �� ����� ������������ ����� �� ����������� �������������. ��������� ������� �����������  �� ���� ������� ����������� ������  ������� ���������� � �� 900�� � ������� 24 �����, �  ����� ������������ � ���������, ��� ����������� 1380�1430�� �� ���� � ����� �����. ��� ������ ������ �� 1/7  ���� ������, ��� ���������� ��������� ��� �������� ����.
</p><p>
����������������  ���������� ��������������� �� �������� �������,  �����������  ��� ����������� �� 1280��.  �  ��� ������  ������ �� �� ����������, ������ � ����� ������� ����������� �������� �����.
</p><p>
�5 ��� ����� ������� � ������ �� ������  ���� ����������� ���������� � ����������� ������������ ������  ������� �� ������������� �������� ������� � ���������� �������, �������� � ����������������. � ������ ����� ����� ������� ������� � ���� ������ �������� �������� �����, ������� � ������ ���������� ��������. �� �������� ���� ���������� � ������������ ������ ������� ������ ������������ ��� � 1980 ���� ���� ��������� ��������������� ������ ���� � ������� ����� � �������.
</p><p>
����������� ������� ������� ������������ ������������ � ������������ �������� ������, ���������������� � ��������������� �������� ��������� ������� �� ���������� �����������. ������������ ������ ��������� �� ����� �������, ��� ����� ����������, �.�. ������  �������� ��������, �� ����� ������������ �������. �������� ��������� �����-����� �������. ������������ ������, ���������� ��� ����� ������ ������������ 720�860��,  ����� �������� �������� �������. ��� ������ ������ ������������ ������ �������� ���� ����, ��� ������������ ��������������  �������������� ����������� ��� �������  �������.
</p><p>
��� ������������� ������� ����������� ������ � ���������� ��������, ������������ ������������� �������� �� ������������� ������ � ������ ��������  ����������� �����. ���  ������ ��� ��������������� �������  ������ ��������, �  ������ ��������� � ��������, � �� ����������� ������� �������� �������. �������� ������� ������������� � ��������� � ������ ���������� ���������  ����������� ��������� ����� �������.
</p><p>
������� ������� ����������� ������ �������� ������ �������������������� �������. ����� ��� �������  ������������ ����������� ������� � ���������� ��������������� �������. ������ �������, ���� �  ����� ��� ���������������� ���������� ������������ ������������� ��������. ������ ����������� ���������   ����������� ������������� ��������  � ������ ������������� �������� � �������, ��� ������� ������ ������ ��������� ���. 
</p><p>
�� ���������� ���������� ����������� ����� ������� ��������� � ������������  ��������� ��������, ���������� �� ���  � ����� ղ� ����.
</p><p>
���������������  ���� � �����  ������ ������������������� ���� �  ��������� � ��� ������������ ��� �����������  ����������. ��� ������� �� ������ ������� ����������� ����������� ���������� �������������  3D �������������, ������� �������� ����������� ��������� �����   ������������ ����� �������  ��� ������������ ���������� �������, � ������ �������� �����������  ���� ��������� �����������   
</p><p>
���������
</p><p>

�  ��������� ����� �����  ��������� ����� 4000  ������������ ������� �� ����� � �������. ��� ������, ��������  � �������� �������, ��������� �������� ��������� ����������, ���������-���������� �������, �������� � ���������������� ����������, ������������ �����, ������� � �. �. ��� ����������� �� ��������, ������� � ��������� �������. �������  ������������ ������������ � ������������ ��������,  ������, ���������������� � ��������������� ���������, � �������������� � ������ ������ �� ������ � ����������� ��������. �� ������  ����� ������������� ������� �� �������� ��������� �VIII��� ��., ��������� ������ � ��������� � ����������� ���������.
</p><p>
�� ���������� ����������� ���������� ������� ����������  ��������� ������ ������ � �������� ������������ ����� (�. �. ��������, �. �. �������), ����������� ������� ������ �� ��������� �������� � ��������. ������ �������� � ������ � �� �������  ������� �� �������� �������� ���������� ������ �. �. ������������� � �. �. �������, ��������� �������� ��������� �. �. ��������, ���������� �������� ��������� � ������������� ������������ � �������  �. �. ��������, ���������� �. �. ��������, �. �. �����������, �. �. �����, �. �. ��������, �. �. ��������, �. �. ������� � ��.
</p><p>
����� ��������� ��������� � ������� ���������: �� ��������� ������� � ��������� �������� � �� ��������� �������� �������������� ������ � ����������������� �������� ������ ���������� ����������, ������  ��� ���������� ������������ � ����������. ���, � ��� ������������ 300������ �����-���������� ��� ����� �� ������������� ������� ���� ������� ������� � ������ ���ǻ. 
</p><p>
��������� � ������ ���ǻ (������� � 1936 ����) ��������������  � �������������� ������ ����, ����� ��� ���, ��������, �������,  ������, ������, ������, ��������, ������ � ��. �� ��������� ���� �������� ������������ ���������� ������ (���� � ����� ������ ������ 15%) ��� � �������� ����� ���, ������ � ������� �� ���������� �������� ����� �������� � �������������� . ����� �������� ������������� ��������� � ����������� ������ �� ����� ������, ������, �������, ������.
</p><p>
� ��������� �����  ��� ����������� ������ �����������, � ������ �������, ������  �������������� ����������� ������, ������: Apilco-Yves Deshoulieres � Porcelaine de Sologne � ��������� ������ �� �������, ��� ������������ ������� ����������� ����������� ��������������. ����� �������, ���������  ���������� ����� ������, � ��� ������ 260������, �������� � ����� ���� ������������� ��������.
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
	else echo("���� ".$pagename." �� ������ �� �������.");
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
		$rowname=str_replace ("�� ���������!","", $rowname);
		$rowname=str_replace ("�� ���������","", $rowname);
		//if ($i>1)$class="catshop"; else $class="catshop2"; if ($j>1)$class.="0";

		$Nnewprice=$row['price1s'];
		$Nnewprice=$Nnewprice*0.85;
		$ts=floor($Nnewprice/1000);
		$ed=$Nnewprice-($ts*1000);
		if($ts=='0') $ts="";
		else {if($ed<10)$ed='00'.$ed;
		elseif($ed<100)$ed='0'.$ed;};
		$newprice1="$ts $ed �";
		
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
		<b>$newprice1</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='' target='_self'>� �������</td></tr></table></td>";
		if ($i++>2){$i=1;$j++;$echo.="</tr><tr>";}
		
		};
		while($j++<4){
		$echo.="<td colspan='4'></td></tr><tr>";
		};


return $echo;
}


?>