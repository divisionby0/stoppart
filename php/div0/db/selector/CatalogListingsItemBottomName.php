<?php

class CatalogListingsItemBottomName
{
    private $brandid;
    private $price;
    private $language;
    private $itemId;
    private $userId;
    public function __construct($brandid, $language, $itemId, $userId)
    {
        $this->brandid = $brandid;
        $this->language = $language;
        $this->itemId = $itemId;
        $this->userId = $userId;
    }
    
    public function getData(){
        $row=mysqli_fetch_array(sql("SELECT * FROM brand where id='$this->brandid'"));
        
        $strana=$row['Strana'];
        $name=$row['name'];

        if($this->language=="en")
        {
            $strbrname="Produced by";
            if($strana=="Россия") {
                $strana="Russia";
            } elseif($strana=="Китай") {
                $strana="China";
            }
        }
        else
        {
            $strbrname="Производство";
        }
        $proizv="";

        if($name=='Императорский фарфоровый завод') {
            if($this->language=="en"){
                $name='Imperial Porcelain Manufacture.';
            }
            else {
                $name='АО "ИФЗ"';
            }
        }
        else {
            $name='';
        }
        if(($strana=='') and ($name=='')) {
            $proizv="";
        }
        elseif($name==''){
            $proizv=$strbrname.":". $strana;
        }
        else {
            $proizv=$strbrname.":". $name. $strana;
        }
        $proizv=$name.$strana;

        $countQuantStr = -1;
        if($this->language!="en"){
            $this->itemId="Ru".$this->itemId;
        }

        $selectLikeRequestString = "SELECT * FROM likeengine WHERE id='".$this->itemId."' and userid='".$this->userId."'";
        
        if(isset($this->itemId) && isset($this->userId)){
            $likeValueRequest = sql($selectLikeRequestString);
            $countQuantStr = mysqli_num_rows($likeValueRequest);
        }
        $dataArray = array("country"=>$strana,"strbrname"=>$strbrname,"name"=>$name,"likeValue"=>$countQuantStr);
        //$dataArray = array("country"=>null,"strbrname"=>null,"name"=>null,"price"=>null,"likeValue"=>null);

        return json_encode($dataArray);
    }
}