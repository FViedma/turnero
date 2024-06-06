<?php
require_once('../funciones/funciones.php');
require_once('../funciones/conexion.php');

$uploads_dir = '../videos';
$error = $_FILES['video']['error'];

if ($error == UPLOAD_ERR_OK) {
    $nombre = pathinfo($_FILES['video']['name'], PATHINFO_FILENAME);
    $extension = ".".pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
    $tmp_dir = $_FILES['video']['tmp_name'];

    // Mover el archivo al directorio de destino
    move_uploaded_file($tmp_dir, $uploads_dir . "/" . $nombre . $extension);

    // Insertar información en la base de datos
    $sql = "INSERT INTO videos (nombre, extension) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $nombre, $extension);
    $stmt->execute();
    $stmt->close();

    // Redirigir después de la inserción exitosa
    header("Location: ../agregar_videos.php");
    exit();
} else {
    echo "Error al subir el archivo.";
}
?>