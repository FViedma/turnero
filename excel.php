<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=usuarios.xls');

	include "conexion.php";
	$ss = mysql_query("SELECT * FROM contraref, sexo, condicion_paciente, tipo_servicio, acompanante where contraref.sexo=sexo.id_sexo and contraref.id_condicion = condicion_paciente.id_condicion and contraref.id_tipo_servicio= tipo_servicio.id_tipo_servicio and contraref.id_acomp = acompanante.id_acomp");
?>

<table border="2">
	<tr style="background-color:red;">
		<th>Numero</th>
		<th>Fecha Registro</th>
		<th>Establecimiento de salud</th>
		<th>Paciente</th>
		<th>Domicilio</th>
		<th>Peso</th>
		<th>Edad</th>
		<th>Sexo</th>
		<th>Dias Internacion</th>
		<th>Diagnostico ingreso 1</th>
		<th>Diagnostico ingreso 2</th>
		<th>Diagnostico ingreso 3</th>
		<th>Diagnostico ingreso 4</th>
		<th>Diagnostico egreso 1</th>
		<th>Diagnostico egreso 2</th>
		<th>Diagnostico egreso 3</th>
		<th>Diagnostico egreso 4</th>
		<th>tratamiento_rea</th>
		<th>recomencaciones_pac</th>
		<th>id_condicion</th>
		<th>id_tipo_servicio</th>
		<th>id_acomp</th>
	</tr>
	<?php
		while($rr=mysql_fetch_array($ss)){
			?>
				<tr>
					<td><?php echo $rr['id_contraref']; ?></td>
					<td><?php echo $rr['fecha_registro']; ?></td>
					<td><?php echo $rr['establecimiento_salud']; ?></td>
					<td><?php echo $rr['paciente']; ?></td>
					<td><?php echo $rr['domicilio']; ?></td>
					<td><?php echo $rr['peso']; ?></td>
					<td><?php echo $rr['edad']; ?></td>
					<td><?php echo $rr['descripcion']; ?></td>
					<td><?php echo $rr['dias_internacion']; ?></td>
					<td><?php echo $rr['diagnostico_ingr1']; ?></td>
					<td><?php echo $rr['diagnostico_ingr2']; ?></td>
					<td><?php echo $rr['diagnostico_ingr3']; ?></td>
					<td><?php echo $rr['diagnostico_ingr4']; ?></td>
					<td><?php echo $rr['diagnostico_egr1']; ?></td>
					<td><?php echo $rr['diagnostico_egr2']; ?></td>
					<td><?php echo $rr['diagnostico_egr3']; ?></td>
					<td><?php echo $rr['diagnostico_egr4']; ?></td>
					<td><?php echo $rr['tratamiento_rea']; ?></td>
					<td><?php echo $rr['recomendaciones_pac']; ?></td>
					<td><?php echo $rr['descrip_cond']; ?></td>
					<td><?php echo $rr['descrip_serv']; ?></td>
					<td><?php echo $rr['descrip_acomp']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>