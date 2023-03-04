<?php
require 'conexion.php';
//Configuracion de la conexion a base de datos
$con = mysql_connect($host, $user, $pwd); 
mysql_select_db($db, $con); 

//consulta todos los empleados
$sql=mysql_query("SELECT * FROM usuarios ORDER BY nombres ASC",$con);
?>
<table class="datos_table">
<tr>
	<th>Nombres</th>
	<th>Apellidos</th>
</tr>
<?php
while($row = mysql_fetch_array($sql)){
echo "<tr>";
echo "	<td>".$row['nombres']."</td>
";
echo "	<td>".$row['apellidos']."</td>
";
echo "</tr>
";
}
?>
</table>