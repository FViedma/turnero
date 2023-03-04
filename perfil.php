<!doctype html>

<html>

<head>

    <meta charset="utf-8">

    <title>Administrar Perfil</title>

    <link rel="stylesheet" type="text/css" href="css/generales.css">
    <link rel="stylesheet" type="text/css" href="css/registro_de_cajas.css">

</head>

<body>
    <div class="contenedor-principal">

        <?php
        $mensaje = "";
        include('check_role.php');
        include('funciones/conexion.php');
        include('funciones/funciones.php');
        require_once('constants.php');

        if (isset($_POST['modificar'])) {
            $data = array($_POST['usuario']);
            if (verificar_datos($data)) {
                $sql = sprintf("SELECT usuario, id_rol FROM usuarios WHERE id=%d", $_SESSION['id']);
                $error = "Error al seleccionar el usuario";
                $buscar = consulta($con, $sql, $error);
                $noUsuario = mysqli_num_rows($buscar);
                
                if ($noUsuario == 1) {
                    $usuario = mysqli_fetch_array($buscar);
                    $fecha = date('Y-m-d H:i:s');
                    if (isset($_POST['usuario']) && isset($_POST['password'])) {
                        $password = encriptarMd5($_POST['password']);
                        $sql = sprintf("UPDATE usuarios SET usuario='%s', password='%s', fecha_actualizacion='%s' WHERE id=%d",$_POST['usuario'],$password, $fecha, $_SESSION['id']);
                    } elseif (isset($_POST['usuario'])) {
                        $sql = sprintf("UPDATE usuarios SET usuario='%s', fecha_actualizacion='%s' WHERE id=%d",$_POST['usuario'], $fecha, $_SESSION['id']);
                    }
                    $error = "Error al actualizar el usuario";

                    $registrar = consulta($con, $sql, $error);

                    if ($registrar == true) {

                        $mensaje = "<span class='correcto'>Usuario actualizado</span>";
                    } else {

                        $mensaje = "<span class='mensaje'>error al actualizar usuario</span>";
                    }
                } else {

                    $mensaje = '<span class="mensaje">Usuario no encontrado</span>';
                }
            } else {

                $mensaje = "<span class='mensaje'>Hay campos vacios</span>";
            }
        }

        ?>

        <section>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="formLogin" id="formLogin" class="form-login">

                <h1>Administrar Perfil</h1>

                <div class="contenedor-controles">
                    <?php
                    $sql = sprintf("SELECT usuario, id_rol FROM usuarios WHERE id=%d", $_SESSION['id']);
                    $error = "Error al seleccionar las cajas";
                    $buscar = consulta($con, $sql, $error);
                    $usuario = mysqli_fetch_array($buscar);
                    ?>

                    <label>Usuario:</label>
                    <input type="text" name="usuario" value="<?php echo $usuario['usuario']; ?>">
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Ingrese su password">
                    <?php
                    $sql = sprintf("SELECT id, nombre FROM roles");
                    $error = "Error al seleccionar los roles";
                    $roles = consulta($con, $sql, $error);

                    $sqlRol = sprintf("SELECT id, nombre FROM roles WHERE id=%d", $usuario['id_rol']);
                    $error = "Error al seleccionar el rol actual";
                    $buscarRolActual = consulta($con, $sql, $error);
                    $rolActual = mysqli_fetch_array($buscarRolActual);
                    ?>
                    <select name="rol" id="rol">
                        <?php
                        while ($rol = mysqli_fetch_array($roles)) {
                            if ($rol['id'] == $rolActual['id']) {
                                echo "<option value='$rol[id]' selected>$rol[nombre]</option>";
                            } else {
                                echo "<option value='$rol[id]'>$rol[nombre]</option>";
                            }
                        }
                        ?>
                    </select>

                    <input type="submit" name="modificar" id="modificar" value="Actualizar">


                </div>

                <span class="mensajes"><?php echo $mensaje; ?></span>

            </form>

            <a href="administrador.php" class="link-menu">Atr&aacute;s</a>

        </section>

    </div>

</body>

</html>