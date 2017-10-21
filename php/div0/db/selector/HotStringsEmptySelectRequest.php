<?php

class HotStringsEmptySelectRequest
{
    private $requestString;
    public function __construct($Filter, $Uslovie, $RightUslovie, $Sort, $page, $group, $ShAll, $offset, $numItems = 9)
    {
        $this->requestString = "";
        if($Filter!=""){
            $sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)'; $qq=explode("|",$Filter); $num = count($qq);
            for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';$Uslovie.=$sql_filter;}
        $Uslovie.=$RightUslovie." ORDER BY ";
        
        switch($Sort){
            case "n":
                $Uslovie.="name";
                break;
            case "-n":
                $Uslovie.="name DESC";
                break;
            case "p":
                $Uslovie.="price1s";
                break;
            case "-p":
                $Uslovie.="price1s DESC";
                break;
            default:
                $Uslovie.="name";
                break;
        }

        if($page=='stoppard') {
            $Diameter200="  and zakaz='1' ";
        } else {
            $Diameter200='AND ((zakaz+sklad)>0)';
        }

        $this->requestString="SELECT * FROM tovsNew WHERE (idg='$group' ";
        
        $query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");

        $countquery1=mysqli_num_rows($query0);

        while($row = mysqli_fetch_array($query0)) {
            $iddd=$row['id'];
            $this->requestString = $this->requestString." or idg ='$iddd'";
        }

        if($ShAll==1)
        {
            $this->requestString.=")AND grp=0 $Diameter200 $Uslovie";
        }
        else
        {
            $SQLZaprosTest=$this->requestString.")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' $Diameter200 $Uslovie";

            $query1=sql($SQLZaprosTest);

            $countquery1=mysqli_num_rows($query1);

            if($countquery1==0){
                $this->requestString.=")AND grp=0 $Diameter200 $Uslovie";
            }
            else{
                $this->requestString.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' $Diameter200 $Uslovie";
            }
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