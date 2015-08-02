/* ===================================================================================================
* Nombre:			getProducts
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para retornar todos los productos que se encuentran consignados
                        en la base de datos.
=================================================================================================== */

DROP PROCEDURE IF EXISTS getProducts;

DELIMITER $$
CREATE PROCEDURE getProducts(
    IN _StartRegistry INT,
    IN _NumberRegistry INT,
    IN _IndicatorCategory INT
)
BEGIN
    
    DECLARE _Category VARCHAR(100) DEFAULT NULL;
    
    IF _IndicatorCategory = 0 THEN
		SET _Category = 'ALL';
    END iF;

	IF _IndicatorCategory = 1 THEN
		SET _Category = 'ESFEROS';
    END iF;
	
	IF _IndicatorCategory = 2 THEN
		SET _Category = 'BORRADORES';
    END iF;

	IF _IndicatorCategory = 3 THEN
		SET _Category = 'COLORES';
    END iF;
	
	IF _IndicatorCategory = 4 THEN
		SET _Category = 'CARPETAS';
    END iF;

	IF _IndicatorCategory = 5 THEN
		SET _Category = 'CINTAS';
    END iF;
	
	IF _IndicatorCategory = 6 THEN
		SET _Category = 'COMPAS';
    END iF;

	IF _IndicatorCategory = 7 THEN
		SET _Category = 'LAPICES';
    END iF;
	
	IF _IndicatorCategory = 8 THEN
		SET _Category = 'PEGANTES';
    END iF;

	IF _IndicatorCategory = 9 THEN
		SET _Category = 'PORTAMINAS';
    END iF;
	
	IF _IndicatorCategory = 10 THEN
		SET _Category = 'RESALTADORES';
    END iF;

	IF _IndicatorCategory = 11 THEN
		SET _Category = 'CORRECTOR';
    END iF;
	
	IF _IndicatorCategory = 12 THEN
		SET _Category = 'TIJERAS';
    END iF;

	IF _IndicatorCategory = 13 THEN
		SET _Category = 'MARCADORES';
    END iF;
	
	IF _IndicatorCategory = 14 THEN
		SET _Category = 'KIT';
    END iF;
	
	IF _IndicatorCategory = 15 THEN
		SET _Category = 'TAJALAPIZ';
    END iF;

	IF _Category = 'ALL' THEN
		SELECT * FROM Producto LIMIT _StartRegistry, _NumberRegistry;
		ELSE
		SELECT * FROM Producto WHERE Categoria = _Category LIMIT _StartRegistry, _NumberRegistry;
	END IF;

END;