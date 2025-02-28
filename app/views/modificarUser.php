<?php
     require_once "./config/app.php";
     require_once "./autoload.php";
     use app\controllers\controllerMain;
  
?>

<?php
             if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['seleccionId'])){
                $users=new controllerMain();
                $resultado = $users->actualizarUser($_POST['seleccionId']);
                echo $resultado;}
            ?>
    <form action="" method="POST">
        <label for="seleccionId">ID del usuario:</label>
        <input type="text" name="seleccionId">
        <label for="nombreCambiar">Nombre deseado:</label>
        <input type="text" name="nombreCambiar">
    <input type="submit" value="cambiar">
    </form>
