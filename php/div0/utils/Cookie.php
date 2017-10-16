<?php

class Cookie
{
    public static function setSearchString($searchString){
        setcookie('searchString', $searchString, time()+3600);
    }
    public static function clearSearchString(){
        self::clearCookie("searchString");
    }

    public static function getSearchString(){
        return $_COOKIE["searchString"];
    }


    private static function clearCookie($cookieName){
        if (isset($_COOKIE[$cookieName])) {
            unset($_COOKIE[$cookieName]);
            unset($_COOKIE[$cookieName]);
            setcookie($cookieName, null, -1, '/');
            return true;
        } else {
            return false;
        }
    }
}