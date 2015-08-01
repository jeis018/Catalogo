<?php

require_once '../../config/DBOperator.php';
require_once '../bean/HeaderBean.php';
require_once '../bean/BodyBean.php';

/**
 * Clase que permite realizar la generación del reporte en xls de las Ordenes de compra.
 *
 * @author hespitia
 */
class Orders implements IReports {

    private $header;
    private $body;
    private $headerList;
    private $bodyList;

    public function __construct() {
        $this->header = array();
        $this->body = array();

        $this->headerList = array();
        $this->bodyList = array();
    }

    /**
     * Método que permite realizar la generación del reporte en excel de las ordenes de compra.
     */
    public function generateReport($idOrder) {
        $db = new DBDriver(PDOConfig::getInstance());

        $queryHeader = "CALL getBillHeader(?)";
        $headerResult = $db->set($queryHeader, array($idOrder));

        while ($reg = mysql_fetch_assoc($headerResult)) {
            $this->header[] = $reg;
        }
        $this->loadHeaderList();
        $fileBase = "../utils/PlantillaOrden.xls";
        $fileReport = "../reports/Orden_" . $this->headerList[0] . getIdPedido() . "_" . $this->headerList[0] . getFechaSolicitud;

        if (!copy($fileBase, $fileReport)) {
            echo "Se produjo un error durante la generación del reporte";
        }

        $queryDetail = "CALL getBillDetail(?)";
        $bodyResult = $db->set($queryDetail, array($idOrder));
        while ($reg2 = mysql_fetch_assoc($bodyResult)) {
            $this->body = $reg;
        }
        $this->loadBodyList();
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
                $row = new BodyBean($referencia, $nombre, $precio, $cantidadProducto, $precioTotalProducto);
                $this->bodyList[] = $row;
            }
        }
    }

}
