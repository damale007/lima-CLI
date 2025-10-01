<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <div class="contenedor-registro">
            <h1>Editor de noticias</h1>

            <br>
			
			<form action = "/admin/musica" method = "POST">
				<label for = "id">id</label>
				<input
					id = "id"
					name = "id"
					type = "hidden"
					placeholder = "id"
					value = "<?= $musica->id; ?>">
				<label for = "patrimonio_id">patrimonio_id</label>
				<input
					id = "patrimonio_id"
					name = "patrimonio_id"
					type = "text"
					placeholder = "patrimonio_id"
					value = "<?= $musica->patrimonio_id; ?>">
				<label for = "disco_id">disco_id</label>
				<input
					id = "disco_id"
					name = "disco_id"
					type = "text"
					placeholder = "disco_id"
					value = "<?= $musica->disco_id; ?>">
				<label for = "titulo">titulo</label>
				<input
					id = "titulo"
					name = "titulo"
					type = "text"
					placeholder = "titulo"
					value = "<?= $musica->titulo; ?>">
				<label for = "autor">autor</label>
				<input
					id = "autor"
					name = "autor"
					type = "text"
					placeholder = "autor"
					value = "<?= $musica->autor; ?>">
				<label for = "descripcion">descripcion</label>
				<input
					id = "descripcion"
					name = "descripcion"
					type = "text"
					placeholder = "descripcion"
					value = "<?= $musica->descripcion; ?>">
				<label for = "archivo">archivo</label>
				<input
					id = "archivo"
					name = "archivo"
					type = "text"
					placeholder = "archivo"
					value = "<?= $musica->archivo; ?>">
				<label for = "duracion">duracion</label>
				<input
					id = "duracion"
					name = "duracion"
					type = "text"
					placeholder = "duracion"
					value = "<?= $musica->duracion; ?>">
				<label for = "letra">letra</label>
				<input
					id = "letra"
					name = "letra"
					type = "text"
					placeholder = "letra"
					value = "<?= $musica->letra; ?>">
				<label for = "created_at">created_at</label>
				<input
					id = "created_at"
					name = "created_at"
					type = "text"
					placeholder = "created_at"
					value = "<?= $musica->created_at; ?>">
			</form>
		</div>
	</main>
</div>