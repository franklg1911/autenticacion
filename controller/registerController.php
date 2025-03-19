<?php
/*
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------
Este controlador se encarga de registrar un usuario en la base de datos. Recibe los datos del formulario de registro y los
almacena en la tabla 'usuarios' de la base de datos. Verifica si el usuario ya existe antes de realizar el registro.
-------------------------------------------------------------------------------------------------------------------------
Variables "PHP"
-------------------------------------------------------------------------------------------------------------------------
- $nombre: Almacena el nombre del usuario.
- $conn: Almacena la conexión a la base de datos.
- $_POST: Variable súper global que se utiliza para recopilar datos de formularios.

-------------------------------------------------------------------------------------------------------------------------
Funciones "PHP"
-------------------------------------------------------------------------------------------------------------------------
- isset: Determina si una variable está definida y no es NULL.
- mysqli_real_escape_string: Escapa los caracteres especiales de una cadena para usarla en una sentencia SQL.
- shal: Devuelve el valor de hash de una cadena utilizando el algoritmo SHA-1.
- query: Realiza una consulta a la base de datos.
- num_rows: Devuelve el número de filas de un conjunto de resultados.
*/
require_once ('../config/conexion.php');


if (isset($_POST["registrar"])) {

    // Obtener los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $correo = mysqli_real_escape_string($conn, $_POST["correo"]);
    $usuario = mysqli_real_escape_string($conn, $_POST["user"]);
    $password = mysqli_real_escape_string($conn, $_POST["pass"]);
    $password_encriptada = sha1($password);

    // Consulta para verificar si el usuario ya existe
    $sqluser = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
    $resultConsulta = $conn->query($sqluser);
    $rows = $resultConsulta->num_rows;

    if ($rows > 0) {
        echo 
        "<script>
            alert('El usuario ya existe');
            window.location = '../login.php';
        </script>";

    } else {
        $sqlusuario = "INSERT INTO usuarios(nombre, correo, usuario, password) VALUES ('$nombre', '$correo', '$usuario', '$password_encriptada')";
        $resultRegistrar = $conn->query($sqlusuario);

        if ($resultRegistrar > 0) {
            echo
            "<script>
                alert('Registro exitoso');
                window.location = '../login.php';
            </script>";

        } else {
            echo
            "<script>
                alert('Error al registrarse');
                window.location = '../login.php';
            </script>";            
        }
    }
}
?>