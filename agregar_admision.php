<!doctype html>
<html>

<head>

    <meta charset="utf-8">

    <title>Registro de Admision</title>

    <link rel="stylesheet" type="text/css" href="css/generales.css">
    <link rel="stylesheet" type="text/css" href="css/agregar_admision.css">
    

    <script src="js/funcionesGenerales.js"></script>
    <script src="js/agregar_admision.js"></script>
    

</head>

<body>

    <div class="contenedor-principal">
        <div class="contenedor-info" id="info-admision">

            <h1>Registro del Admisi&oacute;n</h1>

            <?php

            require_once('funciones/conexion.php');
            require_once('funciones/funciones.php');
            
            
            $sql="SELECT *  FROM cajas";
            $error_msg = "No existen cajas";

            $query=consulta($con,$sql,$error_msg);

            $mensaje = "";

            if (isset($_POST['enviar'])) {

                $datos = array($_POST['nombre'], $_POST['nombre_de_usuario'], $_POST['fecha_de_registro']);

                if (verificar_datos($datos)) {

                    $nombre = limpiar($con, $_POST['nombre']);
                    $idUsuario = limpiar($con, $_POST['nombre_de_usuario']);
                    $fecha_de_registro = limpiar($con, $_POST['fecha_de_registro']);

                    $status = true;


                    if ($_FILES['admision']['name'] != '') {
                        $name = $_FILES['admision']['name'];
                        $tmp_name = $_FILES['admision']['tmp_name'];
                        $size = $_FILES['admision']['size'];
						$type = $_FILES['admision']['type'];
                        
                        $mensajes = json_decode($mensajes);
                        $status = $mensajes->status;
                        $mensaje = $mensajes->mensaje;
                        $logo = "admision='$mensajes->imagen',";
                    } else {

                        $logo = '';
                    }

                    if ($status == true) {
                        $id = 2;

                        $sql = "update cajas set $logo nombre='$nombre',nombre_de_usuario='$nombre_de_usuario', fecha_de_registro='$fecha_de_registro' WHERE id = '$id'";
                        $error = "Error la actualizar de cajas";
                        $editar = consulta($con, $sql, $error);

                        if ($editar == true) {

                            $mensaje = "<div class='correcto'>Admisiones actualizados </div>";
                        } else {

                            $mensaje = "<div class='mensaje'>Error de Admisiones actualizados/div>";
                        }
                    }
                } else {

                    $mensaje = "<div class='mensaje'>Hay campos vacios</div>";
                } 

            }


            $sql = "select * from cajas";
            $error = "Error al cargar los cajas";
            $buscar = consulta($con, $sql, $error);

            $sqlE = "select * from info_empresa";
            $errorE = "Error al cargar datos de la empresa ";
            $buscarE = consulta($con, $sqlE, $errorE);

            $infoE = mysqli_fetch_assoc($buscarE);

            $info = mysqli_fetch_assoc($buscar);
            $idAdmision = $info['id'];

            $nombre = $info['nombre'];
            $nombre_de_usuario = $info['nombre_de_usuario'];
            $fecha_de_registro = $info['fecha_de_registro'];

            $sql = "SELECT *  FROM cajas";
            $error_msg = "No existen cajas";

            $query = consulta($con, $sql, $error_msg);

            ?>

            <ul class="info-admision">

            
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>Nombre_De_Usuario</th>
                           
                            <th align="center" colspan="2">acciones</th>

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
                                
                                    
                                <th><a href="Admision/actualizar_a.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="Admision/delete_a.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                             </tr>
                            <?php 
                            }
                            ?>
                    </tbody>
                </table>
            

            </ul>

            <button id="admisionInfo" value="<?php echo $idAdmision; ?>">Ingresar</button>

            <div class="mensajes"><?php echo $mensaje; ?></div>

        </div><!--contenedor-->


        <form action="Admision/insertar_a.php" method="post" name="formLogin" id="form-cambiar-admision" class="form-editar" enctype="multipart/form-data">
       

            <h1>Agregar Admisiones</h1>

            

            <div class="contenedor-controles">

                <div class="col-md-3">
    
    
                    <label>nombre:</label></br>
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                    <br></br>
                    <label>Nombre de Usuario:</label></br>
                    <input type="text" class="form-control mb-3" name="nombre_de_usuario" placeholder="Nombre_De_Usuario">
                    <br></br>
        
                    <input type="submit" class="btn btn-primary" value="Enviar" style='width:70px; height:25px'>
        
                </div>

            </div>


                <button class="cerrar" id="cerrarCambioAdmision" style='width:70px; height:25px'>Cerrar</button>
 
        </form>



        <a href="administrador.php" class="link-menu">Menu Principal</a>

    </div>

</body>

</html>