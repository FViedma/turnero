<?php

    require_once('../funciones/conexion.php');
    require_once('../funciones/funciones.php');
    
    $sql="select * FROM usuarios";

    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
    
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $id_adm=$_POST['id_adm'];
    $id_rol=$_POST['id_rol'];
    $fecha_alta=date("Y-m-d h:i:s");
    $fecha_actualizacion=$_POST['fecha_actualizacion'];

    $pass_cifrado=encriptarMd5($password, PASSWORD_DEFAULT);

    $sql="INSERT INTO usuarios(usuario, password , id_adm, id_rol, fecha_alta, fecha_actualizacion) VALUES('$usuario','$pass_cifrado','$id_adm','$id_rol', '$fecha_alta', '$fecha_actualizacion')";

    $query= mysqli_query($con,$sql);

    if($query){

        Header("Location: ../agregar_usuario.php");
    
    }else {
        echo "error al insertar en base de datos";
    }    
?>