<?php
/*
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------
Este controlador se encarga de cerrar la sesión de un usuario. Destruye la sesión actual y redirige al usuario a la página
de inicio de sesión.

-------------------------------------------------------------------------------------------------------------------------
Funciones "PHP"
-------------------------------------------------------------------------------------------------------------------------
session_start: Inicia una nueva sesión o reanuda la sesión existente.
session_destroy: Destruye todos los datos registrados en una sesión.
header: Envía una cabecera HTTP sin formato al cliente.
*/
session_start();
session_destroy();
header("Location: ../login.php");
?>