
/* ===============================================================================================
* Nombre:		getBillHeader
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para retornar los datos del encabezado de la factura.
* Parámetros:           idOrder; corresponde a la orden de compra para la que se va a generar el 
*                       reporte.
=============================================================================================== */

DROP PROCEDURE IF EXISTS getBillHeader;

DELIMITER $$
CREATE PROCEDURE getBillHeader(
    IN _idOrder INT 
)
BEGIN
   
    SELECT PE.idPedido, PE.fechaSolicitud, PE.TotalPedido, U.Nombres, U.Cedula, U.Telefono, U.Celular, U.Direccion, U.Email 
        FROM Pedido PE INNER JOIN Usuario U 
        ON PE.idUsuario = U.idUsuario
        WHERE PE.idPedido = _idOrder;
	
END;
