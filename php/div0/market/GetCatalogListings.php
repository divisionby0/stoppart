<?php

class GetCatalogListings
{
    private $catalog;
    private $menuname2;
    private $menuname3;
    private $menuname4;
    private $menuname5;
    private $HotStr;
    private $HotStr3;
    private $Filter;
    private $Sort;
    private $RightUslovie;
    private $stroka_sort;
    private $firstpage;
    private $numberofpages;
    private $ShAll;
    private $language;
    private $bgColorOfBottom;
    private $offset;
    private $listingsRequestTotalItems;
    private $userId;
    
    public function __construct(Catalog $catalog, $menuname2, $menuname3, $menuname4, $menuname5, $HotStr, $HotStr3, $Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language, $bgColorOfBottom, $offset, $listingsRequestTotalItems, $userId)
    {
        $this->catalog = $catalog;
        $this->menuname2 = $menuname2;
        $this->menuname3 = $menuname3;
        $this->menuname4 = $menuname4;
        $this->menuname5 = $menuname5;
        $this->HotStr = $HotStr;
        $this->HotStr3 = $HotStr3;
        $this->Filter = $Filter;
        $this->Sort = $Sort;
        $this->RightUslovie = $RightUslovie;
        $this->stroka_sort = $stroka_sort;
        $this->firstpage = $firstpage;
        $this->numberofpages = $numberofpages;
        $this->ShAll = $ShAll;
        $this->language = $language;
        $this->bgColorOfBottom = $bgColorOfBottom;
        $this->offset = $offset;
        $this->listingsRequestTotalItems = $listingsRequestTotalItems;
        $this->userId = $userId;
    }
    
    public function getListings($useContainer = true){
        if($useContainer){
            $resultHtml = '<table id="catalogListings" align="center" bgcolor="'.$this->bgColorOfBottom.'" width="100%" height="660px" cellspacing="0" cellpadding="0" border="0"><tr>';
        }
        else{
            $resultHtml = '';
        }

        if($this->menuname4=='stoppard' or $this->menuname3=='stoppard' or $this->menuname2=='stoppard'){
            $this->menuname5='stoppard';
        }

        
        if($this->menuname4==''){
            if($this->menuname3==''){
                if($this->menuname2==''){
                    $a='';
                }
                else {
                    $a=$this->catalog->getData($this->HotStr, $this->HotStr3, $this->menuname5, $this->menuname2, "all", $this->Filter, $this->Sort, $this->RightUslovie, $this->stroka_sort,$this->firstpage,$this->numberofpages,$this->ShAll,$this->language, $this->offset, $this->listingsRequestTotalItems, $this->userId );
                }
            }
            else{
                $a=$this->catalog->getData($this->HotStr, $this->HotStr3, $this->menuname5, $this->menuname3, "all", $this->Filter, $this->Sort, $this->RightUslovie, $this->stroka_sort,$this->firstpage,$this->numberofpages,$this->ShAll,$this->language, $this->offset, $this->listingsRequestTotalItems, $this->userId );
            }
        }
        else{
            $a=$this->catalog->getData($this->HotStr, $this->HotStr3, $this->menuname5, $this->menuname4, "all", $this->Filter, $this->Sort, $this->RightUslovie, $this->stroka_sort,$this->firstpage,$this->numberofpages,$this->ShAll,$this->language, $this->offset, $this->listingsRequestTotalItems, $this->userId );
        }

        $resultHtml.=$a;

        
        if($useContainer){
            $resultHtml.="</tr></table>";
        }

        echo $resultHtml;
    }
}