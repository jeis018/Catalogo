<?php

session_start();
$_SESSION["user"] = array(0, "I");
$_SESSION["logedOn"] = FALSE;
$carProducts = array();
$_SESSION["carProducts"] = $carProducts;
header('Location: view/front.php');
