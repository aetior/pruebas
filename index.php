<?php
require_once "./config/app.php";
require_once "./autoload.php";

use app\controllers\controllerMain;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>





    <?php

    use app\controllers\viewsController;

    $viewsController = new viewsController();


    include 'app/views/inicioSession.php';
    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] == "admin") {
            echo  $_SESSION['rol'];
            echo '<form action="" method="GET">
                <button type="submit" name="vista" value="buscarUsuario">Buscar un usuario</button>
                 <button type="submit" name="vista" value="crearUser">Crear un usuario</button>
                <button type="submit" name="vista" value="modificarUser">Modificar un usuario</button>
                 <button type="submit" name="vista" value="mostrarTodosUsers">Mostrar todos los Usuarios</button>
                  <button type="submit" name="vista" value="eliminarUser">Eliminar un usuario</button>
                  <button type="submit" name="vista" value="subirImg">Subir Imagen</button>
                 </form>';


            if (isset($_GET) && isset($_GET['vista'])) {
                $vista = $_GET['vista'];
                $vista = $viewsController->obtenerVistasController($vista);
                require_once($vista);
            } else {
                $vista = './app/views/404.php';
            }
        } elseif ($_SESSION['rol'] == "user") {
            echo  $_SESSION['rol'];
            echo '<form action="" method="GET">
                <button type="submit" name="vista" value="buscarUsuario">Buscar un usuario</button>
                  <button type="submit" name="vista" value="subirImg">Subir Imagen</button>          
                 <button type="submit" name="vista" value="mostrarTodosUsers">Mostrar todos los Usuarios</button>               
                 </form>';

            if (isset($_GET) && isset($_GET['vista'])) {
                $vista = $_GET['vista'];
                $vista = $viewsController->obtenerVistasController($vista);
                require_once($vista);
            } else {
                $vista = './app/views/404.php';
            }
        }
    }


    ?>









</body>
<!-- <script src="./app/script/script.js"></script> -->

</html>