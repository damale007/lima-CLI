<div class='espaciado'></div>
    <br><h1 class = "tituloSeccion tituloH1"><?= $nombre." Nº ".$numero; ?> (<?= $ano; ?>)</h1>

    <!-- Boletines Anuarios -->
    <div class="centrado">
        <?php if ($portada!="none") { ?>
            <img src="<?= $portada->cargo; ?>" alt="Portada del anuario del año <?= $ano; ?>">
            <a href="<?= $portada->titulo; ?>" target="_blank" class="boton">Descargar en PDF</a>
            <br><br>

            <h3><?= identificaAnuario($portada->numero); ?></h3>
            <?php foreach ($anuario as $pag) { ?>
                <p>
                    <span class="tituloCaja">
                        <?= $pag->titulo; ?>
                    </span>
                    <br>
                    <?= $pag->autor; ?>
                </p>
            <?php } ?>
            
            <br>
        </div>
    <?php } ?>