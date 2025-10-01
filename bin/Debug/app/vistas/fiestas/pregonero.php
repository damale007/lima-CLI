<div class='espaciado'></div>
<h1 class = "tituloSeccion tituloH1">Pregonero/a Santa Cruz Calle Cabo <?= $ano; ?><br>
    <?= $pregonero->nombre; ?>
</h1>
    
<div class="dobleCelda">
    <img src="<?= $pregonero->imagen; ?>" alt="<?= $pregonero->nombre; ?>, Progeonero/a de la Santa Cruz de la Calle Cabo <?= $ano; ?>" class="imagenAnchoTotal" loading="lazy">

    <br>
    <p class="centrado"><?= $pregonero->nombre." ".$tiempo; ?> el pregón el <?= dateFormat($fechaPregon->fecha, true); ?></p>
</div>

<section class='documento'>
    <h2> Saluda del Pregonero/a</h2>
    <p><?= $pregonero->texto; ?></p>
    <br><br>
    <?php include "../app/vistas/includes/videosRelacionados.php"; ?>
    <hr>
    
    <div class="ajuste">
        <a href="/todosPregoneros" class="boton">Todos los pregoneros</a>
        <a href="/reina/<?= $ano; ?>" class="boton">Reina <?= $ano; ?></a>
        <a href="/actos/<?= $ano; ?>" class="boton">Programa de actos <?= $ano; ?></a>
        <a href="/cartel/<?= $ano; ?>" class="boton">Cartel <?= $ano; ?></a>
    </div>

    <?php include "../app/vistas/includes/otrosPregoneros.php"; ?>

    <br><br>
    <?php include "../app/vistas/includes/comentarios.php"; ?>
</section>

<?php $script = ["botonesCarrusel", "video", "carruselPregonero"]; ?>