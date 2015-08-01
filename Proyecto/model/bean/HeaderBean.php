<?php

/**
 * Clase que representa los datos del encabezado del bean
 *
 * @author hespitia
 */
class HeaderBean {

    private $idPedido;
    private $fechaSolicitud;
    private $totalPedido;
    private $nombres;
    private $cedula;
    private $telefono;
    private $celular;
    private $direccion;
    private $email;

    /**
     * Constructor por defecto de la clase
     * @param type $idPedido
     * @param type $fechaSolicitud
     * @param type $totalPedido
     * @param type $nombres
     * @param type $cedula
     * @param type $telefono
     * @param type $celular
     * @param type $direccion
     * @param type $email
     */
    function __construct($idPedido, $fechaSolicitud, $totalPedido, $nombres, $cedula, $telefono, $celular, $direccion, $email) {
        $this->idPedido = $idPedido;
        $this->fechaSolicitud = $fechaSolicitud;
        $this->totalPedido = $totalPedido;
        $this->nombres = $nombres;
        $this->cedula = $cedula;
        $this->telefono = $telefono;
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->email = $email;
    }

    function getIdPedido() {
        return $this->idPedido;
    }

    function getFechaSolicitud() {
        return $this->fechaSolicitud;
    }

    function getTotalPedido() {
        return $this->totalPedido;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCelular() {
        return $this->celular;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEmail() {
        return $this->email;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    function setFechaSolicitud($fechaSolicitud) {
        $this->fechaSolicitud = $fechaSolicitud;
    }

    function setTotalPedido($totalPedido) {
        $this->totalPedido = $totalPedido;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}
