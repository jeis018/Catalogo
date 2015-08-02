/* ===================================================================================================
* Nombre:		getProductsCategory
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para retornar todos los productos que se encuentran consignados
                        en la base de datos.
=================================================================================================== */

DROP PROCEDURE IF EXISTS getProductsCategory;

DELIMITER $$
CREATE PROCEDURE getProductsCategory(
    IN _StartRegistry INT,
    IN _NumberRegistry INT,
    IN _Category VARCHAR(100)
)
BEGIN
   
    SELECT * FROM Producto WHERE Categoria = _Category LIMIT _StartRegistry, _NumberRegistry;

END;