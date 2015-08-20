<?php


require_once ('../model/products/Products.php');
$productMaster = new Products();

$peticion = json_decode(filter_input(INPUT_POST, 'peticion'));


$carProducts = $peticion->data;
$totalOrder = 0;

$response = array();


for ($i = 0; $i < count($carProducts); $i++) {
    if ($carProducts[$i] != 0) {
        //var_dump($carProducts[$i]);
        $product = $productMaster->getProductById($carProducts[$i]);
        $obj = new stdClass();
        $obj->id = $product->getIdProducto();
        $obj->nombre = $product->getNombre();
        $obj->descripcion = $product->getDescripcion();
        $obj->precio = $product->getPrecio();
        $obj->imagen = $product->getNombreImagen();
        $obj->referencia = $product->getReferencia();
        $obj->unidad_venta = $product->getUnidadVenta();
        $obj->categoria = $product->getCategoria();
        $obj->precio_total = $product->getPrecio();
        $obj->cant = 1;
        $response[] = $obj;
    }
    
}
    

//var_dump($response);

die(json_encode($response));