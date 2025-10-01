<div class='espaciado'></div>
<section class = "documento">
    <h1 class="tituloSeccion tituloH1">Videos de <?= $titulo; ?></h1>
    <div class="ajuste">
        <?php foreach($videos as $v) { ?>
            <a href="/video?id=<?= $v->id; ?>">
                <div class="cajaVideo">
                    <img src="<?= $v->urlimagen; ?>" loading="lazy" class="imagen youtube">
                    <div class="titulo">
                        <?= $v->titulo; ?>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</section>