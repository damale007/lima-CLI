<h2>Otras reinas</h2>
<div class="padreCarrusel">
    <img src="/imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftReinas"/>
    <img src="/imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightReinas"/>

    <div class="carrusel" id="tarjetasReinas">
        <?php foreach($otrasReinas as $otra) { ?>
            <div class="celda">
                <a href="/reina/<?= $otra->ano; ?>">
                    <div class="avatar">
                        <img src="<?= $otra->imagen; ?>" class="ancho" loading="lazy">
                    </div>
                    <br>
                    <p class="textoTitular1"><?= $otra->ano; ?>
                    <p class="textoPartido"><?= $otra->nombre; ?></p>
                </a>
            </div>
        <?php } ?>
    </div>
</div>