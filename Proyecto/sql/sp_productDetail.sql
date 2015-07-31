/* ================================================================
* Nombre:			insertProductDetail
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para realizar la creación de un
*					DetalleProducto nuevo en la base de datos.
================================================================ */

DROP PROCEDURE IF EXISTS insertProductDetail;

DELIMITER $$
CREATE PROCEDURE insertProductDetail(
	IN _idPedido INT, 
	IN _idProducto INT
)
BEGIN
   
	INSERT INTO DetalleProducto (idPedido, idProducto)
	VALUES (_idPedido, _idProducto);

END;
 