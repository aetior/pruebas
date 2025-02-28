<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    use app\controllers\controllerMain;

    $user= new controllerMain;
    if(isset($_POST['eliminarUser'])){
        $id = $_POST['userId'];
        return  $user->eliminarUser($id);
    }

    ?>
   <form action=""method="POST">
    <label for="eliminarUser">Id para eliminar:</label>
    <input type="hidden" name="eliminarUser">
    <input type="text" name="userId">
    <input type="submit" value="Eliminar">
   </form>
</body>
</html>