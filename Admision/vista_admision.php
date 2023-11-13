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
        <div class="caja">
            <div class="col-md-3">
                <h1>Ingrese datos de Ventanilla</h1>
                <form action="insertar_a.php" method="POST">

                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                    <input type="select" class="form-control mb-3" name="idUsuario" placeholder="IdUsuario">
                    
                                    
                    <input type="submit" class="btn btn-primary">

                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>id_Usuario</th>
                            <th>fecha_de_registro</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            while($caja=mysqli_fetch_array($query)){
                        ?>
                            <tr>

                                <td><?php echo $caja['id']?></td>
                                <td><?php echo $caja['nombre']?></td>
                                <td><?php echo $caja['idUsuario']?>
                                <td><?php echo $caja['fecha_de_registro']?></td>
                                    
                                <td><a href="actualizar_a.php?id=<?php echo $caja['id'] ?>" class="btn btn-info">Editar</a></td>
                                <td><a href="delete_a.php?id=<?php echo $caja['id'] ?>" class="btn btn-danger">Eliminar</a></td>                                        
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