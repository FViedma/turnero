<?php
    require_once('../funciones/conexion.php');
    require_once('../funciones/funciones.php');

    $id=$_GET['id'];
    $sql="SELECT * FROM usuarios WHERE id='$id'";


    $query=mysqli_query($con,$sql);
    

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="usuario/usuario.css">
    <title>Editar Usuarios</title>
    <link rel="stylesheet" type="text/css" href="../css/generales.css">
    <link rel="stylesheet" type="text/css" href="../css/usuarios.css">
</head>
<body>
    <div class="contenedor-principal">
        <div class="contenedor-info" id="info-roles">
            <div class="container mt-5">
                <h1>Editar Usuarios</h1>
            </div>
            <form action="update_u.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                
                <FONT color="black">Nombre:</FONT><br></br>
                <input type="text" class="form-control mb-3" name="usuario" placeholder="Usuario" value="<?php echo $row['usuario']  ?>"><br></br>
                <FONT color="black">Contraseña:</FONT><br></br>
                <input type="password" class="form-control mb-3" name="password" placeholder="Password" value="<?php echo $row['password']  ?>"><br></br>
                <FONT color="black">Admisión:</FONT><br></br>
                <!--<input type="select" class="form-control mb-3" name="id_adm" placeholder="id_Adm" value="<?php echo $row['id_Adm']  ?>"><br></br>-->

                <?php

                        $sql="select * from cajas";
						$error="Error al cargar las cajas";

						$buscar=consulta($con,$sql,$error);

					?>

                    <select name="caja" id="caja">

                        <option value="ninguno">Selecciona un admision</option>

                        <?php

                            while($caja=mysqli_fetch_assoc($buscar)){
								echo "<option value='$caja[id]'>$caja[nombre]</option>";
							}
						?>

                    </select>
                    <br></br>
                <FONT color="black">Rol:</FONT><br></br>
                <!--<input type="select" class="form-control mb-3" name="id_rol" placeholder="id_Rol" value="<?php echo $row['id_rol']  ?>"><br></br>-->

                <?php

                        $sql="select * from roles";
						$error="Error al cargar las roles";

						$buscar=consulta($con,$sql,$error);

					?>

                    <select name="rol" id="rol">

                        <option value="ninguno">Selecciona un rol</option>

                        <?php

                            while($rol=mysqli_fetch_assoc($buscar)){
								echo "<option value='$rol[id]'>$rol[nombre]</option>";
							}
						?>

                    </select>
                    <br></br>
            
                <input type="submit" class="btn btn-primary btn-block" style='width:80px; height:25px' value="Actualizar">

                <button class="cerrar" id="cerrarCambioRoles" style='width:70px; height:25px'>Cerrar</button> 

            </form>
            
        </div>
    </div>
</body>
</html>