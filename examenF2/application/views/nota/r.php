<div class="container">
	<h1>Lista de notas 
		<?php if (isset($alumno)):?>
		de <?=$alumno->nombre?> <?=$alumno->apellido?>
		<?php endif;?>

		<?php if (isset($asignatura)):?>
		de <?=$asignatura->nombre?> 
		<?php endif;?>
		
		
		 
	</h1>

	<form action="<?=base_url()?>nota/c">
		<input type="submit" value="Nueva nota" />
	</form>
	
	<table class="table table-striped" >
	
	<tr>
		<?php if (!isset($alumno)):?>
		<th>Alumno </th>
		<?php endif; ?>
		
		<?php if (!isset($asignatura)):?>
		<th>Asignatura</th>
		<?php endif;?>
		
		<th>Número</th>
	</tr>
	
	<?php foreach ($notas as $nota):?>
		<tr>
			<?php if (!isset($alumno)):?>
			<td><?=$nota->alumno->apellido?>,  <?=$nota->alumno->nombre?></td>
			<?php endif; ?>
			
			<?php if (!isset($asignatura)):?>
			<td><?=$nota->asignatura->nombre?> </td>
			<?php endif;?>
			
			<td><?=$nota->numero?> </td>
		</tr>
	
	<?php endforeach;?>
	</table>
</div>