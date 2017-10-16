<?php

class MenuParser
{
    public static function parseActiveMenu($menuname2){
        switch($menuname2){
            case "create":
            case "order":
            case "signin":
                return 10;
                break;
            case "basket":
                return 7;
                break;
            case "edit":
                return 4;
                break;
            case "reset":
                return 5;
                break;
            case "logout":
                return 6;
                break;
            case "pay":
                return 8;
                break;
            case "worked":
                return 2;
                break;
            case "archive":
                return 3;
                break;
            case "adminwork":
                return 11;
                break;
            default:
                return 0;
        }
    }
}