<?php

class ListingsView
{
    public function __construct($userid, Catalog $catalog, $language, $nameof, $menu, $menuenglish, $m2, $shiftleftmenu, $menuname2, $menuname3, $menuname4, $menuname5, $sortstr, $langstr, $menuVersion, $HotStr, $HotStr3, $Filter, $FILTR, $Sort, $sortpage, $ShAll, $stroka_sort, $firstpage, $numberofpages, $Zagolovok, $Typefac, $Typemat, $Typeform, $Typepic, $bgColorOfBottom, $bclr, $sizebetweenfilters, $sizebottomleftmenu, $kusokkoda1)
    {
        Logger::logMessage("HotStr=".$HotStr);
        $strokeSQLRequestBuilder = new StrokeSQLRequestBuilder();

        if($language=="en") {
            $tekname=$menuenglish[$m2][1];
        } else {
            $tekname=$menu[$m2][1];
        }
        echo '<p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.my_strtoupper($tekname).'</b></p>';
        $menu1='menu open';

        $hoh=0;
        for($i=2;$i<count($menu[$m2]);$i=$i+2){
            if($language=="en") $tekname=$menuenglish[$m2][$i+1]; else $tekname=$menu[$m2][$i+1];
            $ho=$i/2-$hoh;
            $NameOfGroup="<font style='text-transform: uppercase;'>".$tekname."</font>";
            $idOfGroup=$menu[$m2][$i];
            $echob2='';
            $echob3='';
            $menu1='menu';
            $spanbegin='';
            $spanend='';

            $ruru2=sql("SELECT * FROM tovsNew WHERE idg='$idOfGroup' and grp='1'");

            $addstyle="padding-top:10px;padding-bottom:10px;border-top:1px solid #EEEEEE;";
            $tableforspan="<table align='left' width='100%' height='20px' cellspacing='0' cellpadding='1' border='0' ><tr><td style='width:10%;vertical-align:top;$addstyle'>";

            while($rowruru2=mysqli_fetch_array($ruru2)) {
                if($language=="en") {
                    $nameeng=$rowruru2['english'];
                } else {
                    $nameeng=$rowruru2['name'];
                }

                //oper time=0.021001815795898
                $ruru5=sql("SELECT * FROM tovsNew WHERE idg='".$rowruru2['id']."' and grp='0'");

                if(mysqli_num_rows($ruru5)>0){
                    $stylepad='';
                    $PechID2="".$rowruru2['id'];
                    $spanbegin="<span class='title'>";$spanend="</span>";
                    if($PechID2==$menuname4){
                        $menu1='menu open';$echob3.= "<li><b>".$nameeng."</b></li>";
                    }
                    else {
                        $echob3.= "<li><a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$PechID2/$sortstr")."' target='_self'>" .$nameeng."</a></li>";
                    }
                }
            }
            mysqli_free_result($ruru2);

            if($spanbegin!="") {
                $echob2.="<ul>$echob3</ul>";
            } else{
                $echob2.=$echob3;
                $menu1="mumnu";
            }
            if($spanbegin=="" and $menu1!='mumnu' and $menuname4!='' ) $echobeg= "<div id='cat$ho' class='$menu1'> $tableforspan </td><td style='width:90%;$addstyle'><a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'><b>wwww$NameOfGroup</b>1</a></td></tr></table></div>";
            //вот  графин
            elseif($menu1=='mumnu' and $idOfGroup!=$menuname3){
                $echobeg= "<div style='padding-top:5px;padding-bottom:5px;'> $tableforspan </td><td style='width:90%;$addstyle'><a class='$menu1' href='".aPSID("$langstr/shop/". $menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'>$NameOfGroup</a></td></tr></table></div>";
                $hoh=$hoh+1;
            }
            //графин совпал
            elseif($menu1=='mumnu' and $idOfGroup==$menuname3){
                $echobeg= "<div style='padding-top:5px;padding-bottom:5px;'> $tableforspan </td><td style='width:90%;$addstyle'><b>$NameOfGroup</b></td></tr></table></div>";
                $hoh=$hoh+1;
            }
            //а это раскрывающееся меню
            elseif($menuname4=='' and $idOfGroup!=$menuname3)   {
                $echobeg= "<div id='cat$ho' class='menu'> $tableforspan <span class='title' ></td><td style='width:90%;$addstyle'><a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'>$NameOfGroup</a></td></tr></table></span>";
            }
            elseif($menuname4=='' and $idOfGroup==$menuname3)   {
                $echobeg= "<div id='cat$ho' class='menu open'> $tableforspan  $spanbegin</td><td style='width:90%;$addstyle'><b>$NameOfGroup</b></td></tr></table></span>";
            }
            else {
                $echobeg= "<div id='cat$ho' class='$menu1'> $tableforspan $spanbegin</td><td style='width:90%;$addstyle'><a href='".aPSID("$langstr/shop/".$menu[$m2][0]."/$idOfGroup/$sortstr")."' target='_self'>$NameOfGroup</a></td></tr></table>$spanend";
            }
            echo $echobeg.$echob2;
            if($menu1!='mumnu'){
                echo "</div>";
            }
        }
        if($menuVersion=='ifarfor')
        {
            if($HotStr!='zu' and $HotStr3==''){
                echo'</td></tr>';
                echo'<tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:'.$sizebetweenfilters.'px;">&nbsp;</td></tr><tr><td align="left" style="PADDING:10px;PADDING-bottom:'.$sizebottomleftmenu.'px;border : 0;VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;"><p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.$FILTR.'</b></p>';

                //=============================================================================================
                //=========================Конец размещения левого меню=======================================
                //=============================================================================================

                //=========================Фильтры============================================================ zakaz sklad
                //=================выбираем группу, по которой будет строиться фильтр===========================
                $RightUslovie2='';
                $a = array();
                
                if($menuname4==''){
                    if($menuname3==''){
                        if($menuname2==''){
                            $a='';
                        }
                        else{
                            $strokeSQL=$strokeSQLRequestBuilder->createSimple($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);
                        }
                    }
                    else{
                        $strokeSQL=$strokeSQLRequestBuilder->createSimple($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);
                    }
                }
                else{
                    $strokeSQL=$strokeSQLRequestBuilder->createSimple($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
                }
                if($strokeSQL==''){
                    $strokeSQL='1=1';
                }
                $rurus=sql("SELECT * FROM tovsNew LEFT JOIN picture ON picture.id = tovsNew.Picture WHERE ".$strokeSQL);

                //========================Если выбор не пустой, то формируем список Рисунков и добавляем их в массив $a=======
                if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus))
                    if($roww[$nameof]!='')
                        $a+=array($roww[$nameof]=> $roww['id']);
                ksort ($a);
                $aform = array();
                
                // operation 5 time=0.034002065658569
                if($menuname4==''){
                    if($menuname3==''){
                        if($menuname2==''){
                            $a='';
                        }
                        else {
                            $strokeSQL=$strokeSQLRequestBuilder->createForm($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);
                        }
                    }
                    else{
                        $strokeSQL=$strokeSQLRequestBuilder->createForm($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);
                    }
                }
                else{
                    $strokeSQL=$strokeSQLRequestBuilder->createForm($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
                }
                mysqli_free_result($rurus);
                // end of operation 5
                
                $rurus=sql("SELECT * FROM tovsNew LEFT JOIN form ON form.id = tovsNew.Form WHERE".$strokeSQL);

                //========================Если выбор не пустой, то формируем список Форм и добавляем их в массив $a=======
                if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)) if($roww[$nameof]!='')$aform+=array($roww[$nameof]=> $roww['id']); ksort ($aform);
                $amat = array();

                // operation 6 time=0.02000093460083
                if($menuname4==''){
                    if($menuname3==''){
                        if($menuname2==''){
                            $amat='';
                        }
                        else{
                            $strokeSQL=$strokeSQLRequestBuilder->createMat($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);
                        }
                    }
                    else{
                        $strokeSQL=$strokeSQLRequestBuilder->createMat($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);
                    }
                }
                else{
                    $strokeSQL=$strokeSQLRequestBuilder->createMat($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
                }
                mysqli_free_result($rurus);
                // end of operation 6

                //oper time=0.0089998245239258
                $rurus=sql("SELECT * FROM tovsNew LEFT JOIN material ON material.id = tovsNew.TipOfMaterial WHERE".$strokeSQL);

                //========================Если выбор не пустой, то формируем список Форм и добавляем их в массив $a=======
                if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)) if($roww[$nameof]!='')$amat+=array($roww[$nameof]=> $roww['id']); ksort ($amat);
                $abr = array();

                // operation 7 time=0.024001121520996
                if($menuname4==''){
                    if($menuname3==''){
                        if($menuname2==''){
                            $abr='';
                        }
                        else {
                            $strokeSQL=$strokeSQLRequestBuilder->createBrand($HotStr,$menuname5,$menuname2,"all",$Filter,$Sort,$ShAll);
                        }
                    }
                    else{
                        $strokeSQL=$strokeSQLRequestBuilder->createBrand($HotStr,$menuname5,$menuname3,"all",$Filter,$Sort,$ShAll);
                    }
                }
                else{
                    $strokeSQL=$strokeSQLRequestBuilder->createBrand($HotStr,$menuname5,$menuname4,"all",$Filter,$Sort,$ShAll);
                }
                mysqli_free_result($rurus);
                // end of operation 7

                $rurus=sql("SELECT * FROM tovsNew LEFT JOIN brand ON brand.id = tovsNew.Factory WHERE".$strokeSQL);
                //========================Если выбор не пустой, то формируем список Factory и добавляем их в массив $a=======
                if(mysqli_num_rows($rurus)>0) while($roww=mysqli_fetch_array($rurus)) if($roww[$nameof]!='')$abr+=array($roww[$nameof]=> $roww['id']);
                ksort ($abr);
                mysqli_free_result($rurus);

                //=======================Рисуем Фильтр по типу фарфора===================================================
                $RightMatUslovie2='';
                $menuc='menu';
                $echomatfor='';
                foreach($amat as $kmat => $tmat){
                    $checks='';
                    if(isset($_POST["mat$tmat"]) and   $_POST["mat$tmat"] == 'yes'){
                        $checks='checked';$menuc='menu open';
                        if($RightMatUslovie2=='')$RightMatUslovie2.=" AND (TipOfMaterial=$tmat"; else $RightMatUslovie2.=" OR TipOfMaterial=$tmat";
                    }
                    else{$checks='';}
                    //		$echomatfor.="<div class='checkbox'><input name='mat$tmat' $checks type='checkbox' value='yes' onclick='FFilter.submit()'><label for='check'>$kmat</label></div>";
                    $echomatfor.="<li><input name='mat$tmat' $checks type='checkbox' value='yes' onclick='FFilter.submit()'>$kmat</li>";
                };
                $echomatbegin="<div id='filtertip' class='$menuc'>$tableforspan<span class='title'></span></td><td style='width:90%;$addstyle'>$Typemat</td></tr></table><ul>";
                echo $echomatbegin.$echomatfor."</ul></div>";if($RightMatUslovie2!='') $RightMatUslovie2.=")";
                $RightUslovie=$RightMatUslovie1.$RightMatUslovie2;
                //=======================Рисуем Фильтр по Рисунку из переменной============================================
                $menup='menu';$echopicfor='';
                
                foreach($a as $k => $t){
                    $checks='';
                    if(isset($_POST["pcx$t"]) and   $_POST["pcx$t"] == 'yes'){
                        $checks='checked';$menup='menu open';
                        if($RightUslovie2=='')$RightUslovie2.=" AND (picture=$t"; else $RightUslovie2.=" OR picture=$t";
                    }
                    else{$checks='';}
                    $echopicfor.="<li><input name='pcx$t' $checks type='checkbox' value='yes' onclick='FFilter.submit()'>$k</li>";
                };
                
                $echopicbegin="<div id='filterpic' class='$menup'>$tableforspan<span class='title'></span></td><td style='width:90%;$addstyle'>$Typepic</td></tr></table><ul>";
                echo $echopicbegin.$echopicfor."</ul></div>";

                if($RightUslovie2!='') {
                    $RightUslovie2.=")";
                }
                $RightUslovie.=$RightUslovie1.$RightUslovie2;

                //=======================Рисуем Фильтр по Форме из переменной============================================
                $RightFormUslovie2='';
                $menuf='menu';
                $echoformfor='';
                foreach($aform as $kform => $tform){
                    $checks='';
                    if(isset($_POST["frm$tform"]) and   $_POST["frm$tform"] == 'yes'){
                        $checks='checked';$menuf='menu open';
                        if($RightFormUslovie2=='')$RightFormUslovie2.=" AND (form=$tform"; else $RightFormUslovie2.=" OR form=$tform";
                    }
                    else{$checks='';}
                    $echoformfor.="<li><input name='frm$tform' $checks type='checkbox' value='yes' onclick='FFilter.submit()'>$kform</li>";
                };
                $echoformbegin="<div id='filterform' class='$menuf'>$tableforspan<span class='title'></span></td><td style='width:90%;$addstyle'>$Typeform</td></tr></table><ul>";
                echo $echoformbegin.$echoformfor."</ul></div>";

                if($RightFormUslovie2!='') {
                    $RightFormUslovie2.=")";
                }
                $RightUslovie.=$RightFormUslovie1.$RightFormUslovie2;

                //=======================Рисуем Фильтр по Производителю============================================
                $RightBrandUslovie2='';
                $menubrand='menu';
                $echobrandfor='';
                foreach($abr as $kbr => $tbr){
                    $checks='';
                    if(isset($_POST["br$tbr"]) and   $_POST["br$tbr"] == 'yes'){
                        $checks='checked';$menubrand='menu open';
                        if($RightBrandUslovie2=='')$RightBrandUslovie2.=" AND (Factory=$tbr"; else $RightBrandUslovie2.=" OR Factory=$tbr";
                    }
                    else{
                        $checks='';
                    }
                    $echobrandfor.="<li><input name='br$tbr' $checks type='checkbox' value='yes' onclick='FFilter.submit()'>$kbr</li>";
                };
                $echobrandbegin="<div id='filterbrand' class='$menubrand'>$tableforspan<span class='title'></span></td><td style='width:90%;$addstyle'>$Typefac</td></tr></table><ul>";
                echo $echobrandbegin.$echobrandfor."</ul></div>";
                if($RightBrandUslovie2!='') {
                    $RightBrandUslovie2.=")";
                }
                $RightUslovie.=$RightBrandUslovie1.$RightBrandUslovie2;
            }

            echo'</td></tr><tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:'.$sizebetweenfilters.'px;">&nbsp;</td></tr><tr><td align="left" style="PADDING:10px;border : none;VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;"><p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;">';

            // like engine selection by user id oper time=0.0019998550415039
            $result=sql("SELECT * FROM likeengine WHERE userid='$userid'");

            $CountOfMyLike=mysqli_num_rows($result);
            if($language=="en"){
                echo'<b>FAVORITE</b></p>';
                if($CountOfMyLike>0){
                    echo'<div class="hot">';
                    echo'<a href="'.aPSID("/index.php?search=tagMYLIKE&language=en").'" class="link1">MY LIKES</a></div>';}
                echo'<div class="hot">';if($HotStr=='RUSSIANSTYLE')echo'<b>RUSSIAN STYLE</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagRUSSIANSTYLE&language=en").'" class="link1">RUSSIAN STYLE</a>';
                echo'</div><div class="hot">';if($HotStr=='cobaltnet')echo'<b>COBALT NET</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagcobaltnet&language=en").'" class="link1">COBALT NET</a>';
                echo'</div><div class="hot">';if($HotStr=='nega')echo'<b>NEGA</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagnega&language=en").'" class="link1">NEGA</a>';
                echo'</div><div class="hot">';if($HotStr=='zamoscow')echo'<b>ZAMOSKVORECHYE</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagzamoscow&language=en").'" class="link1">ZAMOSKVORECHYE</a>';
                echo'</div><div class="hot">';if($HotStr=='nephrit')echo'<b>NEPHRITE BACKGROUND</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagnephrit&language=en").'" class="link1">NEPHRITE BACKGROUND</a>';
                echo'</div><div class="hot">';if($HotStr=='WHITE')echo'<b>WHITE PORCELAIN</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagWHITE&language=en").'" class="link1">WHITE PORCELAIN</a>';
                echo'</div><div class="hot">';if($HotStr=='project')echo'<b>IPM PROJECTS</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagproject&language=en").'" class="link1">IPM PROJECTS</a>';
                echo'</div>';
                $FLOWERS="FLOWERS";
                $LITERATURE="LITERATURE";
                $THEATRE="THEATRE";
                $PETER="SAINT PETERSBURG";
                $MOSCOW="MOSCOW";
                $WEDDING="WEDDING";
                $HAPPYBD="HAPPY BIRTHDAY";
                $NEWYEAR="HAPPY NEW YEAR";
                $VALENTINE="SAINT VALENTINE'S DAY";
                $MASL="MASLENITSA";
                $EASTER="HAPPY EASTER";
                $VICTORY="VICTORY'S DAY";
                $FEB23="MILITARY PORCELAIN";
                $MART8="8TH MARTH";
                $TEACHER="GIFT FOR TEACHER";
                $KIDS="FOR KIDS";
                $lang="&language=en";
                $THEME="THEMES";
            }
            else{
                echo'<b>САМОЕ ЛЮБИМОЕ</b></p>';
                if($CountOfMyLike>0){echo'<div class="hot">';
                    echo'<a href="'.aPSID("/index.php?search=tagMYLIKE").'" class="link1">МОИ ОТМЕТКИ НРАВИТСЯ</a></div>';}
                echo'<div class="hot">';if($HotStr=='RUSSIANSTYLE')echo'<b>РУССКИЙ СТИЛЬ</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagRUSSIANSTYLE").'" class="link1">РУССКИЙ СТИЛЬ</a>';
                echo'</div><div class="hot">';if($HotStr=='cobaltnet')echo'<b>КОБАЛЬТОВАЯ СЕТКА</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagcobaltnet").'" class="link1">КОБАЛЬТОВАЯ СЕТКА</a>';
                echo'</div><div class="hot">';if($HotStr=='nega')echo'<b>ВОРОБЬЕВСКИЙ</b>'; else
                    echo'<a href="'.aPSID("/?search=tagapicВоробьевский А.В.").'" class="link1">ВОРОБЬЕВСКИЙ</a>';
                echo'</div><div class="hot">';if($HotStr=='zamoscow')echo'<b>ЗАМОСКВОРЕЧЬЕ</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagzamoscow").'" class="link1">ЗАМОСКВОРЕЧЬЕ</a>';
                echo'</div><div class="hot">';if($HotStr=='nephrit')echo'<b>НЕФРИТОВЫЙ ФОН</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagnephrit").'" class="link1">НЕФРИТОВЫЙ ФОН</a>';
                echo'</div><div class="hot">';if($HotStr=='WHITE')echo'<b>БЕЛЫЙ ФАРФОР</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagWHITE").'" class="link1">БЕЛЫЙ ФАРФОР</a>';
                echo'</div><div class="hot">';if($HotStr=='project')echo'<b>ПРОЕКТЫ ИФЗ</b>'; else
                    echo'<a href="'.aPSID("/index.php?search=tagproject").'" class="link1">ПРОЕКТЫ ИФЗ</a>';
                echo'</div>';
                $FLOWERS="ЦВЕТЫ";
                $LITERATURE="ЛИТЕРАТУРА";
                $THEATRE="ТЕАТР";
                $PETER="САНКТ-ПЕТЕРБУРГ";
                $MOSCOW="МОСКВА";
                $WEDDING="СВАДЬБА";
                $HAPPYBD="ДЕНЬ РОЖДЕНИЯ";
                $NEWYEAR="НОВЫЙ ГОД";
                $VALENTINE="ДЕНЬ ВЛЮБЛЕННЫХ";
                $MASL="МАСЛЕНИЦА";
                $EASTER="ПАСХА";
                $VICTORY="ДЕНЬ ПОБЕДЫ";
                $FEB23="23 ФЕВРАЛЯ";
                $MART8="8 МАРТА";
                $TEACHER="ПОДАРОК УЧИТЕЛЮ";
                $KIDS="ДЕТЯМ";
                $lang="";
                $THEME="ТЕМЫ";
            }
            echo'</td></tr><tr><td height="0px" style="border-top: 1px #DDDDDD solid;BACKGROUND-COLOR: '.$bgColorOfBottom.';font-size:'.$sizebetweenfilters.'px;">&nbsp;</td></tr><tr><td align="left" style="PADDING:10px;border : none;VERTICAL-ALIGN:top ;BACKGROUND-COLOR: #FFFFFF;text-align: left;"><p style="padding-left:'.$shiftleftmenu.'px;padding-top:0px;margin-bottom:10px;font-size:15px;"><b>'.$THEME.'</b></p>';

            echo'<div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagFLOWERS$lang").'" class="link1">'.$FLOWERS.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagLITERATURE$lang").'" class="link1">'.$LITERATURE.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagTHEATRE$lang").'" class="link1">'.$THEATRE.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagPETER$lang").'" class="link1">'.$PETER.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagMOSCOW$lang").'" class="link1">'.$MOSCOW.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagWEDDING$lang").'" class="link1">'.$WEDDING.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagHAPPYBD$lang").'" class="link1">'.$HAPPYBD.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagNEWYEAR$lang").'" class="link1">'.$NEWYEAR.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagVALENTINE$lang").'" class="link1">'.$VALENTINE.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagMASL$lang").'" class="link1">'.$MASL.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagEASTER$lang").'" class="link1">'.$EASTER.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagVICTORY$lang").'" class="link1">'.$VICTORY.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagFEB23$lang").'" class="link1">'.$FEB23.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagMART8$lang").'" class="link1">'.$MART8.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagTEACHER$lang").'" class="link1">'.$TEACHER.'</a>';
            echo'</div><div class="hot">';
            echo'<a href="'.aPSID("/index.php?search=tagKIDS$lang").'" class="link1">'.$KIDS.'</a>';
            echo'</div>';
        }
        //===========================Все скрипты для фильтров, анимация ==================================

        echo"<script>";
        if($HotStr==''){
            echo "
		var menuFilterTip = document.getElementById('filtertip');
		var menuFilterPic = document.getElementById('filterpic');
		var menuFilterForm = document.getElementById('filterform');
		var menuFilterBrand = document.getElementById('filterbrand');
		
		if(menuFilterTip){
			var titleFilterTip = menuFilterTip.querySelector('.title');
			titleFilterTip.onclick = function() {menuFilterTip.classList.toggle('open');};
		}
		if(menuFilterPic){
			var titleFilterPic = menuFilterPic.querySelector('.title');
			titleFilterPic.onclick = function() {menuFilterPic.classList.toggle('open');};
		}
		if(menuFilterForm){
			var titleFilterForm = menuFilterForm.querySelector('.title');
			titleFilterForm.onclick = function() {menuFilterForm.classList.toggle('open');
			};
		}
		if(menuFilterBrand){
			var titleFilterBrand = menuFilterBrand.querySelector('.title');
			titleFilterBrand.onclick = function() {menuFilterBrand.classList.toggle('open');
			};
		}";
        }
        for($i=1; $i<=$ho; $i++){
            echo "var menu$i = document.getElementById('cat$i');
		if(menu$i){
			var titlem$i = menu$i.querySelector('.title');
			titlem$i.onclick = function() {menu$i.classList.toggle('open');};
		}";
        };
        echo "</script>";
        //=============================================================================================
        //=================нижнюю часть левого кадра страницы=========================================
        echo $kusokkoda1;

        //=================Если меню 5 пустое, то =======================================================
        //=================Если товар не выбран, то мы выводим каталог==================================
        $wwidth=strlen($Zagolovok)*9+25;
        echo '<table align="left" bgcolor="'.$bgColorOfBottom.'" width="100%" height="50px" cellspacing="0" cellpadding="0" border="0" style="padding-bottom:10px;"><tr><td style="padding-left:10px;padding-right:10px;width:'.$wwidth.'px;background-color:#'.$bclr.';FONT-SIZE:19px;color:#FFFFFF;text-align:center;"><img src="/empty.gif" width="'.$wwidth.'px" height="1px"><b>'.$Zagolovok.'</b></td><td  style="padding-right:10px;width:100%;background-color:#FFFFFF;text-align:right;">'.$sortpage.'</td></tr></table>';

        $arr = array("HotStr"=>$HotStr,"HotStr3"=>$HotStr3, "menuname2"=>$menuname2,"menuname3"=>$menuname3,"menuname4"=>$menuname4,"menuname5"=>$menuname5,"Filter"=>$Filter,"Sort"=>$Sort,"RightUslovie"=>$RightUslovie,"stroka_sort"=>$stroka_sort,"firstpage"=>$firstpage,"numberofpages"=>$numberofpages,"ShAll"=>$ShAll,"language"=>$language, "offset"=>0, "listingsRequestTotalItems"=>Settings::$listingsRequestTotalItems);
        echo "<div style='display: none;' id='catalogParametersDataContainer'>".json_encode($arr)."</div>";

        echo "<button type='button' id='getMoreListingButton'>Get more listings</button>";
        Logger::logMessage("LISTINGS START");
        $offset = 0;
        $catalogListingsGetter = new GetCatalogListings($catalog, $menuname2, $menuname3, $menuname4, $menuname5, $HotStr, $HotStr3, $Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language, $bgColorOfBottom, $offset, Settings::$listingsRequestTotalItems);
        echo $catalogListingsGetter->getListings();


        echo "</td></tr></table>";
        echo "</form>";
    }
}