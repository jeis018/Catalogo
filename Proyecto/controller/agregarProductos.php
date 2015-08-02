<?php

require_once '../model/products/Agregar.php';
$a = new Agregar();


$respuesta = array();
$nombreImagen;

//var_dump($_POST);
//var_dump($_FILES);



header('Content-Type: text/plain; charset=utf-8');

$uploaddir = '../view/images/catalogo/';

try {

    if (!isset($_FILES['imagen']['error']) ||
            is_array($_FILES['imagen']['error'])) {
        throw new RuntimeException('Parametros Invalidos');
    }

    switch ($_FILES['imagen']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('Ningun archivo fue subido');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('El tamaño del archivo excede el limite');
        default :
            throw new RuntimeException('Error desconocido');
    }


    if ($_FILES['imagen']['size'] > 1000000) {
        throw new RuntimeException('El tamaño del archivo excede el limite');
    }


    if (false === $ext = array_search(
            $_FILES['imagen']['type'], array(
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
            ), true
            )) {
        throw new RuntimeException('La extension del archivo es incorrecta');
    }


    if (!move_uploaded_file(
                    $_FILES['imagen']['tmp_name'], sprintf($uploaddir . '%s.%s', $_FILES['imagen']['name'], '')
            )) {
        throw new RuntimeException('Error al subir el archivo');
    }
    
    
    $nombreImagen = $_FILES['imagen']['name'];
    
} catch (Exception $ex) {
    $respuesta['msg'] = $ex->getMessage();
    $respuesta['estado'] = 0;
    die( json_encode($respuesta) );
}



$datos = array(
    filter_input(INPUT_POST, 'nombre'),
    filter_input(INPUT_POST, 'descripcion'),
    intval(filter_input(INPUT_POST, 'precio')),
    $nombreImagen,
    filter_input(INPUT_POST, 'referencia'),
    filter_input(INPUT_POST, 'unidad'),
    filter_input(INPUT_POST, 'categoria')
);

//var_dump($datos);

$resp = $a->agregarProducto($datos);


if ($resp > 0) {
    $respuesta['msg'] = 'Guardado exitosamente';
    $respuesta['estado'] = 1;
} else {
    $respuesta['msg'] = 'Error al guardar en la base';
    $respuesta['estado'] = 0;
    unlink($uploaddir.$nombreImagen);
}

die( json_encode($respuesta) );
