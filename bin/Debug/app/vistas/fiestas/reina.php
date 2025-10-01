<div class='espaciado'></div>
<h1 class = "tituloSeccion tituloH1">Reina Santa Cruz Calle Cabo <?= $ano; ?><br>
    <?= $reina->nombre; ?>
</h1>
    
<div class="dobleCelda">
    <img src="<?= $reina->imagen; ?>" alt="<?= $reina->nombre; ?>, Reina de la Santa Cruz de la Calle Cabo <?= $ano; ?>" class="imagenAnchoTotal" loading="lazy">

    <br>
    <p class="centrado"><?= $reina->nombre." ".$tiempo; ?> coronada Reina de la Santa Cruz de la Calle Cabo el <?= dateFormat($coronacion, true); ?></p>
</div>

<section class='documento'>
    <!-- Damas -->
    <?php if (!empty($damas)) { ?>
        <h2>Corte de honor</h2>
        <div class="ajuste">
            <?php foreach($damas as $dama) { ?>
                <div class="celda">
                    <img src="<?= $dama->imagen; ?>" class="imagenDama" loading="lazy">
                    <br>
                    <h3 class="centrado"><?= $dama->nombre; ?></h3>
                    <br>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <hr>

    <?php include "../app/vistas/includes/imagenesRelacionadas.php"; ?>
    <?php include "../app/vistas/includes/videosRelacionados.php"; ?>
    <hr>

    <div class="ajuste">
        <a href="/todasReinas" class="boton">Todas las reinas</a>
        <a href="/pregonero/<?= $ano; ?>" class="boton">Pregonero <?= $ano; ?></a>
        <a href="/actos/<?= $ano; ?>" class="boton">Programa de actos <?= $ano; ?></a>
        <a href="/cartel/<?= $ano; ?>" class="boton">Cartel <?= $ano; ?></a>
    </div>
    <?php include "../app/vistas/includes/otrasReinas.php"; ?>

    <br><br>
    <?php include "../app/vistas/includes/comentarios.php"; ?>
</section>

<?php $script = ["botonesCarrusel", "video", "carruselImagenes", "imagenes", "carruselReinas"]; ?>