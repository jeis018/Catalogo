<?php

require_once '../model/products/Products.php';
$p = new Products();

$peticion = json_decode(filter_input(INPUT_POST, 'peticion'));


switch ($peticion->accion){
    case 'buscar':
        $totalProducts = $p->totalRows(0);
        $respuesta = $p->loadProducts(1, $totalProducts, 0);
        die(json_encode($respuesta));
        break;
}