<?php

    require_once('../funciones/conexion.php');
    
    $sql="select * FROM registros";

    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
    
    
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $fecha_permiso=date("d-m-Y");
    $fecha_retorno=date("d-m-Y");
    

    $sql="INSERT INTO permisos(nombres,apellidos,fecha_permiso,fecha_retorno) VALUES('$nombres','$apellidos','$fecha_permiso','$fecha_retorno')";


    $query= mysqli_query($con,$sql);

    if($query){

        Header("Location: ../agregar_permisos.php");
    
    }else {
        echo "error al insertar en base de datos";
    }    
?>