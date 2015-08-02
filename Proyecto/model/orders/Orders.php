<?php

require_once '../config/DBOperator.php';
$db = new DBDriver(PDOConfig::getInstance());


class Orders {

    function buscarOrdenes() {
        global $db;
        
        $query = 'call getOrders()';
        $datos = array();

        $respuesta = $db->set($query, $datos);
        
        return $respuesta;
    }
    
    
    function cambiarEstado($id){
        global $db;
        
        $query = 'call';
        $datos = array($id);
        
        $respuesta = $db->set($query, $datos);
        
        // llamar al la clase que crea el excel
        
        return ($db->getRowCount() > 0) ? 'Estado Cambio' : 'Error al actualizar la Orden';
    }

}
