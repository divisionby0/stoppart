<?php

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

include_once("libs/PHPExcel-1.8/Classes/PHPExcel.php");
include_once("div0/excel/ExportPlatesToExcel.php");

$excel = new ExportPlatesToExcel();
