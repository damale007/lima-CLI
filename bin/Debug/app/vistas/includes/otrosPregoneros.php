<h2>Otros pregoneros</h2>
    <div class="padreCarrusel">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftPregoneros"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightPregoneros"/>

        <div class="carrusel" id="tarjetasPregoneros">
            <?php foreach($otrosPregoneros as $otra) { ?>
                <div class="celda">
                    <a href="/pregonero?year=<?= $otra->ano; ?>">
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