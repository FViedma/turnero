<?php 
require('../database.php');
$array = $_POST['contenido'];

array_unshift($array,"");
unset($array[0]);

$count = 1;
foreach ($array as $idval) {
	$query = "UPDATE `tarea` SET `sort` = " . $count . " WHERE `idtarea` = " . $idval;
	mysqli_query($connection, $query);
	$count ++;	
}
?>