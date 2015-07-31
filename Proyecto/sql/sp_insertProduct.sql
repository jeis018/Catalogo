/* ================================================================
* Nombre:			insertProduct
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para realizar la creación de un
*					Producto nuevo en la base de datos.
================================================================ */

DROP PROCEDURE IF EXISTS insertProduct;

DELIMITER $$
CREATE PROCEDURE insertProduct(
	IN _Nombre VARCHAR(100),
	IN _Descripcion VARCHAR(2000), 
	IN _Precio INT,
	IN _NombreImagen VARCHAR(1000),
	IN _Referencia VARCHAR(100), 
	IN _UnidadVenta INT 
)
BEGIN
   
	INSERT INTO Producto (Nombre, Descripcion, Precio, NombreImagen,	Referencia, UnidadVenta)
	VALUES (_Nombre, _Descripcion, _Precio, _NombreImagen, _Referencia, _UnidadVenta);

END;
 