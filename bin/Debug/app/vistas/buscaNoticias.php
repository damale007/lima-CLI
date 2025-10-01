<h1 class="tituloSeccion tituloH1"> Buscador: <?= $cadena; ?> </h1>

<div class="documento">
    <?php if (!empty($noticias)) { ?>
        <h2>Resultados en noticias</h2>
        <?php foreach($noticias as $noticia) { ?>
            <p>
                <a href="/noticia?id=<?= $noticia->id; ?>">
                    <h3><?= $noticia->titulo; ?></h3>
                    <span class="letraMini"><?= dateFormat($noticia->fecha, true); ?></span>
                    <br>
                    <?= $noticia->titular; ?>
                </a>
            </p>
            <br>
        <?php } ?>
    <?php } ?>
</div>