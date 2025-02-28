<?php
     require_once "./config/app.php";
     require_once "./autoload.php";
     use app\controllers\controllerMain;
?>
</div>
    <form action="" method="POST">
        <input type="hidden" name="hidden">
        <input type="submit" value="Mostrar Todos los usuarios">
        <input type="button" value="Eliminar" id="botonEliminar">
    </form>
    <div id="divNombres"><?php 
    $users=new controllerMain(); 
    $resultado = $users->getUser();
 
    if(!empty($resultado)){
    foreach($resultado as $fila){
        echo htmlspecialchars($fila['nombre']).'<br>';
    }}
    ?>