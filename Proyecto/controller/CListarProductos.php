<?php

require_once '../model/products/Products.php';
$p = new Products();

$peticion = json_decode(filter_input(INPUT_POST, 'peticion'));


switch ($peticion->accion) {
    case 'buscar':
        $totalProducts = $p->totalRows(0);
        $respuesta = $p->listarProductos(1, $totalProducts, 0);
        die(json_encode($respuesta));
        break;
    case 'borrar' :
        $response = $p->deleteProduct($peticion->parametros->id, $peticion->parametros->nombreImg);
        die(json_encode($response));
        break;
}
