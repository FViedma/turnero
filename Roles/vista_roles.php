<?php 

    require_once('../funciones/conexion.php');
    require_once('../funciones/funciones.php');

    $sql="SELECT *  FROM roles";
    $error_msg = "No existen videos";

    $query=consulta($con,$sql,$error_msg);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <link rel="stylesheet" type="text/css" src="roles/roles.css.css">
</head>
<body>

    <div class="container mt-5">
        <div class="rol">
            <div class="col-md-3">
                <h1>Ingrese los Roles</h1>
                <form action="insertar_r.php" method="POST">

                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                                    
                    <input type="submit" class="btn btn-primary">

                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>fecha_creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            while($rol=mysqli_fetch_array($query)){
                        ?>
                            <tr>

                                <td><?php echo $rol['id']?></td>
                                <td><?php echo $rol['nombre']?></td>
                                <td><?php echo $rol['fecha_creacion']?></td>
                                    
                                <td><a href="actualizar_r.php?id=<?php echo $rol['id'] ?>" class="btn btn-info">Editar</a></td>
                                <td><a href="delete_r.php?id=<?php echo $rol['id'] ?>" class="btn btn-danger">Eliminar</a></td>                                        
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
