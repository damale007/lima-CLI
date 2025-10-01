<div class='espaciado'></div>
<section class="documento">
    <img src='<?= $patrimonio->imagen; ?>' class='imagenVertical'>
    <h1 class="tituloSeccion tituloH1"><?= $patrimonio->titulo; ?></h1>
    
    <div>
        <p class="centrado">
            Autor: <?= $patrimonio->autor; ?>
            | Fecha: <?= siglos($patrimonio->ano); ?>
        </p>
        <br><br>

        <?php foreach($videos as $video) { ?>
            <object width="425" height="335"><param name="movie" value="<?= $video->url; ?>&autoplay=0"></param>

                <param name="wmode" value="transparent"></param><embed src="<?= $video->url; ?>&autoplay=0" type="application/x-shockwave-flash" wmode="transparent" width="425" height="335"></embed>
            </object><br><?= $video->titulo; ?><br><br>
        <?php } ?>

        <?= $patrimonio->descripcion; ?>
    </div>

    <br><br>


        <?php if (count($musica)>0) { ?>
            <div class="ajuste">
                <?php foreach ($musica as $m) { ?>
                    <article>
                        <a href='/disco/<?= $m->id; ?>' class="boton">
                            Escuchar <?= $m->titulo; ?></a>
                    </article>
                <?php } ?>
            </div>
        <?php } ?>

        <br><br>


        <h2 class="continuo">Videos relacionados</h2>
            <div class="padreCarrusel" style="height: 20rem;">
                <img src="/imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftPatrimonio"/>
                <img src="/imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightPatrimonio"/>

                <div class="carrusel" id="tarjetasPatrimonio">
                    <?php foreach($relacionado as $r) { ?>
                        <a href="/patrimonioDetalle/<?= $r->id; ?>">
                        <div class="celda">
                            <img src='<?= $r->imagen; ?>'  class="imagenCelda">
                            <br>
                            <?= $r->titulo; ?>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>

</section>
<?php
    $script = ["imagenes", "botonesCarrusel", "carruselPatrimonio"];

