<div class='espaciado'></div>
<br><br>
<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <div class="contenedor-registro">
            <h1>Editor de Reinas / Damas / Pregonero / Cartelista</h1>
			
		<?php foreach ($alertas as $alerta) { ?>
			<p><?= $alerta; ?></p>
		<?php } ?>

		<form class="formulario" method = "POST">
			<input
				id = "id"
				name = "id"
				type = "hidden"
				placeholder = "id"
				value = "<?= $reinapre->id; ?>">			
			
				<label for = "ano">Año</label>
			<input
				id = "ano"
				name = "ano"
				type = "number"
				placeholder = "ano"
				value = "<?= $reinapre->ano; ?>">
			
				<label for = "nombre">Nombre</label>
			<input
				id = "nombre"
				name = "nombre"
				type = "text"
				class = "tope"
				placeholder = "nombre"
				value = "<?= $reinapre->nombre; ?>">
			
			<br><br>
			<select
				name = "tipo"
				value = "<?= $reinapre->tipo; ?>">
				<option value="0" <?php if ($reinapre->tipo == 0) echo "selected" ?>>Reina</option>
				<option value="1" <?php if ($reinapre->tipo == 1) echo "selected" ?>>Dama</option>
				<option value="2" <?php if ($reinapre->tipo == 2) echo "selected" ?>>Pregonero</option>
				<option value="3" <?php if ($reinapre->tipo == 3) echo "selected" ?>>Cartelista</option>
			</select>

			<label for = "texto">Texto en anuario</label>
			<textarea
				id = "texto"
				name = "texto"
				class="tope">
			<?= $reinapre->texto; ?>"
			</textarea>

			<label for = "texto2">Texto complementario</label>
			<textarea
				id = "texto2"
				name = "texto2"
				class="tope">
			<?= $reinapre->texto2; ?>"
			</textarea>

			<label for = "imagen">URL imagen</label>
			<input
				id = "imagen"
				name = "imagen"
				type = "text"
				class = "tope"
				placeholder = "imagen"
				value = "<?= $reinapre->imagen; ?>">
			<input type="submit" class="boton" value="Enviar">
		</form>

		<br><br>
		<?php foreach ($todas as $actual) { ?>
			<p style="margin: 1px;">
				<a href="reina/<?= $actual->id; ?>">
					<?= $actual->nombre." - ".$tipos[$actual->tipo]." ".$actual->ano; ?>
				</a>
			</p>
			<br>
		<?php } ?>