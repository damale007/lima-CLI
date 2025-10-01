<div class='espaciado'></div>
	<section class="documento">
    	<h1 class="tituloSeccion tituloH1">Historia paso a paso</h1><br>

    	 <div class="tarjeta formulario centrado">
         	Elegir años en los que ver la historia: <br><br>
            <form id="miFormulario">
	            <input name="inicio" type="text" size="4" maxlength="4" placeholder="Inicio">
                <input name="fin" type="text" size="4" maxlength="4" placeholder="Fin">
                <input name="boton1" type="submit" value="Filtrar años" class="boton2">
    		</form>
        </div>
        
		<?php $ano=""; ?>

        <br>
		<?php foreach ($noticias as $noticia) {  ?>
            <?php   if ($ano!=$noticia->fecha)
                        $siglo = siglos($noticia->fecha);
                    else $siglo =""; ?>

            <p><h2 class="centrado"> <?= $siglo; ?> </h2></p>
			<p> <?= $ano; ?> </p>
			<?php if ($noticia->nombre!="0") echo "<p class='negrita'>Se estrena: ".$noticia->nombre.".</p>"; ?>
	
			<p><?= $noticia->texto; ?></p>
            <br>
		<?php } ?>
    </section>

<?php 
	$script = ["formularioHistoria"];