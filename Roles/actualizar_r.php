<?php
    require_once('../funciones/conexion.php');

    $id=$_GET['id'];
    $sql="SELECT * FROM roles WHERE id='$id'";

    // Realiza una consulta a la tabla videos
    $query=mysqli_query($con,$sql);
    
    // Obtiene una fila de resultados como un 
    // array asociativo, numérico, o ambos
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Roles</title>
    <link rel="stylesheet" type="text/css" href="../css/generales.css">
    <link rel="stylesheet" type="text/css" href="../css/roles.css">
</head>
<body>
    <div class="contenedor-principal">
        <div class="contenedor-info" id="info-roles">
            <div class="container mt-5">
                <h1>Editar Roles</h1>
            </div>
            <form action="update_r.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                <FONT color="black">Nombre:</FONT><br></br>
                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']  ?>"><br></br>
            
                <input type="submit" class="btn btn-primary btn-block" style='width:80px; height:25px' value="Actualizar">

                <button class="cerrar" id="cerrarCambioRoles" style='width:70px; height:25px'>Cerrar</button>

            </form>
        </div>
    </div>
</body>
</html>