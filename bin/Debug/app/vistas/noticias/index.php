<div class='espaciado'></div>
<br><h1 class="tituloSeccion tituloH1">Noticias Santa Cruz Calle Cabo</h1>

<div class="barraBusca">
	<form action="/hemeroteca" method="get" name="Formulario">
		<input name="busca" type = "text" placeholder="Año o noticia a buscar" required>
		<input name="submit" type="submit" class="boton3">
	</form>
	<a href="#filtrar" class="botonMini"> Filtrar noticias por tema </a>
</div>

<div class="documento">
	<?php $voy = 0; ?>
	<?php $imagen = ""; ?>
	<?php foreach ($noticias as $noticia) { ?>
		<?php if ($voy == 0) {  ?>
			<section class="primeraPlana">
			<div class="primeraNoticia">
			<?php $imagen = "imagenGrnde"; ?>
		<?php } ?>

		<?php if ($voy != 0) {  ?>
			<?php if ($voy <14) {  ?>
				<div>
				<?php $imagen = "imagenMedia"; ?>
			<?php } else { ?>	
				</div>	
				</div>	
				<div class="enLinea">
				<?php $imagen = "imagenPequena"; ?>
			<?php } ?>
		<?php } ?>

			<a href='/noticia/<?= $noticia->id; ?>'>
				<div class="<?= $imagen; ?>">
					<img src='<?= $noticia->imagen; ?>' class="imagen" loading="lazy">
				</div>
			</a>

			<a href='/noticia/<?= $noticia->id; ?>'>
				<h2 class='tituloPrincipal'>
					<?= $noticia->titulo; ?>
				</h2>
				<time class='letraMini'>
					Añadida el <?= dateFormat($noticia->fecha); ?>
				</time><br>
				<p class="titularPrincipal">
					<?= $noticia->titular; ?>
				</p>
			</a>
		</div>

		<?php if ($voy == 1) {  ?>
			</section>
			<div class="noticiasNormales">
		<?php } ?>

		<?php if ($voy == 16) { ?>
			</div>
			<div class="noticiasMini">
		<?php } ?>

		<?php $voy++; ?>
	<?php } ?>
	</div>

		
		<div id="filtrar">
			Filtrar noticias por:
			<div class="filtro">
			<?php foreach ($temas as $tema) { ?>
				<?php if ($tema->titulo == "Actividades recaudatorias" && isHermano()) { ?>
					<a href='/noticias/<?= $tema->id; ?>'>
						<?= $tema->titulo; ?>
					</a>
				<?php } ?>

				<?php if ($tema->titulo != "Actividades recaudatorias" ) { ?>
					<a href='/noticias/<?= $tema->id; ?>'>
						<?= $tema->titulo; ?>
					</a>
				<?php } ?>
			<?php } ?>
		</div>
</div>