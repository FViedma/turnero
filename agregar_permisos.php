<!doctype html>
<html>

<head>

    <meta charset="utf-8">

    <title>Registro de Permisos</title>

    <link rel="stylesheet" type="text/css" href="css/generales.css">
    <link rel="stylesheet" type="text/css" href="css/agregar_permisos.css">
    

    <script src="js/funcionesGenerales.js"></script>
    <script src="js/agregar_permisos.js"></script>
    

</head>

<body>

    <div class="contenedor-principal">
        <div class="contenedor-info" id="info-permiso">

            <h1>Registro de Permisos</h1>

            <?php

            require_once('funciones/conexion.php');
            require_once('funciones/funciones.php');
            
            
            $sql="SELECT *  FROM permisos";
            $error_msg = "No existen permisos";

            $query=consulta($con,$sql,$error_msg);

            $mensaje = "";

            if (isset($_POST['enviar'])) {

                $datos = array($_POST['nombres'], $_POST['apellidos'], $_POST['fecha_permiso'],$_POST['fecha_retorno']);

                if (verificar_datos($datos)) {

                    $nombre = limpiar($con, $_POST['nombre']);
                    $apellidos = limpiar($con, $_POST['apellidos']);
                    $fecha_permiso = limpiar($con, $_POST['fecha_permiso']);
                    $fecha_retorno = limpiar($con, $_POST['fecha_retorno']);

                    $status = true;


                    if ($_FILES['permiso']['name'] != '') {
                        $name = $_FILES['permiso']['name'];
                        $tmp_name = $_FILES['permiso']['tmp_name'];
                        $size = $_FILES['permiso']['size'];
						$type = $_FILES['permiso']['type'];
                        
                        $mensajes = json_decode($mensajes);
                        $status = $mensajes->status;
                        $mensaje = $mensajes->mensaje;
                        $logo = "permiso='$mensajes->imagen',";
                    } else {

                        $logo = '';
                    }

                    if ($status == true) {
                        $id = 2;

                        $sql = "update permisos set $logo nombres='$nombres',apellidos='$apellidos', fecha_permiso='$fecha_permiso', fecha_retorno='$fecha_retorno' WHERE id = '$id'";
                        $error = "Error la actualizar de permisos";
                        $editar = consulta($con, $sql, $error);

                        if ($editar == true) {

                            $mensaje = "<div class='correcto'>Permisos actualizados </div>";
                        } else {

                            $mensaje = "<div class='mensaje'>Error de Permisos actualizados/div>";
                        }
                    }
                } else {

                    $mensaje = "<div class='mensaje'>Hay campos vacios</div>";
                } 

            }


            $sql = "select * from permisos";
            $error = "Error al cargar los permisos";
            $buscar = consulta($con, $sql, $error);

            $sqlE = "select * from info_empresa";
            $errorE = "Error al cargar datos de la empresa ";
            $buscarE = consulta($con, $sqlE, $errorE);

            $infoE = mysqli_fetch_assoc($buscarE);

            $info = mysqli_fetch_assoc($buscar);
            $idPermiso = $info['id'];

            $nombres = $info['nombres'];
            $apellidos = $info['apellidos'];
            $fecha_permiso = $info['fecha_permiso'];
            $fecha_retorno = $info['fecha_retorno'];

            $sql = "SELECT *  FROM permisos";
            $error_msg = "No existen permisos";

            $query = consulta($con, $sql, $error_msg);

            ?>

            <ul class="info-permiso">
            
                <table class="table-permiso">
                    <thead class="table-success table-striped">
                        <tr>
                            
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Fecha_Permiso</th>
                            <th>Fecha_Retorno</th>
                            
                            <th align="center" colspan="2">acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($query))
                            {   
                        ?>
                            <tr>
                                <td><?php echo $row['nombres']?></td>
                                <td><?php echo $row['apellidos']?></td>
                                <td><?php echo $row['fecha_permiso']?></td>
                                <td><?php echo $row['fecha_retorno']?></td>
                                
                                <th><a href="Tabla_permiso/actualizar_p.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="Tabla_permiso/delete_p.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>
                            </tr>
                            <?php 
                            }
                            ?>
                    </tbody>
                </table>
            
            </ul>

            <button id="permisoInfo" value="<?php echo $idAdmision; ?>">Ingresar</button>

            <div class="mensajes"><?php echo $mensaje; ?></div>

        </div><!--contenedor-->


        <form action="tabla_permiso/insertar_p.php" method="post" name="formLogin" id="form-cambiar-permiso" class="form-editar" enctype="multipart/form-data">
       

            <h1>Agregar Permisos</h1>

            

            <div class="contenedor-controles">

                <div class="col-md-3">
    
    
                    <label>nombres:</label></br>
                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                    <br></br>
                    <label>apellidos:</label></br>
                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">
                    <br></br>
                    <label>fecha_permiso:</label></br>
                    <input type="date" class="form-control mb-3" name="fecha_permiso" placeholder="Fecha_Permoso">
                    <br></br>
                    <label>fecha_retorno:</label></br>
                    <input type="date" class="form-control mb-3" name="fecha_retorno" placeholder="Fecha_Retorno">
                    <br></br>
        
                    <input type="submit" id="editarPermiso" class="btn btn-primary" value="Enviar" style='width:70px; height:25px'>
        
                </div>

            </div>


                <button class="cerrar" id="cerrarCambioPermiso" style='width:70px; height:25px'>Cerrar</button>
 
        </form>


        <a href="administrador.php" class="link-menu">Menu Principal</a>

    </div>

</body>

</html>