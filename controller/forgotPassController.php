<?php

/*
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------
Este controlador forgotPassword se encarga de validar el correo electrónico de un usuario. Recibe el correo electrónico
proporcionado por el usuario y verifica si existe en la base de datos. Si el correo existe, se genera un token único y se
envía un correo electrónico al usuario con un enlace para restablecer la contraseña. En caso contrario, se muestra un mensaje
de error.
-------------------------------------------------------------------------------------------------------------------------
Variables "PHP"
-------------------------------------------------------------------------------------------------------------------------
- $_SERVER: Variable súper global que almacena información sobre encabezados, rutas y ubicaciones de scripts.
- $token: Variable que almacena un token único generado con la función bin2hex().
- $expiry: Variable que almacena la fecha y hora de expiración del token.
- $resetLink: Variable que almacena la URL para restablecer la contraseña.
- $subject: Variable que almacena el asunto del correo electrónico.
- $message: Variable que almacena el mensaje del correo electrónico.
- $headers: Variable que almacena las cabeceras del correo electrónico.
- use PHPMailer\PHPMailer\PHPMailer: Importa la clase PHPMailer para enviar correos electrónicos.
- use PHPMailer\PHPMailer\Exception: Importa la clase Exception para manejar excepciones en PHPMailer.
- $mail: Variable que almacena una instancia de la clase PHPMailer.

-------------------------------------------------------------------------------------------------------------------------
Funciones "PHP"
-------------------------------------------------------------------------------------------------------------------------
- bin2hex(): Convierte datos binarios en representación hexadecimal.
- random_bytes(50): Genera una cadena de bytes aleatorios de 50 bytes de longitud.
- date("Y-m-d H:i:s"): Devuelve la fecha y hora actuales en el formato especificado.
- strtotime("+1 hour"): Devuelve la fecha y hora actuales más una hora.
- REQUEST_METHOD: Método de solicitud utilizado para acceder a la página.
- new PHPMailer(): Crea una nueva instancia de la clase PHPMailer.
- isSMTP(): Habilita el uso de SMTP para enviar correos electrónicos.
- Host: Establece el servidor SMTP de Mailtrap.
- SMTPAuth: Habilita la autenticación SMTP.
- Username: Establece el usuario de Mailtrap.
- Password: Establece la contraseña de Mailtrap.
- SMTPSecure: Establece el tipo de cifrado para la conexión SMTP.
- Port: Establece el puerto SMTP de Mailtrap.
- setFrom(): Establece la dirección de correo electrónico del remitente.
- addAddress(): Agrega una dirección de correo electrónico de destino.
- Subject: Establece el asunto del correo electrónico.
- Body: Establece el cuerpo del correo electrónico.
- send(): Envía el correo electrónico.
- ErrorInfo: Devuelve información sobre errores en el envío del correo electrónico.

*/
require_once ('../config/conexion.php');
require '../libs/phpmailer/src/PHPMailer.php';
require '../libs/phpmailer/src/SMTP.php';
require '../libs/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
    
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);

    // Verificar si el correo existe en la base de datos
    $query = "SELECT id FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($query);


    // Si el correo existe, generar un token único
    if ($result->num_rows > 0) {
        // Generar un token único
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Guardar en la BD
        $updateQuery = "UPDATE usuarios SET reset_token = '$token', token_expiry = '$expiry' WHERE correo = '$correo'";
        $conn->query($updateQuery);

        // Enviar correo electrónico al usuario
        $resetLink = "http://localhost/autenticacion/reset_password.php?token=$token";

        // Configurar PHPMailer
        $mail = new PHPMailer(true);

        
        try {
            // Configuración del servidor SMTP 
            $mail->isSMTP();
            $mail->Host       = 'localhost';  // Servidor SMTP PaperCut
            $mail->Port       = 25; // Puerto por defecto de PaperCut
            $mail->SMTPAuth   = false; // No necesita autenticación
            $mail->SMTPSecure = false; // No usa cifrado
            $mail->CharSet    = 'UTF-8';

            // Configurar correo
            $mail->setFrom('admin@localhost.com', 'Soporte');
            $mail->addAddress($correo);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body    = "Haz click en el siguiente enlace para restablecer tu contraseña: $resetLink";


            echo "Intentando enviar correo...";

            // Enviar correo
            if ($mail->send()) {
                echo "<script>
                        alert('Se ha enviado un enlace de recuperación a tu correo electrónico'); 
                        window.location = '../login.php';
                      </script>";
            }

        } catch (Exception $e) {
            echo "<script>
                    alert('Error al enviar el correo: {$mail->ErrorInfo}'); 
                    window.location = '../forgot_password.php';
                  </script>";
        }

    } else {
        echo "<script>
                alert('El correo no está registrado'); 
                window.location = '../forgot_password.php';
              </script>";
    }

}
?>