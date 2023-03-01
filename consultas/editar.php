<?php
    // Pregunta del codigo
	if(isset($_POST['editar'])){
		// Incluye y evalua el fichero especificado durante
		// la ejecucion del script
		require_once('../funciones/conexion.php');
		require_once('../funciones/funciones.php');
		$respuesta=[];
		// Crea un menu en el codigo
		switch($_POST['editar']){
			// una opcion parte del menu
			case'turnoAtendido':
				$sql="select id from turnos";
				$error="Error al registrar el turno";
				$buscar=consulta($con,$sql,$error);
				// 
				$noTurno=mysqli_num_rows($buscar);
				// mysqli_num_rows devuelve el numero de filas en un
				// conjunto de resultados.
				if($noTurno>0){
					$sql="select turno from turnos order by id desc";
					$error="Error al seleccionar el turno";
					$buscar=consulta($con,$sql,$error);
					$resultado=mysqli_fetch_assoc($buscar);
					// mysqli_fetch_assoc obtener una fila
					// de resultado como un array asociativo			
					$turno=$resultado['turno']+1;
					
					if($turno >= 10 && $turno < 100){
						$turno="0".$turno;
					}else if($turno >= 100){
						// Ejecuta una sentencia si una
						// condicion especifica es evaluada
						// como verdadera
						$turno;	
					}else{
						$turno="0"."0".$turno;
					}
				}else{
					$turno="00"."1";
				}
					
				$fecha=date("Y-m-d H:i:s");
				// Lee los datos de la fecha
				$sql="insert into turnos (turno,fechaRegistro) values ('$turno','$fecha')";
				$error="Error al registrar el turno";
				// Detectare funciones que no esten ejecutado
				// correctamente en tu web.
				$registrar=consulta($con,$sql,$error);
				
				if($registrar==true){
					$respuesta=array('mensaje'=>'1','turno'=>$turno);		
				}else{
					$respuesta=array('mensaje'=>'0','turno'=>000);	
				}
			break;
			default:
			break;
		}
		//echo $resultado['turno'];
		echo json_encode($respuesta);
		// Devulve la representacion JSON de un valor.
	}else{
		echo"<span>Opcion no valida</span>";
	}
?>