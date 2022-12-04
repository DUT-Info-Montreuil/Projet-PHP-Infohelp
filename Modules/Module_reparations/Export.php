<?php
class Export
{
    /**
     * Exporte le résultat de la recherche
     *
     * @param [type] $result
     * @return void
     */

     public function exportTraces($result)
    {
        /* Initialisation de l'excel */
        include_once 'application/third_party/PHPExcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        /* Titres des colonnes */
        $titres = array('Description', 'Quantité', 'Prix unitaire HT', 'Prix total HT');
        $alphabet = range("A", "Z");

        /* Remplit les colonnes des données */
        $i = 2;
        foreach ($result as $trace) {
            $objPHPExcel->getActiveSheet()->SetCellValue("A$i", "$trace->balpro");
            $objPHPExcel->getActiveSheet()->SetCellValue("B$i", "$trace->direction");
            $objPHPExcel->getActiveSheet()->SetCellValue("C$i", "$trace->date");
            $objPHPExcel->getActiveSheet()->SetCellValue("D$i", "$trace->log");
            $i++;
        }

        //Style
        $objPHPExcel->getActiveSheet()->getStyle("A1:Z1")->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle("A1:Z1")->getFont()->setSize(12);
        $objPHPExcel->getActiveSheet()->getStyle("A1:Z1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        for ($i = 0; $i < count($titres); $i++) {
            $objPHPExcel->getActiveSheet()->SetCellValue("$alphabet[$i]1", $titres[$i]);
            $objPHPExcel->getActiveSheet()->getColumnDimension("$alphabet[$i]")->setAutoSize(true);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header('Content-Disposition: attachment;filename="devis.xlsx"');
        $objWriter->save('php://output');
    }
}

?>