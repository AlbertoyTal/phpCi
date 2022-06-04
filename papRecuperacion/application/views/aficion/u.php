<div class="container">
	<h1>Editar afición</h1>
	
	<form action="<?=base_url()?>aficion/uPost" method="post">
		<input type="hidden" name="idAficion" value="<?=$aficion->id?>"/>
	
		<label for="idNombre">Nombre</label>
		<input id="idNombre" type="text" name="nombre" value="<?=$aficion->nombre?>" autofocus="autofocus" required="required"/>
		<br/>
		
		<input type="submit"/>
		<br/>
	</form>
</div>