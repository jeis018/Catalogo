/* ================================================================
* Nombre:		updateProduct
* Fecha creación:	15/08/20175/
* Descripción:		Procedimiento para actualizar un producto 
*			en la base de datos.
================================================================ */

DROP PROCEDURE IF EXISTS updateProduct;

DELIMITER $$
CREATE PROCEDURE updateProduct(
    IN _idProducto INT, 
    IN _nombrePriducto VARCHAR(100),
    IN _descripcion VARCHAR(2000),
    IN _precio INT,
    IN _nombreImagen VARCHAR(1000),
    IN _referencia VARCHAR(1000),
    IN _unidadVenta VARCHAR(100),
    IN _categoria VARCHAR(100)
)
BEGIN
   
    UPDATE Producto SET
            Nombre = _nombrePriducto,
            Descripcion = _descripcion, 
            Precio = _precio, 
            NombreImagen = _nombreImagen,
            Referencia = _referencia,
            UnidadVenta = _unidadVenta,
            Categoria = _categoria
    WHERE idProducto = _idProducto;

END;
 