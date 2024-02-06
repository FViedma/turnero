<?php

    require('../funciones/conexion.php');
    
    $id=$_GET['id'];
    
    $sql="DELETE FROM permisos  WHERE id='$id'";
    

    $query=mysqli_query($con,$sql);
   
    if($query){

        Header("Location: ../agregar_permisos.php");
    }   
?>