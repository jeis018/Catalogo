<?php

/**
 * Clase que representa los datos del cuerpo del reporte
 *
 * @author hespitia
 */
class BodyBean {

    private $referencia;
    private $nombre;
    private $precio;
    private $cantidadProducto;
    private $precioTotalProducto;

    /**
     * Constructor por defecto de la clase
     * @param type $referencia
     * @param type $nombre
     * @param type $precio
     * @param type $cantidadProducto
     * @param type $precioTotalProducto
     */
    function __construct($referencia, $nombre, $precio, $cantidadProducto, $precioTotalProducto) {
        $this->referencia = $referencia;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidadProducto = $cantidadProducto;
        $this->precioTotalProducto = $precioTotalProducto;
    }

    function getReferencia() {
        return $this->referencia;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCantidadProducto() {
        return $this->cantidadProducto;
    }

    function getPrecioTotalProducto() {
        return $this->precioTotalProducto;
    }

    function setReferencia($referencia) {
        $this->referencia = $referencia;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCantidadProducto($cantidadProducto) {
        $this->cantidadProducto = $cantidadProducto;
    }

    function setPrecioTotalProducto($precioTotalProducto) {
        $this->precioTotalProducto = $precioTotalProducto;
    }

    public function toString() {
        return $this->referencia . " - " .
                $this->nombre . " - " .
                $this->precio . " - " .
                $this->cantidadProducto . " - " .
                $this->precioTotalProducto;
    }

}
