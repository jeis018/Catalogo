<?php

/**
 * Clase que representa la información que retorna el procedimiento de verificación 
 * de existencia y login de un usuario.
 *
 * @author Admon
 */
class User {

    private $idUsuario;
    private $codigoRespuesta;
    private $rol;

    /**
     * 
     * Constructor por defecto de la clase
     * @param type $idUsuario
     * @param type $codigoRespuesta
     * @param type $rol
     */
    function __construct($idUsuario, $codigoRespuesta, $rol) {
        $this->idUsuario = $idUsuario;
        $this->codigoRespuesta = $codigoRespuesta;
        $this->rol = $rol;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getCodigoRespuesta() {
        return $this->codigoRespuesta;
    }

    function getRol() {
        return $this->rol;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setCodigoRespuesta($codigoRespuesta) {
        $this->codigoRespuesta = $codigoRespuesta;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

}
