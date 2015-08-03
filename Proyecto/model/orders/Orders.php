<?php

require_once ('../config/DBOperator.php');
require_once ('../reports/OrdersReport.php');
$db = new DBDriver(PDOConfig::getInstance());

/**
 * Clase que realiza la gestión de las ordenes de compra.
 * @author hespitia
 */
class Orders {

    /**
     * Retorna todas las ordenes de compra almacenadas en la base de datos.
     * @global DBDriver $db
     * @return type
     */
    function buscarOrdenes() {
        global $db;
        $query = 'CALL getOrders()';
        $datos = array();
        $respuesta = $db->set($query, $datos);
        return $respuesta;
    }

    /**
     * Realiza la generación del archivo Excel y el cambio de estado del pedido en la base de datos.
     * @global DBDriver $db
     * @param type $id
     * @return type
     */
    function cambiarEstado($id) {
        global $db;
        $query = 'CALL updatePurchaseOrder ()';
        $datos = array($id);
        $respuesta = $db->set($query, $datos);

        $reportExcel = new OrdersReport();
        $reportExcel->generateReport($id);

        return ($db->getRowCount() > 0) ? 'Orden de compra atendida.' : 'Error al atender la Orden.';
    }

}
