<?php
    require_once('../funciones/conexion.php');
    require_once('../funciones/funciones.php');

    $sql='SELECT * FROM cajas';
    $error_msg = "No existen cajas";

    $query=consulta($con,$sql,$error_msg);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admisiones</title>
    <link rel="stylesheet" type="text/css" src="Administracion/administracion.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Ingrese datos de Admision</h1>
                <form action="insertar_a.php" method="POST">

                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                    <input type="text" class="form-control mb-3" name="nombre_de_usuario" placeholder="Nombre_De_Usuario">
                    
                                    
                    <input type="submit" class="btn btn-primary">

                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>Nombre_De_Usuario</th>
                            <th>fecha_de_registro</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>

                                <th><?php echo $row['id']?></th>
                                <th><?php echo $row['nombre']?></th>
                                <th><?php echo $row['nombre_de_usuario']?></th>
                                <th><?php echo $row['fecha_de_registro']?></th>
                                    
                                <th><a href="actualizar_a.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete_a.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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