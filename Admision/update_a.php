<?php
    require_once('../funciones/conexion.php');

    $id=$_POST['id'];
    
    $nombre=$_POST['nombre'];
    $idUsuario=$_POST['idUsuario'];
    $fecha_de_registro=$_POST['fecha_de_registro'];

    $sql="UPDATE cajas SET nombre='$nombre', idUsuario='$idUsuario', fecha_de_registro='$fecha_de_registro' WHERE id='$id'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../agregar_admision.php");
    }
?>
