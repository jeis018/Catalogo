<?php


require_once 'OrdersReport.php';

$reportExcel = new OrdersReport();
$reportExcel->generateReport(35);
?>
