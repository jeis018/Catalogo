<?php

require_once ('IReport.php');
/*require_once ('../../config/DBOperatorB.php');
require_once ('../bean/HeaderBean.php');
require_once ('../bean/BodyBean.php');
require_once ('../../lib/PHPExcel.php');
require_once ('../../lib/PHPExcel/IOFactory.php');*/
require_once ('../config/DBOperatorB.php');
require_once ('../model/bean/HeaderBean.php');
require_once ('../model/bean/BodyBean.php');
require_once ('../lib/PHPExcel.php');
require_once ('../lib/PHPExcel/IOFactory.php');

/**
 * Clase que permite realizar la generación del reporte en xls de las Ordenes de compra.
 *
 * @author hespitia
 */
class OrdersReport implements IReport {

    private $header;
    private $body;
    private $headerList;
    private $bodyList;
    private $dbOperator;
    private $totalOrder;

    /**
     * Constructor por defecto de la clase sin parámetros de entrada.
     */
    public function __construct() {
        $this->header = array();
        $this->body = array();
        $this->dbOperator = new DBOperatorB();
        $this->headerList = array();
        $this->bodyList = array();
        $this->totalOrder = 0;
    }

    /**
     * Obtiene la ruta completa del archivo en el que se encuentra consigana la 
     * plantilla para la generación del excel.
     * @return type
     */
    public function getFileNamePath() {
        $directorio = opendir("./");
        while ($archivo = readdir($directorio)) {
            $name = "PlantillaOrden.xls";
            $resultado = strpos(realpath($archivo), $name);
            if ($resultado != FALSE) {
                return realpath($archivo);
            }
        }
    }

    /**
     * Método que permite realizar la generación del reporte en excel de las ordenes de compra.
     * @$idOrder: Genera el reporte en excel
     */
    public function generateReport($idOrder) {
        $queryHeader = "CALL getBillHeader(" . $idOrder . ")";
        $headerResult = mysql_query($queryHeader, $this->dbOperator->conn());
        while ($reg = mysql_fetch_assoc($headerResult)) {
            $this->header[] = $reg;
        }
        $this->loadHeaderList();
        mysql_close();

        $fileBase = $this->getFileNamePath();
        $fileReport = "\\Orden_" . $this->headerList[0]->getIdPedido() . "_" . $this->headerList[0]->getFechaSolicitud() . ".xls";
        $queryDetail = "CALL getBillDetail(" . $idOrder . ")";
        $bodyResult = mysql_query($queryDetail, $this->dbOperator->conn());
        while ($reg2 = mysql_fetch_assoc($bodyResult)) {
            $this->body[] = $reg2;
        }
        $this->loadBodyList();
        mysql_close();

        $readerExcel = PHPExcel_IOFactory::load($fileBase);
        $readerExcel->getActiveSheet()->setCellValue('B2', $this->headerList[0]->getIdPedido());
        $readerExcel->getActiveSheet()->setCellValue('B3', $this->headerList[0]->getFechaSolicitud());
        $readerExcel->getActiveSheet()->setCellValue('B6', $this->headerList[0]->getNombres());
        $readerExcel->getActiveSheet()->setCellValue('B7', $this->headerList[0]->getTelefono());
        $readerExcel->getActiveSheet()->setCellValue('B8', $this->headerList[0]->getDireccion());
        $readerExcel->getActiveSheet()->setCellValue('E6', $this->headerList[0]->getCedula());
        $readerExcel->getActiveSheet()->setCellValue('E7', $this->headerList[0]->getCelular());
        $readerExcel->getActiveSheet()->setCellValue('E8', $this->headerList[0]->getEmail());

        $initialIndex = 11;
        for ($i = 0; $i < count($this->bodyList); $i++) {
            $readerExcel->getActiveSheet()->setCellValue(('A' . $initialIndex), $this->bodyList[$i]->getReferencia());
            $readerExcel->getActiveSheet()->setCellValue(('B' . $initialIndex), $this->bodyList[$i]->getNombre());
            $readerExcel->getActiveSheet()->setCellValue(('C' . $initialIndex), $this->bodyList[$i]->getCantidadProducto());
            $readerExcel->getActiveSheet()->setCellValue(('D' . $initialIndex), $this->bodyList[$i]->getPrecio());
            $readerExcel->getActiveSheet()->setCellValue(('E' . $initialIndex), $this->bodyList[$i]->getPrecioTotalProducto());
            $initialIndex++;
        }

        $initialIndex += 2;
        $result = $this->calculateTotal();
        $readerExcel->getActiveSheet()->setCellValue(('E' . $initialIndex), $result[0]);
        $readerExcel->getActiveSheet()->setCellValue(('A' . $initialIndex++), "SUBTOTAL");

        $readerExcel->getActiveSheet()->setCellValue(('E' . $initialIndex), $result[1]);
        $readerExcel->getActiveSheet()->setCellValue(('A' . $initialIndex++), "IVA");

        $readerExcel->getActiveSheet()->setCellValue(('E' . $initialIndex), $result[2]);
        $readerExcel->getActiveSheet()->setCellValue(('A' . $initialIndex++), "TOTAL");

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileReport . '"');
        header('Cache-Control: max-age=0');
        
        $writerExcel = PHPExcel_IOFactory::createWriter($readerExcel, 'Excel5');
        $writerExcel->save('php://output');
    }

    /**
     * Método que convierte el ResultSet en una lista de elementos de tipo HeaderBean
     */
    private function loadHeaderList() {
        if (isset($this->header)) {
            for ($i = 0; $i < count($this->header); $i++) {
                $idPedido = $this->header[$i]["idPedido"];
                $fechaSolicitud = $this->header[$i]["fechaSolicitud"];
                $totalPedido = $this->header[$i]["TotalPedido"];
                $nombres = $this->header[$i]["Nombres"];
                $cedula = $this->header[$i]["Cedula"];
                $telefono = $this->header[$i]["Telefono"];
                $celular = $this->header[$i]["Celular"];
                $direccion = $this->header[$i]["Direccion"];
                $email = $this->header[$i]["Email"];
                $row = new HeaderBean($idPedido, $fechaSolicitud, $totalPedido, $nombres, $cedula, $telefono, $celular, $direccion, $email);
                $this->headerList[] = $row;
            }
        }
    }

    /**
     * Método que covierte el ResultSet del cuerpo del reporte en una lista de elementos BodyBean
     */
    private function loadBodyList() {
        if (isset($this->body)) {
            for ($i = 0; $i < count($this->body); $i++) {
                $referencia = $this->body[$i]["Referencia"];
                $nombre = $this->body[$i]["Nombre"];
                $precio = $this->body[$i]["Precio"];
                $cantidadProducto = $this->body[$i]["CantidadProducto"];
                $precioTotalProducto = $this->body[$i]["PrecioTotalProducto"];
                $this->totalOrder += $precioTotalProducto;
                $row = new BodyBean($referencia, $nombre, $precio, $cantidadProducto, $precioTotalProducto);
                $this->bodyList[] = $row;
            }
        }
    }

    /**
     * Retorna un arreglo con los valores que se presentan en el segmento de totales
     * de la aplicación.
     * @return type
     */
    private function calculateTotal() {
        $result = array();
        $iva = $this->totalOrder * 0.16;
        $subTotal = $this->totalOrder - $iva;
        $result[0] = $subTotal;
        $result[1] = $iva;
        $result[2] = $this->totalOrder;
        return $result;
    }

}
