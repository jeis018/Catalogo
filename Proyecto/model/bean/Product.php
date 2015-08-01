<?php

/**
 * Clase que representa un producto.
 *
 * @author TOSHIBA
 */
class Product {

    private $idProducto;
    private $nombre;
    private $descripcion;
    private $precio;
    private $nombreImagen;
    private $referencia;
    private $unidadVenta;
    private $categoria;

    /**
     * Constructor por defecto de la clase
     * @param type $idProducto
     * @param type $nombre
     * @param type $descripcion
     * @param type $precio
     * @param type $nombreImagen
     * @param type $referencia
     * @param type $unidadVenta
     * @param type $categoria
     */
    function __construct($idProducto, $nombre, $descripcion, $precio, $nombreImagen, $referencia, $unidadVenta, $categoria) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->nombreImagen = $nombreImagen;
        $this->referencia = $referencia;
        $this->unidadVenta = $unidadVenta;
        $this->categoria = $categoria;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getNombreImagen() {
        return $this->nombreImagen;
    }

    public function setNombreImagen($nombreImagen) {
        $this->nombreImagen = $nombreImagen;
    }

    public function getReferencia() {
        return $this->referencia;
    }

    public function setReferencia($referencia) {
        $this->referencia = $referencia;
    }

    public function getUnidadVenta() {
        return $this->unidadVenta;
    }

    public function setUnidadVenta($unidadVenta) {
        $this->unidadVenta = $unidadVenta;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

}

?>
