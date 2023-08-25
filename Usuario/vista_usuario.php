<?php 

    require_once('../funciones/conexion.php');
    require_once('../funciones/funciones.php');

    $sql="SELECT *  FROM usuarios";
    $error_msg = "No existen usuarios";

    $query=consulta($con,$sql,$error_msg);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="usuario/usuario.css">
    <title>Usuarios</title>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Ingresar Usuarios</h1>
                <form action="insertar_u.php" method="POST">

                    <input type="text" class="form-control mb-3" name="usuario" placeholder="Usuario">
                    <input type="password" class="form-control mb-3" name="password" placeholder="Password">
                    <input type="select" class="form-control mb-3" name="id_adm" placeholder="Id_Adm">
                    <input type="select" class="form-control mb-3" name="id_rol" placeholder="Id_Rol" value="<?php echo $id_rol = $_POST['id_rol'] ?>">

                    <input type="submit" class="btn btn-primary">

                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>usuario</th>
                            <th>password</th>
                            <th>id_Adm</th>
                            <th>id_rol</th>
                            <th>fecha_alta</th>
                            <th>fecha_actualizacion</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <th><?php echo $row['id']?></th>
                                <th><?php echo $row['usuario']?></th>
                                <th><?php echo $row['password']?></th>
                                <th><?php echo $row['id_Adm']?></th>
                                <th><?php echo $row['id_rol']?></th>
                                <th><?php echo $row['fecha_alta']?></th>
                                <th><?php echo $row['fecha_actualizacion']?></th>

                                <th><a href="actualizar_u.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete_u.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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