<?php
require_once('../funciones/conexion.php');

$id = $_GET['id'];
$sql = "SELECT * FROM cajas WHERE id='$id'";

$query = mysqli_query($con, $sql);

$caja = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Admision</title>
    <link rel="stylesheet" type="text/css" href="../css/generales.css">
    <link rel="stylesheet" type="text/css" href="../css/admision.css">

</head>

<body>

    <div class="contenedor-principal">
        <div class="contenedor-info" id="info-admision">
            <div class="container mt-5">
                <h1>Editar Admisi&oacute;n</h1>
            </div>
            <form action="update_a.php" method="POST">
                
                <input type="hidden" name="id" value="<?php echo $caja['id']  ?>">
                <FONT color="black">Nombre:</FONT><br></br>
                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $caja['nombre']  ?>"><br></br>
                <FONT color="black">idUsuario:</FONT><br></br>
                <!--<input type="text" class="form-control mb-3" name="idUsuario" placeholder="IdUsuario" value="<?php echo $caja['idUsuario']  ?>"><br></br>-->

                <?php

                    $sql="select * from usuarios";
					$error="Error al cargar los usuarios";

					$buscar=consulta($con,$sql,$error);

				?>

                    <select id="usuario" name="usaurio">

                        <option value="ninguno">Selecciona un usuario</option>

                        <?php

                            while($usuario=mysqli_fetch_assoc($buscar)){
								//echo "<option value='$usuario[id]'>$usuario[usuario]</option>";
                                echo "<option value='" . $usuario['id'] . "'>" . $usuario['usuario'] . "</option>";
                                echo "<td>" . $usuario["id"] . "</td>";
							}
						?>

                    </select>
                    <br></br>

                <input type="submit" class="btn btn-primary btn-block" id="actualizarVentana" style='width:80px; height:25px' value="Actualizar"><br></br>

                <button class="cerrar" id="cerrarCambioAdmision" style='width:70px; height:25px'>Cerrar</button>
            </form>
        </div>

    </div>
</body>

</html>
