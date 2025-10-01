<?php if (!empty($imagenes)) { ?>
    <h2>Imágenes relacionadas</h2>
    <div class="padreCarrusel">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftImagenes"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightImagenes"/>

        <div class="carrusel" id="tarjetasImagenes">
            <?php foreach($imagenes as $imagen) { ?>
                <img src="<?= $imagen->url; ?>" loading="lazy" class="thumbnail" id="imagen">
            <?php } ?>
        </div>
    </div>
<?php } ?>