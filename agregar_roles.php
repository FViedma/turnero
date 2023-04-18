<!doctype html>
<html>

<head>

    <meta charset="utf-8">

    <title>Registro de Roles</title>

    <link rel="stylesheet" type="text/css" href="css/generales.css">
    <link rel="stylesheet" type="text/css" href="css/agregar_roles.css">
    

    <script src="js/funcionesGenerales.js"></script>
    <script src="js/agregar_roles.js"></script>
    

</head>

<body>

    <div class="contenedor-principal">
        <div class="contenedor-info" id="info-roles">

            <h1>Registro de Roles</h1>

            <?php

            require_once('funciones/conexion.php');
            require_once('funciones/funciones.php');
            
            
            $sql="SELECT *  FROM roles";
            $error_msg = "No existen roles";

            $query=consulta($con,$sql,$error_msg);

            $mensaje = "";

            if (isset($_POST['enviar'])) {

                $datos = array($_POST['nombre'], $_POST['fecha_creacion']);

                if (verificar_datos($datos)) {

                    $nombre = limpiar($con, $_POST['nombre']);
                    $fecha_de_registro = limpiar($con, $_POST['fecha_creacion']);

                    $status = true;

                    if ($_FILES['roles']['name'] != '') {
                        $name = $_FILES['roles']['name'];
                        $tmp_name = $_FILES['roles']['tmp_name'];
                        $size = $_FILES['roles']['size'];
						$type = $_FILES['roles']['type'];
                        
                        $mensajes = json_decode($mensajes);
                        $status = $mensajes->status;
                        $mensaje = $mensajes->mensaje;
                        $logo = "roles='$mensajes->imagen',";
                    } else {

                        $logo = '';
                    }

                    if ($status == true) {
                        $id = 2;

                        $sql = "update roles set $logo nombre='$nombre',fecha_creacion='$fecha_creacion' WHERE id = '$id'";
                        $error = "Error la actualizar de roles";
                        $editar = consulta($con, $sql, $error);

                        if ($editar == true) {

                            $mensaje = "<div class='correcto'>Roles actualizados </div>";
                        } else {

                            $mensaje = "<div class='mensaje'>Error de Roles actualizados/div>";
                        }
                    }
                } else {

                    $mensaje = "<div class='mensaje'>Hay campos vacios</div>";
                } 

            }


            $sql = "select * from roles";
            $error = "Error al cargar los roles";
            $buscar = consulta($con, $sql, $error);

            $sqlE = "select * from info_empresa";
            $errorE = "Error al cargar datos de la empresa ";
            $buscarE = consulta($con, $sqlE, $errorE);

            $infoE = mysqli_fetch_assoc($buscarE);

            $info = mysqli_fetch_assoc($buscar);
            $idRoles = $info['id'];

            $nombre = $info['nombre'];
            $fecha_creacion = $info['fecha_creacion'];

            $sql = "SELECT *  FROM roles";
            $error_msg = "No existen roles";

            $query = consulta($con, $sql, $error_msg);

            ?>

            <ul class="info-roles">

            
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id</th>
                            <th>nombre</th>
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

                                    
                                <th><a href="Roles/actualizar_r.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="Roles/delete_r.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                             </tr>
                            <?php 
                            }
                            ?>
                    </tbody>
                </table>
            

            </ul>

            <button id="rolesInfo" value="<?php echo $idRoles; ?>">Ingresar</button>

            <div class="mensajes"><?php echo $mensaje; ?></div>

        </div><!--contenedor-->


        <form action="Roles/insertar_r.php" method="post" name="formLogin" id="form-cambiar-roles" class="form-editar" enctype="multipart/form-data">
       

            <h1>Agregar Roles</h1>

            

            <div class="contenedor-controles">

                <div class="col-md-3">
    
    
                    <label>nombre:</label><br></br>
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                    <br></br>
                    
                    <input type="submit" class="btn btn-primary" value="Enviar" style='width:70px; height:25px'>
        
        

    
                </div>

            </div>

                <button class="cerrar" id="cerrarCambioRoles" style='width:70px; height:25px'>Cerrar</button>
 
        </form>



        <a href="administrador.php" class="link-menu">Menu Principal</a>

    </div>

</body>

</html>