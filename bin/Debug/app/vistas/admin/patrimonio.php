<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <div class="contenedor-registro">
            <h1>Editor de noticias</h1>

            <br>
			
			<form action = "/admin/patrimonio" method = "POST">
				<label for = "id">id</label>
				<input
					id = "id"
					name = "id"
					type = "hidden"
					placeholder = "id"
					value = "<?= $patrimonio->id; ?>">
				<label for = "grupoPatrimonio_id">grupoPatrimonio_id</label>
				<input
					id = "grupoPatrimonio_id"
					name = "grupoPatrimonio_id"
					type = "text"
					placeholder = "grupoPatrimonio_id"
					value = "<?= $patrimonio->grupoPatrimonio_id; ?>">
				<label for = "imagen">imagen</label>
				<input
					id = "imagen"
					name = "imagen"
					type = "text"
					placeholder = "imagen"
					value = "<?= $patrimonio->imagen; ?>">
				<label for = "ano">ano</label>
				<input
					id = "ano"
					name = "ano"
					type = "text"
					placeholder = "ano"
					value = "<?= $patrimonio->ano; ?>">
				<label for = "autor">autor</label>
				<input
					id = "autor"
					name = "autor"
					type = "text"
					placeholder = "autor"
					value = "<?= $patrimonio->autor; ?>">
				<label for = "titulo">titulo</label>
				<input
					id = "titulo"
					name = "titulo"
					type = "text"
					placeholder = "titulo"
					value = "<?= $patrimonio->titulo; ?>">
				<label for = "descripcion">descripcion</label>
				<input
					id = "descripcion"
					name = "descripcion"
					type = "text"
					placeholder = "descripcion"
					value = "<?= $patrimonio->descripcion; ?>">
				<label for = "video">video</label>
				<input
					id = "video"
					name = "video"
					type = "text"
					placeholder = "video"
					value = "<?= $patrimonio->video; ?>">
				<label for = "tag">tag</label>
				<input
					id = "tag"
					name = "tag"
					type = "text"
					placeholder = "tag"
					value = "<?= $patrimonio->tag; ?>">
			</form>
		</div>
	</main>
</div>