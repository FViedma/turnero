<?php
function nelson($texto){
	if($texto=='Contado'){
		return 'Contado';
	}elseif($texto=='Credito'){
		return 'Credito';
	}
}

function dameURL(){
	$url="http://".$_SERVER['HTTP_HOST'];
	return $url;
}
function insumo_existencia($insumo,$sucursal,$tipo){
	$ss=mysql_query("SELECT * FROM insumo_contenido WHERE insumo='$insumo' and sucursal='$sucursal'");
	if($rr=mysql_fetch_array($ss)){
		if($tipo=='contenido'){
			return $rr['contenido'];
		}elseif($tipo=='cant'){
			return $rr['cant'];
		}
		
	}else{
		mysql_query("INSERT INTO insumo_contenido (insumo,sucursal,cant,contenido) VALUES ('$insumo','$sucursal','0','0')");	
		if($tipo=='contenido'){
			return 0;
		}elseif($tipo=='cant'){
			return 0;
		}
		
	}
}

function existencia($producto,$sucursal){
	$ss=mysql_query("SELECT * FROM contenido WHERE producto='$producto' and sucursal='$sucursal'");
	if($rr=mysql_fetch_array($ss)){
		return $rr['cant'];
	}else{
		mysql_query("INSERT INTO contenido (producto,sucursal,cant) VALUES ('$producto','$sucursal','0')");	
		return 0;
	}
}


function cb($codigo){
	$codigo=substr($codigo,0,4)."-".substr($codigo,4,5);
	return $codigo;
}

function RestarHoras($horaini,$horafin){
	return date('H:i:s', strtotime("00:00:00")+strtotime($horafin)-strtotime($horaini));
}

function tabla_color($color){
	if($color=='VERDE'){
		return 'success';
	}elseif($color=='ROJO'){
		return 'error';
	}elseif($color=='AMARILLO'){
		return 'warning';
	}elseif($color=='AZUL'){
		return 'info';
	}else{
		return '';	
	}
}

function volver_positivo($valor){
	if($valor<0){
		return $valor*-1;
	}else{
		return $valor;	
	}
}


function permisos($usu,$mod,$pag){
	$v=false;
	
	$sql=mysql_query("SELECT usu,tipo FROM username");
	while($row=mysql_fetch_array($sql)){
		if(claves($row['usu'])==$usu){
			$usuario=$row['usu'];		$v=true;
			$tipo=$row['tipo'];
			break;
		}
	}
	#####################################
	#####################################
	if($v==true){
		$sql=mysql_query("SELECT estado FROM seg_per WHERE usu='$usuario' and permiso='$pag' and modulo='$mod'");
		if($row=mysql_fetch_array($sql)){
			if($row['estado']=='s'){
				return true;
			}else{
				return false;
			}
		}else{
			mysql_query("INSERT INTO seg_per (usu,permiso,estado,modulo) VALUES ('$usuario','$pag','n','$mod')");
			return false;
		}
	}elseif($v==false){
		return false;
	}
}

function get($valor,$tabla,$campo){
	$v=false;
	$sql=mysql_query("SELECT $campo FROM $tabla");
	while($row=mysql_fetch_array($sql)){
		if($valor==claves($row[$campo])){
			$resultado=$row[$campo];	$v=true;
			break;
		}
	}
	if($v==true){
		return $resultado;
	}else{
		return 'error';
	}
}

function colocar_permisos($usu,$tipo){
	
}

function nombre($doc){
	$sql=mysql_query("SELECT nom FROM persona WHERE cod='$doc'");
	if($row=mysql_fetch_array($sql)){
		return $row['nom'];
	}else{
		return 'ERROR';	
	}
}
function tama_boton($tama){
	if($tama=='PEQUENO'){
		return 'btn-mini';
	}elseif($tama=='NORMAL'){
		return 'btn';
	}elseif($tama=='GRANDE'){
		return 'btn-large';
	}
}
function color_boton($color){
	if($color=='DEFECTO'){
		return '';
	}elseif($color=='AZUL'){
		return 'btn-primary';
	}elseif($color=='CIELO'){
		return 'btn-info';
	}elseif($color=='VERDE'){
		return 'btn-success';
	}elseif($color=='AMARILLO'){
		return 'btn-warning';
	}elseif($color=='ROJO'){
		return 'btn-danger';
	}elseif($color=='NEGRO'){
		return 'btn-inverse';
	}elseif($color=='LINK'){
		return 'btn-link';
	}else{
		return '';
	}
}
function diaSemana($ano,$mes,$dia){
	$dias = array("DOMINGO","LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO");
	$dia= date("w",mktime(0, 0, 0, $mes, $dia, $ano));
	return $dias[$dia];
}


function dias_transcurridos($fecha_i,$fecha_f){
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}

function total_dias($Month, $Year){ 
   //Si la extensión que mencioné está instalada, usamos esa. 
   if( is_callable("cal_days_in_month")) 
   { 
	  return cal_days_in_month(CAL_GREGORIAN, $Month, $Year); 
   } 
   else 
   { 
	  //Lo hacemos a mi manera. 
	  return date("t",mktime(0,0,0,$Month,1,$Year)); 
   } 
} 
//Obtenemos la cantidad de días que tiene septiembre del 2008 
//echo total_dias(10, 2014);
function claves($con){
	$llave1='sadncy23mdsdi834nmsdncu45bnn534';
	$llave2='jfhy3ndjc9JRNDA9jm4ndjcog45m243';
	$con2=strrev($con);
	return sha1($llave2.$llave1.$llave2.$con2.$con.$llave1.$con2.$llave1.$con.$llave2.$con2.$llave1.$llave2.$llave1);
}

function consultar($campo,$tabla,$where){
	$sql=mysql_query("SELECT * FROM $tabla WHERE $where");
	if($row=mysql_fetch_array($sql)){
		return $row[$campo];
	}else{
		return '';	
	}
}

################################################################################################
function formato_factura($factura){
	if($factura>=1 and $factura<=9){
		return '0000000'.$factura;
	}elseif($factura>=10 and $factura<=99){
		return '000000'.$factura;
	}elseif($factura>=100 and $factura<999){
		return '00000'.$factura;
	}elseif($factura>=1000 and $factura<9999){
		return '0000'.$factura;
	}elseif($factura>=10000 and $factura<99999){
		return '000'.$factura;
	}elseif($factura>=100000 and $factura<999999){
		return '00'.$factura;
	}
}


################################ FORMATOS DE FECHAS ################################################################
function fecha($fecha){
	$meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
	$a=substr($fecha, 0, 4); 	
	$m=substr($fecha, 5, 2); 
	$d=substr($fecha, 8);
	return $d." / ".$meses[$m-1]." / ".$a;
}
function fechal($fecha){
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$a=substr($fecha, 0, 4); 	
	$m=substr($fecha, 5, 2); 
	$d=substr($fecha, 8);
	return $d." de ".$meses[$m-1]." del ".$a;
}
function dispo($estado){
	if($estado=='s'){
		return '<span class="label label-success">Disponible</span>';
	}else{
		return '<span class="label label-important">No Disponible</span>';
	}
}
function estado($estado){
	if($estado=='1'){
		return '<span class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> Activo</span>';
	}else{
		return '<span class="label label-danger"><i class="fa fa-times" aria-hidden="true"></i> No Activo</span>';
	}
}
function tipo($tipo){
	if($tipo=='ENTRADA'){
		return '<span class="label label-success">ENTRADA</span>';
	}elseif($tipo=='SALIDA'){
		return '<span class="label label-important">SALIDA</span>';
	}elseif($tipo=='CXC'){
		return '<span class="label label-info">CXC</span>';
	}elseif($tipo=='CXP'){
		return '<span class="label label-warning">CXP</span>';
	}
}

	
function mensajes($mensaje,$tipo){
	if($tipo=='verde'){
		$tipo='alert alert-success';
	}elseif($tipo=='rojo'){
		$tipo='alert alert-error';
	}elseif($tipo=='azul'){
		$tipo='alert alert-info-alt alert-dismissable';
	}
	return '<div class="'.$tipo.'" align="center">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>'.$mensaje.'</strong>
		</div>';
}
	
function formato($valor){
	return number_format($valor,2, ',', '.');
}
function cformato($valor){
	return number_format($valor,0, ',', '.');
}
/*$pa=mysql_query("SELECT * FROM empresa WHERE id=1");				
if($row=mysql_fetch_array($pa)){
	$empresa_nombre=$row['nombre'];
	$empresa_nit=$row['nit'];
	$empresa_dir=$row['direccion'];
	$empresa_tel=$row['tel'].'-'.$row['fax'];
	$empresa_pais=$row['pais'].' - '.$row['ciudad'];
	$empresa_correo=$row['correo'];
	$empresa_iva=$row['iva'];
	$empresa_nom_iva=$row['nom_iva'];
	$empresa_anno=$row['anno'];
	$empresa_d1=$row['dnom1'];
	$empresa_d2=$row['dnom2'];
	$empresa_div=$row['vmoneda'];
}*/

?>	
