<?php 

    require_once('../funciones/conexion.php');
    require_once('../funciones/funciones.php');

    $sql="SELECT *  FROM videos";
    $error_msg = "No existen videos";

    $query=consulta($con,$sql,$error_msg);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="stylesheet" type="text/css" src="css/tabla_videos.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Ingresar Videos</h1>
                <form action="insertar.php" method="POST">

                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                    <input type="text" class="form-control mb-3" name="extension" placeholder="Extension">
                                    
                    <input type="submit" class="btn btn-primary">
                    
                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>extension</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>

                                <th><?php echo $row['id']?></th>
                                <th><?php echo $row['nombre']?></th>
                                <th><?php echo $row['extension']?></th>
                                    
                                <th><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>
                                                                        
                             </tr>

                            <?php 
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>