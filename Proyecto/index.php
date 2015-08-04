<?php

session_start();
$_SESSION["userType"] = "I";
$_SESSION["logedOn"] = FALSE;
$carProducts = array();
$_SESSION["carProducts"] = $carProducts;
header('Location: view/index.php');
