<?php

class SiteMenu
{
    public function __construct($data)
    {
        echo '<div id="menuContainer" class="siteMenu">';
        $this->createNormalMenuContainerPrefix();
        $this->createNormalMenuMenuContent($data);
        $this->createNormalMenuContainerPostfix();


        $this->createExtendedMenuContainerPrefix();
        $this->createExtendedMenuMenuContent();
        $this->createExtendedMenuContainerPostfix();
        echo '</div>';
    }

    protected function createNormalMenuMenuContent($data){
        echo '<table style="height: 100%;" cellspacing="0" cellpadding="0" border="0"><tr>
                <td width="17%" height="1" style="padding-left:47px;"><img src="/empty.gif" width="150px" height="1px"></td>
                    <td width="66%"><img src="/empty.gif" width="100px" height="1px"></td>
                    <td width="17%" height="1" style="padding-right:47px;"><img src="/empty.gif" width="150px" height="1px"></td>
                </tr>
                <tr>
                    <td class="top1">'.$data[0].'</td>
                    <td align="center">
                        <table align="center" bgcolor="#AD9E82" width="100%" height="100%" cellspacing="0" cellpadding="0" border="0"  style="padding-left:24px;padding-right:18px;">
                            <tr>
                                <td class="top2">'.$data[1].'</td>
                                <td class="top3">'.$data[2].'</td>
                                <td class="top4">'.$data[3].'</td>
                                <td class="top5">'.$data[4].'</td>
                                <td class="top6">'.$data[5].'</a></td>
                            </tr>
                        </table>
                    </td>
                    <td class="top7">'.$data[6].'</a></td>
                </tr></table>';
    }

    private function createNormalMenuContainerPrefix(){
        echo '<div id="normalSiteMenu" class="normalSiteMenu relativePositionMenu">';
    }
    private function createNormalMenuContainerPostfix(){
        echo '</div>';
    }
    
    private function createExtendedMenuContainerPrefix(){
        echo '<div id="smallSiteMenu" class="smallSiteMenu relativePositionMenu" style="display: none;">';
    }
    private function createExtendedMenuContainerPostfix(){
        echo '</div>';
    }
    private function createExtendedMenuMenuContent(){
        echo '<div class="smallSiteMenuItem smallSiteMenuSearchContainer">
            <div id="searchInputLabel">Поиск</div>
            <?php echo parse("search1.box","@searchline=$searchline@left="); ?>
        </div>

        <div class="smallSiteMenuItem"><div class="smallSiteMenuItemVerticalCenteredContent"><a href="#">ДЕКОРАТИВНЫЕ ТАРЕЛКИ</a></div></div>
        <div class="smallSiteMenuItem"><div class="smallSiteMenuItemVerticalCenteredContent"><a href="#">ПОДСТАВКИ</a></div></div>
        <div class="smallSiteMenuItem"><div class="smallSiteMenuItemVerticalCenteredContent"><a href="#">УСЛОВИЯ СОТРУДНИЧЕСТВА</a></div></div>
        <div class="smallSiteMenuItem"><div class="smallSiteMenuItemVerticalCenteredContent"><a href="#">СКАЧАТЬ ПРАЙС ЛИСТ</a></div></div>
        <div class="smallSiteMenuItem smallSiteMenuAuthContainer"><div class="smallSiteMenuItemVerticalCenteredContent"><a href="#">Вход/Регистрация</a></div></div>
        <div class="smallSiteMenuItem smallSiteMenuTrashContainer">
            <a class="basketIcon" href="#"></a>
            <div id="totalBasketItems">3</div>
        </div>';
    }
}