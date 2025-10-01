<div class='espaciado'></div>
<section class = "documento">
    <h1 class="tituloSeccion tituloH1"><?= $video[0]->titulo; ?></h1><br>

	<div class="centrado">
		<?php
            $url = $video[0]->url;
			$pos = strpos($url, "youtube");

			if (strpos($url, "shorts")!=false) { ?>
				<script> window.open('<?= $url; ?>', '_blank'); </script>
				El video es un Short de Youtube y se abrirá en otra pestaña o ventana. Si no se abre asegúrate de que el navegador no tiene bloqueado las ventanas emergentes.
			<?php } else { 
				if ($pos===false){ ?>
					<br><br><a href='<?= $url; ?>' target='_Blank' class='boton'>Ver el video en la web original</a>
				<?php }	else ?>
					<iframe class='reproductorVideo' src='<?= $url; ?>?rel=0&autoplay=1' frameborder='0' allowfullscreen></iframe>
			<?php }	?>

		
		<?php if ($video[0]->autor!="") ?>
            <br><br>Video alojado en: <?= $video[0]->autor; ?>

		| Subido el <?= dateFormat($video[0]->created_at); ?>
		<br><br><?= $video[0]->descripcion;  ?>

        <?php $enlaces = explode(" ", $video[0]->categoria);
              $botones = explode("|", $video[0]->boton); ?>

        <br><br><br>
        <?php include "../app/vistas/includes/videosRelacionados.php"; ?>

			
    <?php include "../app/vistas/includes/comentarios.php"; ?>
 </section>

 <?php 
    $title = $video[0]->titulo;
    $description = $video[0]->descripcion; 
	$script = ["botonesCarrusel", "carruselVideosRelacionados"]; ?>