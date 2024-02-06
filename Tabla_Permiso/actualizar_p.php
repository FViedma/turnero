<?php
require_once('../funciones/conexion.php');

$id = $_GET['id'];
$sql = "SELECT * FROM permisos WHERE id='$id'";

$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Permisos</title>
    <link rel="stylesheet" type="text/css" href="../css/generales.css">
    <link rel="stylesheet" type="text/css" href="../css/permisos.css">

</head>

<body>

    <div class="contenedor-principal">
        <div class="contenedor-info" id="info-permiso">
            <div class="container mt-5">
                <h1>Editar Permisos</h1>
            </div>
            <form action="update_p.php" method="POST">
                
                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                <FONT color="black">Nombres:</FONT><br></br>
                <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?php echo $row['nombres']  ?>"><br></br>
                <FONT color="black">Apellidos:</FONT><br></br>
                <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos']  ?>"><br></br>
                <FONT color="black">fecha_Permiso:</FONT><br></br>
                <input type="date" class="form-control mb-3" name="fecha_permiso" placeholder="Fecha_Permiso" value="<?php echo $row['fecha_permiso']  ?>"><br></br>
                <FONT color="black">fecha_retorno:</FONT><br></br>
                <input type="date" class="form-control mb-3" name="fecha_retorno" placeholder="fecha_Retorno" value="<?php echo $row['fecha_retorno']  ?>"><br></br>

                <input type="submit" class="btn btn-primary btn-block" id="actualizarPermiso" style='width:80px; height:25px' value="Actualizar"><br></br>

                <button class="cerrar" id="cerrarCambioPermiso" style='width:70px; height:25px'>Cerrar</button>

            </form>
        </div>

    </div>
</body>

</html>