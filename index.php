<!doctype html>
<html>

	<head>

		<meta charset="utf-8">

		<title>Controlador de turnos</title>

        <link rel="stylesheet" type="text/css" href="css/generales.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">

    </head>
	<body>

    	<div class="contenedor-principal">        	

        	<div class="contenedor-menu">

            	<h1 class="titulo-seccion">Controlador de turnos</h1>

            	<ul class="menu-ul">

                	<li class="menu-li"><a href="solicitar_turno.php">Turnos</a></li>
					<li class="menu-li"><a href="login.php" >Administración</a></li>
					<li class="menu-li"><a href="turnos.php" >Visualizador</a></li>

                </ul>

            </div><!--contenedor-->

        </div><!--contenedor principal-->

        <script src="js/funcionesGenerales.js"></script>

        <script>

			agregarEvento(window, 'load', iniciarReset, false);

			function iniciarReset(){

				var resetear = document.getElementById('reset');
				agregarEvento(resetear, 'click', function(e){
					
					if(e){
					
						e.preventDefault();
					
						id=e.target.id;
					
					}
					
					var datos = "registrar=reset-turnos";
					
					funcion = procesarReseteo;
					fichero = "consultas/registrar.php";
					
					conectarViaPost(funcion,fichero,datos);
				
				},false);
				
				function procesarReseteo(){
					
					if(conexion.readyState == 4){
					
						var data = JSON.parse(conexion.responseText);
					
						if(data.status == "correcto"){
							
							alert("Turnos reseteados correctamente");
						
						}else{
						
							console.log("Error al resetear los turnos");
						
						}
					
					}else{
						
						console.log('cargando');
					}
				
				}
			
			}

		</script>

	</body>

</html>
