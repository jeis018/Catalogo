<?php


require_once 'Orders.php';

$reportExcel = new Orders();
$reportExcel->generateReport(1);
echo 'Finalicé !!'
?>
