<?php

class HotStrNotEmptySelectRequest
{
    private $requestString;
    public function __construct($HotStr, $ShAll, $offset, $numItems = 9)
    {
        $this->requestString = $HotStr;
        
        if($ShAll=="1") {
            $SQLZapros="AND grp=0 AND ((zakaz+sklad)>0) ORDER BY name";
        }
        else {
            $SQLZapros="AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad)>0) ORDER BY name";
        }
        if($HotStr=="RUSSIANSTYLE"){
            $this->requestString="SELECT * FROM tovsNew WHERE Rstyle='1'  $SQLZapros";
        }
        elseif($HotStr=="project"){
            $this->requestString="SELECT * FROM tovsNew WHERE TipAss='Проект'  $SQLZapros";
        }
        elseif($HotStr=="cobaltnet"){
            $this->requestString="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE (picture.english='Cobalt net' or picture.name='Кобальтовая сетка Модерн') $SQLZapros";
        }
        elseif($HotStr=="nega"){
            $this->requestString="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM form LEFT JOIN tovsNew ON form.id = tovsNew.Form WHERE form.name='Нега' $SQLZapros";
        }
        elseif($HotStr=="zamoscow"){
            $this->requestString="SELECT  tovsNew.Height,tovsNew.Capacity,tovsNew.Width,tovsNew.Diameter,tovsNew.name,ida, tovsNew.id,price1s,sklad,vid,Tip,picture,AutorPicture,form,TipOfMaterial,Factory,Imagefile, Person, Predmetov FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE picture.name='Замоскворечье' $SQLZapros";
        }
        elseif($HotStr=="newyear"){
            $this->requestString="SELECT * FROM tovsNew WHERE NY='1' $SQLZapros";
        }
        elseif($HotStr=="nephrit"){
            $this->requestString="SELECT * FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE (picture.name='Нефритовый фон' or  picture.name='Нефритовый фон 2') $SQLZapros";
        }
        $this->requestString.=" LIMIT ".$numItems." OFFSET ".$offset;
        $HotStr = $this->requestString;
    }

    public function getCurrentRequestString(){
        return $this->requestString;
    }
    
    public function create(){
        return sql($this->requestString);
    }
}