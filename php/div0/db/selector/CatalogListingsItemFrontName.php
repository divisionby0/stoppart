<?php
class CatalogListingsItemFrontName
{
    private $brandid;
    private $rowname;
    private $vid;
    private $tip;
    private $picture;
    private $form;
    private $TipOfMaterial;
    private $Person;
    private $Predmetov;
    private $AutorPicture;
    private $Height;
    private $Capacity;
    private $Diameter;
    private $Width;
    private $engtip;
    private $engvid;
    private $language;
    
    public function __construct($brandid, $rowname, $vid, $tip, $picture, $form, $TipOfMaterial, $Person, $Predmetov, $AutorPicture, $Height, $Capacity, $Diameter, $Width, $engtip, $engvid, $language)
    {
        $this->rowname = $rowname;
        $this->vid = $vid;
        $this->tip = $tip;
        $this->picture = $picture;
        $this->form = $form;
        $this->TipOfMaterial = $TipOfMaterial;
        $this->Person = $Person;
        $this->Predmetov = $Predmetov;
        $this->AutorPicture = $AutorPicture;
        $this->Height = $Height;
        $this->Capacity = $Capacity;
        $this->Diameter = $Diameter;
        $this->Width = $Width;
        $this->engtip = $engtip;
        $this->engvid = $engvid;
        $this->language = $language;
    }
    
    public function getData(){
        $PPPers='';
        $requestString = "";

        if($this->language!="en"){
            $this->language = "ru";
        }

        $DiameterAliases = array("ru"=>"Диаметр","en"=>"Diameter");
        $mmAliases = array("ru"=>" мм. ","en"=>" mm. ");
        $mlAliases = array("ru"=>" мл. ","en"=>" ml. ");
        $formAliases = array("ru"=>"Форма","en"=>"Form");
        $heightAliases = array("ru"=>"Высота","en"=>"Height");

        if($this->Person!='0' and $this->Person!='' and $this->Person!='1'  and $this->Predmetov!='0' and $this->Predmetov!='1' and $this->Predmetov!=''){
            $PPPers=$this->Person."/".$this->Predmetov.' ';
        }

        if($this->language=="en")
        {
            $row=mysqli_fetch_array(sql("SELECT * FROM picture where id='$this->picture'"));
            $picturename=$row['english'];

            if($picturename=="") {
                $picturename=$row['name'];
            }

            $row=mysqli_fetch_array(sql("SELECT * FROM form where id='$this->form'"));
            $formname=$row['english'];

            if($formname==""){
                $formname=$row['name'];
            }

            $row=mysqli_fetch_array(sql("SELECT * FROM brand where id='$this->brandid'"));
            $brand=$row['name'];

            $row=mysqli_fetch_array(sql("SELECT * FROM material where id='$this->TipOfMaterial'"));
            $TipOfMaterialname=$row['english'];

            if($TipOfMaterialname==""){
                $TipOfMaterialname=$row['name'];
            }
            $row=mysqli_fetch_array(sql("SELECT * FROM creator where id='$this->AutorPicture'"));
            $AutorPictureName=$row['english'];
        }
        else
        {
            $requestString = 'SELECT (SELECT name FROM picture WHERE  id = '.$this->picture.') AS picture,(SELECT name FROM form WHERE  id = '.$this->form.') AS form, (SELECT name FROM material WHERE id='.$this->TipOfMaterial.') as material,(SELECT name FROM creator WHERE id='.$this->AutorPicture.') AS creator';
            $row=mysqli_fetch_array(sql($requestString));
            
            $picturename=$row["picture"];
            $formname=$row["form"];
            $TipOfMaterialname=$row["material"];
            $AutorPictureName=$row["creator"];
        }

        $Diam = $DiameterAliases[$this->language];
        $MM = $mmAliases[$this->language];
        $ML = $mlAliases[$this->language];
        $formen = $formAliases[$this->language];
        $highen = $heightAliases[$this->language];


        /////////////////////////Добавка про размеры///////////////////////////////
        $AddSize='';
        if ($this->vid=="Бокал с бл.с крышкой") {
            $this->vid="Бокал с блюдцем и крышкой";
        }
        if ($this->vid=="Комплект детский в чемода") {
            $this->vid="Комплект детский четырёхпредметный в чемоданчике.";
        }
        if ($this->tip=="трёхпредметный в чемоданч"){
            $this->tip="трёхпредметный в чемоданчике";
        }
        if ($this->vid=="Чашка с блюдцем" and $this->tip=="чайн.") {
            $this->tip="чайная";
        }
        if ($this->vid=="Чашка с блюдцем и крышкой" and $this->tip=="чайн.") {
            $this->tip="чайная";
        }
        if ($this->vid=="Чашка с блюдцем" and $this->tip=="кофейн.") {
            $this->tip="кофейная";
        }
        if ($this->vid=="Подарочный набор" and $this->tip=="кофейн.") {
            $this->tip="кофейный";
        }
        if ($this->vid=="Блюдо" and $this->Diameter!='' and $this->Diameter!='0'){
            $AddSize=$this->Diameter.$MM;
        }
        elseif ($this->vid=="Блюдо" and $this->Width!='' and $this->Width!='0'){
            $AddSize=$this->Width.$MM;
        }
        elseif ($this->vid=="Ваза" and $this->Height!='' and $this->Height!='0'){
            $AddSize=$this->Height.$MM;
        }
        elseif ($this->vid=="Фоторамка" and $this->Height!='' and $this->Height!='0' and $this->Width!='0'){
            $AddSize="$this->Height x $this->Width$MM";
        }
        elseif ($this->vid=="Шкатулка" and $this->Diameter!='' and $this->Diameter!='0' and $this->Width!='0' and $this->Height!='0'){
            $AddSize="$this->Diameter x $this->Width x $this->Height$MM";
        }
        elseif (($this->vid=="Чашка с блюдцем" or $this->vid=="Чайник" or $this->vid=="Кофейник" or $this->vid=="Подарочный набор" or $this->vid=="Бокал" or $this->vid=="Бокал с блюдцем и крышкой" or $this->vid=="Бокал с блюдцем" or $this->vid=="Кружка" or $this->vid=="Чашка" or $this->vid=="Сахарница" or $this->vid=="Комплект" or $this->vid=="Сливочник" or $this->vid=="Чашка с блюдцем и крышкой")and $this->Capacity!='' and $this->Capacity!='0'){
            $AddSize=$this->Capacity.$ML;
        }
        if ($this->vid=="Скульптура" and $this->Height!='' and $this->Height!='0'){
            $AddSize="$highen $this->Height$MM";
        }
        if ($this->vid=="Елочная игрушка" and $this->Height!='' and $this->Height!='0'){
            $AddSize="$highen $this->Height$MM";
        }
        if ($this->vid=="Ёлочная игрушка" and $this->Height!='' and $this->Height!='0'){
            $AddSize="$highen $this->Height$MM";
        }

        ///////////////////////////////////////////////////////////////////////////
        if($this->language=="en")
        {
            $vidtip="$this->engvid $this->engtip";

            if($this->vidtip=="Set Table") {
                $vidtip="Table Set";
            }
            elseif ($this->vidtip=="Set Tea") {
                $vidtip="Tea Set";
            }
            elseif ($this->vidtip=="Set Coffee") {
                $vidtip="Coffee Set";
            }
            else {
                $vidtip="$this->engvid $this->engtip";}
        }
        else {
            $this->vidtip="$this->vid $this->tip";
        }
        if($this->tip=='декор.' and $this->vid=="Тарелка") {
            $this->vid="Декоративная тарелка";
            $this->tip='';
        }
        if($this->tip=='декор.' and $this->vid=="Подарочный набор") {
            $vidtip="Подарочный набор";
        }

        $returnData = array("Diam"=>$Diam,"Diameter"=>$this->Diameter, "ML"=>$ML, "MM"=>$MM, "highen"=>$highen, "rowname"=>$this->rowname, "vidtip"=>$vidtip, "vid"=>$this->vid, "formen"=>$formen, "formname"=>$formname, "PPPers"=>$PPPers, "picturename"=>$picturename, "AddSize"=>$AddSize, "TipOfMaterialname"=>$TipOfMaterialname, "AutorPictureName"=>$AutorPictureName);

        return $returnData;
    }
}