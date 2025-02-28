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

   
          

<form action="" method="GET">
    <button type="submit" name="vista" value="buscarUsuario">Buscar un usuario</button>
    <button type="submit" name="vista" value="crearUser">Crear un usuario</button>
    <button type="submit" name="vista" value="modificarUser">Modificar un usuario</button>
    <button type="submit" name="vista" value="mostrarTodosUsers">Mostrar todos los Usuarios</button>
</form>

<?php

        use app\controllers\viewsController;
        $viewsController= new viewsController();
                
        if(isset($_GET)&&$_GET['vista']!=""){
            $vista = $_GET['vista'];
            $vista=$viewsController->obtenerVistasController($vista);
             print_r($vista);
            require_once($vista);


        }else{
            $vista = './app/views/404.php';
        }

        

?>









</body>
<script src="./app/script/script.js"></script>
</html>