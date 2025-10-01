<div class='espaciado'></div>
<h1>Historial:</h1>
<p class='identificador'>
    <?= decode($hermano->nombre)." ".decode($hermano->apellidos); ?>
</p>

<?php $nuevo = true; ?>

<input id="estado" type="hidden" value="<?= $hermano->estado; ?>">

<form method="POST" class='ficha'>
    <input type="hidden" id="id" name='id' value="<?= $historial->id; ?>" />
    <input type="hidden" id="usuario_id" name="usuario_id" value="<?= $hermano->id; ?>">
    <label for='fecha'>Fecha</label>
    <input name='fecha' id='fecha' type = 'date' value='<?= $historial->fecha; ?>' required /><br>

    <label for='tipo'>Tipo</label>
    <select id='tipo' name='tipo'>
        <option value="0" <?php echo $historial->tipo==0 ? "select='select'" : "" ?> >Baja</option>
        <option value="1" <?php echo $historial->tipo==1 ? "select='select'" : "" ?>>Alta</option>
        <option value="2" <?php echo $historial->tipo==2 ? "select='select'" : "" ?>>Fallecido</option>
        <option value="3" <?php echo $historial->tipo==3 ? "select='select'" : "" ?>>Fallecido pero sigue pagando</option>
        <option value="4" <?php echo $historial->tipo==4 ? "select='select'" : "" ?>>Junta de gobierno</option>
        <option value="5" <?php echo $historial->tipo==5 ? "select='select'" : "" ?>>Reina</option>
        <option value="6" <?php echo $historial->tipo==6 ? "select='select'" : "" ?>>Dama</option>
        <option value="7" <?php echo $historial->tipo==7 ? "select='select'" : "" ?>>Pregonero</option>
        <option value="8" <?php echo $historial->tipo==8 ? "select='select'" : "" ?>>Presentador pregonero</option>
        <option value="9" <?php echo $historial->tipo==9 ? "select='select'" : "" ?>>Cartelista</option>
        <option value="10" <?php echo $historial->tipo==10 ? "select='select'" : "" ?>>Hecho destacado</option>
        <option value="11" <?php echo $historial->tipo==11 ? "select='select'" : "" ?>>Subida Cruz Triduo</option>
        <option value="12" <?php echo $historial->tipo==12 ? "select='select'" : "" ?>>Farol Triduo</option>
    </select><br>

    <br>
    <label for='descripcion'>Descripción</label><br>
    <textarea name='descripcion' id='descripcion'><?= $historial->descripcion; ?></textarea>

    <br><br>
    <input type="submit" value="<?= $nuevo ? 'Añadir' : 'Modificar'; ?>" />
    <a href="/editar?i=<?= $hermano->id; ?>" class='boton'>Volver</a>

    <br><br>

</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script=["accionesHistorial"]; ?>
