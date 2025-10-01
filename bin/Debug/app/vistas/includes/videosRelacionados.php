<?php if (count($videos) > 0) { ?>
<h2 class="continuo">Videos relacionados</h2>
<div class="padreCarrusel" style="height: 20rem;">
    <img src="/imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftVideo"/>
    <img src="/imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightVideo"/>

    <div class="carrusel" id="tarjetasVideo">
        <?php foreach($videos as $v) { ?>
            <a href="/video/<?= $v->id; ?>">
                <div class="cajaVideo">
                    <img src="<?= $v->urlimagen; ?>" loading="lazy" class="imagen youtube">
                    <div class="titulo">
                        <?= $v->titulo; ?>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</div>
<?php } ?>