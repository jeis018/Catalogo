/* ================================================================
* Nombre:			getProducts
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para retornar todos los productos
*					que se encuentran consignados en la base 
*					de datos.
================================================================ */

DROP PROCEDURE IF EXISTS getProducts;

DELIMITER $$
CREATE PROCEDURE getProducts(
	IN _idProducto INT,
	IN _CantidadExistente INT
)
BEGIN
   
	SELECT * FROM Producto;

END;