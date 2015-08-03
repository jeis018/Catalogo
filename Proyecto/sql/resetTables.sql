/* =============================================================================
* SQL para limpiar las tablas y reiniciar las secuencias de las mismas
 =============================================================================*/

USE Catalogo;
SET SQL_SAFE_UPDATES = 0;

DELETE FROM Usuario;
ALTER TABLE Usuario AUTO_INCREMENT = 0;

DELETE FROM Producto;
ALTER TABLE Producto AUTO_INCREMENT = 0;

DELETE FROM detallepedido;
ALTER TABLE detallepedido AUTO_INCREMENT = 0;

DELETE FROM Pedido;
ALTER TABLE Pedido AUTO_INCREMENT = 0;

DELETE FROM inventario;
ALTER TABLE inventario AUTO_INCREMENT = 0;