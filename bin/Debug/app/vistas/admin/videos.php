<div class='espaciado'></div>
<br><br>
<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <div class="contenedor-registro">
            <h1>Editor de videos</h1>

			<?php foreach ($alertas as $alerta) { ?>
				<p><?= $alerta; ?></p>
			<?php } ?>
            <br>
			
			<form class="formulario" action = "/admin/videos" method = "POST">
				<input
					id = "id"
					name = "id"
					type = "hidden"
					placeholder = "id"
					value = "<?= $videos->id; ?>">

				<label for = "titulo">Título</label>
				<input
					id = "titulo"
					name = "titulo"
					type = "text"
					class = "tope"
					placeholder = "titulo"
					value = "<?= $videos->titulo; ?>">

				<label for = "descripcion">Descripción</label>
				<textarea
					id = "descripcion"
					class = "tope"
					name = "descripcion">
					<?= trim($videos->descripcion); ?>
				</textarea>

				<label for = "url">URL</label>
				<input
					id = "url"
					name = "url"
					type = "text"
					class="tope"
					placeholder = "URL"
					value = "<?= $videos->url; ?>">

				<label for = "urlimagen">Imagen</label>
				<input
					id = "urlimagen"
					name = "urlimagen"
					type = "text"
					class = "tope"
					placeholder = "Imagen"
					value = "<?= $videos->urlimagen; ?>">

				<p>Categoria</p>
				<span class='checkButton'>
                    <input type="checkbox" name='catFiestas'> Fiestas
				</span>

                <span class='checkButton'>
                    <input type="checkbox" name='catMusica'> Música
                </span><br>

                <span class='checkButton'>
                    <input type="checkbox" name='catDocumental'> Documental
                </span>

                <span class='checkButton'>
                    <input type="checkbox" name='catFormacion'> Formación
                </span><br>

                <span class='checkButton'>
                    <input type="checkbox" name='catVisitas'> Visitas
                </span>

				<span class='checkButton'>
                    <input type="checkbox" name='catActos'> Actos
                </span><br>

				<span class='checkButton'>
                    <input type="checkbox" name='catLegion'> Legión
                </span>

				<span class='checkButton'>
                    <input type="checkbox" name='catActuacion'> Actuación
                </span>
				
				<label for = "serie_id">Serie</label>
				<select	
					id = "serie_id"
					name = "serie_id" >
					<option value="-1">Ninguna</option>
					<?php foreach($series as $serie) { ?>
					<option 
						value="<?= $serie->id; ?>"
						<?php if ($videos->serie_id == $serie->id) echo "selected='selected'" ?>>
						<?= $serie->titulo; ?>
					</option>

					<?php } ?>
				</select>
				
				<label for = "tag">Tags</label>
				<input
					id = "tag"
					name = "tag"
					type = "text"
					class = "tope"
					placeholder = "Tags"
					value = "<?= $videos->tag; ?>">
				<span class="letraMini cursiva">Tags de última charla: <?= $ultimaCharla; ?></span>

				<label for = "autor">autor</label>
					<input
						id = "autor"
						name = "autor"
						type = "text"
						class = "mitad"
						placeholder = "Autor"
						value = "<?= $videos->autor; ?>">
				<span class="letraMini cursiva">En blanco para videos propios</span>

				<br><br>
				<input type="submit" class="boton" value="Enviar">
			</form>

			<br>

            <?php foreach($listaVideos as $video) { ?>
                <p>
                    <a href="/admin/videos?id=<?= $video->id; ?>">
                        <?= $video->created_at." - ".$video->titulo; ?>
                    </a>
                </p>
            <?php } ?>

            <br><br>
            <?php if (count($listaVideos) == 25) { ?>
                <a href="/admin/videos?t=1">Ver todos los videos</a>
            <?php } ?>

		</div>
	</main>
</div>

<?php $script = ["adminImagenes"]; ?>