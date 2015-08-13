<?php

require_once ('../config/DBOperator.php');
require_once ('../model/reports/OrdersReport.php');
require_once ('../utils/UtilsTools.php');
//require_once ('../model/PDF/fpdf.php');
//require_once ('../model/reports2/generarPdf.php');

$db = new DBDriver(PDOConfig::getInstance());

//$pdf = new PDF();

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
        $query = 'CALL updatePurchaseOrder(?)';
        $datos = array($id);
        $db->set($query, $datos);

        $reportExcel = new OrdersReport();
        $reportExcel->generateReport(intval($id));
        
        //return $id;

        return ($db->getRowCount() > 0) ? 'Orden de compra atendida.' : 'Error al atender la Orden.';
    }

    /**
     * Permite registrar un pedido
     * @global DBDriver $db
     * @param type $idUsuario
     * @param type $totalPedido
     * @param type $tipoPedido
     * @return type boolean
     */
    public function insertOrder($idUsuario, $totalPedido, $tipoPedido) {
        global $db;
        $estado = 0;
        $hoy = trim(UtilsTools::getDate());
        $datos = array($idUsuario, $totalPedido, $tipoPedido, $estado, $hoy);
        $query = "CALL insertOrder(?,?,?,?,?)";
        $response = $db->set($query, $datos);
        
        
        //return $response[0]["idPedido"];
        //return ($db->getRowCount() > 0) ? TRUE : FALSE;
    }

    /**
     * Inserta los detalles de producto en la base de datos
     * @global DBDriver $db
     * @param type $products
     * @param type $idPedido
     */
    public function insertDetailProduct($products, $idPedido) {
        global $db;
        $query = "CALL insertProductDetail(?,?,?)";
        /* for ($i = 0; $i < count($products); $i++) {
          //if ($products[$i] != 0) {
          echo $idPedido . '-' . $products[$i] . "-" . 1;
          $datos = array(intval($idPedido), intval($products[$i]), 1);
          $db->set($query, $datos);
          //}
          } */

        var_dump($products);


        foreach ($products as $product) {
            if ($product != 0) {
                $db->set($query, array(
                    intval($idPedido),
                    intval($product),
                    intval(1)
                ));
            }
        }
    }
    

}
