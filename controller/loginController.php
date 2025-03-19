<?php
/*
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------
Este controlador se encarga de validar el inicio de sesión de un usuario. Recibe los datos del formulario de inicio de
sesión y verifica si el usuario y la contraseña coinciden con los datos almacenados en la base de datos. Si los datos son
correctos, redirige al usuario a la página de inicio del sistema. En caso contrario, muestra un mensaje de error.
-------------------------------------------------------------------------------------------------------------------------
Variables "PHP"
-------------------------------------------------------------------------------------------------------------------------
- $nombre: Almacena el nombre del usuario.
- $conn: Almacena la conexión a la base de datos.
- $_POST: Variable súper global que se utiliza para recopilar datos de formularios.
- $_SESSION: Variable súper global que se utiliza para almacenar variables de sesión.

-------------------------------------------------------------------------------------------------------------------------
Funciones "PHP"
-------------------------------------------------------------------------------------------------------------------------
- isset: Determina si una variable está definida y no es NULL.
- mysqli_real_escape_string: Escapa los caracteres especiales de una cadena para usarla en una sentencia SQL.
- shal: Devuelve el valor de hash de una cadena utilizando el algoritmo SHA-1.
- query: Realiza una consulta a la base de datos.
- num_rows: Devuelve el número de filas de un conjunto de resultados.
- fetch_assoc: Obtiene una fila de resultados como un array asociativo.
- session_start: Inicia una nueva sesión o reanuda la sesión existente.

*/
require_once ('../config/conexion.php');
session_start();

if (!empty($_POST)) {
    $usuario = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $password_encriptada = sha1($password);

    $sqluser = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND password = '$password_encriptada'";
    $resultConsulta = $conn->query($sqluser);
    $rows = $resultConsulta->num_rows;

    if ($rows > 0) {
        $row = $resultConsulta->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id'];
        header("Location: ../views/dashboard.php");

    } else {
        echo 
        "<script>
            alert('Usuario o contraseña incorrectos');
            window.location = '../login.php';
        </script>";        
    }
}
?>