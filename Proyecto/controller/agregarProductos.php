<?php

require_once '../config/DBOperator.php';
$db = new DBDriver(PDOConfig::getInstance());

$peticion = json_decode(filter_input(INPUT_POST, 'peticion'));




$datos = array(
    $peticion->datos->nombre,
    $peticion->datos->descripcion,
    intval($peticion->datos->precio),
    '',
    $peticion->datos->referencia,
    intval($peticion->datos->unidad)
);


$query = 'CALL insertProduct(?,?,?,?,?,?)';


$db->set($query, $datos);

$respuesta = 'Error al guardar';
if($db->getRowCount() > 0){
    $respuesta = 'Guardado exitosamente';
}

die($respuesta);

