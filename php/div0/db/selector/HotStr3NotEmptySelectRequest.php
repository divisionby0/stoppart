<?php
class HotStr3NotEmptySelectRequest
{
    private $requestString;

    public function __construct($HotStr3, $offset, $numItems = 9)
    {
        $this->requestString = "";
        $SQLZapros="AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad)>0) ORDER BY name DESC";

        if($HotStr3=="newyear"){
            $this->requestString="SELECT * FROM tovsNew WHERE NY='1' $SQLZapros";
        }
        elseif($HotStr3=="cobaltnet"){
            $this->requestString="SELECT  * FROM picture LEFT JOIN tovsNew ON picture.id = tovsNew.Picture WHERE (picture.english='Cobalt net' or picture.name='Кобальтовая сетка Модерн') AND grp=0 AND ((zakaz+sklad)>0)  AND Imagefile<>'/icons/noimage.jpg' ORDER BY tovsNew.tip ";
        }
        elseif($HotStr3=="love"){
            $this->requestString="SELECT * FROM tovsNew WHERE InLove='1' $SQLZapros";
        }
        elseif($HotStr3=="easter"){
            $this->requestString="SELECT * FROM tovsNew WHERE Easter='1' $SQLZapros";
        }
        elseif($HotStr3=="russianstyle"){
            $this->requestString="SELECT * FROM tovsNew WHERE Rstyle='1' $SQLZapros";
        }

        $this->requestString.=" LIMIT ".$numItems." OFFSET ".$offset;
    }

    public function getCurrentRequestString(){
        return $this->requestString;
    }
    public function create(){
        return sql($this->requestString);
    }
}