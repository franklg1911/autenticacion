<!-- 
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------
Este controlador resetPassController se encarga de cambiar la contraseña de un usuario. Recibe el token y la nueva contraseña
proporcionados por el usuario y actualiza la contraseña en la base de datos. Una vez actualizada la contraseña, se muestra un
mensaje de éxito y se redirige al usuario a la página de inicio de sesión.
-------------------------------------------------------------------------------------------------------------------------
-->
<?php
require_once ('../config/conexion.php');

// Si el método de solicitud es POST se ejecuta el código
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recibir los datos del formulario
    $token = $_POST['token'];
    $newPassword = sha1($_POST['pass']);

    // Verificar si el token existe en la base de datos y si no ha expirado
    $query = "UPDATE usuarios SET password = '$newPassword', reset_token = NULL, token_expiry = NULL WHERE reset_token = '$token'";
    $conn->query($query);
    
    echo "
        <script>
            alert('Contraseña cambiada correctamente'); 
            window.location = '../login.php';
        </script>
    ";

}
?>