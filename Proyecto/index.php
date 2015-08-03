<?php

session_start();
$_SESSION["userType"] = "I";
$_SESSION["logedOn"] = FALSE;

header('Location: view/index.php');
