/* ================================================================
* Nombre:			insertOrder
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para realizar la creación de un
*					Pedido nuevo en la base de datos.
================================================================ */

DROP PROCEDURE IF EXISTS insertOrder;

DELIMITER $$
CREATE PROCEDURE insertOrder(
	IN _idUsuario INT,
	IN _TotalPedido INT,
	IN _TipoPedido VARCHAR(1), 
        IN _Estado INT, 
        IN _fechaSolicitud VARCHAR(8)
)
BEGIN
   
	INSERT INTO Pedido (idUsuario, TotalPedido, TipoPedido, Estado, fechaSolicitud)
	VALUES (_idUsuario, _TotalPedido, _TipoPedido, _Estado, _fechaSolicitud);

END;
 