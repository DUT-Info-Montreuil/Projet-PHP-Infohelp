<?php

        /* Initialisation de l'excel */
        include('../../PHPExcel/Classes/PHPExcel.php');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $prenom=$_POST['prenom_client'];
        $nom=$_POST['nom_client'];
        $email=$_POST['email_client'];
        $prix=$_POST['total_commande'];

        $i = 0;
        $objPHPExcel->getActiveSheet()->SetCellValue("B1", "Nom de société :");
        $objPHPExcel->getActiveSheet()->SetCellValue("B2", "Adresse : 140 Rue de la Nouvelle France, 93100 Montreuil");
        $objPHPExcel->getActiveSheet()->SetCellValue("B3", "Code postal, Ville :");
        $objPHPExcel->getActiveSheet()->SetCellValue("B4", "Facturer à : M.".$nom);
        $objPHPExcel->getActiveSheet()->SetCellValue("B5", "Adresse : ");
        $objPHPExcel->getActiveSheet()->SetCellValue("B7", "Objet de la facture:");
        $objPHPExcel->getActiveSheet()->SetCellValue("C1", "INFOHELP ");
        $objPHPExcel->getActiveSheet()->SetCellValue("C2", "Tél : 01 48 70 37 00");
        $objPHPExcel->getActiveSheet()->SetCellValue("C3", "Fax: ");
        $objPHPExcel->getActiveSheet()->SetCellValue("C4", "Téléphone: ");
        $objPHPExcel->getActiveSheet()->SetCellValue("C5", "Télécopie");
        $objPHPExcel->getActiveSheet()->SetCellValue("C6", "Email : $email");
        $objPHPExcel->getActiveSheet()->SetCellValue("D2", "Email: infohelp93100@gmail.com");
        $objPHPExcel->getActiveSheet()->SetCellValue("D3", "Site web : http://localhost/Projet-PHP-InfoHelp.com");
        $objPHPExcel->getActiveSheet()->SetCellValue("D4", "N° Facture :");
        $objPHPExcel->getActiveSheet()->SetCellValue("D5", "Date de facture: ");
        $objPHPExcel->getActiveSheet()->SetCellValue("B8", "Description :");
        $objPHPExcel->getActiveSheet()->SetCellValue("E8", "Remise : 0€");
        $objPHPExcel->getActiveSheet()->SetCellValue("E12", "Total HT de la facture  : $prix");
        $objPHPExcel->getActiveSheet()->SetCellValue("E13", "Net comercial :");
        $objPHPExcel->getActiveSheet()->SetCellValue("E14", "TVA(20%) :  ".$prix*1.2);
        $objPHPExcel->getActiveSheet()->SetCellValue("E15", "TOTAL (en €) :  ".$prix*1.2);


        // //Style
        $colone1;
        $objPHPExcel->getActiveSheet()->mergeCells($colone1 = 'C1:F1'); // fusion de colonnes
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getFont()->setSize(15);
        $objPHPExcel->getActiveSheet()->getStyle("B2:G15")->getFont()->setSize(10);
        $objPHPExcel->getActiveSheet()->getStyle("B2:F15")->getFill()->applyFromArray(array(
                'borders' => array(
                  'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                  )
                )

                // 'borders' => array(
                // 'allborders' => array(
                //     'style' => PHPExcel_Style_Border::BORDER_THICK
                // ))
            ));
        $objPHPExcel->getActiveSheet()->getStyle("B2:F3")->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                 'rgb' => '00d2e3'
            )
        )); // colorer cellules
        $objPHPExcel->getActiveSheet()->getStyle("B4:F15")->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array(
                 'rgb' => 'e8e8e8'
            )
        ));
        $objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // aligner texte au centre
        

       
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"');
        header('Content-Disposition: attachment;filename="devis.xlsx"');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
?>