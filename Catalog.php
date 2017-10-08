<?php

class Catalog
{
    public function __construct()
    {
    }

    public function getHtml($HotStr,$page,$group,$Uslovie,$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language){
        global $HotStr3;
        $dollar=GetCurentKursDolars();if($Uslovie=="all") $Uslovie="";$pobeda=$_GET['pobeda'];if($language=="en")$strbask="Add to basket";else $strbask="в корзину";
        $menuVersion = whichshop3();
        if($menuVersion=='ifarfor') $bclr='AD9E82'; else $bclr='82a0ae';
        if($HotStr=='' and $HotStr3=='')
        {
            if($Filter!=""){
                $sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)'; $qq=explode("|",$Filter); $num = count($qq);
                for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';$Uslovie.=$sql_filter;}
            $Uslovie.=$RightUslovie." ORDER BY ";
            switch($Sort){
                case "n": $Uslovie.="name";break; case "-n": $Uslovie.="name DESC";break;
                case "p": $Uslovie.="price1s";break; case "-p": $Uslovie.="price1s DESC";break;
                default: $Uslovie.="name";break;
            }

            if($page=='stoppard') $Diameter200="  and zakaz='1' "; else $Diameter200='AND ((zakaz+sklad)>0)'; //AND ((zakaz)>0)

            $SQLZapros="SELECT * FROM tovsNew WHERE (idg='$group' ";$query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
            $countquery1=mysqli_num_rows($query0);
            while($row = mysqli_fetch_array($query0)){$iddd=$row['id'];$SQLZapros=$SQLZapros." or idg ='$iddd'";};
            if($ShAll==1)  $SQLZapros.=")AND grp=0 $Diameter200 $Uslovie";
            else {
                $SQLZaprosTest=$SQLZapros.")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' $Diameter200 $Uslovie";
                $query1=sql($SQLZaprosTest);
                $countquery1=mysqli_num_rows($query1);
                if($countquery1==0) $SQLZapros.=")AND grp=0 $Diameter200 $Uslovie";//Если товаров с фотографиями в группе нет - покажем ка мы даже без фото!
                else				$SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' $Diameter200 $Uslovie";
            }
            $query1=sql($SQLZapros);
        }
        elseif($HotStr!='')
        {
            if($ShAll=="1") $SQLZapros="AND grp=0 AND ((zakaz+sklad)>0) ORDER BY name";//post('ShowFoto')=='yes'
            else $SQLZapros="AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad)>0) ORDER BY name";//
            if($HotStr=="RUSSIANSTYLE"){$HotStr="SELECT * FROM tovsNew WHERE Rstyle='1'  $SQLZapros";}
            elseif($HotStr=="project"){$HotStr="SELECT * FROM tovsNew WHERE TipAss='Проект'  $SQLZapros";}
            elseif($HotStr=="cobaltnet"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE (picture.english='Cobalt net' or picture.name='Кобальтовая сетка Модерн') $SQLZapros";}
            elseif($HotStr=="nega"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM form LEFT JOIN tovsNew ON form.id = tovsNew.Form WHERE form.name='Нега' $SQLZapros";}
            elseif($HotStr=="zamoscow"){$HotStr="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE picture.name='Замоскворечье' $SQLZapros";}
            elseif($HotStr=="newyear"){$HotStr="SELECT * FROM tovsNew WHERE NY='1' $SQLZapros";}
            elseif($HotStr=="nephrit"){$HotStr="SELECT * FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE (picture.name='Нефритовый фон' or  picture.name='Нефритовый фон 2') $SQLZapros";}
            $query1=sql($HotStr);
        }
        else
        {

            if($HotStr3!=''){
                $SQLZapros="AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad)>0) ORDER BY name DESC";//
                if($HotStr3=="newyear"){$HotStr="SELECT * FROM tovsNew WHERE NY='1' $SQLZapros";}
                elseif($HotStr3=="cobaltnet"){$HotStr="SELECT  * FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE (picture.english='Cobalt net' or picture.name='Кобальтовая сетка Модерн')
		AND grp=0 AND ((zakaz+sklad)>0)  AND Imagefile<>'/icons/noimage.jpg' ORDER BY tovsNew.tip ";}
                elseif($HotStr3=="love"){$HotStr="SELECT * FROM tovsNew WHERE InLove='1' $SQLZapros";}
                elseif($HotStr3=="easter"){$HotStr="SELECT * FROM tovsNew WHERE Easter='1' $SQLZapros";}
                elseif($HotStr3=="russianstyle"){$HotStr="SELECT * FROM tovsNew WHERE Rstyle='1' $SQLZapros";}
                $query1=sql($HotStr);
            }
        }
        $countquery1=mysqli_num_rows($query1);$counterofpage=0;$firstpiece=($firstpage-1)*$numberofpages;$lastpiece=$firstpiece+$numberofpages;if($lastpiece==0)$lastpiece=1000;$i=1;$j=1;
        if($language=="en")$rownamelang="english"; else$rownamelang="name";
        while($row = mysqli_fetch_array($query1)){
            $counterofpage++;
            if($counterofpage>$firstpiece and $counterofpage<=$lastpiece){
                $rowname=$row[$rownamelang];$Nnewprice=$row['price1s'];$Nnewprice=$Nnewprice;
                $ts=floor($Nnewprice/1000);$ed=$Nnewprice-($ts*1000);
                if($ts=='0') $ts="";else{if($ed<10)$ed='00'.$ed;elseif($ed<100)$ed='0'.$ed;};
                $newprice1="$ts $ed <img src='/img/rub-002.png' style='height:14px' alt='rur'>";
                $sklad=$row['sklad'];
                if($sklad=="0")$colorbag="bug.gif";	else $colorbag="bag.gif";
                $info="&nbsp;";
                $ida=$row['ida'];
                $id=$row['id'];
                $realname=$ida;
                $perem=$row['Imagefile'];
                $vid=$row['Vid'];
                $tip=$row['Tip'];
                $picture=$row['Picture'];$form=$row['Form'];$brandid=$row['Factory'];$engvid=$row['videnglish'];$engtip=$row['tipenglish'];
                $rurus=sql("SELECT name FROM  brand WHERE id='$brandid'");if(mysqli_num_rows($rurus)>0) {$roww=mysqli_fetch_array($rurus); $brandname=$roww['name'];}
                $Height=$row['Height'];		$Capacity=$row['Capacity'];		$Diameter=$row['Diameter'];$Width=$row['Width'];
                $TipOfMaterial=$row['TipOfMaterial'];$flashbackcolor='red';$backcolor='blue';
                $Person=$row['Person'];$Predmetov=$row['Predmetov'];$AutorPicture=$row['AutorPicture'];
                $frontname=MakeFrontName($brandid,$rowname,$vid,$tip,$picture,$form,$TipOfMaterial,$Person,$Predmetov,$AutorPicture,
                    $Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
                $bottomname=MakeBottomName($brandid,$newprice1,$language);
                if($perem=='/icons/noimage.jpg') $imginsert="";
                else $imginsert="<img width='100%' id='img".$id."' src='$perem'>";
                if($i<=3) $sti="padding-right:10px;";else $sti='';$Prov=ProverkaNal($id,'5');
                $result=sql("SELECT * FROM likeengine WHERE id='$id'");
                $countQuantStr=mysqli_num_rows($result);
                $printlike='<div id="like'.$id.'" onClick="LikeEngine(\'like'.$id.'\')" style="font-size:14px;font-weight:500;color:#'.$bclr.';vertical-align:top;cursor: pointer;">'.printlike($id,$countQuantStr,$language).'</div>';
                if($brandname=='Stoppard'){//Если это тарелки
                    $printsize=printsize($id,200,$language);
                    if($language=='en') $MM=' mm';else $MM=' мм';
                    if(($Prov=='0') and ($pobeda=='1')){$i=$i-1;echo'1';}//пропускаем товар, которого нет в магазине
                    else $echo.="<td class='ifzshop' style='$sti'>
				<table  cellpadding='0' cellspacing='0' class='cat'><tr><td class='cat1'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$frontname</a></td></tr>
				<td class='cat2'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$imginsert</a></td></tr>
				<td class='cat3'>
				<table width='100%'><tr><td width='50%'>
					<input data-itemid='$id' name='optionRadio$id' id='size1$id' value='150' type='radio'> 150$MM<br>
					<input data-itemid='$id' checked name='optionRadio$id' id='size2$id' value='200' type='radio'> 200$MM<br> 
					<input data-itemid='$id' name='optionRadio$id' id='size3$id' value='260' type='radio'> 260$MM 
				</td>
				<td width='50%' ><div id='size$id' style='FONT-SIZE: 15px;'>$printsize</div></td></tr></table>
			$printlike</td></tr></table></td>";
                }
                else {//это не тарелки
                    if(($Prov=='0') and ($pobeda=='1')){$i=$i-1;echo'1';}//пропускаем товар, которого нет в магазине
                    else $echo.="<td class='ifzshop' style='$sti'>
			<table  cellpadding='0' cellspacing='0' class='cat'><tr><td class='cat1'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$frontname</a></td></tr>
			<td class='cat2'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$imginsert</a></td></tr>
			<td class='cat3'>$bottomname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href='".aPSID("/set.php?oper=add_tov&tov_id=$id&language=$language")."' id='ishop$id' target='market'>$strbask </a>$printlike
			</td></tr></table></td>";
                }
                if($i++>2){$i=1;$j++;$echo.="</tr><tr>";}
            }
        };
        while($j++<3)	$echo.="<td style='background-color:#FFFFFF;' ></td>";
        $echo.="</tr><tr>";
        if($numberofpages<$countquery1 and $numberofpages>0){
            $bhref="$stroka_sort/sortbycost";//$firstpage$numberofpages'>Цене</a>";
            $echo.="<td colspan='3' style='padding-top:30px;text-align:center;height:40px;'>
		<table align='center' cellpadding='2' cellspacing='10'><tr>";
            $echo.=" <td width='44%'>&nbsp;</td>";
            $npage=0;$addecho='';
            while($npage*$numberofpages<$countquery1){

                if($npage++<9)$addprn='0'; else $addprn="";
                $echo.=" <td width='1%' style='height: 40px;background-color:#FFFFFF;text-align:center;'>";
                if($npage==$firstpage)  $echo.="<figure style='width: 5px;height: 30px;  padding-left:10px; padding-bottom:5px;padding-right:10px;padding-top:12px; margin:0px; 
			vertical-align:middle;font-size:18px;'><b>".$npage."</b></figure>";
                else $echo.="<input width='15' height='15' type='submit' name='npage'  value='$npage'>";
                $echo.="</td>";
                if(round($npage/15)==$npage/15){$echo.="<td width='44%'>&nbsp;</td></tr><tr><td width='44%'>&nbsp;</td>";$addecho="<td width='15%' colspan='15'>&nbsp;</td>";}
            };
            $echo.=" $addecho<td width='44%'>&nbsp;</td></tr></table></td>";
        }
        return $echo;
    }
}