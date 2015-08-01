<?php

/**
 * Interfaz para ejecutar los métodos que realizan la generación de los reportes
 * @author hespitia
 */
interface IReport {

    /**
     * Método que ejecuta la generación del reporte, este método se implementa en las clases Order y Quote.
     */
    public function generateReport($idPedido);
}
