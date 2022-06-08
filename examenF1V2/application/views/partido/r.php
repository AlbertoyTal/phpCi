<div class="container">
	<h1>Lista de partidos</h1>
	
	<form action="<?=base_url()?>partido/c">
		<input type="submit" value="Nuevo partido" />
	</form>

	<form action="<?=base_url()?>partido/r">
		<input type="date" name="fecha"/>
		<input type="submit" value="Filtrar" />
	</form>
	
	<table class="table table-striped">
		<tr>
			<th>Jornada </th>
			<th>Fecha</th>
			<th>Eq.local</th>
			<th>Eq.visitante</th>
			<th>Resultado</th>
		</tr>
		
		<?php foreach ($partidos as $partido):?>
		<tr>
			<td> <?=$partido->nJornada?> </td>
			<td> <?=$partido->fecha?> </td>
			<td> <?=$partido->fetchAs('equipo')->local->nombre?> </td>
			<td> <?=$partido->fetchAs('equipo')->visitante->nombre?> </td>
			<td> <?=$partido->gl?> - <?=$partido->gv?> </td>
		</tr>
		<?php endforeach;?>
	</table>
</div>