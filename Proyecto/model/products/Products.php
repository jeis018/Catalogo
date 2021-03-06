<?php

require_once ('../config/DBOperatorB.php');
require_once ('../config/DBOperator.php');
require_once ('Product.php');

$db = new DBDriver(PDOConfig::getInstance());

/**
 * Clase que permite realizar la carga de los productos almacenados en la base de datos
 *
 * @author TOSHIBA
 */
class Products {

    private $products;
    private $totalRows;
    private $product;
    private $dbOperator;

    /**
     * Constructor por defecto de la aplicación
     */
    function __construct() {
        $this->products = array();
        $this->totalRows = 0;
        $this->dbOperator = new DBOperatorB();
    }

    /**
     * Carga la lista de productos de la base de datos
     * @param type $limit
     * @param type $productsPerPage
     * @return type
     */
    public function loadProducts($limit, $productsPerPage, $indicatorCategory) {
        $queryProducts = "CALL getProducts(" . $limit . ", " . $productsPerPage . ", " . $indicatorCategory . ")";

        $resultProducts = mysql_query($queryProducts, $this->dbOperator->conn());
        while ($reg = mysql_fetch_assoc($resultProducts)) {
            $this->products[] = $reg;
        }
        mysql_close();
        return $this->products;
    }

    /**
     * Obtiene el total de registros de productos existentes de la base de datos
     * @return type
     */
    public function totalRows($indicatorCategory) {
        $queryTotalRows = "CALL getTotalProducts(" . $indicatorCategory . ")";
        $totalReg = mysql_query($queryTotalRows, $this->dbOperator->conn());
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

    /**
     * Consulta y retorna un producto de la base de datos consultandolo por el id del mismo.
     * @param type $idProduct
     * @return type
     */
    public function getProductById($idProduct) {
        $queryGetProductsById = "call getProductById(" . $idProduct . ")";
        $regProd = mysql_query($queryGetProductsById, $this->dbOperator->conn());
        $arrAux = array();
        while ($reg = mysql_fetch_assoc($regProd)) {
            $arrAux[] = $reg;
        }
        if (isset($arrAux)) {
            for ($i = 0; $i < count($arrAux); $i++) {
                $idProducto = $arrAux[$i]["idProducto"];
                $nombre = $arrAux[$i]["Nombre"];
                $descripcion = $arrAux[$i]["Descripcion"];
                $precio = $arrAux[$i]["Precio"];
                $nombreImagen = $arrAux[$i]["NombreImagen"];
                $referencia = $arrAux[$i]["Referencia"];
                $unidadVenta = $arrAux[$i]["UnidadVenta"];
                $categoria = $arrAux[$i]["Categoria"];
                $this->product = new Product($idProducto, $nombre, $descripcion, $precio, $nombreImagen, $referencia, $unidadVenta, $categoria);
            }
        }
        mysql_close();
        return $this->product;
    }

    /**
     * Lista los productos de la base de datos, sin ningún formato.
     * @global DBDriver $db
     * @param type $limit
     * @param type $productsPerPage
     * @param type $indicatorCategory
     * @return type
     */
    public function listarProductos($limit, $productsPerPage, $indicatorCategory) {
        global $db;
        $query = 'CALL getProducts(?,?,?)';
        $data = array($limit, $productsPerPage, $indicatorCategory);
        $response = $db->set($query, $data);
        return $response;
    }

    public function deleteProduct($id, $nombreImg) {
        global $db;
        $query = "CALL deleteProduct(?)";
        $data = array(intval($id));
        $db->set($query, $data);
        
        $resp = ($db->getRowCount() > 0) ? 1 : 0;
        if($resp === 1){
            unlink('../view/images/catalogo/'.$nombreImg);
        }
        return $resp;
    }

}

?>
