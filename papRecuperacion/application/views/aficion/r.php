<div class="container">
	<h1>Lista de aficiones</h1>
	
	<form action="<?=base_url()?>aficion/c">
		<input type="submit" value="Nueva afición"/>
	</form>
	
	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
			<th>#gustosos</th>
			<th>#odiosos</th>
			<th>Acciones</th>
		</tr>
		
		<?php foreach ($aficiones as $aficion):?>
		<tr>
			<td> <?=$aficion->nombre?> </td>
			
			<td> <?=$aficion->countOwn('gusto')?> </td>

			<td> <?=$aficion->countOwn('odio')?> </td>

			<td class="row"> 
				<form action="<?=base_url()?>aficion/u">
					<input type="hidden" name="idAficion" value="<?=$aficion->id?>"/>
					<button onclick="submit()">
						<img src="<?=base_url()?>assets/img/lapiz.png" height="25" width="25"/>
					</button>
				</form>
				<form action="<?=base_url()?>aficion/d">
					<input type="hidden" name="idAficion" value="<?=$aficion->id?>"/>
					<button onclick="submit()">
						<img src="<?=base_url()?>assets/img/basura.png" height="25" width="25"/>
					</button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>