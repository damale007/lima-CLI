<div class='espaciado'></div>
<section class="documento">
    <h1 class="tituloSeccion tituloH1">Apuntar vehículo para Romerito <?php echo date("Y"); ?></h1>

    <?php include '../app/vistas/includes/errores.php';  ?>

    <p class="centrado">
        <br><br>
        Va a 
        <?php echo ($vehiculos <= 0) ? "apuntarse" : "eliminarse"; ?>
         al Romerito <?= date("Y"); ?> con el nombre de <?= getNombre()." ".getApellidos(); ?> y DNI: <?= isDNI(); ?>

        <?php if ($vehiculos == 0) { ?> 
            <form method='POST' class="formulario">
                <br>modalidad de 
                <select name='tipo'>
                    <option value='manola'>Manola</option>
                    <option value='carro'>Carro</option>
                </select>

                <br><br>DNI del Tractorista: <input type ='text' name='dniT' placeholder="DNI"> (Sólo tracción mecánica)<br><br>
                Matrícula del tractor: <input type ='text' name='matriculaT' placeholder="Matrídula"> (Sólo tracción mecánica)<br>

                <br><br><input type='submit' class='boton' style='width: 150px;' value='Apuntar'>		
            </form>
        <?php } else { ?>
            <?php $token = base64_encode(getID().date("Ym")); ?>
            <div class="centrado">
                <button id="borraRomerito" data-token="/borraRomerito?token=<?= $token; ?>" class="boton naranja">Eliminar vehículo</button>
            </div>
        <?php } ?>
    </p>
</article>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $script = ["secretaria"]; ?>