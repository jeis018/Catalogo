/* ================================================================
* Nombre:			insertUser
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para realizar la creación de un
*					usuario nuevo en la base de datos.
================================================================ */

DROP PROCEDURE IF EXISTS insertUser;

DELIMITER $$
CREATE PROCEDURE insertUser(
	IN _Cedula INT, 
	IN _Email VARCHAR(500), 
	IN _Contrasenna VARCHAR(100), 
	IN _Nombres VARCHAR(500), 
	IN _Telefono VARCHAR(20), 
	IN _Celular VARCHAR(30), 
	IN _Direccion VARCHAR(300),
        IN _Rol VARCHAR(1)
)
BEGIN
   
	INSERT INTO Usuario (Cedula, Email, Contrasenna, Nombres, Telefono, Celular, Direccion, Rol)
	VALUES (_Cedula, _Email, _Contrasenna, _Nombres, _Telefono, _Celular, _Direccion, _Rol);

END;
 