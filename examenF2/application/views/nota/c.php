<div class="container">
	<h1>Nueva nota</h1>

	<form action="<?=base_url()?>nota/cPost" method="post">
		
		<fieldset>
		<legend>Alumno</legend>
		<select name="idAlumno">
			<?php foreach ($alumnos as $alumno):?>
				<option value="<?=$alumno->id?>">
					<?= $alumno->apellido ?>, <?= $alumno->nombre ?>
				</option>
			<?php endforeach;?>
		</select>
		</fieldset>
		<br/>
		
		<?php foreach ($asignaturas as $asignatura):?>
			<input id="id-<?=$asignatura->id?>" type="radio" value="<?=$asignatura->id?>" name="idAsignatura" checked="checked"/>
			<label for="id-<?=$asignatura->id?>"><?=$asignatura->nombre?></label>
		<?php endforeach;?>
		<br/>
	
		<label for="idNota">Nota</label> 
		<input id="idNota" type="number" name="numero" required="required" min="0" max="10" value="5"/> 
		<br /> 
		
		<input type="submit" />
	</form>
</div>