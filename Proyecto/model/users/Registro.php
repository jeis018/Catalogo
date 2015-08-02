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

    private $username;
    private $pass;
    private $dbOperator;
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
        $this->pass = $pass;
        $this->docu = $docu;
        $this->name = $name;
        $this->cel = $cel;
        $this->tel = $tel;
        $this->dir = $dir;
        $this->dbOperator = new DBOperatorB();
    }

    public function validateRegistro() {
        //$checkemail = mysql_query("call validateUser('" . $this->username . "')", $this->dbOperator->conn());
        $arrAux = array();
            //require("connect_db.php");
             $userValidate = mysql_query("call insertUser('" . $this->docu . "','" . $this->username . "','" . $this->pass . "','" . $this->name . "','" . $this->tel . "','" . $this->cel . "','" . $this->dir . "','I')", $this->dbOperator->conn());
            //echo "Se ha registrado con exito';
            echo "<script type=\"text/javascript\">alert('Usuario registrado con éxito'); window.location='../view/login.php';</script>";
            while ($reg = mysql_fetch_assoc($userValidate)) {
                $arrAux[] = $reg;
            }

            if (isset($arrAux)) {
                $responseCode = $arrAux[0]["CodigoRespuesta"];
                $rol = $arrAux[0]["Rol"];
                $this->user = new User($responseCode, $rol);
            }
            return $this->user;
        }
    

    //put your code here
}
