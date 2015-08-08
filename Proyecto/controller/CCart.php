<?php

require_once ('../model/reports/OrdersReport.php');
require_once ('../model/reports/QuotesReport.php');
require_once ('../model/orders/Orders.php');
session_start();

$userAux = $_SESSION["user"];
$user = $userAux[0];

$orderType = $_GET["orderType"];
$totalOrder = $_GET["totalPedido"];
$productsAux = $_GET["products"];
$tipoPedido = $orderType == 1 ? "C" : "O";

$order = new Orders();
$resultInsert = $order->insertOrder($user, $totalOrder, $tipoPedido);
if ($resultInsert != null) {
    $products = explode("-", $productsAux);
    $order->insertDetailProduct($products, $resultInsert);
    if ($orderType == 1) {
        $quote = new QuotesReport($resultInsert);
    } elseif ($orderType == 2) {
        $order = new OrdersReport();
        $order->generateReport($resultInsert);
    }
    $carProducts = array();
    $_SESSION["carProducts"] = $carProducts;
    echo "<script type=\"text/javascript\">alert('Se ha procesado su pedido.'); window.location='../view/index.php';</script>";
} else {
    
}
