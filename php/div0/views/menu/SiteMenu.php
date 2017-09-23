<?php


class SiteMenu
{
    public function __construct($data)
    {
        echo '<table id="menuContainer" class="normalSiteMenu relativePositionMenu" cellspacing="0" cellpadding="0" border="0">
                <tr><td width="17%" height="1" style="padding-left:47px;"><img src="/empty.gif" width="150px" height="1px"></td>
                <td width="66%"><img src="/empty.gif" width="100px" height="1px"></td>
                <td width="17%" height="1" style="padding-right:47px;"><img src="/empty.gif" width="150px" height="1px"></td></tr>
                <tr><td class="top1">'.$data[0].'</td>
                <td align="center">
                <table align="center" bgcolor="#AD9E82" width="100%" height="100%" cellspacing="0" cellpadding="0" border="0"  style="padding-left:24px;padding-right:18px;"><tr>
                <td class="top2" data-foo="data[1]">'.$data[1].'</td>
                <td class="top3">'.$data[2].'</td>
                <td class="top4">'.$data[3].'</td>
                <td class="top5">'.$data[4].'</td>
                <td class="top6">'.$data[5].'</a></td></tr></table></td>
                <td class="top7">'.$data[6].'</a></td>
                </tr></table>';
    }
}