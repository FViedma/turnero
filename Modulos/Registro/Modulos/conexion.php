<?php
	
	$conexion = mysql_connect("localhost","root","") or die("Error en conexion");
	mysql_select_db("clinica_bd",$conexion) or die("Error en base de datos");
	
	date_default_timezone_set("America/La_Paz");
    mysql_query("SET NAMES utf8");
	mysql_query("SET CHARACTER_SET utf");
	$s='$';
	
	
	
?>