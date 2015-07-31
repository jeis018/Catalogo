/* ================================================================
* Nombre:			insertInventory
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para realizar la creación de un
*					Pedido nuevo en la base de datos.
================================================================ */

DROP PROCEDURE IF EXISTS insertInventory;

DELIMITER $$
CREATE PROCEDURE insertInventory(
	IN _idProducto INT,
	IN _CantidadExistente INT
)
BEGIN
   
	INSERT INTO Inventario (idProducto, CantidadExistente)
	VALUES (_idProducto, _CantidadExistente);

END;
 