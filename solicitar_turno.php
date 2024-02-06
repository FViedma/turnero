<!doctype html>

<html>

<head>

	<meta charset="utf-8">

	<title>Solicitar turno</title>

	<link rel="stylesheet" type="text/css" href="css/generales.css">
	<link rel="stylesheet" type="text/css" href="css/solicitarTurno.css">

</head>

<body>

	<div class="contenedor-principal">

		<?php

		require_once('funciones/conexion.php');
		require_once('funciones/funciones.php');

		$turno = "";
		$turnoAm = "";
		$turnoD = "";
		//turnos
		$sqlG = "select turno from turnos order by id desc";
		$error = "Error al seleccionar el turno";

		$buscar = consulta($con, $sqlG, $error);

		$resultado = mysqli_fetch_assoc($buscar);
		$noResultados = mysqli_num_rows($buscar);

		if ($noResultados == 0) {
			$turno = "000";
		} else {
			$turno = $resultado['turno'];
		}

		$sqlA = "select turno from turnoadultos order by id desc";
		$error = "Error al seleccionar el turno";

		$buscarA = consulta($con, $sqlA, $error);

		$resultado = mysqli_fetch_assoc($buscarA);
		$noResultados = mysqli_num_rows($buscarA);

		if ($noResultados == 0) {
			$turnoAm = "000";
		} else {
			$turnoAm = $resultado['turno'];
		}

		$sqlD = "select turno from turnodiscapacitados order by id desc";
		$error = "Error al seleccionar el turno";

		$buscarD = consulta($con, $sqlD, $error);

		$resultado = mysqli_fetch_assoc($buscarD);
		$noResultados = mysqli_num_rows($buscarD);

		if ($noResultados == 0) {
			$turnoD = "000";
		} else {
			$turnoD = $resultado['turno'];
		}

		//datos de la empresa
		$sqlE = "select * from info_empresa";
		$errorE = "Error al cargar datos de la empresa ";

		$buscarE = consulta($con, $sqlE, $errorE);

		$info = mysqli_fetch_assoc($buscarE);

		?>
		<div class="contenedor-caja">

			<header class="contenedor-logo">

				<figure class="logo-empresa">
					<img src="<?php echo $info['logo']; ?>">
				</figure>

				<h1 class="nombre-empresa"><?php echo $info['nombre']; ?> Bienvenido</h1>

			</header>

			<div class="clear"></div>

			<span class="datos-turno">Turno: <span id="turno"><?php echo $turno; ?></span></span>

			<input type="submit" name="General" id="General" value="General">
			<input type="hidden" name="turnoGeneral" id="turnoGeneral" value=""></br>

			<span class="datos-turno">Turno: <span id="turnoA"><?php echo $turnoAm; ?></span></span>

			<input type="submit" name="Adulto_Mayor" id="Adulto_Mayor" value="Adulto Mayor">
			<input type="hidden" name="turnoAdulto" id="turnoAdulto" value=""></br>

			<span class="datos-turno">Turno: <span id="turnoD"><?php echo $turnoD; ?></span></span>

			<input type="submit" name="Discapacidad" id="Discapacidad" value="Discapacidad">
			<input type="hidden" name="turnoDiscapacidad" id="turnoDiscapacidad" value="">

			<div class="clear"></div>


		</div>


	</div>

	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/funcionesGenerales.js"></script>
	<script src="js/solicitarTurno.js"></script>

</body>

</html>