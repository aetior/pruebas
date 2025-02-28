<?php
     require_once "./config/app.php";
     require_once "./autoload.php";
     use app\controllers\controllerMain;

?>
<?php

if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['password'])){
    $users= new controllerMain();
    $users->saveUser(isset($_POST['nombre']),isset($_POST['password']),isset($_POST['email']));
}
?>

<form action="" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre">
    <label for="password">Contraseña:</label>
    <input type="text" name="password">
    <label for="email">Email:</label>
    <input type="text" name="email">
   
   <input type="submit" value="enviar">
</form>