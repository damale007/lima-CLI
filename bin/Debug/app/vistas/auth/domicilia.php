<div class='espaciado'></div>
<section class="documento">
    <h1 class="tituloSeccion tituloH1">Domiciliar cuota de Hermano</h1>

    <p>
        Al enviar este formulario, se le está pidiendo a la Hermandad de la Santa Cruz de la Calle Cabo que a partir del siguiente recibo de Hermano que se emita, se cobrará en la cuenta bancaria con el IBAN indicado.
    </p>

    <?php include '../app/vistas/includes/errores.php';  ?>
    <br>
    <form method="POST" class='formulario'>
        <label for="iban">IBAN</label>
        <input type="text" name="iban" id="iban" class='tope' value='<?= $iban; ?>' required>

        <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>

        <br><br>
        <input type="submit" value="Enviar" class='boton'>
    </form>

    <br><br>
    <p>
        También puede descargar el formulario en formato físico, imprimirlo, rellenarlo y enviarlo a la Hermandad a la dirección:
    </p>

    <p>
        Hermandad Santa Cruz Calle Cabo<br>
        C/ Comandante Herce s/n<br>
        21700 - La Palma del Condado (Huelva)
    </p>

    <br>
    <p>
        <a href='documentos/domiciliacion.pdf' target='_blank' class='boton'>
            Descargar el formulario
        </a>
    </p>

</section>

<?php 
    $title = "Domicilia cuota Hermano Calle Cabo";
    $description = "Domicilia la cuota de Hermano de la Hermandad de la Santa Cruz de la Calle Cabo"; 