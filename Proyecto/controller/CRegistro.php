<?php

require_once ('../model/users/Registro.php');

session_start();

$docu = $_POST['docu'];
$name = $_POST['name'];
$cel = $_POST['cel'];
$tel = $_POST['tel'];
$dir = $_POST['dir'];
$username = $_POST['mail'];
$pass = $_POST['pass'];

$registro = new Registro($username, $pass, $docu, $name, $cel, $tel, $dir);
$existsUser = $registro->validateUser();

if ($existsUser == 1) {
    $registro->registerUser();
    echo "<script type=\"text/javascript\">alert('Bienvenido " . $username . "'); window.location='../view/index.php';</script>";
    $_SESSION["logedOn"] = TRUE;
} else {
    echo "<script type=\"text/javascript\">alert('El usuario ya existe en el sistema.'); window.location='../view/login.php';</script>";
}
