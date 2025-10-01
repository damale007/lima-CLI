<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <div class="contenedor-registro">
            <h1>Editor de noticias</h1>

            <br>
			
			<form action = "/admin/junta" method = "POST">
				<label for = "id">id</label>
				<input
					id = "id"
					name = "id"
					type = "hidden"
					placeholder = "id"
					value = "<?= $junta->id; ?>">
				<label for = "ano">ano</label>
				<input
					id = "ano"
					name = "ano"
					type = "text"
					placeholder = "ano"
					value = "<?= $junta->ano; ?>">
				<label for = "cargo">cargo</label>
				<input
					id = "cargo"
					name = "cargo"
					type = "text"
					placeholder = "cargo"
					value = "<?= $junta->cargo; ?>">
				<label for = "nombre">nombre</label>
				<input
					id = "nombre"
					name = "nombre"
					type = "text"
					placeholder = "nombre"
					value = "<?= $junta->nombre; ?>">
				<label for = "imagen">imagen</label>
				<input
					id = "imagen"
					name = "imagen"
					type = "text"
					placeholder = "imagen"
					value = "<?= $junta->imagen; ?>">
			</form>
		</div>
	</main>
</div>