<?php

require_once '../config/DBOperator.php';
$db = new DBDriver(PDOConfig::getInstance());


class Agregar {
    
    function agregarProducto($datos){
        global $db;
       
        $query = 'CALL insertProduct(?,?,?,?,?,?,?)';
        $db->set($query, $datos);
        
        return $db->getRowCount();
    }
    
    
    function agregarInventario($datos){
        global $db;
        
        $query = 'CALL insertInventory(?,?)';
        $db->set($query, $datos);
        
        return $db->getRowCount();
    }
    
    
    function eliminarProducto($id){
        global $db;
        
        $query = 'CALL deleteProduct(?)';
        $db->set($query, array($id));
        
        return $db->getRowCount();
    }
    
}
