<div class='espaciado'></div>
<h1>Pago:</h1>
<p class='identificador'>
    <?= decode($hermano->nombre)." ".decode($hermano->apellidos); ?>
</p>

<?php $nuevo = true; ?>

<form method="POST" class='ficha'>
    <input type="hidden" id="id" name='id' value="<?= $pago->id; ?>" />
    <input type="hidden" id="usuario_id" name="usuario_id" value="<?= $hermano->id; ?>">
    <label for='fecha'>Fecha</label>
    <input name='fecha' id='fecha' type = 'date' value='<?= $pago->fecha; ?>' required /><br>

    <label for='tipo'>Tipo</label>
    <select id='tipo' name='tipo'>
        <option value="0" <?php echo $pago->tipo==0 ? "select='select'" : "" ?> >No paga el año...</option>
        <option value="1" <?php echo $pago->tipo==1 ? "select='select'" : "" ?>>Paga año atrasado</option>
        <option value="2" <?php echo $pago->tipo==2 ? "select='select'" : "" ?>>Pagado hasta el año</option>
        <option value="3" <?php echo $pago->tipo==3 ? "select='select'" : "" ?>>Pago de año perdonado</option>
        <option value="4" <?php echo $pago->tipo==4 ? "select='select'" : "" ?>>Exento de pago</option>
    </select><br>

    <br>
    <label for='descripcion'>Descripción</label><br>
    <textarea name='descripcion' id='descripcion'><?= $pago->descripcion; ?></textarea>

    <br><br>
    <input id="submit" type="submit" value="<?= $nuevo ? 'Añadir' : 'Modificar'; ?>" />
    <a href="/editar?i=<?= $hermano->id; ?>" class='boton'>Volver</a>

    <br><br>

</form>
