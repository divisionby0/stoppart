<?php

class Catalog
{
    public function __construct()
    {

    }

    public function getData($HotStr,$HotStr3, $page,$group,$Uslovie,$Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language, $offset, $listingsRequestTotalItems, $userId){

        if($Uslovie=="all") {
            $Uslovie="";
        }

        $pobeda=$_GET['pobeda'];

        if($language=="en"){
            $strbask="Add to basket";
        }else{
            $strbask="в корзину";
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
            $item = array("link"=>null,"image"=>null,"topData"=>null,"bottomData"=>null);
            $rowname=$row[$rownamelang];
            $Nnewprice=$row['price1s'];

            //$Nnewprice=$Nnewprice;

            $ts=floor($Nnewprice/1000);
            $ed=$Nnewprice-($ts*1000);

            if($ts=='0'){
                $ts="";
            }
            else{
                if($ed<10){
                    $ed='00'.$ed;
                }
                elseif($ed<100){
                    $ed='0'.$ed;
                }
            }

            $newprice1=$ts." ".$ed;

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

            $Height=$row['Height'];
            $Capacity=$row['Capacity'];
            $Diameter=$row['Diameter'];
            $Width=$row['Width'];
            $TipOfMaterial=$row['TipOfMaterial'];
            $Person=$row['Person'];
            $Predmetov=$row['Predmetov'];
            $AutorPicture=$row['AutorPicture'];

            $catalogListingsItemFrontName = new CatalogListingsItemFrontName($brandid, $rowname, $vid, $tip, $picture, $form, $TipOfMaterial, $Person, $Predmetov, $AutorPicture, $Height, $Capacity, $Diameter, $Width, $engtip, $engvid, $language);
            $frontname = $catalogListingsItemFrontName->getData();
            $catalogListingsItemBottomName = new CatalogListingsItemBottomName($brandid, $language, $id, $userId);
            $bottomname = $catalogListingsItemBottomName->getData();

            $item["id"] = $id;
            $item["price"] = $newprice1;
            $item["link"] = aPSID("$stroka_sort/view$realname");
            $item["image"]="";
            $item["topData"] = $frontname;
            $item["bottomData"] = $bottomname;
            $item["img"] = $perem;
            $item["height"] = $Height;
            $item["Diameter"] = $Diameter;
            
            $item["shopId"] = "shop".$id;
            $item["strbaskLinkText"] = $strbask;
            $item["strbaskLinkUrl"] = aPSID("/set.php?oper=add_tov&tov_id=$id&language=$language");

            array_push($items, $item);
        }
        return json_encode($items);
    }
}