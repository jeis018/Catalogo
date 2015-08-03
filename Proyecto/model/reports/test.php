<?php


require_once 'OrdersReport.php';

$reportExcel = new OrdersReport();
$reportExcel->generateReport(1);
echo 'Finalicé !!'
?>
