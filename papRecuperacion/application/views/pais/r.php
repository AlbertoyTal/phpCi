<?php error_reporting(0); ?>
<div class="container">
	<h1>Lista de países</h1>
	
	<form action="<?=base_url()?>pais/c">
		<input type="submit" value="Nuevo país"/>
	</form>
	
	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
			<th># nacidos </th>
			<th># residentes </th>
			<th>Acciones</th>
		</tr>
		
		<?php foreach ($paises as $pais):?>
		<tr>
			<td> <?=$pais->nombre?> </td>

			<td> <?=$pais->alias('nace')->countOwn('persona') ?></td>

			<td> <?=$pais->alias('vive')->countOwn('persona') ?></td>
			
			<td class="row"> 
				<form action="<?=base_url()?>pais/u">
					<input type="hidden" name="idPais" value="<?=$pais->id?>"/>
					<button onclick="submit()">
						<img src="<?=base_url()?>assets/img/lapiz.png" height="25" width="25"/>
					</button>
				</form>
				<form action="<?=base_url()?>pais/d">
					<input type="hidden" name="idPais" value="<?=$pais->id?>"/>
					<button onclick="submit()">
						<img src="<?=base_url()?>assets/img/basura.png" height="25" width="25"/>
					</button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>