<div class='espaciado'></div>
<div class="documento">
    <h1 class="tituloSeccion tituloH1">Reservar entrada para la Coronación <?= date("Y"); ?></h1>
        <?php $quedan = 2 - $entradas; ?>

        <div class='centrado'>
            Ya ha realizado reserva de: <?= $entradas; ?> entrada
            <?php if ($entradas>1) echo "s"; ?> este año. Puede reservar <?= $quedan; ?> más.
            <a href='/borraReserva?t=2' rel='nofollow' class="boton naranja" style="display: inline-block;">Eliminar reserva</a>
        </div>
        <br><br>
            
        <?php if ($quedan>0) { ?>
            <div class="centrado">
                Va a reservarlas a nombre de <?= getNombre()." ".getApellidos(); ?> y DNI: <?= isDNI(); ?>
            
                <form method='POST' class="formulario">
                    <input type='hidden' name='formulario' value='si'>
                    <br>Entradas a reservas 
                    <select name='tipo'>";
                        <?php for ($i=1; $i<=2-$total_entradas; $i++) { ?>
                            <option value='<?= $i; ?>'><?= $i; ?></option>";
                        <?php } ?>

                    </select>
                    <br><br>
                    <input type='submit' class='boton' style='width: 150px;' value='Reservar'>		
                </form>
            </div>
        <?php } ?>
    </article>
</div>
