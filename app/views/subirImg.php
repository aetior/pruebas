<?php

require_once "./config/app.php";
require_once "./autoload.php";
use app\models\mainModel;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {
    $directorio = "descargas/";  // Carpeta donde se guardarán las imágenes

    // 🔹 Crear la carpeta si no existe
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true); 
    }

    $archivo = $directorio . basename($_FILES["imagen"]["name"]); // Nombre del archivo
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    // 🔹 Validar tipo de archivo (solo imágenes)
    $formatosPermitidos = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($tipoArchivo, $formatosPermitidos)) {
        die("⚠️ Formato no permitido.");
    }

    // 🔹 Asegurar que $_SESSION['rol'] tiene un valor
    $rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : "guest";

    // 🔹 Generar un nombre único para evitar sobrescritura
    $nuevoNombre = "user" . $rol . "_" . uniqid() . "." . $tipoArchivo;
    $rutaFinal = $directorio . $nuevoNombre;

    // 🔹 Mover la imagen a la carpeta
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaFinal)) {
        // Conexión a la base de datos
        $pdo = new mainModel();
        $conexion = $pdo->conectar();

        // 🔹 Corregir la preparación de la consulta SQL
        $stmt = $conexion->prepare("INSERT INTO imagenes (usuario_id, ruta) VALUES (?, ?)");
        $stmt->execute([$_SESSION['id'], $rutaFinal]);

        echo "✅ Imagen subida con éxito.";
    } else {
        echo "❌ Error al subir la imagen.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen</title>
</head>
<body>
    <h2>Subir Imagen</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="imagen">Selecciona una imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required>
        <br><br>
        <input type="submit" value="Subir Imagen">
    </form>
</body>
</html>
