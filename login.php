<!-- 
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------
En este archivo, se muestra un formulario de inicio de sesión. El formulario contiene campos para el nombre de usuario y
la contraseña. También hay un enlace para redirigir al usuario a la página de registro si aún no tiene una cuenta. 
El formulario se envía a loginController.php para procesar la solicitud de inicio de sesión. 
-------------------------------------------------------------------------------------------------------------------------
Clases "Bootstrap"
-------------------------------------------------------------------------------------------------------------------------
- bg-light: Clase de Bootstrap que establece el color de fondo de un elemento en blanco.
- container: Clase de Bootstrap que establece el ancho del contenedor a 100% del ancho de la ventana gráfica.
- row: Clase de Bootstrap que establece una fila para contener columnas.
- justify-content-center: Clase de Bootstrap que alinea los elementos de la fila en el centro horizontal.
- align-items-center: Clase de Bootstrap que alinea los elementos de la fila en el centro vertical.
- height: Atributo de estilo que establece la altura de un elemento.
- 100vh: Unidad de medida de altura que establece la altura de un elemento al 100% de la altura de la ventana gráfica.
- cold-md-6: Clase de Bootstrap que establece el ancho de la columna a 6/12 en dispositivos medianos.
- col-lg-4: Clase de Bootstrap que establece el ancho de la columna a 4/12 en dispositivos grandes.
- card shadow: Clase de Bootstrap que establece una sombra en una tarjeta.
- card-body: Clase de Bootstrap que establece el estilo del cuerpo de una tarjeta.
- card-title: Clase de Bootstrap que establece el estilo del título de una tarjeta.
- mb-4: Clase de Bootstrap que establece el margen inferior de un elemento a 1.5 rem. (margin-bottom)
- form-label: Clase de Bootstrap que establece el estilo de una etiqueta de formulario.
- input-group: Clase de Bootstrap que establece un grupo de elementos de entrada.
- input-group-text: Clase de Bootstrap que establece el estilo de un texto de grupo de entrada.
- form-control: Clase de Bootstrap que establece el estilo de un control de formulario.
- d-grid gap-2: Clase de Bootstrap que establece una cuadrícula de diseño con un espacio de 2 rem entre las filas y columnas.
- d-flex: Clase de Bootstrap que establece un contenedor flexible para alinear los elementos horizontalmente.
- mt-3: Clase de Bootstrap que establece el margen superior de un elemento a 1 rem. (margin-top)
-->

<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    header("Location: views/admin/dashboard.php");
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
                        <h3 class="card-title text-center mb-4">Iniciar sesión</h3>

                        <form action="controller/loginController.php" method="POST">

                            <!-- Usuario -->
                            <div class="mb-3">
                                <label for="user" class="form-label">Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </span>
                                    <input type="text" class="form-control" name="user" id="user" autocomplete="off"
                                        required>
                                </div>
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-3">
                                <label for="pass" class="form-label">Contraseña</label>
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
                                <button type="submit" name="registrar" class="btn btn-primary">
                                    Ingresar
                                </button>
                            </div>

                            <!-- Link a login.php -->
                            <div class="text-center mt-3">
                                ¿No tienes cuenta? <a href="register.php">Registrarse</a>
                            </div>

                            <!-- Link a forgotPassword.php -->
                            <div class="text-center mt-3">
                                <a href="forgot_password.php">¿Olvidaste tu contraseña?</a>
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