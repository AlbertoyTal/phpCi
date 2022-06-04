<?php 
function resultado($p) {
    $resultado = null;
    $resultado = ($p->gl > $p->gv) ? '1' : ($p->gl < $p->gv ? '2' : 'X');
    return $resultado;
}
?>
<div class="container">

	<h1>Partidos de la jornada <?= $nJornada ?></h1>
	
	<table class="table table-striped">
	<tr>
		<th>Orden </th>
		<th>Eq. local</th>
		<th>Eq. visitante</th>
		<th>Resultado </th>
	</tr>
	<?php $i=1;?>
	<?php foreach ($partidos as $partido):?>
		<tr>
			<td><?=$i++?> </td>
			<td><?=$partido->fetchAs('equipo')->local->nombre?> </td>
			<td><?=$partido->fetchAs('equipo')->visitante->nombre?> </td>
			<td><?=resultado($partido)?> </td>
		</tr>
	<?php endforeach;?>
	</table>
</div>