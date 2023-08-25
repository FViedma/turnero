<!doctype html>
<html>

<head>

    <meta charset="utf-8">

    <title>Registro de Videos</title>

    <link rel="stylesheet" type="text/css" href="css/generales.css">
    <link rel="stylesheet" type="text/css" href="css/agregar_videos.css">
    

    <script src="js/funcionesGenerales.js"></script>
    <script src="js/agregar_videos.js"></script>
    

</head>

<body>

    <div class="contenedor-principal">
        <div class="contenedor-info" id="info-video">

            <h1>Registro de videos</h1>

            <?php

            require_once('funciones/conexion.php');
            require_once('funciones/funciones.php');
            
            
            $sql="SELECT *  FROM videos";
            $error_msg = "No existen videos";

            $query=consulta($con,$sql,$error_msg);

            $mensaje = "";

            if (isset($_POST['enviar'])) {

                $datos = array($_POST['nombre'], $_POST['extension']);

                if (verificar_datos($datos)) {

                    $nombre = limpiar($con, $_POST['nombre']);
                    $extension = limpiar($con, $_POST['extension']);
                    $status = true;

                    if ($_FILES['video']['name'] != '') {
                        $name = $_FILES['video']['name'];
                        $tmp_name = $_FILES['video']['tmp_name'];
                        $size = $_FILES['video']['size'];
						$type = $_FILES['video']['type'];
                        
                        $mensajes = json_decode($mensajes);
                        $status = $mensajes->status;
                        $mensaje = $mensajes->mensaje;
                        $logo = "video='$mensajes->imagen',";
                    } else {

                        $logo = '';
                    }

                    if ($status == true) {
                        $id = 2;

                        $sql = "update videos set $logo nombre='$nombre',extension='$extension' WHERE id = '$id'";
                        $error = "Error la actualizar de videos";
                        $editar = consulta($con, $sql, $error);

                        if ($editar == true) {

                            $mensaje = "<div class='correcto'>Videos actualizados </div>";
                        } else {

                            $mensaje = "<div class='mensaje'>Error de videos actualizados/div>";
                        }
                    }
                } else {

                    $mensaje = "<div class='mensaje'>Hay campos vacios</div>";
                } 

            }

            $sql = "select * from videos";
            $error = "Error al cargar los videos";
            $buscar = consulta($con, $sql, $error);

            $sqlE = "select * from info_empresa";
            $errorE = "Error al cargar datos de la empresa ";
            $buscarE = consulta($con, $sqlE, $errorE);

            $infoE = mysqli_fetch_assoc($buscarE);

            $info = mysqli_fetch_assoc($buscar);
            $idVideo = $info['id'];

            $nombre = $info['nombre'];
            $extension = $info['extension'];


            $sql = "SELECT *  FROM videos";
            $error_msg = "No existen videos";

            $query = consulta($con, $sql, $error_msg);

            ?>

            <ul class="info-video">

                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>nombre</th> 
                            <th>extension</th>
                            <th align="center" colspan="2">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>

                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nombre'] ?></th>
                                <td><?php echo $row['extension'] ?></td>
                                <td><a href="tabla_videos/actualizar.php?id=<?php echo $row['id'] ?>"href="#" class="btn btn-info">Editar</a></td>
                                <td><a href="tabla_videos/delete.php?id=<?php echo $row['id'] ?>" href="#" class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </ul>

            <button id="videoInfo" value="<?php echo $idVideo; ?>">Ingresar</button>

            <div class="mensajes"><?php echo $mensaje; ?></div>

        </div>


        <form action="Tabla_Videos/insertar.php" method="post" name="formLogin" id="form-cambiar-video" class="form-editar" enctype="multipart/form-data">
       

            <h1>Agregar videos</h1>

            

            <div class="contenedor-controles">

                <div class="col-md-3">

                    <input type="file" name="video" id="video" placeholder="agregar video mp4">
                    <br></br>
                    <input type="submit" id= "editarVideo" class="btn btn-primary" value="Enviar" style='width:70px; height:25px'>
                        

                </div>

            </div>

            <button class="cerrar" id="cerrarCambioVideo" style='width:70px; height:25px'>Cerrar</button>
             
        </form>



        <a href="administrador.php" class="link-menu">Menu Principal</a>

    </div>

</body>

</html>