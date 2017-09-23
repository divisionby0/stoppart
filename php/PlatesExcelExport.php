<?php
include_once("libs/PHPExcel-1.8/Classes/PHPExcel.php");
include_once ("libs/collections/ICollection.php");
include_once ("libs/collections/AbstractCollection.php");
include_once ("libs/collections/IndexedList.php");
include_once ("libs/collections/iterators/AbstractCollectionIterator.php");
include_once ("libs/collections/iterators/IndexedListIterator.php");
include_once ("div0/db/DBConnection.php");
include_once ("div0/db/selector/DBSelector.php");
include_once ("div0/db/selector/PlatesDBSelector.php");
include_once ("div0/db/selector/TestDbSelector.php");
include_once ("div0/Plate.php");

include_once ("div0/excel/ExportPlatesToExcel.php");

$baseUrl = 'http://'.$_SERVER['HTTP_HOST'];
echo '<div>'.$baseUrl.'</div>';

$platesSelector = new PlatesDBSelector();
$plates = $platesSelector->select();

$cost1 = 100; // 150 mm cost
$cost2 = 200; // 200 mm cost
$cost3 = 300; // 250 mm cost

if(!isset($plates) || !$plates){
    echo '<div>Empty results !!!</div>';
}
else{
    echo '<div>total:'.$plates->num_rows.'</div>';
    $collection = createCollection($plates);
    $exporter = new ExportPlatesToExcel($collection, $cost1, $cost2, $cost3);

    $exportedFile = $exporter->getFileUrl();
    $exportedFileUrl = $baseUrl.'/xls/'.$exportedFile;
    echo "<div>excel file: <a href='".$exportedFileUrl."'>".$exportedFileUrl."</a></div>";
}

function createCollection($plates){
    $collection = new IndexedList("plates");
    while($row = $plates->fetch_assoc()) {
        $link = "http://stoppart.com/shop/view".$row["ida"];
        $plate = new Plate($row["ida"], $row["name"], $row["image"], $row["imageFile"], $row["author"], $link);
        $collection->add($plate);
    }
    return $collection;
}


