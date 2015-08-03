<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('../config/DBOperatorB.php');
require_once ('User.php');

/**
 * Description of Registro
 *
 * @author Admon
 */
class Registro {

    private $dbOperator;
    private $username;
    private $pass;
    private $docu;
    private $name;
    private $cel;
    private $tel;
    private $dir;

    /**
     * Constructor por defecto de la clase
     * @param type $username
     * @param type $pass
     */
    function __construct($username, $pass, $docu, $name, $cel, $tel, $dir) {
        $this->username = $username;
        $this->pass = sha1($pass);
        $this->docu = $docu;
        $this->name = $name;
        $this->cel = $cel;
        $this->tel = $tel;
        $this->dir = $dir;
        $this->dbOperator = new DBOperatorB();
    }

    /**
     * Valida si el email (username), que se está intentando registrar existe en 
     * la base de datos.
     * @return boolean
     */
    public function validateUser() {
        $existsUser = 0;

        $sqlValidate = "CALL validateUser ('" . $this->username . "', '" . $this->pass . "', 0);";
        $regUserValidate = mysql_query($sqlValidate, $this->dbOperator->conn());
        $arrAux = array();
        while ($reg = mysql_fetch_assoc($regUserValidate)) {
            $arrAux[] = $reg;
        }

        if (isset($arrAux)) {
            $responseCode = $arrAux[0]["CodigoRespuesta"];
            if ($responseCode == '00') {
                $existsUser = 1;
            } else {
                $existsUser = 0;
            }
        }
        mysql_close();
        return $existsUser;
    }

    /**
     * Registra el usuario en la base de datos.
     */
    public function registerUser() {
        $sqlInsertUser = "CALL insertUser('" . $this->docu . "','" . $this->username . "','" .
                $this->pass . "','" . $this->name . "','" . $this->tel . "','" .
                $this->cel . "','" . $this->dir . "','I')";
        mysql_query($sqlInsertUser, $this->dbOperator->conn());
        mysql_close();
    }

    //put your code here
}
