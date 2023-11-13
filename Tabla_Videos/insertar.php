<?php

    require_once('../funciones/funciones.php');
    require_once('../funciones/conexion.php');
       

    $uploads_dir = '../Videos';
    $error = $_FILES['video']['error'];
        if ($error == UPLOAD_ERR_OK) {
            $nombre =substr($_FILES.$nombre='name', -1,$extension='.mp4');
                   
            $nombre = basename($_FILES["video"]["name"],$extension='.mp4');
            
            $tmp_dir = $_FILES['video']['tmp_name'];
            move_uploaded_file($tmp_dir, $uploads_dir."\\".$nombre.$extension);
        }
    
    $sql="INSERT INTO videos(nombre, extension) VALUES('$nombre','$extension')";

    $query= mysqli_query($con,$sql);
    

    if($query){

       header("Location: ../agregar_videos.php");
    
    }else {
       echo "error al insertar en base de datos";
   }    
?>