
<?php

require("../config/DBOperator.php");
$username = $_POST['mail'];
$pass = $_POST['pass'];

$sql2 = mysql_query("call validateUser('$username')");
if ($f2 = mysql_fetch_array($sql2)) {
    if ($pass == $f2['pasadmin']) {
        echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
        echo "<script>location.href='administration.php'</script>";
    }
}

$sql = mysql_query("call validateUser('$username')");
if ($f = mysql_fetch_array($sql)) {
    if ($pass == $f['password']) {
        header("Location: index.php");
    } else {
        echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
        echo "<script>location.href='index.php'</script>";
    }
} else {
    echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
    echo "<script>location.href='login.php'</script>";
}
?>