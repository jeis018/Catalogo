<?php

require_once ('../model/users/Registro.php');


$docu = $_POST['docu'];
$name = $_POST['name'];
$cel = $_POST['cel'];
$tel = $_POST['tel'];
$dir = $_POST['dir'];
$username = $_POST['mail'];
$pass = $_POST['pass'];

$registro = new Registro($username, $pass, $docu, $name, $cel, $tel, $dir);
$user = $registro->validateRegistro();



if ($user->getCodigoRespuesta() == '10') {
        if ($user->getMail()>0) {
            echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script> ';
        } 
        else {
        echo"<script type=\"text/javascript\">alert('Usuario registrado'); window.location='../view/index.html';</script>";
    }
} 
?>