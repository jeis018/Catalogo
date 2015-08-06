<?php

/**
 * Clase utilizada para conectarse a la base de datos
 *
 * @author Admon
 */
class DBOperatorB {

    /**
     * Obtiene la conexión a la base de datos
     * @return type
     */
    public static function conn() {
        $conexion = mysql_connect("localhost", "root", "123456");
//        $conexion = mysql_connect("localhost", "root", "");
        mysql_query("SET NAMES 'utf8");
        mysql_select_db("catalogo");
        return $conexion;
    }

}
