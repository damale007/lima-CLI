<div class='espaciado'></div>
<div class="documento">
    <h1 class = "tituloSeccion tituloH1">Pregoneros Santa Cruz Calle Cabo</h1>

    <div class="ajuste">
        <?php foreach ($pregoneros as $pregonero) { ?>
            <a href="/pregonero?year=<?= $pregonero->ano; ?>">
                <div class="celda">
                    <div class="avatar">
                        <img src="<?=$pregonero->imagen; ?>" alt="<?= $pregonero->nombre; ?>" loading="lazy" class="ancho">
                    </div>
                    <p class="textoTitular1">
                        <?= $pregonero->ano; ?>
                    </p>
                    <p>
                        <?= $pregonero->nombre; ?>
                    </p>
                </div>
            </a>
        <?php } ?>
    </div>

</div>