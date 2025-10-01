<div class='espaciado'></div>
<div class="documento">
    <h1 class = "tituloSeccion tituloH1">Reinas Santa Cruz Calle Cabo</h1>

    <div class="ajuste">
        <?php foreach ($reinas as $reina) { ?>
            <a href="/reina/<?= $reina->ano; ?>">
                <div class="celda">
                    <div class="avatar">

                        <img src="<?=$reina->imagen; ?>" alt="<?= $reina->nombre; ?>" loading="lazy" class="ancho">
                    </div>
                    <p class="textoTitular1">
                        <?= $reina->ano; ?>
                    </p>
                    <p>
                        <?= $reina->nombre; ?>
                    </p>
                </div>
            </a>
        <?php } ?>
    </div>

</div>