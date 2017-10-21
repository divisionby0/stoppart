<?php

class Catalog
{
    //private $offset = 0;
    public function __construct()
    {

    }

    public function getHtml($HotStr,$HotStr3, $page,$group,$Uslovie,$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language, $offset, $listingsRequestTotalItems){

        /*
        Logger::logMessage("Catalog getting html...");
        Logger::logMessage("HotStr=".$HotStr);
        Logger::logMessage("HotStr3=".$HotStr3);
        Logger::logMessage("page=".$page);
        Logger::logMessage("group=".$group);
        Logger::logMessage("Uslovie=".$Uslovie);
        Logger::logMessage("Filter=".$Filter);
        Logger::logMessage("Sort=".$Sort);
        Logger::logMessage("RightUslovie=".$RightUslovie);
        Logger::logMessage("stroka_sort=".$stroka_sort);
        Logger::logMessage("firstpage=".$firstpage);
        Logger::logMessage("numberofpages=".$numberofpages);
        Logger::logMessage("ShAll=".$ShAll);
        Logger::logMessage("language=".$language);
        Logger::logMessage("offset=".$offset);
        Logger::logMessage("listingsRequestTotalItems=".$listingsRequestTotalItems);
        */

        $echo = "";

        if($Uslovie=="all") {
            $Uslovie="";
        }
        $pobeda=$_GET['pobeda'];

        if($language=="en"){
            $strbask="Add to basket";
        }else{
            $strbask="в корзину";
        }

        $menuVersion = whichshop3();

        if($menuVersion=='ifarfor'){
            $bclr='AD9E82';
        } else{
            $bclr='82a0ae';
        }

        if($HotStr=='' && $HotStr3=='')
        {
            $request = new HotStringsEmptySelectRequest($Filter, $Uslovie, $RightUslovie, $Sort, $page, $group, $ShAll, $offset, $listingsRequestTotalItems);
            $query1=$request->create();
        }
        elseif($HotStr!='')
        {
            $request = new HotStrNotEmptySelectRequest($HotStr, $ShAll, $offset, $listingsRequestTotalItems);
            $query1=$request->create();
        }
        else
        {
            if($HotStr3!='')
            {
                $request = new HotStr3NotEmptySelectRequest($HotStr3, $offset, $listingsRequestTotalItems);
                $query1=$request->create();
            }
        }

        $countquery1=mysqli_num_rows($query1);
        
        $counterofpage=0;
        $firstpiece=($firstpage-1)*$numberofpages;
        $lastpiece=$firstpiece+$numberofpages;

        if($lastpiece==0)
        {
            $lastpiece=1000;
            $i=1;
            $j=1;
        }
        if($language=="en"){
            $rownamelang="english";
        } else{
            $rownamelang="name";
        }

        // TODO я предполагаю что 0 это отсутствие на складе а 1 - присутствие
        $images = array("0"=>"bug.gif","1"=>"bag.gif");
        $dimensions = array("en"=>" mm",""=>" мм");

        $items = array();
        
        while($row = mysqli_fetch_array($query1)){
            $counterofpage++;
            if($counterofpage>$firstpiece && $counterofpage<=$lastpiece)
            {
                $rowname=$row[$rownamelang];
                $Nnewprice=$row['price1s'];

                $Nnewprice=$Nnewprice;
                $ts=floor($Nnewprice/1000);
                $ed=$Nnewprice-($ts*1000);

                if($ts=='0')$ts="";else{if($ed<10)$ed='00'.$ed;elseif($ed<100)$ed='0'.$ed;};
                $newprice1="$ts $ed <img src='/img/rub-002.png' style='height:14px' alt='rur'>";

                $info="&nbsp;";
                $ida=$row['ida'];
                $id=$row['id'];
                $realname=$ida;
                $perem=$row['Imagefile'];
                $vid=$row['Vid'];
                $tip=$row['Tip'];
                $picture=$row['Picture'];
                $form=$row['Form'];
                $brandid=$row['Factory'];
                $engvid=$row['videnglish'];
                $engtip=$row['tipenglish'];

                $rurus=sql("SELECT name FROM  brand WHERE id='$brandid'");

                if(mysqli_num_rows($rurus)>0) {
                    $roww=mysqli_fetch_array($rurus);
                    $brandname=$roww['name'];
                }

                $Height=$row['Height'];
                $Capacity=$row['Capacity'];
                $Diameter=$row['Diameter'];
                $Width=$row['Width'];
                $TipOfMaterial=$row['TipOfMaterial'];
                $Person=$row['Person'];
                $Predmetov=$row['Predmetov'];
                $AutorPicture=$row['AutorPicture'];

                $frontname=MakeFrontName($brandid,$rowname,$vid,$tip,$picture,$form,$TipOfMaterial,$Person,$Predmetov,$AutorPicture, $Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
                $bottomname=MakeBottomName($brandid,$newprice1,$language);

                if($perem=='/icons/noimage.jpg'){
                    $imginsert="";
                }
                else{
                    $imginsert="<img width='100%' id='img".$id."' src='$perem'>";
                }

                if($i<=3){
                    $sti="padding-right:10px;";
                }else{
                    $sti='';
                }

                $Prov=ProverkaNal($id,'5');

                $result=sql("SELECT * FROM likeengine WHERE id='$id'");

                $countQuantStr=mysqli_num_rows($result);
                $printlike='<div id="like'.$id.'" onClick="LikeEngine(\'like'.$id.'\')" style="font-size:14px;font-weight:500;color:#'.$bclr.';vertical-align:top;cursor: pointer;">'.printlike($id,$countQuantStr,$language).'</div>';

                if($brandname=='Stoppard'){
                    $printsize=printsize($id,200,$language);

                    $MM = $dimensions[$language];

                    if(($Prov=='0') and ($pobeda=='1')){
                        $i=$i-1;
                        echo'1';
                    }
                    else{
                        $echo.="<td class='ifzshop' style='$sti'><table  cellpadding='0' cellspacing='0' class='cat'><tr><td class='cat1'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$frontname</a></td></tr><td class='cat2'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$imginsert</a></td></tr><td class='cat3'><table width='100%'><tr><td width='50%'><input data-itemid='$id' name='optionRadio$id' id='size1$id' value='150' type='radio'> 150$MM<br><input data-itemid='$id' checked name='optionRadio$id' id='size2$id' value='200' type='radio'> 200$MM<br> <input data-itemid='$id' name='optionRadio$id' id='size3$id' value='260' type='radio'> 260$MM </td><td width='50%' ><div id='size$id' style='FONT-SIZE: 15px;'>$printsize</div></td></tr></table>$printlike</td></tr></table></td>";
                    }
                }
                else {
                    if(($Prov=='0') and ($pobeda=='1')){
                        $i=$i-1;
                        echo'1';
                    }
                    else{
                        $echo.="<td class='ifzshop' style='$sti'><table  cellpadding='0' cellspacing='0' class='cat'><tr><td class='cat1'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$frontname</a></td></tr><td class='cat2'><a href='".aPSID("$stroka_sort/view$realname")."' target='_blank'>$imginsert</a></td></tr><td class='cat3'>$bottomname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='".aPSID("/set.php?oper=add_tov&tov_id=$id&language=$language")."' id='ishop$id' target='market'>$strbask </a>$printlike</td></tr></table></td>";
                    }
                }
                if($i++>2){
                    $i=1;
                    $j++;
                    $echo.="</tr><tr>";
                }
            }
        }

        while($j++<3){
            $echo.="<td style='background-color:#FFFFFF;' ></td>";
        }

        $echo.="</tr><tr>";
        if($numberofpages<$countquery1 and $numberofpages>0){
            $bhref="$stroka_sort/sortbycost";
            $echo.="<td colspan='3' style='padding-top:30px;text-align:center;height:40px;'><table align='center' cellpadding='2' cellspacing='10'><tr>";
            $echo.=" <td width='44%'>&nbsp;</td>";
            $npage=0;
            $addecho='';

            while($npage*$numberofpages<$countquery1)
            {
                if($npage++<9){
                    $addprn='0';
                } else{
                    $addprn="";
                }
                $echo.=" <td width='1%' style='height: 40px;background-color:#FFFFFF;text-align:center;'>";
                if($npage==$firstpage){
                    $echo.="<figure style='width: 5px;height: 30px;  padding-left:10px; padding-bottom:5px;padding-right:10px;padding-top:12px; margin:0px; vertical-align:middle;font-size:18px;'><b>".$npage."</b></figure>";
                }
                else{
                    $echo.="<input width='15' height='15' type='submit' name='npage'  value='$npage'>";
                }
                $echo.="</td>";
                if(round($npage/15)==$npage/15){
                    $echo.="<td width='44%'>&nbsp;</td></tr><tr><td width='44%'>&nbsp;</td>";
                    $addecho="<td width='15%' colspan='15'>&nbsp;</td>";
                }
            };
            $echo.=" $addecho<td width='44%'>&nbsp;</td></tr></table></td>";
        }
        return $echo;
    }
}