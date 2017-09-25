<?php
require_once("box_func.php");

class SiteMenu
{
    private static $STOPPART_VERSION = "stoppart";
    private static $IFARFOR_VERSION = "ifarfor";
    public function __construct($data,$data2,$language,$searchline,$userid)
    {
        $menuVersion = whichshop3();

        if($menuVersion==self::$STOPPART_VERSION)	{
         echo '<div id="menuContainer" class="siteMenu">'; echo '<div id="normalSiteMenu" class="normalSiteMenu relativePositionMenu">';
         $this->createNormalMenu($data,$data2,$language,$searchline,$userid);  echo '</div>';
         echo '<div id="smallSiteMenu" class="smallSiteMenu relativePositionMenu" style="display: none;">';
         $this->createTipMenu($data,$data2,$language,$searchline,$userid);  echo '</div>';echo '</div>';			
		}
		if($menuVersion==self::$IFARFOR_VERSION) 	{
         echo '<div id="menuContainer" class="siteMenu">'; echo '<div id="normalSiteMenu" class="normalSiteMenu relativePositionMenu">';
         $this->createNormalMenuifarfor($data,$data2,$language,$searchline,$userid);  echo '</div>';
         echo '<div id="smallSiteMenu" class="smallSiteMenu relativePositionMenu" style="display: none;">';
         $this->createTipMenuifarfor($data,$data2,$language,$searchline,$userid);  echo '</div>';echo '</div>';			
		}
    }

  protected function createNormalMenuifarfor($data,$data2,$language,$searchline,$userid){
  	echo '<table align="center" bgcolor="#FFFFFF" width="100%" height="56px" cellspacing="0" cellpadding="0" border="0" style="vertical-align:top;padding-bottom:0px;"><tr>
         <td width="17%" height="1" style="padding-left:47px;"><img src="/empty.gif" width="150px" height="1px"></td>
         <td width="66%"><img src="/empty.gif" width="100px" height="1px"></td>
         <td width="17%" height="1" style="padding-right:47px;"><img src="/empty.gif" width="150px" height="1px"></td></tr>
         <tr><td class="top1">'.$data[0].'</td>
             <td align="center"><table align="center" bgcolor="#AD9E82" width="100%" height="100%" cellspacing="0" cellpadding="0" border="0"  style="padding-left:24px;padding-right:18px;"><tr>
                  <td class="top2">'.$data[1].'</td>
                  <td class="top3">'.$data[2].'</td>
                  <td class="top4">'.$data[3].'</td>
                  <td class="top5">'.$data[4].'</td>
                  <td class="top6">'.$data[5].'</td></tr>
             </table></td>
                  <td class="top7">'.$data[6].'</td>
                </tr></table>';
    }

  protected function createNormalMenu($data,$data2,$language,$searchline,$userid){
  	$LK=LK($userid,$language);
  	if($language=="en") {$langstr="/en";$placeholder=" Search";} else {$langstr="";$placeholder=" Поиск";}
  	echo '<FORM  name=search1 action="/" method=get><table align="center" bgcolor="#FFFFFF" width="100%" height="46px" cellspacing="0" cellpadding="0" border="0" style="vertical-align:top;padding-bottom:0px;">
         <tr><td class="tinstop0" style="height:35px;" width="14%">
         	<input type="text" style="min-width:150px;width:100%" name="search1" placeholder="'.$placeholder.'" value="'.$searchline.'" 
        	style="font-size: 14px;height:25px;display: block;width: 100%;background: #FFF;"></td>
		 <td onclick="search1.submit();" class="tinstop1"><img src="/icons/zoom.gif" width="14px" alt=">"></td>
         <td class="tinstop5"><a href="/shop/stoppard" style="FONT-SIZE:16px;color:#FFFFFF;" >ДЕКОРАТИВНЫЕ ТАРЕЛКИ</a></td>
         <td class="tinstop6"><a href="/shop/stoppard/holder" style="FONT-SIZE:16px;color:#FFFFFF;" >ПОДСТАВКИ</a></td>
         <td class="tinstop5"><a href="/dealer" style="FONT-SIZE:16px;color:#FFFFFF;" >УСЛОВИЯ СОТРУДНИЧЕСТВА</a></td>
         <td class="tinstop2"><a href="/price" style="FONT-SIZE:16px;color:#FFFFFF;" >СКАЧАТЬ ПРАЙС ЛИСТ</a></td>
         <td class="tinstop3">'.$LK.'</td>
         <td class="tinstop4">
         <a href="'.aPSID($langstr."/cabinet/basket/").'" target="_top" style="font-size:14px;font-weight: 300;">
         <div id="basketcontain" style="font-size:14px;font-weight:300;color:#000;vertical-align:middle;" >
         <img id="basketIcon" src="/icons/basket2.gif" style="vertical-align:top;" width="14px" alt=">"> <div class="totalBasketElements">0</div></div></a></td>
                </tr></table></FORM>';
    }
        
  protected function createTipMenu($data,$data2,$language,$searchline,$userid){
  	$LK=LK($userid,$language);
  	if($language=="en") {$langstr="/en";$placeholder=" Search";} else {$langstr="";$placeholder=" Поиск";}
  	echo '<FORM  name=search1 action="/" method=get><table align="center" bgcolor="#FFFFFF" width="100%" height="36px" cellspacing="0" cellpadding="0" border="0" style="vertical-align:top;padding-bottom:0px;">
         <tr><td class="tinstop0" style="height:35px;" width="14%">
         	<input type="text" style="min-width:150px;width:100%" name="search1" placeholder="'.$placeholder.'" value="'.$searchline.'" 
        	style="font-size: 14px;height:25px;display: block;width: 100%;background: #FFF;"></td>
		 <td onclick="search1.submit();" class="tinstop1"><img src="/icons/zoom.gif" width="14px" alt=">"></td>
         <td class="tinstop5"><a href="/shop/stoppard" style="FONT-SIZE:16px;color:#FFFFFF;" >ДЕКОРАТИВНЫЕ ТАРЕЛКИ</a></td>
         <td class="tinstop6"><a href="/shop/stoppard/holder" style="FONT-SIZE:16px;color:#FFFFFF;" >ПОДСТАВКИ</a></td>
         <td class="tinstop5"><a href="/dealer" style="FONT-SIZE:16px;color:#FFFFFF;" >УСЛОВИЯ СОТРУДНИЧЕСТВА</a></td>
         <td class="tinstop2"><a href="/price" style="FONT-SIZE:16px;color:#FFFFFF;" >СКАЧАТЬ ПРАЙС ЛИСТ</a></td>
         <td class="tinstop3">'.$LK.'</td>
         <td class="tinstop4">
         <a href="'.aPSID($langstr."/cabinet/basket/").'" target="_top" style="font-size:14px;font-weight: 300;">
         <div id="basketcontain" style="font-size:14px;font-weight:300;color:#000;vertical-align:middle;" >
         <img id="basketIcon" src="/icons/basket2.gif" style="vertical-align:top;" width="14px" alt=">"> <div class="totalBasketElements">0</div></div></a></td>
                </tr></table></FORM>';
    }
      protected function createTipMenuifarfor($data,$data2,$language,$searchline,$userid){
  	$LK=LK($userid,$language);
  	if($language=="en") {$langstr="/en";$placeholder=" Search";} else {$langstr="";$placeholder=" Поиск";}
  	echo '<FORM  name=search1 action="/" method=get><table align="center" bgcolor="#FFFFFF" width="100%" height="36px" cellspacing="0" cellpadding="0" border="0" style="vertical-align:top;padding-bottom:0px;">
         <tr><td class="tintop0" style="height:35px;" width="14%">
         	<input type="text" style="min-width:150px;" name="search1" placeholder="'.$placeholder.'" value="'.$searchline.'" 
        	style="font-size: 14px;height:25px;display: block;width: 100%;background: #FFF;"></td>
		 <td onclick="search1.submit();" class="tintop1"><img src="/icons/zoom.gif" width="14px" alt=">"></td>
         <td class="tintop2"><a href="'.$data2[0][0].'" style="FONT-SIZE:16px;color:#FFFFFF;" >'.$data2[0][1].'</a></td>
         <td class="tintop3"><a href="'.$data2[1][0].'" style="FONT-SIZE:16px;color:#FFFFFF;" >'.$data2[1][1].'</a></td>
         <td class="tintop4"><a href="'.$data2[2][0].'" style="FONT-SIZE:16px;color:#FFFFFF;" >'.$data2[2][1].'</a></td>
         <td class="tintop5"><a href="'.$data2[3][0].'" style="FONT-SIZE:16px;color:#FFFFFF;" >'.$data2[3][1].'</a></td>'.
        //<td class="tintop5"><a href="'.$data2[4][0].'" style="FONT-SIZE:14px;color:#FFFFFF;" >'.$data2[4][1].'</a></td>
        '<td class="tintop6"><a href="'.$data2[5][0].'" style="FONT-SIZE:16px;color:#FFFFFF;" >'.$data2[5][1].'</a></td>
         <td class="tintop7"><a href="'.$data2[6][0].'" style="FONT-SIZE:16px;color:#FFFFFF;" >'.$data2[6][1].'</a></td>
         <td class="tintop8">'.$LK.'</td>
         <td class="tintop9">
          <a href="'.aPSID($langstr."/cabinet/basket/").'" target="_top" style="font-size:14px;font-weight: 300;">
         <div id="basketcontain" style="font-size:14px;font-weight:300;color:#000;vertical-align:middle;" >
         <img id="basketIcon" src="/icons/basket2.gif" style="vertical-align:top;" width="14px" alt=">"> <div class="totalBasketElements">0</div></div></a></td>
                </tr></table></FORM>';
    }
}