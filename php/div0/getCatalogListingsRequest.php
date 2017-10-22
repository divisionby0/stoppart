<?php

include_once "market/GetCatalogListings.php";
include_once "db/selector/HotStr3NotEmptySelectRequest.php";
include_once "db/selector/HotStringsEmptySelectRequest.php";
include_once "db/selector/HotStrNotEmptySelectRequest.php";
include_once "db/selector/CatalogListingsItemFrontName.php";
include_once "db/selector/CatalogListingsItemBottomName.php";
include_once "utils/Logger.php";
include_once "../../sql.php";
include_once "../../box_func.php";
include_once "../../Catalog.php";

$menuname2 = $_GET["menuname2"];
$menuname3 = $_GET["menuname3"];
$menuname4 = $_GET["menuname4"];
$menuname5 = $_GET["menuname5"];
$HotStr = $_GET["HotStr"];
$HotStr3 = $_GET["HotStr3"];
$Filter = $_GET["Filter"];
$Sort = $_GET["Sort"];
$RightUslovie = $_GET["RightUslovie"];
$stroka_sort = $_GET["stroka_sort"];
$firstpage = $_GET["firstpage"];
$numberofpages = $_GET["numberofpages"];
$ShAll = $_GET["ShAll"];
$language = $_GET["language"];
$bgColorOfBottom = $_GET["bgColorOfBottom"];
$offset = $_GET["offset"];
$listingsRequestTotalItems = $_GET["listingsRequestTotalItems"];
$userId = $_GET["userId"];

$catalog = new Catalog();

$catalogListingsGetter = new GetCatalogListings($catalog, $menuname2, $menuname3, $menuname4, $menuname5, $HotStr, $HotStr3, $Filter,$Sort,$RightUslovie,$stroka_sort,$firstpage,$numberofpages,$ShAll,$language, $bgColorOfBottom, $offset, $listingsRequestTotalItems, $userId);

echo $catalogListingsGetter->getListings(false);