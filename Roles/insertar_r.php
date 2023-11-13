<?php

    require_once('../funciones/conexion.php');
    
    $sql="select * FROM roles";

    $query=mysqli_query($con,$sql);

    $rol=mysqli_fetch_array($query);
    
    
    $nombre=$_POST['nombre'];
    $fecha_creacion=date("Y-m-d h:i:s");

    $sql="INSERT INTO roles(nombre, fecha_creacion) VALUES('$nombre','$fecha_creacion')";


    $query= mysqli_query($con,$sql);

    if($query){

        Header("Location: ../agregar_roles.php");
    
    }else {
        echo "error al insertar en base de datos";
    }    
?>