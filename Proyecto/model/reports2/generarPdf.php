<?php

class PDF extends FPDF {
    
    
    function generar($header, $detail) {
        
        $this->SetFillColor(64, 64, 64);
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('', 'B');
        
        
        $this->Cell(200, 7, 'Orden de Compra', 0, 0, 'C', true);
        
        // restaura color
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        
        $this->Cell(60, 7, 'Orden de compra Numero: ');
        $this->Cell(40, 7, '');
        $this->Ln();
        $this->Cell(60, 7, 'Fecha: ');
        $this->Cell(40, 7, '');
        $this->Ln();
        
        
        
        // ===============================================================
        
        //datos cliente
        
        $this->SetFillColor(217, 217, 217);
        $this->SetTextColor(0);
        $this->SetFont('', 'B');
        
        
        $this->Cell(50, 7, 'Nombres y Apellidos: ');
        $this->Cell(50, 7, '');
        $this->Cell(50, 7, 'Cedula');
        $this->Cell(50, 7, '');
        $this->Ln();
        $this->Cell(50, 7, 'Teléfono: ');
        $this->Cell(50, 7, '');
        $this->Cell(50, 7, 'Celular: ');
        $this->Cell(50, 7, '');
        $this->Ln();
        $this->Cell(50, 7, 'Dirección: ');
        $this->Cell(50, 7, '');
        $this->Cell(50, 7, 'Email: ');
        $this->Cell(50, 7, '');
        $this->Ln();
        
        
        
        
        //=================================================================
        
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        
        // Cabecera tabla
        /*$w = array(40, 35, 45, 40, 40);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();*/
        
        $w = array(40, 40, 40, 40, 40);
        $this->Cell(40, 7, 'Referencia', 1, 0, 'C', true);
        $this->Cell(40, 7, 'Nombre Producto', 1, 0, 'C', true);
        $this->Cell(40, 7, 'Cantidad', 1, 0, 'C', true);
        $this->Cell(40, 7, 'Valor Unidad', 1, 0, 'C', true);
        $this->Cell(40, 7, 'Valor Total', 1, 0, 'C', true);
        
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        // Datos
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
            $this->Cell($w[4], 6, number_format($row[4]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}
