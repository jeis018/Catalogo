
/* ================================================================================================================
* Nombre:		validateUser
* Fecha creación:	30/07/2015
* Descripción:		Procedimiento para realizar la validación de un usuario para el inicio de sesión del 
*			usuario, así como para la creación del uno nuevo en la base de datos.
* Parámetros:           _email: Email del usuario que va a iniciar sesión.
*                       _contrasenna: Contraseña del usuario que va a iniciar sesión.
*                       _indicadorOperacion: Indica la operación que se va a ejecutar en la base de datos.
*                           1. Para validar si el usuario existe en la base de datos.
*                           2. Para validar si las credenciales de acceso son correctas.
* Retorno:              Código de error: 
*                           00 - Si la transacción fué exitosa.
*                           10 - Si el usuario ya existe en la base de datos.
*                           20 - Si las credenciales del usuario no son correctas.
================================================================================================================ */

DROP PROCEDURE IF EXISTS validateUser;

DELIMITER $$
CREATE PROCEDURE validateUser(
	IN _email VARCHAR(500), 
        IN _contrasenna VARCHAR(100), 
        IN _indicadorOperacion INT
)
BEGIN
   
    DECLARE _indicadorExistencia INT DEFAULT 0;
    DECLARE _Rol VARCHAR(1) DEFAULT NULL;

    IF _indicadorOperacion = 0 THEN
        SET _indicadorExistencia = (SELECT COUNT(*) FROM Usuario WHERE Email = _email);
        IF _indicadorExistencia <> 0 THEN
            SELECT '00' AS 'CodigoRespuesta', '-' AS 'Rol';
        ELSE
            SELECT '10' AS 'CodigoRespuesta', '-' AS 'Rol';
        END IF;
    END IF;

    IF _indicadorOperacion = 1 THEN
        SET _indicadorExistencia = (SELECT COUNT(*) FROM Usuario WHERE Email = _email AND Contrasenna = _contrasenna);
        IF _indicadorExistencia <> 0 THEN
            SET _Rol = (SELECT Rol FROM Usuario WHERE Email = _email AND Contrasenna = _contrasenna);
            SELECT '00' AS 'CodigoRespuesta', _Rol AS 'Rol'; 
        ELSE
            SELECT '20' AS 'CodigoRespuesta', '-' AS 'Rol';
        END IF;
    END IF;

END;
 