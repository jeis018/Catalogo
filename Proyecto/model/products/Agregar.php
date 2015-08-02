<?php

require_once '../config/DBOperator.php';
$db = new DBDriver(PDOConfig::getInstance());


class Agregar {
    
    function agregarProducto($datos){
        global  $db;
        
        $query = 'CALL insertProduct(?,?,?,?,?,?,?)';
        $db->set($query, $datos);
        
        return $db->getRowCount();
    }
    
    
}
