<?php

class StrokeSQLRequestBuilder
{
    public function __construct()
    {
    }

    public function createSimple($HotStr2,$page,$group,$Uslovie,$Filter,$Sort,$ShAll){
        if($Uslovie=="all") {
            $Uslovie="";
        }
        if($Filter!=""){
            $sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)';
            $qq=explode("|",$Filter);
            $num = count($qq);
            for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
            $Uslovie.=$sql_filter;
        }
        //==============вставка=================================по форме отбор==========================
        $a = array();
        $RightFormUslovie2='';
        $rurusi=sql("SELECT * FROM form"); $countrurus=mysqli_num_rows($rurusi);
        if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
        ksort ($a);
        foreach($a as $k => $t){
            if(isset($_POST["frm$t"]) and   $_POST["frm$t"] == 'yes'){
                if($RightUslovie2=='')$RightUslovie2.=" AND (form=$t"; else $RightUslovie2.=" OR form=$t"; }  };
        if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
        mysqli_free_result($rurusi);
        //==============вставка============================================================================
        //==============вставка=================================по производителю отбор====================
        $a = array();$RightUslovie2='';
        $rurusi=sql("SELECT * FROM brand"); $countrurus=mysqli_num_rows($rurusi);
        if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
        ksort ($a);
        foreach($a as $k => $t){
            if(isset($_POST["br$t"]) and   $_POST["br$t"] == 'yes'){
                if($RightUslovie2=='')$RightUslovie2.=" AND (Factory=$t"; else $RightUslovie2.=" OR Factory=$t"; }  };
        if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
        mysqli_free_result($rurusi);
        //==============вставка============================================================================
        //echo 'h'.$HotStr2;
        if($HotStr2==""){$SQLZapros=" (idg='$group' ";
            $query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
        }
        else{
            $sql_filter='grp=0';
            $qq=explode(" ",$HotStr2);
            $num = count($qq);
            for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
            $Uslovie.=$sql_filter;
            $query0=sql("SELECT id FROM tovsNew WHERE grp=1 AND $Uslovie ORDER BY name");
            $SQLZapros=" (";
        }
        $countquery1=mysqli_num_rows($query0);
        while($row = mysqli_fetch_array($query0)){
            $iddd=$row['id'];
            $SQLZapros=$SQLZapros." or idg ='$iddd'";
        };
        //$SQLZapros.=")AND grp=0 $Uslovie";
        if($ShAll=="1") $SQLZapros.=")AND grp=0 AND ((zakaz+sklad+grp)>0) $Uslovie";//post('ShowFoto')=='yes' or
        else $SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0) $Uslovie";
        //будем считать только условия! и их и возвращать, а уже саму строку Селекта добавлять не в функции, а в теле программы
        //if($HotStr=='')$query1=sql($SQLZapros);else $query1=sql($HotStr);*/
        mysqli_free_result($query0);
        return $SQLZapros;
    }

    public function createMat($HotStr,$page,$group,$Uslovie,$Filter,$Sort,$ShAll){
        $a = array();
        if($Uslovie=="all") {
            $Uslovie="";
        }
        if($Filter!=""){
            $sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)' ;
            $qq=explode("|",$Filter);
            $num = count($qq);
            for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
            $Uslovie.=$sql_filter;
        }
        //==============вставка=================================по картинке отбор==========================
        $a = array();
        $RightUslovie2='';
        $rurusi=sql("SELECT * FROM picture"); $countrurus=mysqli_num_rows($rurusi);
        if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
        ksort ($a);
        foreach($a as $k => $t){
            if(isset($_POST["pcx$t"]) and   $_POST["pcx$t"] == 'yes'){
                if($RightUslovie2=='')$RightUslovie2.=" AND (picture=$t"; else $RightUslovie2.=" OR picture=$t"; }  };
        if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
        mysqli_free_result($rurusi);
        //==============вставка============================================================================
        //==============вставка=================================по производителю отбор====================
        $a = array();
        $RightUslovie2='';
        $rurusi=sql("SELECT * FROM brand"); $countrurus=mysqli_num_rows($rurusi);
        if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
        ksort ($a);
        foreach($a as $k => $t){
            if(isset($_POST["br$t"]) and   $_POST["br$t"] == 'yes'){
                if($RightUslovie2=='')$RightUslovie2.=" AND (Factory=$t"; else $RightUslovie2.=" OR Factory=$t"; }  };
        if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
        mysqli_free_result($rurusi);
        //==============вставка============================================================================
        if($HotStr==""){$SQLZapros=" (idg='$group' ";
            $query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
        }
        else{
            $sql_filter='grp=0';
            $qq=explode(" ",$HotStr);
            $num = count($qq);
            for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
            $Uslovie.=$sql_filter;
            $query0=sql("SELECT id FROM tovsNew WHERE grp=1 AND $Uslovie ORDER BY name");
            $SQLZapros=" ($Uslovie ";
        }
        $countquery1=mysqli_num_rows($query0);
        while($row = mysqli_fetch_array($query0)){
            $iddd=$row['id'];
            $SQLZapros=$SQLZapros." or idg ='$iddd'";
        };
        //$SQLZapros.=")AND grp=0 $Uslovie";
        if($ShAll=="1") $SQLZapros.=")AND grp=0 AND ((zakaz+sklad+grp)>0) $Uslovie";//post('ShowFoto')=='yes'
        else $SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0) $Uslovie";
        //будем считать только условия! и их и возвращать, а уже саму строку Селекта добавлять не в функции, а в теле программы
        //if($HotStr=='')$query1=sql($SQLZapros);else $query1=sql($HotStr);*/
        mysqli_free_result($query0);
        return $SQLZapros;
    }
    public function createForm($HotStr,$page,$group,$Uslovie,$Filter,$Sort,$ShAll){
        $a = array();
        if($Uslovie=="all") $Uslovie="";
        if($Filter!=""){
            $sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)' ;
            $qq=explode("|",$Filter);
            $num = count($qq);
            for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
            $Uslovie.=$sql_filter;
        }
        //$bone='';
        //if(isset($_POST['TipBone']) and   $_POST['TipBone'] == 'yes') {$Uslovie.=' AND (TipOfMaterial=3 OR TipOfMaterial=4 OR TipOfMaterial=6)';}
        //==============вставка=================================по картинке отбор==========================
        $a = array();$RightUslovie2='';
        $rurusi=sql("SELECT * FROM picture"); $countrurus=mysqli_num_rows($rurusi);
        if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
        ksort ($a);
        foreach($a as $k => $t){
            if(isset($_POST["pcx$t"]) and   $_POST["pcx$t"] == 'yes'){
                if($RightUslovie2=='')$RightUslovie2.=" AND (picture=$t"; else $RightUslovie2.=" OR picture=$t"; }  };
        if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
        mysqli_free_result($rurusi);
        //==============вставка============================================================================
        //==============вставка=================================по производителю отбор====================
        $a = array();$RightUslovie2='';
        $rurusi=sql("SELECT * FROM brand"); $countrurus=mysqli_num_rows($rurusi);
        if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
        ksort ($a);
        foreach($a as $k => $t){
            if(isset($_POST["br$t"]) and   $_POST["br$t"] == 'yes'){
                if($RightUslovie2=='')$RightUslovie2.=" AND (Factory=$t"; else $RightUslovie2.=" OR Factory=$t"; }  };
        if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
        mysqli_free_result($rurusi);
        //==============вставка============================================================================
        if($HotStr==""){$SQLZapros=" (idg='$group' ";
            $query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
        }
        else{
            $sql_filter='grp=0';
            $qq=explode(" ",$HotStr);
            $num = count($qq);
            for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
            $Uslovie.=$sql_filter;
            $query0=sql("SELECT id FROM tovsNew WHERE grp=1 AND $Uslovie ORDER BY name");
            $SQLZapros=" ($Uslovie ";
        }
        $countquery1=mysqli_num_rows($query0);
        while($row = mysqli_fetch_array($query0)){
            $iddd=$row['id'];
            $SQLZapros=$SQLZapros." or idg ='$iddd'";
        };
        //$SQLZapros.=")AND grp=0 $Uslovie";
        if($ShAll=="1") $SQLZapros.=")AND grp=0 AND ((zakaz+sklad+grp)>0) $Uslovie";//post('ShowFoto')=='yes'
        else $SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0) $Uslovie";
        //будем считать только условия! и их и возвращать, а уже саму строку Селекта добавлять не в функции, а в теле программы
        //if($HotStr=='')$query1=sql($SQLZapros);else $query1=sql($HotStr);*/
        mysqli_free_result($query0);
        return $SQLZapros;
    }
    
    public function createBrand($HotStr,$page,$group,$Uslovie,$Filter,$Sort,$ShAll){
        $a = array();
        if($Uslovie=="all") {
            $Uslovie="";
        }
        if($Filter!=""){
            $sql_filter='HAVING 1=1 AND ((zakaz+sklad+grp)>0)';
            $qq=explode("|",$Filter);
            $num = count($qq);
            for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
            $Uslovie.=$sql_filter;
        }
        //==============вставка=================================по картинке отбор==========================
        $a = array();$RightUslovie2='';
        $rurusi=sql("SELECT * FROM picture"); $countrurus=mysqli_num_rows($rurusi);
        if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
        ksort ($a);
        foreach($a as $k => $t){
            if(isset($_POST["pcx$t"]) and   $_POST["pcx$t"] == 'yes'){
                if($RightUslovie2=='')$RightUslovie2.=" AND (picture=$t"; else $RightUslovie2.=" OR picture=$t"; }  };
        if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
        mysqli_free_result($rurusi);
        //==============вставка============================================================================
        //==============вставка=================================по форме отбор====================
        $a = array();$RightUslovie2='';
        $rurusi=sql("SELECT * FROM form"); $countrurus=mysqli_num_rows($rurusi);
        if($countrurus>0) while($roww=mysqli_fetch_array($rurusi)) if($roww['name']!='')$a+=array($roww['name']=> $roww['id']);
        ksort ($a);
        foreach($a as $k => $t){
            if(isset($_POST["frm$t"]) and   $_POST["frm$t"] == 'yes'){
                if($RightUslovie2=='')$RightUslovie2.=" AND (form=$t"; else $RightUslovie2.=" OR form=$t"; }  };
        if($RightUslovie2!='') $RightUslovie2.=")"; $Uslovie.=$RightUslovie2;
        mysqli_free_result($rurusi);
        //==============вставка============================================================================
        if($HotStr==""){$SQLZapros=" (idg='$group' ";
            $query0=sql("SELECT id FROM tovsNew WHERE idg='$group' AND grp=1 ");
        }
        else{
            $sql_filter='grp=0';
            $qq=explode(" ",$HotStr);
            $num = count($qq);
            for($i = 0; $i < $num; $i ++ ) $sql_filter.=' AND (name LIKE "%'.sqlp($qq[$i]).'%")';
            $Uslovie.=$sql_filter;
            $query0=sql("SELECT id FROM tovsNew WHERE grp=1 AND $Uslovie ORDER BY name");
            $SQLZapros=" ($Uslovie ";
        }
        $countquery1=mysqli_num_rows($query0);
        while($row = mysqli_fetch_array($query0)){
            $iddd=$row['id'];
            $SQLZapros=$SQLZapros." or idg ='$iddd'";
        };
        //$SQLZapros.=")AND grp=0 $Uslovie";
        if($ShAll=="1") $SQLZapros.=")AND grp=0 AND ((zakaz+sklad+grp)>0) $Uslovie";//post('ShowFoto')=='yes'
        else $SQLZapros.=")AND grp=0 AND Imagefile<>'/icons/noimage.jpg' AND ((zakaz+sklad+grp)>0) $Uslovie";
        //будем считать только условия! и их и возвращать, а уже саму строку Селекта добавлять не в функции, а в теле программы
        //if($HotStr=='')$query1=sql($SQLZapros);else $query1=sql($HotStr);*/
        mysqli_free_result($query0);
        return $SQLZapros;
    }
}