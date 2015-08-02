<?php

header('Content-Type: text/plain; charset=utf-8');

$uploaddir = '../view/images/catalogo/';

try {

    if (!isset($_FILES['upFile']['error']) ||
            is_array($_FILES['upFile']['error'])) {
        throw new RuntimeException('Parametros Invalidos');
    }
    
    switch ($_FILES['upFile']['error']){
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('Ningun archivo fue subido');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE: 
            throw new RuntimeException('El tamaño del archivo excede el limite');
        default :
            throw  new RuntimeException('Error desconocido');           
    }
    
    
    if($_FILES['upFile']['size'] > 1000000){
        throw new RuntimeException('El tamaño del archivo excede el limite');
    }
    
    
    if(false === $ext = array_search(
            $_FILES['upFile']['type'],
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ), true
            )){
        throw new RuntimeException('Extension incorrecta');
    }
 
    
    if(!move_uploaded_file(
            $_FILES['upFile']['tmp_name'],
            sprintf($uploaddir.'%s.%s', $_FILES['upFile']['name'], $ext)
            )){
        throw new RuntimeException('Error al subir el archivo');
    }
    
    echo 'Archivo subido exitosamente';
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}

