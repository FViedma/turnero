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

		// Consulta para obtener los últimos turnos de cada tipo
		$sql = "SELECT MAX(id), tipo, turno AS ultimo_turno FROM turnos GROUP BY id";
		$error = "Error al seleccionar los turnos";

		$buscar = consulta($con, $sql, $error);

		// Inicialización de variables
		$fichas = "000";
		$turno = "000";
		$turnoAm = "000";
		$turnoD = "000";

		// Procesamiento de los resultados
		while ($resultado = mysqli_fetch_assoc($buscar)) {
			switch ($resultado['tipo']) {
				case 'fichas':
					$fichas = $resultado['ultimo_turno'];
					break;
				case 'general':
					$turno = $resultado['ultimo_turno'];
					break;
				case 'adultos':
					$turnoAm = $resultado['ultimo_turno'];
					break;
				case 'discapacidad':
					$turnoD = $resultado['ultimo_turno'];
					break;
			}
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

			<span class="datos-turno">Turno: <span id="fichas"><?php echo $fichas; ?></span></span>

			<input type="submit" name="Fichas" id="Fichas" value="Fichas">
			<input type="hidden" name="turnoFichas" id="turnoFichas" value=""></br>

			<span class="datos-turno">Turno: <span id="turno"><?php echo $turno; ?></span></span>

			<input type="submit" name="General" id="General" value="General">
			<input type="hidden" name="turnoGeneral" id="turnoGeneral" value=""></br>

			<span class="datos-turno">Turno: <span id="turnoA"><?php echo $turnoAm; ?></span></span>

			<input type="submit" name="Adulto_Mayor" id="Adulto_Mayor" value="Adulto_Mayor">
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