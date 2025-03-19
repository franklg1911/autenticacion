<!--
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------

-------------------------------------------------------------------------------------------------------------------------
Variables "PHP"
-------------------------------------------------------------------------------------------------------------------------
- $_GET: Variable superglobal que se utiliza para recopilar datos de formularios y URL.
- $token: Variable que almacena el token que se recibe por GET.
- $query: Variable que almacena la consulta SQL para buscar el token en la base de datos.
- $result: Variable que almacena el resultado de la consulta SQL.

-------------------------------------------------------------------------------------------------------------------------
Funciones "PHP"
-------------------------------------------------------------------------------------------------------------------------
- !iset: Función que determina si una variable está definida y no es NULL.
- die: Función que imprime un mensaje y termina el script actual.
- num_rows: Función que devuelve el número de filas de un conjunto de resultados.
- token_expiry > NOW(): Función que compara la fecha de expiración del token con la fecha actual.
-->
<?php
require_once("config/conexion.php");

// Verificar si el token está definido
if (!isset($_GET['token'])) {
    die("Token inválido");
}

// Obtener el token
$token = $_GET['token'];

// Buscar el token en la base de datos
$query = "SELECT id FROM usuarios WHERE reset_token = '$token' AND token_expiry > NOW()";

// Ejecutar la consulta
$result = $conn->query($query);


if ($result->num_rows == 0 ) {
    die("El enlace es inválido o ha expirado");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesión</title>

    <!-- Bootstrap v5 -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css" />

    <!-- Styles css -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Font awesome v4.5.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="cold-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Restablecer contraseña</h3>

                        <form action="controller/resetPassController.php" method="POST">

                            <!-- Token -->
                            <input type="hidden" name="token" value="<?php echo $token; ?>">

                            <!-- Contraseña nueva -->
                            <div class="mb-3">
                                <label for="pass" class="form-label">Contraseña nueva</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" name="pass" id="pass" autocomplete="off"
                                        required>
                                </div>
                            </div>

                            <!-- Botón de registro -->
                            <div class="d-flex gap-2 justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar contraseña
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Bootstrap v5 -->
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</html>