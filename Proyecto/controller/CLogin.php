<?php

require_once ('../model/users/Login.php');
session_start();

$username = $_POST['mail'];
$pass = $_POST['pass'];

$login = new Login($username, $pass);
$user = $login->validateLogin();

if ($user->getCodigoRespuesta() == '00') {
    $_SESSION["logedOn"] = TRUE;
    if ($user->getRol() == 'A') {
        $_SESSION['userType'] = 'A';
    } else {
        $_SESSION['userType'] = 'I';
    }
    echo"<script type=\"text/javascript\">alert('Bienvenido de nuevo " . $username . "'); window.location='../view/index.php';</script>";
} else {
    echo"<script type=\"text/javascript\">alert('Las credenciales de acceso son incorrectas'); window.location='../view/login.php';</script>";
}