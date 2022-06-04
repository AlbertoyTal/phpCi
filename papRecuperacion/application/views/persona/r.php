<div class="container">
	<h1>Lista de personas</h1>
	
	<form action="<?=base_url()?>persona/c">
		<input type="submit" value="Nueva persona"/>
	</form>
	
	<table class="table table-striped">
		<tr>
			<th>Loginname</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>País nac.</th> 
			<th>País resid.</th> 
			<th>Aficiones (gusta)</th>
			<th>Aficiones (odia)</th>
			<th>Acciones</th>
		</tr>
		
		<?php foreach ($personas as $persona):?>
		<tr>
			<td> <?=$persona->loginname?> </td>
			<td> <?=$persona->nombre?> </td>
			<td> <?=$persona->apellido?> </td>
			<td> <?=$persona->fetchAs('pais')->nace->nombre?> </td>
			<td> <?=$persona->fetchAs('pais')->vive->nombre?> </td>
			
			<td>
				<?php foreach ($persona->ownGustoList as $gusto):?>
				<?= $gusto->aficion->nombre ?> 
				<?php endforeach;?>
			</td>


			<td>
				<?php foreach ($persona->ownOdioList as $odio):?>
				<?= $odio->aficion->nombre ?> 
				<?php endforeach;?>
			</td>
			
			<td class="row"> 
				<form action="<?=base_url()?>persona/u">
					<input type="hidden" name="idPersona" value="<?=$persona->id?>"/>
					<button onclick="submit()">
						<img src="<?=base_url()?>assets/img/lapiz.png" height="25" width="25"/>
					</button>
				</form>
				<form action="<?=base_url()?>persona/d">
					<input type="hidden" name="idPersona" value="<?=$persona->id?>"/>
					<button onclick="submit()">
						<img src="<?=base_url()?>assets/img/basura.png" height="25" width="25"/>
					</button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>