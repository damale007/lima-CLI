<div class='espaciado'></div>
<br><br>
<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <div class="contenedor-registro">
            <h1>Editor de Anuncios</h1>
			
			<?php foreach ($alertas as $alerta) { ?>
				<p><?= $alerta; ?></p>
			<?php } ?>

			<form class="formulario" action = "/admin/anuncios" method = "POST" enctype="multipart/form-data">
				<input
					id = "id"
					name = "id"
					type = "hidden"
					placeholder = "id"
					value = "<?= $anuncio->id; ?>">

				<label for="file">Subir imagen:</label>
                <input id="file" name="file" type="file"/>

				<label for = "enlace">Enlace</label>
				<input
					id = "enlace"
					name = "enlace"
					class = "tope"
					type = "text"
					placeholder = "enlace"
					value = "<?= $anuncio->enlace; ?>">

				<label for = "posicion">Posicion</label>
				<input
					id = "posicion"
					name = "posicion"
					type = "number"
					placeholder = "posicion"
					value = "<?= $anuncio->posicion; ?>">

				<label for = "caboapp">Caboapp</label>
				<select
					id = "caboapp"
					name = "caboapp">
					<option value="0" <?php if ($anuncio->caboapp == '') echo "selected='selected'" ?>>No</option>
					<option value="1" <?php if ($anuncio->caboapp != '') echo "selected='selected'" ?>>Si</option>
				</select>	

				<label for = "caducidad">Caducidad</label>
				<input
					id = "caducidad"
					name = "caducidad"
					type = "date"
					placeholder = "caducidad"
					value = "<?= $anuncio->caducidad; ?>">
			</form>
			<br>

			<?php foreach($anuncios as $anuncio) { ?>
				<p>
					<a href="/admin/anuncio?id=<?= $anuncio->id; ?>">
						<?= $anuncio->imagen." - ".$anuncio->enlace." - Caduca: ".$anuncio->caducidad; ?>
					</a>
				</p>
			<?php } ?>

		</div>
	</main>
</div>

<?php $ruta = "../"; $script = ["adminAnuncios"]; ?>
