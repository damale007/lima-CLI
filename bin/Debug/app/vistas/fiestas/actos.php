<div class='espaciado'></div>
<div class="documento">
    <h1 class = "tituloSeccion tituloH1">Programa de actos <?= $ano; ?></h1>
 
    <?php $ultima = ""; ?>

    <?php if (empty($eventos)) { ?>
        <h2 class='centrado'>
            Programa de actos aun no disponible
        </h2>
    <?php }  foreach($eventos as $e) { ?>
        <?php if ($e->fecha != $ultima) { ?>
            <h3 class='centrado'>
                <?= dateFormat($e->fecha, true); ?>
            </h3>
                
            <?php $ultima = $e->fecha;
            } ?>

        <h2 style='font-size: 3rem;'><?= $e->titulo; ?></h2>
        <p class="centrado"><?= $e->descripcion; ?></p>
        <br><br>
    <?php } ?>

    <div class="ajuste">
        <a href="/reina/<?= $ano; ?>" class="boton">Reina <?= $ano; ?></a>
        <a href="/pregonero/<?= $ano; ?>" class="boton">Pregonero <?= $ano; ?></a>
        <a href="/cartel/<?= $ano; ?>" class="boton">Cartel <?= $ano; ?></a>
    </div>

    <?php include "../app/vistas/includes/noticiasRelacionadas.php"; ?>
    <br><br>
    <?php include "../app/vistas/includes/videosRelacionados.php"; ?>
</div>

<?php $script = ["botonesCarrusel", "carruselVideosRelacionados"]; ?>