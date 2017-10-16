<?php

class PerformanceUtil
{
    private static $startTime;

    public static function start(){
        self::$startTime = microtime(true);
    }
    public static function execute(){
        
    }
    public static function finish(){
        if(self::$startTime){
            return (microtime(true)-self::$startTime);
        }
        else{
            throw new Exception("PerformanceUtilException. No start time defined.");
        }
    }
}