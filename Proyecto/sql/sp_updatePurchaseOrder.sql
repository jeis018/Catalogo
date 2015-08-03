/* ===================================================================================================
* Nombre:		updatePurchaseOrder
* Fecha creación:	03/08/2015
* Descripción:		Procedimiento para cambiar el estado de una orden de pago.
=================================================================================================== */

DROP PROCEDURE IF EXISTS updatePurchaseOrder;

DELIMITER $$
CREATE PROCEDURE updatePurchaseOrder(
    IN _idPedido INT
)
BEGIN
   
    UPDATE Pedido SET estado = 1 WHERE idPedido = _idPedido;

END;
