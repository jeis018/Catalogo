<?php

require_once ('../PDF/fpdf.php');
$pdf = new FPDF();

require_once ('../../config/DBOperator.php');
$db = new DBDriver(PDOConfig::getInstance());


if (isset($_GET['id'])) {

    $id = $_GET['id'];


    $query_header = 'call getBillHeader(?)';
    $header = $db->set($query_header, array($id))[0];

    $query_detail = 'call getBillDetail(?)';
    $detail = $db->set($query_detail, array($id));




    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);


//======================================================

    $pdf->SetFillColor(64, 64, 64);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFont('', 'B');

    $pdf->Cell(190, 7, 'Cotización', 0, 0, 'C', true);
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFillColor(224, 235, 255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');


    $pdf->Cell(60, 7, 'Orden de compra Numero: ');
    $pdf->Cell(40, 7, $header['idPedido'], 0, 0, 'C');
    $pdf->Ln();
    $pdf->Cell(60, 7, 'Fecha: ');
    $pdf->Cell(40, 7, $header['fechaSolicitud'], 0, 0, 'C');
    $pdf->Ln();
    $pdf->Ln();



// ===============================================================
//datos cliente

    $pdf->SetFillColor(217, 217, 217);
    $pdf->SetTextColor(0);
    $pdf->SetFont('', 'B', 12);


    $pdf->Cell(50, 7, 'Nombres y Apellidos: ');
    $pdf->SetFont(''); 
    $pdf->SetFontSize(10);
    $pdf->Cell(50, 7, $header['Nombres'], 0, 0, 'C');
    $pdf->SetFont('', 'B', 12);
    $pdf->Ln();
    
    $pdf->Cell(50, 7, 'Cedula');
    $pdf->SetFont(''); 
    $pdf->SetFontSize(10);
    $pdf->Cell(50, 7, $header['Cedula']);
    $pdf->SetFont('', 'B', 12);
    $pdf->Ln();
    
    $pdf->Cell(50, 7, utf8_decode('Teléfono: '));
    $pdf->SetFont(''); 
    $pdf->SetFontSize(10);
    $pdf->Cell(50, 7, $header['Telefono']);
    $pdf->SetFont('', 'B', 12);
    
    $pdf->Cell(50, 7, 'Celular: ');
    $pdf->SetFont(''); 
    $pdf->SetFontSize(10);
    $pdf->Cell(50, 7, $header['Celular']);
    $pdf->SetFont('', 'B', 12);
    $pdf->Ln();
    
    $pdf->Cell(50, 7, utf8_decode('Dirección: '));
    $pdf->SetFont(''); 
    $pdf->SetFontSize(10);
    $pdf->Cell(50, 7, $header['Direccion']);
    $pdf->SetFont('', 'B', 12);
    
    $pdf->Cell(50, 7, 'Email: ');
    $pdf->SetFont(''); 
    $pdf->SetFontSize(10);
    $pdf->Cell(50, 7, $header['Email']);
    $pdf->SetFont('', 'B', 12);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();




//=================================================================

    $pdf->SetFillColor(255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0);
    $pdf->SetLineWidth(.3);
    $pdf->SetFont('', 'B', 10); 

// Cabecera tabla
    $pdf->Cell(30, 7, 'Referencia', 1, 0, 'C', true);
    $pdf->Cell(79, 7, 'Nombre Producto', 1, 0, 'C', true);
    $pdf->Cell(18, 7, 'Cantidad', 1, 0, 'C', true);
    $pdf->Cell(25, 7, 'Valor Unidad', 1, 0, 'C', true);
    $pdf->Cell(38, 7, 'Valor Total', 1, 0, 'C', true);
    $pdf->Ln();

// Restauración de colores y fuentes
    $pdf->SetFillColor(224, 235, 255);
    $pdf->SetTextColor(0);
    $pdf->SetFont(''); 
    $pdf->SetFontSize(8);
      

// Datos
    $fill = false;
    foreach ($detail as $row) {
        $pdf->Cell(30, 6, $row['Referencia'], 'LR', 0, 'L', $fill);
        $pdf->Cell(79, 6, $row['Nombre'], 'LR', 0, 'L', $fill);
        $pdf->Cell(18, 6, number_format($row['CantidadProducto']), 'LR', 0, 'R', $fill);
        $pdf->Cell(25, 6, number_format($row['Precio']), 'LR', 0, 'R', $fill);
        $pdf->Cell(38, 6, number_format($row['PrecioTotalProducto']), 'LR', 0, 'R', $fill);
        $pdf->Ln();
        $fill = !$fill;
    }

// Línea de cierre
    $pdf->Cell(190, 0, '', 'T');




    $pdf->Output('pedido.pdf', 'D');
    //$pdf->Output();
}