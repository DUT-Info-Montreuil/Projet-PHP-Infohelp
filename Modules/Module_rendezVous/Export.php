<?php

        /* Initialisation de l'excel */
        require_once('C:/wamp64/www/Projet-PHP-Infohelp/PHPExcel/Classes/PHPExcel.php');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->SetCellValue("A1", "Nom");
        $objPHPExcel->getActiveSheet()->SetCellValue("A2", "Prenom");
        $objPHPExcel->getActiveSheet()->SetCellValue("A3", "Age");
        $objPHPExcel->getActiveSheet()->SetCellValue("B1", "Germana");
        $objPHPExcel->getActiveSheet()->SetCellValue("B2", "Geovany");
        $objPHPExcel->getActiveSheet()->SetCellValue("B3", "23");

        // //Style
        // $objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getFont()->setBold(true);
        // $objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getFont()->setSize(12);
        // $objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // for ($i = 0; $i < count($titres); $i++) {
        //     $objPHPExcel->getActiveSheet()->SetCellValue("$alphabet[$i]1", $titres[$i]);
        //     $objPHPExcel->getActiveSheet()->getColumnDimension("$alphabet[$i]")->setAutoSize(true);
        // }

       
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"');
        header('Content-Disposition: attachment;filename="devis.xlsx"');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
?>