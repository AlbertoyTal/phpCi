<div class="container">
	<h1>Lista de alumnos</h1>

	<form action="<?=base_url()?>alumno/c">
		<input type="submit" value="Nuevo alumno" />
	</form>
	
	<table>
	
	<tr>
		<th>Nombre </th>
		<th>Apellido</th>
		<th>Notas</th>
	</tr>
	
	<?php foreach ($alumnos as $alumno):?>
		<tr>
			<td><?=$alumno->nombre?> </td>
			<td><?=$alumno->apellido?> </td>
			<td> 
    			<form action="<?=base_url()?>nota/r" method="get">
    				<input type="hidden" name="idAlumno" value="<?=$alumno->id?>"/>
    				<input type="submit" value="Ver (<?=$alumno->countOwn('nota')?>)"/>
    			</form>
			</td>
		</tr>
	
	<?php endforeach;?>
	</table>
</div>