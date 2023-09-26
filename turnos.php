<!doctype html>
<html>
	<head>
	
    	<meta charset="utf-8">
	
    	<title>Turnos</title>
    
        <link rel="stylesheet" type="text/css" href="css/generales.css">
        <link rel="stylesheet" type="text/css" href="css/turnos.css">
        <link rel="stylesheet" type="text/css" href="css/responsivo-turnos.css">
        
    
    </head>
	<body>
    	
        <div class="contenedor-principal">
        	
            <header>

                <div class="marco-tablaTurnos">
        
                    <div class="contenedor-tablaTurnos">
                    <div class="columna-tablaTurnos">
                            <div class="tabla-turnosArriba">Tipo</div>
                            <div class="tabla-turnosAbajo" id="verTipo">G</div>

                        </div>
                        <div class="columna-tablaTurnos">
                            <div class="tabla-turnosArriba">Turno</div>
                            <div class="tabla-turnosAbajo" id="verTurno">000</div>

                        </div>
                        <div class="columna-tablaTurnos">
                            <div class="tabla-turnosArriba">Adm</div>  
                            <div class="tabla-turnosAbajo" id="verCaja">0</div>
                        </div>
                        
                    </div>

            
            </header>
            
            <section class="contenido">
                        
                <div class="contenido-izquierda">

                    <?php 
                        require_once('funciones/conexion.php');
                        require_once('funciones/funciones.php');
                        
                        $sql="SELECT *  FROM permisos";
                        $error_msg = "No existen permisos";

                        //datos de la empresa
                        $sqlE = "select * from info_empresa";
                        $errorE = "Error al cargar datos de la empresa ";
                        $buscarE = consulta($con,$sqlE,$errorE);
                            
                        $info = mysqli_fetch_assoc($buscarE); 
                        
                        $query=consulta($con,$sql,$error_msg);

                        $mensaje = "";
                    
                    ?>
                    
                    <header class="contenedor-logo">

                        <div class="logo-empresa">
                        
                            <img src="<?php echo $info['logo'];?>">
                        
                        </div>
                        
                        <h1 class="nombre-empresa"><?php echo $info['nombre'];?> Bienvenido</h1>
                        
		            </header>
                    
                <div class="contenedor-video">
                    
                    <div class="contenedor-reproductor">
                        <select name="listaVideos" id="listaVideos" hidden>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM videos") or die(mysqli_error($con)); //mysql_error 

                            while ($row = mysqli_fetch_array($query)) {
                                echo "<option value='" . $row['nombre'] . $row['extension'] . "'></option>";
                            }
                            ?>
                            
                        </select>
                        
                        
                        <video id="videoPlayer" width="500" controls autoplay>
                            <?php

                            $query = mysqli_query($con, "SELECT * FROM videos") or die(mysqli_error($con)); //mysql_error 

                            while ($row = mysqli_fetch_array($query)) {
                                echo "<source src='videos/" . $row['nombre'] . $row['extension'] . "' type='video/mp4'></source>";
                            }
                              
                            ?>
                            
                        </video>
                        <body>
                            <table id="miTabla">
                                <thead>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Fecha_Permiso</th>
                                        <th>Fecha_Retorno</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM permisos") or die(mysqli_error($con)); //mysql_error 
                                    $datos = array();    
            
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['nombres'] . "</td>";
                                        echo "<td>" . $row['apellidos'] . "</td>";
                                        echo "<td>" . $row['fecha_permiso'] . "</td>";
                                        echo "<td>" . $row['fecha_retorno'] . "</td>";
                                        echo "</tr>";
                                    }
                                    $con->close();
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="contenido-derecha">

                <div class="contenedor-turnos">

                    <table class="tabla-turnos" id="tabla-turnos">
                        <tr>
                            <th>Turno</th>
                            <th colspan="2">Adm</th>
                        </tr>
                    </table>

                </div><!--contenedor turnos-->

            </div>
            

        </section><!--contenido-->

        

        <footer class="footer">

            <marquee class="noticias">Bienvenidos al Hospital Clínico Viedma, sistema de ordenamiento de filas proximamente en funcionamiento.</marquee>
            <img src=""> 
        </footer>

    </div><!--contenedor principal-->

    <audio src="tonos/hangouts_message.ogg" id="tono"></audio>

    <script src="js/funcionesGenerales.js"></script>
    <script src="js/websocket.js"></script>
    <script src="js/video.js"></script>
    <script src="js/permisos.js"></script>
</body>

</html>
