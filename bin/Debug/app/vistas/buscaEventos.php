<h1 class="tituloSeccion tituloH1"> Buscador: <?= $cadena; ?> </h1>

<!-- EVENTOS -->
<div class="documento">
    <?php if (!empty($eventos)) { ?>
        <h2>Resultados en eventos</h2>
        <?php foreach($eventos as $evento) { ?>
            <p>
                <a href="/evento?i=<?= $evento->id_grupo; ?>&year=<?= substr($evento->fecha, 0, 4); ?>">
                    <h3><?= $evento->titulo; ?></h3>
                    <?= dateFormat($evento->fecha, true, true); ?>
                </a>
            </p>
            <br>
        <?php } ?>
    <?php } ?>
</div>