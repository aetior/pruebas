<?php
     require_once "./config/app.php";
     require_once "./autoload.php";
     use app\controllers\controllerMain;

?>
</div>
    <form action="" method="POST">
        <input type="hidden" name="hidden">
        <input type="submit" value="Mostrar Todos los usuarios">
        <input type="button" value="Cerrar" id="botonEliminar">
    </form>
    <div id="divNombres">
    <?php $users=new controllerMain(); 
    $resultado = $users->getUser();
    if(!empty($resultado)){
        foreach($resultado as $fila){
            echo 
            '<div class="nombre">'.
              "ID: ". $fila['id']." Nombre: ". $fila['nombre'].'<br>'.
                '</div>';
            }}
            ?>
               </div>

<script>
    let eliminarBtn = document.querySelector("#botonEliminar");
let divNombres = document.querySelectorAll(".nombre");

eliminarBtn.addEventListener('click',()=>{
    divNombres.forEach(div =>{
        div.textContent=""
    })
})

</script>