/* ================================================================
* Nombre:		deleteProduct
* Fecha creación:	15/08/20175/
* Descripción:		Procedimiento para eliminar un producto 
*			de la base de datos.
================================================================ */

DROP PROCEDURE IF EXISTS deleteProduct;

DELIMITER $$
CREATE PROCEDURE deleteProduct(
    IN _idProducto INT
)
BEGIN
   
    DELETE FROM Producto WHERE idProducto = _idProducto;

END;
 