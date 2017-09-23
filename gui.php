<?
function btngg($text,$link2,$backcolor,$flashbackcolor,$linkcolor,$flashlinkcolor,$perem,$width2,$height2,$activeflag,$class1){
global $isjava;
$isjava=get_s_var('isjava');$isjava='on';
if($isjava=='on') $text_GUI=$text;
else $text_GUI='<a href="'.aPSID($link2).'" target="_self" title="'.$perem.'" style="COLOR:'.$linkcolor.'; TEXT-DECORATION: none">'.$text.'</a></td>';
if($isjava!='off')
{
if ($activeflag==-2)//зажатая кнопка
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;"><b>'.$text.'</b></td>';
elseif ($activeflag==-20)//зажатая кнопка без жирного шрифта
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;">'.$text.'</td>';
elseif ($activeflag==-4)//зажатая кнопка c линком
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: default;" onClick="window.alert(\''.$link2.'\')">'.$text.'</td>';
elseif ($activeflag==-300)//стандарт белый текст
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="document.location.href = aPSID(\''.$link2.'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; GlobalG=\''.$perem.'\'; TMfnGetIdG(GlobalG).style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\';GlobalG=\''.$perem.'\'; TMfnGetIdG(GlobalG).style.color = \''.$linkcolor.'\';"><a id=\''.$perem.'\' class="linkh" href="'.aPSID($link2).'">'.$text_GUI.'</a> </td>';
elseif ($activeflag==-5)//чистка корзины
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="if(window.confirm(\'Вы действительно хотите очистить всю корзину?\'))document.location=aPSID(\''.$link2.'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';">'.$text_GUI.'</td>';
elseif ($activeflag==-15)//удаление заказа
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="if(window.confirm(\'Вы действительно хотите удалить заявку?\'))document.location=aPSID(\''.$link2.'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';"><span title="'.$perem.'">'.$text_GUI.'</span></td>';
elseif ($activeflag==-6)//нестандарт(кнопки корзины)
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="border-right: 1px solid white; color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_top(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';">'.$text_GUI.'</td>';
elseif ($activeflag==-8)//нестандарт (кнопки корзины) без бордера
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_top(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';">'.$text_GUI.'</td>';
elseif ($activeflag==-7)//нестандарт (кнопки корзины) с бордером 2 и 1
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="border-right: 2px solid white; border-left: 1px solid white;color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_top(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';">'.$text_GUI.'</td>';
elseif ($activeflag==-9)//с выпадающей подсказкой в переменной $perem
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_top(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';"><span title="'.$perem.'">'.$text_GUI.'</span></td>';
elseif ($activeflag==-12)//с выпадающей подсказкой в переменной $perem go_doc
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_doc(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';"><span title="'.$perem.'">'.$text_GUI.'</span></td>';
elseif ($activeflag==-11)//с выпадающей подсказкой в переменной $perem  - с сообщением передаваемым через линк
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_alert(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';"><span title="'.$perem.'">'.$text_GUI.'</span></td>';
elseif ($activeflag==-111)//с выпадающей подсказкой в переменной $perem  - с сообщением передаваемым через линк
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_alert(\''.aPSID($link2).'\')" onMouseOver="this.height=\'2px\';this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.height=\'50px\';this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';"><span title="'.$perem.'">'.$text_GUI.'</span></td>';
elseif ($activeflag==-19)//с выпадающей подсказкой в переменной $perem в отдельном окне
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_blank(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';"><span title="'.$perem.'">'.$text_GUI.'</span></td>';
elseif ($activeflag==-10)//
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="document.form1.submit();" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';">'.$text_GUI.'</td>';
elseif ($activeflag==-30)//с картинкой для меню магазина
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_top(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';">'.'<img src="'.$perem.'" align="middle">'.$text_GUI.'</td>';
elseif ($activeflag==-31)//без картинки для меню аукциона
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_top(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';">'.$text_GUI.'</td>';
else//стандарт (как -8)
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: pointer;" onClick="go_top(\''.aPSID($link2).'\')" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';">'.$text_GUI.'</td>';
}
else
{
if ($activeflag==-2)//зажатая кнопка
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;"><b>'.$text.'</b></td>';
elseif ($activeflag==-20)//зажатая кнопка без жирного шрифта
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;">'.$text.'</td>';
elseif ($activeflag==-19)//с выпадающей подсказкой в переменной $perem в отдельном окне
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;"> <a href="'.aPSID($link2).'" target="_blank" title="'.$perem.'" style="COLOR:'.$linkcolor.'; TEXT-DECORATION: none">'.$text.'</a></td>';
elseif ($activeflag==-7)//с выпадающей подсказкой в переменной $perem в отдельном окне
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="border-right: 2px solid white; border-left: 1px solid white;color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;" ><a href="'.aPSID($link2).'" target="_parent" title="'.$perem.'" style="COLOR:'.$linkcolor.'; TEXT-DECORATION: none">'.$text.'</a></td>';
elseif ($activeflag==-8)//с выпадающей подсказкой в переменной $perem в отдельном окне
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;"><a href="'.aPSID($link2).'" target="_parent" title="'.$perem.'" style="COLOR:'.$linkcolor.'; TEXT-DECORATION: none">'.$text.'</a></td>';
elseif ($activeflag==-10)//
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.'; cursor: default;" onMouseOver="this.style.backgroundColor = \''.$flashbackcolor.'\'; this.style.color = \''.$flashlinkcolor.'\';" onMouseOut="this.style.backgroundColor = \''.$backcolor.'\'; this.style.color = \''.$linkcolor.'\';"><input type="submit" name="form1" value="'.$text.'" width="'.$width2.'" height="'.$height2.'"></td>';
elseif ($activeflag==-30)//с картинкой для меню магазина
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;"> <a href="'.aPSID($link2).'" target="_self" title="'.$perem.'" style="COLOR:'.$linkcolor.'; TEXT-DECORATION: none">'.'<img src="'.$perem.'" align="middle"></a></td>';
elseif ($activeflag==-33)//без картинки для меню магазина
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;"> <a href="'.aPSID($link2).'" target="_self" title="'.$perem.'" style="COLOR:'.$linkcolor.'; TEXT-DECORATION: none" align="middle">'.$text.'</a></td>';
elseif ($activeflag==-31)//с картинкой для меню магазина
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;"> <a href="'.aPSID($link2).'" target="_self" title="'.$perem.'" style="COLOR:'.$linkcolor.'; TEXT-DECORATION: none">'.$text.'</a></td>';
else 
return '<td width="'.$width2.'" height="'.$height2.'"  class="'.$class1.'" style="color: '.$linkcolor.'; background-color:'.$backcolor.';cursor: default;"> <a href="'.aPSID($link2).'" target="_self" title="'.$perem.'" style="COLOR:'.$linkcolor.'; TEXT-DECORATION: none">'.$text.'</a></td>';
}
}
?>