<div class="video">
	<div class="overlay">
        <img src="/imagenes/play.webp" alt="Imagen del Coro de la Santa Cruz de la Calle Cabo" class="imagenAnchoTotal">
        <h1 class="textoTituloSangre">Música<br>Santa Cruz Calle Cabo</h1>
    </div>
</div>

<section class = "documento">
    <div class="h2Videos" style="margin-bottom: 1rem;">Coro Santa Cruz Calle Cabo</div>
    <div class="padreCarrusel" style="height: 23rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftCoro"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightCoro"/>

        <div class="carrusel" id="tarjetasCoro" style="padding-top: 1rem;">
            <?php foreach($coro as $v) { ?>
                <a href="/disco/d/<?= $v->id; ?>">
                    <div class="cajaMusica">
                        <img src="../multimedia/<?= $v->portada; ?>" loading="lazy">
                        <div class="titulo">
                            <span class="negrita"><?= $v->titulo; ?></span>
                            <br>
                            <span class="letraMini"><?= $v->autor; ?></span>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

    <br><br>
    <div class="h2Videos" style="margin-bottom: 1rem;">Discos varios</div>
    <div class="padreCarrusel" style="height: 23rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftVarios"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightVarios"/>

        <div class="carrusel" id="tarjetasVarios" style="padding-top: 1rem;">
            <?php foreach($varios as $v) { ?>
                <a href="/disco/d/<?= $v->id; ?>">
                    <div class="cajaMusica">
                        <img src="../multimedia/<?= $v->portada; ?>" loading="lazy" class="imagen">
                        <div class="titulo">
                            <span class="negrita"><?= $v->titulo; ?></span>
                            <br>
                            <span class="letraMini"><?= $v->autor; ?></span>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

    <br><br>
    <div class="h2Videos" style="margin-bottom: 1rem;">Listas de reproducción</div>
    <div class="padreCarrusel" style="height: 23rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftLista"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightLista"/>

        <div class="carrusel" id="tarjetasLista" style="padding-top: 1rem;">
            <?php foreach($listas as $v) { ?>
                <a href="/disco/l/<?= $v->id; ?>">
                    <div class="cajaMusica">
                        <img src="<?= $v->portada; ?>" loading="lazy" class="imagen">
                        <div class="titulo">
                            <span class="negrita"><?= $v->titulo; ?></span>
                            <br>
                            <span class="letraMini"><?= $v->autor; ?></span>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>



    <br>
    <?php include "../app/vistas/includes/videosRelacionados.php"; ?>
</section>

<?php $script = ["botonesCarrusel", "carruselVideosRelacionados", "carruselMusica"]; ?>