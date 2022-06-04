<div class="container">
<h1>Escoge la jornada</h1>

<form action="<?=base_url()?>quiniela/partidos" method="get">

    <?php foreach ($nJornadas as $nJornada):?>
    	<input type="submit" name="nJornada" value="<?=$nJornada?>"/>
    <?php endforeach;?>

</form>
</div>