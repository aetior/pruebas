<?php
     require_once "./config/app.php";
     require_once "./autoload.php";
     use app\controllers\controllerMain;

?>
<form action="" method="POST">
        <input type="hidden" name="hidden2">
        <label for="id">Introduce Id:</label>
        <input type="text" name="id">
        <input type="submit" value="buscar">
    </form>
        <?php
           $users=new controllerMain(); 
           if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['hidden2'])){
           $resultado = $users->getOneUser();
           echo $resultado['nombre'];}
        ?>