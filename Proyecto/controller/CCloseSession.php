<?php

session_start();
$_SESSION["user"] = array(0, "I");
$_SESSION["logedOn"] = FALSE;
$carProducts = array();
$_SESSION["carProducts"] = $carProducts;
echo "<script type=\"text/javascript\">window.history.back();</script>";
?>
