<?php
    require_once('../funciones/conexion.php');

    $id=$_POST['id'];
    
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $idCaja=$_POST['idCaja'];
    $id_rol=$_POST['id_rol'];
    $fecha_alta=$_POST['fecha_alta'];


    $sql="UPDATE usuarios SET usuario='$usuario',password='$password', idCaja='$idCaja', id_rol='$id_rol', fecha_alta='$fecha_alta' WHERE id='$id'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../agregar_usuario.php");
    }
?>