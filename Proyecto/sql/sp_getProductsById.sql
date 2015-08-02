/* ===================================================================================================
* Nombre:		getProductById
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para consultar un producto por el id del mismo.
=================================================================================================== */

DROP PROCEDURE IF EXISTS getProductById;

DELIMITER $$
CREATE PROCEDURE getProductById(
    IN _idProduct INT
)
BEGIN
   
    SELECT * FROM Producto WHERE idProducto = _idProduct;

END;