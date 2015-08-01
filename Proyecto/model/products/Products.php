<?php

require '../config/DBOperator.php';

/**
 * Clase que permite realizar la carga de los productos almacenados en la base de datos
 *
 * @author TOSHIBA
 */
class Products {

    private $products;
    private $totalRows;

    function __construct() {
        $this->products = array();
        $this->totalRows = 0;
    }

    public static function conn() {
        $conexion = mysql_connect("localhost", "root", "123456");
        mysql_query("SET NAMES 'utf8");
        mysql_select_db("catalogo");
        return $conexion;
    }

    public function loadProducts($limit, $productsPerPage) {
        //$db = new DBDriver(PDOConfig::getInstance());
        $queryProducts = "CALL getProducts(" . $limit . ", " . $productsPerPage . ")";
        //$resultProducts = $db->set($queryProducts, array());
        $resultProducts = mysql_query($queryProducts, $this->conn());
        while ($reg = mysql_fetch_assoc($resultProducts)) {
            $this->products[] = $reg;
        }
        mysql_close();
        return $this->products;
    }

    public function totalRows() {
        $queryTotalRows = "CALL getTotalProducts()";
        $totalReg = mysql_query($queryTotalRows, $this->conn());
        $arrAux = array();
        while ($reg = mysql_fetch_assoc($totalReg)) {
            $arrAux[] = $reg;
        }
        for ($i = 0; $i < count($arrAux); $i++) {
            $this->totalRows = $arrAux[$i]["totalProductos"];
            break;
        }
        mysql_close();
        return $this->totalRows;
    }

}

?>
