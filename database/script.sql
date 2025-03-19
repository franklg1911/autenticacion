/*
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------
Este archivo contiene el script de la base de datos de la aplicación donde se crea la base de datos, las tablas y las 
relaciones entre las tablas.

-------------------------------------------------------------------------------------------------------------------------
Variables y clases
-------------------------------------------------------------------------------------------------------------------------
- NOT NULL: Indica que un campo no puede ser nulo.
- UNIQUE: Indica que un campo no puede tener valores duplicados.
- AUTO_INCREMENT: Indica que un campo se incrementa automáticamente.
- RESET_TOKEN: Almacenará un código único que se enviará al usuario.
- TOKEN_EXPIRY: Guardará la fecha y hora de expiración del token.
*/

-- TABLA USUARIOS
CREATE TABLE usuarios (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    correo varchar(150) NOT NULL UNIQUE,
    usuario varchar(100) NOT NULL,
    password varchar(200) NOT NULL
);

-- AGREGAMOS TOKEN DE RECUPEARACION
ALTER TABLE usuarios ADD COLUMN reset_token VARCHAR(255) NULL;
ALTER TABLE usuarios ADD COLUMN token_expiry VARCHAR(255) NULL;
