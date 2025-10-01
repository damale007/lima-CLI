<form method="POST" class='ficha'>
    <input type="hidden" id="id" name='id' value="<?= $hermano->id; ?>" />
    <input type="hidden" id="antiguedad" name='antiguedad' value="<?= $hermano->antiguedad; ?>" />
    <input type="hidden" id="estado" name='estado' value="<?= $hermano->estado; ?>" />
    <fieldset>
        <legend>Datos</legend>
        <label for='nombre'>Nombre</label>
        <input name='nombre' id='nombre' type = 'text' value='<?= $hermano->nombre; ?>' required />

        <label for='apellidos'>Apellidos</label>
        <input name='apellidos' id='apellidos' type = 'text' class='largo' value='<?= $hermano->apellidos; ?>' required /><br>

        <label for='dni'>DNI</label>
        <input name='dni' id='dni' type = 'text' value='<?= $hermano->dni; ?>' />

        <label for='sexo'>Sexo</label>
        <select id='sexo' name='sexo'>
            <option value="0" <?php echo $hermano->sexo==0 ? "select='select'" : "" ?> >Hombre</option>
            <option value="1" <?php echo $hermano->sexo==1 ? "select='select'" : "" ?>>Mujer</option>
        </select><br>

        <label for='nacimiento'>Fecha de nacimiento</label>
        <input name='nacimiento' id='nacimiento' type = 'date' value='<?= $hermano->fecha_nacimiento; ?>' required />

        <label for='alta'>Fecha de alta</label>
        <input name='alta' id='alta' type = 'date' value='<?= $hermano->fecha_alta; ?>' required />
    </fieldset>

    <fieldset>
        <legend>Dirección</legend>
        <label for='direccion'>Dirección</label>
        <input name='direccion' id='direccion' type = 'text' class='largo' value='<?= $hermano->direccion; ?>' required /><br>

        <label for='cp'>CP</label>
        <input name='cp' id='cp' type = 'text' class='corto' value='<?= $hermano->cp; ?>' required />

        <label for='poblacion'>Población</label>
        <input name='poblacion' id='poblacion' type = 'text' value='<?= $hermano->poblacion; ?>' required />

        <label for='provincia'>Provincia</label>
        <input name='provincia' id='provincia' type = 'text' value='<?= $hermano->provincia; ?>' required />

    </fieldset>

    <fieldset>
        <legend>Dirección de envío</legend>

        <label for='direccion_envio'>Dirección</label>
        <input name='direccion_envio' id='direccion_envio' type = 'text' class='largo' value='<?= $hermano->direccion_envio; ?>' required /><br>

        <label for='cp_envio'>CP</label>
        <input name='cp_envio' id='cp_envio' type = 'text' class='corto' value='<?= $hermano->cp_envio; ?>' required />

        <label for='poblacion_envio'>Población</label>
        <input name='poblacion_envio' id='poblacion_envio' type = 'text' value='<?= $hermano->poblacion_envio; ?>' required />

        <label for='provincia_envio'>Provincia</label>
        <input name='provincia_envio' id='provincia_envio' type = 'text' value='<?= $hermano->provincia_envio; ?>' required /><br>

        <label for='zona'>Zona</label>
        <input name='zona' id='zona' type = 'text' class='corto' value='<?= $hermano->zona; ?>' required />

        <a id="igual" href="#">Igual que dirección</a>
    </fieldset>

    <fieldset>
        <legend>Comunicaciones</legend>

        <label for='movil'>Movil</label>
        <input name='movil' id='movil' type = 'text' value='<?= $hermano->movil; ?>' />

        <label for='email'>Email</label>
        <input name='email' id='email' type = 'text' class='largo' value='<?= $hermano->email; ?>' /><br>

        <label for='otro'>Otro</label>
        <input name='otro' id='otro' type = 'text' class='largo' value='<?= $hermano->otro; ?>' />

    </fieldset>

    <fieldset>
        <legend>Pagos</legend>

        <label for='banco'>Cuenta bancaria</label>
        <input name='banco' id='banco' type = 'text' class='largo' value='<?= $hermano->banco; ?>' />

        <label for='cobrador'>Cobrador</label>
        <input name='cobrador' id='cobrador' type = 'text' value='<?= $hermano->cobrador; ?>' /><br>

        <?= $nuevo ? "<label for='pagado'>Pagado hasta</label>
        <input name='pagado_hasta' id='pagado_hasta' type = 'text' value='".$hermano->pagado_hasta."' required />" : "" ?>

    </fieldset>

    <input id="submit" type="submit" value="<?= $nuevo ? 'Grabar' : 'Modificar'; ?>" />
    <a href="/listado" class='boton'>Volver al listado</a>

    <br><br>

</form>
