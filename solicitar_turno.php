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
                
                <input type="submit" name="General" id="General" value="General">
            	<input type="hidden" name="turnoGeneral" id="turnoGeneral" value=""></br>

				<input type="submit" name="Adulto_Mayor" id="Adulto_Mayor" value="Adulto Mayor">
            	<input type="hidden" name="turnoAdulto" id="turnoAdulto" value=""></br>

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
