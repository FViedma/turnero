<?php
    require_once('../funciones/conexion.php');

    $id=$_POST['id'];
    
    $nombre=$_POST['nombre'];
    $extension=$_POST['fecha_creacion'];

    $sql="UPDATE roles SET  nombre='$nombre',fecha_creacion='$fecha_creacion' WHERE id='$id'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../agregar_roles.php");
    }
?>