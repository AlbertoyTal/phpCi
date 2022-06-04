<div class="container">
	<h1>Nuevo alumno</h1>

	<form action="<?=base_url()?>alumno/cPost" method="post">

		<label for="idNombre">Nombre</label> 
		<input id="idNombre" type="text" name="nombre" required="required"/> 
		<br /> 
		
		<label for="idApellido">Apellido</label> 
		<input id="idApellido" type="text" name="apellido" required="required"/> 
		<br /> 
		
		<input type="submit" />
	</form>
</div>