<div class='espaciado'></div>
<br><br>
<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <div class="contenedor-registro">
            <h1>Editor de Boletines</h1>
			
			<?php foreach ($alertas as $alerta) { ?>
				<p><?= $alerta; ?></p>
			<?php } ?>

			<br>
			<p>
				Antes de comenzar a introducir las diferentes páginas y contenidos, debe definir el boletín o anuario.
			</p>
			
			<button id="definir" class="boton centrado">Definir Boletín</button>

			<form class="formulario" method = "POST" enctype="multipart/form-data">
				<input
					id = "id"
					name = "id"
					type = "hidden"
					placeholder = "id"
					value = "<?= $boletin->id; ?>">

				<label for = "numero">Número (EpocaNum ej. 201-> época 2 número 1)</label>
				<input
					id = "numero"
					name = "numero"
					class = "mitad"
					type = "number"
					placeholder = "Número"
					value = "<?= $boletin->numero; ?>">

				<label for = "pagina" id="Tpagina">Página</label>
				<input
					id = "pagina"
					name = "pagina"
					type = "number"
					placeholder = "Página"
					value = "<?= $boletin->pag; ?>">

				<label for = "autor" id="Tautor">Autor</label>
				<input
					id = "autor"
					name = "autor"
					type = "text"
					class = "tope"
					placeholder = "Autor"
					value = "<?= $boletin->autor; ?>">
				
				<label for = "cargo" id="Tcargo">Cargo</label>
				<input
					id = "cargo"
					name = "cargo"
					type = "text"
					class = "tope"
					placeholder = "Cargo"
					value = "<?= $boletin->cargo; ?>">
				
				<label for = "seccion" id="Tseccion">Sección</label>
				<input
					id = "seccion"
					name = "seccion"
					type = "text"
					class = "tope"
					placeholder = "Sección"
					value = "<?= $boletin->seccion; ?>">

				<label for = "titulo" id="Ttitulo">Título</label>
				<input
					id = "titulo"
					name = "titulo"
					type = "text"
					class = "tope"
					placeholder = "Título"
					value = "<?= $boletin->titulo; ?>">

				<?php if ($boletin->ano < 1970) $boletin->ano = date("Y"); ?>
				<label for = "ano" id="Tano">Año</label>
				<input
					id = "ano"
					name = "ano"
					type = "number"
					placeholder = "Año"
					value = "<?= $boletin->ano; ?>">

				<input type="submit" class="boton" value="Enviar">
			</form>
			<br>

			<?php foreach($boletines as $anuncio) { ?>
				<p>
					<a href="/admin/anuncio?id=<?= $anuncio->id; ?>">
						<?= $anuncio->imagen." - ".$anuncio->enlace." - Caduca: ".$anuncio->caducidad; ?>
					</a>
				</p>
			<?php } ?>

		</div>
	</main>
</div>

<?php $script = ["adminBoletin"]; ?>
