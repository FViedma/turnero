<?php

    require_once('../funciones/conexion.php');
    
    $sql="SELECT * FROM cajas";


    $query=mysqli_query($con,$sql);
    
    $row=mysqli_fetch_array($query);
      
    $nombre=$_POST['nombre'];
    $nombre_de_usuario=$_POST['nombre_de_usuario'];
    $fecha_de_registro=date("Y-m-d h:i:s");
   

    $sql="INSERT INTO cajas(nombre, nombre_de_usuario, fecha_de_registro) VALUES('$nombre','$nombre_de_usuario', '$fecha_de_registro')";


    $query= mysqli_query($con,$sql);

    if($query){

        Header("Location: ../agregar_admision.php");
    
    }else {
        echo "error al insertar en base de datos";
    }    
?>