<div class='espaciado'></div>
<section class = "documento">
    <h1 class="tituloSeccion tituloH1">Videos Santa Cruz Calle Cabo</h1>

    <a href="/video/<?= $ultimo->id; ?>">
        <img src="<?= $ultimo->urlimagen ?>" class="anchoCompleto youtube imagenVideoPrincipal">
        <p class="tituloVideoPrincipal"><?= $ultimo->titulo; ?></p>
    </a>

    
    <div class="h2Videos">Recientes</div>
    <a href="/todosVideos?t=0">Ver todos</a>
    <div class="padreCarrusel" style="height: 20rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftRecientes"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightRecientes"/>

        <div class="carrusel" id="tarjetasRecientes">
            <?php foreach($recientes as $v) { ?>
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
    <br><br>

    <div class="h2Videos">Fiestas de mayo</div>
    <a href="/todosVideos/1">Procesión</a> | <a href="/todosVideos/2">Romerito</a>
     | <a href="/todosVideos/3">Legión</a> | <a href="/todosVideos/4">Ver todos</a>
    <div class="padreCarrusel" style="height: 20rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftFiestas"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightFiestas"/>

        <div class="carrusel" id="tarjetasFiestas">
            <?php foreach($fiestas as $v) { ?>
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

    <br>
    <div class="h2Videos">Spots</div>
    <a href="/todosVideos/5">Spots de fiestas</a> |  <a href="/todosVideos/6">Ver todos</a>
    <div class="padreCarrusel" style="height: 20rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftSpots"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightSpots"/>

        <div class="carrusel" id="tarjetasSpots">
            <?php foreach($spots as $v) { ?>
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

    <br>
    <div class="h2Videos">Formación</div>
     <a href="/todosVideos/7">Charlas</a> |  <a href="/todosVideos/8">Ver todos</a>
    <div class="padreCarrusel" style="height: 20rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftFormacion"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightFormacion"/>

        <div class="carrusel" id="tarjetasFormacion">
            <?php foreach($formacion as $v) { ?>
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

    <br>
    <div class="h2Videos">Actos y cultos</div>
    <a href="/todosVideos/8">Ver todos</a>
    <div class="padreCarrusel" style="height: 20rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftActos"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightActos"/>

        <div class="carrusel" id="tarjetasActos">
            <?php foreach($actos as $v) { ?>
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

    <br>
    <div class="h2Videos">Música</div>
    <a href="/todosVideos/9">Ver todos</a>
    <div class="padreCarrusel" style="height: 20rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftMusica"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightMusica"/>

        <div class="carrusel" id="tarjetasMusica">
            <?php foreach($musica as $v) { ?>
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

    <br>
    <div class="h2Videos">Programas</div>
    <a href="/todosVideos/10">Ver todos</a>
     <div class="padreCarrusel" style="height: 20rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftProgramas"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightProgramas"/>

        <div class="carrusel" id="tarjetasProgramas">
            <?php foreach($programas as $v) { ?>
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

    <br>
    <div class="h2Videos">Legión Española</div>
    <a href="/todosVideos/11">Diana</a> | <a href="/todosVideos/12">Entrada</a> | <a href="/todosVideos/13">Ver todos</a>
    <div class="padreCarrusel" style="height: 20rem;">
        <img src="imagenes/izquierda.webp" class="botonCarrusel botonCarruselIzquierda" id="botonLeftLegion"/>
        <img src="imagenes/derecha.webp" class="botonCarrusel botonCarruselDerecha" id="botonRightLegion"/>

        <div class="carrusel" id="tarjetasLegion">
            <?php foreach($legion as $v) { ?>
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

</section>

<?php $script = ["botonesCarrusel", "videos"]; ?>