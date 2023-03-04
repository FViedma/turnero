<?php
include "conexion.php";
mysqli_query($conexion, "DELETE FROM contraref1");

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>FORMULARIO CONTRAREFERENCIA D7a.</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="shortcut icon" href="favicon.png">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('./img/viedma.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="excel.php">
							<img class="logo" src="img/logo4.png" alt="logo">
							<img class="logo-alt" src="img/logo4.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="img/MANUAL_DE_APLICACION_DE_PRESTACIONES.doc" download="SSPAM">Descargar SSPAM</a></li>
					<li><a href="img/Reglamento y RMNro132.pdf" download="Reglamento y RM 132">Descargar Reglamento y RM 132</a></li>
					<li><a href="img/MANUAL_DE_PRESTACIONES_LEY_475.xlsx" download="MANUAL_DE_PRESTACIONES_LEY_475">Descargar Manual de Prestaciones LEY 475</a></li>
					<li><a href="img/PRODUCTOS_EN_SALUD_III.docx" download="PRODUCTOS_EN_SALUD_III">Descargar Productos en Salud III</a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">



						<div class="home-content">
							<h1 class="white-text">FORMULARIO CONTRAREFERENCIA D7a.</h1>
							<p class="white-text"><strong>HOSPITAL CLINICO VIEDMA</strong>
							</p>
							<button name="aceptar"class="main-btn" onclick="window.location.href='Modulos/Registro/referencia.php'">REFERENCIA</button>
							<button name="aceptar"class="main-btn" onclick="window.location.href='Modulos/Registro/formularioD7a.php'">CONTRAREFERENCIA</button>
							<button name="aceptar"class="main-btn" onclick="window.location.href='Modulos/Registro/transferencia.php'">TRANSFERENCIA</button>
							
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1"> 
						<button name="aceptar"class="main-btn" onclick="window.location.href='Modulos/Registro/reimprimir_formulario.php'">REIMPRESION DE FORMULARIOS</button>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->

	<!-- About -->


	<!-- Footer -->
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>
