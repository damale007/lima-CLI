<div class='espaciado'></div>
<br><br>
<div class="contenedor-admin">
    <aside>
        <?php include "menu.php"; ?>
    </aside>

    <main>
        <div class="contenedor-registro">
            <h1>Editor de eventos</h1>

            <br>
			
			<?php foreach ($alertas as $alerta) { ?>
				<p><?= $alerta; ?></p>
			<?php } ?>

			<form class="formulario" action = "/admin/calendario" method = "POST">
				<input
					id = "id"
					name = "id"
					type = "hidden"
					placeholder = "id"
					value = "<?= $eventos->id; ?>">

				<label for = "fecha">Fecha de inicio</label>
				<input
					id = "fecha"
					name = "fecha"
					type = "date"
					class="mitad"
					placeholder = "fecha"
					value = "<?= $fecha; ?>">

				<label for = "hora">Hora de inicio</label>
				<input
					id = "hora"
					name = "hora"
					type = "time"
					class="mitad"
					placeholder = "fecha"
					value = "<?= $hora; ?>">
				
				<label for = "horas">Duración (en minutos)</label>
				<input
					id = "horas"
					name = "horas"
					type = "number"
					class="mitad"
					placeholder = "horas"
					value = "<?= $eventos->horas; ?>">

				<label for = "titulo">Titulo</label>
				<input
					id = "titulo"
					name = "titulo"
					type = "text"
					class="tope"
					placeholder = "titulo"
					value = "<?= $eventos->titulo; ?>">

				<label for = "descripcion">Descripcion</label>
				<textarea
					id = "descripcion"
					name = "descripcion"
					class="tope">
					<?= $eventos->descripcion; ?>
				</textarea>
				
				<label for = "id_recorrido">Recorrido</label>
				<select id="id_recorrido" name="id_recorrido">
					<option value="0" <?php if ($eventos->id_recorrido == "" || $eventos->id_recorrido == "0") echo "selected='selected'" ?>>Ninguno</option>
					<option value="1" <?php if ($eventos->id_recorrido == "1") echo "selected='selected'" ?>>Rosario</option>
					<option value="2" <?php if ($eventos->id_recorrido == "2") echo "selected='selected'" ?>>Romerito</option>
					<option value="3" <?php if ($eventos->id_recorrido == "3") echo "selected='selected'" ?>>Procesión</option>
					<option value="99" <?php if ($eventos->id_recorrido == "99") echo "selected='selected'" ?>>Lluvia</option>
				</select>

				<label for = "id_grupo">Grupo</label>
				<select id="id_grupo" name="id_grupo">
					<?php foreach ($temas as $tema) { ?>
						<option value="<?= $tema->id; ?>" <?php if ($eventos->id_grupo == $tema->id) echo "selected='selected'" ?>><?= $tema->titulo; ?></option>
					<?php } ?>
				</select>

				<label for = "tags">Tags</label>
				<input
					id = "tags"
					name = "tags"
					type = "text"
					class="mitad"
					placeholder = "Tags"
					value = "<?= $eventos->tags; ?>"
					required>

				<label for = "accion">Botón de Accion</label>
				<select id="accion" name="accion">
					<option value="0" <?php if ($eventos->accion == "" || $eventos->accion == "0") echo "selected='selected'" ?>>Ninguno</option>
					<option value="1" <?php if ($eventos->accion == "1") echo "selected='selected'" ?>>Directorio Litúrgico</option>
					<option value="2" <?php if ($eventos->accion == "2") echo "selected='selected'" ?>>Carta de barra</option>
					<option value="3" <?php if ($eventos->accion == "3") echo "selected='selected'" ?>>Plan Romerito</option>
					<option value="4" <?php if ($eventos->accion == "4") echo "selected='selected'" ?>>Novena</option>
					<option value="5" <?php if ($eventos->accion == "5") echo "selected='selected'" ?>>Coronación</option>
				</select>

				<label for = "barra">Carta de precios</label>
				<select id="barra" name="barra">
					<option value="0" <?php if ($eventos->barra == "" || $eventos->barra == "0") echo "selected='selected'" ?>>Ninguna</option>
					<option value="3" <?php if ($eventos->barra == "3") echo "selected='selected'" ?>>Fiesta Bartola</option>
					<option value="4" <?php if ($eventos->barra == "4") echo "selected='selected'" ?>>Paella</option>
					<option value="5" <?php if ($eventos->barra == "5") echo "selected='selected'" ?>>Verbena</option>
				</select>

				<label for = "notificacion"></label>
				<select id="notificacion" name="notificacion">
					<option value="0">No</option>
					<option value="1">Si</option>
				</select>

				<input type="submit" class="boton" value="Enviar">
			</form>

			<br>

            <?php foreach($listaEventos as $evento) { ?>
                <p>
                    <a href="/admin/calendario?id=<?= $evento->id; ?>">
                        <?= $evento->fecha." - ".$evento->titulo; ?>
                    </a>
                </p>
            <?php } ?>

            <br><br>
            <?php if (count($listaEventos) == 25) { ?>
                <a href="/admin/calendario?t=1">Ver todos los eventos</a>
            <?php } ?>

		</div>
	</main>
</div>
