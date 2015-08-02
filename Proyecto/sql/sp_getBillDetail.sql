
/* ===============================================================================================
* Nombre:		getBillDetail
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para retornar el detalle de la factura.
* Parámetros:           idOrder; corresponde a la orden de compra para la que se va a generar el 
*                       reporte.
=============================================================================================== */

DROP PROCEDURE IF EXISTS getBillDetail;

DELIMITER $$ 
CREATE PROCEDURE getBillDetail(
    IN _idOrder INT 
)
BEGIN
   
    SELECT P.Referencia, P.Nombre, P.Precio, PE.CantidadProducto, (P.Precio * PE.CantidadProducto) AS 'PrecioTotalProducto'
    FROM Producto P INNER JOIN DetalleProducto DE ON P.idProducto = DE.idProducto
                    INNER JOIN Pedido PE ON DE.idPedido = PE.idPedido
    WHERE PE.idPedido = _idOrder;

END;

