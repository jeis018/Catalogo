-- ===============================================================
-- Base de datos CATALOGO
-- ===============================================================
USE Catalogo;
-- ===============================================================
-- Producto
-- ===============================================================
CREATE TABLE Producto (
	idProducto INT NOT NULL AUTO_INCREMENT, 
	Nombre VARCHAR(100) NOT NULL,
	Descripcion VARCHAR(2000) NOT NULL, 
	Precio INT NOT NULL,
	NombreImagen VARCHAR(1000) NOT NULL,
	Referencia VARCHAR(100) NOT NULL, 
	UnidadVenta VARCHAR(100) NOT NULL,
        Categoria VARCHAR(100) NOT NULL,
	PRIMARY KEY (idProducto)
);

-- ===============================================================
-- Usuario
-- ===============================================================
CREATE TABLE Usuario(
	idUsuario INT NOT NULL AUTO_INCREMENT,
	Cedula INT NOT NULL, 
	Email VARCHAR(500) NOT NULL, 
	Contrasenna VARCHAR(100) NOT NULL, 
	Nombres VARCHAR(500) NOT NULL, 
	Telefono VARCHAR(20) NOT NULL, 
	Celular VARCHAR(30) NOT NULL, 
	Direccion VARCHAR(300) NOT NULL,
        Rol VARCHAR(1) NOT NULL,
	PRIMARY KEY(idUsuario)
);

-- ===============================================================
-- Pedido
-- ===============================================================
CREATE TABLE Pedido(
	idPedido INT NOT NULL AUTO_INCREMENT,
	idUsuario INT NOT NULL,
	TotalPedido INT NOT NULL, 
	TipoPedido VARCHAR(1) NOT NULL,
        Estado INT NOT NULL,
        fechaSolicitud VARCHAR(10) NOT NULL, 
	PRIMARY KEY(idPedido)
);

-- ===============================================================
-- Inventario
-- ===============================================================
CREATE TABLE Inventario(
	idRegistroInventario INT NOT NULL AUTO_INCREMENT,
	idProducto INT NOT NULL,
	CantidadExistente INT NOT NULL,
	PRIMARY KEY(idRegistroInventario)
);

-- ===============================================================
-- Detalle de producto
-- ===============================================================
CREATE TABLE DetallePedido(
	idDetalleProducto INT NOT NULL AUTO_INCREMENT,
	idPedido INT NOT NULL, 
	idProducto INT NOT NULL,
        CantidadProducto INT NOT NULL,
	PRIMARY KEY(idDetalleProducto)
);

-- ===============================================================
-- Claves foráneas
-- ===============================================================
ALTER TABLE Pedido ADD FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario);
ALTER TABLE Inventario ADD FOREIGN KEY(idProducto) REFERENCES Producto(idProducto);
ALTER TABLE DetallePedido ADD FOREIGN KEY(idPedido) REFERENCES Pedido(idPedido);
ALTER TABLE DetallePedido ADD FOREIGN KEY(idProducto) REFERENCES Producto(idProducto);
