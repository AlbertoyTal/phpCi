<div class="container">
	<h1>Lista de asignaturas
	</h1>

	<form action="<?=base_url()?>asignatura/c">
		<input type="submit" value="Nueva asignatura" />
	</form>
	
	<table>
	
	<tr>
		<th>Nombre </th>
		<th>Notas </th>
	</tr>
	
	<?php foreach ($asignaturas as $asignatura):?>
		<tr>
			<td><?=$asignatura->nombre?> </td>
			<td> 
    			<form action="<?=base_url()?>nota/r" method="get">
    				<input type="hidden" name="idAsignatura" value="<?=$asignatura->id?>"/>
    				<input type="submit" value="Ver (<?=$asignatura->countOwn('nota')?>)" />
    			</form>
			</td>
	
		</tr>
	
	<?php endforeach;?>
	
	
	</table>
</div>