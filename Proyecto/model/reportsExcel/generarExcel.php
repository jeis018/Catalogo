<?php

require_once ('../../config/DBOperator.php');
$db = new DBDriver(PDOConfig::getInstance());

require_once ('../../lib/PHPExcel.php');
require_once ('../../lib/PHPExcel/IOFactory.php');

require_once '../reports/ReportMail.php';


if (isset($_GET['id']) && isset($_GET['ac'])) {

    $id = $_GET['id'];
    $ac = $_GET['ac'];
    
    $query_header = 'call getBillHeader(?)';
    $header = $db->set($query_header, array($id))[0];

    $query_detail = 'call getBillDetail(?)';
    $detail = $db->set($query_detail, array($id));
    
    
    $directorio = '../reports/PlantillaOrden.xlsx';
    
    
    $readerExcel = PHPExcel_IOFactory::load($directorio);
        $readerExcel->getActiveSheet()->setCellValue('B2', $header['idPedido']);
        $readerExcel->getActiveSheet()->setCellValue('B3', $header['fechaSolicitud']);
        $readerExcel->getActiveSheet()->setCellValue('B6', $header['Nombres']);
        $readerExcel->getActiveSheet()->setCellValue('B7', $header['Telefono']);
        $readerExcel->getActiveSheet()->setCellValue('B8', $header['Direccion']);
        $readerExcel->getActiveSheet()->setCellValue('E6', $header['Cedula']);
        $readerExcel->getActiveSheet()->setCellValue('E7', $header['Celular']);
        $readerExcel->getActiveSheet()->setCellValue('E8', $header['Email']);

        $total = 0;
        $initialIndex = 11;
        foreach ($detail as $row) {
            $readerExcel->getActiveSheet()->setCellValue(('A' . $initialIndex), $row['Referencia']);
            $readerExcel->getActiveSheet()->setCellValue(('B' . $initialIndex), $row['Nombre']);
            $readerExcel->getActiveSheet()->setCellValue(('C' . $initialIndex), $row['CantidadProducto']);
            $readerExcel->getActiveSheet()->setCellValue(('D' . $initialIndex), $row['Precio']);
            $readerExcel->getActiveSheet()->setCellValue(('E' . $initialIndex), $row['PrecioTotalProducto']);
            $total += intval($row['PrecioTotalProducto']);
            $initialIndex++;
        }

        $initialIndex += 2;

        $readerExcel->getActiveSheet()->setCellValue(('E' . $initialIndex), $total);
        $readerExcel->getActiveSheet()->setCellValue(('A' . $initialIndex++), "TOTAL");

        $fileReport  = 'orden_'.date("dmY").$id;
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$fileReport.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($readerExcel, 'Excel2007');
        
        if($ac === 'D'){
            $objWriter->save('php://output');            
        }else{
            $objWriter->save('../emailOrders/'.$fileReport.'.xlsx');
            $mailReport = new ReportMail();
            $mailReport->sendReportMail($fileReport.'.xlsx', $resultInsert);
        }
        
        exit;
    
    
}