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
					
					//turnos
					$sqlGeneral = "select turno from turnos order by id desc";
					$sqlAdultos = "select turno from turnoadultos order by id desc";
					$sqlDiscapacidad = "select turno from turnodiscapacitados order by id desc";
					$error = "Error al seleccionar el turno";

					$buscarGeneral = consulta($con,$sqlGeneral,$error);
					$buscarAdulto = consulta($con,$sqlAdultos,$error);
					$buscarDiscapacidad = consulta($con,$sqlDiscapacidad,$error);
					
					$resultadoGeneral = mysqli_fetch_assoc($buscarGeneral);	
					$noResultadosGeneral = mysqli_num_rows($buscarGeneral);

					$resultadoAdulto = mysqli_fetch_assoc($buscarAdulto);	
					$noResultadosAdulto = mysqli_num_rows($buscarAdulto);
					
					$resultadoDiscapacidad = mysqli_fetch_assoc($buscarDiscapacidad);	
					$noResultadosDiscapacidad = mysqli_num_rows($buscarDiscapacidad);
					
					if($noResultadosGeneral == 0){

						$turno = "G-001";

					}else{

						$turno = "G-".$resultadoGeneral['turno'];
	
					}

					if($noResultadosAdulto == 0){

						$turnoAm = "AM-001";

					}else{
                        echo $resultadoAdulto['turno'];
						$turnoAm = "AM-".$resultadoAdulto['turno'];
	
					}

					if($noResultadosDiscapacidad == 0){

						$turnoDis = "D-001";

					}else{

						$turnoDis = "D-".$resultadoDiscapacidad['turno'];
	
					}

					
					//datos de la empresa
					$sqlE = "select * from info_empresa";
					$errorE = "Error al cargar datos de la empresa ";

					$buscarE = consulta($con,$sqlE,$errorE);
						
					$info = mysqli_fetch_assoc($buscarE);	

			?>
        	<div class="contenedor-caja">

                <header class="contenedor-logo">

                	<figure class="logo-empresa">
                		<img src="<?php echo $info['logo'];?>">
                	</figure>
            		
            		<h1 class="nombre-empresa"><?php echo $info['nombre'];?> Bienvenido</h1>
                	        
                </header>
                
                <div class="clear"></div>
                
                <span class="datos-turno">Turno: <span id="turno"><?php echo $turno;?></span></span>
                
                <input type="submit" name="General" id="General" value="General">
            	<input type="hidden" name="turnoGeneral" id="turnoGeneral" value=""></br>
				<li class="menu-li"><a href="General.php" >General</a></li>

				<span class="datos-turno">Turno: <span id="turnoAM"><?php echo $turnoAm;?></span></span>

				<input type="submit" name="Adulto_Mayor" id="Adulto_Mayor" value="Adulto Mayor">
            	<input type="hidden" name="turnoAdulto" id="turnoAdulto" value=""></br>
				<li class="menu-li"><a href="Adulto_Mayor.php" >Adulto_mayor</a></li>

				<span class="datos-turno">Turno: <span id="turnoDisc"><?php echo $turnoDis;?></span></span>

				<input type="submit" name="Discapacidad" id="Discapacidad" value="Discapacidad">
            	<input type="hidden" name="turnoDiscapacidad" id="turnoDiscapacidad" value="">
				<li class="menu-li"><a href="Discapacidad.php" >Discapacidad</a></li>

				<div class="clear"></div>
                
            
            </div>

        
        </div>
        
        <script src="js/jquery-3.1.0.min.js"></script>
		<script src="js/funcionesGenerales.js"></script>
		<script src="js/solicitarTurno.js"></script>
	
	</body>

</html>
