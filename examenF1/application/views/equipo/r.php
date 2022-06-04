<div class="container">
	<h1>Lista de equipos</h1>
	<form action="<?=base_url()?>equipo/c">
		<input type="submit" value="Nuevo equipo" />
	</form>

	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
		</tr>
		
		<?php foreach ($equipos as $equipo):?>
		<tr>
			<td>
			<?=$equipo->nombre?>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>