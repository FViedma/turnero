<?php
include('check_role.php');
?>
<!doctype html>
<html>

<head>

	<meta charset="utf-8">

	<title>Adm <?php echo $_SESSION['idCaja']; ?></title>

	<link rel="stylesheet" type="text/css" href="css/generales.css">
	<link rel="stylesheet" type="text/css" href="css/caja.css">

	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/funcionesGenerales.js"></script>
	<script src="js/websocket.js"></script>
	<script src="js/caja.js"></script>


</head>

<body>
	<div class="contenedor-principal">

		<div class="contenedor-caja">

			<?php
			require_once('funciones/conexion.php');
			require_once('funciones/funciones.php');
			$idCaja = $_SESSION['idCaja'];

			//seleccionar los turnos en la tabla atencion que correspondan a la caja y que estan en o en la columna atendido
			$sqlTurnosAtencion = "select id,turno from atencion where atendido='0' and idCaja='$idCaja'";
			$error = "Error al seleccionar el turno en atencion ";


			$buscarTurnosAtencion = consulta($con, $sqlTurnosAtencion, $error);

			$resultado = mysqli_fetch_assoc($buscarTurnosAtencion);
			$noResultados = mysqli_num_rows($buscarTurnosAtencion);

			if ($noResultados > 0) {

				$turno = $resultado['turno'];
			} else {

				$turno = "000";
			}

			?>

			<h1>Admision <?php echo $_SESSION['idCaja']; ?></h1>

			<span class="datos-usuario">Admisionista: <?php echo $_SESSION['usuario']; ?></span>

			<!-- atencion Fichas -->
			<span class="datos-turno">Turno: <span id="fichas">000</span></span>

			<input type="submit" class="atender" name="atenderF" id="atenderF" value="Fichas">
			<input type="hidden" name="fichas" id="noFichas" value="<?php echo $turno; ?>">
			<input type="hidden" id="idCaja" value="<?php echo $_SESSION['idCaja']; ?>">
			<input type="hidden" id="ocupado" value="false">
			<span id="mensajesF"></span></br>
			
			<!-- atencion general -->
			<span class="datos-turno">Turno: <span id="turno">000</span></span>

			<input type="submit" class="atender" name="atender" id="atender" value="General">
			<input type="hidden" name="turno" id="noTurno" value="<?php echo $turno; ?>">
			<input type="hidden" id="idCaja" value="<?php echo $_SESSION['idCaja']; ?>">
			<input type="hidden" id="ocupado" value="false">
			<span id="mensajesG"></span></br>
		

			<!-- atencion adultos mayores -->
			<span class="datos-turno">Turno: <span id="turnoAm">000</span></span>

			<input type="submit" class="atender" name="atenderAm" id="atenderAm" value="Adulto Mayor">
			<input type="hidden" name="turnoAm" id="noTurnoAm" value="<?php echo $turno; ?>">
			<input type="hidden" id="idCaja" value="<?php echo $_SESSION['idCaja']; ?>">
			<input type="hidden" id="ocupado" value="false">
			<span id="mensajesAm"></span></br>

			<!-- atencion discapacitados -->
			<span class="datos-turno">Turno: <span id="turnoD">000</span></span>

			<input type="submit" class="atender" name="atenderD" id="atenderD" value="Discapacitados">
			<input type="hidden" name="turnoD" id="noTurnoD" value="<?php echo $turno; ?>">
			<input type="hidden" id="idCaja" value="<?php echo $_SESSION['idCaja']; ?>">
			<input type="hidden" id="ocupado" value="false">
			<span id="mensajesD"></span></br>

			<div class="contenedor-img-status"><img src="img/desconectado.png" id="imgStatus"></div>
			<br>
			<a href="logout.php" class="salir" id="salir">Salir</a>

		</div>

	</div>

</body>

</html>