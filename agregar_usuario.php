<!doctype html>
<html>

<head>

    <meta charset="utf-8">

    <title>Registro de Usuarios</title>

    <link rel="stylesheet" type="text/css" href="css/generales.css">
    <link rel="stylesheet" type="text/css" href="css/agregar_usuarios.css">
    

    <script src="js/funcionesGenerales.js"></script>
    <script src="js/agregar_usuarios.js"></script>
    

</head>

<body>

    <div class="contenedor-principal">
        <div class="contenedor-info" id="info-usuario">

            <h1>Registro de usuarios</h1>

            <?php

            require_once('funciones/conexion.php');
            require_once('funciones/funciones.php');
            
            
            $sql="SELECT *  FROM usuarios";
            $error_msg = "No existen usuarios";

            $query=consulta($con,$sql,$error_msg);

            $mensaje = "";

            if (isset($_POST['enviar'])) {

                $datos = array($_POST['usuario'], $_POST['password'], $_POST["id_Adm"], $_POST["id_rol"], $_POST["fecha_alta"], $_POST["fecha_actualizacion"]);

                if (verificar_datos($datos)) {

                    $usuario = limpiar($con, $_POST['usuario']);
                    $password = limpiar($con, $_POST['password']);
					$id_Adm = limpiar($con, $_POST['id_Adm']);
					$id_rol = limpiar($con, $_POST['id_rol']);
					$fecha_alta = limpiar($con, $_POST['fecha_alta']);
					$fecha_actualizacion = limpiar($con, $_POST['fecha_actualizacion']);
                    $status = true;

                    if ($_FILES['usuario']['name'] != '') {
                        $name = $_FILES['usuario']['name'];
                        $tmp_name = $_FILES['usuario']['tmp_name'];
                        $size = $_FILES['usuario']['size'];
						$type = $_FILES['usuario']['type'];
                        
                        $mensajes = json_decode($mensajes);
                        $status = $mensajes->status;
                        $mensaje = $mensajes->mensaje;
                        $logo = "usuarios='$mensajes->imagen',";
                    } else {

                        $logo = '';
                    }

                    if ($status == true) {
                        $id = 2;

                        $sql = "update usuarios set $logo usuario='$usuario',password='$password', id_Adm='$id_Adm', id_rol='$id_rol', fecha_alta='$fecha_alta', fecha_actualizacion='$fecha_actualizacion' WHERE id = '$id'";
                        $error = "Error la actualizar de usuarios";
                        $editar = consulta($con, $sql, $error);

                        if ($editar == true) {

                            $mensaje = "<div class='correcto'>Usuarios actualizados </div>";
                        } else {

                            $mensaje = "<div class='mensaje'>Error de usuarios actualizados/div>";
                        }
                    }
                } else {

                    $mensaje = "<div class='mensaje'>Hay campos vacios</div>";
                }

            }

            $sql = "select * from usuarios";
            $error = "Error al cargar los usuarios";
            $buscar = consulta($con, $sql, $error);

            $sqlE = "select * from info_empresa";
            $errorE = "Error al cargar datos de la empresa ";
            $buscarE = consulta($con, $sqlE, $errorE);

            $infoE = mysqli_fetch_assoc($buscarE);

            $info = mysqli_fetch_assoc($buscar);
            $idUsuario = $info['id'];

            $nombre = $info['usuario'];
            $password = $info['password'];
			$idCaja = $info['idCaja'];
			$id_rol = $info['id_rol'];
			$fecha_alta = $info['fecha_alta'];
			$fecha_actualizacion = $info['fecha_actualizacion'];


            $sql = "SELECT *  FROM usuarios";
            $error_msg = "No existen usuarios";

            $query = consulta($con, $sql, $error_msg);

            ?>

            <ul class="info-usuario">

                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
						    <th>id</th>
                            <th>usuario</th>
                            <th>id_Caja</th>
                            <th>id_rol</th>
                    
                            <th align="center" colspan="2">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>

                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['usuario']?></td>
                                
                                <td><?php echo $row['idCaja']?></td>
                                <td><?php echo $row['id_rol']?></td>
                                

                                <td><a href="usuario/actualizar_u.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></td>
                                <td><a href="usuario/delete_u.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></td>                                        
                             </tr>
                            <?php 
                            }
                            ?>
                    </tbody>
                </table>

            </ul>

            <button id="usuarioInfo" value="<?php echo $idUsuario; ?>">Ingresar</button>

            <div class="mensajes"><?php echo $mensaje; ?></div>

        </div>


        <form action="Usuario/insertar_u.php" method="post" name="formLogin" id="form-cambiar-usuario" class="form-editar" enctype="multipart/form-data">
       

            <h1>Agregar Usuarios</h1>

            

            <div class="contenedor-controles">

                <div class="col-md-3">
                
                    
                    <FONT color="black">Nombre :</FONT></br>
                    <input type="text" class="form-control mb-3" name="usuario" placeholder="Usuario">
					<br></br>
					<FONT color="black">Contraseña :</FONT></br>
                    <input type="password" class="form-control mb-3" name="password" placeholder="Password">
					<br></br>
					<FONT color="black">Ventanilla :</FONT></br>
                    <!--<input type="value" class="form-control mb-3" name="idCaja" placeholder="IdCaja">-->
                    <?php

                        $sql="select * from cajas";
						$error="Error al cargar las cajas";

							$buscar=consulta($con,$sql,$error);

							?>

                            <select id="caja" name="caja">

                            	<option value="ninguno">Selecciona una Ventanilla</option>

                                <?php

                                	while($caja=mysqli_fetch_assoc($buscar)){
										//echo "<option value='$caja[id]'>$caja[nombre]</option>";
                                        echo "<option value='" . $caja['id'] . "'>" . $caja['nombre'] . "</option>";
                                        echo "<td>" . $caja["id"] . "</td>";
									}
								?>

                            </select>

					<br></br>
					<FONT color="black">Rol :</FONT></br>
                    <!--<select type="value" class="form-control mb-3" name="id_rol" placeholder="Id_Rol">-->
  
                    <?php

                        $sql="select * from roles";
						$error="Error al cargar los roles";
                        
						$buscar=consulta($con,$sql,$error);

					?>

                    <select name="rol" id="rol">
                        
                        <option value="ninguno">Selecciona un rol</option>
                            
                        <?php
                            
                            while($rol=mysqli_fetch_assoc($buscar)){ 
								//echo "<option value='$rol[id]'>$rol[nombre]</option>";
                                echo "<option value='" . $rol['id'] . "'>" . $rol['nombre'] . "</option>";
                                echo "<td>" . $rol["id"] . "</td>";
							}
						?>

                    </select>
                    <br></br>
                    
                    <input type="submit" id="editarUsuario" class="btn btn-primary" value="Enviar" style='width:70px; height:25px'>
				
                </div>

            </div>

                <button class="cerrar" id="cerrarCambioUsuario" style='width:70px; height:25px'>Cerrar</button>
             
        </form>



        <a href="administrador.php" class="link-menu">Menu Principal</a>

    </div>

</body>

</html>
