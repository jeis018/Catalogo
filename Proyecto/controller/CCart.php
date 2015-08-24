<?php

require_once ('../model/reports/OrdersReport.php');
require_once ('../model/orders/Orders.php');
require_once ('../model/orders/ReportMail.php');

session_start();

$peticion = json_decode(filter_input(INPUT_POST, 'peticion'));
$user = $_SESSION["user"][0];
$totalOrder = $peticion->total;
$tipoPedido = ($peticion->type == 1) ? 'C' : 'O';
$products = $peticion->data;
$order = new Orders();

$resultInsert = $order->insertOrder($user, $totalOrder, $tipoPedido);
$order->insertDetailProduct($products, $resultInsert);

$orderReport = new OrdersReport();
$fileAttach = $orderReport->generateReport($resultInsert);

$mailReport = new ReportMail();
$mailReport->sendReportMail($fileAttach, $resultInsert);

die(json_encode($resultInsert));

