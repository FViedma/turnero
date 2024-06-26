<?php
//funcion encriptar con md5
function encriptarMd5($contraseña){
	$encriptado=md5($contraseña);
	return $encriptado;
}
//fin de funcion encriptar md5
function consulta($con,$sql,$error){
	$resultado=mysqli_query($con,$sql) or die (mysqli_error($con));
	// mysqli_query realiza una consulta a la
	// base de datos
	// mysqli_error Devulve una cadena que 
	// descubre el ultimo error
	return $resultado;
}
// Limpia los campos del codigo
function limpiar($con,$valor){
	$filtro=htmlspecialchars($valor);
	// htmlspecialchars convierte caracteres
	$filtro=mysqli_real_escape_string($con,$filtro);
	return $filtro;
}
function convertir_fecha($fecha){
	$dato=explode(' ',$fecha);
	if($dato[0]=='0000-00-00'){	
		echo"Sin fecha";
	}else{
		$dato=explode('-',$dato[0]);
		$meses=array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
		$mesCovertido=str_replace('0','',$dato[1]);
		echo $dato[2]." de ".$meses[$mesCovertido-1]." del ".$dato[0];
	}
}
function verificar_datos($datos){
	$valor=true;
	for($i=0;$i<count($datos);$i++){
		if(!isset($datos[$i]) || empty($datos[$i]) || $datos[$i]=='ninguno'){
			 $valor=false;
			break;
		}
	}
	return $valor;
}
function imagen($con,$name,$tmp_name,$size,$type){
	if($name!=''){
		//imagen del articulo
		$status=false;
		$nombreFoto=limpiar($con,$name);//nombre de la foto
		$ruta=limpiar($con,$tmp_name);//directorio temporal de la imagen
		$tamaño=limpiar($con,$size);//tamaño de la imagen
		$tipo=limpiar($con,$type);//tipo de la imagen
	
		$destino="img/".$nombreFoto;//ruta donde se guardara la imagen
		$imagen="img/".$nombreFoto;//ruta que se guardara en la base de datos
		$mensaje='';
		
		if($tamaño<=1000000){
			if($tipo=="image/jpg" or $tipo=="image/gif" or $tipo=="image/jpeg" or $tipo=="image/png"){
				copy($ruta,$destino);
				$status=true;
			}else{
				$mensaje="<span class='mensaje'>Las imagenes del tipo ".$tipo."no son aceptadas</span>";
			}//verificacion de tipo 
		}else{
			$mensaje="<span class='mensaje'>El tamaño de la imagen exede al permitido</span>";
		}//verificacion de tamaño
	}else{
		$imagen='';
	}
	
	$resultado=array('status'=>$status,'mensaje'=>$mensaje,'imagen'=>$imagen);
	$resultado=json_encode($resultado);
	return $resultado;
}
?>
