<div class='espaciado'></div>
<section class="seccion">
    <h1 class="tituloSeccion tituloH1">Patrimonio Hermandad Santa Cruz Calle Cabo</h1>
    <article>
 
        <h2>Enseres</h2>
        <div class="padreCarrusel">
            <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftEnseres"/>
            <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightEnseres"/>

            <div class="carrusel" id="tarjetasEnseres">
                <?php foreach($enseres as $e) { ?>
                    <div class='caja'>
                        <a href='/patrimonioDetalle/<?= $e->id; ?>'>
                            <img src="<?= $e->imagen; ?>"><br>
                            <p class='tituloCaja'>
                                <?= $e->titulo; ?>
                            </p>
                            <span class='letraMini'> <?= siglos($e->ano); ?> </span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <h2>Insignias</h2>
        <div class="padreCarrusel">
            <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftInsignias"/>
            <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightInsignias"/>

            <div class="carrusel" id="tarjetasInsignias">
                <?php foreach($insignias as $e) { ?>
                    <div class='caja'>
                        <a href='/patrimonioDetalle/<?= $e->id; ?>'>
                            <img src="<?= $e->imagen; ?>"><br>
                            <p class='tituloCaja'>
                                <?= $e->titulo; ?>
                            </p>
                            <span class='letraMini'> <?= siglos($e->ano); ?> </span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <h2>Imágenes</h2>
        <div class="padreCarrusel">
            <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftImagenes"/>
            <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightImagenes"/>

            <div class="carrusel" id="tarjetasImagenes">
                <?php foreach($imagenes as $e) { ?>
                    <div class='caja'>
                        <a href='/patrimonioDetalle/<?= $e->id; ?>'>
                            <img src="<?= $e->imagen; ?>"><br>
                            <p class='tituloCaja'>
                                <?= $e->titulo; ?>
                            </p>
                            <span class='letraMini'> <?= siglos($e->ano); ?> </span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <h2>Pasos</h2>
        <div class="padreCarrusel">
            <div class="carrusel">
                <?php foreach($pasos as $e) { ?>
                    <div class='caja'>
                        <a href='/patrimonioDetalle/<?= $e->id; ?>'>
                            <img src="<?= $e->imagen; ?>"><br>
                            <p class='tituloCaja'>
                                <?= $e->titulo; ?>
                            </p>
                            <span class='letraMini'> <?= siglos($e->ano); ?> </span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <h2>Inmueble</h2>
        <div class="padreCarrusel">
            <div class="carrusel">
                <?php foreach($inmueble as $e) { ?>
                    <div class='caja'>
                        <a href='/patrimonioDetalle/<?= $e->id; ?>'>
                            <img src="<?= $e->imagen; ?>"><br>
                            <p class='tituloCaja'>
                                <?= $e->titulo; ?>
                            </p>
                            <span class='letraMini'> <?= siglos($e->ano); ?> </span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <h2>Musical</h2>
        <div class="padreCarrusel">
            <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftMusical"/>
            <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightMusical"/>

            <div class="carrusel" id="tarjetasMusical">
                <?php foreach($musical as $e) { ?>
                    <div class='caja'>
                        <a href='/patrimonioDetalle/<?= $e->id; ?>'>
                            <img src="<?= $e->imagen; ?>"><br>
                            <p class='tituloCaja'>
                                <?= $e->titulo; ?>
                            </p>
                            <span class='letraMini'> <?= siglos($e->ano); ?> </span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </article>
    <br><br><br>
</section>

<?php $script = ["patrimonio"]; ?>
