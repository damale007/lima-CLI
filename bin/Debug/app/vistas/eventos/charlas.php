<div class='espaciado'></div>
<section class="documento">
	<article>
		<h1 class="tituloSeccion tituloH1">Charlas en la Calle Cabo</h1>

		<p>Bajo este nombre, se recoge una serie de charlas coloquio formativas, que la Hermandad est&aacute; impartiendo con el fin de formar a todos los asistentes sobre diversos temas, para aclarar la posici&oacute;n de un cristiano dentro de una sociedad permisiva, en la que cada vez se cuestionan m&aacute;s los valores cristianos.</p><br>
		<p>Las Charlas impartidas y programadas son:</p><br>
	</article>
		
	<div class="ajuste">
		<?php foreach ($charlas as $charla) { ?>
			<div class="caja2 tercio">
				<p class="tituloCharla izquierda">
					<?= $charla->titulo; ?>
				</p>
				<p class="letraMini">
					<?= dateFormat($charla->fecha); ?>
				</p>
				<br>
				<p class="izquierda">
					<?= $charla->descripcion; ?>
				</p><br>
				
				<?php if ($charla->videos != "") { ?>
					<p>
						<a title='<?= $charla->titulo; ?>' href='/video?id=<?= $charla->videos; ?>' class="boton">Ver el video</a>
					</p>	
				<?php } ?>
			</div>		
		<?php } ?>
	</div>
</section>

<?php 
    $title = "Charlas en la Calle Cabo";
    $description = "Charlas en la Calle Cabo" ?>