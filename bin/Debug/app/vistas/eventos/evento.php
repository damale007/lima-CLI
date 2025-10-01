<div class='espaciado'></div>
<div class="documento">
    <img src="<?= $grupo->imagen; ?>" class="imagenTitulo" alt="Altar de Triudo de la Santa Cruz de la Calle Cabo">
    <h1 class = "tituloSeccion tituloH1"><?= $grupo->titulo; ?></h1>

    <p><?= $grupo->descripcion; ?></p>
    <p>
        <br><br>
        <?php if (!empty($grupo->lugar)) { ?>
        Lugar de celebración: <?= $grupo->lugar; ?>
        <?php } ?>
        
        <?php if ($grupo->localizacion != "") { ?>
            <br><br>
            <a href="<?= $grupo->localizacion; ?>" target="_blank" class="botonMini"> Ver localización </a>
        <?php } ?>
    </p>

    <?php foreach ($eventos as $evento) { ?>
        <p>
            <div class="tituloEventoDesc">
                <?= $evento->titulo; ?>
            </div>
            
            <div class="fechaEventoDesc">
                <?= dateFormat($evento->fecha, true, true); ?>
            </div>

            <?php if ($evento->descripcion != "" && $evento->descripcion != "null") { ?>
                <div class="descripcionEventoDesc">
                    <?= $evento->descripcion; ?>
                </div>
            <?php } ?>
        </p>
    <?php } ?>
</div>