<?php

class Search
{
    private $backgroundColorOfButton = "#FFFFFF";
    public function __construct($backgroundColorOfButton)
    {
        if(isset($backgroundColorOfButton)){
            $this->backgroundColorOfButton = $backgroundColorOfButton;
        }
    }
    
    public function getHTML($searchline){
        $Uslovie = NULL;
        //$Zagolovok=NULL;
        $searchline=sqlpz($searchline);
        
        global $language; global $userid;
        $rurus=sql("SELECT id FROM  brand WHERE name='Stoppard'");
        
        if(mysqli_num_rows($rurus)>0) {
            $roww=mysqli_fetch_array($rurus); 
            $StoppardID=$roww['id'];
        }
        
        $menuVersion = whichshop3();
        if($menuVersion=='ifarfor') {
            $bclr='AD9E82';
            $StoppardUslovie='';
        } else {
            $bclr='82a0ae';
            $StoppardUslovie=' AND Factory="'.$StoppardID.'" AND zakaz="1"';
        }
        if($language=="en"){
            $Zagolovok='Searching results';
            $strbask="Add to basket";
            $strnothing1="On your request:"; 
            $strnothing2="found nothing. Trying to find something else.";
        }
        else{
            $Zagolovok='Результаты поиска';
            $strbask="в корзину";
            $strnothing1="По вашему запросу:"; 
            $strnothing2="ничего не найдено. Попробуйте поискать что-то ещё.";
        }
        if(substr($searchline, 0, 7)=="tagform"){
            $searchline=substr($searchline, 7);
            $Uslovie="form.name='$searchline' AND sklad>0 AND Imagefile<>'/icons/noimage.jpg' ";
            $HotStr="SELECT tovsNew.name,ida, idg,tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM form LEFT JOIN tovsNew ON form.id = tovsNew.Form WHERE $Uslovie $StoppardUslovie ORDER BY tovsNew.name";//
            $r=sql($HotStr);
        }
        elseif(substr($searchline, 0, 6)=="tagpic"){
            $searchline=substr($searchline, 6);
            $Uslovie="picture.name='$searchline' AND sklad>0 AND Imagefile<>'/icons/noimage.jpg' ";
            $HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE $Uslovie $StoppardUslovie ORDER BY tovsNew.name";//
            $r=sql($HotStr);
        }
        elseif(substr($searchline, 0, 7)=="tagapic"){
            $searchline=substr($searchline, 7);
            $sql_filter='creator.name = "'.$searchline.'"';
            $Uslovie.=$sql_filter." AND sklad>0 AND Imagefile<>'/icons/noimage.jpg' ";
            $HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM creator LEFT JOIN tovsNew ON creator.id = tovsNew.AutorPicture WHERE $Uslovie $StoppardUslovie ORDER BY tovsNew.name";//
            $r=sql($HotStr);
        }
        elseif(substr($searchline, 0, 8)=="tagaform"){
            $searchline=substr($searchline, 8);
            $sql_filter='creator.name = "'.$searchline.'"';
            $Uslovie.=$sql_filter." AND sklad>0 AND Imagefile<>'/icons/noimage.jpg' ";
            $HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,AutorForm,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM creator LEFT JOIN tovsNew ON creator.id = tovsNew.AutorForm  WHERE $Uslovie $StoppardUslovie ORDER BY tovsNew.name";//
            $r=sql($HotStr);
        }
        elseif(substr($searchline, 0, 3)=="tag"){
            $searchline=substr($searchline, 3);
            $HotStr=$searchline;
            $SQLZapros="AND grp=0 $StoppardUslovie AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0)  ORDER BY name DESC";
            //if($HotStr=="RUSSIANSTYLE"){
            //elseif($HotStr=="cobaltnet")
            if($language=="en"){
                switch($HotStr){
                    case "RUSSIANSTYLE": $nametitle="RUSSIAN STYLE";break;
                    case "MYLIKE": $nametitle="MY LIKES";break;
                    case "project": $nametitle="IPM PROJECTS";break;
                    case "cobaltnet": $nametitle="COBALT NET";break;
                    case "nega": $nametitle="NEGA";break;
                    case "zamoscow": $nametitle="ZAMOSKVORECHYE";break;
                    case "nephrit": $nametitle="NEPHRITE BACKGROUND";break;
                    case "WHITE": $nametitle="WHITE PORCELAIN";break;
                    case "FLOWERS": $nametitle="FLOWERS";break;
                    case "LITERATURE": $nametitle="LITERATURE";break;
                    case "THEATRE": $nametitle="THEATRE";break;
                    case "PETER": $nametitle="SAINT PETERSBURG";break;
                    case "MOSCOW": $nametitle="MOSCOW";break;
                    case "WEDDING": $nametitle="WEDDING";break;
                    case "HAPPYBD": $nametitle="HAPPY BIRTHDAY";break;
                    case "NEWYEAR": $nametitle="HAPPY NEW YEAR";break;
                    case "VALENTINE": $nametitle="SAINT VALENTINE'S DAY";break;
                    case "MASL": $nametitle="MASLENITSA";break;
                    case "EASTER": $nametitle="HAPPY EASTER";break;
                    case "VICTORY": $nametitle="VICTORY'S DAY";break;
                    case "FEB23": $nametitle="MILITARY PORCELAIN";break;
                    case "MART8": $nametitle="8TH MARTH";break;
                    case "TEACHER": $nametitle="GIFT FOR TEACHER";break;
                    case "KIDS": $nametitle="FOR KIDS";break;
                    default: ;break;}
            }
            else{
                switch($HotStr){
                    case "RUSSIANSTYLE": $nametitle="РУССКИЙ СТИЛЬ";break;
                    case "MYLIKE": $nametitle="МОИ ОТМЕТКИ НРАВИТСЯ";break;
                    case "project": $nametitle="ПРОЕКТЫ ИФЗ";break;
                    case "cobaltnet": $nametitle="КОБАЛЬТОВАЯ СЕТКА";break;
                    case "nega": $nametitle="НЕГА";break;
                    case "zamoscow": $nametitle="ЗАМОСКВОРЕЧЬЕ";break;
                    case "nephrit": $nametitle="НЕФРИТОВЫЙ ФОН";break;
                    case "zamoscow": $nametitle="ЗАМОСКВОРЕЧЬЕ";break;
                    case "WHITE": $nametitle="БЕЛЫЙ ФАРФОР";break;
                    case "FLOWERS": $nametitle="ЦВЕТЫ";break;
                    case "LITERATURE": $nametitle="ЛИТЕРАТУРА";break;
                    case "THEATRE": $nametitle="ТЕАТР";break;
                    case "PETER": $nametitle="САНКТ-ПЕТЕРБУРГ";break;
                    case "MOSCOW": $nametitle="МОСКВА";break;
                    case "WEDDING": $nametitle="СВАДЬБА";break;
                    case "HAPPYBD": $nametitle="ДЕНЬ РОЖДЕНИЯ";break;
                    case "NEWYEAR": $nametitle="НОВЫЙ ГОД";break;
                    case "VALENTINE": $nametitle="ДЕНЬ ВЛЮБЛЕННЫХ";break;
                    case "MASL": $nametitle="МАСЛЕНИЦА";break;
                    case "EASTER": $nametitle="ПАСХА";break;
                    case "VICTORY": $nametitle="ДЕНЬ ПОБЕДЫ";break;
                    case "FEB23": $nametitle="23 ФЕВРАЛЯ";break;
                    case "MART8": $nametitle="8 МАРТА";break;
                    case "TEACHER": $nametitle="ПОДАРОК УЧИТЕЛЮ";break;
                    case "KIDS": $nametitle="ДЕТЯМ";break;
                    default: ;break;}
            }
            if($HotStr=="RUSSIANSTYLE"){
                $HotStr="SELECT * FROM tovsNew WHERE Rstyle='1' $SQLZapros";
            }
            elseif($HotStr=="MYLIKE"){
                $HotStr="SELECT * FROM likeengine LEFT JOIN tovsNew ON likeengine.id = tovsNew.id WHERE likeengine.userid='$userid' ORDER BY tovsNew.name";
            }
            elseif($HotStr=="project"){
                $HotStr="SELECT * FROM tovsNew WHERE TipAss='Проект'  $SQLZapros";
            }
            elseif($HotStr=="cobaltnet"){
                $r=sql("SELECT id FROM picture WHERE name='Кобальтовая сетка'");
                $row=mysqli_fetch_array($r);
                $id1=$row['id'];
                $r=sql("SELECT id FROM picture WHERE name='Кобальтовая сетка Модерн'");
                $row=mysqli_fetch_array($r);
                $id2=$row['id'];
                $HotStr="SELECT * FROM tovsNew WHERE Picture='$id1' or Picture='$id2' $SQLZapros";
            }
            elseif($HotStr=="nega"){
                $r=sql("SELECT id FROM form WHERE name='Нега'");
                $row=mysqli_fetch_array($r);
                $id1=$row['id'];
                $HotStr="SELECT * FROM tovsNew WHERE Form='$id1' $SQLZapros";
            }
            elseif($HotStr=="zamoscow"){
                $r=sql("SELECT id FROM picture WHERE name='Замоскворечье'");
                $row=mysqli_fetch_array($r);
                $id1=$row['id'];
                $HotStr="SELECT * FROM tovsNew WHERE Picture='$id1' $SQLZapros";
            }
            elseif($HotStr=="nephrit"){
                $r=sql("SELECT id FROM picture WHERE name='Нефритовый фон'");
                $row=mysqli_fetch_array($r);
                $id1=$row['id'];
                $HotStr="SELECT * FROM tovsNew WHERE Picture='$id1' $SQLZapros";
            }
            elseif($HotStr=="FLOWERS"){
                $HotStr="SELECT * FROM tovsNew WHERE Flower='1' $SQLZapros";
            }
            elseif($HotStr=="LITERATURE"){
                $HotStr="SELECT * FROM tovsNew WHERE Literature='1' $SQLZapros";
            }
            elseif($HotStr=="THEATRE"){
                $HotStr="SELECT * FROM tovsNew WHERE Theatre='1' $SQLZapros";
            }
            elseif($HotStr=="PETER"){
                $HotStr="SELECT * FROM tovsNew WHERE Peterburg='1' $SQLZapros";
            }
            elseif($HotStr=="MOSCOW"){
                $HotStr="SELECT * FROM tovsNew WHERE Moscow='1' $SQLZapros";
            }
            elseif($HotStr=="WEDDING"){
                $HotStr="SELECT * FROM tovsNew WHERE Wedding='1' $SQLZapros";
            }
            elseif($HotStr=="HAPPYBD"){
                $HotStr="SELECT * FROM tovsNew WHERE Birthday='1' $SQLZapros";
            }
            elseif($HotStr=="NEWYEAR"){
                $HotStr="SELECT * FROM tovsNew WHERE NY='1' $SQLZapros";
            }
            elseif($HotStr=="VALENTINE"){
                $HotStr="SELECT * tovsNew WHERE InLove='1' $SQLZapros";
            }
            elseif($HotStr=="MASL"){
                $HotStr="SELECT * FROM tovsNew WHERE PancakeWeek='1' $SQLZapros";
            }
            elseif($HotStr=="EASTER"){
                $HotStr="SELECT * FROM tovsNew WHERE Easter='1' $SQLZapros";
            }
            elseif($HotStr=="VICTORY"){
                $HotStr="SELECT * FROM tovsNew WHERE VictoryDay='1' $SQLZapros";
            }
            elseif($HotStr=="FEB23"){
                $HotStr="SELECT * FROM tovsNew WHERE DefenderDay='1' $SQLZapros";
            }
            elseif($HotStr=="MART8"){
                $HotStr="SELECT * FROM tovsNew WHERE WomanDay='1' $SQLZapros";
            }
            elseif($HotStr=="TEACHER"){
                $HotStr="SELECT * FROM tovsNew WHERE TeacherDay='1' $SQLZapros";
            }
            elseif($HotStr=="KIDS"){
                $HotStr="SELECT * FROM tovsNew WHERE Kids='1' $SQLZapros";
            }
            elseif($HotStr=="WHITE"){
                $HotStr="SELECT tovsNew.name,ida,idg, tovsNew.id,Picture,Form,videnglish,tipenglish,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture 
			WHERE (picture.name='БЕЛЫЙ' OR picture.name='БЕЛОСНЕЖКА' OR picture.name='Bord Platine Brillant 3176' OR picture.name='Passion Platine 6828' 
			OR picture.name='Золотая лента' OR picture.name='Платиновая лента' OR picture.name='Bord Or' OR picture.name='Золотая отводка'
			OR picture.name='Астория' OR picture.name='Гольф'  OR picture.name='Кружево'  OR picture.name='Облака'  OR picture.name='Севилья' 
			OR picture.name='Феникс'   OR picture.name='Флора'   OR picture.name='Камея'   OR picture.name='Гармония' )AND Imagefile<>'/icons/noimage.jpg'  AND ((zakaz+sklad+grp)>0)  ORDER BY tovsNew.name";
            }
            else{
                $HotStr="SELECT * FROM tovsNew WHERE Rstyle='1'  $SQLZapros";
            }
            $r=sql($HotStr);
        }
        else{
            if($searchline!=""){
                $sql_filter='(grp=0';
                $qq=explode(" ",$searchline);
                $num = count($qq);
                for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND ( (lowername) LIKE  "%'.mb_strtolower($qq[$i]).'%")';
                $sql_filter.=') OR (grp=0';
                for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND ((english) LIKE "%'.(($qq[$i])).'%")';
                $sql_filter.=')';
                $Uslovie.=$sql_filter;
            }
            $r=sql("SELECT * FROM tovsNew WHERE sklad>0 $StoppardUslovie AND $Uslovie  ORDER BY name");
        }
        
        if(mysqli_num_rows($r)==0)
        {
            $echo="<tr><td style='padding-top:20px;' colspan='5'>$strnothing1 $searchline $strnothing2 </td></tr>";
            //$Zagolovok='';
        }
        else{
            if($nametitle!='') $Zagolovok=$nametitle;
            $wwidth='300px';//1 $rowname,2 $vid,3 $tip,4 $picture,5 $form
            $echo= '<table align="left" width="100%" height="60px" cellspacing="0" cellpadding="0" border="0" style="padding:20px;padding-bottom:0px;"><tr>
		<td style="padding-left:10px;padding-right:10px;width:'.$wwidth.'px;background-color:#'.$bclr.';FONT-SIZE:19px;color:#FFFFFF;text-align:center;">
		<b>'.$Zagolovok.'</b></td>
		<td  style="padding-right:10px;width:80%;background-color:#FFFFFF;text-align:right;">&nbsp;</td>
		</tr>
		</table>';//'.$sortpage.' height="1px">
            $echo.= '<table style="padding:20px;" align="center" bgcolor="'.$this->backgroundColorOfButton.'" width="100%" height="660px" cellspacing="0" cellpadding="0" border="0"><tr>';
            $countquery1=mysqli_num_rows($r);
            $i=1;$j=1;
            while($row = mysqli_fetch_array($r)){
                $idg=$row['idg'];
                $queryz=sql("SELECT * FROM tovsNew WHERE id='$idg' AND grp=1 ");
                $countqueryz=mysqli_num_rows($queryz);
                if($countqueryz>0){
                    $rowname=$row['name'];
                    $Nnewprice=$row['price1s'];
                    $Nnewprice=$Nnewprice;
                    $ts=floor($Nnewprice/1000);$ed=$Nnewprice-($ts*1000);
                    if($ts=='0') $ts="";else{if($ed<10)$ed='00'.$ed;elseif($ed<100)$ed='0'.$ed;};
                    $newprice1="$ts $ed <img src='/img/rub-002.png' style='height:14px' alt='р.'>";
                    $sklad=$row['sklad'];
                    if($sklad=="0")$colorbag="bug.gif";	else $colorbag="bag.gif";
                    $info="&nbsp;";
                    $ida=$row['ida'];$id=$row['id'];$realname=$ida; $perem=$row['Imagefile'];
                    $vid=$row['Vid'];
                    $tip=$row['Tip'];
                    $engvid=$row['videnglish'];$engtip=$row['tipenglish'];
                    $picture=$row['Picture'];
                    $form=$row['Form'];
                    $brandid=$row['Factory'];
                    $Height=$row['Height'];		$Capacity=$row['Capacity'];		$Diameter=$row['Diameter'];$Width=$row['Width'];
                    $TipOfMaterial=$row['TipOfMaterial'];$flashbackcolor='red';$backcolor='blue';
                    $Person=$row['Person'];$Predmetov=$row['Predmetov'];$AutorPicture=$row['AutorPicture'];
                    //$Diameter='..';
                    $frontname=MakeFrontName($brandid,$rowname,$vid,$tip,$picture,$form,$TipOfMaterial,$Person,$Predmetov,$AutorPicture, $Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
                    $bottomname=MakeBottomName($brandid,$newprice1,$language);
                    if($perem=='/icons/noimage.jpg') $imginsert="";
                    else $imginsert="<img width='100%' id='img".$id."' src='$perem'>";
                    if($i<=4) $sti="padding-right:10px;";else $sti='';//1 $rowname,2 $vid,3 $tip,4 $picture,5 $form
                    global $langstr;
                    $stroka_sort=$langstr.'/shop';//		1 $rowname,2 $vid,3 $tip,4 $picture,5 $form,6 $TipOfMaterial,7 $Person,8 $Predmetov,9 $frontname
                    $echo.="<td class='ifzsearch' style='$sti'>
				<table  cellpadding='0' cellspacing='0' class='cat'><tr><td class='cat1'>
				<a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$frontname</a></td></tr>
				<td class='cat2'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$imginsert</a></td></tr>
				<td class='cat3'>$bottomname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href='".aPSID("/set.php?oper=add_tov&tov_id=$id")."' id='ishop$id' target='market'>$strbask</a>";

                    $result=sql("SELECT * FROM likeengine WHERE id='$id'");
                    $countQuantStr=mysqli_num_rows($result);
                    $printlike='<div id="like'.$id.'" onClick="LikeEngine(\'like'.$id.'\')" style="font-size:14px;font-weight:500;color:#'.$bclr.';vertical-align:top;cursor: pointer;">';
                    $printlike.=printlike($id,$countQuantStr,$language);
                    $printlike.='</div>';

                    $echo.=$printlike;
                    $echo.="</td></tr></table></td>";
                    if($i++>3){$i=1;$j++;$echo.="</tr><tr>";}
                }
            };
            mysqli_free_result($queryz);
            while($j++<4)	$echo.="<td style='background-color:#FFFFFF;' ></td></tr><tr>";
            $echo.='</tr></table></td></tr></table>';
            //onClick="vassa.height=\'20px\';" onMouseOver="vassa.height=\'20px\';"  onMouseOut="vassa.height=\'20px\';"
            //$echo.='<div id="scrollup"><img width="50px" alt="Прокрутить вверх";" src="/img/up.png"></div></td>';
        }
        $echo.='<div id="scrollup"><img width="50px" alt="Прокрутить вверх";" src="/img/up.png"></div></td>';

        mysqli_free_result($r);
        return $echo;
    }
}