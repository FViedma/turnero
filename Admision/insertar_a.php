<?php

    require_once('../funciones/conexion.php');
    
    $sql="SELECT * FROM cajas";


    $query=mysqli_query($con,$sql);
    
    $caja=mysqli_fetch_array($query);
      
    $nombre=$_POST['nombre'];
    $idUsuario=$_POST['idUsuario'];
    $fecha_de_registro=date("Y-m-d h:i:s");
   

    $sql="INSERT INTO cajas(nombre, idUsuario, fecha_de_registro) VALUES('$nombre','$idUsuario', '$fecha_de_registro')";


    $query= mysqli_query($con,$sql);

    if($query){

        Header("Location: ../agregar_admision.php");
    
    }else {
        echo "error al insertar en base de datos";
    }    
?>
