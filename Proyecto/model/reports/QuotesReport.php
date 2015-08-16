<?php

require_once ('../lib/PDF/fpdf.php');
require_once ('../config/DBOperatorB.php');
//require_once ('../../lib/PDF/fpdf.php');
//require_once ('../../config/DBOperatorB.php');

/**
 * Clase que permite realizar la generación del reporte en pdf de las cotizaciones.
 *
 * @author hespitia
 */
class QuotesReport extends FPDF {

    public function Header() {
        //$this->Image('logo2.png', 10, 10, 20, 20);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(70, 10, "Madessa S.A.", 0, 0, 'C');
        $this->Ln(1);
        $this->Cell(70, 10, "___________________________________________________
            ____________________________________________________________________
            __________", 0, 0, 'C');
    }

    /**
     * Método que permite realizar la generación del reporte en excel de las ordenes de compra.
     */
    public function generateReport() {
        $cabecera = array();
    }

}

$miPdf = new QuotesReport();
$miPdf->Output();
