<!doctype html>
<html>

<head>

    <meta charset="utf-8">

    <title>Administraci&oacute;n</title>

    <link rel="stylesheet" type="text/css" href="css/generales.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

</head>

<body>
    <?php
    include('check_role.php');
    ?>

    <div class="contenedor-principal">

        <div class="contenedor-menu">

            <h1 class="titulo-seccion">Administraci&oacute;n</h1>

            <ul class="menu-ul">

                <li class="menu-li"><a href="registrar_usuarios.php">Registrar Usuarios</a></li>
                <li class="menu-li"><a href="registrar_cajas.php">Registrar Cajas</a></li>
                <li class="menu-li"><a href="perfil.php">Perfil de Usuario</a></li>
                <li class="menu-li"><a href="#" id="reset">Resetear turnos</a></li>
                <li class="menu-li"><a href="Registro/index 2.php">Agregar Video</a></li>
 
            </ul>

        </div><!--contenedor-->

        <a href="logout.php" class="link-menu">Cerrar Sesi&oacute;n</a>

    </div><!--contenedor principal-->

    <script src="js/funcionesGenerales.js"></script>

    <script>
        agregarEvento(window, 'load', iniciarReset, false);

        function iniciarReset() {

            var resetear = document.getElementById('reset');
            agregarEvento(resetear, 'click', function(e) {

                if (e) {

                    e.preventDefault();

                    id = e.target.id;

                }

                var datos = "registrar=reset-turnos";

                funcion = procesarReseteo;
                fichero = "consultas/registrar.php";

                conectarViaPost(funcion, fichero, datos);

            }, false);

            function procesarReseteo() {

                if (conexion.readyState == 4) {

                    var data = JSON.parse(conexion.responseText);

                    if (data.status == "correcto") {

                        alert("Turnos reseteados correctamente");

                    } else {

                        console.log("Error al resetear los turnos");

                    }

                } else {

                    console.log('cargando');
                }

            }

        }
    </script>

</body>

</html>