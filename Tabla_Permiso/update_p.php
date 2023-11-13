<?php
    require_once('../funciones/conexion.php');

    $id=$_POST['id'];
    
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $fecha_permiso=$_POST['fecha_permiso'];
    $fecha_retorno=$_POST['fecha_retorno'];


    $sql="UPDATE permisos SET nombres='$nombres',apellidos='$apellidos', fecha_permiso='$fecha_permiso', fecha_retorno='$fecha_retorno' WHERE id='$id'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../agregar_permisos.php");
    }
?>