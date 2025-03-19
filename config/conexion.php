<?php
/*
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------
MySQLi Orientado a Objetos (OOP): Una forma moderna y segura de interactuar con bases de datos MySQL en PHP.
Seguridad mejorada: Ofrece características como declaraciones preparadas, que ayudan a prevenir ataques de inyección SQL.
Orientado a objetos: Se utilizan clases y objetos para interactuar con la base de datos.

-------------------------------------------------------------------------------------------------------------------------
Variables y clases
-------------------------------------------------------------------------------------------------------------------------
- $conn: Variable que almacena la conexión a la base de datos.
- mysqli: Clase que representa la conexión a la base de datos.
- connect_error: Propiedad que almacena el mensaje de error de la conexión.

-------------------------------------------------------------------------------------------------------------------------
Funciones y comandos
-------------------------------------------------------------------------------------------------------------------------
- die: Imprime un mensaje y termina el script actual.
- echo: Imprime un mensaje.
*/
$servername = "localhost";
$username = "root";
$password = "";
$database = "autenticacion";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 
// else {
//     echo "Conexión exitosa";
// }
?>