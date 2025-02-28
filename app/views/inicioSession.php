<?php 
require_once "./config/app.php";
require_once "./autoload.php";
use app\controllers\userController;
session_start();
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
    
    if(isset($_SESSION['newSession'])&&$_SESSION['newSession']='verdad'){
         echo'  <form action=""method="POST">
        <input type="hidden" name="salir">
        <input type="submit" value="Salir">
        </form>';
    }else{
   
   echo '<form action=""method="POST">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass">
        <input type="hidden" name="login" value="1">
        <input type="submit" value="Entrar">
    </form>';
 } 
    if(isset($_POST['login'])){
    $user = new Usercontroller();
        $user->comprobarUsuario();
    }
    if(isset($_POST['salir'])){
        session_unset();
        session_destroy();
    }
    ?>
</body>
</html>