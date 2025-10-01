 <h2>Noticias relacionadas</h2>
    <?php $voy =0; ?>

    <div class="ajuste">
        <?php foreach($noticias as $not) { ?>
            <?php if ($voy++ >3) break;?>

            <a href="/noticia/<?= $not->id; ?>">
                <div class="caja">
                    <div class="contenedor">
                        <img src="<?= $not->imagen; ?>" loading="lazy" class="imagen">
                    </div>
                    <p class="titulo"><?= $not->titulo; ?></p>
                    <p class="letraMini"><?= dateFormat($not->fecha); ?></p>
                </div>
            </a>
        <?php } ?>
    </div>