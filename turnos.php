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

        <?php
        require_once('funciones/conexion.php');
        require_once('funciones/funciones.php');

        $sqlE = "select * from info_empresa";
        $errorE = "Error al cargar datos de la empresa";
        $buscarE = mysqli_query($con, $sqlE);

        $info = mysqli_fetch_assoc($buscarE);
        ?>
        <header>
            <div class="contenedor-logo">
                <div class="logo-empresa">
                    <img src="<?php echo $info['logo']; ?>">
                </div>
            </div>


            <div class="marco-tablaTurnos">
                <div class="contenedor-tablaTurnos">
                    <div class="columna-tablaTurnos">
                        <div class="tabla-turnosArriba">Tipo</div>
                        <div class="tabla-turnosAbajo1" id="verTipo">G</div>

                    </div>
                    <div class="columna-tablaTurnos">
                        <div class="tabla-turnosArriba">Turno</div>
                        <div class="tabla-turnosAbajo2" id="verTurno">000</div>

                    </div>
                    <div class="columna-tablaTurnos">
                        <div class="tabla-turnosArriba3">Adm</div>
                        <div class="tabla-turnosAbajo3" id="verCaja">0</div>
                    </div>

                </div>
            </div>

        </header>
        <section class="contenido">

            <div class="contenido-izquierda">

                <?php

                require_once('config.php');

                $url_appointments = 'http://reservas.hospitalviedma.org/index.php/api/v1/appointments/true';
                $ch_appointments = curl_init($url_appointments);

                // Configurar opciones de cURL para la autenticación básica
                curl_setopt($ch_appointments, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch_appointments, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                curl_setopt($ch_appointments, CURLOPT_USERPWD, "{$config['username']}:{$config['password']}");

                $appointments_json = curl_exec($ch_appointments);

                // Verificar errores
                if (curl_errno($ch_appointments)) {
                    echo 'Error: ' . curl_error($ch_appointments);
                }
                // Cerrar la conexión cURL
                curl_close($ch_appointments);

                // Decodificar la respuesta JSON de la primera API
                $appointments_data = json_decode($appointments_json, true);

                // Lista para almacenar los datos
                $data_list = array();

                // Recorrer la lista de citas
                foreach ($appointments_data as $appointment) {
                    $providerId = $appointment['providerId'];
                    $start = $appointment['start'];
                    $end = $appointment['end'];
                    $notes = $appointment['notes'];

                    // URL de la segunda API para obtener la información del proveedor
                    $url_provider = "http://reservas.hospitalviedma.org/index.php/api/v1/providers/$providerId";

                    // Inicializar cURL para la segunda solicitud HTTP
                    $ch_provider = curl_init($url_provider);

                    // Configurar opciones de cURL para la autenticación básica
                    curl_setopt($ch_provider, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch_provider, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    curl_setopt($ch_provider, CURLOPT_USERPWD, "{$config['username']}:{$config['password']}");

                    // Ejecutar la solicitud HTTP para obtener la información del proveedor
                    $provider_json = curl_exec($ch_provider);

                    // Verificar errores
                    if (curl_errno($ch_provider)) {
                        echo 'Error: ' . curl_error($ch_provider);
                    }

                    // Cerrar la conexión cURL para la segunda solicitud
                    curl_close($ch_provider);

                    // Decodificar la respuesta JSON de la segunda API
                    $provider_data = json_decode($provider_json, true);

                    // Obtener el nombre del proveedor
                    $firstName = $provider_data['firstName'];
                    $lastName = $provider_data['lastName'];

                    // Almacenar los datos en la lista
                    $data_list[] = array(
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'start' => $start,
                        'end' => $end,
                        'notes' => $notes
                    );
                }


                $error_msg = "No existen permisos";

                //datos de la empresa

                $mensaje = "";

                ?>

                <h1 class="nombre-empresa"><?php echo $info['nombre']; ?> Bienvenido</h1>
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
                                        <th colspan="5">LISTA DE DOCTORES CON PERMISOS</th>
                                    </tr>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Fecha_Permiso</th>
                                        <th>Fecha_Retorno</th>
                                        <th>Motivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data_list as $data) {
                                        echo '<tr>';
                                        echo '<td>' . $data['firstName'] . '</td>';
                                        echo '<td>' . $data['lastName'] . '</td>';
                                        echo '<td>' . substr($data['start'], 0, 10) . '</td>';
                                        echo '<td>' . substr($data['end'], 0, 10) . '</td>';
                                        echo '<td>' . $data['notes'] . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </body>

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
    <!--<script src="js/turnos.js"></script>-->

</body>

</html>