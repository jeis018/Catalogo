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

//$prod = array(1,2,3,4,5,6);
//$o->insertDetailProduct($prod, 100);



