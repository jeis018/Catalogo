<?php
require_once '../model/orders/Orders.php';
$o = new Orders();

$peticion = json_decode(filter_input(INPUT_POST, 'peticion'));



switch ($peticion->accion){
    case 'buscar':
        $respuesta = $o->buscarOrdenes();
        die(json_encode($respuesta));
        break;
    case 'cambiar estado':
        $respuesta = $o->cambiarEstado($peticion->id);
        break;
}



