<div class="container">

	<h1>Nuevo equipo</h1>
	
	<form action="<?=base_url()?>equipo/cPost" method="post">
	
		<label for="idName">Nombre </label>
		<input id="idName" type="text" name="nombre"/>
		<br/>
		
		<input type="submit"/>
	</form>
</div>