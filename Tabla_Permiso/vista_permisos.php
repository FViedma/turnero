<?php 

    require_once('../funciones/conexion.php');
    require_once('../funciones/funciones.php');

    $sql="SELECT *  FROM permisos";
    $error_msg = "No existen permisos";

    $query=consulta($con,$sql,$error_msg);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/agregar_permisos.css">
    <title>Permisos</title>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Ingresar Permisos</h1>
                <form action="insertar_p.php" method="POST">

                    <input type="text" class="form-control mb-3" name="nombres" placeholder="nombres">
                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="apellidos">
                    <input type="date" class="form-control mb-3" name="fecha_permiso" placeholder="fecha_permiso">
                    <input type="date" class="form-control mb-3" name="fecha_retorno" placeholder="fecha_retorno">

                    <input type="submit" class="btn btn-primary">

                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>nombres</th>
                            <th>apellidos</th>
                            <th>fecha_Permiso</th>
                            <th>fecha_Retorno</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['nombres']?></td>
                                <td><?php echo $row['apellidos']?></td>
                                <td><?php echo $row['fecha_permiso']?></td>
                                <td><?php echo $row['fecha_retorno']?></td>

                                <th><a href="actualizar_p.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete_p.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>
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