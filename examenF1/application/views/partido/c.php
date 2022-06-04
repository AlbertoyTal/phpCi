<div class="container">

	<h1>Nuevo partido</h1>
	
	<form action="<?=base_url()?>partido/cPost" method="post">
	
		<label>Eq.local</label>
		<select name="idLocal">
			<?php foreach ($equipos as $equipo):?>
			<option value="<?=$equipo->id?>">
				<?=$equipo->nombre?>
			</option>
			<?php endforeach;?>
		</select>
		
		<label for="idGL">Goles</label>
		<input id="idGL" type="number" min="0" max="50" value="0" name="gl"/>
		
		<br/>
		
		<label>Eq.visitante</label>
		<select name="idVisitante">
			<?php foreach ($equipos as $equipo):?>
			<option value="<?=$equipo->id?>">
				<?=$equipo->nombre?>
			</option>
			<?php endforeach;?>
		</select>
		
		<label for="idGV">Goles</label>
		<input id="idGV" type="number" min="0" max="50" value="0" name="gv"/>
		
		<br/>
		
		
		<label for="idJornada">Jornada</label>
		<input id="idJornada" type="number" min="1" max="50" value="1" name="nJornada"/>
		<br/>
		
		<label for="idFecha">Fecha</label>
		<input id="idFecha" type="date" min="1" max="50" value="1" name="fecha"/>
		<br/>
		
		<input type="submit"/>
	</form>
</div>