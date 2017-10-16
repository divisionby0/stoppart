<?php


class ProductView
{
    public function __construct($view, $search, $language, $langstr, $ComeBackToSearch,$NotOnStock1, $NotOnStock2)
    {
        $stroka='';
        if($search!='')  {
            $stroka='<a href="'.aPSID($langstr.'/search').'" title="'.$ComeBackToSearch.'">'.$ComeBackToSearch.'</a>';
        }
        echo '<table id="someTable" align="center" bgcolor="#FFFFFF" width="100%" cellspacing="0" cellpadding="0" border="0" style="vertical-align:top;padding-left:70px;padding-right:70px;"><tr><td width="60%" height="37"style="text-align:left;">'.$stroka.'</td><td width="40%" style="text-align:left;padding-left:10px;">&nbsp;</td></tr>';

        $query1=sql("SELECT * FROM tovsNew WHERE ida='$view'");
        $row = mysqli_fetch_array($query1);
        //////////////////////заглушка для пустого превью
        if(mysqli_num_rows($query1)>0){
            $rowname=str_replace ("/","-", $row['name']);
            $rowname=str_replace (","," ", $rowname);
            $rowname=str_replace ("  "," ", $rowname);
            $rowArtikul=$row['ida'];
            $rowRealID=	$row['id'];
            $rowSklad=	$row['sklad'];
            $rowCollection=$row['Collection'];
            $rowPerson=$row['Person'];
            $rowPredmetov=$row['Predmetov'];
            if($language=="en"){
                $roww=mysqli_fetch_array(sql("SELECT * FROM picture WHERE id='".$row['Picture']."'"));$rowPictureR=$roww['name'];$rowPicture=$roww['english'];if($rowPicture=="") $rowPicture=$roww['name'];
                $roww=mysqli_fetch_array(sql("SELECT * FROM form WHERE id='".$row['Form']."'"));$rowFormR=$roww['name'];$rowForm=$roww['english'];if($rowForm=="") $rowForm=$roww['name'];
                $roww=mysqli_fetch_array(sql("SELECT * FROM material WHERE id='".$row['TipOfMaterial']."'"));$rowTipOfMaterial=$roww['english'];if($rowTipOfMaterial=="") $rowTipOfMaterial=$roww['name'];
                $roww=mysqli_fetch_array(sql("SELECT * FROM creator WHERE id='".$row['AutorForm']."'"));
                $rowAutorForm=$roww['english'];
                $roww=mysqli_fetch_array(sql("SELECT * FROM creator WHERE id='".$row['AutorPicture']."'"));
                $rowAutorPicture=$roww['english'];
                $roww=mysqli_fetch_array(sql("SELECT * FROM tovsNew LEFT JOIN brand ON brand.id = tovsNew.Factory WHERE tovsNew.ida='$view'"));
                $rowFactory=$roww['name'];$strana=$roww['Strana'];
                if($language=="en"){if($strana=="Россия") $strana="Russia"; elseif($strana=="Китай") $strana="China";}
                $proizv="";
                if($rowFactory=='Императорский фарфоровый завод'){ if($language=="en")$rowFactory='Imperial Porcelain Manufacture.';else $rowFactory='АО "ИФЗ"'; }
                else $rowFactory='';
                if($rowFactory!='')$rowFactory="$rowFactory, $strana";
                elseif($strana!='')$rowFactory="$strana";
                $addlang='&language=en';
                $Formstr="Form";$Picstr="Picture";$Afstr="Sculptor";$Apstr="Artist";$Prstr="Produced by";$Artstr="Articul";$Pricestr="Cost";$Addbstr="Add to basket";
                $Shirstr="Width";$Shirstr2="Lenght";$Shirstr3="Height";$Shirstr4="Capacity";$Shirstr5="Available";
                $NotOnStock="Not on stock. For order call +7(800)2222-850 or write to order2@ifarfor.ru.";
                $Diametr="Diameter";
                $Shirstr5="Stock balance";$textDiameterSaucer='Diameter of the saucer';$textWidthCup='Top diameter of the cup';
                $SugarCap='Capacity of the sugarbowl';$CupHeight='Height of the cup';$CupCap='Capacity of the cup';$PodCap='Capacity of the teapot';
                $scrollup="Scroll up";$Sostav="Composed";$SostavKomp="Kit contents";$Teapot="Teapot";$ML="ml";$ST="PC";$Coffeepod="Coffee-pot";
                $Sugar="Sugar bowl";$Cup="Cup";$Saucer="Saucer";$PLATEDESSERT="Plate dessert";$Creamer="Creamer";$VaseJam="Vase for jam";
                $VaseFlower="Vase for flowers";$Breadbowl="Bread bowl";$Vase="Vase for candy";$VaseCandy="Vase for candy";$PlateGl="Deep plate";
                $PlatePl="Flat plate";$SalatBig="Large salad bowl";$SalatSmall="Small salad bowl";$DishOval="Oval dish";$Pepper="Pepper-pot";
                $High="Height";$Salt="Salt cellar";$Piala="Piala";$Sousnik="Sauceboat";$Supnica="Tureen";$DishPryam="Rectangular dish";
                $DishCircle="Round dish";$DishSous="Sauce dish";$Rings="Ring for napkins";$MM="MM";
                $Blin="Stand for pancakes";$PlateBlin="Plate for pancakes";$ForSmetana="Vase for cream/jam";
                $Spoon1="Dining table spoon";$Fork1="Dining table fork";$Knife1="Dining table knife";$Spoon2="Dessert spoon";$Fork2="Dessert fork";
                $Shipzy="Sugar tongs";
                $Spoon3="Serving spoon";$Fork3="Serving fork";$Spoon4="Cake slice";$Spoon5="Sauce spoon";$Spoon6="Ladle";
                $textDiameter1='Height of big teapot';$textWidth1='Capacity of the teapot';$textHeight1='Height of the teapot';$textCapacity1='Capacity of big teapot';
                $textDiameter2='Diameter of the saucer';$textWidth2='Diameter of dessert plate';$textHeight2='Height of the cup';$textCapacity2='Capacity of the cup';
            }
            else{
                $roww=mysqli_fetch_array(sql("SELECT name FROM picture WHERE id='".$row['Picture']."'"));
                $rowPicture=$roww['name'];$rowPictureR=$rowPicture;
                $roww=mysqli_fetch_array(sql("SELECT name FROM form WHERE id='".$row['Form']."'"));
                $rowForm=$roww['name'];$rowFormR=$rowForm;
                $roww=mysqli_fetch_array(sql("SELECT name FROM material WHERE id='".$row['TipOfMaterial']."'"));
                $rowTipOfMaterial=$roww['name'];
                $roww=mysqli_fetch_array(sql("SELECT name FROM creator WHERE id='".$row['AutorForm']."'"));
                $rowAutorForm=$roww['name'];
                $roww=mysqli_fetch_array(sql("SELECT name FROM creator WHERE id='".$row['AutorPicture']."'"));
                $rowAutorPicture=$roww['name'];
                $roww=mysqli_fetch_array(sql("SELECT * FROM tovsNew LEFT JOIN brand ON brand.id = tovsNew.Factory WHERE tovsNew.ida='$view'"));
                $rowFactory=$roww['name'];$strana=$roww['Strana'];
                if($rowFactory=='Императорский фарфоровый завод') $rowFactory='ИФЗ';
                else $rowFactory='';
                if($rowFactory!='')$rowFactory="$rowFactory, $strana";
                elseif($strana!='')$rowFactory="$strana";
                $addlang='';
                $Formstr="Форма";$Picstr="Вид росписи";$Afstr="Автор формы";$Apstr="Автор росписи";$Prstr="Производитель";$Artstr="Артикул";$Pricestr="Цена";
                $Addbstr="Добавить в корзину";	$Shirstr="Ширина";$Shirstr2="Длина";$Shirstr3="Высота";$Shirstr4="Объем";$Diametr="Диаметр";
                $Shirstr5="ОСТАТКИ В МАГАЗИНАХ";$textDiameterSaucer='Диаметр блюдца';$textWidthCup='Диаметр верхнего края чашки';
                $SugarCap='Объем сахарницы';$CupHeight='Высота чашки';$CupCap='Объем чашки';$PodCap='Объем чайника';
                $NotOnStock="Нет в наличии. Цена при заказе может изменится. Для заказа звоните 8(800)2222-850.";
                $scrollup="Прокрутить вверх";$Sostav="Состав";$SostavKomp="Состав комплекта";$Teapot="Чайник";$ML="мл";$ST="шт";$Coffeepod="Кофейник";
                $Sugar="Сахарница";$Cup="Чашка";$Saucer="Блюдце";$PLATEDESSERT="Тарелка десертная";$Creamer="Сливочник";$VaseJam="Вазочка для варенья";
                $VaseFlower="Ваза для цветов";$Breadbowl="Сухарница";$Vase="Конфетница";$VaseCandy="Ваза для конфет";$PlateGl="Тарелка глубокая";
                $PlatePl="Тарелка плоская";$SalatBig="Салатник большой";$SalatSmall="Салатник малый";$DishOval="Блюдо овальное";$Pepper="Перечница";
                $High="Высота";$Salt="Солонка";$Piala="Пиала";$Sousnik="Соусник";$Supnica="Супница";$DishPryam="Блюдо прямоугольное";
                $DishCircle="Блюдо круглое";$DishSous="Блюдо под соусник";$Rings="Кольцо для салфеток";$MM="мм";
                $Blin="Блинница";$PlateBlin="Тарелка для блинов";$ForSmetana="Розетка для сметаны/варенья";
                $Spoon1="Ложка столовая";$Fork1="Вилка столовая";$Knife1="Нож столовый";$Spoon2="Ложка десертная";$Fork2="Вилка десертная";$Shipzy="Щипцы для сахара";
                $Spoon3="Сервировочная ложка";$Fork3="Сервировочная вилка";$Spoon4="Лопатка для торта";$Spoon5="Ложка для соуса";$Spoon6="Суповой половник";
                $textDiameter1='Высота доливного чайника';$textWidth1='Объём заварного чайника';$textHeight1='Высота заварного чайника';$textCapacity1='Объём доливного чайника';
                $textDiameter2='Диаметр блюдца';$textWidth2='Диаметр десертной тарелки';$textHeight2='Высота чашки';$textCapacity2='Объём чашки';$KRest1='Дорожка';$KRest2='Салфетка';
            }
            $rowVid=$row['Vid'];
            $rowTip=$row['Tip'];
            $engvid=$row['videnglish'];
            $engtip=$row['tipenglish'];
            $Height=$row['Height'];		$Capacity=$row['Capacity'];		$Diameter=$row['Diameter'];$Width=$row['Width'];
            $Nnewprice=$row['price1s'];
            $Nnewprice=$Nnewprice;
            $ts=floor($Nnewprice/1000);
            $ed=$Nnewprice-($ts*1000);
            if($ts=='0') $ts="";
            else{if($ed<10)$ed='00'.$ed;
            elseif($ed<100)$ed='0'.$ed;};
            $newprice1="$ts $ed ";
            $id_crop = substr($view, 2,5);
            $filename ="icons/".$id_crop."_resize.jpg";
            $filename2 ="icons/".$id_crop."_resize.JPG";
            $filename3 ="icons/".$id_crop.".jpg";
            $filename4 ="foto/".$view.".jpg";
            $fname ="";
            if(file_exists($filename4)){$perem="/".$filename4;$fname ="foto/".$view.".jpg";}
            elseif(file_exists($filename)){$perem="/".$filename;$fname ="images/".$id_crop."_resize.jpg";}
            elseif(file_exists($filename2)){$perem="/".$filename2;$fname ="images/".$id_crop."_resize.JPG";}
            elseif(file_exists($filename3)){$perem="/".$filename3;$fname ="images/".$id_crop.".jpg";}
            //elseif (file_exists($filename4)) {$perem="/".$filename4;$fname ="foto/".$view.".jpg";}
            else $perem="";
            if(file_exists($fname))$fname="/".$fname;
            else $fname=$perem;
            $PPPers='';
            if($rowPerson!='0' and $rowPerson!='' and $rowPerson!='1'  and $rowPredmetov!='0' and $rowPredmetov!='1' and $rowPredmetov!='') $PPPers=$rowPerson."/".$rowPredmetov.' ';
            $frontname=MakeFrontName($brandid,$rowname,$rowVid,$rowTip,$rowPicture,$rowForm,$rowTipOfMaterial,$rowPerson,$rowPredmetov,
                $rowAutorPicture,$Height,$Capacity,$Diameter,$Width,$engtip,$engvid,$language);
            /////////////
            if($rowVid=="Бокал с бл.с крышкой") $rowVid="Бокал с блюдцем и крышкой";
            if($rowVid=="Комплект детский в чемода") $rowVid="Комплект детский в чемоданчике.";
            if($rowTip=="трёхпредметный в чемоданч")$rowTip="трёхпредметный в чемоданчике";
            if($rowVid=="Чашка с блюдцем" and $rowTip=="чайн.") $rowTip="чайная";
            if($rowVid=="Чашка с блюдцем и крышкой" and $rowTip=="чайн.") $rowTip="чайная";
            if($rowVid=="Чашка с блюдцем" and $rowTip=="кофейн.") $rowTip="кофейная";
            if($rowVid=="Подарочный набор" and $rowTip=="кофейн.") $rowTip="кофейный";
            ///////////////
            if($language=="en"){
                $vidtip="$engvid $engtip";
                if($vidtip=="Set Table") $vidtip="Table Set";
                elseif($vidtip=="Set Tea") $vidtip="Tea Set";
                elseif($vidtip=="Set Coffee") $vidtip="Coffee Set";
                else $vidtip="$engvid $engtip";
            }
            else $vidtip="$rowVid $rowTip";
            if($rowVid!="Скульптура"){
                if($rowPicture=='' and $rowForm=='') $FirstName=my_strtoupper("<b>$rowname</b>");
                elseif($rowPicture=='') $FirstName=my_strtoupper("<b>$vidtip «$rowForm"."» $PPPers</b>");
                elseif($rowForm=='') $FirstName=my_strtoupper("<b>$vidtip «$rowPicture"."» $PPPers</b>");
                else $FirstName=my_strtoupper("<b>$vidtip «$rowPicture"."» $PPPers</b>")."</li><li>$Formstr: $rowForm";
            }
            else{
                if($rowPicture=='' and $rowForm=='') $FirstName=my_strtoupper("<b>$rowname</b>");
                elseif($rowForm=='') $FirstName=my_strtoupper("<b>$vidtip «$rowPicture"."» </b>");
                elseif($rowPicture=='') $FirstName=my_strtoupper("<b>$vidtip «$rowForm"."» </b>");
                else $FirstName=my_strtoupper("<b>$vidtip «$rowForm"."» </b>")."</li><li>$Picstr: $rowPicture.";
            }

            echo "<tr><td>";$fnamesub=substr($view, -1);
            if(file_exists('foto/'.$view.'.jpg')){
                echo "<img src='/foto/".$view.".jpg' width='100%'>";
            }
            elseif(file_exists("foto/".$view.'S.jpg')){
                echo "<img src='/foto/".$view."S.jpg' width='100%'>";}
            elseif(file_exists("foto/".$view.'B.jpg')){
                echo "<img src='/foto/".$view."B.jpg' width='100%'>";
            }
            elseif(file_exists("foto/".$fnamesub.'.jpg')){
                echo "<img src='/foto/".$fnamesub.".jpg' width='100%'>";
            }
            $indeed=2;
            $howmanytimes=0;
            while($indeed!=0){

                $filename5="foto/".$view."-".$indeed.".jpg";
                if(file_exists($filename5)){
                    $perem="/".$filename5;
                    echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
                    $indeed++;$howmanytimes++;
                }
                else {
                    $indeed=0;
                }
            }
            if($howmanytimes==0 and substr($view, -1)=='S' or substr($view, -1)=='B')
                while($indeed!=0){

                    $filename5="foto/".substr($view, 0, -1)."-".$indeed.".jpg";
                    if(file_exists($filename5)){
                        $perem="/".$filename5;
                        echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
                        $indeed++;$howmanytimes++;
                    }
                    else {
                        $indeed=0;
                    }
                }
            if($howmanytimes==0)
                while($indeed!=0){

                    $filename5="foto/".$view."B-".$indeed.".jpg";
                    if(file_exists($filename5)){
                        $perem="/".$filename5;
                        echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
                        $indeed++;$howmanytimes++;
                    }
                    else $indeed=0;
                }
            if($howmanytimes==0)
                while($indeed!=0){

                    $filename5="foto/".$view."S-".$indeed.".jpg";
                    if(file_exists($filename5)){
                        $perem="/".$filename5;
                        echo "<br><img src='$perem' width='100%' style='padding-top:0px;'>";
                        $indeed++;$howmanytimes++;
                    }
                    else $indeed=0;
                }
            echo "&nbsp;</td>";

            echo "<td style='FONT-SIZE: 18px;text-align: left;vertical-align:top;padding-left: 20px;'><ul style='padding:0;'><li style='FONT-SIZE: 18px;'>$FirstName</li>";
            if($rowVid!=""){
                echo"<li>$rowTipOfMaterial</li>";
            }
            //Ручная роспись
            if($rowAutorForm!="" and $rowAutorForm!='-'){
                echo"<li>$Afstr: $rowAutorForm</li>";
            }
            if($rowAutorPicture!="" and $rowAutorPicture!='-'){
                echo"<li>$Apstr: $rowAutorPicture</li>";
            }
            if($rowFactory!=""){
                echo"<li>$Prstr: $rowFactory</li>";
            }
            //Объем и размер
            $tagform='';
            if($rowForm!='' and $rowForm!='-'){
                $tagform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagform$rowFormR$addlang")."'>#$rowForm</a>&nbsp;&nbsp;";
            }
            $tagpic='';
            if($rowPicture!='' and $rowPicture!='-'){
                $tagpic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagpic$rowPictureR$addlang")."'>#$rowPicture</a>&nbsp;&nbsp;";
            }
            $tagaform='';
            if($rowAutorForm!='' and $rowAutorForm!='-'){
                $tagaform="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagaform$rowAutorForm$addlang")."'>#$rowAutorForm</a>&nbsp;&nbsp;";
            }
            $tagapic='';
            if($rowAutorPicture!='' and $rowAutorPicture!='-'){
                $tagapic="<a target='_self' style='color:#0000CC;TEXT-DECORATION: underline;' href='".aPSID("/index.php?search=tagapic$rowAutorPicture$addlang")."'>#$rowAutorPicture</a>&nbsp;&nbsp;";
            }
            echo"<li style='color:#333333;'>$Artstr: $rowArtikul</li>";
            echo"<li style='color:#333333;'>$tagform $tagpic $tagaform $tagapic</li>";
            echo"<HR>";
            echo "<li>$Pricestr: <b style='FONT-SIZE: 20px;'>$newprice1</b><img src='/img/rub-002.png' style='height:14px' alt='р.'>";
            //	echo"<HR>";
            if($rowSklad!=0) {
                echo'<a style="padding-left:40px;font-size:18px;font-weight:600;color:#0000CC;TEXT-DECORATION: underline;" href="'.aPSID('/set.php?oper=add_tov&tov_id='.$row['id']).'" id="ishop$id'.$row['id'].'" target="market" title="'.$Addbstr.'">'.$Addbstr.'</a></li>';
            }
            else {
                echo"</li><li>$NotOnStock</li>";
            }
            echo"<HR>";
            echo'<div id="scrollup"><img width="50px" alt="'.$scrollup.'";" src="/img/up.png"></div>';
            if($rowVid!='Сервиз'){
                $rowmemberID1=$row['memberID1'];
                if($rowmemberID1!=''){
                    $rommemberQuant1=$row['memberQuant1'];
                    $ruru=sql("SELECT * FROM tovsNew WHERE id='$rowmemberID1'");
                    $countruru=mysqli_num_rows($ruru);
                }
                if($countruru>0 and $rowmemberID1!=''){
                    $rowmem = mysqli_fetch_array($ruru);
                    $rowname=$rowmem['name'];
                    $rowVid=$rowmem['Vid'];
                    $rowTip=$rowmem['Tip'];
                    echo"<li style='color:#333333;'>$Sostav :</li><li>$rowVid $rowTip <b>$rommemberQuant1 $ST</b></li>";
                    $rowmemberID2=$row['memberID2'];
                    if($rowmemberID2!=''){
                        $rommemberQuant2=$row['memberQuant2'];
                        $rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID2'"));
                        $rowname=$rowmem['name'];
                        $rowVid=$rowmem['Vid'];
                        $rowTip=$rowmem['Tip'];
                        echo"<li>$rowVid $rowTip <b>$rommemberQuant2 $ST</b></li>";
                    }
                    $rowmemberID3=$row['memberID3'];
                    if($rowmemberID3!=''){
                        $rommemberQuant3=$row['memberQuant3'];
                        $rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID3'"));
                        $rowname=$rowmem['name'];
                        $rowname=str_replace ("1 2","1/2", $rowname);
                        $rowVid=$rowmem['Vid'];
                        $rowTip=$rowmem['Tip'];
                        echo"<li>$rowVid $rowTip <b>$rommemberQuant3 $ST</b></li>";
                    }
                    $rowmemberID4=$row['memberID4'];
                    if($rowmemberID4!=''){
                        $rommemberQuant4=$row['memberQuant4'];
                        $rowmem = mysqli_fetch_array(sql("SELECT * FROM tovsNew WHERE id='$rowmemberID4'"));
                        $rowname=$rowmem['name'];
                        $rowVid=$rowmem['Vid'];
                        $rowTip=$rowmem['Tip'];
                        echo"<li>$rowVid $rowTip <b>$rommemberQuant4 $ST</b></li>";
                    }
                }
            }
            $rowDiameter=$row['Diameter'];
            $rowWidth=$row['Width'];
            $rowHeight=$row['Height'];
            $rowCapacity=$row['Capacity'];
            $rowVid=$row['Vid'];
            $rowTip=$row['Tip'];
            $rowID=array();
            $rowID+=array($row['memberID1'].a=> $row['memberQuant1']);
            $rowID+=array($row['memberID2'].b=> $row['memberQuant2']);
            $rowID+=array($row['memberID3'].c=> $row['memberQuant3']);
            $rowID+=array($row['memberID4'].d=> $row['memberQuant4']);
            $rowID+=array($row['memberID5'].e=> $row['memberQuant5']);
            $rowID+=array($row['memberID6'].f=> $row['memberQuant6']);
            $rowID+=array($row['memberID7'].g=> $row['memberQuant7']);
            $rowID+=array($row['memberID8'].h=> $row['memberQuant8']);
            $rowID+=array($row['memberID9'].i=> $row['memberQuant9']);
            $rowID+=array($row['memberID10'].j=> $row['memberQuant10']);
            $rowID+=array($row['memberID11'].k=> $row['memberQuant11']);
            ksort ($rowID);
            if($rowVid=='Сервиз' or $rowVid=='Комплект детский' or ($rowVid=='Подарочный набор' and $rowTip=='для чая')){
                echo"<li><b>$SostavKomp:</b></li>";
                foreach($rowID as $kbr1 => $tbr){
                    $kbr=substr($kbr1, 0, -1);
                    $useheight=0;
                    if($tbr>0){
                        if($kbr=='C001051'){if($rowCapacity>'0')echo"<li>$Teapot $rowCapacity $ML: $tbr $ST.</li>"; else echo"<li>$Teapot: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C0010001'){if($rowCapacity>'0')echo"<li>$Coffeepod $rowCapacity $ML: $tbr $ST.</li>"; else echo"<li>$Coffeepod: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001052'){if($rowWidth>'0')echo"<li>$Sugar $rowWidth $ML: $tbr $ST.</li>"; else echo"<li>$Sugar: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001053'){
                            if($rowHeight>'0')echo"<li>$Cup $rowHeight $ML: $tbr $ST.</li>"; else echo"<li>$Cup: $tbr $ST.";echo"</li>";
                            if($rowDiameter>'0')echo"<li>$Saucer $rowDiameter $MM: $tbr $ST.</li>"; else echo"<li>$Saucer: $tbr $ST.";echo"</li>";
                        }
                        elseif($kbr=='C001054'){echo"<li>$Saucer: $tbr $ST</li>";}
                        elseif($kbr=='C001055'){echo"<li>$PLATEDESSERT: $tbr $ST</li>";}
                        elseif($kbr=='C001056'){echo"<li>$Creamer: $tbr $ST</li>";}
                        elseif($kbr=='C001057'){echo"<li>$VaseJam: $tbr $ST</li>";}
                        elseif($kbr=='C001058'){echo"<li>$VaseFlower: $tbr $ST</li>";}
                        elseif($kbr=='C001059'){echo"<li>$Breadbowl: $tbr $ST</li>";}
                        elseif($kbr=='C001060'){echo"<li>$VaseCandy: $tbr $ST</li>";}
                        elseif($kbr=='C001061'){echo"<li>$VaseCandy: $tbr $ST</li>";}
                        //столовый rowDiameter
                        elseif($kbr=='C001062'){if($rowWidth>'0')echo"<li>$PlateGl $rowWidth $MM: $tbr $ST.</li>"; else echo"<li>$PlateGl: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001063'){if($rowHeight>'0')echo"<li>$PlatePl $rowHeight $MM: $tbr $ST.</li>"; else echo"<li>$PlatePl: $tbr $ST.";echo"</li>";$rowHeight=$rowDiameter;}
                        elseif($kbr=='C001064'){if($tbr>10)echo"<li>$SalatBig ".$tbr."0 $ML: 1 $ST.</li>"; else echo"<li>$SalatBig: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001065'){if($rowCapacity>'0')echo"<li>$SalatSmall $rowCapacity $MM: $tbr $ST.</li>"; else echo"<li>$SalatSmall: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001066'){if($tbr>10)echo"<li>$DishOval ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$DishOval: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001067'){if($tbr>3)echo"<li>$Pepper ($Shirstr3 ".$tbr." $MM): 1 $ST.</li>"; else echo"<li>$Pepper: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001068'){if($tbr>3)echo"<li>$Salt ($Shirstr3 ".$tbr." $MM): 1 $ST.</li>"; else echo"<li>$Salt: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001069'){if($tbr>15)echo"<li>$Piala ".$tbr." $ML: 1 $ST.</li>"; else echo"<li>$Piala: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001070'){if($tbr>15)echo"<li>$Sousnik ".$tbr." $ML: 1 $ST.</li>"; else echo"<li>$Sousnik: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001071'){if($tbr>3)echo"<li>$Supnica ".$tbr."0 $ML: 1 $ST.</li>"; else echo"<li>$Supnica: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001072'){if($tbr>10)echo"<li>$DishPryam ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$DishPryam: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001073'){if($tbr>10)echo"<li>$DishCircle ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$DishCircle: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001074'){if($tbr>10)echo"<li>$DishSous ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$DishSous: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001092'){if($tbr>15)echo"<li>$Rings ".$tbr." $MM: 1 $ST.</li>"; else echo"<li>$Rings: $tbr $ST.";echo"</li>";}
                    }
                }
            }//	$Shirstr="Ширина";$Shirstr2="Длина";$Shirstr3="Высота";$Shirstr4="Объем";$Shirstr5="ОСТАТКИ В МАГАЗИНАХ";
            elseif($rowVid=='Набор' and $rowTip=='для блинов'){
                echo"<li><b>$SostavKomp:</b></li>";
                foreach($rowID as $kbr1 => $tbr){
                    $kbr=substr($kbr1, 0, -1);
                    $useheight=0;
                    if($tbr>0){
                        if($kbr=='C001071'){if($tbr>3)echo"<li>$Blin ".$tbr."0 $ML: 1 $ST.</li>"; else echo"<li>$Blin: $tbr $ST.";echo"</li>";}
                        elseif($kbr=='C001055'){echo"<li>$PlateBlin: $tbr $ST</li>";}
                        elseif($kbr=='C001057'){echo"<li>$ForSmetana: $tbr $ST</li>";}
                    }
                }
            }
            elseif($rowVid=='Набор' and $rowTip=='чайный'){
                echo"<li><b>$SostavKomp:</b></li>";
                foreach($rowID as $kbr1 => $tbr){
                    $kbr=substr($kbr1, 0, -1);
                    if($tbr>0){
                        if($kbr=='B00847'){echo"<li>$KRest1 $rowWidth $MM х $rowHeight $MM: $tbr $ST</li>";}
                        elseif($kbr=='C001060'){echo"<li>$KRest2 $rowDiameter $MM х $rowCapacity $MM: $tbr $ST</li>";}
                    }
                }
            }
            elseif($rowVid=='Набор столовых приборов'){
                echo"<li><b>$SostavKomp:</b></li>";
                foreach($rowID as $kbr1 => $tbr){
                    $kbr=substr($kbr1, 0, -1);
                    //			$useheight=0;
                    if($tbr>0){
                        if($kbr=='M0000394'){echo"<li>$Spoon1: $tbr $ST</li>";}
                        elseif($kbr=='M0000395'){echo"<li>$Fork1: $tbr $ST</li>";}
                        elseif($kbr=='M0000396'){echo"<li>$Knife1: $tbr $ST</li>";}
                        elseif($kbr=='M0000397'){echo"<li>$Spoon2: $tbr $ST</li>";}
                        elseif($kbr=='M0000398'){echo"<li>$Fork2: $tbr $ST</li>";}
                        elseif($kbr=='M0000399'){echo"<li>$Shipzy: $tbr $ST</li>";}
                        elseif($kbr=='M0000400'){echo"<li>$Spoon3: $tbr $ST</li>";}
                        elseif($kbr=='M0000401'){echo"<li>$Fork3: $tbr $ST</li>";}
                        elseif($kbr=='M0000402'){echo"<li>$Spoon4: $tbr $ST</li>";}
                        elseif($kbr=='M0000403'){echo"<li>$Spoon5: $tbr $ST</li>";}
                        elseif($kbr=='M0000404'){echo"<li>$Spoon6: $tbr $ST</li>";}
                        //			elseif($kbr=='М0000405'){echo"<li>Сервировочная вилка: $tbr $ST</li>";}
                    }
                }
            }
            elseif($rowVid=='Комплект чайников'){
                echo"<li>$textDiameter1: $rowDiameter $MM</li>";
                echo"<li>$textCapacity1: $rowCapacity $ML</li><br>";
                echo"<li>$textHeight1: $rowHeight $MM</li>";
                echo"<li>$textWidth1: $rowWidth $ML</li>";
            }
            elseif($rowVid=='Комплект' and $rowTip=='трехпредметный'){
                echo"<li>$textCapacity2: $rowCapacity $ML</li>";
                echo"<li>$textHeight2: $rowHeight $MM</li>";
                echo"<li>$textDiameter2: $rowDiameter $MM</li>";
                echo"<li>$textWidth2: $rowWidth $MM</li>";
            }
            else{
                if($rowDiameter!='' and $rowDiameter!='0'){
                    if($rowVid=='Чашка с блюдцем') $textDiameter=$textDiameterSaucer;
                    elseif($rowVid=='Шкатулка') $textDiameter=$Shirstr2;
                    //		elseif (($rowVid=='Сервиз') and ($rowTip=='чайный' or $rowTip=='кофейный')) $textDiameter='Диаметр блюдца';
                    else $textDiameter=$Diametr;
                }
                if($rowWidth!='' and $rowWidth!='0'){
                    $razmer=$MM;
                    if($rowVid=='Чашка с блюдцем') $textWidth=$textWidthCup; else $textWidth=$Shirstr;
                    if($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный'){$textWidth=$SugarCap; $razmer=$ML;}
                    echo"<li>$textWidth: $rowWidth $razmer</li>";
                }
                if($textWidth==$Shirstr and $textDiameter==$Diametr) $textDiameter=$Shirstr2;
                if($rowDiameter!='' and $rowDiameter!='0') echo"<li>$textDiameter: $rowDiameter $MM</li>";
                if($rowHeight!='' and $rowHeight!='0'){
                    $razmer=$MM;
                    if($rowVid=='Чашка с блюдцем') $textHeight=$CupHeight; else $textHeight=$Shirstr3;
                    if($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный'){$textHeight=$CupCap; $razmer=$ML;}
                    echo"<li>$textHeight: $rowHeight $razmer</li>";
                }
                if($rowCapacity!='' and $rowCapacity!='0'){
                    $textDiameter=$Shirstr4;
                    if($rowVid=='Сервиз') if($rowTip=='чайный' or $rowTip=='кофейный'){$textDiameter=$PodCap; $razmer=$ML;}
                    echo"<li>$textDiameter: $rowCapacity $ML</li>";
                }
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////Остатки в магазинах////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////
            echo QuantsInShop($rowRealID,1,$language);
            echo"</ul>";
            $fname="legend/$id_crop.txt";
            if(file_exists($fname)){$fname=$fname;	$legend=file_get_contents($fname);}
            else $legend='';
            echo"$legend";
        }//////////////////////конец заглушки на пустое превью
        else{echo '<div style="padding-left:40px;">'.$NotOnStock1.$view.$NotOnStock2.'</div>';
            //$query1=sql("SELECT * FROM tovsNewback WHERE ida='$view'");
            $query2=sql("SELECT * FROM tovsNew WHERE ida='$view'");

            if(mysqli_num_rows($query2)>0){
                $row = mysqli_fetch_array($query2);
                $rowVid=$row['Vid'];
                $roww=mysqli_fetch_array(sql("SELECT * FROM picture WHERE id='".$row['Picture']."'"));$rowPictureR=$roww['name'];
                $roww=mysqli_fetch_array(sql("SELECT * FROM form WHERE id='".$row['Form']."'"));$rowFormR=$roww['name'];
                echo $search->getHTML($rowVid.' '.$rowFormR);
            }
            elseif($view=='8122811001') echo $search->getHTML("Ландыш Дуэль");
            elseif($view=='8115701') echo $search->getHTML("Ландыш Да нет");
            elseif($view=='8119218001') echo $search->getHTML("Яблочко медальон");

            mysqli_free_result($query2);///
        }
        echo "</td>";
        echo '</tr></table>';
    }
}