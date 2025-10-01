<h1 class="tituloSeccion tituloH1"> Buscador: <?= $cadena; ?> </h1>

<!-- REINAPRE -->
<?php if (!empty($reinapre)) { ?>
    <h2>Resultado en Reinas / Damas / Pregoneros / Cartelistas</h2>
    <div class="padreCarrusel">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftReinas"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightReinas"/>

        <div class="carrusel" id="tarjetasReinas">
            <?php $enlace = ["/reina", "/reina", "/pregonero", "/cartel"]; ?>
            <?php foreach($reinapre as $otra) { ?>
                <div class="celda">
                    <a href="<?= $enlace[$otra->tipo]; ?>?year=<?= $otra->ano; ?>">
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
<?php } ?>

<!-- NOTICIAS -->
<div class="documento">
    <?php if (!empty($noticias)) { ?>
        <?php $voy = 0; ?>
        <h2>Resultados en noticias</h2>
        <?php foreach($noticias as $noticia) { ?>
            <?php if ($voy < 5) { ?>
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
            <?php $voy++; ?>
        <?php } ?>
        <?php if (count($noticias) > 5) { ?>
            <a href="/buscaNoticias?busca=<?= $cadena; ?>"> Ver todos los resultados </a>
        <?php } ?>
    <?php } ?>
</div>

<!-- VIDEOS -->
<?php if (!empty($videos)) { ?>
    <div class="devocion">
        <?php include "../app/vistas/includes/videosRelacionados.php"; ?>
    </div>
<?php } ?>


<!-- EVENTOS -->
<div class="documento">
    <?php if (!empty($eventos)) { ?>
        <?php $voy = 0; ?>
        <h2>Resultados en eventos</h2>
        <?php foreach($eventos as $evento) { ?>
            <?php if ($voy < 5) { ?>
                <p>
                    <a href="/evento?i=<?= $evento->id_grupo; ?>&year=<?= substr($evento->fecha, 0, 4); ?>">
                        <h3><?= $evento->titulo; ?></h3>
                        <?= dateFormat($evento->fecha, true, true); ?>
                    </a>
                </p>
                <br>
            <?php } ?>
            <?php $voy++; ?>
        <?php } ?>
        <?php if (count($eventos) > 5) { ?>
            <a href="/buscaEventos?busca=<?= $cadena; ?>"> Ver todos los resultados </a>
        <?php } ?>
    <?php } ?>
</div>

<!-- JUNTA -->
<?php if (!empty($junta)) { ?>
    <h2>Resultado en miembros de Junta</h2>
    <div class="padreCarrusel">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftJunta"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightJunta"/>

        <div class="carrusel" id="tarjetasJunta">
            <?php foreach($junta as $otra) { ?>
                <div class="celda">
                    <a href="/junta?year=<?= $otra->ano; ?>">
                        <div class="avatar">
                            <img src="<?= $otra->imagen; ?>" class="ancho" loading="lazy">
                        </div>
                        <br>
                        <p class="textoPartido"><?= $otra->nombre; ?></p>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php $script = ["botonesCarrusel", "video", "carruselReinas", "carruselJunta"]; ?>