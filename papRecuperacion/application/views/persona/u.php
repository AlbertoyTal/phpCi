<?php 
function tiene($idAficion,$persona,$tipo) {
    $sol = false;
    $coleccion = $tipo=='gusto' ? $persona->ownGustoList : $persona->ownOdioList ;
    foreach ($coleccion as $gustodio) {
        if ($gustodio ->aficion->id == $idAficion) {
            $sol = true;
        }
    }
    return $sol;
}
?>

<div class="container">
	<h1>Editar persona</h1>
	
	<form action="<?=base_url()?>persona/uPost" method="post">
		<input type="hidden" name="idPersona" value="<?=$persona->id?>"/>
	
		<label for="idLoginname">Loginname</label>
		<input id="idLoginname" type="text" name="loginname" value="<?=$persona->loginname?>" autofocus="autofocus" required="required"/>
		<br/>
		
		<label for="idNombre">Nombre</label>
		<input id="idNombre" type="text" name="nombre" value="<?=$persona->nombre?>" />
		<br/>
		
		<label for="idApellido">Apellido</label>
		<input id="idApellido " type="text" name="apellido" value="<?=$persona->apellido?>" />
		<br/>
		
		<div class="row">
		<label for="idPaisNace">País de nacimiento</label>
    	<select id="idPaisNace" name="idPaisNace">
    		<option value="-1">---</option>
    		<?php foreach ($paises as $pais):?>
    		<option value="<?=$pais->id?>"
    		<?= $pais->id == $persona->fetchAs('pais')->nace->id ?'selected="selected"' : '' ?>
    		>
    			<?=$pais->nombre?>
    		</option>
    		<?php endforeach;?>
    	</select>
    	</div>

		<div class="row">
		<label for="idPaisVive">País de residencia</label>
    	<select id="idPaisVive" name="idPaisVive">
    		<option value="-1">---</option>
    		<?php foreach ($paises as $pais):?>
    		<option value="<?=$pais->id?>"
    		<?= $pais->id == $persona->fetchAs('pais')->vive->id ?'selected="selected"' : '' ?>
    		>
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
			<input 
			<?= tiene($aficion->id,$persona,'gusto') ? 'checked="checked"' : '' ?>
			id="id-gusta-<?=$aficion->id?>" type="checkbox" name="idsAficionGusta[]" value="<?=$aficion->id?>" />
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
			<input 
			<?= tiene($aficion->id,$persona,'odio') ? 'checked="checked"' : '' ?>
			id="id-odia-<?=$aficion->id?>" type="checkbox" name="idsAficionOdia[]" value="<?=$aficion->id?>" />
			<label for="id-odia-<?=$aficion->id?>"><?=$aficion->nombre?></label>    	
			<?php endforeach;?>
    	</fieldset>
    	</div>
    	    	
		
		<input type="submit"/>
		<br/>
	</form>
</div>