/* ===================================================================================================
* Nombre:		getTotalProducts
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para retornar el total de productos existentes en la base de datos.
=================================================================================================== */

DROP PROCEDURE IF EXISTS getTotalProducts;

DELIMITER $$
CREATE PROCEDURE getTotalProducts()
BEGIN
   
    SELECT count(*) AS 'totalProductos' FROM Producto;

END;