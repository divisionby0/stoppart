<?php

class UrlUtils
{
    public static function parse($url){
        $protocolRestData = explode("://", $url);
        $parameters = explode("/", $protocolRestData[1]);
        array_shift($parameters);
        return $parameters;
        //var_dump($parameters);
    }
}