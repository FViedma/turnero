<?php
require_once '../database.php'; # Configuracion de la Web(Base de Datos)

$nom_tarea = $_REQUEST['nombre'];
$fech_tarea = date('Y-m-d');

mysqli_query($connection,"INSERT INTO `clinica_bd`.`tarea` (`idtarea`,`nom_tarea`, `fech_tarea`) 
							VALUES (NULL, '$nom_tarea','$fech_tarea')");
?>