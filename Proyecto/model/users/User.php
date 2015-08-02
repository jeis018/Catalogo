<?php

/**
 * Clase que representa la información que retorna el procedimiento de verificación 
 * de existencia y login de un usuario.
 *
 * @author Admon
 */
class User {

    private $codigoRespuesta;
    private $rol;

    /**
     * Constructtor por defecto de la aplicación
     * @param type $codigoRespuesta
     * @param type $rol
     */
    function __construct($codigoRespuesta, $rol) {
        $this->codigoRespuesta = $codigoRespuesta;
        $this->rol = $rol;
    }

    function getCodigoRespuesta() {
        return $this->codigoRespuesta;
    }

    function getRol() {
        return $this->rol;
    }

    function setCodigoRespuesta($codigoRespuesta) {
        $this->codigoRespuesta = $codigoRespuesta;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

}
