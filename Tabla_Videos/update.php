<?php
    require_once('../funciones/conexion.php');

    $id=$_POST['id'];
    
    $nombre=$_POST['nombre'];
    $extension=$_POST['extension'];

    $sql="UPDATE videos SET nombre='$nombre',extension='$extension' WHERE id='$id'";
    $query=mysqli_query($con,$sql);

    if($query){
        header("Location: ../agregar_videos.php");
    }
?>
