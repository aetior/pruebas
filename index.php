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
    <div id="divNombres"><?php 
    $users=new controllerMain(); 
    $resultado = $users->getUser();
 
    if(!empty($resultado)){
    foreach($resultado as $fila){
        echo htmlspecialchars($fila['nombre']).'<br>';
    }}
    ?></div>
    <form action="" method="POST">
        <input type="hidden" name="hidden">
        <input type="submit">
        <input type="button" value="Eliminar" id="botonEliminar">
    </form>
    <?php

     if($_SERVER['REQUEST_METHOD']==='POST'){
        $users->saveUser();
     }
    ?>

    <form action="" method="POST">
        <input type="text" name="nombre">
        <input type="text" name="password">
        <input type="text" name="email">
        <input type="submit" value="enviar">
    </form>
    <form action="" method="POST">
        <?php
           $users=new controllerMain(); 
           $resultado = $users->getOneUser();
           echo $resultado['nombre'];
        ?>
        <input type="hidden" name="hidden2">

        <input type="text" name="id">
        <input type="submit" value="buscar">
    </form>

</body>
<script src="./app/script/script.js"></script>
</html>