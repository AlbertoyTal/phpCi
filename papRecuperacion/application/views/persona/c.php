<div class="container">
	<h1>Nueva persona</h1>
	
	<form action="<?=base_url()?>persona/cPost" method="post">
		<label for="idLoginname">Loginname</label>
		<input id="idLoginname" type="text" name="loginname" autofocus="autofocus" required="required"/>
		<br/>
		
		<label for="idNombre">Nombre</label>
		<input id="idNombre" type="text" name="nombre"/>
		<br/>
		
		<label for="idApellido">Apellido</label>
		<input id="idApellido " type="text" name="apellido"/>
		<br/>
		
		<div class="row">
		<label for="idPaisNace">País de nacimiento</label>
    	<select id="idPaisNace" name="idPaisNace">
    		<option value="-1">----</option>
    		<?php foreach ($paises as $pais):?>
    		<option value="<?=$pais->id?>">
    			<?=$pais->nombre?>
    		</option>
    		<?php endforeach;?>
    	</select>
    	</div>
    	
		<div class="row">
		<label for="idPaisVive">País de residencia</label>
    	<select id="idPaisVive" name="idPaisVive">
    		<option value="-1">----</option>
    		<?php foreach ($paises as $pais):?>
    		<option value="<?=$pais->id?>">
    			<?=$pais->nombre?>
    		</option>
    		<?php endforeach;?>
    	</select>
    	</div>


    	<div class="row">
    	<fieldset>
        	<legend>
        	Aficiones (gustos)
        	</legend>
			<?php foreach ($aficiones as $aficion): ?>
			<input id="id-gusta-<?=$aficion->id?>" type="checkbox" name="idAficionGusta[]" value="<?=$aficion->id?>"/>
			<label for="id-gusta-<?=$aficion->id?>"><?=$aficion->nombre?></label>    	
			<?php endforeach;?>
    	</fieldset>
    	</div>
		
		<div class="row">
    	<fieldset>
        	<legend>
        	Aficiones (odios)
        	</legend>
			<?php foreach ($aficiones as $aficion): ?>
			<input id="id-odia-<?=$aficion->id?>" type="checkbox" name="idAficionOdia[]" value="<?=$aficion->id?>"/>
			<label for="id-odia-<?=$aficion->id?>"><?=$aficion->nombre?></label>    	
			<?php endforeach;?>
    	</fieldset>
    	</div>
		
		<input type="submit"/>
		<br/>
	</form>
</div>