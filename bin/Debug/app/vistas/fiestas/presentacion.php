<div class='espaciado'></div>
<div class="documento">
    <br>
    <h1 class="tituloSeccion tituloH1">Presentación de niños a la Santa Cruz de la Calle Cabo</h1>
    <article>
        <?php if (!empty($tramites)) { ?>
            <?php foreach($tramites as $tramite) { ?>
                <p class='negrita'>Ha apuntado a <?= descifrar($tramite->nombre); ?></p>
        <?php } }?>
        
        <br><br>Usted, D/Dña <?= getNombreCompleto(); ?> con DNI: <?= getDNI(); ?> va a apuntar a un niño para presentárselo a la Santa Cruz de la Calle Cabo en el acto de Presentación de niños en el primer día de Triduo.<br><br>

        <form method='POST'>
            <label for='nombre'>Nombre del niño</label>
            <input type='text' name='nombre' id='nombre' style='padding: 5px; border-radius: 5px;'><br>
            <br>
            <label for='telefono'>Teléfono de contacto</label>
            <input type='text' name='telefono' id='telefono' style='padding: 5px; border-radius: 5px;'>

            <br><br><input type='submit' class='boton' style='width: 150px;' value='Apuntar'>		
        </form>
    </article>
</div>