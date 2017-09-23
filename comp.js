function set_colors(d,f,b){
	d.style.backgroundColor=b;
	d.style.color=f;
	d.style.cursor="pointer";
}

function add_PHPSESSID(link1){
	curloc=new String (top.document.location);
  
	if (link1.indexOf('?')>1)
		div="&";
	else
		div="?";
	pos=curloc.indexOf('PHPSESSID=');
	if (pos>1){
		len=curloc.length;
		link1=link1+div+curloc.substring(pos,len);
	}
	
	//alert("анализ "+curloc+"  результат "+link1);
	return link1;
}



function go_top(link1)
{
   top.document.location=add_PHPSESSID(link1);
	return false;
}

function go_alert(link1)
{	alert(link1);
	return false;
}

function go_parent(link1)
{
	parent.document.location=add_PHPSESSID(link1);
	return false;
}
function go_doc(link1)
{
   	document.location=add_PHPSESSID(link1);
	return false;
}

function go_blank(link1)
{
window.open(add_PHPSESSID(link1));
	return false;
}

function gogo_top(link1){//переходит в главном фрейме
	parent.notebooks.document.location=add_PHPSESSID(link1);
	return false;
}
function go2_top(link1){//переходит в главном фрейме
	//parent.t_op_tovs.document.location=add_PHPSESSID('t_op_notebooks.php');
	parent.notebooks.document.location=add_PHPSESSID(link1);
	return false;
}
function go3_top(link1){//переходит в главном фрейме
	parent.select_tov.document.location=add_PHPSESSID(link1);
	return false;
}
function go_box_top(link1){//переходит в главном фрейме
	parent.box.document.location=add_PHPSESSID(link1);
	return false;
}
function go_t_op_tovs_top(link1){//переходит в главном фрейме
	parent.t_op_tovs.document.location=add_PHPSESSID(link1);
	return false;
}
function go_notebooks(){
top.notebooks.document.location=add_PHPSESSID("notebooks-fr.php?grp="+document.getElementById("notebooks_list").value);
}

function prn_btn(name,link1,tip,width,spacing){
if (tip<0) {pressed=true;tip=-tip}
else pressed=false;
cellspacing=2;
switch (tip) {
case 1:
	color="#000000";
	fcolor="ff9900";
	color2="#000000";
	fcolor2="#ffffff";
	fs=9;
	border=0;
	break;
case 5:
cellspacing=0;
case 2:
	color="#ffffff";
	fcolor="999999";
	color2="#000000";
	fcolor2="#ffffff";
	fs=9;
	border=0;
	break;
case 3:
	color="#000000";
	fcolor="ffffff";
	color2="#000000";
	fcolor2="#999999";
	fs=9;
	border=1;
	break;
case 4:
	color="#000000";
	fcolor="ffffff";
	color2="#000000";
	fcolor2="#cccccc";
	fs=9;
	border=1;
	break;
default:
	color="#000000";
	fcolor="ff9900";
	color2="#000000";
	fcolor2="#ffffff";
}
if (pressed){
	color=color2;
	fcolor=fcolor2;
	
}
if (""+spacing!="undefined"){
	cellspacing=spacing;
	}
style="";events="";
if (border==0) style+="border: none;";
else style+="border: 1px solid Black;";

if (link1!="submit") 
	onclick='go_top("'+link1+'")';
else
	onclick='submit()';
if (link1!="" && (pressed==false)) {
	events='onmouseout=set_colors(this,"'+color+'","'+fcolor+'");window.status=""; onmouseover=set_colors(this,"'+color2 +'","'+fcolor2 +'");window.status="'+link1+'"; onclick='+onclick+' ';
	style+="CURSOR: pointer";
}
document.writeln('<table border="0" cellspacing="'+cellspacing+'" cellpadding="0"><TBODY><TR><TD height=21');
document.writeln('style="background-Color:'+fcolor+'; COLOR:'+color+'; font:arial; FONT-SIZE: '+fs+'pt; padding: 0px;'+style+'"');
document.writeln(events);
document.writeln('align=middle width='+width+' height=30><b>');
document.writeln(name);
document.writeln('</b></TD></TR></TBODY></TABLE>');

}
function btn(name,link1,clr,w,h,border,spacing){
if (link1=="") pressed=true;
else pressed=false;
if (clr<0) {pressed=true;clr=-clr;}
switch (clr) {
case 1:
	color="#000000";
	fcolor="ff9900";
	color2="#000000";
	fcolor2="#ffffff";
	break;
case 2:
	color="#ffffff";
	fcolor="999999";
	color2="#000000";
	fcolor2="#ffffff";
	break;
case 3:
	color="#000000";
	fcolor="ffffff";
	color2="#000000";
	fcolor2="#999999";
	break;
}
if (pressed){
	color=color2;
	fcolor=fcolor2;
}
style="";events="";
if (border==0) style+="border: none;";
else style+="border: 1px solid Black;";
//style+="border: 2px solid Black;";

if (link1!="submit") 
	onclick='go_top("'+link1+'")';
else
	onclick='submit()';

if (pressed==false) {
	events='onmouseout=set_colors(this,"'+color+'","'+fcolor+'");window.status=""; onmouseover=set_colors(this,"'+color2 +'","'+fcolor2 +'");window.status="'+link1+'"; onclick='+onclick+' ';
	style+="CURSOR: pointer";
}
document.writeln('<table border="0" cellspacing="'+spacing+'" cellpadding="0"><TBODY><TR><TD height='+h);
document.writeln('style="background-Color:'+fcolor+'; COLOR:'+color+'; padding: 0px;'+style+'"');
document.writeln(events);
document.writeln('align=middle width='+w+'><b>');
document.writeln(''+name);
document.writeln('</b></TD></TR></TBODY></TABLE>');
}

function zero(){alert("zero");return false;}

function submit(form){
alert("submit");
eval ("document."+form+".submit()");
return true;
}

function select_win(link1) {
alert("select_win");
        var win = "width=800,height=600,menubar=no,top=10px,left=200px,location=no,resizable=yes,scrollbars=yes";
		var rnd="&rnd="+Math.random();
        sel_win = window.open(link1,"select",win);
		sel_win.focus();
		return false;
}
function go_pick(link1,link2){//переходит в главном фрейме
alert("go_pick");
		alert(link1);
		alert(link2);
		//top.select_tov.document.location=add_PHPSESSID("credit.html");
		top.document.location=add_PHPSESSID(link2);
		return false;
}

function sw_comp(link1){//переходит в главном фрейме
alert("sw_comp");
		top.document.location=add_PHPSESSID(link1);
		return false;
}

function my_confirm(t){
alert("my_confirm");
return(window.confirm(t));
}
function go_info(link1){
alert("link1");
}
function is_java(){
return true;
}