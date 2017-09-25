<?php

class ExportPlatesToExcel
{
    private $excel;
    private $collection;

    private $fileUrl;

    private $cost1 = 1;
    private $cost2 = 1;
    private $cost3 = 1;

    public function __construct(IndexedList $collection, $cost1, $cost2, $cost3)
    {
        $this->collection = $collection;
        $this->cost1 = $cost1;
        $this->cost2 = $cost2;
        $this->cost3 = $cost3;

        $this->excel = new PHPExcel();
        $this->setProperties();
        $this->createHeader();
        
        $this->createRows();
        $this->setSumValue();

        $this->save();
    }
    
    public function getFileUrl(){
        return $this->fileUrl;
    }

    private function createRows(){
        $counter = 2;
        $collectionIterator = $this->collection->getIterator();
        while($collectionIterator->hasNext()){
            $plate = $collectionIterator->next();
            $this->createItemRow($plate, $counter);
            $counter++;
        }
    }

    private function createItemRow(Plate $item, $counter){
        $article = $item->getArticle();
        $label = $item->getLabel();
        $imageUrl = $item->getImage();
        $author = $item->getAuthor();
        $imageLabel = $item->getImageLabel();
        $link = $item->getLink();

        $this->addImage($counter, "..".$imageUrl,$imageLabel,$imageLabel);
        $this->excel->getActiveSheet()->getRowDimension($counter)->setRowHeight(140);

        $this->excel->getActiveSheet()->setCellValue('B'.$counter, $article);

        $this->excel->getActiveSheet()->setCellValue('C'.$counter, $label);
        $this->excel->getActiveSheet()->getRowDimension($counter)->setRowHeight(140);
        $this->excel->getActiveSheet()->getStyle('C'.$counter)->getAlignment()->setWrapText(true);

        $this->excel->getActiveSheet()->setCellValue('D'.$counter, $author);
        $this->excel->getActiveSheet()->setCellValue('E'.$counter, $imageLabel);
        $this->excel->getActiveSheet()->setCellValue('F'.$counter, "Asortiment");

        $this->excel->getActiveSheet()->setCellValue('G'.$counter, "0");
        $this->excel->getActiveSheet()->setCellValue('H'.$counter, "0");
        $this->excel->getActiveSheet()->setCellValue('I'.$counter, "0");

        $sumString = '=SUM(G'.$counter.'*'.$this->cost1.',H'.$counter.'*'.$this->cost2.',I'.$counter.'*'.$this->cost3.')';

        $this->excel->getActiveSheet()
            ->setCellValue(
                'J'.$counter,
                $sumString
            );

        $this->excel->getActiveSheet()->setCellValue('K'.$counter, $link);
        $this->excel->getActiveSheet()->getCell("K".$counter)->getHyperlink()->setUrl($link);

        $this->excel->getActiveSheet()->freezePane("A1");
    }

    private function setSumValue(){
        $finalRowId = $this->collection->size()+1;
        $sumString='=SUM(J2:J'.$finalRowId.')';

        $this->excel->getActiveSheet()
            ->setCellValue(
                'M1',
                $sumString
            );
    }

    private function addImage($rowNumber, $imageLink, $name, $description){
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName($name);
        $objDrawing->setDescription($description);
        //$objDrawing->setPath("../icons/00175.jpg");
        $objDrawing->setPath($imageLink);
        $objDrawing->setResizeProportional(true);
        $objDrawing->setWidth(180);
        $objDrawing->setHeight(180);
        $objDrawing->setCoordinates('A'.$rowNumber);
        $objDrawing->setWorksheet($this->excel->getActiveSheet());
    }

    private function setProperties(){
        $this->excel->getProperties()->setCreator("Ilya Vasilyev")
            ->setLastModifiedBy("Ilya Vasilyev")
            ->setTitle("Plates price")
            ->setSubject("")
            ->setDescription("")
            ->setKeywords("")
            ->setCategory("Plates price");

        $this->setColumnWidth();
    }

    private function setColumnWidth(){
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(38);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(9);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(22);

        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(14);

        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(14);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(11);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(11);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(11);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(11);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(11);
    }

    private function createHeader(){
        $this->excel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Изображение')
            ->setCellValue('B1', 'Артикул')

            ->setCellValue('C1', 'Наименование')
            ->setCellValue('D1', 'Автор рисунка')
            ->setCellValue('E1', 'Рисунок')

            ->setCellValue('F1', 'Ассортимент')
            ->setCellValue('G1', 'Заказ 150мм')
            ->setCellValue('H1', 'Заказ 200мм')
            ->setCellValue('I1', 'Заказ 260мм')

            ->setCellValue('J1', 'Итого (опт)')
            ->setCellValue('K1', 'Ссылка на сайт')
            ->setCellValue('L1', 'Сумма');


        $this->excel->setActiveSheetIndex(0)->getStyle('A1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('B1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('C1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('D1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('E1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('F1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('G1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('H1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('I1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('J1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('K1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('L1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
        $this->excel->setActiveSheetIndex(0)->getStyle('M1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'ffff99')
                )
            )
        );
    }

    private function save(){

        $this->excel->getActiveSheet()->setTitle('Декоративные тарелки Stoppart');
        $this->excel->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $objWriter->save(str_replace(__FILE__,'../xls/plates.xlsx',__FILE__));

        $this->fileUrl = "plates.xlsx";
    }
}