<?php use MVC\Session; ?>
<br><br>
<div id="ventana" class="cuadro"></div>
			<script> //oculta("ventana"); </script>

<section>
	<h1 class="tituloSeccion tituloH1" id="titulo"> <?= $canciones[0]->tituloDisco; ?> </h1>
	<article>
		<div class="ajuste">
			<div class="caratula">
				<img src='<?= $imagen; ?>' title='<?= $canciones[0]->tituloDisco; ?>' alt='<?= $canciones[0]->tituloDisco; ?>' class="imagenTitulo"> 
				<div id="reproductor" class="caja2">
					<div>
						<img src="/imagenes/anterior.webp" id="anterior" title="Anterior canción" alt="Anterior Canción" class="iconoMusica">
						<img src="/imagenes/reproducir.webp" id="reproducir" title="Reproducir" alt="Reproducir" class="iconoMusica">
						<img src="/imagenes/siguiente.webp" id="siguiente" title="Siguiente canción" alt="Siguiente canción" class="iconoMusica">
					</div>
					<div id="#divInfoCancion" class="infoCancion">
						<label id="lblCancion">Reproductor parado</label><br>
						<label id="lblDuracion"></label>
					</div>
					<br>
				</div>			
			</div>

			<div id="listaCanciones" class="listaCanciones">
				<br>
				<h2>Lista de canciones</h2><br>
				<?php $voy = 0; ?>
				<?php
						if (!isLogin()) echo "<p class='centrado'>Loguéate para añadir canciones a tu lista de reproducción</p><br>"; ?>

					<ul id='canciones_repr' class="reproduccionMusica" style="margin: 0px; padding: 0px;">
					

					<?php foreach ($canciones as $cancion) { ?>
						<li rel='<?= $cancion->archivo; ?>'>
							<img src="/imagenes/reproducir_mini.webp" alt="botón play" title="Reproducir" style="cursor: pointer;" data-id="<?= $voy; ?>" id="botonPlay" loading="lazy">
							<?= $cancion->titulo; ?>

							<?php if ($cancion->letra != "") ?>
								<span data-letra = "<?= htmlspecialchars($cancion->letra, ENT_QUOTES); ?>" id="letra" class='botonMusica'> 
									letra 
								</span>


							<?php if (isLogin() && $cancion->lista <2) { ?>
								<span class='botonMusica' id="botonLista" data-user="<?= Session::get('id'); ?>" data-id="<?= $cancion->id; ?>" data-num="<?= $voy; ?>">
									<?php if ($cancion->lista == "0"){ ?>
										+ lista
									<?php } else { ?>
										- lista 
									<?php } ?>
								</span>
							<?php } ?>
							<br></li>
						<?php 	$voy++; ?>
					<?php } ?>
					</ul>
					<br>

					<?php 
				?>
				</div>

				<div id="divLetra" class="letraCancion">
					historia_detalle
				</div>
			</div>
		</article>

			<br><br>
			<h2>Otros discos:</h2><br>

			<div class='ajuste'>
				<?php foreach ($similares as $similar) { ?>
					<div class='celda'>
						<a href='/disco/d/<?= $similar->id; ?>'>
							<img src='/multimedia/<?= $similar->portada; ?>'  class="imagenCelda">
						</a>
						<br><?= $similar->titulo; ?>
					</div>
				<?php } ?>
			</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
	$script = ["musica"]; 

       