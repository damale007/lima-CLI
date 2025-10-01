<div class='ajuste'>
    <?php foreach($discos as $d) { ?>
        <div class='celda'>
            <a href='/disco?i=<?= $d->disco_id; ?>'>
                <img src='../multimedia/<?= $d->portada; ?>' loading="lazy" class="imagenCelda">
                <p>
                    <?=$d->titulo; ?>
                    <br>
                    <?= $d->autor; ?>
                </p>
            </a>
        </div>
    <?php } ?>
</div>