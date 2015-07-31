/* ================================================================
* Nombre:			getOrders
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para retornar todos las ordenes
*					de compra que se encuentran consignadas en 
*					la base de datos.
================================================================ */

DROP PROCEDURE IF EXISTS getOrders;

DELIMITER $$
CREATE PROCEDURE getOrders()
BEGIN
   
	SELECT P.idPedido, P.fechaSolicitud, P.TotalPedido, U.Email FROM Pedido P
		INNER JOIN Usuario U ON P.idUsuario = U.idUsuario
		WHERE P.TipoPedido = 'O' AND P.estado = '0';

END;