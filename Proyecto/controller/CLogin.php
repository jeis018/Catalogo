
<?php

require_once ('../model/users/Login.php');

$username = $_POST['mail'];
$pass = $_POST['pass'];

$login = new Login($username, $pass);
$user = $login->validateLogin();

if ($user->getCodigoRespuesta() == '00') {
    if ($user->getRol() == 'A') {
        echo"<script type=\"text/javascript\">alert('Bienvenido de nuevo " . $username . "'); window.location='../view/indexA.html';</script>";
    } else {
        echo"<script type=\"text/javascript\">alert('Bienvenido de nuevo " . $username . "'); window.location='../view/index.html';</script>";
    }
} else {
    echo"<script type=\"text/javascript\">alert('Las credenciales de acceso son incorrectas'); window.location='../view/login.php';</script>";
}