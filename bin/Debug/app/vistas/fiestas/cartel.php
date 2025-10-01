<div class='espaciado'></div>
<div class="documento">
    <h1 class = "tituloSeccion tituloH1">Cartel de fiestas <?= $ano; ?></h1>
    
    <div class="centrado">
        <img src="<?= $cartel->imagen; ?>" alt = "Cartel de las fiestas de la Santa Cruz de la Calle Cabo del año <?= $ano; ?>" class="imagenCartel">
    </div>

    <h2>Autor/a: <?= $cartel->nombre; ?></h2>

    <br><br>
        <div class="ajuste">
        <a href="/reina/<?= $ano; ?>" class="boton">Reina <?= $ano; ?></a>
        <a href="/pregonero/<?= $ano; ?>" class="boton">Pregonero <?= $ano; ?></a>
        <a href="/actos/<?= $ano; ?>" class="boton">Actos <?= $ano; ?></a>
    </div>

    <br><br>
    <?php include "../app/vistas/includes/noticiasRelacionadas.php"; ?>
    <br><br>
    <?php include "../app/vistas/includes/videosRelacionados.php"; ?>
</div>

<?php $script = ["botonesCarrusel", "carruselVideosRelacionados"]; ?>