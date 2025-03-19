<?php
/*
-------------------------------------------------------------------------------------------------------------------------
Descripción general
-------------------------------------------------------------------------------------------------------------------------
Muestra la vista del Dashboard del usuario logueado en el sistema. En este archivo, se muestra un mensaje de bienvenida al
usuario con su nombre. El nombre del usuario se obtiene de la base de datos utilizando la variable de sesión 'id_usuario'.
-------------------------------------------------------------------------------------------------------------------------
Variables "PHP"
-------------------------------------------------------------------------------------------------------------------------
- id_usuario: Variable de sesión que almacena el ID del usuario logueado.
- $_SESSION: Variable súper global que se utiliza para almacenar variables de sesión.
- $iduser: Almacena el ID del usuario logueado.
-------------------------------------------------------------------------------------------------------------------------
Clases "Bootstrap"
-------------------------------------------------------------------------------------------------------------------------
- navbar: Clase de Bootstrap que establece una barra de navegación.
- navbar-expand-lg: Clase de Bootstrap que establece el tamaño de la barra de navegación.
- navbar-brand: Clase de Bootstrap que establece el nombre de la barra de navegación.
- navbar-toggler: Clase de Bootstrap que establece el botón de menú desplegable.
- navbar-collapse: Clase de Bootstrap que establece el comportamiento de colapso de la barra de navegación.
- navbar-nav: Clase de Bootstrap que establece la lista de elementos de la barra de navegación.
- nav-item: Clase de Bootstrap que establece un elemento de la lista de la barra de navegación.
- nav-link: Clase de Bootstrap que establece un enlace de la barra de navegación.
- dropdown: Clase de Bootstrap que establece un menú desplegable.
- dropdown-menu: Clase de Bootstrap
- dropdown-item: Clase de Bootstrap que establece un elemento de un menú desplegable.
- dropdown-toggle: Clase de Bootstrap que establece un botón de menú desplegable.
- data-bs-toggle="dropdown": Atributo de datos de Bootstrap que establece el comportamiento de menú desplegable.
- aria-expanded="false": Atributo de accesibilidad que establece si el menú desplegable está expandido.
- active: Clase de Bootstrap que establece un elemento activo de la barra de navegación.
- bg-body-tertiary: Clase de Bootstrap que establece el color de fondo de la barra de navegación.
- container-fluid: Clase de Bootstrap que establece un contenedor fluido.
- data-bs-toggle="collapse": Atributo de datos de Bootstrap que establece el comportamiento de colapso.
- data-bs-target: Atributo de datos de Bootstrap que establece el objetivo del colapso.
- aria-controls="navbarNavDropdown": Atributo de accesibilidad que estable
- aria-expanded="false": Atributo de accesibilidad que establece si el menú está expandido.
- aria-label="Toggle navigation": Atributo de accesibilidad que establece la etiqueta del botón de menú desplegable.
- collapse: Clase de Bootstrap que establece el comportamiento de colapso.
- text-body-secondary: Clase de Bootstrap que establece el color del texto.
-------------------------------------------------------------------------------------------------------------------------
Funciones "PHP"
-------------------------------------------------------------------------------------------------------------------------
- isset: Determina si una variable está definida y no es NULL.
- query: Realiza una consulta a la base de datos.
- num_rows: Devuelve el número de filas de un conjunto de resultados.
- fetch_assoc: Obtiene una fila de resultados como un array asociativo.
- session_start: Inicia una nueva sesión o reanuda la sesión existente.

*/
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../login.php");
}


require_once("../config/conexion.php");

$iduser = $_SESSION['id_usuario'];

$sql = "SELECT id, nombre FROM usuarios WHERE id = '$iduser'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap v5 -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css" />

    <!-- Styles css -->
    <link rel="stylesheet" href="../assets/css/styles.css">

</head>

<body class="bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php">Empresa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Opciones
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../controller/logoutController.php">Cerrar
                                        sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h3 class="text-center">
            Bienvenido <?php echo $row['nombre']; ?>
            <small class="text-body-secondary">al panel administrativo</small>
        </h3>

    </div>
</body>


<!-- Bootstrap v5 -->
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>


</html>