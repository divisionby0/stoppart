<?php

class PossibleFilters
{
    public function __construct()
    {
        
    }
    
    public function create($menuname, $menuname2, $menuname3, $menuname4, $menuname5, $menuname6, $menu, $searchline, $viewstr, $Filter, $filterstr, $langstr, $unlangstr, $menuVersion, $language, $sortstr0, $menuenglish, $sortstr2, $shownotallstr, $ifstr, $showallstr, $sortstr3){
        switch($menuname2){
            case $menu[0][0]:
                $m2=0;
                break;
            case $menu[1][0]:
                $m2=1;
                break;
            case $menu[2][0]:
                $m2=2;
                break;
            case $menu[3][0]:
                $m2=3;
                break;
            case $menu[4][0]:
                $m2=4;
                break;
            case $menu[5][0]:
                $m2=5;
                break;
            case $menu[6][0]:
                $m2=6;
                break;
            case $menu[7][0]:
                $m2=7;
                break;
            default: 
                $m2=1;
        }
        if($searchline!=""){
            $menuname="search";
            $m2=99;
        }
        if($viewstr!=""){
            $m2=99;
        }

        
        switch($menuname3){
            case $menu[$m2][2]: 
                $m3=0;
                break;
            case $menu[$m2][4]: 
                $m3=1;
                break;
            case $menu[$m2][6]: 
                $m3=2;
                break;
            case $menu[$m2][8]: 
                $m3=3;
                break;
            case $menu[$m2][10]: 
                $m3=4;
                break;
            case $menu[$m2][12]: 
                $m3=5;
                break;
            case $menu[$m2][14]: 
                $m3=6;
                break;
            case $menu[$m2][16]: 
                $m3=7;
                break;
            default: $m3=1;
        }

        $sortby='name';
        $sortway='';
        $sortstr='';
        $firstpage="01";
        $numberofpages="42";
        $ShAll="0";
        if(substr($menuname3, 0, 4)=="sort"){
            $sortby=substr($menuname3, 6, 4);
            $sortway=substr($menuname3, 11, 1);
            $firstpage=substr($menuname3, 10, 2);
            $numberofpages=substr($menuname3, 12, 2);
            $ShAll=substr($menuname3, 14, 1);
            $menuname3="";
        }
        elseif(substr($menuname4, 0, 4)=="sort"){
            $sortby=substr($menuname4, 6, 4);
            $sortway=substr($menuname4, 11, 1);
            $firstpage=substr($menuname4, 10, 2);
            $numberofpages=substr($menuname4, 12, 2);
            $ShAll=substr($menuname4, 14, 1);
            $menuname4="";
        }
        elseif(substr($menuname5, 0, 4)=="sort"){
            $sortby=substr($menuname5, 6, 4);
            $sortway=substr($menuname5, 11, 1);
            $firstpage=substr($menuname5, 10, 2);
            $numberofpages=substr($menuname5, 12, 2);
            $ShAll=substr($menuname5, 14, 1);
            $menuname5="";
        }
        elseif(substr($menuname6, 0, 4)=="sort"){
            $sortby=substr($menuname6, 6, 4);
            $sortway=substr($menuname6, 11, 1);
            $firstpage=substr($menuname6, 10, 2);
            $numberofpages=substr($menuname6, 12, 2);
            $ShAll=substr($menuname6, 14, 1);
            $menuname6="";
        };
        if(isset($_POST['npage'])) {
            $firstpage=$_POST["npage"] ;
        }
        if(isset($_POST['ShowFoto'])) {
            $ShAll="0";
        }
        if(post('ShowFoto')=='yes'){
            $ShAll="1";
        }
        
        if($sortway==''){
            $sortway='';
        }
        if($sortby!=''){
            $sortstr='sortby'.$sortby.'01'.$numberofpages.$ShAll;
        }
        else{
            $sortstr='sortbyname0142'.$ShAll;
        }
        if($Filter!=""){
            $sortstr=$sortstr."/".$filterstr;
        }
        $stroka_sort="$langstr/shop";
        $unstroka_sort="$unlangstr/shop";

        if($menuVersion =='stoppart'){
            $stroka="stoppart.com";
        } else {
            $stroka="ifarfor.ru";
        }
        if($language=='en'){
            $marketstr="market2.php?language=en&menuname=$menuname";
        }else {
            $marketstr="market2.php?&menuname=$menuname";
        }
        if($menuname=="cabinet" or $menuname=="contact" or $menuname=="company" or $menuname=="delivery"){
            $stroka_unfull="$langstr/$menuname/$menuname2";
            $stroka_sort="$langstr/$menuname/$menuname2";
            $unstroka_sort="$unlangstr/$menuname/$menuname2";
        }
        elseif($menuname2!=""){
            for($ji=0,$ju='';$ji<7;$ji++) if($menuname2==$menu[$ji][0]){
                if($language=='en') $ju=$menuenglish[$ji][1];
                else $ju=$menu[$ji][1];
                $stroka=$stroka."/$ju";
            }
            $stroka_unfull="$langstr/shop/$menuname2";
            $stroka_sort="$langstr/shop/$menuname2/$sortstr";
            $unstroka_sort="$unlangstr/shop/$menuname2/$sortstr";
            if($ju!=''){
                $Zagolovok=$ju;
            }
            $marketstr.="&menuname2=$menuname2";
        };
        if($menuname3!=""){
            $ruru=sql("SELECT * FROM tovsNew WHERE id='$menuname3' and grp='1'");$countruru=mysqli_num_rows($ruru);$ji=0;
            if($countruru>0){
                $rowjuk=mysqli_fetch_array($ruru);
                if($language=='en') $juk=$rowjuk[english];
                else $juk=$rowjuk[name];
                if($juk=="")$juk=$rowjuk[name];
                $stroka=$stroka."<a href='".aPSID("$langstr/shop/$menuname2/$menuname3/$sortstr")."'>/$juk</a>";
                $stroka_unfull="$langstr/shop/$menuname2/$menuname3";
                $stroka_sort="$langstr/shop/$menuname2/$menuname3/$sortstr";
                $unstroka_sort="$unlangstr/shop/$menuname2/$menuname3/$sortstr";if($juk!='')$Zagolovok=$juk;
                $marketstr.="&menuname3=$menuname3";
            }
            mysqli_free_result($ruru);
        }
        if($menuname4!=""){
            $ruru=sql("SELECT * FROM tovsNew WHERE id='$menuname4' and grp='1'");$countruru=mysqli_num_rows($ruru);$ji=0;
            if($countruru>0){
                $rowjuk=mysqli_fetch_array($ruru);
                if($language=='en') $juk=$rowjuk[english];
                else $juk=$rowjuk[name];
                if($juk=="")$juk=$rowjuk[name];
                $stroka=$stroka."<a href='".aPSID("$langstr/shop/$menuname2/$menuname3/$menuname4/$sortstr")."'>/$juk</a>";
                $stroka_unfull="$langstr/shop/$menuname2/$menuname3/$menuname4";
                $stroka_sort="$langstr/shop/$menuname2/$menuname3/$menuname4/$sortstr";
                $unstroka_sort="$unlangstr/shop/$menuname2/$menuname3/$menuname4/$sortstr";if($juk!='')$Zagolovok=$juk;
                $marketstr.="&menuname4=$menuname4";
            }
            mysqli_free_result($ruru);
        }
        if($menuname5!=""){
            $ruru=sql("SELECT * FROM tovsNew WHERE id='$menuname5' and grp='1'");$countruru=mysqli_num_rows($ruru);$ji=0;
            if($countruru>0){
                $rowjuk=mysqli_fetch_array($ruru);
                if($language=='en') $juk=$rowjuk[english];
                else $juk=$rowjuk[name];
                if($juk=="")$juk=$rowjuk[name];
                $stroka=$stroka."<a href='".aPSID("$langstr/shop/$menuname2/$menuname3/$menuname4/$menuname5/$sortstr")."'>/$juk</a>";
                $stroka_unfull="$langstr/shop/$menuname2/$menuname3/$menuname4/$menuname5";
                $stroka_sort="$langstr/shop/$menuname2/$menuname3/$menuname4/$menuname5/$sortstr";
                $unstroka_sort="$unlangstr/shop/$menuname2/$menuname3/$menuname4/$menuname5/$sortstr";if($juk!='')$Zagolovok=$juk;
                $marketstr.="&menuname5=$menuname5";
            }
            mysqli_free_result($ruru);
        }
        if($sortstr!=""){
            $marketstr.="&sortstr=$sortstr";
        }

        if($sortby=="cost"){
            $sortpage=$sortstr0." <a href='".aPSID("$stroka_unfull/sortbyname$firstpage$numberofpages$ShAll")."'>$sortstr2 </a> $ifstr <b>$sortstr3</b>";
            $Sort='p';
        }
        else{
            $sortpage=$sortstr0." <b>$sortstr2</b> $ifstr <a href='".aPSID("$stroka_unfull/sortbycost$firstpage$numberofpages$ShAll")."'>$sortstr3</a>";
            $Sort='n';
        }
        if($ShAll=="1"){
            $Showpage="<b>$showallstr</b> $ifstr <a href='".aPSID("$stroka_unfull/sortby$sortby"."01420")."'>$shownotallstr</a>";
        }
        else{
            $Showpage="<a href='".aPSID("$stroka_unfull/sortby$sortby"."01421")."'>$showallstr</a> $ifstr <b>$shownotallstr</b>";
        }

        //====================================Конец работы с сортировкой=============================================
        //==========================================================================================================
        if($menuVersion=='ifarfor'){
            $FontMenu='19';
        } else{
            $FontMenu='16';
        }
        $am = array();
        for($i=0;$i<7;$i++){
            $menuLink=$menu[$i][0];
            if($menuLink=="ware") {
                $menuLink="ware/serv/teaserv";
            }
            if($menuLink=="sculpture") {
                $menuLink="sculpture/janre/gogol";
            }
            if($menuLink=="artplate") {
                $menuLink="artplate/stoppard/vangogh";
            }
            if($menuLink=="artholder") {
                $menuLink="artholder/holder";
            }
            if($menuLink=="tableware") {
                $menuLink="tableware/settw";
            }
            if($menuLink=="souvenirs") {
                $menuLink="souvenirs/krstrochka";
            }
            if($menuLink=="interior") {
                $menuLink="interior/vases";
            }
            $tekname=$menu[$i][1];

            if($language=="") {
                $tekname=$menu[$i][1];
            } elseif($language=="en") {
                $tekname=$menuenglish[$i][1];
            }
            if($m2==$i)
            {
                $strokas='<a href="'.aPSID($langstr.'/shop/'.$menuLink.'/'.$sortstr).'" style="FONT-SIZE:'.$FontMenu.'px;color:#FFFFFF;" ><B>'.my_strtoupper($tekname).'</B></a>';
                $cm[$i][0]=aPSID($langstr.'/shop/'.$menuLink.'/'.$sortstr);
                $cm[$i][1]='<b>'.my_strtoupper($tekname).'</b>';
            }
            else
            {
                $strokas='<a href="'.aPSID($langstr.'/shop/'.$menuLink.'/'.$sortstr).'" style="FONT-SIZE:'.$FontMenu.'px;FONT-weight:300px;color:#FFFFFF;" >'.my_strtoupper($tekname).'</a>';
                $cm[$i][0]=aPSID($langstr.'/shop/'.$menuLink.'/'.$sortstr);
                $cm[$i][1]=my_strtoupper($tekname);
            }
            $am[$i]=$strokas;
        }


        //echo "<p>menuname=".$menuname."</p>";

        return ["stroka_sort"=>$stroka_sort,
            "stroka"=>$stroka,
            "marketstr"=>$marketstr, 
            "unstroka_sort"=>$unstroka_sort, 
            "sortpage"=>$sortpage, 
            "am"=>$am, 
            "m2"=>$m2,
            "cm"=>$cm, 
            "tekname"=>$tekname,
            "Showpage"=>$Showpage, 
            "Sort"=>$Sort, 
            "ShAll"=>$ShAll,
            "sortstr"=>$sortstr, 
            "firstpage"=>$firstpage,
            "numberofpages"=>$numberofpages,
            "Zagolovok"=>$Zagolovok,
            "menu"=>$menu,
            "menuname"=>$menuname,
            "menuname2"=>$menuname2,
            "menuname3"=>$menuname3,
            "menuname4"=>$menuname4,
            "menuname5"=>$menuname5,
            "menuname6"=>$menuname6
        ];
    }
}