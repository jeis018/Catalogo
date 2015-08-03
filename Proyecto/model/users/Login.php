<?php

require_once ('../config/DBOperatorB.php');
require_once ('User.php');

/**
 * Clase que realiza la validación de la existencia del usuario en la base de datos.
 * Description of Login
 *
 * @author Admon
 */
class Login {

    private $username;
    private $pass;
    private $dbOperator;
    private $user;

    /**
     * Constructor por defecto de la clase
     * @param type $username
     * @param type $pass
     */
    function __construct($username, $pass) {
        $this->username = $username;
        $this->pass = sha1($pass);
        $this->dbOperator = new DBOperatorB();
    }

    public function validateLogin() {
        $sql = "CALL validateUser('" . $this->username . "', '" . $this->pass . "', 1" . ")";
        $userValidate = mysql_query($sql, $this->dbOperator->conn());
        $arrAux = array();
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

}
