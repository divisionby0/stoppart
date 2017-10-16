<?php

class SiteLocale
{

private $langstr;
    /*
$unlangstr
$tovarstr
$sortstr0
$sortstr2
$sortstr3
$ifstr
$logogif
$showallstr
$shownotallstr
$langaddstr
$MainLabel
$adrstr
$phonestr
$namestr
$searchstr
$LabelAlt
$Rollupalt
$ComeBackToSearch
$strbrname
$NotOnStock1
$FILTR
$nameof
$Typemat
$Typepic
$Typeform
$Typefac
    */
    
    public function updateData($language, $langstr, $unlangstr, $tovarstr, $sortstr0, $sortstr2, $sortstr3, $ifstr, $logogif, $showallstr, $shownotallstr, $langaddstr, $MainLabel, $adrstr, $phonestr, $namestr, $searchstr, $LabelAlt, $Rollupalt, $ComeBackToSearch, $strbrname, $NotOnStock1, $FILTR, $nameof, $Typemat, $Typepic, $Typeform, $Typefac){
        $this->langstr = $langstr;
        if($language == "en"){
            $this->langstr = "/en";
            $langstr = $this->langstr;
            $langstr="/en";
            $unlangstr="";
            $tovarstr="A new item has been added to your Shopping Cart.";
            $sortstr0="Sort by:";
            $sortstr2="Name";
            $sortstr3="Cost";
            $ifstr="or";
            $logogif="/ifarfor.gif";
            $showallstr="Show all";
            $shownotallstr="Only with photo";
            $langaddstr="?language=en";
            $MainLabel="Imperial porcelain. Official store.";
            $adrstr="Addresses and phones";
            $phonestr="<b>+7 927 268-15-33</b>";
            $namestr="Official store of Imperial Porcelain Manufacture. Russia.";
            $searchstr="search2en.box";
            $LabelAlt="IMPERIAL PORCELAIN";
            $Rollupalt="Roll up";
            $ComeBackToSearch="Come back to search results";
            $strbrname="Produced by";
            $NotOnStock1="<br>Unfortunately the goods with articul "; $NotOnStock2=" was ended.<br>You can order this product for manufacturing. <br>Manufacturing time from one to three months.<br>To create an order for this product, you should write a request in free form to e-mail";
            $FILTR="FILTERS";
            $nameof="english";
            $Typemat="Kind of material";
            $Typepic="Picture";
            $Typeform="Shape";
            $Typefac="Factory";
        }
        else{
            $langstr="";
            $unlangstr="/en";
            $tovarstr="Товар успешно добавлен в корзину.";
            $sortstr0="Сортировать по:";
            $sortstr2="Названию";
            $sortstr3="Цене";
            $ifstr="или";
            $showallstr="Показывать всё";
            $shownotallstr="Только с фотографией";
            $logogif="/logo_ifarfor.gif";
            $MainLabel="Императорский фарфор. Официальный магазин АО «ИФЗ».";
            $adrstr="Адреса и телефоны";
            $phonestr='<b title="Бесплатный звонок по России. C 9:00 до 18:00 MSK">8 (800) 2222-850 </b>';
            $namestr="Фирменные магазины АО «ИФЗ».";
            $searchstr="search2.box";
            $LabelAlt="ИМПЕРАТОРСКИЙ ФАРФОР";
            $Rollupalt="Прокрутить вверх";
            $ComeBackToSearch="Вернуться к результатам поиска";
            $strbrname="Производство";
            $NotOnStock1="<br>К сожалению товар с артикулом "; $NotOnStock2="закончился.<br> Вы можете заказать этот товар для изготовления на производстве. <br>Срок изготовления от одного до трёх месяцев. <br>Для создания заказа на этот товар можно обратиться по телефону: <br>8 (800) 2222-850 c 09:00 до 18:00 по Московскому времени.";
            $FILTR="ФИЛЬТРЫ";
            $nameof="name";
            $Typemat="Тип материала";
            $Typepic="Рисунок";
            $Typeform="Форма";
            $Typefac="Производитель";
        }
    }
}